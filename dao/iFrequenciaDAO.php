<?php

interface iFrequenciaDAO
{
    	public function save(FrequenciaModel $frequencia);
	public function view(FrequenciaModel $frequencia);
	public function listAll();
	public function delete(FrequenciaModel $frequencia);
	public function update(FrequenciaModel $frequencia);
        public function lancaPresencas(FrequenciaAlunoModel $frequenciaAluno);
        public function buscaUltimaFrequencia();
        public function frequenciaPorDP(DisciplinaProfessorModel $dp);
        public function frequenciaAlunoDP(FrequenciaModel $frequencia, PessoaModel $aluno);
        public function excluirFrequenciaAluno(FrequenciaModel $frequencia);
        public function frequenciaAlunoDPInterno(FrequenciaModel $frequencia, PessoaModel $aluno);
        public function frequenciaAlunoDisciplina(DisciplinaModel $disciplina, PessoaModel $aluno, $presenca);
        public function frequenciaAlunoDisciplinaDetalhes(DisciplinaModel $disciplina, PessoaModel $aluno, $presenca);
}