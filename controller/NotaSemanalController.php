<?php
include_once ('./dao/NotaSemanalDAO.php');
include_once ('./model/NotaSemanalModel.php');
include_once ('./model/PessoaModel.php');
include_once ('./model/NotaModel.php');
include_once ('./model/MatriculaDisciplinaModel.php');
include_once ('./model/TipoAvaliacaoModel.php');
include_once ('./dao/NotaDao.php');


class NotaSemanalController {

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
                
                $notas = $objData->notasSemanais;
                $notaMensal = 0;
                foreach ($notas as $notaSemanal){
                    $valorMensal = $valorMensal +  $notaSemanal;
                    
                    $nota = new NotaSemanalModel();
                    $nota->setValor($notaSemanal);
                    $nota->setTipoAvaliacao($tipoAvaliacao);
                    $nota->setMatriculaDisplina($md);
                    $nota->setPessoaLog($pessoa_log);

                    $dao = new NotaSemanalDAO();
                    $dao->save($nota);                    
                }
                
                
                $notaMensal = new NotaModel();
                $notaMensal->setDataAvaliacao(null);
                $notaMensal->setValor($valorMensal);
                $notaMensal->setTipoAvaliacao($tipoAvaliacao);
                $notaMensal->setMatriculaDisplina($md);
                $notaMensal->setPessoaLog($pessoa_log);
                
                $daoNota = new NotaDAO();
                $daoNota->save($notaMensal);
	}
        
	protected function update($data) {
		$objData = json_decode($data);
                
                $pessoa_log = new PessoaModel();
                $pessoa_log->setId($objData->pessoa);
                
                $tipoAvaliacao = new TipoAvaliacaoModel();
                $tipoAvaliacao->setId($objData->tipoAvaliacao);
                
                $md = new MatriculaDisciplinaModel();
                $md->setId($objData->md);
                        
                $nota = new NotaSemanalModel();
                $nota->setId($objData->id);
                $nota->setDataAvaliacao($objData->dataAvaliacao);
                $nota->setValor($objData->valor);
                $nota->setTipoAvaliacao($tipoAvaliacao);
                $nota->setMatriculaDisplina($md);
                $nota->setPessoaLog($pessoa_log);
                
                $dao = new NotaSemanalDAO();
                $dao->update($nota);
	}        

	protected function listar($data) {
		$objData = json_decode($data);
                $nota = new NotaSemanalModel();
                $nota->setId($objData->id);
                
                $dao = new NotaSemanalDAO();
                $dao->view($nota);
	}

	protected function listarTudo() {
                $dao = new NotaSemanalDAO();
                $dao->listAll();
	}

	protected function deletar($data) {
		$objData = json_decode($data);
                
                $nota = new NotaSemanalModel();
                $nota->setId($objData->id);                
                
                $dao = new NotaSemanalDAO();
                $dao->delete($nota);
	}
        
	protected function notaPorTA($data) {
		$objData = json_decode($data);
                $md = new MatriculaDisciplinaModel();
                $md->setId($objData->md);
                
                $ta = new TipoAvaliacaoModel();
                $ta->setId($objData->ta);
                
                $dao = new NotaSemanalDAO();
                $dao->notaPorTA($ta, $md);
	}        
}