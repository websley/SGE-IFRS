<div id="modal-editar-documento" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog modal-xl" role="document">

			<div class="modal-content">
				<div class="modal-header">
							<h5 class="modal-title text-primary" id="myModalLabel">Editar de documento</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				</div>
				<div class="modal-body" >

	<form id="form_editar_doc" class="needs-validation" onsubmit="return false;" method="POST" enctype="multipart/form-data" novalidate>
	<input type="hidden" name="doc_id" value="">
	
		 <div class="form-group">
			<label><strong>Titulo</strong></label>
			<input name="titulo" type="text" class="form-control" placeholder="" required>
			</div> 
			
	<div class="container">
		  <div class="row ">
			<div class="col-3 border">
					<div class="form-group">
						<div class="col">
							<strong>Tags</strong>
						</div> 
<div class="div-overflow">		

		
						</div>
				<div class="accordion" id="accordionExample">
				 <div class="card">
					<div class="card-header" id="headingOne">
					  
						<button class="btn btn-link" type="button" data-toggle="collapse" data-target="#professor" aria-expanded="false" aria-controls="professor">
						  Professor 
						</button>
					 
					</div>

					<div id="professor" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
					  <div class="card-body">
						{PROFESSOR_NOME}<br>
						{PROFESSOR_EMAIL}<br>
					
					  </div>
					</div>
				  </div>
				  <div class="card">
					<div class="card-header" id="headingTwo">
					  <h5 class="mb-0">
						<button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#aluno" aria-expanded="false" aria-controls="aluno">
							Aluno
						</button>
					  </h5>
					</div>
					<div id="aluno" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
					  <div class="card-body">
					  	(ALUNO_NOME}<br>
						{ALUNO_CURSO}<br>
						{ALUNO_TURMA}<br>
						{ALUNO_EMAIL}<br>
						{ALUNO_CELULAR}<br>
						{ALUNO_TELEFONE}<br>
						{ALUNO_UF}<br>
						{ALUNO_CIDADE}<br>
						{ALUNO_ENDERECO}<br>
						{ALUNO_DATA_NASCIMENTO}<br>
						{ALUNO_CPF}<br>
						{ALUNO_DATAEX}<br>
						{ALUNO_ORG}<br>
						{ALUNO_BAIRRO}<br>
						{ALUNO_ORG}<br>
					  </div>
					</div>
				  </div>
				  <div class="card">
					<div class="card-header" id="headingThree">
					  <h5 class="mb-0">
						<button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#empresa" aria-expanded="false" aria-controls="empresa">
						  Empresa
						</button>
					  </h5>
					</div>
					<div id="empresa" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
					  <div class="card-body">
					{EMPRESA_RAZAO}<br>
					{EMPRESA_NOME}<br>
					{EMPRESA_ENDERECO}<br>
					{EMPRESA_CNPJ}<br>
					{EMPRESA_RAMO_ATIVIDADE}<br>
					{EMPRESA_EMAIL}<br>
					{EMPRESA_CIDADE}<br>
					{EMPRESA_TELEFONE}<br>
					{EMPRESA_REPRESENTANTE_LEGAL}<br>
					{EMPRESA_REPRESENTANTE_CARGO}<br>
					  </div>
					</div>
				  </div>
				  <div class="card">
					<div class="card-header" id="headingThree">
					  <h5 class="mb-0">
						<button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#super" aria-expanded="false" aria-controls="super">
						  Supervisor
						</button>
					  </h5>
					</div>
					<div id="super" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
					  <div class="card-body">
					 {SUPER_NOME}<br>
					{SUPER_FORMACAO}<br>
					{SUPER_EMAIL}<br>
					{SUPER_TELEFONE}<br>
					  </div>
					</div>
				  </div>
				  <div class="card">
					<div class="card-header" id="headingThree">
					  <h5 class="mb-0">
						<button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#estagio" aria-expanded="false" aria-controls="estagio">
						  Estágio
						</button>
					  </h5>
					</div>
					<div id="estagio" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
					  <div class="card-body">
					{HORAS_DIARIA}<br>
					{HORAS_TOTAL}	<br>
					{AUXILIO}<br>
					{OBRIGATORIO_NAO}<br>
					{OBRIGATORIO_SIM}<br>
					{DATA_INICIO}<br>
					{DATA_FINAL}<br>
					  </div>
					</div>
				  </div>
				  <div class="card">
					<div class="card-header" id="headingThree">
					  <h5 class="mb-0">
						<button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#data" aria-expanded="false" aria-controls="data">
						  Datas
						</button>
					  </h5>
					</div>
					<div id="data" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
					  <div class="card-body">
					{DATA}<br>
					{DATA_ABREVIADA}
					  </div>
					</div>
				  </div>
				  
				  
				</div>
				
				
						
					</div>
			</div>
			<div class="col-9 border">
			
					<div class="form-group">
						<div class="col">
							<strong>Texto do documento</strong>
						</div>  

						<div class="col">
						<center>
							<textarea name="texto" id="mensagem" class="form-control tinymce" ></textarea>
						</center>
						</div>
					</div>

			</div>
		 
		  </div>
		</div>
	

						</div><div class="modal-footer">
			<button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
			<button type="submit" class="btn btn-success">Salvar</button>
		</form>
    </div>
    </div>
    </div>
    </div>

