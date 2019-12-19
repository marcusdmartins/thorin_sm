<?php

include_once ('./controller/NotaController.php');

class Nota extends NotaController {

	public function index() {
		$this -> view('index');
	}

	public function nova($json) {
		$controller = new NotaController();
		$controller->novo($json);
	}

	public function listar($json) {
		$controller = new NotaController();
		$controller->listar($json);
	}

	public function listartudo() {
		$controller = new NotaController();
		$controller->listarTudo();
	}

	public function remover($json) {
		$controller = new NotaController();
		$controller->deletar($json);
	}

	public function atualizar($json) {
		$controller = new NotaController();
		$controller->update($json);
	}
        
	public function notaPorMd($json) {
		$controller = new NotaController();
		$controller->notaPorMd($json);
	}        
}