<div id="modal-data-documento" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true" data-backdrop="static">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title text-primary" id="myModalLabel">Escolher data do documento</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			</div>

			<div class="modal-body">
				<form action="<?php echo base_url()?>Documentos/gerarDocumento" method="POST" target="_blank" enctype="multipart/form-data">
				<div class="form-group">
					<label ><strong>Data do documento</strong></label>
					<input name="data" type="date" class="form-control" placeholder="">
					<div class="invalid-feedback">
						Campo Obrigatorio!
					</div>
				</div>

				<div class="form-group">
					<label ><strong>Numero do Convênio</strong></label>
					<input name="numero_convenio" type="tel" class="form-control" placeholder="">
					<div class="alert alert-warning">
						Campo necessário apenas para o documento de número de convênio.
					</div>
					<div class="invalid-feedback">
						Campo Obrigatorio!
					</div>
				</div>
			</div>

			<div class="modal-footer">
				<input type="hidden" name="id_aluno" value="">
				<input type="hidden" name="id_doc" value="">
				<button type="submit" class="btn btn-success">Gerar Documento</button>
				</form>
			</div>
		</div>
	</div>
</div>
