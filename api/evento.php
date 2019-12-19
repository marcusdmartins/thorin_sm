<?php

include_once ('./controller/EventoController.php');

class Evento extends EventoController {

	public function index() {
		$this -> view('index');
	}

	public function novo($json) {
		$controller = new EventoController();
		$controller->novo($json);
	}

	public function listar($json) {
		$controller = new EventoController();
		$controller->listar($json);
	}

	public function listartudo() {
		$controller = new EventoController();
		$controller->listarTudo();
	}

	public function remover($json) {
		$controller = new EventoController();
		$controller->deletar($json);
	}

	public function atualizar($json) {
		$controller = new EventoController();
		$controller->update($json);
	}
}