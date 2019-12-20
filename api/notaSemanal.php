<?php

include_once ('./controller/NotaSemanalController.php');

class NotaSemanal extends NotaSemanalController {

	public function index() {
		$this -> view('index');
	}

	public function nova($json) {
		$controller = new NotaSemanalController();
		$controller->novo($json);
	}

	public function listar($json) {
		$controller = new NotaSemanalController();
		$controller->listar($json);
	}

	public function listartudo() {
		$controller = new NotaSemanalController();
		$controller->listarTudo();
	}

	public function remover($json) {
		$controller = new NotaSemanalController();
		$controller->deletar($json);
	}

	public function atualizar($json) {
		$controller = new NotaSemanalController();
		$controller->update($json);
	}
        
	public function notaPorMd($json) {
		$controller = new NotaSemanalController();
		$controller->notaPorMd($json);
	}        
}