<div id="modal-cadastra-agente" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-primary" id="myModalLabel">Cadastro de Agente de Integração</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <form id="form_cadastro_agente" class="needs-validation" onsubmit="return false;" method="POST" enctype="multipart/form-data" novalidate>
                    <div class="form-group">
                        <label><strong>Nome do Agente</strong></label>
                        <input name="nome" type="text" class="form-control" placeholder="" required>
                        <div class="invalid-feedback">
                            Campo Obrigatorio!
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-success">Salvar</button>
                </form>
            </div>
        </div>
    </div>
</div>