<?php

include_once ('./controller/DisciplinaProfessorController.php');

class DisciplinaProfessor extends DisciplinaProfessorController {

	public function index() {
		$this -> view('index');
	}

	public function nova($json) {
		$controller = new DisciplinaProfessorController();
		$controller->novo($json);
	}

	public function listar($json) {
		$controller = new DisciplinaProfessorController();
		$controller->listar($json);
	}

	public function listartudo() {
		$controller = new DisciplinaProfessorController();
		$controller->listarTudo();
	}

	public function remover($json) {
		$controller = new DisciplinaProfessorController();
		$controller->deletar($json);
	}

	public function atualizar($json) {
		$controller = new DisciplinaProfessorController();
		$controller->update($json);
	}
        
	public function buscaPorProfessor($json) {
		$controller = new DisciplinaProfessorController();
		$controller->buscaPorProfessor($json);
	}
        
	public function buscaPorTurma($json) {
		$controller = new DisciplinaProfessorController();
		$controller->buscaPorTurma($json);
	}        
}