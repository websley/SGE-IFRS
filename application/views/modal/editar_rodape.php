<div id="modal-editar-rodape" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog modal-xl" role="document">

			<div class="modal-content">
				<div class="modal-header">
							<h5 class="modal-title text-primary" id="myModalLabel">Editar de Rodape</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				</div>
				<div class="modal-body" >

	<form id="form_editar_rodape" class="needs-validation" onsubmit="return false;" method="POST" enctype="multipart/form-data" novalidate>
	<input type="hidden" name="rodape_id" value="">
	
		 <div class="form-group">
			<label><strong>Titulo</strong></label>
			<input name="titulo" type="text" class="form-control" placeholder="" required>
			</div> 
			
					<div class="form-group">
						<div class="col">
							<strong>Texto do rodape</strong>
						</div>  

						<div class="col">
						<center>
							<textarea name="rodape_texto" id="mensagem" class="form-control tinymce" ></textarea>
						</center>
						</div>
					</div>
	

						</div><div class="modal-footer">
			<button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
			<button type="submit" class="btn btn-success">Salvar</button>
		</form>
    </div>
    </div>
    </div>
    </div>

