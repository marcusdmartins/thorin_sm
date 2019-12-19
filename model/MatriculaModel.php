<?php

class MatriculaModel {

    private $id;
    private $aluno;
    private $curso;
    private $turma;
    private $codigo;
    private $inicio;
    private $status;
    private $dataVencimento;
    private $desconto;
    
    function getId() {
        return $this->id;
    }

    function getAluno() {
        return $this->aluno;
    }

    function getCurso() {
        return $this->curso;
    }

    function getCodigo() {
        return $this->codigo;
    }

    function getInicio() {
        return $this->inicio;
    }

    function getStatus() {
        return $this->status;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setAluno($aluno) {
        $this->aluno = $aluno;
    }

    function setCurso($curso) {
        $this->curso = $curso;
    }

    function setCodigo($codigo) {
        $this->codigo = $codigo;
    }

    function setInicio($inicio) {
        $this->inicio = $inicio;
    }

    function setStatus($status) {
        $this->status = $status;
    }
    
    function getDataVencimento() {
        return $this->dataVencimento;
    }

    function getDesconto() {
        return $this->desconto;
    }

    function setDataVencimento($dataVencimento) {
        $this->dataVencimento = $dataVencimento;
    }

    function setDesconto($desconto) {
        $this->desconto = $desconto;
    }
    
    function getTurma() {
        return $this->turma;
    }

    function setTurma(TurmaModel $turma) {
        $this->turma = $turma;
    }



}