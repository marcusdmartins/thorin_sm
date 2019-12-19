<?php

include_once ('./controller/DisciplinaController.php');

class Disciplina extends DisciplinaController {

	public function index() {
		$this -> view('index');
	}

	public function nova($json) {
		$controller = new DisciplinaController();
		$controller->novo($json);
	}

	public function listar($json) {
		$controller = new DisciplinaController();
		$controller->listar($json);
	}

	public function listartudo() {
		$controller = new DisciplinaController();
		$controller->listarTudo();
	}

	public function remover($json) {
		$controller = new DisciplinaController();
		$controller->deletar($json);
	}

	public function atualizar($json) {
		$controller = new DisciplinaController();
		$controller->update($json);
	}
        
	public function disciplinaPorCurso($json) {
		$controller = new DisciplinaController();
		$controller->disciplinaPorCurso($json);
	}   
        
	public function buscaInstDisciplina($json) {
		$controller = new DisciplinaController();
		$controller->buscaInstDisciplina($json);
	}          
}