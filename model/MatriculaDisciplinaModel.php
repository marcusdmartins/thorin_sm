<?php

class MatriculaDisciplinaModel {

    private $id;
    private $matricula;
    private $disciplina;
    private $situacao;

    function getId() {
        return $this->id;
    }

    function getMatricula() {
        return $this->matricula;
    }

    function getDisciplina() {
        return $this->disciplina;
    }

    function getSituacao() {
        return $this->situacao;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setMatricula($matricula) {
        $this->matricula = $matricula;
    }

    function setDisciplina($disciplina) {
        $this->disciplina = $disciplina;
    }

    function setSituacao($situacao) {
        $this->situacao = $situacao;
    }

}