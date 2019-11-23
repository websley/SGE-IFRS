<div id="modal-editar-supervisor" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true" data-backdrop="static">
	<div class="modal-dialog modal-lg" role="document">

			<div class="modal-content">
				<div class="modal-header">
							<h5 class="modal-title text-primary" id="myModalLabel">Cadastro de empresa</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				</div>
				<div class="modal-body">


	<form id="form_editar_supervisor" onsubmit="return false;" method="POST" enctype="multipart/form-data" class="needs-validation" novalidate>
	<input type="hidden" name="id_supervisor" value="">
	<div class="row">
	
		<div class="col border-right border-dark">
	
			<div class="form-group">
			<label ><strong>Nome Completo</strong></label>
			<input name="nome" type="text" class="form-control" placeholder="">
			<div class="invalid-feedback">
				Campo Obrigatorio!
		  </div>
		  </div>
		  
		  <?php if($_SESSION[session_prefix]['perfil'] == 1){ ?>

		  <div class="form-group">
						  <label ><strong>Empresas</strong></label>
							<select name="id_empresa" class="form-control disabled" data-required="Selecione O Tipo de Contato.">
							<?php 
							
							foreach ($empresas as $e) {
									echo '<option value="'.$e['id_empresa'].'"';
									echo '>'.$e['nome'].'</option>';
									$empresa_id = $e['id_empresa'];
								}
								?>
		 
							</select>
			<div class="invalid-feedback">
				Campo Obrigatorio!
						</div>
			</div>
			
			<?php } ?>
			
		<div class="form-group">
			<label ><strong>Email</strong></label>
			<input name="email" type="email" class="form-control" placeholder="">
			<div class="invalid-feedback">
				Campo Obrigatorio!
		  </div>
	
		</div>
	</div>
		
		<div class="col">
		  <div class="form-group">
			  <label><strong>Telefone</strong></label>
			  <input name="telefone" type="nome" class="form-control telefone" placeholder="">
			<div class="invalid-feedback">
				Campo Obrigatorio!
			</div>
			</div>

		  <div class="form-group">
			<label><strong>Formação</strong></label>
			<input name="formacao" type="text" class="form-control" placeholder="">
			<div class="invalid-feedback">
				Campo Obrigatorio!
			</div>
		  </div>
			
		
		</div>
	</div>

	
	
	<!--
	
		 <div class="form-group">
			<label >Nome Completo</label>
			<input name="nome" type="text" class="form-control" placeholder="">
		  </div>
		
		  
						<div class="form-group">
						  <label >Empresas</label>
							<select name="id_empresa" class="form-control disabled" data-required="Selecione O Tipo de Contato.">
							<?php 
							var_dump($empresas);
								foreach ($empresas as $e) {
									echo '<option value="'.$e['id_empresa'].'"';
									echo '>'.$e['nome'].'</option>';
								}
							?>
							</select>
						</div>
						
		  <div class="form-group">
			<label >Email</label>
			<input name="email" type="email" class="form-control" placeholder="">
		  </div>
		  <div class="form-group">
			  <label for="inputEmail4">Telefone</label>
			  <input name="telefone" type="nome" class="form-control telefone" placeholder="">
			</div>

		  <div class="form-group">
			<label>Formação</label>
			<input name="formacao" type="text" class="form-control" placeholder="">
		  </div>
		  -->

		</div>
		<div class="modal-footer">
			<button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
			<button type="submit" class="btn btn-success">Salvar</button>
		</form>
			</div>

	</div>
</div>
</div>
