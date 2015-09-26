<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Recipes extends CI_Controller{


  public function index()
  {
    if($this->session->is_logged_in || $this->session->is_admin)
    {
      $this->load_pagination();
      $data['yield'] = 'recipes/index';
      $data['recipes'] = $this->recipe->all();
      $data['categories'] = $this->category->all();
      $this->load->view('layouts/application', $data);
    }
    else{
      redirect('login', 'refresh');
    }
  }

  public function add()
  {
    if($this->session->is_admin)
    {
      $data['yield'] = 'recipes/new';
      $data['categories'] = $this->category->all();
      $this->load->view('layouts/application', $data);
    }
    else{
      redirect('login', 'refresh');
    }
  }

  public function create()
  {
    $this->form_validation->set_rules('category_id', 'Category_id', 'required');
    $this->form_validation->set_rules('title', 'Title', 'trim|required');
    $this->form_validation->set_rules('ingredients', 'Ingredients', 'trim|required');
    $this->form_validation->set_rules('directions', 'Directions', 'trim|required');

    if($this->form_validation->run() === false)
    {
      //redirect('recipes/new', 'refresh');
      $this->add();
    }
    else {
      // $data = [
      //   'category' => $this->input->post('category'),
      //   'title' => $this->input->post('title'),
      //   'ingredients' => $this->input->post('ingredients'),
      //   'directions' => $this->input->post('directions'),
      //   'added' => $this->input->post('added')
      // ];


      $this->recipe->create();
      $this->session->set_flashdata('message', 'Nowy przepis został dodany');
      redirect('recipes', 'refresh');
    }
  }

  public function show()
  {
    if($this->session->is_logged_in || $this->session->is_admin)
    {
      $data['this_recipe_id'] = $this->uri->segment(3);
      $data['yield'] = 'recipes/show';
      $data['categories'] = $this->category->all();
      $data['recipe'] = $this->recipe->show();
      $data['comments'] = $this->comment->all();
      $this->load->view('layouts/application', $data);
    }else {
      redirect('login', 'refresh');
    }
  }

  public function delete()
  {
    $id = $this->uri->segment(3);
    $file_name = $this->uri->segment(4);

    $this->recipe->delete($id, $file_name);
    $this->session->set_flashdata('message', 'Przepis został usunięty');
    redirect('recipes', 'refresh');

  }

  public function load_pagination()
  {
    $this->load->library('pagination');
    $config['base_url'] = 'http://localhost/codeigniters/recipes/recipes/index/';
    $config['total_rows'] = $this->recipe->num_rows();
    $config['per_page'] = 5;
    $config['num_links'] = 5;
    $this->pagination->initialize($config);
  }

}
