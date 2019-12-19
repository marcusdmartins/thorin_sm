<?php

class DisciplinaProfessorModel {

    private $id;
    private $disciplina;
    private $professor;
    private $turma;
    
    function getId() {
        return $this->id;
    }

    function getDisciplina() {
        return $this->disciplina;
    }

    function getProfessor() {
        return $this->professor;
    }

    function getTurma() {
        return $this->turma;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setDisciplina(DisciplinaModel $disciplina) {
        $this->disciplina = $disciplina;
    }

    function setProfessor(PessoaModel $professor) {
        $this->professor = $professor;
    }

    function setTurma(TurmaModel $turma) {
        $this->turma = $turma;
    }

}