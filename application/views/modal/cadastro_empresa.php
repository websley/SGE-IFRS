<div id="modal-cadastra-empresa" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true" data-backdrop="static">
	<div class="modal-dialog modal-xl" role="document">

			<div class="modal-content">
				<div class="modal-header">
							<h5 class="modal-title text-primary" id="myModalLabel">Cadastro de empresa</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				</div>
				<div class="modal-body">


	<form id="form_cadastro_empresa" onsubmit="return false;" method="POST" enctype="multipart/form-data"  class="needs-validation" novalidate>
	
			 <div class="row">
		
		<div class="col border-right border-dark">
			
		 <div class="form-group">
			<label><strong>Nome Empresa</strong></label>
			<input name="nome" type="text" class="form-control" placeholder="" required>
			<div class="invalid-feedback">
				Campo Obrigatorio!
			</div>
		  </div>
		 <div class="form-group">
			<label><strong>Razão Social</strong></label>
			<input name="razao_social" type="text" class="form-control"  placeholder="" >
			<div class="invalid-feedback">
				Campo Obrigatorio!
			</div>
		  </div>	
		  <div class="form-group">
			<label><strong>Email</strong></label>
			<input name="email" type="email" class="form-control" placeholder="" >
		  	<div class="invalid-feedback">
				Campo Obrigatorio!
			</div>
		  </div>
		  <div class="form-row">
			<div class="form-group col-md">
			  <label><strong>CNPJ</strong></label>
			  <input name="cnpj" type="text" class="form-control cpf" id="cpf" placeholder="" maxlength="14" required>
		  	<div class="invalid-feedback">
				Campo Obrigatorio!
			</div>
			</div>
			<div class="form-group  col-md">
			  <label><strong>Ramo de atividade</strong></label>
			  <input name="ramo_atividade" type="text" class="form-control"  >
		  	<div class="invalid-feedback">
				Campo Obrigatorio!
			</div>
			</div>
		  </div>
		  		</div>

		<div class="col">
		
		  
		   <div class="form-row">
			<div class="form-group col-md-6">
			  <label><strong>Telefone</strong></label>
			  <input name="telefone" type="text" class="form-control telefone" placeholder="" >
		  	<div class="invalid-feedback">
				Campo Obrigatorio!
			</div>
			</div>
			<div class="form-group col-md-6">
			  <label><strong>Cidade</strong></label>
			  <input name="cidade" type="text" class="form-control celular"  placeholder="" >
		  	<div class="invalid-feedback">
				Campo Obrigatorio!
			</div>
			</div>
		  </div>
		  
	
		  <div class="form-group">
			<label><strong>Endereço</strong></label>
			<input name="endereco" type="text" class="form-control" placeholder="" >
		  	<div class="invalid-feedback">
				Campo Obrigatorio!
			</div>
		  </div>	
		  
		  
		<div class="form-row">
			<div class="form-group col-md-4">
			  <label><strong>Representante Legal</strong></label>
			  <input name="representante_legal" type="text" class="form-control" placeholder="" >
				<div class="invalid-feedback">
					Campo Obrigatorio!
				</div>
			</div>
			<div class="form-group col-md-4">
				<label><strong>Cargo</strong></label>
				<input name="cargo_representante" type="text" class="form-control celular"  placeholder="" >
				<div class="invalid-feedback">
					Campo Obrigatorio!
				</div>
			</div>
			<div class="form-group col-md-4">
				<label><strong>CPF</strong></label>
				<input name="cargo_representante_cpf" type="text" class="form-control celular"  placeholder="" >
				<div class="invalid-feedback">
					Campo Obrigatorio!
				</div>
			</div>
		</div>

		<div class="form-row">
				<div class="form-group col-md-4">
			<label><strong>RG Rep. Legal</strong></label>
				<input name="rg_representante_legal" type="text" class="form-control rg"  placeholder="" maxlength="15" >
				<div class="invalid-feedback">
					Campo Obrigatorio!
				</div>
				
				</div>
				<div class="form-group col-md-4">
				<label><strong>Orgão Expedidor</strong></label>
				<input name="orgao_exp_representante_legal" type="text" class="form-control"  placeholder="" >
				<div class="invalid-feedback">
					Campo Obrigatorio!
				</div>
				</div>
				<div class="form-group col-md-4">
				<label><strong>Data de Expedição</strong></label>
				<input name="data_exp_representante_legal" type="date" class="form-control"  placeholder="00/00/00" >
				<div class="invalid-feedback">
					Campo Obrigatorio!
				</div>
				</div>
		  </div>

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
