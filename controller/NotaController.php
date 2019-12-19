<?php
include_once ('./dao/NotaDAO.php');
include_once ('./model/NotaModel.php');
include_once ('./model/PessoaModel.php');
include_once ('./model/MatriculaDisciplinaModel.php');
include_once ('./model/TipoAvaliacaoModel.php');


class NotaController {

	protected function view($nome) {
		include_once ($nome . '.html');
	}

	protected function novo($data) {
		$objData = json_decode($data);
                
                $pessoa_log = new PessoaModel();
                $pessoa_log->setId($objData->pessoa);
                
                $tipoAvaliacao = new TipoAvaliacaoModel();
                $tipoAvaliacao->setId($objData->tipoAvaliacao);
                
                $md = new MatriculaDisciplinaModel();
                $md->setId($objData->md);
                        
                $nota = new NotaModel();
                $nota->setDataAvaliacao($objData->dataAvaliacao);
                $nota->setValor($objData->valor);
                $nota->setTipoAvaliacao($tipoAvaliacao);
                $nota->setMatriculaDisplina($md);
                $nota->setPessoaLog($pessoa_log);
                
                $dao = new NotaDAO();
                $dao->save($nota);
	}
        
	protected function update($data) {
		$objData = json_decode($data);
                
                $pessoa_log = new PessoaModel();
                $pessoa_log->setId($objData->pessoa);
                
                $tipoAvaliacao = new TipoAvaliacaoModel();
                $tipoAvaliacao->setId($objData->tipoAvaliacao);
                
                $md = new MatriculaDisciplinaModel();
                $md->setId($objData->md);
                        
                $nota = new NotaModel();
                $nota->setId($objData->id);
                $nota->setDataAvaliacao($objData->dataAvaliacao);
                $nota->setValor($objData->valor);
                $nota->setTipoAvaliacao($tipoAvaliacao);
                $nota->setMatriculaDisplina($md);
                $nota->setPessoaLog($pessoa_log);
                
                $dao = new NotaDAO();
                $dao->update($nota);
	}        

	protected function listar($data) {
		$objData = json_decode($data);
                $nota = new NotaModel();
                $nota->setId($objData->id);
                
                $dao = new NotaDAO();
                $dao->view($nota);
	}

	protected function listarTudo() {
                $dao = new NotaDAO();
                $dao->listAll();
	}

	protected function deletar($data) {
		$objData = json_decode($data);
                
                $nota = new NotaModel();
                $nota->setId($objData->id);                
                
                $dao = new NotaDAO();
                $dao->delete($nota);
	}
        
	protected function notaPorMd($data) {
		$objData = json_decode($data);
                $md = new MatriculaDisciplinaModel();
                $md->setId($objData->md);
                
                $dao = new NotaDAO();
                $dao->notaPorMd($md);
	}        
}