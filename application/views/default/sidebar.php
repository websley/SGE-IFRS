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


    <!-- Navbar Search 
    <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
      <div class="input-group">
        <input type="text" class="form-control" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
        <div class="input-group-append">
          <button class="btn btn-primary" type="button">
            <i class="fas fa-search"></i>
          </button>
        </div>
      </div>
    </form>-->

    <!-- Navbar 
    <ul class="navbar-nav ml-auto mr-0 mr-md-3 my-2 my-md-0">
      <li class="nav-item dropdown no-arrow mx-1">
        <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-bell fa-fw"></i>
          <span class="badge badge-danger">9+</span>
        </a>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="alertsDropdown">
          <a class="dropdown-item" href="#">Action</a>
          <a class="dropdown-item" href="#">Another action</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">Something else here</a>
        </div>
      </li>
      <li class="nav-item dropdown no-arrow mx-1">
        <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-envelope fa-fw"></i>
          <span class="badge badge-danger">7</span>
        </a>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="messagesDropdown">
          <a class="dropdown-item" href="#">Action</a>
          <a class="dropdown-item" href="#">Another action</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">Something else here</a>
        </div>
      </li>
      <li class="nav-item dropdown no-arrow">
        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-user-circle fa-fw"></i>
        </a>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
          <a class="dropdown-item" href="#">Settings</a>
          <a class="dropdown-item" href="#">Activity Log</a>
          <div class="dropdown-divider"></div>
		  
          <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">Logout</a>
        </div>
      </li>
    </ul>

-->   


     
    <ul class="navbar-nav ml-auto mr-0 mr-md-3 my-2 my-md-0">
	<!--
      <li class="nav-item dropdown no-arrow mx-1">
        <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-bell fa-fw"></i>
          <span class="badge badge-danger">9+</span>
        </a>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="alertsDropdown">
          <a class="dropdown-item" href="#">Action</a>
          <a class="dropdown-item" href="#">Another action</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">Something else here</a>
        </div>
      </li>
	  
      <li class="nav-item dropdown no-arrow mx-1">
        <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-envelope fa-fw"></i>
          <span class="badge badge-danger">7</span>
        </a>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="messagesDropdown">
          <a class="dropdown-item" href="#">Action</a>
          <a class="dropdown-item" href="#">Another action</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">Something else here</a>
        </div>
      </li>
	  -->
      <li class="nav-item dropdown no-arrow">
        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-user-circle fa-fw"></i>
        </a>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
          <a class="dropdown-item"><?php echo $_SESSION[session_prefix]['usuario'] ?> </a>
		<!--
          <a class="dropdown-item" href="#">Activity Log</a>
		-->
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
