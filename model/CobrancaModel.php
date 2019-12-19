<?php

class CobrancaModel {

    private $id;
    private $descricao;
    private $pessoa;
    private $matricula;
    private $valor;
    private $dataVencimento;
    private $dataPagamento;
    private $status;
    
    function getId() {
        return $this->id;
    }

    function getDescricao() {
        return $this->descricao;
    }

    function getPessoa() {
        return $this->pessoa;
    }

    function getMatricula() {
        return $this->matricula;
    }

    function getValor() {
        return $this->valor;
    }

    function getDataVencimento() {
        return $this->dataVencimento;
    }

    function getDataPagamento() {
        return $this->dataPagamento;
    }

    function getStatus() {
        return $this->status;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setDescricao($descricao) {
        $this->descricao = $descricao;
    }

    function setPessoa(PessoaModel $pessoa) {
        $this->pessoa = $pessoa;
    }

    function setMatricula(MatriculaModel $matricula) {
        $this->matricula = $matricula;
    }

    function setValor($valor) {
        $this->valor = $valor;
    }

    function setDataVencimento($dataVencimento) {
        $this->dataVencimento = $dataVencimento;
    }

    function setDataPagamento($dataPagamento) {
        $this->dataPagamento = $dataPagamento;
    }

    function setStatus($status) {
        $this->status = $status;
    }

}