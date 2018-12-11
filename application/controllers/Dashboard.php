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

  public function publish_post(){

    $data = $this->input->post();

    $config = array(
      'upload_path' => './uploads',
      'allowed_types'=> 'gif|png|jpg|jpeg'
    );
    $this->load->library('upload', $config);

    $this->form_validation->set_rules('post_title', 'Post title', 'required');
    $this->form_validation->set_rules('post_description', 'Post description', 'required');
    $this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');//globally changes error delimiters

    if ($this->form_validation->run() && $this->upload->do_upload('userfile')) {
      $data = $this->input->post();

      $info = $this->upload->data();
      $image_path = base_url("uploads/".$info['raw_name'].$info['file_ext']);
      $data['post_image'] = $image_path;

      unset($data['submit']);

      $publish_post = $this->queries->insert_post($data);

      if ($publish_post) {
        $success = $this->session->set_flashdata('success', 'Post is Successfully Published!');
        return redirect('dashboard/add_post', $success);
      } else {
        $error = $this->session->set_flashdata('error', 'Post Failed to Publish!');
        return redirect('dashboard/add_post', $error);
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

    $config = array(
      'upload_path' => './uploads',
      'allowed_types'=> 'gif|png|jpg|jpeg'
    );
    $this->load->library('upload', $config);

    $this->form_validation->set_rules('post_title', 'Post title', 'required');
    $this->form_validation->set_rules('post_description', 'Post description', 'required');
    $this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');//globally changes error delimiters

    if ($this->form_validation->run() && $this->upload->do_upload('userfile')) {
      $data = $this->input->post();
      $info = $this->upload->data();
      $image_path = base_url("uploads/".$info['raw_name'].$info['file_ext']);
      $data['post_image'] = $image_path;
      $data['post_id'] = $post_id;

      unset($data['submit']);

      $publish_post = $this->queries->update_post($data);

      if ($publish_post) {
        $this->session->set_flashdata("success", 'Post is Successfully Updated!');
        return redirect("dashboard", 'refresh');
      } else {
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

  public function delete_all_posts(){
  }
}

?>
