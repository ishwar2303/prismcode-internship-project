<?php
		session_start();
        require_once('connection.php');
      
   
      if(isset($_GET['image_id']) && isset($_GET['image_name']))
      {
        extract($_GET);
        $sql = "DELETE FROM profile_photo WHERE image_id='$image_id'";
        mysqli_query($conn,$sql);
        $target = "profile_photo/".$image_name;
        unlink($target);
        $_SESSION['success_msg'] = 'Profile photo removed';
        $_SESSION['message'] = 'Profile photo removed';
        $_SESSION['color'] = '#68a030';
        header('location: admin_profile.php');
      }
      else header('location: admin_logout.php');
?>