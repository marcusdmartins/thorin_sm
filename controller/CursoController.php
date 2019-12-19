<?php
include_once ('./dao/CursoDAO.php');
include_once ('./model/CursoModel.php');
include_once ('./model/NivelModel.php');


class CursoController {

	protected function view($nome) {
		include_once ($nome . '.html');
	}

	protected function novo($data) {
		$objData = json_decode($data);
                
                $nivel = new NivelModel();
                $nivel->setId($objData->nivel);
                
                $curso = new CursoModel();
                $curso->setNome($objData->nome);
                $curso->setCargaHoraria($objData->carga_horaria);
                $curso->setValorMensal($objData->valor_mensal);
                $curso->setNivel($nivel);
                
                $dao = new CursoDAO();
                $dao->save($curso);
	}
        
	protected function update($data) {
		$objData = json_decode($data);
                
                $nivel = new NivelModel();
                $nivel->setId($objData->nivel);
                
                $curso = new CursoModel();
                $curso->setId($objData->id);
                $curso->setNome($objData->nome);
                $curso->setCargaHoraria($objData->carga_horaria);
                $curso->setValorMensal($objData->valor_mensal);
                $curso->setNivel($nivel);
                
                $dao = new CursoDAO();
                $dao->update($curso);
	}        

	protected function listar($data) {
		$objData = json_decode($data);
                $curso = new CursoModel();
                $curso->setId($objData->id);
                
                $dao = new CursoDAO();
                $dao->view($curso);
	}

	protected function listarTudo() {
                $dao = new CursoDAO();
                $dao->listAll();
	}

	protected function deletar($data) {
		$objData = json_decode($data);
                
                $curso = new CursoModel();
                $curso->setId($objData->id);                
                
                $dao = new CursoDAO();
                $dao->delete($curso);
	}
}