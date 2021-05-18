<div id="modal-excluir-agente" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true" data-backdrop="static">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-primary" id="myModalLabel">Confirmar Exclusão do Agente de Integração</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <form id="form_excluir_agente" onsubmit="return false;" method="POST" enctype="multipart/form-data">
                    <center>
                        <br>
                        Excluir o agente de integração: <span name="nome"> </span>
                    </center>
            </div>
            <div class="modal-footer">
                <input type="hidden" name="id_agente" value="">
                <button type="submit" class="btn btn-success" data-toggle="modal" data-target=".loading">Confirmar</button>
                </form>
            </div>
        </div>
    </div>
</div>