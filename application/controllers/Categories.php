<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Categories extends CI_Controller{

  public function index()
  {

  }

  public function add()
  {
    if($this->session->is_admin)
    {
      $data['yield'] = 'categories/new';
      $data['categories'] = $this->category->all();
      $this->load->view('layouts/application', $data);
    }
    else {
      redirect('login', 'refresh');
    }
  }

  public function create()
  {
    $this->form_validation->set_rules('name', 'Name', 'trim|required');

    if($this->form_validation->run() === false)
    {
      //redirect('categories/new', 'refresh');
      $this->add();
    }
    else {
      $data = [
        'name' => $this->input->post('name')
      ];
      $this->category->create($data);
      $this->session->set_flashdata('message', 'Kategoria została dodana');
      redirect('categories/new', 'refresh');
    }
  }

  public function show()
  {
    if(($this->session->is_admin) || ($this->session->is_logged_in))
    {
      $id = $this->uri->segment(3);

      //pagination setup
      $this->load->library('pagination');
      $config['base_url'] = 'http://localhost/codeigniters/recipes/categories/show/' . $id;
      $config['total_rows'] = $this->recipe->num_rows_in_category();
      $config['per_page'] = 5;
      $config['num_links'] = 5;
      $config['uri_segment'] = 4;
      $this->pagination->initialize($config);

      $data['yield'] = 'categories/show';
      $data['category'] = $this->category->show();
      $data['categories'] = $this->category->all();
      $data['categorized'] = $this->recipe->showCategorized($id);
      $this->load->view('layouts/application', $data);
    }
    else {
      redirect('login', 'refresh');
    }

  }

  public function delete()
  {
    $id = $this->uri->segment(3);
    $this->category->delete($id);
    $this->session->set_flashdata('message', 'Kategoria została usunięta');
    redirect('categories/new', 'refresh');
  }


  // public function load_pagination()
  // {
  //   $this->load->library('pagination');
  //   $config['base_url'] = 'http://localhost/codeigniters/recipes/categories/show/' . $this->uri->segment(3);
  //   $config['total_rows'] = $this->recipe->num_rows_in_category();
  //   $config['per_page'] = 5;
  //   $config['num_links'] = 5;
  //   $this->pagination->initialize($config);
  // }

}
