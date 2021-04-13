<!DOCTYPE html>
<html>
<head>
  <title>Quiz Status | Admin</title>
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

<style type="text/css">
	
	.explaining-feature{
		margin-bottom: 30px;
		margin-top: -15px;
		background: white;
		padding: 10px;
		border-radius: 5px;
    border: 0.5px solid #e4e4e4;
	}
</style>
	<?php include 'includes/header.php'; ?>
	<?php include 'includes/navbar.php'; ?>
   

	<div class="container">
  <div style="height: 55px;"></div>
		<div  style="margin-bottom: -40px;" class="row row-card row-deck">
			<div class="col-12">
				<div class="card">
					<div class="card-header">
						<h2 class="card-title">Quiz Status</h2>
					</div>
					<div class="table-responsive">
						<table class="table card-table table-vcenter text-nowrap">
							<thead>
								<tr>
									<th class="w-1">S No.</th>
									<th>Quiz Name</th>
									<th>Status</th>
									<th>Toggle Status</th>
								</tr>
							</thead>
							<tbody>
								<form action="toggle_state.php" method="get">
					        	<?php

					            /*$sql = "SELECT * FROM admin_quiz WHERE admin_email='$_SESSION[email]'";
					            $result1 = mysqli_query($conn,$sql);*/
					            $temp = "SELECT * FROM quizes WHERE admin_email_id='$_SESSION[admin_id]' ORDER BY quiz_name";
					            $result = mysqli_query($conn,$temp);
					            $i = 1;
					             $k=-1;
					             $m=1;
					            while($row = $result->fetch_assoc())
					            {
					               $sql = "SELECT * FROM question_bank WHERE quiz_id='$row[quiz_id]'";
					                    $temp = mysqli_query($conn,$sql);  
					                  if($temp->num_rows>0)
					                  {    
					                 $k = $k+1;
					                ?>

					                      <tr>
					                      	<td>
								              <span class="text-muted"><?php echo $i; ?></span>
								            </td>
					                        <td class="quiz-name"><?php echo $row['quiz_name']; ?></td>
					                        

					                        <td class="quiz-status">
					                        	<?php  
					                        	if($row['is_active'])
					                    {
					                    	echo "<span class='status-icon bg-success'></span>
					                    		Active
					                    	<div class='count-active'></div>"; $m = 1;} 
					                    else 
					                    	{echo "<span class='status-icon bg-unsuccess'></span>Inactive"; 
					                     $m=2;}
					                    ?>
					                    </td>
					                    <td class='toggle'>
					                    	<!-- <a  href="toggle_state.php?quizID=<?php echo $row['quiz_id'];?>">
  											</a> -->
					                        <label class="switch">
					                        <?php
					                        if($m==1)
					                        {
					                        	?>
					                        <input class='check-state' onclick='change_check(<?php echo $row['quiz_id'];?>,<?php echo $k;?>)' type='checkbox' checked>;
					                        <?php
					                         }
					                         else {
					                         	?>
					                        <input class='check-state' onclick='change_check(<?php echo $row['quiz_id'];?>,<?php echo $k;?>)' type='checkbox' unchecked>;
                                              <?php
                                          } 
                                          ?>
  											
                                            
  											<span class="slider round"></span>
											</label>
					                        
					                    </td>
					                  </tr>

							</tbody>
							<?php
                                     $i =$i + 1;
					              }
					          
					        }
					        ?>
					        <div class="d-flex">
									
								</div></form>
						</table>
					</div>
				</div>
			</div>
		</div>
		<hr>
		<div class="explaining-feature">
			<h5>Toggle Status of Quiz</h5>
			<ul>
				<li>Active : Quiz will be accessible</li>
				<li>Inactive : Quiz remain concealed</li>
			</ul>
			<br>
			<h5 style="color: #5eba00;">Remember if you want your quiz to be open to all candidates then reveal your key through PUBLIC ACCESS FEATURE so candidates can see key from description and take Quiz.</h5>
			<h5 style="color : #cd201f;" >If you want your Quiz to be only accessible to candidates of your class, college, institute then personally send the key to them via E-mail or other social network.<br>
				Don't Reveal the KEY.
			</h5>
		</div>
	</div>
    
   
	<?php include 'includes/scripts.php'; ?>
	
</body>

</html>