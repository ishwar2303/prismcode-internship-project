<?php
    session_start();
	require_once('connection.php');

  if(isset($_SESSION['login_time']))
     {
      $current_time = time();
        $login_time = $_SESSION['login_time'];
      if($current_time - $login_time   > 30000)  
      {
         header('location: admin_logout.php');
      }
     }
     else header('location: admin_logout.php');

	if(isset($_POST['oldpass']) && isset($_POST['newpass']))
	{
		$sql = "SELECT admin_password FROM registered_admin WHERE admin_email='$_SESSION[email]'";
		$result = mysqli_query($conn,$sql);
		$row = $result->fetch_assoc();

        if($row['admin_password'] == $_POST['oldpass'])
        {
        	$oldpass = strip_tags($_POST['oldpass']);
        	$oldpass = mysqli_real_escape_string($conn,$_POST['oldpass']);

        	$newpass = strip_tags($newpass);
        	$newpass = mysqli_real_escape_string($conn,$_POST['newpass']);
			$sql = "UPDATE registered_admin SET admin_password='$newpass' WHERE admin_email='$_SESSION[email]'";
		
               mysqli_query($conn,$sql);
              $_SESSION['message'] = 'Password Updated';
              $_SESSION['color'] = '#68a030';
              header('location: index.php?passwordUpdated=true');
		}
		else {
              $_SESSION['message'] = 'Password Not matched!';
              $_SESSION['color'] = '#3498db';
			 header('location: change_password.php');
		}
	}
	else {

              $_SESSION['message'] = 'Something Went Wrong!';
              $_SESSION['color'] = '#cd201f';
              header('location: change_password.php');
          }
?>