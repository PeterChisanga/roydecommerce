<?php

namespace App\Http\Controllers;

use PHPMailer\PHPMailer\PHPMailer;
use Illuminate\Http\Request;
use Exception;
use Mail;
use App\Mail\MailNotify;
use App\Mail\AdminMessage;

class MailController extends Controller
{
    public function index(Request $req){
        $data = [
            'subject'=> $req->subject,
            'message'=> $req->message,

        ];

        try {
            Mail::to($req->email)->send(new AdminMessage($data));
            return response()->json(['Email sent successfully']);
        } catch (\Exception $e) {
            \Log::error($e->getMessage());
            dd($e->getMessage()); // Dump and die to inspect the error message
            return response()->json(['Sorry something went wrong']);
        }
    
    }
}
