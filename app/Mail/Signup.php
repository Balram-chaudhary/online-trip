<?php
namespace App\Mail;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Jobs\Signupjob;
class Signup extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    Protected $maildata;
    public function __construct($data)
    {
       $this->maildata=$data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $mail_data=$this->maildata;
        return $this->subject('Create Your Password')
                    ->view('email.signup',['maildata'=>$mail_data]);
    }
}
