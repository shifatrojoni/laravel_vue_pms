<?php


namespace App\Mail;

use Illuminate\Bus\Queuable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ForgotPasswordMail extends Mailable{
    use Queuable,SerializesModels;
    public $user;

    public function __construct($user){
        $this->user = $user;
    }
    public function build(){
        return $this->markdown('emails.forgot_password')->subject(config('app.name'),',','Forgot password');
    }
}