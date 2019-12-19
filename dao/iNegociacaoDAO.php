<?php

interface iNegociacaoDAO
{
    	public function save(NegociacaoModel $negociacao);
	public function view(NegociacaoModel $negociacao);
	public function listAll();
	public function delete(NegociacaoModel $negociacao);
	public function update(NegociacaoModel $negociacao);
}