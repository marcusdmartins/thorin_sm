<?php
include_once ('./dao/PlanoAulaDAO.php');
include_once ('./model/PlanoAulaModel.php');
include_once ('./model/PessoaModel.php');
include_once ('./model/DisciplinaProfessorModel.php');


class PlanoAulaController {

	protected function view($nome) {
		include_once ($nome . '.html');
	}

	protected function novo($data) {
		$objData = json_decode($data);
                
                $dp = new DisciplinaProfessorModel();
                $dp->setId($objData->dp); 
                
                $professor = new PessoaModel();
                $professor->setId($objData->professor);  
                
                $planoAula = new PlanoAulaModel();
                $planoAula->setTitulo($objData->titulo);
                $planoAula->setData($objData->data);
                $planoAula->setTexto($objData->texto);
                $planoAula->setDisciplinaProfessor($dp);
                $planoAula->setProfessor($professor);
                
                $dao = new PlanoAulaDAO();
                $dao->save($planoAula);
	}
        
	protected function update($data) {
		$objData = json_decode($data);
                
                $dp = new DisciplinaProfessorModel();
                $dp->setId($objData->dp);   
                
                $professor = new PessoaModel();
                $professor->setId($objData->professor);                  
                
                $planoAula = new PlanoAulaModel();
                $planoAula->setId($objData->id);
                $planoAula->setTitulo($objData->titulo);
                $planoAula->setData($objData->data);
                $planoAula->setTexto($objData->texto);
                $planoAula->setDisciplinaProfessor($dp);
                $planoAula->setProfessor($professor);
                
                $dao = new PlanoAulaDAO();
                $dao->update($planoAula);
	}        

	protected function listar($data) {
		$objData = json_decode($data);
                $planoAula = new PlanoAulaModel();
                $planoAula->setId($objData->id);
                
                $dao = new PlanoAulaDAO();
                $dao->view($planoAula);
	}

	protected function listarTudo() {
                $dao = new PlanoAulaDAO();
                $dao->listAll();
	}

	protected function deletar($data) {
		$objData = json_decode($data);
                
                $planoAula = new PlanoAulaModel();
                $planoAula->setId($objData->id);                
                
                $dao = new PlanoAulaDAO();
                $dao->delete($planoAula);
	}
        
	protected function planosPorDP($data) {
		$objData = json_decode($data);
                $dp = new DisciplinaProfessorModel();
                $dp->setId($objData->dp); 
                
                $dao = new PlanoAulaDAO();
                $dao->planosPorDP($dp);
	}        
}