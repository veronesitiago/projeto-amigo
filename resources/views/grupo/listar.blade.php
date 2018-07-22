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
    <header class="box-header">
        <h2>
            <button
                class="btn btn-primary btn-xs"
                id="cadastrar"
                type="button"
                data-toggle="modal"
                data-target="#modalEditarCadastrar"
                data-tipo="Cadastrar"
            >
                <i class="fa fa-plus" aria-hidden="true"></i>
                Cadastrar Novo
            </button>
        </h2>
    </header>
    <div class="table-responsive">
      @if (!$grupos->isEmpty())
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
                    </td>
                </tr>
            @endforeach
          </tbody>
        </table>
      @else

            <div
                id="noResult"
                class="well text-center center col-md-8 col-xs-12"
                role="alert"
            >
                Nenhum grupo encontrado! Crie um e convide seus amigos!
            </div>

      @endif
    </div>
  </div>

</div>
@include('grupo.modal-grupo')
<script type="text/javascript" src={{ asset('/js/grupo.js') }}></script>
@endsection
