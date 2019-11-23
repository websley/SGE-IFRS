<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
	<br/>
	<div id="content-wrapper">

      <div class="container-fluid">
	  
		 <div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-chart-area"></i>
            Professores</div>
          <div class="card-body">
		  

        
      
		
		
	<?php
			
		echo ' 
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
					<th>Nome</th>
					<th>Email</th>
					<th>Quantidade Alunos</th>
					<th>Editar</th>
                  </tr>
                </thead>
                <tbody>';
	
	foreach($professores  as $p){
		
	
						echo '<tr>
							<td>'.$p['nome'] .'</td>
							<td>'.$p['email'].'</td>
							<td>';
							 echo $p['qtd'];
							/*foreach($qtds_alunos as $qtd){
								
								if($qtd['id_professor'] == $p['id_professor']){
									
									if($qtd['qtd'] != null)
										echo '<br>'.$qtd['qtd'];
									else
										echo '0';
								}
							}*/
							
							echo '</td>
							<td>
								<a href="#" rel="'.$p['id_professor'].'" class="btn btn-info btn-editar-professor" data-toggle="modal" data-target="#modal-editar-professor">
									       <i class="fas fa-edit"></i>
										   
								</a>	
								<a href="#" rel="'.$p['id_professor'].'" class="btn btn-danger btn-exclui-professor " data-toggle="modal" data-target="#modal-excluir-professor">
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