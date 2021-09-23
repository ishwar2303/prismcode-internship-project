<?php
	session_start();
	require_once("connection.php");
    
    if(isset($_POST['contact']) && isset($_POST['address']) && isset($_POST['institution']))
    {
    $contact = mysqli_real_escape_string($conn,$_POST['contact']); 
    $address = mysqli_real_escape_string($conn,$_POST['address']); 
    $institution = mysqli_real_escape_string($conn,$_POST['institution']);
    $contact = strip_tags($contact);
    $address = strip_tags($address);
    $institution = strip_tags($institution);
    if(!empty($address) && !empty($contact) && !empty($institution)){    
	$sql = "UPDATE registered_admin SET admin_contact='$_POST[contact]', admin_address='$_POST[address]', institution_name='$_POST[institution]' WHERE admin_email='$_SESSION[email]'";
	mysqli_query($conn,$sql);


         $sql = "SELECT * FROM profile_photo WHERE admin_email='$_SESSION[email]'";
         $result = mysqli_query($conn,$sql);
         if(isset($_FILES['img']['name']) && !empty($_FILES['img']['name']))
         {  
                $save_file_name = $_SESSION['email'];
                $profile_photo_control = 1;
                 $imgname = $_FILES['img']['name']; 
                 $tempimgname = $_FILES['img']['tmp_name'];
                 $imgSize = $_FILES['img']['size'];
                 if($imgSize > 1024*5*1000) {
                    $_SESSION['message'] = 'Photo should be less than 5 MB';
                    $_SESSION['color'] = '#cd201f';
                    $profile_photo_control = 0;
                 }
                $file_ext   = strtolower(pathinfo($imgname,PATHINFO_EXTENSION));
                $save_file_name = $save_file_name.'.'.$file_ext;
                if($file_ext != "jpeg" && $file_ext != "png" && $file_ext != "jpg") {
                    $_SESSION["message"] = 'Photo should be jpeg or png or jpg';
                    $_SESSION['color'] = '#cd201f';
                    $profile_photo_control = 0;
                }

                if($profile_photo_control) {

                    if($result->num_rows==1)
                    {  
                    $row = $result->fetch_assoc();
                    $prev_img_id = $row['image_id'];
                    $sql = "DELETE FROM profile_photo WHERE image_id='$prev_img_id'";
                    $target = "profile_photo/".$row['image_name'];
                    unlink($target);
                    mysqli_query($conn,$sql); 
                    }
                     move_uploaded_file($tempimgname,"profile_photo/$save_file_name");

                     $sql = "INSERT INTO `profile_photo`(`image_id`, `image_name`, `admin_email`) VALUES (NULL, '$save_file_name', '$_SESSION[email]')";
                     mysqli_query($conn,$sql);
                  $_SESSION['message'] = 'Profile Updated Successfully';
                  $_SESSION['color'] = '#f39c12';
                  header('location: admin_profile.php');
                  return;
                }
                else {
                    header('Location: admin_profile.php');
                    return;
                }
          }
          else {
              $_SESSION['message'] = 'Profile Updated Successfully';
              $_SESSION['color'] = '#f39c12';
    	      header('location: admin_profile.php');
          }
    }
    else{

          $_SESSION['message'] = 'Empty Credentials!';
          $_SESSION['color'] = '#cd201f';
          header('location: admin_profile.php');
    }
}
    else{

          $_SESSION['message'] = 'Something Went Wrong!';
          $_SESSION['color'] = '#cd201f';
     header('location: admin_profile.php');
 }
?>