<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
?>

	<br/>
	<div id="content-wrapper">
      <div class="container-fluid">
		<button type="button" class="btn btn-primary btn-lg btn-cadastra-agente" data-toggle="modal"  data-target="#modal-cadastra-agente">Adicionar</button>
		 <br>
         <div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-chart-area"></i>
            Agentes de Integração</div>
        <div class="card-body">
	    <?php
		echo '<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
					<th>Nome</th>
					<th>Editar</th>
                  </tr>
                </thead>
                <tbody>';
	
            foreach($agentes  as $agente){

                echo '<tr>
                        <td>'.$agente['nome'] .'</td>';
                echo '<td>
                            <a href="#" rel="'.$agente['id_agente_integracao'].'" class="btn btn-info btn-editar-agente" data-toggle="modal" data-target="#modal-editar-agente">
                                <i class="fas fa-edit"></i>   
                            </a>	
                            <a href="#" rel="'.$agente['id_agente_integracao'].'" class="btn btn-danger btn-exclui-agente " data-toggle="modal" data-target="#modal-excluir-agente">
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