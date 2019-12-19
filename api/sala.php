<?php

include_once ('./controller/SalaController.php');

class Sala extends SalaController {

	public function index() {
		$this -> view('index');
	}

	public function nova($json) {
		$controller = new SalaController();
		$controller->novo($json);
	}

	public function listar($json) {
		$controller = new SalaController();
		$controller->listar($json);
	}

	public function listartudo() {
		$controller = new SalaController();
		$controller->listarTudo();
	}

	public function remover($json) {
		$controller = new SalaController();
		$controller->deletar($json);
	}

	public function atualizar($json) {
		$controller = new SalaController();
		$controller->update($json);
	}
}