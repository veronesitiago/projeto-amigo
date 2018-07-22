@extends('layouts.app')

@section('content')

<ol class="breadcrumb">
  <li class="breadcrumb-item">
    <a href="#">Meus Grupos</a>
  </li>
  <li class="breadcrumb-item active">Participantes</li>
</ol>
<meta name="csrf-token" content="{{ csrf_token() }}" />

<div class="card mb-3">
  <div class="card-header">
    <i class="fa fa-fw fa-sitemap"></i> {{ empty($grupo) ? 'Participantes' : $grupo->desc_grupo }}</div>
  <div class="card-body">
    <div class="col-xl-12 col-sm-8 mb-3">
      @include('grupo.menu')
    </div>
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>Nome</th>
            <th>Email</th>
            <th>Lista de Desejos</th>
            <th>Operações</th>
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
@endsection
