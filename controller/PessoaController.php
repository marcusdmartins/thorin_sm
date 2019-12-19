<?php
include_once ('./dao/PessoaDAO.php');
include_once ('./model/PessoaModel.php');
include_once ('./model/TipoUsuarioModel.php');


class PessoaController {

	protected function view($nome) {
		include_once ($nome . '.html');
	}

	protected function nova($data) {
		$objData = json_decode($data);
                
                $tipoUsuario = new TipoUsuarioModel();
                $tipoUsuario->setId($objData->tipoUsuario);
                
                $responsavel = new PessoaModel();
                $responsavel->setId($objData->id_responsavel);
                        
                $pessoa = new PessoaModel();
                $pessoa->setNome($objData->nome);
                $pessoa->setLogin($objData->login);
                $pessoa->setDataNascimento($objData->dataNascimento);
                $pessoa->setSexo($objData->sexo);
                $pessoa->setEmail($objData->email);
                $pessoa->setSenha($objData->senha);
                $pessoa->setFone($objData->fone);
                $pessoa->setCelular($objData->celular);
                $pessoa->setCpf($objData->cpf);
                $pessoa->setCodigoInterno($objData->codigoInterno);
                $pessoa->setEnderecoCEP($objData->cep);
                $pessoa->setEnderecoRua($objData->rua);
                $pessoa->setEnderecoNumero($objData->numero);  
                $pessoa->setEnderecoComplemento($objData->complemento);
                $pessoa->setEnderecoBairro($objData->bairro);
                
                $pessoa->setTipoUsuario($tipoUsuario);
                $pessoa->setResponsavel($responsavel);
                
                $dao = new PessoaDAO();
                $dao->save($pessoa);
	}
        
	protected function update($data) {
		$objData = json_decode($data);
                
                $tipoUsuario = new TipoUsuarioModel();
                $tipoUsuario->setId($objData->tipoUsuario);
                
                $responsavel = new PessoaModel();
                $responsavel->setId($objData->id_responsavel);
                        
                $pessoa = new PessoaModel();
                
                $pessoa->setId($objData->id);
                $pessoa->setNome($objData->nome);
                $pessoa->setLogin($objData->login);
                $pessoa->setDataNascimento($objData->dataNascimento);
                $pessoa->setSexo($objData->sexo);
                $pessoa->setEmail($objData->email);
                $pessoa->setFone($objData->fone);
                $pessoa->setCelular($objData->celular);
                $pessoa->setCpf($objData->cpf);
                $pessoa->setCodigoInterno($objData->codigoInterno);
                $pessoa->setEnderecoCEP($objData->cep);
                $pessoa->setEnderecoRua($objData->rua);
                $pessoa->setEnderecoNumero($objData->numero);  
                $pessoa->setEnderecoComplemento($objData->complemento);
                $pessoa->setEnderecoBairro($objData->bairro);
                
                $pessoa->setTipoUsuario($tipoUsuario);
                $pessoa->setResponsavel($responsavel);
                
                $dao = new PessoaDAO();
                $dao->update($pessoa);
	}        

	protected function listar($data) {
		$objData = json_decode($data);
                $pessoa = new PessoaModel();
                $pessoa->setId($objData->id);
                
                $dao = new PessoaDAO();
                $dao->view($pessoa);
	}

	protected function listarTudo() {
                $dao = new PessoaDAO();
                $dao->listAll();
	}

	protected function deletar($data) {
		$objData = json_decode($data);
                
                $pessoa = new PessoaModel();
                $pessoa->setId($objData->id);                
                
                $dao = new PessoaDAO();
                $dao->delete($pessoa);
	}
        
	protected function buscaPorLogin($data) {
		$objData = json_decode($data);
                $pessoa = new PessoaModel();
                $pessoa->setLogin($objData->login);
                
                $dao = new PessoaDAO();
                $dao->buscaPorLogin($pessoa);
	}     
        
	protected function buscaInstPessoa($data) {
		$objData = json_decode($data);
                
                $tipoUsuario = new TipoUsuarioModel();
                $tipoUsuario->setId($objData->tipoUsuario);
                
                $dao = new PessoaDAO();
                $dao->buscaInstPessoa($objData->busca, $tipoUsuario);
	}
        
	protected function listarPorTipo($data) {
		$objData = json_decode($data);
                $tipoUsuario = new TipoUsuarioModel();
                $tipoUsuario->setId($objData->tipoUsuario);
                
                $dao = new PessoaDAO();
                $dao->listarPorTipo($tipoUsuario);
	}        
        
	protected function buscaPorResponsavel($data) {
		$objData = json_decode($data);
                $pessoa = new PessoaModel();
                $pessoa->setId($objData->id_responsavel);
                
                $dao = new PessoaDAO();
                $dao->buscarPorResponsavel($pessoa);
	}
        
	protected function alteraSenha($data) {
		$objData = json_decode($data);
                $pessoa = new PessoaModel();
                
                $pessoa->setId($objData->id);
                $pessoa->setSenha($objData->senha_atual);
                $novaSenha = $objData->nova_senha;
                
                $dao = new PessoaDAO();
                $dao->alteraSenha($pessoa, $novaSenha);
	}         
}