<?php

include_once ('./controller/TurmaController.php');

class Turma extends TurmaController {

	public function index() {
		$this -> view('index');
	}

	public function nova($json) {
		$controller = new TurmaController();
		$controller->novo($json);
	}

	public function listar($json) {
		$controller = new TurmaController();
		$controller->listar($json);
	}

	public function listartudo() {
		$controller = new TurmaController();
		$controller->listarTudo();
	}

	public function remover($json) {
		$controller = new TurmaController();
		$controller->deletar($json);
	}

	public function atualizar($json) {
		$controller = new TurmaController();
		$controller->update($json);
	}
        
	public function turmaPorCurso($json) {
		$controller = new TurmaController();
		$controller->turmaPorCurso($json);
	}        
}