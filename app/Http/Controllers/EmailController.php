<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;


class EmailController extends Controller
{

  public function convidar(Request $request){

    Mail::send('Email.participante-convite', [], function ($message)
    {
      $message->from('tiagoveronesi@gmail.com', 'Tiago Veronesi');

      $message->to('tiagoveronesi@gmail.com');

    });
    return back()->with('success', ['Convite enviado com sucesso']);
  }
}
