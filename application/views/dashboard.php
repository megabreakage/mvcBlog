
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
       <h5 class="">Welcome <a href=""> <strong class="animated bounceIn"><?php echo $_SESSION['username']; ?></strong></a>!</h5>
       <hr>
       <li class="text-center">
         <?php echo anchor("dashboard/add_post", 'ADD BLOG POST') ?>
       </li>
       <hr>
     </div>
     <div class="col-md-9 columns pt">
       <h4 class="text-center animated bounceIn">READ OUR BLOGS</h4>

     </div>
   </div>
 </div>

 <?php
}
else{
  return redirect('blogs', 'refresh');
}

 ?>
