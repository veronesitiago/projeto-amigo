<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \Illuminate\Support\Facades\Input;
use \Illuminate\Support\Facades\Validator;
use App\Grupos;
use App\GruposSessoes;

class SessoesController extends Controller
{
  /**
   * Create a new controller instance.
   *
   * @return void
   */
  public function __construct()
  {
      $this->middleware('auth');
  }

  /**
   * Show the application
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
      $query = request()->query();

      $grupos = $this->getRegistros($query);

      $arrRetorno = [
        'query' => $query,
        'grupos' => $grupos
      ];
      return view('grupo.listar', $arrRetorno);
  }
  /**
   * Sessões do grupo
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function listaSessoes(int $id)
  {
    $arrRetorno = [
      'grupo' => Grupos::findOrFail($id)
    ];

    return view('sessoes.listar', $arrRetorno);
  }

  /**
   * Método que edita ou salva uma model
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function registrar(Request $request)
  {
    $validator = Validator::make(Input::all(), $this->regrasSalvar());

    if ($validator->fails()) {
        return back()->withErrors($validator->messages());
    }

    $sessao = GruposSessoes::findOrNew($request->id);

    $data_sorteio = date_create_from_format('d/m/Y', $request->data_sorteio);
    $data_confraternizar = date_create_from_format('d/m/Y', $request->data_confraternizar);

    $sessao->id_grupo = $request->id_grupo;
    $sessao->desc_sessao = $request->desc_sessao;
    $sessao->data_sorteio = $data_sorteio;
    $sessao->valor_presente_ate = $request->valor_presente_ate;
    $sessao->data_confraternizar = $data_confraternizar;
    $sessao->local = $request->local;

    try {
      $sessao->save();
      return back()->with("success", ["Sessão registrada com sucesso."]);

    } catch (\Illuminate\Database\QueryException $e) {

      return back()->withErrors(["Não foi possível concluir a operação, tente novamente."]);
    }

  }
  /**
   * Metódo com regras para inserção ou edição
   */
  protected function regrasSalvar()
  {
    return [
      "id_grupo" => "required|integer|exists:tab_grupos,id",
      "desc_sessao" => "required|string|max:255",
      "local" => "required|string|max:500"
    ];
  }

}
