<!DOCTYPE html>
<html lang="en">


<body class="bg-dark">

  <div class="container">
    <div class="card card-login mx-auto mt-5">
      <div class="card-header">Login</div>
      <div class="card-body">
        <form action="<?=base_url("Login/executa_login");?>" method="post">
          <div class="form-group">
            <div class="form-label-group">
              <input name="email" type="text" id="inputEmail" class="form-control" placeholder="Email address" required="required" autofocus="autofocus">
              <label for="inputEmail">Email</label>
            </div>
          </div>
          <div class="form-group">
            <div class="form-label-group">
              <input name="senha" type="password" id="inputPassword" class="form-control" placeholder="Password" required="required">
              <label for="inputPassword">Senha</label>
            </div>
          </div>
          <div class="form-group">
		  <!--
            <div class="checkbox">
              <label>
                <input type="checkbox" value="remember-me">
                Remember Password
              </label>
            </div>
			-->
          </div>
		  
		  <?php
			if(isset($_SESSION[session_prefix]['msg_erro_login'])){
		  		echo '<div class="alert alert-danger" role="alert">'.
			$_SESSION[session_prefix]['msg_erro_login']
				.'</div>';
				
				}
			?>
		  <input  value="Login" class="btn btn-primary btn-block" type="submit" />
        </form>
		<br>
		<a href="<?php echo base_url('Paginas_cadastros');?>" class="btn btn-primary btn-block" role="button" aria-pressed="true">
		
		Cadastre-se
		<br>
		<small> Empresa </small>
		
		</a>
		

		<!--
		  <button href="<?php echo base_url('main/pagina_cadastro_empresas');?>" class="btn btn-primary btn-block">
        <div class="text-center">
          <a class="d-block small mt-3" href="register.html">Register an Account</a>
          <a class="d-block small" href="forgot-password.html">Forgot Password?</a>
        </div>
		-->
      </div>
    </div>
  </div>


</body>

</html>
