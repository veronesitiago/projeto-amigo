<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
/**
 *  Classe dos usuários registrados no projeto
 */
class User extends Authenticatable
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
      'password',
      'sexo'
    ];

    /**
     * @array Campos protegidos
     */
    protected $hidden = [
      'password',
      'created_at',
      'updated_at',
      'deleted_at',
      'remember_token'
    ];

}
