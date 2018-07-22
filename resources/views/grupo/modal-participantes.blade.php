<div class="modal fade" id="modalEditarCadastrar" tabindex="-1" role="dialog" aria-labelledby="modalEditarCadastrar">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">Convidar amigos</h4>
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
                <div class="modal-body clearfix">
                    <div class="form-group col-md-12 col-xs-12">
                        <label class="control-label" for="email">Email</label>
                        <input
                            type="text"
                            class="form-control"
                            name="email"
                            id="email"
                            maxlength="100"
                            required
                            aria-label="Nome"
                        />
                    </div>

                    <div class="form-group col-md-12 col-xs-12">
                        <label class="control-label" for="mensagem">Mensagem</label>
                        <textarea class="form-control" name="mensagem" rows="3" id="mensagem" maxlength="500"></textarea>
                    </div>

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
                        Enviar
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
