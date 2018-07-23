<?php

namespace App\Email;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class emailNovaSessao extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Array contendo os dados que serão enviados para
     * o template do blade da mensagem
     *
     * @var array
     */
    private $arrayDados;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($participante)
    {
        $this->arrayDados = [
            'participante' => $participante->dados
        ];
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $this->subject('Nova sessão de amigo secreto cadastrada');

        return $this->view('Email.participante-nova-sessao', $this->arrayDados);
    }
}
