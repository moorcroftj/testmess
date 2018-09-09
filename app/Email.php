<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Mail;

class Email extends Model
{
    public static function sendRawEmail( $from, $to, $bodytext, $subject) {
        $messagebody = htmlspecialchars($bodytext);
        Mail::raw($messagebody, function ($message) use ($messagebody, $subject, $to ) {
            $message->subject($subject );
            $message->from('emails@xxx.com');
            $message->to($to);
        });

        return "ok";
    }
}
