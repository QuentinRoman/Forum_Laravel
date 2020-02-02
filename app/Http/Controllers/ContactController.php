<?php

namespace App\Http\Controllers;

use App\Mail\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect, Illuminate\Support\Facades\Response, Illuminate\Support\Facades\DB, Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function sendEmail()
    {
        $user = auth()->user();
        Mail::to($user)->send(new Contact($user));

        if (Mail::failures()) {
            return response()->Fail('Sorry! Please try again latter');
        }else{
            return response()->success('Great! Successfully send in your mail');
        }
    }
}
