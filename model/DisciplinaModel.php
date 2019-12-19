<?php

class DisciplinaModel {

    private $id;
    private $nome;
    private $curso;
    private $cargaHoraria;
    
    function getId() {
        return $this->id;
    }

    function getNome() {
        return $this->nome;
    }

    function getCurso() {
        return $this->curso;
    }

    function getCargaHoraria() {
        return $this->cargaHoraria;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setNome($nome) {
        $this->nome = $nome;
    }

    function setCurso($curso) {
        $this->curso = $curso;
    }

    function setCargaHoraria($cargaHoraria) {
        $this->cargaHoraria = $cargaHoraria;
    }

}