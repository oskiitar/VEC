<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class Mailer extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('contacto.mensaje')
            ->subject('Contacto - VEC')
            ->with([
                'name' => $this->data['name'],
                'email' => $this->data['email'],
                'msg' => $this->data['msg']
            ]);
    }
}
