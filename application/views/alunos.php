<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
	<br/>
	<div id="content-wrapper">

      <div class="container-fluid">

		
		 <div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-chart-area"></i>
            Alunos</div>
          <div class="card-body">
		  

        
      
		
		
	<?php
			
		echo ' 
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
					<th>Nome</th>
					<th>Email</th>
					<th>Curso</th>
					<th>Turma</th>
					<th>Horas Estagio</th>
					<th>Editar</th>
                  </tr>
                </thead>
                <tbody>';
	
	foreach($alunos  as $a){
		
	
						echo '<tr>
							<td>'.$a['nome'] .'</td>
							<td>'.$a['email'].'</td>
							<td>'.$a['curso'].'</td>
							<td>'.$a['turma'].'</td>
							<td>
								<a href="#" rel="'. $a['id_aluno'] .'" class="detalhes-horas"   data-toggle="modal" data-target="#modal-detalhes-horas">
							
									<i class="fas fa-clock"></i>
									'.$a['horas_estagio'].'
									
								</a>
							</td>
					
							<td>
								<a href="#" rel="'.$a['id_aluno'].'" class="btn btn-info btn-editar-aluno" data-toggle="modal" data-target="#modal-editar-aluno">
									       <i class="fas fa-edit"></i>
										   
								</a>	
							<a href="#" rel="'.$a['id_aluno'].'" class="btn btn-danger btn-exclui-aluno" data-toggle="modal" data-target="#modal-excluir-aluno">
									       <i class="fas fa-user-times"></i>
								</a>								
							</td>
						</tr>';
			
		}
		
		
		               echo' </tbody>
              </table>';
		

?>
  </div>
  </div>


</div>

</div>


</body>
</html>