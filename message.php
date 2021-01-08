<?php 
      $messages = array(
        1=>"Successful",
        2=>"Failed",
        3=>"Invalid Username or Password",
        4=>"Please login to access this area",
        5=>"Already Exists",
        6=>"Passwords do not match",
        7=>"Number should be less than or equal to amount in database.",
        8=>"Proccess one successful proccess two failed",
        9=>"Already reported",
        10=>"Item or Quantity unavailable"
      );

      $message_id = isset($_GET['msg']) ? (int)$_GET['msg'] : 0;

      if ($message_id == 1) {
        echo '<div class="alert alert-success" role="alert"><b><h4>'.$messages[$message_id].'</h4></b></div>';
      }elseif ($message_id == 2) {
        echo '<div class="alert alert-danger" role="alert"><b><h4>'.$messages[$message_id].'</h4></b></div>';
      }elseif ($message_id == 3) {
        echo '<div class="alert alert-warning" role="alert"><b><h4>'.$messages[$message_id].'</h4></b></div>';
      }elseif ($message_id == 4) {
        echo '<div class="alert alert-warning" role="alert"><b><h4>'.$messages[$message_id].'</h4></b></div>';
      }elseif ($message_id == 5) {
        echo '<div class="alert alert-info" role="alert"><b><h4>'.$messages[$message_id].'</h4></b></div>';
      }elseif ($message_id == 6) {
        echo '<div class="alert alert-warning" role="alert"><b><h4>'.$messages[$message_id].'</h4></b></div>';
      }elseif ($message_id == 7) {
        echo '<div class="alert alert-info" role="alert"><b><h4>'.$messages[$message_id].'</h4></b></div>';
      }elseif ($message_id == 8) {
        echo '<div class="alert alert-info" role="alert"><b><h4>'.$messages[$message_id].'</h4></b></div>';
      }elseif ($message_id == 9) {
        echo '<div class="alert alert-info" role="alert"><b><h4>'.$messages[$message_id].'</h4></b></div>';
      }elseif ($message_id == 10) {
        echo '<div class="alert alert-danger" role="alert"><b><h4>'.$messages[$message_id].'</h4></b></div>';
      }
    ?>