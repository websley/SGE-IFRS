<div id="modal-excluir-documento" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true" data-backdrop="static">
	<div class="modal-dialog" role="document">

			<div class="modal-content">
				<div class="modal-header">
							<h5 class="modal-title text-primary" id="myModalLabel">Confirmar Exclusão do Supervisor</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				</div>
				<div class="modal-body">

		<form id="form_excluir_documento" onsubmit="return false;" method="POST" enctype="multipart/form-data">
				
				<center>
					
					<br>
					<strong>Excluir documento : </strong><span name="titulo">  </span>
					<br>

				</center>
				</div>
				      <div class="modal-footer">
					  <input type="hidden" name="doc_id" value="">
        <button type="submit" class="btn btn-success"  data-toggle="modal" data-target=".loading">Confirmar</button>
		</form>
      </div>
			</div>

	</div>
</div>
