

<?php
if (isset($_SESSION['user_loggedin'])) { ?>

  <style media="screen">

  li{
    display: inline-block;
    margin: 5px;
  }
  .postMenu{
    padding: 0;
  }

  </style>
  <div class="col-md-12 sticky-top navTop">
  </div>

 <div class="col-md-10 offset-md-1">
   <h1 class="text-center animated bounceInDown">Dashboard</h1>

   <div class="row">
     <div class="col-md-2">

     </div>
     <div class="col-md-2 sideBar">
       <h5 class="pt animated bounceInLeft"><small>Welcome</small> <a href=""> <strong class="animated bounceIn"><?php echo $_SESSION['username']; ?></strong></a>!</h5>
       <hr>
       <li class="text-center animated bounceInLeft">
         <i class="fas fa-caret-left"></i> <?php echo anchor("dashboard/add_post", 'ADD BLOG POST') ?>
       </li>
       <hr>
       <li class="text-center animated bounceInLeft">
         <i class="fas fa-caret-left"></i> <?php echo anchor("dashboard", 'VIEW BLOGS') ?>
       </li>
       <hr>
     </div>
     <?php if(isset($_SESSION['success'])): ?>
       <div class="col-md-6 col-md-offset-3 col-sm-12 alert alert-success text-center">
         <?php echo $_SESSION['success']; ?>
       </div>
     <?php endif ?>

     <div class="col-md-10 columns pt">
       <h4 class="text-center animated bounceInDown">READ OUR BLOGS</h4>

       <div class="col-md-12 pt">

         <div class="col-md-12 pb">
           <h5 class="animated bounceInRight"><strong><?php echo $post['post_title']; ?></strong></h5>
         </div>
         <div class="row">
           <div class="col-md-12">
             <p class="text-right animated bounceInRight">
               <small> <em><?php echo $post['date_created']; ?></em> </small>
             </p>
           </div>
           <div class="col-md-3">
             <img src="<?php echo $post['post_image']; ?>" alt="photo">
           </div>
           <div class="col-md-9 animated fadeIn">
             <?php echo $post['post_description']; ?>
             <p class="text-right animated bounceInRight"><em>by </em>
               <small><?php echo $post['published_by']; ?></small>
             </p>
           </div>
         </div>
         <div class="col-md-12 postMenu">
           <?php if ($_SESSION['user_role_id'] == 1): ?>
             <ul class="menu text-right">
               <li><?php echo anchor("dashboard/edit_post/{$post['post_id']}", 'EDIT', ['class'=>'menu-item']); ?></li>
               <li><?php echo anchor("dashboard/delete_post/{$post['post_id']}", 'DELETE', ['class'=>'menu-item']); ?></li>
             </ul>
           <?php endif; ?>
         </div>
         <hr>

       </div>
     </div>

   </div>
 </div>

 <?php
}
else{
  return redirect('blogs', 'refresh');
}

 ?>
