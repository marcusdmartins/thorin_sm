<?php
include_once ('./dao/RecpDAO.php');
include_once ('./model/PessoaModel.php');
include_once ('./model/MediaMDModel.php');
include_once ('./model/RecpModel.php');

class RecpController {

	protected function view($nome) {
		include_once ($nome . '.html');
	}

	protected function novo($data) {
		$objData = json_decode($data);
                
                $pessoa_log = new PessoaModel();
                $pessoa_log->setId($objData->pessoa);
                
                $media = new MediaMDModel();
                $media->setId($objData->id_media);
                        
                $recp = new RecpModel();
                $recp->setMedia($media);
                $recp->setPessoaLog($pessoa_log);
                $recp->setDataAvaliacao($objData->data_avaliacao);
                $recp->setTipo($objData->tipo);
                $recp->setValor($objData->valor);
                
                $dao = new RecpDAO();
                $dao->save($recp);
	}
        
	protected function listar($data) {
		$objData = json_decode($data);
                $nota = new RecpModel();
                $nota->setId($objData->id);
                
                $dao = new RecpDAO();
                $dao->view($nota);
	}

	protected function listarTudo() {
                $dao = new RecpDAO();
                $dao->listAll();
	}

	protected function deletar($data) {
		$objData = json_decode($data);
                
                $nota = new RecpModel();
                $nota->setId($objData->id);                
                
                $dao = new RecpDAO();
                $dao->delete($nota);
	}
        
	
}