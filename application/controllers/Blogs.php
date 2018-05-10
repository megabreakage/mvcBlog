<?php /**
 *
 */
class Blogs extends CI_Controller {

  public function index()  {
    $this->load->view('templates/header');
    $this->load->view('blogs');
    $this->load->view('templates/footer');
  }

  public function login(){
    $this->load->view('templates/header');
    // $this->load->view('blogs');
    $this->load->view('templates/footer');

    $this->load->form_validation->set_rules('username', 'Username', 'required');
    $this->load->form_validation->set_rules('password', 'Password', 'required');

    if ($this->form_validation->run()) {
      // execute the following statement if validation is successful
      $data = $this->input->post();
      unset($data['submit']);

      $user = $this->queries->login($data);
      if ($user) {
        // collect session data then redirect to new page
        $_SESSION['user_loggedin'] = TRUE;
        $user_data = array(
          'user_id' => $user->user_id,
          'username' => $user->username,
          'email' => $user->email,
          'user_role_id' => $user->user_role_id,
          'cellphone' => $user->cellphone
         );
        $this->session->set_userdata($user_data);
        return redirect('dashboard');

      } else {
        $this->session->set_flashdata('error', 'Invalid username or password');
        return redirect ('blogs', 'refresh');
      }

    } else{
      return redirect('blogs', 'refresh');
    }

  }

  public function register(){
    $this->load->view('templates/header');
    // $this->load->view('blogs');
    $this->load->view('templates/footer');

    $this->load->form_validation->set_rules('username', 'Username', 'required');
    $this->load->form_validation->set_rules('password', 'Password', 'required|min_length[3]');
    $this->load->form_validation->set_rules('email', 'email', 'required');
    $this->load->form_validation->set_rules('cellphone', 'Cellphone', 'required|min_length[10]|max_length[10]');
    $this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');//globally changes error delimiters

    // checks for the value of form_validation returned
    if ($this->form_validation->run()) {
      // if the value is TRUE or 1, following statements executes
      $data = $this->input->post(); //collects user input data into $data
      unset($data['submit']); //removes the value of submit from form data

      // test print data submitted
        // echo '<pre>';
        //   print_r($data);
        // echo '</pre>';
        // exit();

      $register = $this->queries->register($data); //creates a variable and assign it the return value of function 'register'

      if ($register) {
        // if the value is TRUE or 1, following statements executes
        $this->session->set_flashdata('reg_success', 'Successfully Registered');
      } else {
        // if the value is FALSE or 0, following statements executes
        $this->session->set_flashdata('reg_error', 'Registration Failed');
      }
      return redirect('blogs', 'refresh');

    } else {
      // if the value is FALSE or 0, following statements executes
      return redirect('blogs', 'refresh');
    }

  }

  function logout(){
    // unset($_SESSION['user_loggedin']);
    $this->session->sess_destroy();
    return redirect('blogs', 'refresh');
  }
}
 ?>
