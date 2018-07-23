<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Carbon;

class GruposSessoesSorteio extends Model
{
    use Notifiable, SoftDeletes;
    /**
     * @string  Nome da tabela no DB
     */
    protected $table = 'tab_grupos_sessoes_sorteios';
    /**
     * @array Campos a serem retornados para a view
     */
    protected $fillable = [
      'id',
      'id_sessao',
      'id_usuario',
      'id_amigo',
    ];

    /**
     * @array Campos protegidos
     */
    protected $hidden = [
      'created_at',
      'updated_at',
      'deleted_at'
    ];
}
