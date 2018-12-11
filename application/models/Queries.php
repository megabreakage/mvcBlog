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
    return $this->db->insert('tbl_posts', $data);
  }

  public function get_posts(){
    $query = $this->db->get('tbl_posts');
    return $query->result_array();
  }

  public function get_single_post($post_id){
    $query =  $this->db->get_where('tbl_posts', array('post_id'=>$post_id));
    return $query->row_array(); //returns results as a row and not stdClass object
  }

  public function update_post($data){
    $query = $this->db->update('tbl_posts', $data, array('post_id' => $data['post_id'] ));
    return $query;
  }

  public function delete_post($post_id){
    return $this->db->delete('tbl_posts', array('post_id'=> $post_id));
  }

} ?>
