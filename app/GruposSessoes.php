<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class GruposSessoes extends Model
{
    use Notifiable, SoftDeletes;
    /**
     * @string  Nome da tabela no DB
     */
    protected $table = 'tab_grupos_sessoes';
    /**
     * @array Campos a serem retornados para a view
     */
    protected $fillable = [
      'id',
      'id_grupo',
      'desc_sessao',
      'data_sorteio',
      'valor_presente_ate',
      'data_confraternizar',
      'local',
      'data_notificacao',
      'soteio_realizado'
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
     * Metodo get para o atributo Data
     *
     * @param string $value
     */
    public function getData($value)
    {
        return Carbon::parse($value)->format('d/m/Y');
    }

    /**
     * Metódo que recupera todos os usuários da sessão
     * @return App\GruposUsuarios
     */
    public function participantes()
    {
        return GruposUsuarios::where("id_grupo", "=", $this->id_grupo)->get();
    }
}
