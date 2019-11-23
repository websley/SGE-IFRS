<?php
class Usuario{
    public $id;
    public $nome;
    public $email;
	public array[] $alunos;
    //construtor da classe
	
	
	
    function Usuario(){
        $this->preparaUsuario();
    }
 
    function preparaUsuario(){
        $this->nome = "Octavio";
        $this->cpf = "99999999999";
        $this->endereco = "Rua Fulano de Tal número 0 apt 999";
    }
 
} ?>