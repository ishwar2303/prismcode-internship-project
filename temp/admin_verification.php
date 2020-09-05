<?php
   
   session_start();
   require_once('connection.php');   //connection establish

    
   
if(isset($_GET['pass']) && isset($_GET['email']))
{
      $password = $_GET['pass'];
      $email = $_GET['email'];
    
   if(!empty($password) && !empty($email))
   {
         $sql = "SELECT * FROM admin_user WHERE email='$email' AND password='$password'";
         $result = mysqli_query($conn,$sql);
         
         if($result->num_rows == 1)
         {
            $row = $result->fetch_assoc();
            $_SESSION['name'] = $row['full_name'];
            $_SESSION['email'] = $email;
            $_SESSION['login_time'] = time();
            header('location: admin_dashboard.php');
         }
         else header('location: admin_login.php');
         
   }
      else 
      {
        
      header('location: admin_login.php');
      
      }
}

else header('location: admin_login.php');
   
   

?>