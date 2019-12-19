<?php

include_once ('./controller/NivelController.php');

class Nivel extends NivelController {

	public function index() {
		$this -> view('index');
	}

	public function novo($json) {
		$controller = new NivelController();
		$controller->novo($json);
	}

	public function listar($json) {
		$controller = new NivelController();
		$controller->listar($json);
	}

	public function listartudo() {
		$controller = new NivelController();
		$controller->listarTudo();
	}

	public function remover($json) {
		$controller = new NivelController();
		$controller->deletar($json);
	}

	public function atualizar($json) {
		$controller = new NivelController();
		$controller->update($json);
	}
}