@extends('layouts.app')

@section('content')

<ol class="breadcrumb">
  <li class="breadcrumb-item">
    <a href="{{ url('/grupo/listar') }}">Meus Grupos</a>
  </li>
  <li class="breadcrumb-item active">{{ empty($grupo) ? 'Cadastrar' : 'Editar' }}</li>
</ol>
<meta name="csrf-token" content="{{ csrf_token() }}" />
<div class="card mb-3">
  <div class="card-header">
    <i class="fa fa-fw fa-sitemap"></i> {{ empty($grupo) ? 'Cadastrar' : $grupo->desc_grupo }}</div>
  <div class="card-body">
    <div class="col-xl-12 col-sm-8 mb-3">
      @include('grupo.menu')
    </div>
    <form
        role="form"
        method="POST"
        action={{ route('grupo-cadastrar') }}
        name="frmCadastro"
        id="frmCadastro"
        novalidate
    >
        {{ csrf_field() }}
        <input id="id" type="hidden" name="id" value="{{ !empty($grupo) ? $grupo->id : ''}}" />
        <div class="modal-body clearfix">
            <div class="form-group col-md-12 col-xs-12">
                <label class="control-label" for="desc_grupo">Nome do Grupo</label>
                <input
                    type="text"
                    class="form-control"
                    name="desc_grupo"
                    id="desc_grupo"
                    maxlength="255"
                    aria-label="Nome"
                    value="{{ !empty($grupo) ? $grupo->desc_grupo : ''}}"
                    required
                />
                <label class="control-label" for="observacao">Observação</label>
                <input
                    type="text"
                    class="form-control"
                    name="observacao"
                    id="observacao"
                    maxlength="255"
                    aria-label="Observação"
                    value="{{ !empty($grupo) ? $grupo->observacao : ''}}"
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
