<?php
include_once ('./dao/TurmaDAO.php');
include_once ('./model/TurmaModel.php');
include_once ('./model/CursoModel.php');
include_once ('./model/SalaModel.php');

class TurmaController {

	protected function view($nome) {
		include_once ($nome . '.html');
	}

	protected function novo($data) {
		$objData = json_decode($data);
                $curso = new CursoModel();
                $curso->setId($objData->id_curso);
                
                $sala = new SalaModel();
                $sala->setId($objData->id_sala);                
                
                $turma = new TurmaModel();
                $turma->setCurso($curso);
                $turma->setSala($sala);
                $turma->setDescricao($objData->descricao);
                $turma->setTurno($objData->turno);
                
                $dao = new TurmaDAO();
                $dao->save($turma);
	}
        
	protected function update($data) {
		$objData = json_decode($data);
                $curso = new CursoModel();
                $curso->setId($objData->id_curso);
                
                $sala = new SalaModel();
                $sala->setId($objData->id_sala);                     
                
                $turma = new TurmaModel();
                $turma->setId($objData->id);
                $turma->setCurso($curso);
                $turma->setSala($sala);
                $turma->setDescricao($objData->descricao);
                $turma->setTurno($objData->turno);
                
                $dao = new TurmaDAO();
                $dao->update($turma);
	}        

	protected function listar($data) {
		$objData = json_decode($data);
                $turma = new TurmaModel();
                $turma->setId($objData->id);
                
                $dao = new TurmaDAO();
                $dao->view($turma);
	}

	protected function listarTudo() {
                $dao = new TurmaDAO();
                $dao->listAll();
	}

	protected function deletar($data) {
		$objData = json_decode($data);
                
                $turma = new TurmaModel();
                $turma->setId($objData->id);                
                
                $dao = new TurmaDAO();
                $dao->delete($turma);
	}
        
	protected function turmaPorCurso($data) {
		$objData = json_decode($data);
                $curso = new CursoModel();
                $curso->setId($objData->id_curso);
                
                $dao = new TurmaDAO();
                $dao->turmaPorCurso($curso);
	}
}