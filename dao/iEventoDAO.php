<?php

interface iEventoDAO
{
    	public function save(EventoModel $evento);
	public function view(EventoModel $evento);
	public function listAll();
	public function delete(EventoModel $evento);
	public function update(EventoModel $evento);
}