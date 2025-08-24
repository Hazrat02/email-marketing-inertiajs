<?php

namespace App\Jobs;

use App\Mail\ContactMail;
use App\Models\order;
use App\Models\order_email_log;
use App\Models\Smtp;
use App\Models\User;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Support\Facades\Mail;

class SendBulkMailJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $smtpId;
    protected $to;
    protected $subject;
    protected $body;

    protected $fromName;
    protected $fromEmail;
    protected $order_id;
    protected $user_id;

    public function __construct($smtpId, $to, $fromName, $fromEmail, $subject, $body, $order_id, $user_id)
    {


        $this->smtpId = $smtpId;
        $this->to = $to;

        $this->fromName = $fromName;
        $this->fromEmail = $fromEmail;
        $this->subject = $subject;
        $this->body = $body;
        $this->order_id = $order_id;
        $this->user_id = $user_id;
    }

    public function handle()
    {
        $smtp = Smtp::find($this->smtpId);
        $order =order::find($this->order_id);


        // Change mail config dynamically
        config([
            'mail.mailers.smtp.host'       => $smtp->host,
            'mail.mailers.smtp.port'       => $smtp->port,
            'mail.mailers.smtp.encryption' => $smtp->encryption,
            'mail.mailers.smtp.username'   => $smtp->username,
            'mail.mailers.smtp.password'   => $smtp->password,
            'mail.from.address'            => $smtp->from_address,
            'mail.from.name'               => $this->fromName,
        ]);
        try {
            Mail::to($this->to)->send(
                new ContactMail(
                    $this->fromName,
                    $this->fromEmail,
                    $this->subject,
                    $this->body
                )
            );

            $order->increment('success');


        } catch (\Throwable $th) {
            order_email_log::create(
                [
                    'order_id' => $this->order_id,
                    'user_id' => $this->user_id,
                    'email' => $this->to,
                    'status' => 'failed',
                    'response' => $th->getMessage()
                ]
            );
            return;
        }
    }
}
