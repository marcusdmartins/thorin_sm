<?php

include_once ('./controller/PlanoAulaController.php');

class PlanoAula extends PlanoAulaController {

	public function index() {
		$this -> view('index');
	}

	public function novo($json) {
		$controller = new PlanoAulaController();
		$controller->novo($json);
	}

	public function listar($json) {
		$controller = new PlanoAulaController();
		$controller->listar($json);
	}

	public function listartudo() {
		$controller = new PlanoAulaController();
		$controller->listarTudo();
	}

	public function remover($json) {
		$controller = new PlanoAulaController();
		$controller->deletar($json);
	}

	public function atualizar($json) {
		$controller = new PlanoAulaController();
		$controller->update($json);
	}
        
	public function planosPorDP($json) {
		$controller = new PlanoAulaController();
		$controller->planosPorDP($json);
	}        
}