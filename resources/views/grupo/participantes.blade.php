@extends('layouts.app')

@section('content')

<section class="col-md-8 col-xs-8">
    <div class="box">
        <div class="box-body">

            <meta name="csrf-token" content="{{ csrf_token() }}" />
            <div class="modal-header">
                <h5>Grupo: {{ $grupo->desc_grupo }} > Listar Participantes</h5>
            </div>

            <nav class="navbar navbar-page">
                <div class="container-fluid no-padding">
                    @include('grupo.menu')
                </div>
            </nav>

            <div class="table-new-responsive">

                <table class="table table-striped table-vagas-abertas-admin tablesorter">
                    <thead>
                        <tr>
                            <th class="header">Nome</th>
                            <th class="header">Email</th>
                            <th class="header">Lista de Desejos</th>
                            <th class="header">Operações</th>
                        </tr>
                    </thead>
                    <tbody>
                      @foreach($grupo->participantes as $participante)
                          <tr>
                              <td>{{ $participante->dados->nome }}</td>
                              <td>{{ $participante->dados->email }}</td>
                              <td>
                                <a href="/usuario/lista-desejo/{{ $participante->id_usuario }}" class="btn btn-default btn-xs">
                                    <i class="fa fa-eye" aria-hidden="true"></i>
                                    Ver
                                </a>
                              </td>

                              <td class="text-right ">
                                  <a href="/grupo/exibir/{{ $participante->id_usuario }}" class="btn btn-default btn-xs">
                                      <i class="fa fa-eye" aria-hidden="true"></i>
                                      Editar
                                  </a>
                              </td>
                          </tr>
                      @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>



@endsection
