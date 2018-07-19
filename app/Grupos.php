<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;

class Grupos extends Model
{
    use Notifiable, SoftDeletes;
    /**
     * @string  Nome da tabela no DB
     */
    protected $table = 'tab_grupos';
    /**
     * @array Campos a serem retornados para a view
     */
    protected $fillable = [
      'id',
      'desc_grupo',
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

    /**
     * Relacionamento com relação de usuários participantes do grupo.
     *
     * @return App\GruposUsuarios
     */
    public function participantes()
    {
      return $this->hasMany('\App\GruposUsuarios', 'id_grupo')->orderBy('id_usuario', 'desc');
    }
}
