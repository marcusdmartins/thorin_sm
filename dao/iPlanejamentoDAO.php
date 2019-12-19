<?php

interface iPlanejamentoDAO
{
    	public function save(PlanejamentoModel $planejamento);
	public function view(PlanejamentoModel $planejamento);
	public function listAll();
	public function delete(PlanejamentoModel $planejamento);
	public function update(PlanejamentoModel $planejamento);
        public function planejamentoPorDP(DisciplinaProfessorModel $dp);
        public function buscaUltimo();
        public function uploadArquivo(PlanejamentoModel $planejamento);
}