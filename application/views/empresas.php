<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
	<br/>
	<div id="content-wrapper">

      <div class="container-fluid">

		
		 <div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-chart-area"></i>
            Empressas</div>
          <div class="card-body">

	<?php
			
		echo ' 
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
					<th>Nome</th>
					<th>Email</th>
					<th>Estagiaros</th>
					<th>Ações</th>
                  </tr>
                </thead>
                <tbody>';
	
	foreach($empresas  as $e){
		
	
						echo '<tr>
							<td>'.$e['nome'] .'</td>
							<td>'.$e['email'].'</td>
							<td>';
							
							foreach($qtds_alunos as $qtd){
								
								if($qtd['id_empresa'] == $e['id_empresa']){
									
									if($qtd['qtd'] != null)
										echo '<br>'.$qtd['qtd'];
									else
										echo '0';
								}
							}
							
							echo '</td>
							<td>
								<a href="#" rel="'.$e['id_empresa'].'" class="btn btn-info btn-editar-empresa" data-toggle="modal" data-target="#modal-editar-empresa">
									       <i class="fas fa-edit"></i>
										   
								</a>
								<a href="#" rel="'.$e['id_empresa'].'|'.$e['email'].'" class="btn btn-info atualiza-senha">
									       <i class="fas fa-sync-alt"></i>
										   
								</a>
								<a href="#" rel="'.$e['id_empresa'].'" class="btn btn-danger btn-exclui-empresa " data-toggle="modal" data-target="#modal-excluir-empresa">
									       <i class="fas fa-user-times"></i>
								</a>								
							</td>
						</tr>';
		
		
		
		
		
		
	
		/*echo '
					<ul style="float:left; margin:0px; padding:10px 10px; list-style:none; width:100%">
						<li style="float:left; width:100%">
							<div class="head-notas">
								<span class="tipo"></span>
								<div class="row">
								<div class="col-sm">',
								  $profs['nome'] ,
								'</div>
								<div class="col-sm">',
								  $profs['email'],
								'</div>
								
								<div class="col-sm">';
									
								echo '</div>
								<span style="float:right" name="seta">
									&#9658;
								</span>
							</div>
														
							
								</div>
							<div class="notas" style="display: none;"  >';
							
							foreach($alunos as $a){
								
								if($a['id_professor'] == $profs['id_professor'])
									echo '<br>',$a['nome'],' ',$a['email'];				
							}
							

							echo '</div>
						</li>
					</ul>
					';
					
					*/
		}
		
		
		               echo' </tbody>
              </table>';
		
		/*foreach($qtds  as $q){
			echo 'alou',$q['id_professor'];
		}*/
?>
  </div>
  </div>


</div>

</div>


</body>
</html>