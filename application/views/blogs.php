
<style media="screen">
  body{
    background-image: url("<?php echo base_url() ?>assets/images/desk.jpg");
    background-repeat: no-repeat;
    background-attachment: fixed;
    background-size:cover;
    background-position: center;
  }
</style>
<div class="container pt pb">
  <div class="title pt pb">
    <h1 class="text-center">PHP MVC BLOG</h1>
  </div>

<!-- Sign in Tab -->
  <div class="col-md-6 col-sm-12 login pt">
    <h3>SIGN IN</h3>

    <?php echo validation_errors('<div class="alert alert-danger">', '</div>'); ?>

    <?php if(isset($_SESSION['error'])): ?>
      <div class="col-md-6 col-md-offset-3 col-sm-12 alert alert-danger text-center">
        <?php echo $_SESSION['error']; ?>
      </div>
    <?php endif ?>

    <?php if(isset($_SESSION['success'])): ?>
      <div class="col-md-6 col-md-offset-3 col-sm-12 alert alert-success text-center">
        <?php echo $_SESSION['success']; ?>
      </div>
    <?php endif ?>

    <?php
      // calls method login in controller 'Blogs'
      echo form_open('blogs/login');
    ?>
    <div class="form-group col-md-10 col-sm-12 divInputs ">
      <?php echo form_input(['name'=>'username', 'placeholder'=>'Username', 'class'=>'form-control inputs']); ?>
    </div>
    <div class="form-group col-md-10 col-sm-12 divInputs ">
      <?php echo form_password(['name'=>'password', 'placeholder'=>'Password', 'class'=>'form-control inputs']); ?>
    </div>
    <div class="form-group col-md-10 col-sm-12 divInputs">
      <?php echo form_submit(['name'=>'submit', 'value'=>'SIGN IN', 'class'=>'btn buttons']); ?>
      <?php echo form_reset(['name'=>'submit', 'value'=>'RESET', 'class'=>'btn buttons']); ?>
    </div>
    <?php echo form_close(); //ends the login form operatuons?>
  </div>

<!-- Registration Tab -->
  <div class="col-md-6 col-sm-12 register pt">
    <h3>REGISTER</h3>

    <?php echo validation_errors('<div class="alert alert-danger">', '</div>'); ?>

    <?php if(isset($_SESSION['reg_error'])): ?>
      <div class="col-md-6 col-md-offset-3 col-sm-12 alert alert-danger text-center">
        <?php echo $_SESSION['reg_error']; ?>
      </div>
    <?php endif ?>

    <?php if(isset($_SESSION['reg_success'])): ?>
      <div class="col-md-6 col-md-offset-3 col-sm-12 alert alert-success text-center">
        <?php echo $_SESSION['reg_success']; ?>
      </div>
    <?php endif ?>

    <?php
      // calls method register in controller 'Blogs'
      echo form_open('blogs/register');
      // creates and assigns default user role
      $data = array('user_role_id' => '2' );
      echo form_hidden($data);
    ?>
    <!-- user input fields and validation errors text respectively -->
    <div class="form-group col-md-10 col-sm-12 divInputs ">
      <?php echo form_input(['name'=>'username', 'placeholder'=>'Username', 'class'=>'form-control inputs']); ?>
      <?php echo form_error('Username', '<p class="alert alert-danger">','</p>'); ?>
    </div>
    <div class="form-group col-md-10 col-sm-12 divInputs ">
      <?php echo form_password(['name'=>'password', 'placeholder'=>'Password', 'class'=>'form-control inputs']); ?>
      <?php echo form_error('Password', '<p class="alert alert-danger">','</p>'); ?>
    </div>
    <div class="form-group col-md-10 col-sm-12 divInputs ">
      <?php echo form_input(['name'=>'email', 'type'=>'email', 'placeholder'=>'email', 'class'=>'form-control inputs']); ?>
      <?php echo form_error('email', '<p class="alert alert-danger">','</p>'); ?>
    </div>
    <div class="form-group col-md-10 col-sm-12 divInputs ">
      <?php echo form_input(['name'=>'cellphone', 'placeholder'=>'Cellpone', 'class'=>'form-control inputs']); ?>
      <?php echo form_error('Cellphone', '<p class="alert alert-danger">','</p>'); ?>
    </div>
    <div class="form-group col-md-10 col-sm-12 divInputs">
      <?php echo form_submit(['name'=>'submit', 'value'=>'SIGN UP', 'class'=>'btn buttons']); ?>
      <?php echo form_reset(['name'=>'submit', 'value'=>'RESET', 'class'=>'btn buttons']); ?>
    </div>
    <?php echo form_close(); //ends the register form operation ?>

  </div>
</div>
