<?php
include_once ('./dao/EventoDAO.php');
include_once ('./model/EventoModel.php');


class EventoController {

	protected function view($nome) {
		include_once ($nome . '.html');
	}

	protected function novo($data) {
		$objData = json_decode($data);
                
                $evento = new EventoModel();
                $evento->setDescricao($objData->descricao);
                $evento->setData($objData->data);
                $evento->setHora($objData->hora);
                $evento->setStatus($objData->status);
                
                $dao = new EventoDAO();
                $dao->save($evento);
	}
        
	protected function update($data) {
		$objData = json_decode($data);
                
                $evento = new EventoModel();
                
                $evento->setId($objData->id);
                $evento->setDescricao($objData->descricao);
                $evento->setData($objData->data);
                $evento->setHora($objData->hora);
                $evento->setStatus($objData->status);
                
                $dao = new EventoDAO();
                $dao->update($evento);
	}        

	protected function listar($data) {
		$objData = json_decode($data);
                $evento = new EventoModel();
                $evento->setId($objData->id);
                
                $dao = new EventoDAO();
                $dao->view($evento);
	}

	protected function listarTudo() {
                $dao = new EventoDAO();
                $dao->listAll();
	}

	protected function deletar($data) {
		$objData = json_decode($data);
                
                $evento = new EventoModel();
                $evento->setId($objData->id);                
                
                $dao = new EventoDAO();
                $dao->delete($evento);
	}
}