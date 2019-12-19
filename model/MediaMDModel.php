<?php

class MediaMDModel {

    private $id;
    private $media;
    private $md;
    private $valor;
    
    function getId() {
        return $this->id;
    }

    function getMedia() {
        return $this->media;
    }

    function getMd() {
        return $this->md;
    }

    function getValor() {
        return $this->valor;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setMedia($media) {
        $this->media = $media;
    }

    function setMd($md) {
        $this->md = $md;
    }

    function setValor($valor) {
        $this->valor = $valor;
    }

}