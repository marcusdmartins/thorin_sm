<?php

include_once ('./controller/CursoController.php');

class Curso extends CursoController {

	public function index() {
		$this -> view('index');
	}

	public function novo($json) {
		$controller = new CursoController();
		$controller->novo($json);
	}

	public function listar($json) {
		$controller = new CursoController();
		$controller->listar($json);
	}

	public function listartudo() {
		$controller = new CursoController();
		$controller->listarTudo();
	}

	public function remover($json) {
		$controller = new CursoController();
		$controller->deletar($json);
	}

	public function atualizar($json) {
		$controller = new CursoController();
		$controller->update($json);
	}
}