<div id="modal-editar-estagio" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true" data-backdrop="static">
	<div class="modal-dialog modal-xl" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title text-primary" id="myModalLabel">Adicionar Estagio</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			</div>
			<div class="modal-body">
				<form id="form_editar_estagio" onsubmit="return false;" method="POST" enctype="multipart/form-data">
					<input type="hidden" name="id_estagio" value="">
					<div class="row">
						<div class="col border-right ">
							<div class="form-group">
								<label><strong>Aluno</strong></strong></label>
								<select name="aluno" class="form-control disabled" data-required="Selecione O Tipo de Contato.">
									<?php
									foreach ($alunos as $a) {
										echo '<option value="' . $a['id_aluno'] . '"';
										echo '>' . $a['nome'] . '</option>';
									}
									?>
								</select>
							</div>
							<div class="form-group">
								<label><strong>Professor</strong></label>
								<select name="professor" class="form-control disabled">
									<?php
									foreach ($professores as $p) {
										if ($p['qtd'] < 10) {
											echo '<option value="' . $p['id_professor'] . '"';
											echo '>' . $p['nome'] . '</option>';
										}
									}
									?>
								</select>
							</div>
							<div class="form-group">
								<label><strong>Empresas</strong></label>
								<select name="empresa" class="form-control disabled" data-required="Selecione O Tipo de Contato.">
									<option value=""></option>
									<?php
									foreach ($empresas as $e) {
										echo '<option value="' . $e['id_empresa'] . '"';
										echo '>' . $e['nome'] . '</option>';
										$empresa_id = $e['id_empresa'];
									}
									?>
								</select>
							</div>
							<div class="form-group">
								<label><strong>Supervisor</strong></label>
								<select name="supervisor" class="form-control">
									<option value=""></option>
								</select>
							</div>
							<div class="form-check">
								<input name="obrigatorio" class="form-check-input" type="checkbox" value="1" id="defaultCheck1">
								<label class="form-check-label" for="defaultCheck1">
									Obrigatorio
								</label>
							</div>
						</div>
						<div class="col">
							<div class="row">
								<div class="col">
									<div class="form-group">
										<label><strong>Data Inicio</strong></label>
										<input name="data_ini" type="date" class="form-control" placeholder="">
									</div>
									<div class="form-group">
										<label><strong>Carga Horaria Total</strong></label>
										<input name="ch" type="text" class="form-control" placeholder="">
									</div>
									<div class="form-group">
										<label><strong>Turno</strong></label>
										<select name="turno" class="form-control disabled" data-required="Selecione O Tipo de Contato.">
											<option value=""></option>
											<option value="manha">Manha</option>
											<option value="tarde">Tarde</option>
											<option value="noite">Noite</option>
											<option value="integral">Integral</option>
										</select>
									</div>
									<div class="form-group">
										<label><strong>Agente de integração</strong></label>
										<select name="agente" class="form-control disabled" data-required="Agente de integração.">
											<option value=""></option>
											<?php
											foreach ($agentes as $agente) {
												echo '<option value="' . $agente['id_agente_integracao'] . '"';
												echo '>' . $agente['nome'] . '</option>';
											}
											?>
										</select>
									</div>
								</div>
								<div class="col">
									<div class="form-group">
										<label><strong>Data Final</strong></label>
										<input name="data_fim" type="date" class="form-control" placeholder="">
									</div>
									<div class="form-group">
										<label><strong>Carga Horaria Diaria</strong></label>
										<input name="ch_dia" type="text" class="form-control" placeholder="">
									</div>
									<div class="form-group">
										<label><strong>Atividade Prevista</strong></label>
										<input name="atv_pre" type="text" class="form-control" placeholder="">
									</div>
									<div class="row">
										<div class="col text-right">
											<br>
											<label><strong>Beneficios</strong></label>
										</div>
										<div class="col text-left">
											<br>
											<div class="form-check">
												<input name="alimentacao" class="form-check-input" type="checkbox" value="1" id="defaultCheck1">
												<label class="form-check-label" for="defaultCheck1">
													Alimentação
												</label>
											</div>
											<div class="form-check">
												<input name="transporte" class="form-check-input" type="checkbox" value="1" id="defaultCheck2">
												<label class="form-check-label" for="defaultCheck2">
													Transporte
												</label>
											</div>
											<div class="form-check">
												<input name="remuneracao" class="form-check-input" type="checkbox" value="1" id="defaultCheck3">
												<label class="form-check-label" for="defaultCheck3">
													Remuneração
												</label>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
			</div>
			<div class="modal-footer">
				<input type="hidden" name="id_estagio" value="">
				<button type="submit" class="btn btn-success" data-toggle="modal" data-target=".loading">Salvar</button>
				</form>
			</div>
		</div>
	</div>
</div>