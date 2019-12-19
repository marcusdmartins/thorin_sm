<?php

interface iPessoaDAO
{
    	public function save(PessoaModel $pessoa);
	public function view(PessoaModel $pessoa);
	public function listAll();
	public function delete(PessoaModel $pessoa);
	public function update(PessoaModel $pessoa);
        public function buscaPorLogin(PessoaModel $pessoa);
        public function buscaInstPessoa($busca, TipoUsuarioModel $tipoUsuario);
        public function listarPorTipo(TipoUsuarioModel $tipo);
        public function pessoaUltimoResgistro();
        public function buscarPorResponsavel(PessoaModel $responsavel);
        public function alteraSenha(PessoaModel $pessoa, $novaSenha);
        public function verificaSenhaAntiga(PessoaModel $pessoa);
}