<?php
	session_start();
	require_once('connection.php');
   if(isset($_SESSION['login_time']))
     {
      $current_time = time();
        $login_time = $_SESSION['login_time'];
      if($current_time - $login_time   > 3000)  
      {
         header('location: admin_logout.php');
      }
     }
     else header('location: admin_logout.php');
   $sql = "SELECT * FROM registered_admin WHERE admin_email='$_SESSION[email]'";
   $result = mysqli_query($conn,$sql);
   $row = $result->fetch_assoc();


?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
  <style type="text/css">
   img
   {
    width : 200px;
    height: 250px;
   } 
  </style>
</head>
<body>

 <h1>Your Profile</h1>
      <form action="update_admin_profile.php" method="post" enctype="multipart/form-data">
      	First Name : <input type="text" name="firstname" value="<?php echo $row['first_name'];?>" disabled>
            Last Name: <input type="text" name="lastname" value="<?php echo $row['last_name'];?>" disabled><br /><br />
            
              
                  <?php 

                    $sql2 = "SELECT * FROM profile_photo WHERE admin_email='$_SESSION[email]'";
                    $result2 = mysqli_query($conn,$sql2);
                    
                    if($result2->num_rows==1)
                    {
                      $row2 = $result2->fetch_assoc();
                      $image_name = $row2['image_name'];
                    }
                    else $image_name = "default_image.png";
                  ?>
                  <img src="profile_photo/<?php echo $image_name; ?>"><br />
                  <input type="file" name="img"><br /><br />
      	Gender : <input type="text" name="gender" value="<?php echo $row['admin_gender']; ?>" disabled>
      	 State : <input type="text" value="<?php echo $row['state'];?>" disabled><br /><br />
      	 Date of Birth : <input type="date" name="dob" value="<?php echo $row['date_of_birth'];?>" disabled><br /><br />
      	Contact : <input type="number" name="contact" value="<?php echo $row['admin_contact'];?>" required><br /><br />
           
      	Address : <input type="text" name="address" value="<?php echo $row['admin_address'];?>" required><br /><br />
      	E-mail :  <input type="email" name="email" value="<?php echo $row['admin_email'];?>" disabled><br /><br />
            Institution : <input type="text" name="institution" value="<?php echo $row['institution_name'];?>" required><br /><br />
        Password : <input type="text" value="<?php echo $row['admin_password'];?>" disabled><br /><br />   
      	Submit :  <input type="submit" value="Save Changes">
      </form>
</body>
</html>