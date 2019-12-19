<?php

include_once ('./controller/MatriculaDisciplinaController.php');

class MatriculaDisciplina extends MatriculaDisciplinaController {

	public function index() {
		$this -> view('index');
	}

	public function nova($json) {
		$controller = new MatriculaDisciplinaController();
		$controller->novo($json);
	}

	public function listar($json) {
		$controller = new MatriculaDisciplinaController();
		$controller->listar($json);
	}

	public function listartudo() {
		$controller = new MatriculaDisciplinaController();
		$controller->listarTudo();
	}

	public function remover($json) {
		$controller = new MatriculaDisciplinaController();
		$controller->deletar($json);
	}

	public function atualizar($json) {
		$controller = new MatriculaDisciplinaController();
		$controller->update($json);
	}
        
	public function buscaPorMatricula($json) {
		$controller = new MatriculaDisciplinaController();
		$controller->buscaPorMatricula($json);
	}   
        
	public function buscaPorMatriculaDisciplina($json) {
		$controller = new MatriculaDisciplinaController();
		$controller->buscaPorMatriculaDisciplina($json);
	}         
}