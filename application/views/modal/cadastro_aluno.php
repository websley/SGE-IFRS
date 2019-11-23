<div id="modal-cadastra-aluno" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true" data-backdrop="static">
	<div class="modal-dialog modal-xl" role="document">

			<div class="modal-content">
				<div class="modal-header">
							<h5 class="modal-title text-primary" id="myModalLabel">Cadastro de aluno22</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				</div>
				<div class="modal-body">


	<form id="form_cadastro_aluno"  onsubmit="return false;" method="POST" enctype="multipart/form-data" class="needs-validation" novalidate>
	
	
	
		 <div class="row">
		
		<div class="col border-right border-dark">
			
		 <div class="form-group">
			<label><strong>Nome Completo</strong></label>
			<input name="nome" type="text" class="form-control" placeholder="" required>
			<div class="invalid-feedback">
				Campo Obrigatorio!
			</div>
		  </div>
		 <div class="form-group">
			<label><strong>Curso</strong></label>
			<input name="curso" type="text" class="form-control"  placeholder="" >
			<div class="invalid-feedback">
				Campo Obrigatorio!
			</div>
		  </div>	
		  
		  <div class="form-group">
			<label><strong>Turma</strong></label>
			<input name="turma" type="text" class="form-control"  placeholder="" >
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
			  <label><strong>CPF</strong></label>
			  <input name="cpf" type="text" class="form-control cpf" id="cpf" maxlength="11" >
			<div class="invalid-feedback">
				Campo Obrigatorio!
			</div>
			</div>
			<div class="form-group  col-md">
						  <label><strong>Data de Nascimento</strong></label>
			  <input name="data_nascimento" type="date" class="form-control" placeholder="00/00/00" >
			<div class="invalid-feedback">
				Campo Obrigatorio!
			</div>
			
	
			  
			</div>
		  </div>
		  

		  
		  		</div>

		<div class="col">
		
				   <div class="form-row">
			<div class="form-group col-md-4">
		  <label><strong>RG</strong></label>
			  <input name="rg" type="text" class="form-control rg"  placeholder="" maxlength="15" >
			<div class="invalid-feedback">
				Campo Obrigatorio!
			</div>
			  
			</div>
			<div class="form-group col-md-4">
			  <label><strong>Orgão Expedidor</strong></label>
			  <input name="orgao_exp" type="text" class="form-control"  placeholder="" >
			<div class="invalid-feedback">
				Campo Obrigatorio!
			</div>
			</div>
			<div class="form-group col-md-4">
			  <label><strong>Data de Expedição</strong></label>
			  <input name="data_exp" type="date" class="form-control"  placeholder="00/00/00" >
			<div class="invalid-feedback">
				Campo Obrigatorio!
			</div>
			</div>
		  </div>
		  
		   <div class="form-row">
			<div class="form-group col-md-6">
			  <label><strong>Telefone</strong></label>
			  <input name="telefone" type="text" class="form-control telefone" placeholder="" >
			<div class="invalid-feedback">
				Campo Obrigatorio!
			</div>
			</div>
			<div class="form-group col-md-6">
			  <label><strong>Celular</strong></label>
			  <input name="celular" type="text" class="form-control celular"  placeholder="" >
			<div class="invalid-feedback">
				Campo Obrigatorio!
			</div>
			</div>
		  </div>
		  
		  <div class="form-row">
			<div class="form-group col-md-6">
			  <label><strong>UF</strong></label>
			  <input name="uf" type="text" class="form-control" placeholder="" >
			<div class="invalid-feedback">
				Campo Obrigatorio!
			</div>
			</div>
			<div class="form-group col-md-6">
			  <label><strong>CEP</strong></label>
			  <input name="CEP" type="text" class="form-control cep"  placeholder="" >
			<div class="invalid-feedback">
				Campo Obrigatorio!
			</div>
			</div>
		 </div>
		 <div class="form-row">
			<div class="form-group col-md-6">
			  <label><strong>Cidade</strong></label>
			  <input name="cidade" type="text" class="form-control"  placeholder="" >
			<div class="invalid-feedback">
				Campo Obrigatorio!
			</div>
			</div>
		<div class="form-group col-md-6">
			  <label><strong>Bairro</strong></label>
			  <input name="bairro" type="text" class="form-control"  placeholder="" >
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
