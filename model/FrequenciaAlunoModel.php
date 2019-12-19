<?php

class FrequenciaAlunoModel {

    private $id;
    private $frequencia;
    private $aluno;
    private $presenca;
    
    function getId() {
        return $this->id;
    }

    function getFrequencia() {
        return $this->frequencia;
    }

    function getAluno() {
        return $this->aluno;
    }

    function getPresenca() {
        return $this->presenca;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setFrequencia(FrequenciaModel $frequencia) {
        $this->frequencia = $frequencia;
    }

    function setAluno(PessoaModel $aluno) {
        $this->aluno = $aluno;
    }

    function setPresenca($presenca) {
        $this->presenca = $presenca;
    }

}