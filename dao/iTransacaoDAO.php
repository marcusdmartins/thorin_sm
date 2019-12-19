<?php

interface iTransacaoDAO
{
    	public function save(TransacaoModel $transacao);
	public function view(TransacaoModel $transacao);
	public function listAll();
	public function delete(TransacaoModel $transacao);
	public function update(TransacaoModel $transacao);
}