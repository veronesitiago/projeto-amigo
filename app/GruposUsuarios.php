<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class GruposUsuarios extends Model
{
    use Notifiable, SoftDeletes;
    /**
     * @string  Nome da tabela no DB
     */
    protected $table = 'tab_grupos_usuarios';
    /**
     * @array Campos a serem retornados para a view
     */
    protected $fillable = [
      'id',
      'id_grupo',
      'id_usuario'
    ];

    /**
     * @array Campos protegidos
     */
    protected $hidden = [
      'created_at',
      'updated_at',
      'deleted_at'
    ];

    /**
     * Relacionamento com usuários participantes.
     *
     * @return App\User
     */
    public function dados()
    {
        return $this->hasOne('\App\User', 'id', 'id_usuario');
    }


    public function grupos()
    {
       return $this->hasOne('\App\Grupos', 'id', 'id_grupo');
    }
}
