<?php

interface iRecpDAO
{
    	public function save(RecpModel $recp);
	public function view(RecpModel $recp);
	public function listAll();
	public function delete(RecpModel $recp);
	public function update(RecpModel $recp);

}