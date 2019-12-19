<?php

interface iCobrancaDAO
{
    	public function save(CobrancaModel $cobranca);
	public function view(CobrancaModel $cobranca);
	public function listAll();
	public function delete(CobrancaModel $cobranca);
	public function update(CobrancaModel $cobranca);
}