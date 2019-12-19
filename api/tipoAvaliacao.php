<?php

include_once ('./controller/TipoAvaliacaoController.php');

class TipoAvaliacao extends TipoAvaliacaoController {

	public function index() {
		$this -> view('index');
	}

	public function novo($json) {
		$controller = new TipoAvaliacaoController();
		$controller->novo($json);
	}

	public function listar($json) {
		$controller = new TipoAvaliacaoController();
		$controller->listar($json);
	}

	public function listartudo() {
		$controller = new TipoAvaliacaoController();
		$controller->listarTudo();
	}
        
	public function listarTiposParaLancamento($json) {
		$controller = new TipoAvaliacaoController();
		$controller->listarTiposParaLancamento($json);
	}        

	public function remover($json) {
		$controller = new TipoAvaliacaoController();
		$controller->deletar($json);
	}

	public function atualizar($json) {
		$controller = new TipoAvaliacaoController();
		$controller->update($json);
	}
}