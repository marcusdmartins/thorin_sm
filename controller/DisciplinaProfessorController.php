<?php
include_once ('./dao/DisciplinaProfessorDAO.php');
include_once ('./model/DisciplinaProfessorModel.php');
include_once ('./model/PessoaModel.php');
include_once ('./model/DisciplinaModel.php');
include_once ('./model/TurmaModel.php');


class DisciplinaProfessorController {

	protected function view($nome) {
		include_once ($nome . '.html');
	}

	protected function novo($data) {
                $dao = new DisciplinaProfessorDAO();
		$objData = json_decode($data);
                
                $pessoa = new PessoaModel();
                $pessoa->setId($objData->pessoa);
                
                $turma = new TurmaModel();
                $turma->setId($objData->turma); 
                
                $disc = new DisciplinaModel();
                $disc->setId($objData->disc);              
                
                $disciplina_professor = new DisciplinaProfessorModel();
                $disciplina_professor->setDisciplina($disc);
                $disciplina_professor->setProfessor($pessoa);
                $disciplina_professor->setTurma($turma);
                
                $ret = $dao->verificaExistencia($disciplina_professor);
                if($ret == "true"){
                    $dao->update($disciplina_professor);
                }else{
                    $dao->save($disciplina_professor);
                }
	}
        
	protected function update($data) {
		$objData = json_decode($data);
                
                $pessoa = new PessoaModel();
                $pessoa->setId($objData->pessoa);
                
                $turma = new TurmaModel();
                $turma->setId($objData->turma); 
                
                $disc = new DisciplinaModel();
                $disc->setId($objData->disc);                 
                
                $disciplina_professor = new DisciplinaProfessorModel();
                $disciplina_professor->setId($objData->id);
                $disciplina_professor->setDisciplina($disc);
                $disciplina_professor->setProfessor($pessoa);
                $disciplina_professor->setTurma($turma);
                
                $dao = new DisciplinaProfessorDAO();
                $dao->update($disciplina_professor);
	}        

	protected function listar($data) {
		$objData = json_decode($data);
                $disciplina_professor = new DisciplinaProfessorModel();
                $disciplina_professor->setId($objData->id);
                
                $dao = new DisciplinaProfessorDAO();
                $dao->view($disciplina_professor);
	}

	protected function listarTudo() {
                $dao = new DisciplinaProfessorDAO();
                $dao->listAll();
	}

	protected function deletar($data) {
		$objData = json_decode($data);
                
                $disciplina_professor = new DisciplinaProfessorModel();
                $disciplina_professor->setId($objData->id);                
                
                $dao = new DisciplinaProfessorDAO();
                $dao->delete($disciplina_professor);
	}
        
	protected function buscaPorProfessor($data) {
		$objData = json_decode($data);
                $professor = new PessoaModel();
                $professor->setId($objData->id_professor);
                
                $dao = new DisciplinaProfessorDAO();
                $dao->buscaPorProfessor($professor);
	}
        
	protected function buscaPorTurma($data) {
		$objData = json_decode($data);
                $turma = new TurmaModel();
                $turma->setId($objData->id_turma);
                
                $dao = new DisciplinaProfessorDAO();
                $dao->buscaPorTurma($turma);
	}
}