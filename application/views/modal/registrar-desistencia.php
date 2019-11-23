<div id="modal-registrar-desistencia" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true" data-backdrop="static">
	<div class="modal-dialog" role="document">

			<div class="modal-content">
				<div class="modal-header">
							<h5 class="modal-title text-primary" id="myModalLabel">Registrar Desistencia</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				</div>
				<div class="modal-body">

		<form id="form_registrar_desistencia" onsubmit="return false;" method="POST" enctype="multipart/form-data" class="needs-validation" novalidate>
				
			
			
			<div class="container">
			  <div class="row">
				<div class="col">
				 Aluno: <span name="nome_aluno">  </span>
				</div>
				<div class="col">
				  <div class="form-group">
					<label><strong>Horas :</strong></label>
					<input name="horas_feitas" type="text" class="form-control" placeholder="" required>
				<div class="invalid-feedback">
					Campo Obrigatorio!
				</div>
			  </div>
				</div>
			</div>
			</div>
									

				</div>
				      <div class="modal-footer">
					  <input type="hidden" name="id_estagio" value="">
					  <input type="hidden" name="id_aluno" value="">
        <button type="submit" class="btn btn-success"  data-toggle="modal" data-target=".loading">Finalizar Estagio</button>
		</form>
      </div>
			</div>

	</div>
</div>
