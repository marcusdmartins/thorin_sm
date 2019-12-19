<?php

interface iTurmaDAO
{
    	public function save(TurmaModel $turma);
	public function view(TurmaModel $turma);
	public function listAll();
	public function delete(TurmaModel $turma);
	public function update(TurmaModel $turma);
        public function turmaPorCurso(CursoModel $curso);
}