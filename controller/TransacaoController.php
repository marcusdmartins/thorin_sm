<?php
include_once ('./dao/TransacaoDAO.php');
include_once ('./model/TransacaoModel.php');
include_once ('./model/CobrancaModel.php');

class TransacaoController {

	protected function view($nome) {
		include_once ($nome . '.html');
	}

	protected function novo($data) {
		$objData = json_decode($data);
                $cobranca = new CobrancaModel();
                $cobranca->setId($objData->id_cobranca);
                
                $transacao = new TransacaoModel();
                $transacao->setCobranca($cobranca);
                $transacao->setCodTransacao($objData->codTransacao);
                $transacao->setDataInicio($objData->dataInicio);
                $transacao->setDataPagamento($objData->dataPagamento);
                $transacao->setValorCobrado($objData->valorCobrado);
                $transacao->setValorPago($objData->valorPago);
                $transacao->setStatus($objData->status);
                $transacao->setUrlBoleto($objData->urlBoleto);
                $transacao->setUrlBoletoPdf($objData->urlBoletoPdf);
                
                $dao = new TransacaoDAO();
                $dao->save($transacao);
	}
        
	protected function update($data) {
		$objData = json_decode($data);
                $cobranca = new CobrancaModel();
                $cobranca->setId($objData->id_cobranca);
                
                $transacao = new TransacaoModel();
                $transacao->setId($objData->id);
                $transacao->setCobranca($cobranca);
                $transacao->setCodTransacao($objData->codTransacao);
                $transacao->setDataInicio($objData->dataInicio);
                $transacao->setDataPagamento($objData->dataPagamento);
                $transacao->setValorCobrado($objData->valorCobrado);
                $transacao->setValorPago($objData->valorPago);
                $transacao->setStatus($objData->status);
                $transacao->setUrlBoleto($objData->urlBoleto);
                $transacao->setUrlBoletoPdf($objData->urlBoletoPdf);
                
                $dao = new TransacaoDAO();
                $dao->update($transacao);
	}        

	protected function listar($data) {
		$objData = json_decode($data);
                $transacao = new TransacaoModel();
                $transacao->setId($objData->id);
                
                $dao = new TransacaoDAO();
                $dao->view($transacao);
	}

	protected function listarTudo() {
                $dao = new TransacaoDAO();
                $dao->listAll();
	}

	protected function deletar($data) {
		$objData = json_decode($data);
                
                $transacao = new TransacaoModel();
                $transacao->setId($objData->id);                
                
                $dao = new TransacaoDAO();
                $dao->delete($transacao);
	}
}