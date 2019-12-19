<?php

class MediaModel {

    private $id;
    private $nome;
    private $corte;
    private $tipo;
    
    function getId() {
        return $this->id;
    }

    function getNome() {
        return $this->nome;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setNome($nome) {
        $this->nome = $nome;
    }
    
    function getCorte() {
        return $this->corte;
    }

    function getTipo() {
        return $this->tipo;
    }

    function setCorte($corte) {
        $this->corte = $corte;
    }

    function setTipo($tipo) {
        $this->tipo = $tipo;
    }

}