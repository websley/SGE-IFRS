<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
</head>
<body>

	<div id="content-wrapper">

      <div class="container-fluid">

        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            Cadastros
        </ol>


	<div class="row">
	       
		   <div class="col-xl-3 col-sm-6 mb-3">
            <a href="#" class="card text-white bg-primary h-20" data-toggle="modal"  data-target="#modal-cadastra-aluno">
              <div class="card-body">
                <div class="card-body-icon">
                  <i class="fas fa-fw fa-comments"></i>
                </div>
                <div class="mr-5">Alunos</div>
              </div>
            </a>
          </div>
		   <div class="col-xl-3 col-sm-6 mb-3">
            <a href="#" class="card text-white bg-warning o-hidden h-20" data-toggle="modal"  data-target="#modal-cadastra-professor">
              <div class="card-body">
                <div class="card-body-icon">
                  <i class="fas fa-fw fa-comments"></i>
                </div>
                <div class="mr-5">Professores </div>
              </div>
            </a>
          </div>
		   <div class="col-xl-3 col-sm-6 mb-3">
            <a href="#" class="card text-white bg-success o-hidden h-20" data-toggle="modal"  data-target="#modal-cadastra-empresa">
              <div class="card-body">
                <div class="card-body-icon">
                  <i class="fas fa-fw fa-comments"></i>
                </div>
                <div class="mr-5">Empresas</div>
              </div>
            </a>
          </div>
		   <div class="col-xl-3 col-sm-6 mb-3">
            <a href="#" class="card text-white bg-danger o-hidden h-20" data-toggle="modal"  data-target="#modal-cadastra-supervisor">
              <div class="card-body">
                <div class="card-body-icon">
                  <i class="fas fa-fw fa-comments"></i>
                </div>
                <div class="mr-5">Supervisores</div>
              </div>
            </a>
          </div>
		  
		  
		  
 

	  </div>
	  
	  <!--
	  		   <div class="col-xl-3 col-sm-6 mb-3">
            <a href="#" rel="1" class="card text-white bg-danger o-hidden h-20 btn-editar-doc" data-toggle="modal"  data-target="#modal-adiciona-documento">
              <div class="card-body">
                <div class="card-body-icon">
                  <i class="fas fa-fw fa-comments"></i>
                </div>
                <div class="mr-5">documento</div>
              </div>
            </a>
          </div>


		
		        <div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-chart-area"></i>
            Configurações</div>
          <div class="card-body">
		  
					<div class="row">
			<div class="col">
			   				<form>
				  <div class="row">
					<div class="col">
					 <h5> Quantidade de alunos orietados por professor : </h5>
					</div>
					
					  <input type="number" class="form-control" placeholder="" style="width:75px">
					
				  </div>
				</form>
			</div>
			<div class="col">
			  
			</div>
		  </div>
          </div>
        </div>
		-->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            Documentos
        </ol>
		
			
	<button type="button" class="btn btn-primary btn-lg btn-editar-doc" data-toggle="modal"  data-target="#modal-adiciona-documento">Adicionar Documento</button>
		
		<br>
		<br>
	
			 <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
					<th>Titulo</th>
					<th>Tipo<br>Início/Final</th>
					<th>Visualizar</th>
					<th>Editar</th>
					<th>Excluir</th>
				</thead>
				<tbody>
					<?php 
						foreach($documentos  as $docs){
							echo '<tr>
								<td>'.$docs['titulo'] .'</td>
								<td>
									<select class="form-control atribuir-tipo" rel="'.$docs['doc_id'].'">
									  <option value="NULL" '.(empty($docs['tipo']) ? "selected" : "").'>Nenhum</option>
									  <option value="inicio" '.($docs['tipo'] == 'Inicio' ? "selected" : "").'>Inicio</option>
									  <option value="final" '.($docs['tipo'] == 'Final' ? "selected" : "").'>Final</option>
									</select>
								</td>
								<td>
								<a href="#" rel="'.$docs['doc_id'].'" class="btn btn-success btn-visualizar-doc" >
									       <i class="fas fa-eye"></i>
								</a></td>
								<td>
								<a href="#" rel="'.$docs['doc_id'].'" class="btn btn-info btn-editar-doc" data-toggle="modal"  data-target="#modal-editar-documento">
									       <i class="fas fa-edit"></i>
								</a>
								</td>
								<td>
								<a href="#" rel="'.$docs['doc_id'].'" class="btn btn-danger btn-excluir-doc" data-toggle="modal"  data-target="#modal-excluir-documento" >
									       <i class="fas fa-times"></i>
								</a>
								</td>
								</tr>';
				
						}
				?>
				</tbody>
              </table>
			  
			  <!--
            
			<br><br>
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            Rodapés
        </ol>
		
	
	<button type="button" class="btn btn-primary btn-lg btn-editar-doc" data-toggle="modal"  data-target="#modal-adiciona-rodape">Adicionar Ródape</button>
	
	<br>
	<br>
		
	  <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
					<th>Titulo</th>
					<th>Visualizar</th>
					<th>Editar</th>
					<th>Excluir</th>
				</thead>
				<tbody>
					<?php 
					
					//var_dump($rodapes);
					
						foreach($rodapes  as $r){
				
							echo '<tr>
								<td>'.$r['titulo'].'</td>
								<td>
								<a href="#" rel="'.$r['rodape_id'].'" class="btn btn-success btn-visualizar-rodape" >
									       <i class="fas fa-user-"></i>
								</a></td>
								<td>
								<a href="#" rel="'.$r['rodape_id'].'" class="btn btn-info btn-editar-rodape" data-toggle="modal"  data-target="#modal-editar-rodape">
									       <i class="fas fa-user-"></i>
								</a>
								</td>
								<td>
								<a href="#" rel="'.$r['rodape_id'].'" class="btn btn-danger btn-excluir-rodape" data-toggle="modal"  data-target="#modal-excluir-rodape" >
									       <i class="fas fa-user-"></i>
								</a>
								</td>
								</tr>';
				
						}
				?>
				</tbody>
              </table>
			  
			  -->

	</div>

      <!-- Sticky Footer 
      <footer class="sticky-footer">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright © Your Website 2019</span>
          </div>
        </div>
      </footer>-->

    </div>




</body>
</html>

