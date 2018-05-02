<?php

class Dashboard extends CI_Controller{

  function index(){
    $this->load->view('templates/header');
    $this->load->view('dashboard');
    $this->load->view('templates/header');
  }
}

 ?>
