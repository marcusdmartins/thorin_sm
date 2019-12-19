<?php

interface iPlanoAulaDAO
{
    	public function save(PlanoAulaModel $planoAula);
	public function view(PlanoAulaModel $planoAula);
	public function listAll();
	public function delete(PlanoAulaModel $planoAula);
	public function update(PlanoAulaModel $planoAula);
        public function planosPorDP(DisciplinaProfessorModel $dp);
}