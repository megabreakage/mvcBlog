

 <div class="container">


   <h2 class="text-center FadeIn">Dashboard</h2>

   <?php
      echo "<pre>";
          print_r($_SESSION['username']);
      echo "<pre>";

      echo form_open('blogs/logout');
      echo form_submit(['name'=>'submit', 'value'=>'SIGN OUT', 'class'=>'btn buttons']);
      echo form_close();

    ?>
 </div>
