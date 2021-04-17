<!DOCTYPE html>
<html>
<head>
  <title>Admin Profile</title>
</head>
</html>
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


?>

<!DOCTYPE html>
<html>


	<?php include 'includes/header.php'; ?>
	<?php include 'includes/navbar.php'; ?>
    <?php
       $sql = "SELECT * FROM registered_admin WHERE admin_email='$_SESSION[email]'";
       $result = mysqli_query($conn,$sql);
       $row = $result->fetch_assoc();

    ?>
    <style type="text/css">
    	.select-exam{
    		width: 100%;
    	}
    </style>
	<div class="my-3 my-md-5">
		<div class="container">
  <!-- <div style="height: 50px;"></div> -->
			<div style="margin:58px -10px;" class="row row-cards row-deck">
				<div class="col-12">
					<div class="card">
						<div class="card-header">
							<h3 class="card-title">Profile Details</h3>
						</div>
						<?php require 'includes/flash-message.php'; ?>
						<div class="card-body">
							<form action="update_admin_profile.php" method="post" enctype="multipart/form-data">
								<div style="margin : 0" class="row p-4 mb-2 border rounded border-muted">
									<div class="col-sm-12 col-lg-6">
										<div class="form-group">
											<label class="form-label">First Name</label>
											<input class="form-control ht-50 select-exam" type="text" name="firstname" value="<?php echo $row['first_name'];?>" disabled>
										</div>
									</div>
									
									<div class="col-sm-12 col-lg-6">
										<div class="form-group">
											<label class="form-label">Last Name</label>
											<input class="form-control ht-50 select-exam" type="text" name="lastname" value="<?php echo $row['last_name'];?>" disabled>
										</div>
									</div>
									<div class="col-sm-12 col-lg-6">
										<div class="form-group">
											<label class="form-label">Gender</label>
											<input class="form-control ht-50 select-exam" type="text" name="gender" value="<?php echo $row['admin_gender'];?>" disabled>
										</div>
									</div>
									<div class="col-sm-12 col-lg-6">
										<div class="form-group">
											<label class="form-label">State</label>
											<input class="form-control ht-50 select-exam" type="text" name="state" value="<?php echo $row['state'];?>" disabled>
										</div>
									</div>
									<div class="col-sm-12 col-lg-6">
										<div class="form-group">
											<label class="form-label">Date of Birth</label>
											<input class="form-control ht-50 select-exam" type="text" name="dob" value="<?php echo $row['date_of_birth'];?>" disabled>
										</div>
									</div>
									<div class="col-sm-12 col-lg-6">
										<div class="form-group">
											<label class="form-label">Contact</label>
											<input class="form-control ht-50 select-exam" type="text" name="contact" value="<?php echo $row['admin_contact'];?>" required>
										</div>
									</div>
									<div class="col-sm-12 col-lg-6">
										<div class="form-group">
											<label class="form-label">Address</label>
											<input class="form-control ht-50 select-exam" type="text" name="address" value="<?php echo $row['admin_address'];?>" required>
										</div>
									</div>
									<div class="col-sm-12 col-lg-6">
										<div class="form-group">
											<label class="form-label">E-mail</label>
											<input class="form-control ht-50 select-exam" type="text" name="email" value="<?php echo $row['admin_email'];?>" disabled>
										</div>
									</div>
									<div class="col-sm-12 col-lg-6">
										<div class="form-group">
											<label class="form-label">Institution</label>
											<input class="form-control ht-50 select-exam" type="text" name="institution" value="<?php echo $row['institution_name'];?>" >
										</div>
									</div>
									<div class="col-sm-12 col-lg-6">
										<div class="form-group">
											<label class="form-label">Password</label>
											<input class="form-control ht-50 select-exam" type="text" name="password" value="<?php echo $row['admin_password'];?>" disabled>
										</div>
									</div>
									<div class="col-sm-12 col-lg-6">
										<div class="form-group">
											<label class="form-label">Profile Image</label>
											<?php 

							                    $sql2 = "SELECT * FROM profile_photo WHERE admin_email='$_SESSION[email]'";
							                    $result2 = mysqli_query($conn,$sql2);
							                    
							                    if($result2->num_rows==1)
							                    {
							                      $row2 = $result2->fetch_assoc();
							                      $image_name = $row2['image_name'];
							                      $image_id = $row2['image_id'];
							                    }
							                    else $image_name = "default_image.png";
							                  ?>
							                  <div class="profile-photo-container">	
												<img style="margin : 0;" id="profile-photo" style="margin:  10px;border-radius: 5px;"   src="profile_photo/<?php echo $image_name; ?>">
							                  </div>
											<div class="image-input-container">
												<div class="choose-image-wrapper">
													<span style="z-index: 2" id="choose-img-btn">Edit Profile Image</span>
													<span id="no-file-choosen"></span>
												</div>
												<input id="choose-input-field" type="file"  name="img">
											</div>
											<?php 
											

											$sql = "SELECT * FROM profile_photo WHERE admin_email='$_SESSION[email]'";
											$result = mysqli_query($conn,$sql);
											
											if($result->num_rows==1){
											?>

											<div class="btn btn-primary ml-auto">
												<a style="text-decoration: none;" href="remove_profile_photo.php?image_id=<?php echo $image_id;?>&image_name=<?php echo $image_name;?>" class="text-white">Remove
		</a>
											</div>	
											<?php } ?>
    
										</div>
									</div>
								</div>
								<div class="card-footer text-right">
					         		<div style="display: flex;justify-content: flex-end;" class="d-flex">
					           <button type="submit" class="btn btn-primary ml-auto" value="Save Changes">Save Changes</button>
					         		</div>
						 		</div>
							</form>
						</div>
					</div>
				</div>	
			</div>
		</div>
	</div>		

	<?php include 'includes/scripts.php'; ?>
</body>

</html>