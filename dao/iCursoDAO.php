<?php

interface iCursoDAO
{
    	public function save(CursoModel $curso);
	public function view(CursoModel $curso);
	public function listAll();
	public function delete(CursoModel $curso);
	public function update(CursoModel $curso);
}