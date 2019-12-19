<?php

class TurmaModel {

    private $id;
    private $descricao;
    private $curso;
    private $turno;
    private $sala;
    
    function getId() {
        return $this->id;
    }

    function getDescricao() {
        return $this->descricao;
    }

    function getCurso() {
        return $this->curso;
    }

    function getTurno() {
        return $this->turno;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setDescricao($descricao) {
        $this->descricao = $descricao;
    }

    function setCurso(CursoModel $curso) {
        $this->curso = $curso;
    }

    function setTurno($turno) {
        $this->turno = $turno;
    }
    
    function getSala() {
        return $this->sala;
    }

    function setSala(SalaModel $sala) {
        $this->sala = $sala;
    }



}