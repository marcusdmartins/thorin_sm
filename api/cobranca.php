<?php

include_once ('./controller/CobrancaController.php');

class Cobranca extends CobrancaController {

	public function index() {
		$this -> view('index');
	}

	public function nova($json) {
		$controller = new CobrancaController();
		$controller->novo($json);
	}

	public function listar($json) {
		$controller = new CobrancaController();
		$controller->listar($json);
	}

	public function listartudo() {
		$controller = new CobrancaController();
		$controller->listarTudo();
	}

	public function remover($json) {
		$controller = new CobrancaController();
		$controller->deletar($json);
	}

	public function atualizar($json) {
		$controller = new CobrancaController();
		$controller->update($json);
	}
}