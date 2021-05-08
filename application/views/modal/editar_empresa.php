<div id="modal-editar-empresa" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true" data-backdrop="static">
	<div class="modal-dialog modal-xl" role="document">

			<div class="modal-content">
				<div class="modal-header">
							<h5 class="modal-title text-primary" id="myModalLabel">Cadastro de empresa</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				</div>
				<div class="modal-body">


	<form id="form_editar_empresa" onsubmit="return false;" method="POST" enctype="multipart/form-data">
	
	<input type="hidden" name="id_empresa" value="">
	
	
	<div class="row">
	  
	  
		<div class="col border-right border-dark">
		
		 <div class="form-group">
			<label ><strong>Nome Empresa</strong></label>
			<input name="nome" type="text" class="form-control" placeholder="">
		  </div>
		  <div class="form-group">
			<label ><strong>Razão Social</strong></label>
			<input name="razao_social" type="text" class="form-control" placeholder="">
		  </div>
		  <div class="form-group">
			<label ><strong>Email</strong></label>
			<input name="email" type="email" class="form-control" placeholder="">
		  </div>
		  
		  
		  		  <div class="row">
		  
				<div class="col">
					<div class="form-group">	
					<label><strong>CNPJ</strong></label>
			  <input name="cnpj" type="nome" class="form-control" placeholder="">
					</div>
				  
				</div>
				
				<div class="col">
				
					<div class="form-group">
			<label><strong>Ramo de atividade</strong></label>
			<input name="ramo_atividade" type="text" class="form-control"  placeholder="">
					</div>		
		
				</div>
				
			  </div>
		</div>
			
		<div class="col">
		  <div class="row">
		  
				<div class="col">
					<div class="form-group">
			  <label><strong>Telefone</strong></label>
			  <input name="telefone" type="nome" class="form-control telefone" placeholder="">
					</div>
				  
				</div>
				
				<div class="col">
				
					<div class="form-group">
			  <label><strong>Cidade</strong></label>
			  <input name="cidade" type="text" class="form-control"  placeholder="">
					</div>		
		
				</div>
				
			  </div>
			  
		  <div class="form-group">
			<label><strong>Endereço</strong></label>
			<input name="endereco" type="text" class="form-control" placeholder="">
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
				<input name="representante_cpf" type="text" class="form-control celular"  placeholder="" >
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
			<button type="submit" class="btn btn-success" data-toggle="modal" data-target=".loading">Salvar</button>
		</form>
      </div>
			</div>

	</div>
</div>
