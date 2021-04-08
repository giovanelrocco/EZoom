<?php

namespace App\Controllers;

use CodeIgniter\API\ResponseTrait;

class Api extends \CodeIgniter\Controller
{
	use ResponseTrait;

	public function index()
	{
		echo "Chegou";
	}

	public function createBanner()
	{
		$banner = new \App\Models\Banner();
		$insertResult = $banner->save($this->request->getPost());
		if($insertResult){
			return $this->respondCreated();
		}
		throw new Exception('Erro ao Cadastrar');
	}

	public function updateBanner()
	{
		$banner = new \App\Models\Banner();
		$updateResult = $banner->update($this->request->getGet('id'), $this->request->getPost());
		if($updateResult){
			return $this->respondCreated();
		}
		throw new Exception('Erro ao Cadastrar');
	}
}
