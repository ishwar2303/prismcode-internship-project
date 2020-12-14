<?php
   session_start();
   require_once('connection.php');
   if(isset($_SESSION['email']) && isset($_SESSION['name']))
    {
    	  $email = $_SESSION['email'];
        $name = $_SESSION['name']; 
        
    }
    else {
    	header('location: admin_logout.php');
         }
     
     if(isset($_POST['exam_id']))
      $var = $_POST['exam_id'];
     else $var = $_GET['exam_id'];

     if(!empty($var)){
     $sql = "DELETE FROM quizes WHERE quiz_id='$var'";
     mysqli_query($conn,$sql);

     $sql = "DELETE FROM question_bank WHERE quiz_id='$var'";
     mysqli_query($conn,$sql);

     $sql = "DELETE FROM attempts WHERE quiz_id='$var'";
     mysqli_query($conn,$sql);

     $sql = "DELETE FROM feedback WHERE quiz_id='$var'";
     mysqli_query($conn,$sql);
    
     $_SESSION['message'] = 'Quiz Deleted Successfully';
     $_SESSION['color'] = '#27ae60';
     header('location: admin_dashboard.php');
   }
   else{

     $_SESSION['message'] = 'Something Went Wrong!';
     $_SESSION['color'] = '#e74c3cc';   
     header('location: admin_dashboard.php');
   }
?>