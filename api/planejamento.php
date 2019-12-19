<?php

include_once ('./controller/PlanejamentoController.php');

class Planejamento extends PlanejamentoController {

	public function index() {
		$this -> view('index');
	}

	public function novo($json) {
		$controller = new PlanejamentoController();
		$controller->novo($json);
	}

	public function listar($json) {
		$controller = new PlanejamentoController();
		$controller->listar($json);
	}

	public function listartudo() {
		$controller = new PlanejamentoController();
		$controller->listarTudo();
	}

	public function remover($json) {
		$controller = new PlanejamentoController();
		$controller->deletar($json);
	}

	public function atualizar($json) {
		$controller = new PlanejamentoController();
		$controller->update($json);
	}
        
	public function planejamentoPorDP($json) {
		$controller = new PlanejamentoController();
		$controller->planejamentoPorDP($json);
	}

	public function uploadArquivo($json) {
		$controller = new PlanejamentoController();
		$controller->uploadArquivo($json);
	}        
}