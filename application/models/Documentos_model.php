<?php

class Documentos_model extends CI_Model {


	function novo_doc($array){

		$this->db->insert('documentos',$array);

		return $this->db->insert_id();
		
	}
	
	function get_all_docs(){
		
		return $this->db->query('select doc_id, titulo, tipo from documentos where status like "A"')->result_array();


		/*return $this->db
			->where('status','A')
			->where('doc_id',11)
			->get('documentos')->row_array();*/
		
	}
	
	function get_all_rodape(){
		
		return $this->db->query('select rodape_id, titulo from rodape where status like "A"')->result_array();
		
	}
	
	function editar_doc($d){		
		
			$this->db->update('documentos', array(
						'titulo' => $d['titulo'],
						'texto' => $d['texto']
					), array(
						'doc_id' => $d['doc_id']
					));
		
		return true;
	}
	
	function excluir_doc($id){
							
					$this->db->update('documentos', array(
						'status' => 'I',
					), array(
						'doc_id' => $id
					));
					
					
		return true;

	}
	
	function get_doc($doc_id){

			return $this->db->query('select doc_id, texto, titulo from documentos where doc_id = '.$doc_id)->row_array();

	}
	
	function get_rodape($id){

			return $this->db->query('select * from rodape where rodape_id = '.$id)->row_array();

	}
	
	function novo_rodape($array){

		$this->db->insert('rodape',$array);

		return $this->db->insert_id();
		
	}

	function editar_rodape($d){		
		
			$this->db->update('rodape', array(
						'titulo' => $d['titulo'],
						'texto' => $d['texto']
					), array(
						'rodape_id' => $d['rodape_id']
					));
		
		return true;
	}

	function excluir_rodape($id){
							
					$this->db->update('rodape', array(
						'status' => 'I',
					), array(
						'rodape' => $id
					));
					
					
		return true;

	}
	
	function get_dooc($doc_id){

			return $this->db->query('select * from documentos where doc_id = '.$doc_id)->row_array();

	}
	
	function atribui_tipo($doc_id,$tipo){
		
			$this->db->update('documentos', array(
						'tipo' => $tipo
					), array(
						'doc_id' => $doc_id
					));
		
		return true;
	}

	
	function get_dados_docs($id){
		
		return	$this->db->query('select es.bolsa_aux, 
		es.carga_horaria, 
		es.carga_horaria_dia, 
		es.data_inicio,
		es.data_termino,
		es.obrigatorio,
		es.bolsa_aux,
		es.remuneracao,
		p.nome as professor,
		p.email as prof_email,
		em.cnpj,
		em.nome as nome_empresa,
		em.endereco as endereco_empresa,
		em.ramo_atividade,
		em.endereco as endereco_empresa,
		em.cidade as cidade_empresa,
		em.email as email_empresa,
		em.razao_social,
		em.telefone as telefone_empressa,
		em.rep_legal,
		em.rep_cargo,
		em.rep_cpf,
		em.rep_rg,
		em.rep_data_expedido,
		em.rep_orgao_emissor,
		a.nome as aluno,
		a.turma,
		a.curso,
		a.cpf,
		a.endereco as endereco_aluno,
		a.rg,
		a.bairro,
		a.orgao_expedidor,
		a.data_expedicao,
		a.data_nascimento,
		a.bairro,
		a.CEP,
		a.cidade as cidade_aluno,
		a.uf,
		a.telefone as telefone_aluno,
		a.celular,
		a.email as email_aluno,
		su.nome as nome_super,
		su.formacao,
		su.email as email_super,
		su.telefone as telefone_super,
		ag.nome as agente_integracao
		from estagios as es 
			join empresa as em on es.id_empresa = em.id_empresa
			join aluno as a on es.id_aluno = a.id_aluno
			join professores as p on es.id_professor = p.id_professor
			left join supervisor_estagio as su on es.id_supervisor = su.id_supervisor
			left join agente_integracao as ag on es.id_agente_integracao = ag.id_agente_integracao
			where es.id_estagio ='.$id)->row_array();
	}
}

?>
