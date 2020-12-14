<?php 
  require_once('connection.php');
  session_start();
  if(isset($_GET['quizID']))
   {
    	 $quizID = $_GET['quizID'];

    	 $sql = "SELECT key_access FROM quizes WHERE quiz_id='$quizID'";
          
         $result = mysqli_query($conn,$sql);
          
      if($result->num_rows==1)
      {
          $row = $result->fetch_assoc();
          if($row['key_access'])
          	$toggle = 0;
          else $toggle = 1;
          $sql = "UPDATE quizes SET key_access='$toggle' WHERE quiz_id='$quizID'";
          mysqli_query($conn,$sql);
          if($toggle == 0){
            $_SESSION['message'] = 'Key Secured';
            $_SESSION['color'] = '#27ae60';
          }
          else{
            $_SESSION['message'] = 'Key Revealed';
            $_SESSION['color'] = '#f39c12';
          }
          header('location: public_access.php');
      }
      else{
            $_SESSION['message'] = 'Something Went Wrong!';
            $_SESSION['color'] = '#e74c3c';
          header('location: public_access.php');
      }
  }
  else {
            $_SESSION['message'] = 'Something Went Wrong!';
            $_SESSION['color'] = '#e74c3c';
          header('location: public_access.php');
  }
?>