<?php
include_once ('./dao/TipoAvaliacaoDAO.php');
include_once ('./model/TipoAvaliacaoModel.php');
include_once ('./model/MatriculaDisciplinaModel.php');


class TipoAvaliacaoController {

	protected function view($nome) {
		include_once ($nome . '.html');
	}

	protected function novo($data) {
		$objData = json_decode($data);
                
                $tipoAvaliacao = new TipoAvaliacaoModel();
                $tipoAvaliacao->setNome($objData->descricao);
                
                $dao = new TipoAvaliacaoDAO();
                $dao->save($tipoAvaliacao);
	}
        
	protected function update($data) {
		$objData = json_decode($data);
                
                $tipoAvaliacao = new TipoAvaliacaoModel();
                $tipoAvaliacao->setId($objData->id);
                $tipoAvaliacao->setNome($objData->descricao);
                
                $dao = new TipoAvaliacaoDAO();
                $dao->update($tipoAvaliacao);
	}        

	protected function listar($data) {
		$objData = json_decode($data);
                $tipoAvaliacao = new TipoAvaliacaoModel();
                $tipoAvaliacao->setId($objData->id);
                
                $dao = new TipoAvaliacaoDAO();
                $dao->view($tipoAvaliacao);
	}

	protected function listarTudo() {
                $dao = new TipoAvaliacaoDAO();
                $dao->listAll();
	}
        
	protected function listarTiposParaLancamento($data) {
            
		$objData = json_decode($data);
                $md = new MatriculaDisciplinaModel();
                $md->setId($objData->md);
                
                $dao = new TipoAvaliacaoDAO();
                $dao->listaTiposParaLancamento($md);
	}        

	protected function deletar($data) {
		$objData = json_decode($data);
                
                $tipoAvaliacao = new TipoAvaliacaoModel();
                $tipoAvaliacao->setId($objData->id);                
                
                $dao = new TipoAvaliacaoDAO();
                $dao->delete($tipoAvaliacao);
	}
}