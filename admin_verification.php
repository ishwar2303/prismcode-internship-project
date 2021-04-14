<?php
   
   session_start();
   require_once('connection.php');   //connection establish

   session_destroy();
    
   session_start();
   require_once('middleware.php');

if(isset($_POST['pass']) && isset($_POST['email']))
{
      $password = cleanInput($_POST['pass']);
      $email = cleanInput($_POST['email']);

   if($email == ''){
      echo '<i class="fas fa-exclamation-circle"></i> E-mail required';
      return;
   }
   else if(!emailValidation($email)){
      echo '<i class="fas fa-exclamation-circle"></i>Invalid E-mail';
      return;
   }
   else{
      $sql = "SELECT * FROM registered_admin WHERE admin_email='$email'";
      $result = mysqli_query($conn,$sql);
      if ($result->num_rows == 0) {
          echo '<i class="fas fa-exclamation-circle"></i> Not Registered';
          return;
      }
   }
   if($password == ''){
      echo '<i class="fas fa-exclamation-circle"></i> Password required';
      return;
   }
   else{
      $sql = "SELECT * FROM registered_admin WHERE admin_email='$email' AND admin_password='$password'";
   
      $result = mysqli_query($conn,$sql);
      $row = $result->fetch_assoc();
      if($result->num_rows == 1)
      {
         $_SESSION['name'] = $row['first_name']." ".$row['last_name'];
         $_SESSION['email'] = $email;
         $_SESSION['admin_id'] = $row['admin_id'];
         $_SESSION['login_time'] = time();
         ?>
         <script type="text/javascript">location.href='admin_dashboard.php';</script>
         <?php
      }
      else{
         echo '<i class="fas fa-exclamation-circle"></i> Password incorrect';
         return;
      }
   }
   
}

else echo '<i class="fas fa-exclamation-circle"></i> Something went wrong!';
   
   

?>