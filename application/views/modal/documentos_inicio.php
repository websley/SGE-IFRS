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
	
	
	<!--
		  
		  <div class="row text-center"">
						<div class="col">
          <div class="card text-white bg-success mb-3"  style="max-width: 18rem;">
            <div class="card text-white bg-success o-hidden h-100">
              <div class="card-body">
                <div class="card-body-icon">
                  <i class="far fa-file-pdf"></i>
                </div>
                <div class="mr-5">TERMO DE COMPROMISSO DE ESTÁGIO </div>
              </div>
              <button name="docs" rel="2"  data-toggle="modal" data-target="#modal-data-documento" class="card-footer btn text-white clearfix small z-1 btn-gerar-documentos-termoCompromissoEstagio" href="#">
                <span class="float-left">Gerar Documento</span>
                <span class="float-right">
                  <i class="fas fa-angle-right"></i>
                </span>
              </button>
            </div>
          </div>
						</div>
						<div class="col">
          <div class="card text-white bg-success mb-3"  style="max-width: 18rem;">
            <div class="card text-white bg-success o-hidden h-100">
              <div class="card-body">
                <div class="card-body-icon">
                  <i class="far fa-file-pdf"></i>
                </div>
                <div class="mr-5">TERMO DE INFORMAÇÃO DO PROFESSOR</div>
              </div>
              <button  rel="1" data-toggle="modal" data-target="#modal-data-documento" name="docs" class="card-footer btn text-white clearfix small z-1 btn-gerar-documentos_TermoProfessor" href="#">
                <span class="float-left">Gerar Documento</span>
                <span class="float-right">
                  <i class="fas fa-angle-right"></i>
                </span>
              </button>
            </div>
          </div>
						</div>
											<div class="col">
          <div class="card text-white bg-success mb-3"  style="max-width: 18rem;">
            <div class="card text-white bg-success o-hidden h-100">
              <div class="card-body">
                <div class="card-body-icon">
                  <i class="far fa-file-pdf"></i>
                </div>
                <div class="mr-5">TERMO DE INFORMAÇÃO DO TESTE</div>
              </div>
              <button  rel="1" data-toggle="modal" data-target="#modal-data-documento" name="docs" class="card-footer btn text-white clearfix small z-1 btn-gerar-teste" href="#">
                <span class="float-left">Gerar Documento</span>
                <span class="float-right">
                  <i class="fas fa-angle-right"></i>
                </span>
              </button>
            </div>
          </div>
						</div>
						
						<div class="w-100"></div>
						<div class="col">

          <div class="card text-white bg-success mb-3"  style="max-width: 18rem;">
            <div class="card text-white bg-success o-hidden h-100">
              <div class="card-body">
                <div class="card-body-icon">
                  <i class="far fa-file-pdf"></i>
                </div>
                <div class="mr-5">PLANO DE ATIVIDADE DO ESTAGIARIO</div>
              </div>
              <button name="docs" rel="3"  data-toggle="modal" data-target="#modal-data-documento" class="card-footer btn text-white clearfix small z-1 btn-gerar-documentos-planoAtividadeEstagio" href="#">
                <span class="float-left">Gerar Documento</span>
                <span class="float-right">
                  <i class="fas fa-angle-right"></i>
                </span>
              </button>
            </div>
          </div>
							
						</div>
						<div class="col">
						
          <div class="card text-white bg-success mb-3"  style="max-width: 18rem;">
            <div class="card text-white bg-success o-hidden h-100">
              <div class="card-body">
                <div class="card-body-icon">
                  <i class="far fa-file-pdf"></i>
                </div>
                <div >DECLARAÇÃO DE EXPEROENCIA PROFISSIONAL</div>
              </div>
              <button name="docs" rel="8"  data-toggle="modal" data-target="#modal-data-documento" class="card-footer btn text-white clearfix small z-1  btn-gerar-documentos-declaracaoExperoencia" href="#">
                <span class="float-left">Gerar Documento</span>
                <span class="float-right">
                  <i class="fas fa-angle-right"></i>
                </span>
              </button>
            </div>
          </div>
						</div>
						<div class="w-100"></div>
						<div class="col">
						
          <div class="card text-white bg-success mb-3"  style="max-width: 18rem;">
            <div class="card text-white bg-success o-hidden h-100">
              <div class="card-body">
                <div class="card-body-icon">
                  <i class="far fa-file-pdf"></i>
                </div>
                <div class="mr-5">CONFIRMAÇÃO ESTAGIO EMPRESSA CONSEDENTE</div>
              </div>
              <button name="docs" rel="4"  data-toggle="modal" data-target="#modal-data-documento"  class="card-footer btn text-white clearfix small z-1 btn-gerar-documentos-confirmacaoEstagioEmpresa" href="#" data-toggle="modal" data-target="#modal-data_documento">
                <span class="float-left">Gerar Documento</span>
                <span class="float-right">
                  <i class="fas fa-angle-right"></i>
                </span>
              </button>
            </div>
          </div>	
						</div>
					  </div>

				</div>
				
							<hr>
				
							<h5 class="modal-title text-primary text-center" id="myModalLabel">Documentos para o Inicio do Estagio</h5>

								<div class="modal-body">

					<div class="row">
						<div class="col">
          <div class="card text-white bg-success mb-3"  style="max-width: 18rem;">
            <div class="card text-white bg-success o-hidden h-100">
              <div class="card-body">
                <div class="card-body-icon">
                  <i class="far fa-file-pdf"></i>
                </div>
                <div class="mr-5">AVALIAÇÃO DO RELATORIO DE ESTAGIO </div>
              </div>
              <button name="docs" rel="5"  data-toggle="modal" data-target="#modal-data-documento" class="card-footer btn text-white clearfix small z-1 btn-gerar-documentos-avaliacaoEstagioProfessor" href="#">
                <span class="float-left">Gerar Documento</span>
                <span class="float-right">
                  <i class="fas fa-angle-right"></i>
                </span>
              </button>
            </div>
          </div>
						</div>
						<div class="col">
          <div class="card text-white bg-success mb-3"  style="max-width: 18rem;">
            <div class="card text-white bg-success o-hidden h-100">
              <div class="card-body">
                <div class="card-body-icon">
                  <i class="far fa-file-pdf"></i>
                </div>
                <div class="mr-5">AVALIAÇÃO EMPRESSA</div>
              </div>
              <button name="docs" rel="6"  data-toggle="modal" data-target="#modal-data-documento" class="card-footer btn text-white clearfix small z-1 btn-gerar-documentos-avaliacaoEstagioEmpresa" href="#">
                <span class="float-left">Gerar Documento</span>
                <span class="float-right">
                  <i class="fas fa-angle-right"></i>
                </span>
              </button>
            </div>
          </div>
						</div>
						<div class="w-100"></div>
						<div class="col">
						
          <div class="card text-white bg-success mb-3"  style="max-width: 18rem;">
            <div class="card text-white bg-success o-hidden h-100">
              <div class="card-body">
                <div class="card-body-icon">
                  <i class="far fa-file-pdf"></i>
                </div>
                <div class="mr-5">ACOMPANHAMENTO DE ESTÁGIO</div>
              </div>
              <button name="docs" rel="7"  data-toggle="modal" data-target="#modal-data-documento" class="card-footer btn text-white clearfix small z-1 btn-gerar-documentos-acompanhamentoEstagio" href="#">
                <span class="float-left">Gerar Documento</span>
                <span class="float-right">
                  <i class="fas fa-angle-right"></i>
                </span>
              </button>
            </div>
          </div>
							
						</div>
          </div>
						</div>
						
						-->
					  </div>

	
			</div>

	</div>
</div>
