<div class="modal fade" id="modalEditarCadastrar" tabindex="-1" role="dialog" aria-labelledby="modalEditarCadastrar">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">{{ empty($item) ? 'Cadastrar' : 'Editar' }} Item</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <form
                role="form"
                method="POST"
                action={{ route('item-cadastrar') }}
                name="formEditaCargo"
                id="formEditaCargo"
                novalidate
            >
                {{ csrf_field() }}
                <input id="id_usuario" type="hidden" name="id_usuario" value=" {{ empty($usuario) ? '' : $usuario->id }}" />
                <input id="id" type="hidden" name="id" value=" {{ empty($item) ? '' : $item->id }}" />
                <div class="modal-body clearfix">
                    <div class="form-group col-md-12 col-xs-12">
                        <label class="control-label" for="desc_item">Descrição do item</label>
                        <input
                            type="text"
                            class="form-control"
                            name="desc_item"
                            id="desc_item"
                            maxlength="100"
                            required
                            aria-label="Nome"
                            value=" {{ empty($item) ? '' : $item->desc_item }}"
                        />
                    </div>

                    <div class="form-group col-md-4 col-xs-12">
                        <label class="control-label" for="valor">Valor</label>
                        <input
                          type="text"
                          class="form-control"
                          id="valor"
                          maxlength="200"
                          name="valor"
                          required
                          value=" {{ empty($item) ? '' : $item->valor }}">
                    </div>

                    <div class="form-group col-md-12 col-xs-12">
                        <label class="control-label" for="link">Link</label>
                        <textarea class="form-control" name="link" rows="3" id="link" maxlength="255" >{{ empty($item) ? '' : $item->link }}</textarea>
                    </div>

                    <div class="form-group col-md-12 col-xs-12">
                        <label class="control-label" for="observacao">Observação</label>
                        <textarea class="form-control" name="observacao" rows="3" id="observacao" maxlength="500" >{{ empty($item) ? '' : $item->observacao }}</textarea>
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
                        Salvar
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
