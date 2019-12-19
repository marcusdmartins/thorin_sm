<?php

class PessoaModel {

    private $id;
    private $nome;
    private $login;
    private $cpf;
    private $dataNascimento;
    private $sexo;
    private $email;
    private $senha;
    private $fone;
    private $celular;
    private $tipoUsuario;
    private $codigoInterno;
    private $enderecoCEP;
    private $enderecoRua;
    private $enderecoNumero;
    private $enderecoComplemento;
    private $enderecoBairro;
    private $responsavel;

    function getId() {
        return $this->id;
    }

    function getNome() {
        return $this->nome;
    }

    function getCpf() {
        return $this->cpf;
    }

    function getDataNascimento() {
        return $this->dataNascimento;
    }

    function getEmail() {
        return $this->email;
    }

    function getSenha() {
        return $this->senha;
    }

    function getFone() {
        return $this->fone;
    }

    function getTipoUsuario() {
        return $this->tipoUsuario;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setNome($nome) {
        $this->nome = $nome;
    }

    function setCpf($cpf) {
        $this->cpf = $cpf;
    }

    function setDataNascimento($dataNascimento) {
        $this->dataNascimento = $dataNascimento;
    }

    function setEmail($email) {
        $this->email = $email;
    }

    function setSenha($senha) {
        $this->senha = $senha;
    }

    function setFone($fone) {
        $this->fone = $fone;
    }

    function setTipoUsuario(TipoUsuarioModel $tipoUsuario) {
        $this->tipoUsuario = $tipoUsuario;
    }
    
    function getLogin() {
        return $this->login;
    }

    function getCodigoInterno() {
        return $this->codigoInterno;
    }

    function setLogin($login) {
        $this->login = $login;
    }

    function setCodigoInterno($codigoInterno) {
        $this->codigoInterno = $codigoInterno;
    }
    
    function getEnderecoCEP() {
        return $this->enderecoCEP;
    }

    function getEnderecoRua() {
        return $this->enderecoRua;
    }

    function getEnderecoNumero() {
        return $this->enderecoNumero;
    }

    function getEnderecoComplemento() {
        return $this->enderecoComplemento;
    }

    function getEnderecoBairro() {
        return $this->enderecoBairro;
    }

    function getResponsavel() {
        return $this->responsavel;
    }

    function setEnderecoCEP($enderecoCEP) {
        $this->enderecoCEP = $enderecoCEP;
    }

    function setEnderecoRua($enderecoRua) {
        $this->enderecoRua = $enderecoRua;
    }

    function setEnderecoNumero($enderecoNumero) {
        $this->enderecoNumero = $enderecoNumero;
    }

    function setEnderecoComplemento($enderecoComplemento) {
        $this->enderecoComplemento = $enderecoComplemento;
    }

    function setEnderecoBairro($enderecoBairro) {
        $this->enderecoBairro = $enderecoBairro;
    }

    function setResponsavel(PessoaModel $responsavel) {
        $this->responsavel = $responsavel;
    }
    
    function getCelular() {
        return $this->celular;
    }

    function setCelular($celular) {
        $this->celular = $celular;
    }
    
    function getSexo() {
        return $this->sexo;
    }

    function setSexo($sexo) {
        $this->sexo = $sexo;
    }

}