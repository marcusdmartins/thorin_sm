<?php

interface iNivelDAO
{
    	public function save(NivelModel $nivel);
	public function view(NivelModel $nivel);
	public function listAll();
	public function delete(NivelModel $nivel);
	public function update(NivelModel $nivel);
}