<?php
include_once ('./dao/DisciplinaDAO.php');
include_once ('./model/DisciplinaModel.php');
include_once ('./model/CursoModel.php');


class DisciplinaController {

	protected function view($nome) {
		include_once ($nome . '.html');
	}

	protected function novo($data) {
		$objData = json_decode($data);
                
                $curso = new CursoModel();
                $curso->setId($objData->curso);
                
                $disciplina = new DisciplinaModel();
                $disciplina->setNome($objData->nome);
                $disciplina->setCargaHoraria($objData->carga_horaria);
                $disciplina->setCurso($curso);
                
                $dao = new DisciplinaDAO();
                $dao->save($disciplina);
	}
        
	protected function update($data) {
		$objData = json_decode($data);
                
                $curso = new CursoModel();
                $curso->setId($objData->curso);
                
                $disciplina = new DisciplinaModel();
                $disciplina->setId($objData->id);
                $disciplina->setNome($objData->nome);
                $disciplina->setCargaHoraria($objData->carga_horaria);
                $disciplina->setCurso($curso);
                
                $dao = new DisciplinaDAO();
                $dao->update($disciplina);
	}

	protected function listar($data) {
		$objData = json_decode($data);
                $disciplina = new DisciplinaModel();
                $disciplina->setId($objData->id);
                
                $dao = new DisciplinaDAO();
                $dao->view($disciplina);
	}

	protected function listarTudo() {
                $dao = new DisciplinaDAO();
                $dao->listAll();
	}

	protected function deletar($data) {
		$objData = json_decode($data);
                
                $disciplina = new DisciplinaModel();
                $disciplina->setId($objData->id);                
                
                $dao = new DisciplinaDAO();
                $dao->delete($disciplina);
	}
        
	protected function disciplinaPorCurso($data) {
                $objData = json_decode($data);
                
                $curso = new CursoModel();
                $curso->setId($objData->id_curso);
                
                $dao = new DisciplinaDAO();
                $dao->disciplinaPorCurso($curso);
	}      
        
	protected function buscaInstDisciplina($data) {
                $objData = json_decode($data);
                
                $curso = new CursoModel();
                $curso->setId($objData->id_curso);
                
                $busca = $objData->busca;
                
                $dao = new DisciplinaDAO();
                $dao->buscaInstDisciplina($busca, $curso);
	}          
}