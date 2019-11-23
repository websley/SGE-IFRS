<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

	<div class="container-fluid">
	<br>

	<?php
	
	
	
        echo '<div class="card mb-3">
			  <div class="card-header">
				<i class="fas fa-table"></i>
			   Supervisores</div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
					<th>Aluno</th>
					<th>Email</th>
					<th>Telefone</th>
					<th>Curso</th>
					<th>Inicio</th>
					<th>Termino</th>
					<th>Status</th>
				 </tr>
                </thead>
                <tbody>';
				
				foreach ($estagios  as $e){
					
				
					
					echo '<tr>
							<td>'.$e['nome'].'</td>
							<td>'.$e['email'].'</td>
							<td>'.$e['telefone'].'</td>
							<td>'.$e['curso'].'</td>
							<td>'.date('d/m/Y' ,strtotime($e['data_inicio'])).'</td>
							<td>'.
							( $e['id_status'] == 4 ? date('d/m/Y' ,strtotime($e['data_desistencia'])) : date('d/m/Y' ,strtotime($e['data_termino'])))
							
							.'</td>
							<td>';
							
							
							switch($e['id_status']) {
									case 1:
										echo "Iniciando";
										break;
									case 2:
										echo "Andamento";
										break;
									case 3:
										echo "Final";
										break;
									case 4:
										echo "Desistente";
										break;
									case 5:
										echo "Finalizado";
										break;
								}
							
							
							
							echo '</td>
						  </tr>';
					
					
					
				}
				 echo '</tbody>
              </table>
			  </div>
          </div>
        </div>
	 ';
	  
	  ?>
	
	
	
	</div>
	
	
	


</body>
</html>
