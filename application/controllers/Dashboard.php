<?php

class Dashboard extends CI_Controller{

  public function index(){
    $this->load->view('templates/header');
    $this->load->view('dashboard');
    $this->load->view('templates/header');
  }

  public function add_post(){
    $this->load->view('dashboard');
  }
}

 ?>
