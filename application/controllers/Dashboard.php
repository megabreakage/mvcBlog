<?php

class Dashboard extends CI_Controller {

  public function index(){

    $data['records'] = $this->queries->get_posts();

    $this->load->view('templates/header');
    $this->load->view('dashboard', $data);
    $this->load->view('templates/footer');
  }

  public function add_post(){
    $this->load->view('templates/header');
    $this->load->view('add_post');
    $this->load->view('templates/footer');
  }

// method to publish/insert post in database
  public function publish_post(){

    // creates and array with data for image uploads paths and format types allowed
    $config = array(
      'upload_path' => './uploads',
      'allowed_types'=> 'gif|png|jpg|jpeg'
    );
    // load upload library and pass image upload data
    $this->load->library('upload', $config);

    // initialize forn validation
    $this->form_validation->set_rules('post_title', 'Post title', 'required');
    $this->form_validation->set_rules('post_description', 'Post description', 'required');
    $this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');//globally changes error delimiters

    if ($this->form_validation->run() && $this->upload->do_upload('userfile')) {
      $data = $this->input->post();
      $info = $this->upload->data();// collects information about the image
      $image_path = base_url("uploads/".$info['raw_name'].$info['file_ext']);
      $data['post_image'] = $image_path;

      unset($data['submit']);//removes submit value from post data

      // test print data submitted
        // echo '<pre>';
        //   print_r($data);
        // echo '</pre>';
        // exit();

      // call and pass $data to insert_post() in model Queries and assign return value to new variable
      $publish_post = $this->queries->insert_post($data);

      if ($publish_post) {
        // if the retun value if 1 or TRUE execute the following statements
        $this->session->set_flashdata('success', 'Post is Successfully Published!');
      } else {
        //if the retun value if 0 or FALSE execute the following statements
        $this->session->set_flashdata('error', 'Post Failed to Publish!');
      }
      return redirect('dashboard/add_post', 'refresh');

    } else {
      return redirect('dashboard/add_post', 'refresh');
    }

  }

// view single post
  public function post($post_id){

    $data['post'] = $this->queries->get_single_post($post_id);

    $this->load->view('templates/header');
    $this->load->view('view_post', $data);
    $this->load->view('templates/footer');

  }

// edits post
  public function edit_post($post_id){

    $data['post'] = $this->queries->get_single_post($post_id);

    $this->load->view('templates/header');
    $this->load->view('edit_post', $data);
    $this->load->view('templates/footer');

  }


// updates posts
  public function update_post($post_id){

    // creates and array with data for image uploads paths and format types allowed
    $config = array(
      'upload_path' => './uploads',
      'allowed_types'=> 'gif|png|jpg|jpeg'
    );
    // load upload library and pass image upload data
    $this->load->library('upload', $config);

    // initialize forn validation
    $this->form_validation->set_rules('post_title', 'Post title', 'required');
    $this->form_validation->set_rules('post_description', 'Post description', 'required');
    $this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');//globally changes error delimiters

    if ($this->form_validation->run() && $this->upload->do_upload('userfile')) {
      $data = $this->input->post();
      $info = $this->upload->data();// collects information about the image
      $image_path = base_url("uploads/".$info['raw_name'].$info['file_ext']);
      $data['post_image'] = $image_path;
      $data['post_id'] = $post_id;

      unset($data['submit']);//removes submit value from post data

      // test print data submitted
        // echo '<pre>';
        //   print_r($data);
        // echo '</pre>';
        // exit();

      // call and pass $data to insert_post() in model Queries and assign return value to new variable
      $publish_post = $this->queries->update_post($data);

      if ($publish_post) {
        // if the retun value if 1 or TRUE execute the following statements
        $this->session->set_flashdata("success", 'Post is Successfully Updated!');
        return redirect("dashboard", 'refresh');
      } else {
        //if the retun value if 0 or FALSE execute the following statements
        $this->session->set_flashdata("error", 'Post Failed to Update!');
        return redirect("dashboard/edit_post/{$data['post_id']}", 'refresh');
      }

    } else {
      return redirect("dashboard/add_post", 'refresh');
    }
  }

  public function delete_post($post_id){

    $delete_post = $this->queries->delete_post($post_id);

    if ($delete_post) {
      $this->session->set_flashdata("success", 'Post is Successfully Deleted!');
    } else {
      $this->session->set_flashdata("success", 'Post is Failed to Delete!');
    }
    return redirect("dashboard", 'refresh');

  }

// deletes post_title
  public function delete_all_posts(){
  }
} ?>
