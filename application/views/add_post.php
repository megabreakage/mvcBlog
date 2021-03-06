
<?php
if (isset($_SESSION['user_loggedin'])) { ?>

  <style media="screen">
    li{
      list-style-type: none;
    }
  </style>

 <div class="container">
   <h1 class="text-center animated bounceInDown pt">Dashboard</h1>

   <div class="row">
     <div class="col-md-3">

     </div>
     <div class="col-md-2 sideBar">
       <h5 class="pt"><small>Welcome</small> <a href=""> <strong class="animated bounceIn"><?php echo $_SESSION['username']; ?></strong></a>!</h5>
       <hr>
       <i class="fas fa-caret-left"></i> <?php echo anchor('dashboard', 'VIEW POSTS') ?>
       <hr>
     </div>
     <div class="col-md-9 columns pt">
       <h4 class="text-center animated bounceIn">ADD NEW POST</h4>

       <?php echo validation_errors('<div class="alert alert-danger">', '</div>'); ?>

       <div class="row">
         <?php if(isset($_SESSION['error'])): ?>
           <div class="col-md-6 col-md-offset-3 col-sm-12 alert alert-danger text-center">
             <?php echo $_SESSION['error']; ?>
           </div>
         <?php endif ?>
       </div>

       <?php
       // form multipart allows posting of data that is in different forms e.g text and multimedia
       echo form_open_multipart('dashboard/publish_post', ['class'=>'form-horizontal']); ?>

          <div class="col-md-12 divInputs form-group">
            <label>Title</label>
            <?php
              echo form_input(['name'=>'post_title', 'placeholder'=>'Title', 'class'=>'form-control inputs', 'value'=>set_value('post_title') ]);
              echo form_error('Post Title', '<p class="alert alert-danger">','</p>');
            ?>
          </div>
          <div class="col-md-12 divInputs form-group">
            <label>Description</label>
            <?php
              echo form_textarea(['name'=>'post_description', 'placeholder'=>'Description', 'class'=>'form-control', 'value'=>set_value('post_description') ]);
              echo form_error('Post Description', '<p class="alert alert-danger">','</p>');
            ?>
          </div>
          <div class="col-md-12 divInputs form-group">
            <?php
              echo form_upload(['name'=>'userfile', 'value'=>'Save', 'class'=>'form-control btn btn-primary']);
              echo form_error('userfile', '<p class="alert alert-danger">','</p>');
             ?>
          </div>
          <div class="col-md-12 divInputs form-group">
            <?php echo form_submit(['name'=>'submit', 'value'=>'PUBLISH POST', 'class'=>'btn buttons']) ?>
          </div>

        <?php echo form_close(); ?>
     </div>
   </div>
 </div>

 <?php
}
else{
  return redirect('blogs', 'refresh');
}

 ?>
