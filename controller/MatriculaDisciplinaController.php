<?php
include_once ('./dao/MatriculaDisciplinaDAO.php');
include_once ('./model/MatriculaDisciplinaModel.php');
include_once ('./model/DisciplinaModel.php');
include_once ('./model/MatriculaModel.php');

class MatriculaDisciplinaController {

	protected function view($nome) {
		include_once ($nome . '.html');
	}

	protected function novo($data) {
		$objData = json_decode($data);
                
                $disc = new DisciplinaModel();
                $disc->setId($objData->disciplina);
                
                $matricula = new MatriculaModel();
                $matricula->setId($objData->matricula); 
              
                
                $matricula_disciplina = new MatriculaDisciplinaModel();
                $matricula_disciplina->setDisciplina($disc);
                $matricula_disciplina->setTurma($matricula);
                $matricula_disciplina->setSituacao($objData->situacao);
                
                $dao = new MatriculaDisciplinaDAO();
                $dao->save($matricula_disciplina);
	}
        
	protected function update($data) {
		$objData = json_decode($data);
                
                $disc = new DisciplinaModel();
                $disc->setId($objData->disciplina);
                
                $matricula = new MatriculaModel();
                $matricula->setId($objData->matricula); 
              
                
                $matricula_disciplina = new MatriculaDisciplinaModel();
                $matricula_disciplina->setDisciplina($disc);
                $matricula_disciplina->setTurma($matricula);
                $matricula_disciplina->setSituacao($objData->situacao);
                $matricula_disciplina->setId($objData->id);
                
                $dao = new MatriculaDisciplinaDAO();
                $dao->update($matricula_disciplina);
	}        

	protected function listar($data) {
		$objData = json_decode($data);
                $matricula_disciplina = new MatriculaDisciplinaModel();
                $matricula_disciplina->setId($objData->id);
                
                $dao = new MatriculaDisciplinaDAO();
                $dao->view($matricula_disciplina);
	}

	protected function listarTudo() {
                $dao = new MatriculaDisciplinaDAO();
                $dao->listAll();
	}

	protected function deletar($data) {
		$objData = json_decode($data);
                
                $matricula_disciplina = new MatriculaDisciplinaModel();
                $matricula_disciplina->setId($objData->id);                
                
                $dao = new MatriculaDisciplinaDAO();
                $dao->delete($matricula_disciplina);
	}
        
	protected function buscaPorMatricula($data) {
		$objData = json_decode($data);
                $matricula = new MatriculaModel();
                $matricula->setId($objData->id_matricula);
                
                $dao = new MatriculaDisciplinaDAO();
                $dao->buscaPorMatricula($matricula);
	}   
        
	protected function buscaPorMatriculaDisciplina($data) {
		$objData = json_decode($data);
                $matricula = new MatriculaModel();
                $matricula->setId($objData->id_matricula);
                
                $disciplina = new DisciplinaModel();
                $disciplina->setId($objData->id_disciplina);
                
                $dao = new MatriculaDisciplinaDAO();
                $dao->buscaPorMatriculaDisciplina($matricula, $disciplina);
	}         
}