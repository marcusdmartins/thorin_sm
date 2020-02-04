<?php

include_once ('./controller/RecpController.php');

class Recp extends RecpController {

	public function index() {
		$this -> view('index');
	}

	public function nova($json) {
		$controller = new RecpController();
		$controller->novo($json);
	}

	public function listar($json) {
		$controller = new RecpController();
		$controller->listar($json);
	}

	public function listartudo() {
		$controller = new RecpController();
		$controller->listarTudo();
	}

	public function remover($json) {
		$controller = new RecpController();
		$controller->deletar($json);
	}

	public function atualizar($json) {
		$controller = new RecpController();
		$controller->update($json);
	}
              
}