<?php

namespace App\Http\Controllers;

use App\Mail\Mailer;
use Illuminate\Http\Request;
use Mail;

class MailController extends Controller
{
    public function sendMail(Request $data)
    {
        $data = [
            'name' => $data->name,
            'email' => $data->email,
            'msg' => $data->msg,            
        ];

        Mail::to(env('MAIL_FROM_ADDRESS'))->send(new Mailer($data));

        return view('contacto.mensajeEnviado');
    }
}
