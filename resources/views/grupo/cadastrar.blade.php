@extends('layouts.app')

@section('content')

<section class="col-md-6 col-xs-6">
    <div class="box">
        <div class="box-body">

            <meta name="csrf-token" content="{{ csrf_token() }}" />

            <div class="modal-header">
                <h5>Grupos > Cadastrar</h5>
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
                <input id="id_grupo" type="hidden" name="id" />
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
