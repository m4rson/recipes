<?php

class Recipe extends CI_Model{

  public function all()
  {
    $recipes = $this->db->order_by('id', 'DESC')
                        ->get('recipes', 5, $this->uri->segment(3));
    return $recipes->result();
  }

  public function num_rows()
  {
    $rows = $this->db->get('recipes');
    return $rows->num_rows();
  }

  public function num_rows_in_category()
  {
    $id = $this->uri->segment(3);
    $rows = $this->db->where('category_id', $id)
                     ->get('recipes');
    return $rows->num_rows();
  }

  public function create()
  {
    $config = [
      'allowed_types' => 'jpg|gif|png|jpeg',
      'upload_path' => UPLOAD_PATH
    ];
    $this->load->library('upload', $config);
     $this->upload->do_upload();
     $image = $this->upload->data();
      $data = [
            'category_id' => $this->input->post('category_id'),
            'userfile' => $this->upload->data('file_name'),
            'title' => $this->input->post('title'),
            'ingredients' => $this->input->post('ingredients'),
            'directions' => $this->input->post('directions'),
            'added' => $this->input->post('added')
        ];
    $insert = $this->db->insert('recipes', $data);
    return $insert;
  }

  public function show($id = null)
  {
    $id = $this->uri->segment(3);
    $recipe = $this->db->where('id', $id)
                       ->limit(1)
                       ->get('recipes');
    return $recipe->row();
  }

  public function showCategorized($id = null)
  {
    $id = $this->uri->segment(3);
    $offset = $this->uri->segment(4, 0);
    $categorized = $this->db->order_by('id', 'DESC')
                            ->where('category_id', $id)
                            ->get('recipes', 5 , $offset);
    return $categorized->result();
  }

  public function delete($id, $file_name)
  {
     $this->db->where('id', $id)->delete('recipes');
     $this->db->where('recipe_id', $id)->delete('comments');
     unlink(UPLOAD_PATH . '/' . $file_name);
  }
}
