<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
</head>
<body>

<div class="container">



	<form id="form_cadastro_professor" action="<?php echo base_url('Professor/cadastro'); ?>"  method="POST" >
		 <div class="form-group">
			<label >Nome Completo</label>
			
			 <input name="nome" id="nome" type="text" class="form-control" placeholder="">
			<?php 
			//echo form_input(array("name" => "nome",	"id" => "nome",	"class" => "form-control", "maxlength" => "255"));
			echo form_error("nome", ""); ?>
		  </div>

		  <div class="form-group">
			<label >Email</label>
			
			<input name="email" type="email" class="form-control" placeholder=""> 
			<?php //echo form_input(array("name" => "email",	"id" => "email",	"class" => "form-control", "maxlength" => "255"));
				  echo form_error("nome", ""); ?>
		  </div>
		  
		  <button type="submit" class="btn btn-primary">Sign in</button>
		</form>

</div>


</body>
</html>

