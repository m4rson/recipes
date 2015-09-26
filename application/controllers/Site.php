<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Site extends CI_Controller {

	public function index()
	{
		$data['categories'] = $this->category->all();
		$data['yield'] = 'site/home';
    $this->load->view('layouts/application', $data);
	}

	public function secret()
	{
		$data['yield'] = 'site/secret';
		$this->load->view('layouts/application', $data);
	}
}
