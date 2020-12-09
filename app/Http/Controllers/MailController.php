<?php

/**
 * @description Controlador de gestion de gmail
 * @author Oscar Rodriguez Sedes
 * @version 2.0
 * @date 15.11.2020
 */

namespace App\Http\Controllers;

use App\Mail\Mailer;
use Illuminate\Http\Request;
use Mail;

class MailController extends Controller
{

    /**
     * Realiza un envio de email al correo de la configuracion
     * Revisar el archivo .env
     */
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
