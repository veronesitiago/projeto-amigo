@extends('layouts.app')

@section('content')

<ol class="breadcrumb">
  <li class="breadcrumb-item">
    <a href="#">Meus Grupos</a>
  </li>
  <li class="breadcrumb-item active">Listar</li>
</ol>
<meta name="csrf-token" content="{{ csrf_token() }}" />

<div class="card mb-3">
  <div class="card-header">
    <i class="fa fa-fw fa-sitemap"></i> Grupos</div>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>Grupo</th>
            <th>Participantes</th>
            <th>Sessões</th>
            <th>Operações</th>
          </tr>
        </thead>
        <tbody>
          @foreach($grupos as $grupo)
              <tr>
                  <td>{{ $grupo->desc_grupo }}</td>
                  <td> {{ $grupo->quantidadeParticipantes() }} </td>
                  <td> {{ $grupo->quantidadeSessoes() }} </td>

                  <td class="text-right ">
                      <a href="/grupo/exibir/{{ $grupo->id }}" class="btn btn-default btn-xs">
                          <i class="fa fa-eye" aria-hidden="true"></i>
                          Exibir
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
@endsection
