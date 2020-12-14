<!DOCTYPE html>
<html>
<head>
  <title>Change Password | Admin</title>
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

	
    <script>
    	function validate_password()
    	{
            var x = document.getElementById("curr-pass").value; // new password entered
            var y = document.getElementById("conf-pass").value; //conf pass entry

            if(y!=x)
            {
            	var z = document.getElementById("show-respond");
            	z.innerHTML = `<i style="font-size:20px;margin-top:5px;" class="fas fa-times-circle"></i>`;
                z.style.color = "red";
            }
            else {
            	var z = document.getElementById("show-respond"); 
                 z.innerHTML = `<i style="font-size:20px;margin-top:5px;" class="fas fa-check-circle"></i>`;
                 z.style.color="green";
                 }
    	}
    	function confirmation()
    	{
    		var x = document.getElementById("curr-pass").value; // new password entered
            var y = document.getElementById("conf-pass").value; //conf pass entry
            if(x==y)
            	return true;
            else return false;
    	}
    </script>
    <!-- Modal content-->
  	<div style="margin : 56px 0px;" class="row row-card row-deck">
		<div class="col-12">
			<div class="card">
				<div class="card-header">
					<h4 class="card-title">Change Password</h4>
				</div>
				<div class="card-body">
					<form id="update" action="update_password.php" method="POST" onsubmit="return confirmation()">
						<div class="row">
							<div style="display: flex;justify-content: center;" class="col-sm-12 col-lg-12">
								<div class="form-group">
									<label style="margin-left: 0px" class="form-label">Current Password :</label>
									<input type="Password" name="oldpass" class="form-control change-pass" placeholder="Old Password" required>
								</div>
							</div>
							<div style="display: flex;justify-content: center;" class="col-sm-12 col-lg-12">
								<div class="form-group">
									<label style="margin-left: 0px" class="form-label">New Password :</label>
									<input type="Password" name="newpass" id="curr-pass" class="form-control change-pass" placeholder="New Password" required>	 
								</div>
							</div>
							<div style="display: flex;justify-content: center;" class="col-sm-12 col-lg-12">
								<div class="form-group">
									<label style="margin-left: 0px" class="form-label">Confirm Password :</label>
									<input type="Password" name="confpass" id="conf-pass" class="form-control change-pass" placeholder="New Password" oninput="validate_password()" required>	
									<label id="show-respond"></label> 
								</div>
							</div>
						</div>
					</form>
					<div style="display: flex;justify-content: center;align-items: center;" class="card-footer text-right">
				         <div style="display: flex;justify-content: center;" class="d-flex">
				           <button form="update" type="submit" name="submit" class="btn btn-primary ml-auto" value="Update Password">Update Password</button>
				           
				         </div>
				    </div>
				</div>
			</div>
		</div>
	</div>



	<?php include 'includes/scripts.php'; ?>
	
</body>

</html>



