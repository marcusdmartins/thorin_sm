<?php

interface iNotaDAO
{
    	public function save(NotaModel $nota);
	public function view(NotaModel $nota);
	public function listAll();
	public function delete(NotaModel $nota);
	public function update(NotaModel $nota);
        public function notaPorMd(MatriculaDisciplinaModel $matriculaDisciplina);
}