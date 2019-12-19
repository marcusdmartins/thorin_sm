<?php

interface iMediaDAO
{
    	public function save(MediaModel $media);
	public function view(MediaModel $media);
	public function listAll();
	public function delete(MediaModel $media);
	public function update(MediaModel $media);
        public function relacionaTipos(MediaModel $media, TipoAvaliacaoModel $tipoAvaliacao);
        public function buscaUltimaMedia();
        public function tipoAvaliacaoPorMedia(MediaModel $media, TipoAvaliacaoModel $tipo);
        public function excluiRelacionamentos(MediaModel $media);
        public function gerarMedias(MatriculaDisciplinaModel $md);
        public function buscaTodasAsMedias();
        public function buscaQtdTiposMedias(MediaModel $media);
        public function lancaMedia(MediaMDModel $mediaMd);
        public function excluiMediasPorMD(MatriculaDisciplinaModel $md);
        public function buscaMediasPorMD(MatriculaDisciplinaModel $md);
        public function mediaCompleta(MatriculaDisciplinaModel $md, MediaModel $media);
        public function tipoAvaliacaoPorMediaInterno(MediaModel $media);
        public function buscaNotaPorTipo(MatriculaDisciplinaModel $md, TipoAvaliacaoModel $ta);
}