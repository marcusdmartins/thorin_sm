<?php

include_once ('./controller/PessoaController.php');

class Pessoa extends PessoaController {

	public function index() {
		$this -> view('index');
	}

	public function nova($json) {
		$controller = new PessoaController();
		$controller->nova($json);
	}

	public function listar($json) {
		$controller = new PessoaController();
		$controller->listar($json);
	}

	public function listartudo() {
		$controller = new PessoaController();
		$controller->listarTudo();
	}

	public function remover($json) {
		$controller = new PessoaController();
		$controller->deletar($json);
	}

	public function atualizar($json) {
		$controller = new PessoaController();
		$controller->update($json);
	}
        
	public function buscaPorLogin($json) {
		$controller = new PessoaController();
		$controller->buscaPorLogin($json);
	}
        
	public function buscaInstPessoa($json) {
		$controller = new PessoaController();
		$controller->buscaInstPessoa($json);
	}  
        
	public function listarPorTipo($json) {
		$controller = new PessoaController();
		$controller->listarPorTipo($json);
	}  
        
	public function buscaPorResponsavel($json) {
		$controller = new PessoaController();
		$controller->buscaPorResponsavel($json);
	} 
        
	public function alteraSenha($json) {
		$controller = new PessoaController();
		$controller->alteraSenha($json);
	}        
}