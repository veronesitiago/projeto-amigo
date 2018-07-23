<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use \Illuminate\Support\Facades\Input;
use \Illuminate\Support\Facades\Validator;
use App\Grupos;
use App\GruposUsuarios;

class GruposController extends Controller
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
   * Retorna todos os registros
   */
  public function getRegistros(array $uriQuery = [])
  {

    $registros = Grupos::withTrashed()->where('id_moderador', Auth::user()->id);
    // Necessário implementar rotina para contemplar os grupos que o usuário não é moderador, é apenas participante
    // $registros = GruposUsuarios::where('id_usuario', Auth::user()->id);

    if (!empty($uriQuery)) {
        if (!isset($uriQuery['id'])) return $registros->where('id', $uriQuery['id'])->paginate(15);

        return [];
    }

    return $registros->paginate(15);
  }

  /**
   * Metódo com regras para inserção ou edição
   */
  protected function regrasSalvar()
  {
    return [
      "desc_grupo" => "required|string|max:255",
      "observacao" => "string|max:500"
    ];
  }

  public function cadastro()
  {
    return view('grupo.cadastrar');
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

    $grupo = Grupos::findOrNew($request->id);
    $grupo->id_moderador = Auth::user()->id;
    $grupo->desc_grupo = $request->desc_grupo;
    $grupo->observacao = $request->observacao;

    try {
      $grupo->save();
      if (empty($request->id)) {
        $participantes = new GruposUsuarios;
        $participantes->id_grupo = $grupo->id;
        $participantes->id_usuario = Auth::user()->id;
        $participantes->save();
      }
      return back()->with("success", ["Grupo registrado com sucesso."]);

    } catch (\Illuminate\Database\QueryException $e) {
      return back()->withErrors(["Não foi possível concluir a operação, tente novamente."]);
    }

  }

  /**
   * Exibe os dados de registro
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function exibir(int $id)
  {
    $arrRetorno = [
      'grupo' => Grupos::findOrFail($id)
    ];
    return view('grupo.cadastrar', $arrRetorno);
  }

  /**
   * Convidar Participantes para o grupo
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function convidar(int $id)
  {
    $arrRetorno = [
      'grupo' => Grupos::findOrFail($id)
    ];
    return view('grupo.convidar', $arrRetorno);
  }

  /**
   * Participantes do grupo
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function participantes(int $id)
  {
    $arrRetorno = [
      'grupo' => Grupos::findOrFail($id)
    ];

    return view('grupo.participantes', $arrRetorno);
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

}
