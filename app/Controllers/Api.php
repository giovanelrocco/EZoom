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

	public function listBanner()
	{
		$id = $this->request->getGet('id');

		$banner = new \App\Models\Banner();
		$listaBanner = $banner->find($id);
		$this->setResponse($listaBanner);
	}

	public function createBanner()
	{
		helper('filesystem');

		$data = $this->request->getPost();
		$foto = $this->request->getFile('foto');

		$banner = new \App\Models\Banner();
		try{
			$fotoNome = $foto->getRandomName();
			$foto->move(ROOTPATH . '/public/uploads', $fotoNome);
			$data['imagemUrl'] = '/uploads/' . $foto->getName();
			if($banner->save($data)){
				$this->setResponse(array(
					'sucesso' => 'Banner Cadastrado com Sucesso',
					'erro' => 0,
				));
			}else{
				$this->setResponse(array('erros' => $banner->errors()));
			}
		}catch(Exception $e){
			$this->setResponse(array(
				'erro' => 'Houve um erro ao inserir o Banner'
			));
		}
	}

	public function updateBanner()
	{
		$id = $this->request->getGet('id');
		if(empty($id)){
			$this->setResponse(array(
				'erro' => 'ID do Banner nao preenchida',
			));
		}
		$data = $this->request->getPost();

		try{
			$banner = new \App\Models\Banner();
			if($banner->update($id, $data)){
				$this->setResponse(array(
					'sucesso' => 'Banner Editado com Sucesso',
					'erro' => 0,
				));
			}else{
				$this->setResponse(array('erros' => $banner->errors()));
			}
		}catch(Exception $e){
			$this->setResponse(array(
				'erro' => 'Houve um erro ao atualizar o Banner'
			));
		}
	}

	public function deleteBanner()
	{
		$id = $this->request->getGet('id');
		if(empty($id)){
			$this->setResponse(array(
				'erro' => 'ID do Banner nao preenchida',
			));
		}

		try{
			$banner = new \App\Models\Banner();
			$deleteResult = $banner->delete($id);
			$this->setResponse(array(
				'sucesso' => 'Banner Deletado com Sucesso',
				'erro' => 0,
			));
		}catch(Exception $e){
			$this->setResponse(array(
				'erro' => 'Houve um erro ao deletar o Banner'
			));
		}
	}

	protected function setResponse($data)
	{
		$response = service('response');
		$response->setStatusCode(200);
		$response->setBody(json_encode($data));
		$response->setHeader('Content-type', 'application/json');
		$response->noCache();
		$response->send();
		exit;
	}
}
