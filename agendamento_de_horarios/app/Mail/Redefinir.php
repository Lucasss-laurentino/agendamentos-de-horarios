<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class redefinir extends Mailable
{
    use Queueable, SerializesModels;

    public $url;
    public $email_usuario;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($email_usuario, $url)
    {
        //
        $this->email_usuario = $email_usuario;
        $this->url = $url;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('desenvolvedorphptestes@gmail.com')->markdown('redefinir_senha');
    }
}
