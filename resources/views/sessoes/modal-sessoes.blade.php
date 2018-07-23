<div class="modal fade" id="modalEditarCadastrar" tabindex="-1" role="dialog" aria-labelledby="modalEditarCadastrar">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">Cadastrar Sessão</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <form
                role="form"
                method="POST"
                action={{ route('sessao.cadastrar') }}
                name="formEditaCargo"
                id="formEditaCargo"
                novalidate
            >
                {{ csrf_field() }}
                <input id="id_grupo" type="hidden" name="id_grupo" value=" {{ empty($grupo) ? '' : $grupo->id }}" />
                <div class="modal-body clearfix">
                    <div class="form-group col-md-12 col-xs-12">
                        <label class="control-label" for="desc_sessao">Nome da sessão</label>
                        <input
                            type="text"
                            class="form-control"
                            name="desc_sessao"
                            id="desc_sessao"
                            maxlength="100"
                            required
                            aria-label="Nome"
                        />
                    </div>
                    <div class="form-group col-md-6 col-xs-12 center">
                        <label class="control-label" for="data_sorteio">Data Sorteio</label>
                        <div class="input-group date" id="datetime">
                            <input type="text" class="form-control" name="data_sorteio" id="data_sorteio" required>
                        </div>
                    </div>

                    <div class="form-group col-md-4 col-xs-12">
                        <label class="control-label" for="valor_presente_ate">Valor Presente</label>
                        <input type="text" class="form-control" id="valor_presente_ate" maxlength="200" name="valor_presente_ate" onKeyPress="return(MascaraMoeda(this,'.',',',event))" required>
                    </div>

                    <div class="form-group col-md-6 col-xs-12 center">
                        <label class="control-label" for="data_confraternizar">Data Confraternizar</label>
                        <div class="input-group date" id="datetime">
                            <input type="text" class="form-control" name="data_confraternizar" id="data_confraternizar" required>
                        </div>
                    </div>

                    <div class="form-group col-md-12 col-xs-12">
                        <label class="control-label" for="beneficios">Local da Confraternização</label>
                        <textarea class="form-control" name="local" rows="3" id="local" maxlength="500"></textarea>
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
