<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class UsuarioListaDesejo extends Model
{
    use Notifiable, SoftDeletes;
    /**
     * @string  Nome da tabela no DB
     */
    protected $table = 'tab_usuarios_desejos';
    /**
     * @array Campos a serem retornados para a view
     */
    protected $fillable = [
      'id',
      'id_usuario',
      'desc_item',
      'valor',
      'link',
      'observacao'
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
