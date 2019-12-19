<?php

include_once ('./controller/AcessoController.php');

class Acesso extends AcessoController {

	public function index() {
            $this -> view('index');
	}

	//@Post("thorin/acesso/pegar")
	public function pegar($json) {
            $controller = new AcessoController();
            $controller -> getAcessoSistema($json);
	}
        
        //@Post("thorin/acesso/logar")
        public function logar($json) {
            $controller = new AcessoController();
            $controller->logar($json);
        }  
        
        //@Post("thorin/acesso/listarPermissoes")
        public function listarPermissoes($json) {
            $controller = new AcessoController();
            $controller->listarPermissoes($json);
        }          
        
        //@Post("thorin/acesso/listarRotinas")
        public function listarRotinas() {
            $controller = new AcessoController();
            $controller->listarRotinas();
        }

        //@Post("thorin/acesso/verificaPermissao")
        public function verificaPermissao($json) {
            $controller = new AcessoController();
            $controller->verificaPermissao($json);
        }    
        
        //@Post("thorin/acesso/updatePermissao")
        public function updatePermissao($json) {
            $controller = new AcessoController();
            $controller->updatePermissao($json);
        }           
        
}