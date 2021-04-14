<?php
   
   session_start();
   require_once('connection.php');   

    
   session_destroy();
   session_start();
   require_once('middleware.php');
if(isset($_POST['name']) && isset($_POST['email']) && isset($_POST['regNo']))
{
      $name = cleanInput($_POST['name']);
      $email = cleanInput($_POST['email']);
      $regNo = cleanInput($_POST['regNo']);

   if($name == ''){

         echo '<i class="fas fa-exclamation-circle"></i> Name required';
         return;
   }
   else if(!alphaSpaceValidation($name)){
      echo '<i class="fas fa-exclamation-circle"></i> Invalid Name';
      return;
   }
   if($regNo != '' && !alphaNumericSpaceValidation($regNo)){
      echo '<i class="fas fa-exclamation-circle"></i> Invalid Registration/Roll No';
      return;
   }
   if($email != '')
   {     
         if(!emailValidation($email)){
               echo '<i class="fas fa-exclamation-circle"></i> Invalid E-mail';
               return;
         }
         $_SESSION['name'] = $name;
         $_SESSION['email'] = $email;
         $_SESSION['regNo'] = $regNo;
         $_SESSION['student_login_time'] = time();
         ?>
         <script type="text/javascript">location.href='select_exam.php';</script>
         <?php
   }
   else{
         echo '<i class="fas fa-exclamation-circle"></i> E-mail required';
         return;
   }
}

else echo '<i class="fas fa-exclamation-circle"></i> Something went Wrong';
   
   

?>