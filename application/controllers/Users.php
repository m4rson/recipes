<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller{

  public function index()
  {
    if($this->session->is_admin)
    {
      $data['yield'] = 'users/index';
      $data['categories'] = $this->category->all();
      $data['admins'] = $this->admin->all();
      $data['users'] = $this->user->all();
      $this->load->view('layouts/application', $data);
    }else {
      redirect('/', 'refresh');
    }

  }

  public function create()
  {
    $data['categories'] = $this->category->all();
    $data['yield'] = 'users/create';
    $this->load->view('layouts/application', $data);
  }
  public function register()
  {
    $this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[2]|max_length[45]');
    $this->form_validation->set_rules('email', 'Email', 'trim|required|min_length[2]|max_length[45]');
    $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[5]|max_length[25]');

    if($this->form_validation->run() === false)
    {
      $data['yield'] = 'users/crete';
      $this->load->view('layouts/application', $data);
    }
    else {

      //register new user
      $data = [
        'username' => $this->input->post('username'),
        'email' => $this->input->post('email'),
        'password' => hash_password($this->input->post('password'))
      ];

      $this->user->register($data);
      $this->session->set_flashdata('message', 'Użytkownik ' . $data['username'] . ' został zarejestrowany');
      redirect('home', 'refresh');

    }
  }

  public function login()
  {
    $data['categories'] = $this->category->all();
    $data['yield'] = 'users/login';
    $this->load->view('layouts/application', $data);
  }


  public function auth()
  {
    //validate user input
    $this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[2]|max_length[35]');
    $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[5]|max_length[25]');

    if($this->form_validation->run() === false)
    {
      $data['yield'] = 'users/login';
      $this->load->view('layouts/application', $data);
    }
    else{
      $username = $this->input->post('username');
      $password = $this->input->post('password');
      $auth = $this->user->authenticate($username, $password);

      if($auth)
      {
        $data = [
          'is_logged_in' => true,
          'username' => $this->input->post('username')
        ];

        $this->session->set_userdata($data);
        redirect('recipes');
      }
      else{
        $data['yield'] = 'users/login';
        $this->load->view('layouts/application', $data);
      }
    }

  }

  public function logout()
  {
    $this->session->sess_destroy();
    redirect('/', 'refresh');
  }

  public function delete()
  {
    $id = $this->uri->segment(3);
    $this->user->delete($id);
    $this->session->set_flashdata('message', 'Użytkownik został usunięty');
    redirect('users', 'refresh');
  }

}
