<?php

interface iNotaSemanalDAO
{
    	public function save(NotaSemanalModel $nota);
	public function update(NotaSemanalModel $nota);
        public function view(NotaSemanalModel $nota);
	public function listAll();
	public function delete(NotaSemanalModel $nota);
        public function notaPorTA(TipoAvaliacaoModel $tipoAvaliacao, MatriculaDisciplinaModel $md);
}