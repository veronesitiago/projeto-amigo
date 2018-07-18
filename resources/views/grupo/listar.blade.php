@extends('layouts.app')

@section('content')

<section class="col-md-8 col-xs-8">
    <div class="box">
        <div class="box-body">

            <meta name="csrf-token" content="{{ csrf_token() }}" />
            <div class="modal-header">
                <h5>Grupos > Listar</h5>
            </div>

            <div class="table-new-responsive">

                <table class="table table-striped table-vagas-abertas-admin tablesorter">
                    <thead>
                        <tr>
                            <th class="header">Grupo</th>
                            <th class="header">Participantes</th>
                            <th class="header">Status</th>
                            <th class="header">Operações</th>
                        </tr>
                    </thead>
                    <tbody>
                      @foreach($grupos as $grupo)
                          <tr>
                              <td>{{ $grupo->desc_grupo }}</td>
                              <td> 02 </td>
                              <td> Encerrado ou Não </td>

                              <td class="text-right ">
                                  <a href="/grupo/exibir/{{ $grupo->id }}" class="btn btn-default btn-xs">
                                      <i class="fa fa-eye" aria-hidden="true"></i>
                                      Editar
                                  </a>
                                  <a href="/grupo/convidar/{{ $grupo->id }}" class="btn btn-default btn-xs">
                                    <i class="fa fa-eye" aria-hidden="true"></i>
                                      Convidar
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
