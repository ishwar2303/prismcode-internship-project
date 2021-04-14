<!DOCTYPE html>
<html lang="en">
<head>
  <title>Delete Quiz | Admin</title>
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
<html lang="en">


	<?php include 'includes/header.php'; ?>
	<?php include 'includes/navbar.php'; ?>

	<div class="container">

  	<div style="height: 55px;"></div>
		<div class="row row-card row-deck">
			<div class="col-12">
				<div class="card">
					<div class="card-header">
						<h2 class="card-title">Delete Quiz</h2>
					</div>
					<div class="card-body">
						<form action="delete_exam_query.php" method="POST" onsubmit="return confirmation()">
							<div class="col-sm-12 col-lg-12">
								<div class="form-group">
									<label class="form-label">Select Quiz </label>
									<select name="exam_id" class="form-control custom-select select-exam">
										<option disabled>---select---</option> 
										<?php 
        
										$temp = "SELECT * FROM quizes WHERE admin_email_id='$_SESSION[admin_id]' ORDER BY quiz_name";
								                 $result = mysqli_query($conn,$temp);
                                          
								            while($row = $result->fetch_assoc())
								            {
								                	echo "<option value='$row[quiz_id]'>$row[quiz_name]</option>";
								                  
								            }
								            
										?>
									</select>
									<button name="submit" id="delete check-button" class="check-score btn btn-primary ml-auto" value="delete" type="submit">Delete</button>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>		
		</div>
	</div>

	<?php include 'includes/scripts.php'; ?>
	
</body>

</html>