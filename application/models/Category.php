<?php

class Category extends CI_Model{

  public function all()
  {
    $categories = $this->db->get('categories');
    return $categories->result();
  }

  public function create($data)
  {
    $insert = $this->db->insert('categories', $data);
    return $insert;
  }

  public function show($id = null)
  {
    $id = $this->uri->segment(3);
    $category = $this->db->where('id', $id)
                       ->limit(1)
                       ->get('categories');
    return $category->row();
  }

  public function delete($id)
  {
    $this->db->where('id', $id)->delete('categories');
    $this->db->where('category_id', $id)->delete('recipes');
  }
}
