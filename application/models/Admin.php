<?php

class Admin extends CI_Model{

  public function all()
  {
    $admins = $this->db->get('admins');
    return $admins->result();
  }

  public function register($data)
  {
    $insert = $this->db->insert('admins', $data);
    return $insert;
  }

  public function authenticate($username, $password){
  $query = $this->db->where('username', $username)
                    ->where('password', hash_password($password))
                    ->limit(1)
                    ->get('admins');

  if($query->num_rows() == 1)
  {
    return $query->row();
  }
  else return false;
}

 public function alreadyAdmin()
 {
   $query = $this->db->get('admins');
   if($query->num_rows() > 0)
   {
     return true;
   }
   else return false;

 }

}
