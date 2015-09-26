<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Comments extends CI_Controller{

  public function create()
  {
    $recipe_id = $this->input->post('recipe_id');
    $this->form_validation->set_rules('body', 'Body', 'trim|required');
    if($this->form_validation->run() === false)
    {
       redirect('recipes/show/' . $recipe_id, 'refresh');
    }
    else {

      $data = [
        'recipe_id' => $this->input->post('recipe_id'),
        'username' => $this->input->post('username'),
        'body' => $this->input->post('body'),
        'added' => $this->input->post('added')
      ];


      $this->comment->create($data);
      redirect('recipes/show/' . $recipe_id, 'refresh');
    }
  }

  public function delete()
  {
    $recipe_id = $this->input->post('recipe_id');
    $id = $this->uri->segment(3);
    $this->comment->delete($id);
    redirect('recipes', 'refresh');
  }
}
