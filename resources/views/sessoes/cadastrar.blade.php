@extends('layouts.app')

@section('content')

<section class="col-md-6 col-xs-6">
    <div class="box">
        <div class="box-body">

            <meta name="csrf-token" content="{{ csrf_token() }}" />

            <div class="modal-header">

                @if(!empty($grupo))
                    <h5>Grupo: {{ $grupo->desc_grupo }} > Cadastrar Sessão </h5>
                @else
                    <h5>Grupos > Cadastrar</h5>
                @endif
            </div>

            <nav class="navbar navbar-page">
                <div class="container-fluid no-padding">
                    @include('grupo.menu')
                </div>
            </nav>

            <nav class="navbar navbar-page">
                <div class="container-fluid no-padding">
                    @include('sessoes.menu')
                </div>
            </nav>
            <form
                role="form"
                method="POST"
                action={{ route('sessao-cadastrar') }}
                name="frmCadastro"
                id="frmCadastro"
                novalidate
            >
                {{ csrf_field() }}
                <input id="id_grupo" type="hidden" name="id_grupo" value="{{ $grupo->id }}"/>
                <input id="id_sessao" type="hidden" name="id" />
                <div class="modal-body clearfix">
                    <div class="form-group col-md-12 col-xs-12">
                        <label class="control-label" for="desc_sessao">Nome da Sessão</label>
                        <input
                            type="text"
                            class="form-control"
                            name="desc_sessao"
                            id="desc_sessao"
                            maxlength="255"
                            aria-label="Nome"
                            value="{{ !empty($sessao) ? $sessao->desc_sessao : ''}}"
                            required
                        />
                    </div>

                    <div class="form-group col-md-4 col-xs-12">
                        <label class="control-label" for="data_sorteio">Data Sorteio</label>
                        <div class="input-group" id="datepicker-data_sorteio">
                            <input type="text" class="form-control" id="data_sorteio" name="data_sorteio" value="" data-mask="99/9999" data-mask-persist required>
                            <span class="input-group-addon">
                                <i class="fa fa-calendar" aria-hidden="true"></i>
                            </span>
                        </div>
                    </div>
                    <div class="form-group col-md-4 col-xs-12">
                        <label class="control-label" for="data_sorteio">Data Confraternização</label>
                        <div class="input-group" id="datepicker-data_confraternizar">
                            <input type="text" class="form-control" id="data_confraternizar" name="data_confraternizar" value="" data-mask="99/9999" data-mask-persist required>
                            <span class="input-group-addon">
                                <i class="fa fa-calendar" aria-hidden="true"></i>
                            </span>
                        </div>
                    </div>
                    <div class="form-group col-md-12 col-xs-12">
                        <label class="control-label" for="local">Valor do Presente</label>
                        <input
                            type="text"
                            class="form-control"
                            name="valor_presente_ate"
                            id="valor_presente_ate"
                            maxlength="255"
                            aria-label="Nome"
                            value="{{ !empty($sessao) ? $sessao->valor_presente_ate : ''}}"
                            required
                        />
                    </div>
                    <div class="form-group col-md-12 col-xs-12">
                        <label class="control-label" for="local">Local</label>
                        <input
                            type="text"
                            class="form-control"
                            name="local"
                            id="local"
                            maxlength="255"
                            aria-label="Nome"
                            value="{{ !empty($sessao) ? $sessao->local : ''}}"
                            required
                        />
                    </div>
                </div>
                <div class="modal-footer text-center">
                    <button
                        class="btn btn-primary"
                        type="submit"
                    >
                        Salvar
                    </button>
                </div>
            </form>


        </div>
    </div>
</section>

@endsection
