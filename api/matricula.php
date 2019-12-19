<?php

include_once ('./controller/MatriculaController.php');

class Matricula extends MatriculaController {

	public function index() {
		$this -> view('index');
	}

	public function nova($json) {
		$controller = new MatriculaController();
		$controller->novo($json);
	}

	public function listar($json) {
		$controller = new MatriculaController();
		$controller->listar($json);
	}
        
	public function visaoGeral($json) {
		$controller = new MatriculaController();
		$controller->visaoGeral($json);
	}        

	public function listartudo() {
		$controller = new MatriculaController();
		$controller->listarTudo();
	}

	public function remover($json) {
		$controller = new MatriculaController();
		$controller->deletar($json);
	}

	public function atualizar($json) {
		$controller = new MatriculaController();
		$controller->update($json);
	}
        
	public function matricular($json) {
		$controller = new MatriculaController();
		$controller->matricular($json);
	}  
        
	public function matriculasPorAluno($json) {
		$controller = new MatriculaController();
		$controller->matriculasPorAluno($json);
	} 
        
	public function matriculasRegularesPorTurma($json) {
		$controller = new MatriculaController();
		$controller->matriculasRegularesPorTurma($json);
	} 

	public function matriculasRegularesPorTurmaInst($json) {
		$controller = new MatriculaController();
		$controller->matriculasRegularesPorTurmaInst($json);
	}        
}