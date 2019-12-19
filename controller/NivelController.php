<?php
include_once ('./dao/NivelDAO.php');
include_once ('./model/NivelModel.php');


class NivelController {

	protected function view($nome) {
		include_once ($nome . '.html');
	}

	protected function novo($data) {
		$objData = json_decode($data);
                
                $nivel = new NivelModel();
                $nivel->setNome($objData->nome);
                
                $dao = new NivelDAO();
                $dao->save($nivel);
	}
        
	protected function update($data) {
		$objData = json_decode($data);
                
                $nivel = new NivelModel();
                $nivel->setId($objData->id);
                $nivel->setNome($objData->nome);
                
                $dao = new NivelDAO();
                $dao->update($nivel);
	}        

	protected function listar($data) {
		$objData = json_decode($data);
                $nivel = new NivelModel();
                $nivel->setId($objData->id);
                
                $dao = new NivelDAO();
                $dao->view($nivel);
	}

	protected function listarTudo() {
                $dao = new NivelDAO();
                $dao->listAll();
	}

	protected function deletar($data) {
		$objData = json_decode($data);
                
                $nivel = new NivelModel();
                $nivel->setId($objData->id);                
                
                $dao = new NivelDAO();
                $dao->delete($nivel);
	}
}