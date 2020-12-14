<?php
   
   session_start();
   require_once('connection.php');   

    
   session_destroy();
   session_start();
if(isset($_POST['name']) && isset($_POST['email']) && isset($_POST['regNo']))
{
      $name = $_POST['name'];
      $email = $_POST['email'];
      $regNo = $_POST['regNo'];

      $name = mysqli_real_escape_string($conn,$name);
      $email = mysqli_real_escape_string($conn,$email);
      $regNo = mysqli_real_escape_string($conn,$regNo);
      $name = strip_tags($name);
      $email = strip_tags($email);
      $regNo = strip_tags($regNo);
   if(!empty($name) && !empty($email))
   {     
         $_SESSION['name'] = $name;
         $_SESSION['email'] = $email;
         $_SESSION['regNo'] = $regNo;
         $_SESSION['student_login_time'] = time();
         ?>
         <script type="text/javascript">location.href='select_exam.php';</script>
         <?php
   }
      else 
      {
        echo 'Something went Wrong!';
      }
}

else echo 'Something went Wrong!';
   
   

?>