<?php

class AccessTokenModel {

	private $id;
	private $colaborador;
        private $data;
        private $timeout;
        private $token;

        function getId() {
            return $this->id;
        }

        function getColaborador() {
            return $this->colaborador;
        }

        function getData() {
            return $this->data;
        }

        function getTimeout() {
            return $this->timeout;
        }

        function getToken() {
            return $this->token;
        }

        function setId($id) {
            $this->id = $id;
        }

        function setColaborador(ColaboradorModel $colaborador) {
            $this->colaborador = $colaborador;
        }

        function setData($data) {
            $this->data = $data;
        }

        function setTimeout($timeout) {
            $this->timeout = $timeout;
        }

        function setToken($token) {
            $this->token = $token;
        }
}
