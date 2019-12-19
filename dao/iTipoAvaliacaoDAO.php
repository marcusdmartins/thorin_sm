<?php

interface iTipoAvaliacaoDAO
{
    	public function save(TipoAvaliacaoModel $tipoAvaliacao);
	public function view(TipoAvaliacaoModel $tipoAvaliacao);
	public function listAll();
	public function delete(TipoAvaliacaoModel $tipoAvaliacao);
	public function update(TipoAvaliacaoModel $tipoAvaliacao);
        public function listaTiposParaLancamento(MatriculaDisciplinaModel $md);
}