<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
	<br/>
<div class="container-fluid">

	<br/>
	
		<button type="button" class="btn btn-primary btn-lg btn-adiciona-estagio" data-toggle="modal"  data-target="#modal-adiciona-estagio">Adicionar</button>
	


	<br>
	<br>


<ul class="nav nav-pills nav-fill"" id="pills-tab" role="tablist">

		<?php $count = 0;

		foreach ($status as $s ) {
		 echo '<li class="nav-item">
			<a class="nav-link ',(!$count ? 'active' : ''),'" href="#t-'.$s['id_status'].'" id="pills-home-tab" data-toggle="pill"
				role="tab" aria-controls="pills-',$s['id_status'],'" aria-selected="true">',$s['nome'],'
				<span class="badge"></span>
				</a>
		  </li>
		  ';
  		$count++;
		}

	?>
  
</ul>
<div class="tab-content" id="pills-tabContent">
	
	<?php
		$count = 0;
	foreach ($status as $s ) {
		 echo  '<div class="tab-pane fade show '.(!$count ? 'active' : '').'" id="t-'.$s['id_status'].'"" role="tabpanel" aria-labelledby="pills-home-tab"> ';
	

	         echo ' <!-- DataTables Example -->
        <div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-table"></i>
            Estagios '.$s['nome'].'</div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
					<th>Nome</th>
					<th>Curso</th>
					<th>Email</th>
					<th>Empresa</th>
					<th>Professor</th>
					<th>Inicio</th>';
					if($s['id_status'] == 1){
						echo '<th>Entrega DOCS</th>';
					}
					echo '<th> Termino </th>';
					
					if($s['id_status'] == 4){
						echo '<th>Data Desistencia</th>';
					}
					
					echo '<th width="70px">Ações</th>
                  </tr>
                </thead>
                <tbody>';
				$count_contato = 0;
				foreach ($estagios as $e) {
					
					if($s['id_status'] == $e['id_status']){
					
					echo '<tr>
							<td>';
							
							echo '<a href="#" rel="'. $e['id_estagio'] .'" class="btn-estagio-detalhes" data-toggle="modal" data-target="#modal-detalhes-estagio">
									',$e['nome_aluno'],'
								</a>';
							
						echo'	</td>
							<td>'.$e['curso'].'</td>
							<td>'.$e['email'].'</td>
							<td>'.$e['nome_empresa'].'</td>
							<td>'.$e['nome_professor'].'</td>
							<td>'.date('d/m/Y' ,strtotime($e['data_inicio'])).'</td>';
							
						if($s['id_status'] == 1){
							
							echo '<td>';

								if($e['data_inicio'] != '0000-00-00'){
									

														
									$diferenca =  strtotime('+15 days', strtotime($e['data_inicio'] )) - strtotime(date("Y/m/d"));
									
									$dias = floor($diferenca / (60 * 60 * 24));
									
									if($dias < 0)
											echo '<font color="red" > '.date('d/m/Y', strtotime('+15 days', strtotime($e['data_inicio'] ))) .'<i class="fa fa-exclamation-triangle"></i></font> ';
									else if($dias <= 5)
										echo '<font color="red" > Falta '.$dias.' dias  '.date('d/m/Y', strtotime('+15 days', strtotime($e['data_inicio'] ))) .'<i class="fa fa-exclamation-triangle"></i></font> ';
									else
										echo 'Falta '.$dias.'  dias ' .date('d/m/Y', strtotime('+15 days', strtotime($e['data_inicio'] )));
									

									/*								
									if($dias <= 0){
										echo 'Inicia em '.date('d/m/Y' ,strtotime($e['data_inicio'])) ;
									}else if($dias > 10){
										echo '<font color="red" > '.$dias.'  dias - '.date('d/m/Y', strtotime('+15 days', strtotime($e['data_inicio'] ))) .'<i class="fa fa-exclamation-triangle"></i></font> ';
									}else if($dias < 10){
										echo $dias.'  dias - ' .date('d/m/Y', strtotime('+15 days', strtotime($e['data_inicio'] )));
									}
									
									*/
									
								}else{
									echo '<font color="red" >  Data não Informada </font>';
								}
									
							echo '</td>';
						
						}
						
				
							
							echo '<td>'.date('d/m/Y' ,strtotime($e['data_termino'])).'</td>';
							
							
								if($s['id_status'] == 4){
									echo '<td>'.date('d/m/Y' ,strtotime($e['data_desistencia'])).'</td>';
								}
						
								echo '<td>';
								
								
								/*echo '<a href="#" rel="'. $e['id_estagio'] .'" class="btn btn-info btn-documentos-inicio" data-toggle="modal" data-target="#modal-documentos-inicio">
									       <i class="far fa-file-pdf"></i>
								</a>&nbsp;';					
								
									if($e['id_status'] != 4){
								echo '<a href="#" rel="'. $e['id_estagio'] .'" class="btn btn-danger btn-registrar-desistencia" data-toggle="modal" data-target="#modal-registrar-desistencia2">
									<i class="fas fa-user-times"></i>
								</a>';
									}
									
									if( $e['id_status'] == 4 ){
								echo '&nbsp;<a href="#" rel="'. $e['id_estagio'] .'" class="btn btn-success btn-gerarCertificado" data-toggle="modal" data-target="#modal-documentos-inicio">
									       <i class="fas fa-graduation-cap"></i>
								</a>';
									}
									
									if( $e['id_status'] == 1 ){
								echo '&nbsp;<a href="#" rel="'. $e['id_estagio'] .'" class="btn btn-success btn-confirmar-documentos" data-toggle="modal" data-target="#modal-confirma-documentos">
									       <i class="fas fa-graduation-cap"></i>
								</a>';
									}*/
									
								echo '<div class="dropdown">
									  <button class=" btn btn-secondary btn-sm dropdown-toggle"  id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
										Ações
									  </button>
									  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
									  
										<a class="dropdown-item btn-editar-estagio" href="#"  rel="'. $e['id_estagio'] .'" data-toggle="modal" data-target="#modal-editar-estagio">
										   <i class="fas fa-edit"></i> Editar Estagio </a>
										  
										<a class="dropdown-item btn-documentos-inicio" href="#"  rel="'. $e['id_estagio'] .'" data-toggle="modal" data-target="#modal-documentos-inicio">
										  <i class="far fa-file-pdf"></i> Gerar documentos </a>';
										
										if($e['id_status'] != 4 && $e['id_status'] != 5){
									   echo '<a class="dropdown-item btn-registrar-desistencia" href="#"   rel="'. $e['id_estagio'] .'|'. $e['id_aluno'].'" data-toggle="modal" data-target="#modal-registrar-desistencia">
												<i class="fas fa-user-times"></i> Registrar Desistencia </a> ';
										}
										
										if( $e['id_status'] == 1 ){
										echo '<a class="dropdown-item btn-confirmar-documentos" href="#"  rel="'. $e['id_estagio'] .'|'. $e['id_aluno'].'" data-toggle="modal" data-target="#modal-confirma-documentos">
											 <i class="fas fa-graduation-cap"></i> Confirmar Documentos </a>';
										}
										
										if( $e['id_status'] == 3 ){
										echo '<a class="dropdown-item btn-finalizar-estagio" href="#"  rel="'. $e['id_estagio'] .'|'. $e['id_aluno'].'" data-toggle="modal" data-target="#modal-finalizar-estagio">
											 <i class="fa fa-check" ></i> Finalizar Estagio </a>';
										}
									 
									 echo '</div>
									</div>';
							echo '</td>
						</tr>';
					$count_contato++;
					}
				}

               echo' </tbody>
              </table>
            
				  
	  				<script>
					$(function() {
						$("[aria-controls=pills-'.$s['id_status'].'] .badge").html("'. $count_contato .'");
					});
					</script>
					
			</div>
          </div>
        </div>
	  </div>'; 
				    		
	$count++;
 } ?>
				
  

  
  
  
</div>
	
</div>






</body>
</html>
