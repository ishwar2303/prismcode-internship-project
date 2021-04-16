<?php
   session_start();
   require_once('connection.php');
   require_once('middleware.php');
   if(isset($_SESSION['email']) && isset($_SESSION['name']))
    {
    	  $email = $_SESSION['email'];
        $name = $_SESSION['name']; 
        
    }
    else {
    	header('location: admin_logout.php');
         }
     if(isset($_REQUEST['exam_id'])){
        $var = cleanInput($_REQUEST['exam_id']);
        $sql = "SELECT quiz_name FROM quizes WHERE quiz_id='$var'";
        $result = $conn->query($sql);
        if($result->num_rows == 1){
          $row = $result->fetch_assoc();
          $quiz_name = $row['quiz_name'];
        }
        else{
          $_SESSION['error_msg'] = 'Something went wrong!';
          header('Location: admin_dashboard.php');
          exit;
        }
     }
     else{
       $_SESSION['error_msg'] = 'Something went wrong!';
       header('Location: admin_dashboard.php');
       exit;
     }
     
     if(!empty($var)){
     $sql = "DELETE FROM quizes WHERE quiz_id='$var'";
     mysqli_query($conn,$sql);

     $sql = "DELETE FROM question_bank WHERE quiz_id='$var'";
     mysqli_query($conn,$sql);

     $sql = "DELETE FROM attempts WHERE quiz_id='$var'";
     mysqli_query($conn,$sql);

     $sql = "DELETE FROM feedback WHERE quiz_id='$var'";
     mysqli_query($conn,$sql);

     $_SESSION['success_msg'] = 'Quiz : '.$quiz_name. '<br/> Delete status : Success <br/>Attempts associated to the quiz deleted successfully <br/> Feedback removed successfully';
     $_SESSION['message'] = 'Quiz Deleted Successfully';
     $_SESSION['color'] = '#68a030';
     header('location: admin_dashboard.php');
   }
   else{

     $_SESSION['message'] = 'Something Went Wrong!';
     $_SESSION['color'] = '#cd201fc';   
     header('location: admin_dashboard.php');
   }
?>