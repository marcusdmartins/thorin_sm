<?php

interface iMatriculaDAO
{
    	public function save(MatriculaModel $matricula);
	public function view(MatriculaModel $matricula);
	public function listAll();
	public function delete(MatriculaModel $matricula);
	public function update(MatriculaModel $matricula);
        public function buscaUltimoRegistro();
        public function deleteMatricula(MatriculaModel $matricula);
        public function matriculasPorAluno(PessoaModel $pessoa);
        public function visaoGeral(MatriculaModel $matricula);
        public function matriculasRegularesPorTurma(TurmaModel $turma);
        public function matriculasRegularesPorTurmaInst(TurmaModel $turma, $busca);
        public function matriculasRegularesPorTurmaInterno(TurmaModel $turma);
}