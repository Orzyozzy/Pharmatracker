<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Nexmo\Laravel\Facades\Nexmo;

class SmsController extends Controller
{
    public function sendMessage()
    {
        Nexmo::message()->send([
            'to'   => '09062328286 ',
            'from' => '09062328286',
            'text' => 'Using the facade to send a message.'
        ]);
        echo "Message Sent Successfully";
    }
}
