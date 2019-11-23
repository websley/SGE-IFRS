<?php
defined('BASEPATH') OR exit('No direct script access allowed');




?>



	<div class="container-fluid">
	
	
	
	<br>
		
			<button type="button" class="btn btn-primary btn-lg btn-supervisor" data-toggle="modal"  data-target="#modal-cadastra-supervisor">Adicionar Supervisor</button>
	

	
	<br>
	<br>
	
	<!-- DataTables Example -->
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
					<th>Nome</th>
					<th>Telefone</th>
					<th>Formação</th>
					<th>Email</th>
					<th>Ações</th>
				 </tr>
                </thead>
                <tbody>';
				
				foreach ($supervisores  as $s){
					echo '<tr>
							<td>'.$s['nome'].'</td>
							<td>'.$s['telefone'].'</td>
							<td>'.$s['formacao'].'</td>
							<td>'.$s['email'].'</td>
							<td>
							<a href="#" rel="'.$s['id_supervisor'].'" class="btn btn-info btn-editar-supervisor" data-toggle="modal" data-target="#modal-editar-supervisor">
									       <i class="fas fa-edit"></i>
								</a>
							
							<a href="#" rel="'.$s['id_supervisor'].'" class="btn btn-danger btn-exclui-supervisor" data-toggle="modal" data-target="#modal-excluir-supervisor">
									       <i class="fas fa-user-times"></i>
								</a>
							
							</td>
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
