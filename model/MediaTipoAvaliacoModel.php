<?php

class MediaTipoAvaliacaoModel {

    private $id;
    private $media;
    private $tipoAvaliacao;
    
    function getId() {
        return $this->id;
    }

    function getMedia() {
        return $this->media;
    }

    function getTipoAvaliacao() {
        return $this->tipoAvaliacao;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setMedia(MediaModel $media) {
        $this->media = $media;
    }

    function setTipoAvaliacao(TipoAvaliacaoModel $tipoAvaliacao) {
        $this->tipoAvaliacao = $tipoAvaliacao;
    }

}