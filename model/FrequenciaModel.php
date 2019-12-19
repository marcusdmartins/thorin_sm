<?php

class FrequenciaModel {

    private $id;
    private $data;
    private $dp;
    
    function getId() {
        return $this->id;
    }

    function getData() {
        return $this->data;
    }

    function getDp() {
        return $this->dp;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setData($data) {
        $this->data = $data;
    }

    function setDp(DisciplinaProfessorModel $dp) {
        $this->dp = $dp;
    }

}