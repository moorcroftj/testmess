<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Request;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public static function sendmessage() {
    	$sendemailflag = 0;
    	//inputs a message from the contact form
    	$request = Request::all();
    	$data = array();

    	$Message = new \App\Messages;
    	$Message->name=$request['name'];
    	$Message->email=$request['email'];
    	$Message->subject = $request['subject'];
    	$Message->message = substr($request['message'],0, 190);
    	$Message->save();

    	if ($Message) {
    		if ($sendemailflag!=0) {
    			//remove this flag if you want to send emails
	    		// Send admins message
	    		$adminmessage = 'Email from ' . $request['name'] . ' ' . $request['email'] . '\r\n';
	    		$adminmessage .=  'Subject: ' . $request['subject'] . '\r\n';
	    		$adminmessage .=  'Message: ' . $request['message'];
	    		\App\Email::sendRawEmail('admins@fullcomm.com', 'admins@fullcomm.com', $request['subject'], $adminmessage);

	    		// Send User message
	     		$usermessage = 'Hi' . $request['name'] .  '\r\n';
	    		$usermessage .=  'Subject: ' . $request['subject'] . '\r\n';
	    		$usermessage .=  'Your message has been received. Thank you.';
	    		\App\Email::sendRawEmail($request['email'], 'admins@fullcomm.com', $request['subject'], $usermessage);  
    		} 		
    	}
    	return view('emailsent')->with('data');
    }

    public static function readmessage() {
    	// returns list of all messages
    	$data = \App\Messages::readmessage();
    	return view('messages')->with('data', $data);
    }
}
