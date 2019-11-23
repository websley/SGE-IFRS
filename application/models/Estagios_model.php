<?php

class Estagios_model extends CI_Model {


	function cadastraAluno($array){

		//$this->db->query("insert into aluno (nome, curso) values ('".$nome."','".$curso."')")->result_array();
		$this->db->insert('aluno',$array);

		return $this->db->insert_id();


	}

	function getALuno($id){

		return $this->db->where('id_aluno',$id)->get('aluno')->row_array(0);

	}

	function getAlunos(){

		return  $this->db->get('aluno')->result_array();

	}
	
	function getEstagios(){
		
		return $this->db->query('select id_estagio, a.nome as nome_aluno, data_inicio, data_termino, data_desistencia ,obrigatorio,
										a.id_aluno, p.nome as nome_professor, 
										em.nome as nome_empresa, a.curso, a.email , e.id_status from estagios as e 
    	join aluno as a on e.id_aluno = a.id_aluno
    	join professores as p on e.id_professor = p.id_professor
    	join empresa as em on e.id_empresa = em.id_empresa 
    	order by e.id_status')->result_array();

		
	}
	
	function cadastraEstagio($data){
		
		$this->db->insert('estagios', $data); 
		
				
				$this->db->update('aluno', array(
						'id_status' => 1,
					), array(
						'id_aluno' => $data['id_aluno'],
					));
	
		return true;
		
	}
	
	function getStatus(){

		return  $this->db->get('status')->result_array();

	}


	function getEstagioDetalhes($id_estagio){
		
		
		return $this->db->query('select 
				id_estagio, 
				a.nome as nome_aluno, 
				a.id_aluno, 
				p.nome as nome_professor, 
				em.nome as nome_empresa, 
				a.curso, 
				a.email , 
				e.id_status, 
				e.data_inicio, 
				e.data_termino,
				e.objetivo_estagio,
				e.atividade_prevista,
				e.turno,
				e.carga_horaria,
				e.bolsa_aux
				from estagios as e 
    	join aluno as a on e.id_aluno = a.id_aluno
    	join professores as p on e.id_professor = p.id_professor
    	join empresa as em on e.id_empresa = em.id_empresa 
		where id_estagio = '.$id_estagio.'
    	order by e.id_status')->row_array();

		
	}

	function registrarDesistencia($data){
					
					$this->db->update('estagios', array(
						'id_status' => 4,
						'data_desistencia' => date("Y-m-d H:i:s"),
					), array(
						'id_estagio' => $data['id_estagio'],
					));
					
					$this->db->update('aluno', array(
						'id_status' => 4,
					), array(
						'id_aluno' => $data['id_aluno'],
					));
					
		return true;

	}
		
	//* FUnçao que atualiza o status do fazendo um update na tebela estagio e na aluno.	
		function confirma_documentos($data){
					
					$this->db->update('estagios', array(
						'id_status' => 2,
					), array(
						'id_estagio' => $data['id_estagio']
					));
					
					
					$this->db->update('aluno', array(
						'id_status' => 2,
					), array(
						'id_aluno' => $data['id_aluno'],
					));
					
					return true;
	}

	
	function atualizaStatus(){
		
		/*$estagios = $this->db->query('
			select id_estagio, data_termino, DATEDIFF (data_termino,CURDATE( )) as terminando from estagios
				where id_status = 2')->result_array();*/
				
		$estagios = $this->db->query('
    		select d.id_estagio, d.terminando , d.id_aluno from
    	    	(select id_aluno, id_estagio, data_termino, DATEDIFF (data_termino,CURDATE( )) as terminando from estagios
    				where id_status = 2) as d
    				 where d.terminando < 30')->result_array();
		
		
		foreach($estagios as $e){
				
				$this->db->update('estagios', array(
						'id_status' => 3,
					), array(
						'id_estagio' => $e['id_estagio']
					));
					
				$this->db->update('aluno', array(
						'id_status' => 3,
					), array(
						'id_aluno' => $e['id_aluno'],
					));
				
			}
		
		
		
	}
	
	
	//**Função que seta o status do estagio para finalizado
	
	function finalizaEstagio($data){
		
					$this->db->update('estagios', array(
						'id_status' => 5,
					), array(
						'id_estagio' => $data['id_estagio']
					));
					
					
					$this->db->update('aluno', array(
						'id_status' => 5,
					), array(
						'id_aluno' => $data['id_aluno'],
					));
					
					return true;
					
	}
	
	function getEstagio($id_estagio){
		
		return $this->db->where('id_estagio',$id_estagio)->get('estagios')->row_array(0);
		//var_dump($this->db->where('id_estagio',$id_estagio)->get('estagios')->row_array(0));
		
		
	}
	
	// Edita as informações do estagio.
	function editarEstagio($d){
	
		$this->db->where('id_estagio',  $d['id_estagio']);
		$this->db->update('estagios', $d);
		
		return true;
		
	}
	
	// Adiciona as horas do estagio linha do aluno na tabela do aluno, consultando os dados do estagio
	function contabiliza_horas($d){
		
			if(empty($d['horas_feitas'])){
				$horas = $this->db->select('carga_horaria')->where('id_estagio',$d['id_estagio'])->get('estagios')->row(0);
				$horas_estagio = intval($horas->carga_horaria);
			}else{
				//var_dump($d['horas_feitas']);
				$horas_estagio = $d['horas_feitas'];
			}
			
		
		$this->db->query(' update aluno set horas_estagio = horas_estagio + '.$horas_estagio.'
							where id_aluno = '.$d['id_aluno']);		
		
	}







}


?>
