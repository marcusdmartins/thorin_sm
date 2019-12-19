<?php

interface iDisciplinaDAO
{
    	public function save(DisciplinaModel $disciplina);
	public function view(DisciplinaModel $disciplina);
	public function listAll();
	public function delete(DisciplinaModel $disciplina);
	public function update(DisciplinaModel $disciplina);
        public function disciplinaPorCurso(CursoModel $curso);
        public function buscaInstDisciplina($busca, CursoModel $curso);
}