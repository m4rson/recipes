<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Recipes extends CI_Controller {

	public function index()
	{
		$data['yield'] = 'recipes/index';
    $data['recipes'] = $this->recipe->all();
		$this->load->view('layouts/application', $data);
	}

  public function add()
  {
    $data['yield'] = 'recipes/new';
    $this->load->view('layouts/application', $data);
  }

	public function create()
	{
		redirect('yimm', 'refresh');
	}
}
