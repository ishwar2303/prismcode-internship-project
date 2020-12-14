<?php
   
   session_start();
   require_once('connection.php');   //connection establish

    session_destroy();
    
   session_start();
if(isset($_POST['pass']) && isset($_POST['email']))
{
      $password = $_POST['pass'];
      $email = $_POST['email'];

      $password = mysqli_real_escape_string($conn,$password);
      $email = mysqli_real_escape_string($conn,$email);
   if(!empty($password) && !empty($email))
   {
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
         else {
            $sql = "SELECT * FROM registered_admin WHERE admin_email='$email'";
            $result = mysqli_query($conn,$sql);
            if($result->num_rows == 1)
               $message = 'Password incorrect!';
            else $message = 'Not Registered!';
            echo $message;
         }
         
   }
      else 
      {
        echo "Something went wrong!";
      
      }
}

else echo "Something went wrong!";
   
   

?>