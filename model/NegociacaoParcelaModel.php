<?php

class NegociacaoParcelaModel {

    private $id;
    private $negociacao;
    private $cobranca;
    
    function getId() {
        return $this->id;
    }

    function getNegociacao() {
        return $this->negociacao;
    }

    function getCobranca() {
        return $this->cobranca;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setNegociacao(NegociacaoModel $negociacao) {
        $this->negociacao = $negociacao;
    }

    function setCobranca(CobrancaModel $cobranca) {
        $this->cobranca = $cobranca;
    }

}