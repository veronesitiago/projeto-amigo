@extends('layouts.app')

@section('content')

<ol class="breadcrumb">
  <li class="breadcrumb-item">
    <a href="{{ url('/usuario/dados') }}">Meus Dados</a>
  </li>
  <li class="breadcrumb-item active">Editar</li>
</ol>
<meta name="csrf-token" content="{{ csrf_token() }}" />
<div class="card mb-3">
  <div class="card-header">
    <i class="fa fa-fw fa-wrench"></i> Meus Dados</div>
  <div class="card-body">
    <form
        role="form"
        method="POST"
        action={{ route('usuarios-editar') }}
        name="frmCadastro"
        id="frmCadastro"
        novalidate
    >
        {{ csrf_field() }}
        <input id="id" type="hidden" name="id" value="{{ !empty($usuario) ? $usuario->id : ''}}" />
        <div class="modal-body clearfix">
            <div class="form-group col-md-12 col-xs-12">
                <label class="control-label" for="nome">Nome do Grupo</label>
                <input
                    type="text"
                    class="form-control"
                    name="nome"
                    id="nome"
                    maxlength="255"
                    aria-label="Nome"
                    value="{{ !empty($usuario) ? $usuario->nome : ''}}"
                    required
                />
                <label class="control-label" for="email">Email</label>
                <input
                    type="text"
                    class="form-control"
                    name="email"
                    id="email"
                    maxlength="255"
                    aria-label="Nome"
                    value="{{ !empty($usuario) ? $usuario->email : ''}}"
                    required
                />
            </div>
        </div>

            <button
                class="btn btn-primary"
                type="submit"
            >
                Salvar
            </button>

    </form>

  </div>

</div>
@endsection
