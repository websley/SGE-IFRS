<div id="modal-editar-professor" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog" role="document">

			<div class="modal-content">
				<div class="modal-header">
							<h5 class="modal-title text-primary" id="myModalLabel">Dados professor</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				</div>
				<div class="modal-body">


	<form id="form_editar_professor" onsubmit="return false;" method="POST" enctype="multipart/form-data">
<input type="hidden" name="id_professor" value="">
		 <div class="form-group">
			<label ><strong>Nome Completo</strong></label>
			<input name="nome" type="text" class="form-control" placeholder="">
		  </div>
		  <div class="form-group">
			<label ><strong>Email</strong></label>
			<input name="email" type="email" class="form-control" placeholder="">
		  </div>

	
					
				</div>
		<div class="modal-footer">
			<button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
			<button type="submit" class="btn btn-success" data-toggle="modal" data-target=".loading">Salvar</button>
		</form>
      </div>
			</div>
	</div>
</div>
