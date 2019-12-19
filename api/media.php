<?php

include_once ('./controller/MediaController.php');

class Media extends MediaController {

	public function index() {
		$this -> view('index');
	}

	public function nova($json) {
		$controller = new MediaController();
		$controller->novo($json);
	}

	public function listar($json) {
		$controller = new MediaController();
		$controller->listar($json);
	}

	public function listartudo() {
		$controller = new MediaController();
		$controller->listarTudo();
	}

	public function remover($json) {
		$controller = new MediaController();
		$controller->deletar($json);
	}

	public function atualizar($json) {
		$controller = new MediaController();
		$controller->update($json);
	}
        
        public function tipoAvaliacaoPorMedia($json) {
		$controller = new MediaController();
		$controller->tipoAvaliacaoPorMedia($json);
	}
        
        public function gerarMedias($json) {
		$controller = new MediaController();
		$controller->gerarMedias($json);
	}  
        
        public function buscaMediasPorMD($json) {
		$controller = new MediaController();
		$controller->buscaMediasPorMD($json);
	}        
        
        public function mediaCompleta($json) {
		$controller = new MediaController();
		$controller->mediaCompleta($json);
	}          
}