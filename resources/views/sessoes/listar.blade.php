@extends('layouts.app')

@section('content')
<ol class="breadcrumb">
  <li class="breadcrumb-item">
    <a href="{{ url('/grupo/listar') }}">Meus Grupos</a>
  </li>
  <li class="breadcrumb-item active">Sessões</li>
</ol>
<meta name="csrf-token" content="{{ csrf_token() }}" />

<div class="card mb-3">
  <div class="card-header">
    <i class="fa fa-fw fa-sitemap"></i> {{ empty($grupo) ? 'Participantes' : $grupo->desc_grupo }}</div>
  <div class="card-body">
    <div class="col-xl-12 col-sm-8 mb-3">
      @include('grupo.menu')
    </div>
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
                Cadastrar Nova
            </button>
        </h2>
    </header>
    <div class="table-responsive">
      <input id="id_grupo" type="hidden" name="id_grupo" value=" {{ empty($grupo) ? '' : $grupo->id }}" />
      @if ($grupo->quantidadeSessoes() > 0)
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th>Sessão</th>
                <th>Data Sorteio</th>
                <th>Valor Presente</th>
                <th>Data Confraternizar</th>
                <th>Operações</th>
              </tr>
            </thead>
            <tbody>
              @foreach($grupo->sessoes as $sessao)
                  <tr>
                      <td>{{ $sessao->desc_sessao }}</td>
                      <td>{{ $sessao->getData($sessao->data_sorteio) }}</td>
                      <td>R$ {{ number_format($sessao->valor_presente_ate, 2, ',', '') }}</td>
                      <td>{{ $sessao->getData($sessao->data_confraternizar) }}</td>

                      <td class="text-right ">
                          <a href="#" class="btn btn-default btn-xs">
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
                  Nenhuma sessão ativa para o seu grupo, crie uma!
              </div>

        @endif
    </div>
  </div>

</div>

@include('sessoes.modal-sessoes')
<script type="text/javascript" src={{ asset('/js/sessao.js') }}></script>
@endsection
