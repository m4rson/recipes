<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admins extends CI_Controller{

  public function index()
  {

  }

  public function panel()
  {
    if($this->session->is_admin)
    {
      $data['yield'] = 'admins/panel';
      $data['categories'] = $this->category->all();
      $this->load->view('layouts/application', $data);
    }else{
      redirect('/', 'refresh');
    }

  }

  public function create()
  {
    $data['yield'] = 'admins/admin';
    $data['categories'] = $this->category->all();
    $this->load->view('layouts/application', $data);
  }
  public function register()
  {
    $this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[2]|max_length[45]');
    $this->form_validation->set_rules('email', 'Email', 'trim|required|min_length[2]|max_length[45]');
    $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[5]|max_length[25]');

    if($this->form_validation->run() === false)
    {
      $data['yield'] = 'admins/admin';
      $this->load->view('layouts/application', $data);
    }
    else {

      //register new admin
      $data = [
        'username' => $this->input->post('username'),
        'email' => $this->input->post('email'),
        'password' => hash_password($this->input->post('password'))
      ];

      $this->admin->register($data);
      redirect('/', 'refresh');

    }
  }

  public function login()
  {
    $data['yield'] = 'admins/login';
    $data['categories'] = $this->category->all();
    $data['alreadyAdmin'] = $this->admin->alreadyAdmin();
    $this->load->view('layouts/application', $data);
  }


  public function auth()
  {
    //validate user input
    $this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[2]|max_length[35]');
    $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[5]|max_length[25]');

    if($this->form_validation->run() === false)
    {
      $data['yield'] = 'admins/admin';
      $this->load->view('layouts/application', $data);
    }
    else{
      $username = $this->input->post('username');
      $password = $this->input->post('password');
      $auth = $this->admin->authenticate($username, $password);

      if($auth)
      {
        $data = [
          //'is_logged_in' => true,
          'username' => $this->input->post('username'),
          'is_admin' => true
        ];

        $this->session->set_userdata($data);
        redirect('recipes/new', 'refresh');
      }
    }

  }

  public function logout()
  {
    $this->session->sess_destroy();
    redirect('/', 'refresh');
  }

}
