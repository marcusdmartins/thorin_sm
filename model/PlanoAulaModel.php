<?php

class PlanoAulaModel {

    private $id;
    private $disciplinaProfessor;
    private $titulo;
    private $data;
    private $texto;
    private $professor;
    
    function getId() {  
        return $this->id;
    }

    function getDisciplinaProfessor() {
        return $this->disciplinaProfessor;
    }

    function getData() {
        return $this->data;
    }

    function getTexto() {
        return $this->texto;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setDisciplinaProfessor($disciplinaProfessor) {
        $this->disciplinaProfessor = $disciplinaProfessor;
    }

    function setData($data) {
        $this->data = $data;
    }

    function setTexto($texto) {
        $this->texto = $texto;
    }
    
    function getTitulo() {
        return $this->titulo;
    }

    function setTitulo($titulo) {
        $this->titulo = $titulo;
    }
    
    function getProfessor() {
        return $this->professor;
    }

    function setProfessor(PessoaModel $professor) {
        $this->professor = $professor;
    }

}