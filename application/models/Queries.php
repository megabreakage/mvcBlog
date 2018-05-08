<?php
class Queries extends CI_Model{

  public function __construct(){
    parent::__construct();
  }

  public function register($data){
     return $this->db->insert('tbl_users', $data);
  }

  public function login($data){
    $query = $this->db->get_where('tbl_users', $data);
    return $query->row();

  }

  public function insert_post($data){
    $query = $this->db->insert('tbl_posts', $data);
  }

} ?>
