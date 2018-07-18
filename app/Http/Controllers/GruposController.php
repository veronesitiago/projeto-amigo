<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \Illuminate\Support\Facades\Input;
use \Illuminate\Support\Facades\Validator;
use App\Grupos;

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
      $grupos = $this->getRegistros();

      $arrRetorno = [
        'grupos' => $grupos
      ];
      return view('grupo.listar', $arrRetorno);
  }

  /**
   * Retorna todos os registros
   */
  public function getRegistros()
  {
    return Grupos::all();
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
    $grupo->desc_grupo = $request->desc_grupo;
    $grupo->observacao = $request->observacao;

    try {
      $grupo->save();
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

}
