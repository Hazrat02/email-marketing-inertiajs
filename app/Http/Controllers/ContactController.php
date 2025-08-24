<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\ContactMail;
use App\Models\Smtp;
use Illuminate\Support\Facades\Mail;
use App\Jobs\SendBulkMailJob;
use App\Models\order;
use App\Models\order_email_log;
use App\Models\template;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class ContactController extends Controller
{


    public function home()
    {
        $smtp = Smtp::all();
        return view('welcome', compact('smtp'));
    }


    //     public function send(Request $request)
    // {
    //     $validated = $request->validate([
    //         'name'    => 'required|string|max:100',
    //         'from'    => 'required|email|max:255',
    //         'to'      => 'required',
    //         'subject' => 'required|string|max:255',
    //         'message' => 'required|string|max:5000',
    //     ]);

    //     try {
    //         Mail::to($validated['to'])
    //             ->send(new ContactMail(
    //                 $validated['name'],
    //                 $validated['from'],
    //                 $validated['subject'],
    //                 $validated['message']
    //             ));



    //         return back()->with('success', 'Email sent successfully!');
    //     } catch (\Exception $e) {

    //         return back()->with('error', 'Failed to send email. Please try again later.');
    //     }
    // }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'mailer'       => 'required|string',
            'host'         => 'required|string',
            'port'         => 'required|integer',
            'username'     => 'required|string',
            'password'     => 'required|string',
            'encryption'   => 'nullable|string',
            'from_address' => 'required|email',
            'from_name'    => 'required|string',
            'limit'        => 'required|integer'
        ]);

        $smtp = Smtp::create($validated);

        // Store in cache
        storeSmtpInCache($smtp);

        return redirect()->back()->with('success', 'SMTP saved & cached!');
    }




    public function sendBulkMail(Request $request)
    {
        // ✅ Validation
        $validated = $request->validate([
            'smtp_id' => 'required|exists:smtps,id',
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
            'name'    => 'required|string|max:100',
            'from'    => 'required|email',
            'to'      => 'required|string',
        ]);

        $user = Auth::user();

        // ✅ Parse recipients (remove empty + spaces)
        $emails = preg_split('/[\r\n,]+/', $validated['to'], -1, PREG_SPLIT_NO_EMPTY);
        $emails = array_filter(array_map('trim', $emails));
        $totalMails = count($emails);

        if ($totalMails === 0) {
            return back()->withErrors(['to' => 'No valid email addresses provided.']);
        }

        // ✅ Calculate cost
        $cost = $totalMails * 0.002;

        // ✅ Check user plan/limits
        if ($user->plan === 'free') {
            if ($user->limit <= 0) {
                return back()->withErrors([
                    'limit' => 'Your daily free limit has ended. Increase limit via WhatsApp: +8801783195999'
                ]);
            }

            if ($totalMails > $user->limit) {
                return back()->withErrors([
                    'limit' => "Your free mail limit is {$user->limit}, but you submitted {$totalMails}. Increase limit via WhatsApp: +8801783195999"
                ]);
            }

            $user->decrement('limit', $totalMails);
        } else {
            if ($user->balance < $cost) {
                $maxMails = floor($user->balance / 0.002);
                return back()->withErrors([
                    'limit' => "Your balance only allows {$maxMails} mails, but you submitted {$totalMails}. Increase balance via WhatsApp: +8801783195999"
                ]);
            }

            // reduce balance
            $user->decrement('balance', $cost);
        }

        // ✅ Template fetch (optional fallback if null)
        $selectedTem = optional(template::find($user->template))->body ?? null;

        // ✅ Create order
        $order = Order::create([
            'user_id'    => $user->id,
            'total_mail' => $totalMails,
            'total_cost' => $cost,
            'template'   => $selectedTem,
            'from_email' => $validated['from'],
            'name'       => $validated['name'],
            'sub'        => $validated['subject'],
            'body'       => $validated['message'],

        ]);

        // ✅ Queue each email
        foreach ($emails as $email) {
            if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
                SendBulkMailJob::dispatch(
                    $validated['smtp_id'],
                    $email,
                    $validated['name'],
                    $validated['from'],
                    $validated['subject'],
                    $validated['message'],
                    $order->id,
                    $user->id
                );
            }
        }

        return back()->with('success', "{$totalMails} emails queued for sending!");
    }

    public function resendMail(Request $request)
    {

        $user = auth()->user();
        $order = order::find($request->order_id)->first();
        $smtp = Smtp::find(3)->first();

        $failedMail = order_email_log::where('order_id', $request->order_id)->where('status', 'failed')->get();
        if (!$smtp) {

            return back()->with('Error', 'SMTP not found!');
        }



        // $order_id = $order->id;
        // dd($order_id);
        foreach ($failedMail as $email) {

            SendBulkMailJob::dispatch(
                '3',
                $email->email,
                $order->name,
                $order->from,
                $order->sub,
                $order->body,
                $request->order_id,
                $user->id
            );
        }






        return back()->with('success', 'Emails queued for sending!');
    }
}
