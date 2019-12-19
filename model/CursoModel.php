<?php

class CursoModel {

    private $id;
    private $nome;
    private $cargaHoraria;
    private $nivel;
    private $valorMensal;
    
    function getId() {
        return $this->id;
    }

    function getNome() {
        return $this->nome;
    }

    function getCargaHoraria() {
        return $this->cargaHoraria;
    }

    function getNivel() {
        return $this->nivel;
    }

    function getValorMensal() {
        return $this->valorMensal;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setNome($nome) {
        $this->nome = $nome;
    }

    function setCargaHoraria($cargaHoraria) {
        $this->cargaHoraria = $cargaHoraria;
    }

    function setNivel(NivelModel $nivel) {
        $this->nivel = $nivel;
    }

    function setValorMensal($valorMensal) {
        $this->valorMensal = $valorMensal;
    }

}