<?php

namespace App\Http\Services;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Carbon;

use App\Grupos;
use App\Email\emailNovaSessao;


/**
 * Classe responsável por gerenciar os envios de e-mail
 */
class Email
{

  /**
   * Metódo responsável por gerenciar todas as sessões que ainda não foram notificadas aos participantes
   */
  public function emailNovaSessao()
  {
      $Grupos = new Grupos;

      $Grupos->novasSessoes(6, 1)->each(function ($sessao) {
          $sessao->participantes(6, 1)->each(function($participante){

              Mail::to($participante->dados->email)->later(
                Carbon::now()->addSeconds(2), new emailNovaSessao($participante)
              );
          });

          $sessao->update(['data_notificacao' => Carbon::now()]);

      });
  }

}
