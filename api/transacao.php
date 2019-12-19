<?php

include_once ('./controller/TransacaoController.php');

class Transacao extends TransacaoController {

	public function index() {
		$this -> view('index');
	}

	public function nova($json) {
		$controller = new TransacaoController();
		$controller->novo($json);
	}

	public function listar($json) {
		$controller = new TransacaoController();
		$controller->listar($json);
	}

	public function listartudo() {
		$controller = new TransacaoController();
		$controller->listarTudo();
	}

	public function remover($json) {
		$controller = new TransacaoController();
		$controller->deletar($json);
	}

	public function atualizar($json) {
		$controller = new TransacaoController();
		$controller->update($json);
	}
}