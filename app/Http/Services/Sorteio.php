<?php

namespace App\Http\Services;

use Illuminate\Support\Carbon;
use App\GruposSessoes;
use App\GruposSessoesSorteio;

class Sorteio
{
    public function verificar()
    {
        $sessoes = GruposSessoes::where("soteio_realizado",0)
                   ->where("data_sorteio", "<=", Carbon::now())
                   ->get();

        $sessoes->each(function($sessao){
          $this->sorteio($sessao->id, $sessao->id_grupo, $sessao->participantes());

          $sessao->update(['soteio_realizado' => 1]);
        });
    }

    private function sorteio(int $idSessao, int $idGrupo, $Participantes)
    {
        $arrParticipantes = $Participantes->pluck('id_usuario')->toArray();

        $arrAmigos = $arrParticipantes;

        foreach ($arrParticipantes as $participante) {

          $indiceAmigo = $this->sortearAmigo($arrAmigos, $participante);

          $registrar = new GruposSessoesSorteio;
          $registrar->id_sessao = $idSessao;
          $registrar->id_usuario = $participante;
          $registrar->id_amigo = $arrAmigos[$indiceAmigo];
          $registrar->save();

        }
    }

    private function sortearAmigo(array $arrParticipantes, $indiceUsuario)
    {
        $indiceAmigo = array_rand($arrParticipantes);

        while ($arrParticipantes[$indiceAmigo] == $indiceUsuario) {
          $indiceAmigo = array_rand($arrParticipantes);
        }
        return $indiceAmigo;
    }

}
