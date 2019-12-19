<?php

class PlanejamentoModel {

    private $id;
    private $titulo;
    private $disciplinaProfessor;
    private $professor;
    private $data;
    private $texto;
    private $arquivo;
    
    function getId() {  
        return $this->id;
    }

    function getDisciplinaProfessor() {
        return $this->disciplinaProfessor;
    }

    function getProfessor() {
        return $this->professor;
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

    function setDisciplinaProfessor(DisciplinaProfessorModel $disciplinaProfessor) {
        $this->disciplinaProfessor = $disciplinaProfessor;
    }

    function setProfessor(PessoaModel $professor) {
        $this->professor = $professor;
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
    
    function getArquivo() {
        return $this->arquivo;
    }

    function setArquivo($arquivo) {
        $this->arquivo = $arquivo;
    }

}