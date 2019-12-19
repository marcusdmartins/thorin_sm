<?php
include_once ('./dao/SalaDAO.php');
include_once ('./model/SalaModel.php');


class SalaController {

	protected function view($nome) {
		include_once ($nome . '.html');
	}

	protected function novo($data) {
		$objData = json_decode($data);
                
                $sala = new SalaModel();
                $sala->setNome($objData->nome);
                
                $dao = new SalaDAO();
                $dao->save($sala);
	}
        
	protected function update($data) {
		$objData = json_decode($data);
                
                $sala = new SalaModel();
                $sala->setId($objData->id);
                $sala->setNome($objData->nome);
                
                $dao = new SalaDAO();
                $dao->update($sala);
	}        

	protected function listar($data) {
		$objData = json_decode($data);
                $sala = new SalaModel();
                $sala->setId($objData->id);
                
                $dao = new SalaDAO();
                $dao->view($sala);
	}

	protected function listarTudo() {
                $dao = new SalaDAO();
                $dao->listAll();
	}

	protected function deletar($data) {
		$objData = json_decode($data);
                
                $sala = new SalaModel();
                $sala->setId($objData->id);                
                
                $dao = new SalaDAO();
                $dao->delete($sala);
	}
}