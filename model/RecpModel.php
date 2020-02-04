<?php

class RecpModel {

    private $id;
    private $media;
    private $tipo;
    private $valor;
    private $dataAvaliacao;
    private $dataLancamento;
    private $pessoaLog;
    
    function getId() {
        return $this->id;
    }

    function getMedia() {
        return $this->media;
    }

    function getTipo() {
        return $this->tipo;
    }

    function getValor() {
        return $this->valor;
    }

    function getDataAvaliacao() {
        return $this->dataAvaliacao;
    }

    function getDataLancamento() {
        return $this->dataLancamento;
    }

    function getPessoaLog() {
        return $this->pessoaLog;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setMedia(MediaMDModel $media) {
        $this->media = $media;
    }

    function setTipo($tipo) {
        $this->tipo = $tipo;
    }

    function setValor($valor) {
        $this->valor = $valor;
    }

    function setDataAvaliacao($dataAvaliacao) {
        $this->dataAvaliacao = $dataAvaliacao;
    }

    function setDataLancamento($dataLancamento) {
        $this->dataLancamento = $dataLancamento;
    }

    function setPessoaLog($pessoaLog) {
        $this->pessoaLog = $pessoaLog;
    }

}