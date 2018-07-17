<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 *  Classe dos usuários registrados no projeto
 */
class Usuarios extends Model
{
    use Notifiable, SoftDeletes;
    /**
     * @string  Nome da tabela no DB
     */
    protected $table = 'tab_usuarios';

    /**
     * @array Campos a serem retornados para a view
     */
    protected $fillable = [
      'id',
      'nome',
      'email',
      'senha',
      'sexo'
    ];

    /**
     * @array Campos protegidos
     */
    protected $hidden = [
      'senha',
      'created_at',
      'updated_at',
      'deleted_at',
      'remember_token'
    ];

}
