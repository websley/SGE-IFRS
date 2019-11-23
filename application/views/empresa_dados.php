<?php
defined('BASEPATH') OR exit('No direct script access allowed');


?>

	<div class="container-fluid">
	<br>

        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            Informações Cadastradas
        </ol>
		
		
			<form id="form_edit_info_emp"  onsubmit="return false;" method="POST" enctype="multipart/form-data" >
	
			<div class="container">
				  <div class="row">
					<div class="col">
					
					<label><strong>Nome</strong></label>
					 <div class="input-group mb-3">
					  <input value="<?= $dados['nome']?>" type="text" class="form-control nome" name="nome" placeholder=""  disabled>
					  <div class="input-group-append">
						<button href="#" rel="nome" class="btn btn-info edit_info" type="button" id="button-addon2"><i class="fas fa-edit"></i></button>
					  </div>
					</div>
						
					</div>
					<br>
					<br>
					<br>
					<div class="col">
					
					<label><strong>Razão Social</strong></label>
					 <div class="input-group mb-3">
					  <input type="text" value="<?= $dados['razao_social']?>"  class="form-control razao_social" name="razao_social" disabled>
					  <div class="input-group-append">
						<button href="#" rel="razao_social" class="btn btn-info edit_info" type="button" id="button-addon2"><i class="fas fa-edit"></i></button>
					  </div>
					</div>
					
					</div>
				  </div>
				  <div class="row">
					<div class="col">
				<label><strong>CNPJ</strong></label>
					 <div class="input-group mb-3">
					  <input type="text" value="<?= $dados['cnpj']?>"  class="form-control cnpj" name="cnpj" disabled>
					  <div class="input-group-append">
						<button href="#" rel="cnpj" class="btn btn-info edit_info" type="button" id="button-addon2"><i class="fas fa-edit"></i></button>
					  </div>
					</div>
					
					</div>
					<div class="col">
				<label><strong>Telefone</strong></label>
					 <div class="input-group mb-3">
					  <input type="text" value="<?= $dados['telefone']?>"  class="form-control telefone" name="telefone" disabled>
					  <div class="input-group-append">
						<button href="#" rel="telefone" class="btn btn-info edit_info" type="button" id="button-addon2"><i class="fas fa-edit"></i></button>
					  </div>
					</div>
					
					</div>
					<div class="col">
				<label><strong>Ramo Atividade</strong></label>
					 <div class="input-group mb-3">
					  <input type="text" value="<?= $dados['ramo_atividade']?>"  class="form-control ramo_atividade" name="ramo_atividade" disabled>
					  <div class="input-group-append">
						<button href="#" rel="ramo_atividade" class="btn btn-info edit_info" type="button" id="button-addon2"><i class="fas fa-edit"></i></button>
					  </div>
					</div>
					
					</div>
				  </div>

				  <div class="row">
					<div class="col">
				<label><strong>Email</strong></label>
					 <div class="input-group mb-3">
					  <input type="text" value="<?= $dados['email']?>"  class="form-control email" name="email" disabled>
					  <div class="input-group-append">
						<button href="#" rel="email" class="btn btn-info edit_info" type="button" id="button-addon2"><i class="fas fa-edit"></i></button>
					  </div>
					</div>
					
					</div>
					<div class="col">
				<label><strong>Endereco</strong></label>
					 <div class="input-group mb-3">
					  <input type="text" value="<?= $dados['endereco']?>"  class="form-control endereco" name="endereco" disabled>
					  <div class="input-group-append">
						<button href="#" rel="endereco" class="btn btn-info edit_info" type="button" id="button-addon2"><i class="fas fa-edit"></i></button>
					  </div>
					</div>
					
					</div>
					<div class="col">
				<label><strong>Cidade</strong></label>
					 <div class="input-group mb-3">
					  <input type="text" value="<?= $dados['cidade']?>"  class="form-control cidade" name="cidade" disabled>
					  <div class="input-group-append">
						<button href="#" rel="cidade" class="btn btn-info edit_info" type="button" id="button-addon2"><i class="fas fa-edit"></i></button>
					  </div>
					</div>
					
					</div>
				  </div>
				  			  <div class="row">
					<div class="col">
					
					<label><strong>Representante Legal</strong></label>
					 <div class="input-group mb-3">
					  <input value="<?= $dados['rep_legal']?>" type="text" class="form-control rep_legal" name="rep_legal" placeholder=""  disabled>
					  <div class="input-group-append">
						<button href="#" rel="rep_legal" class="btn btn-info edit_info" type="button" id="button-addon2"><i class="fas fa-edit"></i></button>
					  </div>
					</div>
						
					</div>
					<br>
					<br>
					<br>
					<div class="col">
					
					<label><strong>Cargo</strong></label>
					 <div class="input-group mb-3">
					  <input type="text" value="<?= $dados['rep_cargo']?>"  class="form-control rep_cargo" name="rep_cargo" disabled>
					  <div class="input-group-append">
						<button href="#" rel="rep_cargo" class="btn btn-info edit_info" type="button" id="button-addon2"><i class="fas fa-edit"></i></button>
					  </div>
					</div>
					
					</div>
				  </div>
				  
				  <br>
				<button type="submit" class="btn btn-success">Salvar</button>
				</div>
	
	</form>
	
	
	
	
	</div>
	
	
	
	
	
	
	


</body>
</html>
