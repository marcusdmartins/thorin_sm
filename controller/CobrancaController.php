<?php
include_once ('./dao/CobrancaDAO.php');
include_once ('./model/CobrancaModel.php');
include_once ('./model/PessoaModel.php');
include_once ('./model/MatriculaModel.php');


class CobrancaController {

	protected function view($nome) {
		include_once ($nome . '.html');
	}

	protected function novo($data) {
		$objData = json_decode($data);
                $cobranca = new CobrancaModel();
                $matricula = new MatriculaModel();
                $pessoa = new PessoaModel();
                
                $matricula->setId($objData->matricula);
                $pessoa->setId($objData->pessoa);
                
                $cobranca->setDescricao($objData->descricao);
                $cobranca->setMatricula($objData->matricula);
                $cobranca->setStatus($objData->status);
                $cobranca->setDataVencimento($objData->vencimento);
                $cobranca->setDataPagamento(null);
                $cobranca->setValor($objData->valor);
                $cobranca->setPessoa($pessoa);
                $cobranca->setMatricula($matricula);
                
                $dao = new CobrancaDAO();
                $dao->save($cobranca);
	}
        
	protected function update($data) {
		$objData = json_decode($data);
                $cobranca = new CobrancaModel();
                $matricula = new MatriculaModel();
                $pessoa = new PessoaModel();
                
                $matricula->setId($objData->matricula);
                $pessoa->setId($objData->pessoa);
                
                $cobranca->setId($objData->id);
                $cobranca->setDescricao($objData->descricao);
                $cobranca->setMatricula($objData->matricula);
                $cobranca->setStatus($objData->status);
                $cobranca->setDataVencimento($objData->vencimento);
                $cobranca->setDataPagamento($objData->pagamento);
                $cobranca->setValor($objData->valor);
                $cobranca->setPessoa($pessoa);
                $cobranca->setMatricula($matricula);
                
                $dao = new CobrancaDAO();
                $dao->update($cobranca);
	}        

	protected function listar($data) {
		$objData = json_decode($data);
                $cobranca = new CobrancaModel();
                $cobranca->setId($objData->id);
                
                $dao = new CobrancaDAO();
                $dao->view($cobranca);
	}

	protected function listarTudo() {
                $dao = new CobrancaDAO();
                $dao->listAll();
	}

	protected function deletar($data) {
		$objData = json_decode($data);
                $cobranca = new CobrancaModel();
                $cobranca->setId($objData->id);                
                
                $dao = new CobrancaDAO();
                $dao->delete($cobranca);
          
	}
}