<?php

class NotaSemanalModel {

    private $id;
    private $tipoAvaliacao;
    private $dataAvaliacao;
    private $dataLancamento;
    private $valor;
    private $pessoaLog;

    function getId() {
        return $this->id;
    }

    function getMatriculaDisplina() {
        return $this->matriculaDisplina;
    }

    function getDataLancamento() {
        return $this->dataLancamento;
    }

    function getValor() {
        return $this->valor;
    }

    function getTipoAvaliacao() {
        return $this->tipoAvaliacao;
    }

    function getPessoaLog() {
        return $this->pessoaLog;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setMatriculaDisplina(MatriculaDisciplinaModel $matriculaDisplina) {
        $this->matriculaDisplina = $matriculaDisplina;
    }

    function setDataLancamento($dataLancamento) {
        $this->dataLancamento = $dataLancamento;
    }

    function setValor($valor) {
        $this->valor = $valor;
    }

    function setTipoAvaliacao(TipoAvaliacaoModel $tipoAvaliacao) {
        $this->tipoAvaliacao = $tipoAvaliacao;
    }

    function setPessoaLog(PessoaModel $pessoaLog) {
        $this->pessoaLog = $pessoaLog;
    }
    
    function getDataAvaliacao() {
        return $this->dataAvaliacao;
    }

    function setDataAvaliacao($dataAvaliacao) {
        $this->dataAvaliacao = $dataAvaliacao;
    }

}