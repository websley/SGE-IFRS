<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<body class="bg-light">
<div class="container-fluid bg-light">
	
	<br>
	<br>
	<center>
		<h1>Preencha o formularios com os dados cadastrais</h1>
	<center>
	<br><br>
	<br>
<form action="<?php echo base_url('main/pagina_cadastro_empresas'); ?>" id="form_cadastro_empresa_usuario" onsubmit="return false;" method="POST" enctype="multipart/form-data"  class="needs-validation" novalidate>
				 <div class="row container">
		
		
		<div class="col border-right border-dark">
	
					
		 <div class="form-group">
			<label><strong>Nome Empresa</strong></label>
			<input name="nome" type="text" class="form-control" placeholder="" required>
			<div class="invalid-feedback">
				Campo Obrigatorio!
			</div>
		  </div>
		  <br>
		 <div class="form-group">
			<label><strong>Razão Social</strong></label>
			<input name="razao_social" type="text" class="form-control"  placeholder="" >
			<div class="invalid-feedback">
				Campo Obrigatorio!
			</div>
		  </div>
<br>		  
		  <div class="form-group">
			<label><strong>Email</strong></label>
			<input name="email" type="email" class="form-control" placeholder="" >
		  	<div class="invalid-feedback">
				Campo Obrigatorio!
			</div>
		  </div>
		  <br>
		  <div class="form-row">
			<div class="form-group col-md">
			  <label><strong>CNPJ</strong></label>
			  <input name="cnpj" type="text" class="form-control cpf" id="cpf" placeholder="" maxlength="14" required>
		  	<div class="invalid-feedback">
				Campo Obrigatorio!
			</div>
			</div>
			<br>
			<div class="form-group  col-md">
			  <label><strong>Ramo de atividade</strong></label>
			  <input name="ramo_atividade" type="text" class="form-control"  >
		  	<div class="invalid-feedback">
				Campo Obrigatorio!
			</div>
			</div>
			<br>
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
			<br>
			<div class="form-group col-md-6">
			  <label><strong>Cidade</strong></label>
			  <input name="cidade" type="text" class="form-control celular"  placeholder="" >
		  	<div class="invalid-feedback">
				Campo Obrigatorio!
			</div>
			</div>
			<br>
		  </div>
		  <br>
	
		  <div class="form-group">
			<label><strong>Endereço</strong></label>
			<input name="endereco" type="text" class="form-control" placeholder="" >
		  	<div class="invalid-feedback">
				Campo Obrigatorio!
			</div>
		  </div>
<br>		  
		  <div class="form-group">
			<label><strong>Ramo de atividade</strong></label>
			<input name="ramo_atividade" type="text" class="form-control" placeholder="" >
		  	<div class="invalid-feedback">
				Campo Obrigatorio!
			</div>
		  </div>
<br>		  
		  <div class="form-group">
			<label><strong>Representante Legal</strong></label>
			<input name="representante_legal" type="text" class="form-control" placeholder="" >
		  	<div class="invalid-feedback">
				Campo Obrigatorio!
			</div>
		  </div>
		  <br>
		  <br>
		  	</div>
		  <br><br><br>
		  
		  

		  </div>
		  
		  
		  <div class="container border-top border-dark">
	<br><br>
  <div class="row">
    <div class="col">
      		  <div class="form-group">
			<label><strong>Senha</strong></label>
			<input name="senha" type="password" minlength="5" class="form-control senha" placeholder="" >
		
		  </div>
    </div>
    <div class="col">
      		  <div class="form-group">
			<label><strong>Confirme a Senha</strong></label>
			<input name="senhaConf" type="password" minlength="5" class="form-control senhaconf" placeholder="" >
	
		  </div>
    </div>
  </div>
      
	  <br>
	  <br>
      <div id="example3"></div>
      <br>
    <script src="https://www.google.com/recaptcha/api.js?onload=onloadCallback&render=explicit"
        async defer>
    </script>
  </div>
		  
		  <br><br><br>
		  
		  
		  <div class="container">
		  		  <button type="submit" name="captcha" class="btn btn-primary btn-lg btn-block teste" disabled>Cadastrar</button>

		</form>
		</div>
			
<br><br><br><br>
</div>
</body>
</html>
