<!DOCTYPE html>
<html lang="en">

<script>


$( "#nav-item" ).click(function() {
  alert( "Handler for .click() called." );
});

	
</script>


<body id="page-top">

  <nav class="navbar navbar-expand navbar-dark bg-dark static-top">

    <a class="navbar-brand mr-1" href="index.html">IFRS CAMPUS OSORIO</a>
    <ul class="navbar-nav ml-auto mr-0 mr-md-3 my-2 my-md-0">
	
      <li class="nav-item dropdown no-arrow">
        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-user-circle fa-fw"></i>
        </a>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
          <a class="dropdown-item"><?php echo $_SESSION[session_prefix]['usuario'] ?> </a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item " href="<?= base_url("Login/sair") ?>" >Sair</a>
        </div>
      </li>
    </ul>
  </nav>
  <div id="wrapper">


    <!-- Sidebar -->
    <ul class="sidebar navbar-nav">

	    <?php if($_SESSION[session_prefix]['perfil'] == 1 ){  ?>
      <li class="nav-item <?php echo $this->uri->segment(1) == "Main" ? "active" : " " ;?>">
        <a class="nav-link" href="<?php echo base_url('Main');?>">
		<span class="glyphicon glyphicon-star" aria-hidden="true"></span>
		  <!-- <i class="fas fa-th-list"></i>-->
		  <i class="fas fa-user-friends"></i>
          <span>Estagios</span>
        </a>
      </li>
	    <li class="nav-item <?php echo $this->uri->segment(1) == "Alunos" ? "active" : " " ;?>">
        <a class="nav-link" href="<?php echo base_url('Alunos');?>">
          <i class="fas fa-chalkboard-teacher"></i>
          <span>Aluno</span></a>
      </li>
	   <li class="nav-item <?php echo $this->uri->segment(1) == "Professores" ? "active" : " " ;?>">
        <a class="nav-link" href="<?php echo base_url('Professores');?>">
         <!-- <i class="fas fa-chalkboard-teacher"></i> -->
          <i class="fas fa-user-graduate"></i>
          <span>Professor</span></a>
      </li>
	  <li class="nav-item <?php echo $this->uri->segment(1) == "Empresas" ? "active" : " " ;?>">
        <a class="nav-link" href="<?php echo base_url('Empresas');?>">
		 <!-- <i class="fas fa-city"></i> -->
		  <i class="fas fa-user-lock"></i>
          <span>Empresas</span></a>
      </li>
	  <li class="nav-item <?php echo $this->uri->segment(1) == "Supervisores" ? "active" : " " ;?>">
        <a class="nav-link" href="<?php echo base_url('Supervisores');?>">
		 <!-- <i class="fas fa-city"></i> -->
		  <i class="fas fa-user-lock"></i>
          <span>Supervisores</span></a>
      </li>
      <li class="nav-item <?php echo $this->uri->segment(1) == "Documentos" ? "active" : " " ;?>">
        <a class="nav-link" href="<?php echo base_url('Documentos');?>">
		  <i class="fa fa-cog"></i>
          <span>Documentos</span></a>
      </li>
      <li class="nav-item <?php echo $this->uri->segment(1) == "AgentesIntegracao" ? "active" : " " ;?>">
        <a class="nav-link" href="<?php echo base_url('AgenteIntegracao');?>">
		  <i class="fa fa-cog"></i>
          <span>Agentes de Integracao</span></a>
      </li>

	    <?php }else if($_SESSION[session_prefix]['perfil'] == 2 ){  ?>
		
		        <a class="nav-link" href="<?php echo base_url('Main');?>">
		<span class="glyphicon glyphicon-star" aria-hidden="true"></span>
		  <!-- <i class="fas fa-th-list"></i>-->
		  <i class="fas fa-user-friends"></i>
          <span>Documentos</span>
        </a>
      </li>
	  <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url('Alunos');?>">
          <i class="fas fa-chalkboard-teacher"></i>
          <span>Aluno</span></a>
      </li>
		<?php } else if($_SESSION[session_prefix]['perfil'] == 4 ){ ?>
    
	  <li class="nav-item <?php echo $this->uri->segment(1).$this->uri->segment(2) == "Maindados_empresa" ? "active" : " " ;?>">
        <a class="nav-link" href="<?php echo base_url('Main/dados_empresa');?>">
		<span class="glyphicon glyphicon-star" aria-hidden="true"></span>
		  <i class="fas fa-user-friends"></i>
          <span>Dados</span>
        </a>
      </li>

	<li class="nav-item <?php echo $this->uri->segment(1).$this->uri->segment(2) == "Main" ? "active" : " " ;?>">
        <a class="nav-link" href="<?php echo base_url('Main');?>">
		<span class="glyphicon glyphicon-star" aria-hidden="true"></span>
		  <i class="fas fa-user-friends"></i>
          <span>Supervisores</span>
        </a>
      </li>     

	  <li class="nav-item <?php echo $this->uri->segment(1).$this->uri->segment(2) == "Mainmain_empresa_estagios" ? "active" : " " ;?>">
        <a class="nav-link" href="<?php echo base_url('Main/main_empresa_estagios');?>">
		<span class="glyphicon glyphicon-star" aria-hidden="true"></span>
		  <i class="fas fa-user-friends"></i>
          <span>Estagios</span>
        </a>
    </li>

		
		<?php } ?>
		
    </ul>
