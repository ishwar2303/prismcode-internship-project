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
      return;
         }
   if(isset($_GET['quizID']))
   {
    $quizID = $_GET['quizID'];

    	 $sql = "SELECT quiz_name, is_active FROM quizes WHERE quiz_id='$quizID'";
          
          $result = mysqli_query($conn,$sql);
          
      if($result->num_rows==1)
      {
          $row = $result->fetch_assoc();
          $quiz_name = $row['quiz_name'];
          if($row['is_active'])
          	$toggle = 0;
          else $toggle = 1;
          $sql = "UPDATE quizes SET is_active='$toggle' WHERE quiz_id='$quizID'";
          mysqli_query($conn,$sql);
          if($toggle == 0){
            $_SESSION['success_msg'] = 'Quiz : '.$quiz_name.'<br/> Status : Inactive';
            $_SESSION['message'] = 'Inactive';
            $_SESSION['color'] = '#f39c12';
          }
          else{
            $_SESSION['success_msg'] = 'Quiz : '.$quiz_name.'<br/> Status : Active';
            $_SESSION['message'] = 'Active';
            $_SESSION['color'] = '#68a030';
          }
          header('location: exam_status.php');
      }
      else{
            $_SESSION['message'] = 'Something Went Wrong!';
            $_SESSION['color'] = '#cd201f';
          header('location: exam_status.php');
      }
  }
  else {
            $_SESSION['message'] = 'Something Went Wrong!';
            $_SESSION['color'] = '#cd201f';
          header('location: exam_status.php');
  }
?>
