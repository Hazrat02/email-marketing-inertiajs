<?php

namespace App\Http\Controllers;

use App\Jobs\SendBulkMailJob;
use App\Models\order;
use App\Models\Smtp;
use App\Models\template;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;



class dashboardController extends Controller
{
    public function sendBulkMail(Request $request)
    {
        $validated = $request->validate([


            'smtp_id' => 'required|exists:smtps,id',

            'subject' => 'required|string',
            'message' => 'required|string',
            'name' => 'required|string',
            'from' => 'required|email',
            'to' => 'required|string',

        ]);

        // $attachments = [];
        // if ($request->hasFile('attachments')) {
        //     foreach ($request->file('attachments') as $file) {
        //         $attachments[] = $file->getRealPath();
        //     }
        // }
        $smtp = Smtp::find($request->smtp_id);
        if (!$smtp) {

            return back()->with('Error', 'SMTP not found!');
        }
        if ($smtp->limit <= 0) {
            if ($smtp->limit <= 0) {
                return back()->withErrors(['Error' => 'Today limit is End.Increase limit whatsapp No:+8801783195999']);
            }
        }

        $emails = preg_split('/[\r\n,]+/', $request->to);
        if ($smtp->limit < count($emails)) {
            return back()->withErrors([
                'limit' => "Your free Mail limit is {$smtp->limit}. But you submitted " . count($emails) . ". Increase limit whatsapp No:+8801783195999"
            ]);
        }


        foreach ($emails as $email) {
            $email = trim($email);
            if (filter_var($email, FILTER_VALIDATE_EMAIL)) {

                SendBulkMailJob::dispatch(
                    $validated['smtp_id'],
                    $email,

                    $validated['name'],
                    $validated['from'],
                    $validated['subject'],
                    $validated['message'],
                );
            }
        }





        // Artisan::call('queue:work');

        return back()->with('success', 'Emails queued for sending!');
    }


    public function dashboard(Request $request)
    {
        $smtps = Smtp::all();
        $template = template::all();
        $orders = Order::where('user_id', auth()->id())->get();

        return Inertia::render('Dashboard', [
            'smtps'  => $smtps,
            'orders' => $orders,
            'template' => $template,
        ]);
    }
  public function setTemplate(Request $request)
{
    $user = User::find(auth()->user()->id);

    $user->update([
        'template' => $request->template_id,
    ]);

    return back()->with('success', 'Selected template updated!');
}

}
