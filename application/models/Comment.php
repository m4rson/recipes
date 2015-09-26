<?php

class Comment extends CI_Model{

  public function all()
  {
    $recipe_id = $this->uri->segment(3);
    $comments = $this->db->order_by('id', 'DESC')
                         ->where('recipe_id', $recipe_id)
                         ->get('comments');
    return $comments->result();
  }

  public function create($data)
  {
    $insert = $this->db->insert('comments', $data);
    return $insert;
  }

  public function delete($id)
  {
    $this->db->where('id', $id)->delete('comments');
  }
}
