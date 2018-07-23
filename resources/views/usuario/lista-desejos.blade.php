@extends('layouts.app')

@section('content')

<ol class="breadcrumb">
  <li class="breadcrumb-item">
    <a href="{{ url('/usuario/dados') }}">Meus Dados</a>
  </li>
  <li class="breadcrumb-item active">Exibir</li>
</ol>
<meta name="csrf-token" content="{{ csrf_token() }}" />

<div class="card mb-3">
  <div class="card-header">
    <i class="fa fa-fw fa-sitemap"></i> Lista de Desejos</div>
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

        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>Descrição</th>
              <th>Valor</th>
              <th>Link</th>
              <th>Operações</th>
            </tr>
          </thead>
          <tbody>
            @foreach($usuario->listaDesejo() as $item)
                <tr>
                    <td>{{ $item->desc_item }}</td>
                    <td> {{ $item->valor }} </td>
                    <td> {{ $item->link }} </td>

                    <td class="text-right ">
                        <button type="button" class="btn btn-primary btn-xs  table-icon" data-toggle="modal" data-id="{{ $item->id }}" data-target="#modalEditarCadastrar">
                            <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                            Editar
                        </button>
                    </td>

                </tr>
            @endforeach
          </tbody>
        </table>
      @if (!empty($usuario->listaDesejo()))
      @else

            <div
                id="noResult"
                class="well text-center center col-md-8 col-xs-12"
                role="alert"
            >
                Nenhum item encontrado! Cadastre agora!
            </div>

      @endif
    </div>
  </div>

</div>
@include('usuario.modal-item')
<script type="text/javascript" src={{ asset('/js/item-lista.js') }}></script>
@endsection
