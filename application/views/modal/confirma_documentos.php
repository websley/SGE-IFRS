<div id="modal-confirma-documentos" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true" data-backdrop="static">
	<div class="modal-dialog" role="document">

			<div class="modal-content">
				<div class="modal-header">
							<h5 class="modal-title text-primary" id="myModalLabel">Confirmar Documentação</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				</div>
				<div class="modal-body">

		<form id="form_confirmar_documentos" onsubmit="return false;" method="POST" enctype="multipart/form-data">
				
				<center>
					<h3> Confirma que o aluno entregou os documentos para o inicio do estagio.</h3>
					<br>
					Aluno: <span name="nome_aluno">  </span>
				</center>
				</div>
				      <div class="modal-footer">
					  <input type="hidden" name="id_estagio" value="">
					  <input type="hidden" name="id_aluno" value="">
        <button type="submit" class="btn btn-success"  data-toggle="modal" data-target=".loading">Confirmar</button>
		</form>
      </div>
			</div>

	</div>
</div>
