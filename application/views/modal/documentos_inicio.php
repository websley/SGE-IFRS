<div id="modal-documentos-inicio" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true" data-backdrop="static">
	<div class="modal-dialog modal-xl" role="document">

			<div class="modal-content">
				<div class="modal-header">
							<h5 class="modal-title text-primary text-center" id="myModalLabel">Documentos Estagio</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				</div>
				
				<div class="modal-body">
		
			<div class="container">
			  <div class="row">
				<div class="col-sm">
				
					<h5 class="modal-title text-primary text-center" id="myModalLabel">Documentos para o Início do Estagio</h5>
						
				 
				 			<div class="list-group">
			<?php
			
        foreach($documentos as $d){
          if($d['tipo'] == 'Inicio'){
            echo '<button href="#" type="button" name="docs" rel="'.$d['doc_id'].'" class="list-group-item list-group-item-action btn-gerar-teste" data-toggle="modal" data-target="#modal-data-documento">'.$d['titulo'].'</button>';
          }
        }

				?>
				</div>
				 
				</div>
				<div class="col-sm">
				
					<h5 class="modal-title text-primary text-center" id="myModalLabel">Documentos para o Termino do Estagio</h5>
						
				  
				 			<div class="list-group">
			<?php
			
			foreach($documentos as $d){
				if($d['tipo'] == 'Final'){
					echo '<button href="#" type="button" name="docs" rel="'.$d['doc_id'].'" class="list-group-item list-group-item-action btn-gerar-teste" data-toggle="modal" data-target="#modal-data-documento">'.$d['titulo'].'</button>';
				}
			}

				?>
              </div>
				    </div>
			    </div>
		  	</div>
      </div>
    </div>
	</div>
</div>
