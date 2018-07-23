<div class="modal fade" id="modalInserirParticipante" tabindex="-1" role="dialog" aria-labelledby="modalInserirParticipante">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">Inserir participantes</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <form
                role="form"
                method="POST"
                action={{ route('grupo-convidar') }}
                name="formEditaCargo"
                id="formEditaCargo"
                novalidate
            >
                {{ csrf_field() }}
                <input id="id_grupo" type="hidden" name="id_grupo" value=" {{ empty($grupo) ? '' : $grupo->id }}" />

                <div class="form-group col-md-6 col-xs-12">
                    <label class="control-label" for="usuario">Participante</label>
                    <select class="form-control" name="id_usuario" id="usuario" required>
                        <option value="">Escolha a opção</option>
                        @foreach($usuarios as $usuario)
                            <option value="{{ $usuario->id }}">{{ $usuario->nome }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="modal-footer text-center">
                    <button
                        type="button"
                        class="btn btn-default"
                        data-dismiss="modal"
                    >
                        Cancelar
                    </button>
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
</div>
