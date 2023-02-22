<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

use App\Http\Controllers\Controller;

class MailController extends Controller
{
    public function basic_email() {
        $data = array('name'=>"receiver_name");
        Mail::send(['text'=>'mail'], $data, function($message) {
           $message->to('mayu.bhandure657@gmail.com', 'receiver_name')->subject
              ('Basic Email');
           $message->from('laravelmailsender7@gmail.com','${APP_NAME}');
        });
        echo "Basic Email Sent. Check your inbox.";
     }
     public function html_email() {
        $data = array('name'=>"receiver_name");
        Mail::send('mail', $data, function($message) {
           $message->to('mayu.bhandure657@gmail.com', 'receiver_name')->subject
              ('HTML Email');
           $message->from('laravelmailsender7@gmail.com','${APP_NAME}');
        });
        echo "HTML Email Sent. Check your inbox.";
     }
     public function attachment_email() {
        $data = array('name'=>"receiver_name");
        Mail::send('mail', $data, function($message) {
           $message->to('receiver_mail', 'receiver_name')->subject
              ('Subject');
           $message->attach('C:\xamppnew\htdocs\laravel\public\custom-image\logo.png');
           $message->from('laravelmailsender7@gmail.com','${APP_NAME}');
        });
        echo "Email Sent with attachment. Check your inbox.";
     }
}
