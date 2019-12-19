<?php

interface iMatriculaDisciplinaDAO
{
    	public function save(MatriculaDisciplinaModel $matriculaDisciplina);
	public function view(MatriculaDisciplinaModel $matriculaDisciplina);
	public function listAll();
	public function delete(MatriculaDisciplinaModel $matriculaDisciplina);
	public function update(MatriculaDisciplinaModel $matriculaDisciplina);
        public function buscaPorMatricula(MatriculaModel $matricula);
        public function buscaPorMatriculaDisciplina(MatriculaModel $matricula, DisciplinaModel $disciplina);
}