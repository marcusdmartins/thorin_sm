<?php

interface iSalaDAO
{
    	public function save(SalaModel $sala);
	public function view(SalaModel $sala);
	public function listAll();
	public function delete(SalaModel $sala);
	public function update(SalaModel $sala);
}