<?php

class TransacaoModel {

    private $id;
    private $codTransacao;
    private $cobranca;
    private $dataInicio;
    private $dataPagamento;
    private $valorCobrado;
    private $valorPago;
    private $status;
    private $urlBoleto;
    private $urlBoletoPdf;
    
    function getId() {
        return $this->id;
    }

    function getCodTransacao() {
        return $this->codTransacao;
    }

    function getCobranca() {
        return $this->cobranca;
    }

    function getDataInicio() {
        return $this->dataInicio;
    }

    function getDataPagamento() {
        return $this->dataPagamento;
    }

    function getValorCobrado() {
        return $this->valorCobrado;
    }

    function getValorPago() {
        return $this->valorPago;
    }

    function getStatus() {
        return $this->status;
    }

    function getUrlBoleto() {
        return $this->urlBoleto;
    }

    function getUrlBoletoPdf() {
        return $this->urlBoletoPdf;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setCodTransacao($codTransacao) {
        $this->codTransacao = $codTransacao;
    }

    function setCobranca(CobrancaModel $cobranca) {
        $this->cobranca = $cobranca;
    }

    function setDataInicio($dataInicio) {
        $this->dataInicio = $dataInicio;
    }

    function setDataPagamento($dataPagamento) {
        $this->dataPagamento = $dataPagamento;
    }

    function setValorCobrado($valorCobrado) {
        $this->valorCobrado = $valorCobrado;
    }

    function setValorPago($valorPago) {
        $this->valorPago = $valorPago;
    }

    function setStatus($status) {
        $this->status = $status;
    }

    function setUrlBoleto($urlBoleto) {
        $this->urlBoleto = $urlBoleto;
    }

    function setUrlBoletoPdf($urlBoletoPdf) {
        $this->urlBoletoPdf = $urlBoletoPdf;
    }
}