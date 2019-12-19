<?php

include_once ('./model/TipoUsuarioModel.php');
include_once ('./model/SubRotinaModel.php');
include_once ('./model/RotinaModel.php');
include_once ('./model/PessoaModel.php');
include_once ('./dao/AcessoDAO.php');

class AcessoController {

	protected function view($nome) {
		include_once ($nome . '.html');
	}

	protected function getAcessoSistema($data) {
		$objData = json_decode($data);

		$pessoa = new PessoaModel();
		$pessoa ->setId($objData->id);

		$dao = new AcessoDAO();
		$dao->pegarAcessos($pessoa);
	}
        
        protected function logar($data){
            $objData = json_decode($data);
            
            $pessoa = new PessoaModel();
            $pessoa->setLogin($objData->login);
            $pessoa->setSenha($objData->senha);
            
            $dao = new AcessoDAO();
            $dao->logar($pessoa);
        }   
        
        protected function listarPermissoes($data){
            $objData = json_decode($data);
            
            $tipoUsuario = new TipoUsuarioModel();
            $tipoUsuario->setId($objData->tipoUsuario);
            
            $dao = new AcessoDAO();
            $dao->listarPermissoes($tipoUsuario);
        }
        
        protected function listarRotinas(){
            
            $dao = new AcessoDAO();
            $dao->listarRotinas();
        } 
        
        protected function verificaPermissao($data){
            $objData = json_decode($data);
            
            $tipoUsuario = new TipoUsuarioModel();
            $tipoUsuario->setId($objData->tipoUsuario);
            
            $subRotina = new SubRotinaModel();
            $subRotina->setId($objData->subRotina);
            
            $dao = new AcessoDAO();
            $dao->verificaPermissao($tipoUsuario, $subRotina);
        }        

        protected function updatePermissao($data){
            $objData = json_decode($data);
            
            $tipoUsuario = new TipoUsuarioModel();
            $tipoUsuario->setId($objData->tipoUsuario);
            
            $rotina = new RotinaModel();
            $rotina->setId($objData->rotina);            
            
            $subRotina = new SubRotinaModel();
            $subRotina->setId($objData->subRotina);
            
            $dao = new AcessoDAO();
            $dao->updatePermissao($tipoUsuario, $rotina, $subRotina);
        }           
        
}
