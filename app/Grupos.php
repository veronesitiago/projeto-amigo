<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Carbon;

use App\GruposUsuarios;
use App\GruposSessoes;

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

    /**
     * Relacionamento com relação de sessões participantes do grupo.
     *
     * @return App\GruposSessoes
     */
    public function sessoes()
    {
      return $this->hasMany('\App\GruposSessoes', 'id_grupo')->orderBy('data_confraternizar', 'desc');
    }

    /**
     * Metódo para pegar a quantidade de participantes do grupo
     */
    public function quantidadeParticipantes()
    {
        return GruposUsuarios::where("id_grupo", "=", $this->id)->get()->count();
    }

    /**
     * Metódo para pegar a quantidade de sessões do grupo
     */
    public function quantidadeSessoes()
    {
        return GruposSessoes::where("id_grupo", "=", $this->id)
                ->where(function($subCondicao){
                  $subCondicao->where('data_sorteio', ">", Carbon::now())
                    ->orWhere('data_confraternizar', ">", Carbon::now());
                })
                ->get()
                ->count();
    }

    /**
     * Metódo para retornar as sessões que ainda não foram notificadas
     */
    public function novasSessoes()
    {
      return GruposSessoes::whereNull("data_notificacao")->get();
    }

    public function sessoesSemSorteio()
    {
      return GruposSessoes::whereNull("soteio_realizado")->where("data_sorteio", "<=", Carbon::now())->get();
    }
}
