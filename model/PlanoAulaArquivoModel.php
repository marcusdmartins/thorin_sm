<?php

class PlanoAulaArquivoModel {

    private $id;
    private $planoAula;
    private $arquivo;
    private $data;
    private $descricao;
    
    function getId() {
        return $this->id;
    }

    function getPlanoAula() {
        return $this->planoAula;
    }

    function getArquivo() {
        return $this->arquivo;
    }

    function getData() {
        return $this->data;
    }

    function getDescricao() {
        return $this->descricao;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setPlanoAula(PlanoAulaModel $planoAula) {
        $this->planoAula = $planoAula;
    }

    function setArquivo($arquivo) {
        $this->arquivo = $arquivo;
    }

    function setData($data) {
        $this->data = $data;
    }

    function setDescricao($descricao) {
        $this->descricao = $descricao;
    }

}