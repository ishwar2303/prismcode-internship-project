<?php

    session_start();
    require_once('connection.php');



  if(isset($_POST['subject']) && isset($_POST['message']))
  {
        $sql ="INSERT INTO `message` (`message_id`, `subject`, `message`, `email`, `timestamp`) VALUES (NULL, '$_POST[subject]', '$_POST[message]', '$_SESSION[email]', current_timestamp())";
    
        mysqli_query($conn,$sql);
         echo "<script>alert('message sent successfully')</script>";
        header('location: admin_dashboard.php');

  }
  else header('location: admin_logout.php'); 
?>