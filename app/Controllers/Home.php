<?php

namespace App\Controllers;

class Home extends BaseController
{
	public function index()
	{
		$banner = new \App\Models\Banner();
		$banners = $banner->find();
		return view('home', array('banners' => $banners));
	}

}
