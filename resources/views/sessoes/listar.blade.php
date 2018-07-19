@extends('layouts.app')

@section('content')

<section class="col-md-9 col-xs-9">
    <div class="box">
        <div class="box-body">

            <meta name="csrf-token" content="{{ csrf_token() }}" />
            <div class="modal-header">
                <h5>Grupo: {{ $grupo->desc_grupo }} > Listar Sessões</h5>
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
                            <th class="header">Sessão</th>
                            <th class="header">Data Sorteio</th>
                            <th class="header">Data Confraternizar</th>
                            <th class="header">Valor Presente</th>
                            <th class="header">Operações</th>
                        </tr>
                    </thead>
                    <tbody>
                      @foreach($grupo->sessoes as $sessao)
                          <tr>
                              <td>{{ $sessao->desc_sessao }}</td>
                              <td>{{ $sessao->data_sorteio }}</td>
                              <td>{{ $sessao->valor_presente_ate }}</td>
                              <td>{{ $sessao->data_confraternizar }}</td>

                              <td class="text-right ">
                                  <a href="/grupo/exibir/{{ $sessao->id }}" class="btn btn-default btn-xs">
                                      <i class="fa fa-eye" aria-hidden="true"></i>
                                      Exibir
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
