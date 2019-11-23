<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
</head>
<body>



<div class="container">

	<form id="form_cadastro_alunow" onsubmit="return false;" method="POST" enctype="multipart/form-data">
		 <div class="form-group">
			<label >Nome Completo</label>
			<input name="nome" type="text" class="form-control" placeholder="">
		  </div>
		 <div class="form-group">
			<label for="inputAddress">Curso</label>
			<input name="curso" type="text" class="form-control"  placeholder="">
		  </div>
		  <div class="form-group">
			<label >Email</label>
			<input name="email" type="email" class="form-control" placeholder="">
		  </div>
		  
		  <div class="form-row">
			<div class="form-group col-md-6">
			  <label>CPF</label>
			  <input name="cpf" type="text" class="form-control cpf" id="cpf" placeholder="" maxlength="14">
			</div>
			<div class="form-group col-md-6">
			  <label for="inputPassword4">RG</label>
			  <input name="rg" type="text" class="form-control rg"  placeholder="" maxlength="15">
			</div>
		  </div>
		  
		   <div class="form-row">
			<div class="form-group col-md-4">
			  <label for="inputEmail4">Data de Nascimento</label>
			  <input name="data_nascimento" type="date" class="form-control" placeholder="00/00/00">
			</div>
			<div class="form-group col-md-4">
			  <label for="inputPassword4">Orgão Expedidor</label>
			  <input name="orgao_exp" type="text" class="form-control"  placeholder="">
			</div>
			<div class="form-group col-md-4">
			  <label for="inputPassword4">Data de Expedição</label>
			  <input name="data_exp" type="date" class="form-control"  placeholder="00/00/00" >
			</div>
		  </div>
		  
		   <div class="form-row">
			<div class="form-group col-md-6">
			  <label for="inputEmail4">Telefone</label>
			  <input name="telefone" type="nome" class="form-control telefone" placeholder="">
			</div>
			<div class="form-group col-md-6">
			  <label for="inputPassword4">Celular</label>
			  <input name="celular" type="text" class="form-control celular"  placeholder="">
			</div>
		  </div>
		  
		  <div class="form-row">
			<div class="form-group col-md-6">
			  <label for="inputEmail4">UF</label>
			  <input name="uf" type="nome" class="form-control" placeholder="">
			</div>
			<div class="form-group col-md-6">
			  <label for="inputPassword4">CEP</label>
			  <input name="cep" type="text" class="form-control cep"  placeholder="">
			</div>
		 </div>
		 <div class="form-row">
			<div class="form-group col-md-6">
			  <label for="inputPassword4">Cidade</label>
			  <input name="cidade" type="text" class="form-control"  placeholder="">
			</div>
		<div class="form-group col-md-6">
			  <label for="inputPassword4">Bairro</label>
			  <input name="bairro" type="text" class="form-control"  placeholder="">
			</div>
		 </div>
		  <div class="form-group">
			<label for="inputAddress2">Endereço</label>
			<input name="endereco" type="text" class="form-control" placeholder="">
		  </div>
		  
		  <button type="submit" class="btn btn-primary">Cadastrar</button>
		</form>
		


</div>


</body>
</html>

