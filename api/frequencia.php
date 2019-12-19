<?php

include_once ('./controller/FrequenciaController.php');

class Frequencia extends FrequenciaController {

	public function index() {
		$this -> view('index');
	}

	public function nova($json) {
		$controller = new FrequenciaController();
		$controller->novo($json);
	}

	public function listar($json) {
		$controller = new FrequenciaController();
		$controller->listar($json);
	}

	public function listartudo() {
		$controller = new FrequenciaController();
		$controller->listarTudo();
	}

	public function remover($json) {
		$controller = new FrequenciaController();
		$controller->deletar($json);
	}

	public function atualizar($json) {
		$controller = new FrequenciaController();
		$controller->update($json);
	}
        
	public function frequenciaPorDP($json) {
		$controller = new FrequenciaController();
		$controller->frequenciaPorDP($json);
	}   
        
	public function frequenciaAlunoDP($json) {
		$controller = new FrequenciaController();
		$controller->frequenciaAlunoDP($json);
	}    
        
	public function frequenciaAlunoDisciplina($json) {
		$controller = new FrequenciaController();
		$controller->frequenciaAlunoDisciplina($json);
	} 
        
	public function frequenciaAlunoDisciplinaDetalhes($json) {
		$controller = new FrequenciaController();
		$controller->frequenciaAlunoDisciplinaDetalhes($json);
	}        
}