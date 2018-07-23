@extends('layouts.app')

@section('content')

<section class="col-md-6 col-xs-6">
    <div class="box">
        <div class="box-body">

            <meta name="csrf-token" content="{{ csrf_token() }}" />

            <div class="modal-header">
                <h5>Grupos > {{ $grupo->desc_grupo }} > Convidar Participantes</h5>
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
                        <label class="control-label" for="email">Email do participante</label>
                        <input
                            type="text"
                            class="form-control"
                            name="email"
                            id="email"
                            maxlength="255"
                            aria-label="Nome"
                            required
                        />
                    </div>
                </div>
                <div class="modal-footer text-center">
                    <button
                        class="btn btn-primary"
                        type="submit"
                    >
                        Enviar
                    </button>
                </div>
            </form>


        </div>
    </div>
</section>



@endsection
