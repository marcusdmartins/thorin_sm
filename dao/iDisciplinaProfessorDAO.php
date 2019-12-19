<?php

interface iDisciplinaProfessorDAO
{
    	public function save(DisciplinaProfessorModel $disciplina_professor);
	public function view(DisciplinaProfessorModel $disciplina_professor);
	public function listAll();
	public function delete(DisciplinaProfessorModel $disciplina_professor);
	public function update(DisciplinaProfessorModel $disciplina_professor);
        public function buscaPorProfessor(PessoaModel $pessoa);
        public function verificaExistencia(DisciplinaProfessorModel $dp);
        public function buscaPorTurma(TurmaModel $turma);
}