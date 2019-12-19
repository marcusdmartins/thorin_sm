<?php
include_once ('./dao/PlanejamentoDAO.php');
include_once ('./model/PlanejamentoModel.php');
include_once ('./model/PessoaModel.php');
include_once ('./model/DisciplinaProfessorModel.php');


class PlanejamentoController {

	protected function view($nome) {
		include_once ($nome . '.html');
	}

	protected function novo($data) {
		$objData = json_decode($data);
                
                $prof = new PessoaModel();
                $prof->setId($objData->professor_id);
                
                $dp = new DisciplinaProfessorModel();
                $dp->setId($objData->dp);                
                
                $planejamento = new PlanejamentoModel();
                $planejamento->setTitulo($objData->titulo);
                $planejamento->setTexto($objData->texto);
                $planejamento->setArquivo($objData->arquivo);
                $planejamento->setDisciplinaProfessor($dp);
                $planejamento->setProfessor($prof);
                
                $dao = new PlanejamentoDAO();
                $dao->save($planejamento);
	}
        
	protected function update($data) {
		$objData = json_decode($data);
                
                $prof = new PessoaModel();
                $prof->setId($objData->professor_id);
                
                $dp = new DisciplinaProfessorModel();
                $dp->setId($objData->dp);                
                
                $planejamento = new PlanejamentoModel();
                $planejamento->setId($objData->id);
                //$planejamento->setData($objData->data);
                $planejamento->setTitulo($objData->titulo);
                $planejamento->setTexto($objData->texto);
                $planejamento->setArquivo($objData->arquivo);
                $planejamento->setDisciplinaProfessor($dp);
                $planejamento->setProfessor($prof);
                
                $dao = new PlanejamentoDAO();
                $dao->update($planejamento);
	}        

	protected function listar($data) {
		$objData = json_decode($data);
                $planejamento = new PlanejamentoModel();
                $planejamento->setId($objData->id);
                
                $dao = new PlanejamentoDAO();
                $dao->view($planejamento);
	}

	protected function listarTudo() {
                $dao = new PlanejamentoDAO();
                $dao->listAll();
	}

	protected function deletar($data) {
		$objData = json_decode($data);
                
                $planejamento = new PlanejamentoModel();
                $planejamento->setId($objData->id);                
                
                $dao = new PlanejamentoDAO();
                $dao->delete($planejamento);
	}
        
	protected function planejamentoPorDP($data) {
		$objData = json_decode($data);
                $dp = new DisciplinaProfessorModel();
                $dp->setId($objData->dp);  
                
                $dao = new PlanejamentoDAO();
                $dao->planejamentoPorDP($dp);
	}

	protected function uploadArquivo($data) {
		$objData = json_decode($data);
                
                $planejamento = new PlanejamentoModel();
                $planejamento->setId($objData->id);
                $planejamento->setArquivo($objData->arquivo);
                
                $dao = new PlanejamentoDAO();
                $dao->uploadArquivo($planejamento);
	}           
}