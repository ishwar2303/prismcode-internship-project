<!DOCTYPE html>
<html>
<head>
  <title>Public Access | Admin</title>
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
   
<script type="text/javascript">
	
      function change_evaluation_access(ID,check_id)
      {
        var x = document.getElementsByClassName("check-evaluation"); 
        
        if(x[check_id].checked==false)
          x[check_id].checked = false;
        else x[check_id].checked = true;
        location.href="evaluation_access_toggle.php?quizID="+ID;
      }

      function change_key_access(ID,check_id)
      {
        var x = document.getElementsByClassName("check-key-access"); 
        
        if(x[check_id].checked==false)
          x[check_id].checked = false;
        else x[check_id].checked = true;
        location.href="key_access_toggle.php?quizID="+ID;
      }

</script>
	<div class="container">
  <div style="height: 55px;"></div>
		<div class="row row-card row-deck">
			<div class="col-12">
				<div class="card">
					<div class="card-header">
						<h2 class="card-title">Public Access</h2>
					</div>
					<div class="table-responsive">
						<table class="table card-table table-vcenter text-nowrap">
							<thead>
								<tr>
									<th class="w-1">S No.</th>
									<th>Quiz Name</th>
									<th>Key Revealed</th>
									<th>Reveal Key</th>
									<th>Evaluation Revealed</th>
									<th>Reveal Evaluation</th>
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
					                        	if($row['key_access'])
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
					                        <input class='check-key-access' onclick='change_key_access(<?php echo $row['quiz_id'];?>,<?php echo $k;?>)' type='checkbox' checked>;
					                        <?php
					                         }
					                         else {
					                         	?>
					                        <input class='check-key-access' onclick='change_key_access(<?php echo $row['quiz_id'];?>,<?php echo $k;?>)' type='checkbox' unchecked>;
                                              <?php
                                          } 
                                          ?>
  											
                                            
  											<span class="slider round"></span>
											</label>
					                        
					                    </td>

					                         <td class="quiz-status">
					                        	<?php  
					                        	if($row['show_evaluation'])
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
					                        <input class='check-evaluation' onclick='change_evaluation_access(<?php echo $row['quiz_id'];?>,<?php echo $k;?>)' type='checkbox' checked>;
					                        <?php
					                         }
					                         else {
					                         	?>
					                        <input class='check-evaluation' onclick='change_evaluation_access(<?php echo $row['quiz_id'];?>,<?php echo $k;?>)' type='checkbox' unchecked>;
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
	</div>
    
   
	<?php include 'includes/scripts.php'; ?>
	
</body>

</html>