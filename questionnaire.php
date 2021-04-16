<!DOCTYPE html>
<html>
<head>
  <title>Update Questions | Admin</title>
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
	margin: 13px;
	}
	</style>
	<?php include 'includes/header.php'; ?>
	<?php include 'includes/navbar.php'; ?>
<script type="text/javascript">/*
	function disableOption(index){
		document.getElementsByClassName('question')[index].disabled = true;
		document.getElementsByClassName('option1')[index].disabled = true;
		document.getElementsByClassName('option2')[index].disabled = true;
		document.getElementsByClassName('option3')[index].disabled = true;
		document.getElementsByClassName('option4')[index].disabled = true;
		document.getElementsByClassName('answer')[index].disabled = true;
		document.getElementsByClassName('reason')[index].disabled = true;
		document.getElementsByClassName('question-id')[index].disabled = true;
		document.getElementsByClassName('edit-icon')[index].style.display = 'block';
		document.getElementsByClassName('update-question')[index].style.display = 'none';
	}*/
	function enableOption(index){
		document.getElementsByClassName('question')[index].disabled = false;
		document.getElementsByClassName('option1')[index].disabled = false;
		document.getElementsByClassName('option2')[index].disabled = false;
		document.getElementsByClassName('option3')[index].disabled = false;
		document.getElementsByClassName('option4')[index].disabled = false;
		document.getElementsByClassName('answer')[index].disabled = false;
		document.getElementsByClassName('reason')[index].disabled = false;
		document.getElementsByClassName('formatted')[index].disabled = false;
		document.getElementsByClassName('question-id')[index].disabled = false;
		document.getElementsByClassName('edit-icon')[index].style.display = 'none';
		document.getElementsByClassName('update-question')[index].style.display = 'flex';
	}
</script>
	<div  class="my-3 my-md-5">
		<div class="container"><!-- 
  <div style="height: 55px;"></div> -->
			<div style="margin : 58px -12px; margin-bottom: -20px;" class="row row-cards row-deck">
				<div class="col-12">
					<div class="card">
						<div class="card-header">
							<h3 class="card-title">
					Update Questionnaire
							</h3>
						</div>
						<div class="card-body1">
							<form action="questionnaire.php" method="POST" class="pd-5px">
								<div class="row">
									<div class="col-sm-12 col-lg-12">
										<div class="form-group">
											<label style="margin-left: 10px;" class="form-label">Quizes</label>
											<select style="margin-left: 10px;" class="form-control custom-select select-exam" name="exam_id">
												<option value disabled> -- Select--</option>
												<?php 
        
													$temp = "SELECT * FROM quizes WHERE admin_email_id='$_SESSION[admin_id]' ORDER BY quiz_name";
										                 $result = mysqli_query($conn,$temp);

													$e_id = -1;
													if(isset($_POST['exam_id'])){
													$e_id = $_POST['exam_id'];
													}
										            while($row = $result->fetch_assoc())
										            {  
														if($e_id == $row['quiz_id']){
															$selected = 'selected';
														}
														else $selected = '';
										                  if($row['number_of_questions']>0)
										                  {  
										                	echo "<option value='$row[quiz_id]' $selected>$row[quiz_name]</option>";
										                  }
										                //   else{
										                //   	echo "<option value='$row[quiz_id]' disabled>$row[quiz_name] (0 Questions)</option>";
										                //   }
										            }
										            
												?>
											</select>
											<button name="submit" class="check-score btn btn-primary ml-auto" value="Check" type="submit">Show</button>
										</div>
									</div>
								</div>
							</form>
<?php
        	if(!isset($_POST['exam_id']))
        	{
					echo "</div>";
				echo "</div>";
			echo "</div>";
		echo "</div>";
	echo "</div>";
echo "</div>";
}
?>
							<?php
        	if(isset($_POST['exam_id']))
        	{
        
                      $sql = "SELECT quiz_name,number_of_questions FROM quizes WHERE quiz_id='$_POST[exam_id]'";
                      $result = mysqli_query($conn,$sql);
                      $row = $result->fetch_assoc();
                      $Quiz =  $row['quiz_name'];
                      $QueNum = $row['number_of_questions'];
        		$sql = "SELECT * FROM question_bank WHERE quiz_id='$_POST[exam_id]'";
        		$result = mysqli_query($conn,$sql);
        		$i=1;
              ?>
							<div class="card"  style="border:none;">
								<div class="">
									<h3 class="card-title pl-1"><?php echo $Quiz;?></h3>
								</div>
								<div id="all-questions" class="card-body" >
									<form action="update_questionnaire.php" method="post">
										<?php 
								 			while($row = $result->fetch_assoc())
								 			{
								 				$question = $row['question'];
								 				$question = str_replace("<br/>", "\n", $question);
								 				$option1 = $row['option_1'];
								 				$option1 = str_replace("<br/>", "\n", $option1);
								 				$option2 = $row['option_2'];
								 				$option2 = str_replace("<br/>", "\n", $option2);
								 				$option3 = $row['option_3'];
								 				$option3 = str_replace("<br/>", "\n", $option3);
								 				$option4 = $row['option_4'];
								 				$option4 = str_replace("<br/>", "\n", $option4);
								 				$reason = $row['reason'] ;
								 				$reason = str_replace("<br/>", "\n", $reason);
												$formatted = $row['formatted'];
						 				?>
						 				<input class="question-id" type="number" name="questionID[]" value="<?php echo $row['question_id'];?>" required disabled="true">
										<div style="margin:3px 0px;" class="row p-4 mb-2 border rounded border-muted set-container">
											<span onclick="enableOption(<?php echo $i-1;?>)" class="edit-icon">												<i  class="fas fa-pencil-alt"></i>
												<span class="edit-hint">Edit</span>
											</span>
											<span  class="update-question">
												<i  class="fas fa-save"></i>
												<span class="update-hint">Update</span>
											</span>
											<span class="delete-question">
												<i class="fas fa-trash-alt"></i>
												<span class="delete-hint">Delete</span>
											</span>

											<script type="text/javascript">
												$(document).ready(function(){
													$(".update-question").eq(<?php echo $i-1;?>).click(function(){
													var question = document.getElementsByClassName('question')[<?php echo $i-1;?>].value;
													var option1 = document.getElementsByClassName('option1')[<?php echo $i-1;?>].value;
													var option2 = document.getElementsByClassName('option2')[<?php echo $i-1;?>].value;
													var option3 = document.getElementsByClassName('option3')[<?php echo $i-1;?>].value;
													var option4 = document.getElementsByClassName('option4')[<?php echo $i-1;?>].value;
													var answer = document.getElementsByClassName('answer')[<?php echo $i-1;?>].value;
													var reason = document.getElementsByClassName('reason')[<?php echo $i-1;?>].value;
													var formatted = document.getElementsByClassName('formatted')[<?php echo $i-1;?>].value;
														var url = 'delete_update_question.php';
															$("#all-questions").load(url,{
																quesID : <?php echo $row['question_id'];?>,
																update : true,
																quizID : <?php echo $_POST['exam_id'];?>,
																quesNum : <?php echo $QueNum;?>,
																que : question,
																op1 : option1,
																op2 : option2,
																op3 : option3,
																op4 : option4,
																ans : answer,
																res : reason,
																formatted : formatted
															});
													});
												});
											</script>

											<script type="text/javascript">
												$(document).ready(function(){
													$(".delete-question").eq(<?php echo $i-1;?>).click(function(){
														var url = 'delete_update_question.php';
														showCustomConfirmation();
														$("#cancel").click(function(){
															$("#confirm").off();
															hideCustomConfirmation();
														});
														
														$("#confirm").click(function(){
															
															hideCustomConfirmation();
															$("#all-questions").load(url,{
																quesID : <?php echo $row['question_id'];?>,
																delete : true,
																quizID : <?php echo $_POST['exam_id'];?>,
																quesNum : <?php echo $QueNum;?>
															});
														});
													});
												});
											</script>
											<div class="col-sm-12 col-lg-12">
												<div class="form-group">
													<label class="form-label">Question&nbsp;<?php echo  $i; ?></label>
													<textarea name="question[]" class="form-control question" rows="4" placeholder="Question <?php echo  $i; ?>" required="true" disabled="true"><?php echo $question;?></textarea>
												</div>
												<div>
													<?php 
														$yes = '';
														$no = '';
														if($formatted)
															$yes = 'selected';
														else $no = 'selected';
													?>
													<label class="formatted-label">Formatted : </label>
													<select name="formatted[]" class="select-prop-format formatted" disabled="true">
														<option value="0" <?php echo $no; ?>>No</option>
														<option value="1" <?php echo $yes; ?>>Yes</option>
													</select>
												</div>
											</div>
											<div class="col-sm-12 col-lg-6">
												<div class="form-group">
													<label class="form-label">Option 1</label>
													<textarea type="text" name="option1[]" class="form-control option1" placeholder="Option 1" required="true" disabled="true"><?php echo $option1;?></textarea>
												</div>
											</div>
											<div class="col-sm-12 col-lg-6">
												<div class="form-group">
													<label class="form-label">Option 2</label>
													<textarea type="text" name="option2[]" class="form-control option2" placeholder="Option 2" required="true" disabled="true"><?php echo $option2;?></textarea>
												</div>
											</div>
											<div class="col-sm-12 col-lg-6">
												<div class="form-group">
													<label class="form-label">Option 3</label>
													<textarea type="text" name="option3[]" class="form-control option3" placeholder="Option 3" required="true" disabled="true"><?php echo $option3;?></textarea>
												</div>
											</div>
											<div class="col-sm-12 col-lg-6">
												<div class="form-group">
													<label class="form-label">Option 4</label>
													<textarea type="text" name="option4[]" class="form-control option4" placeholder="Option 4" required="true" disabled="true"><?php echo $option4;?></textarea>
												</div>
											</div>
											<div class="col-sm-12 col-lg-12">
												<div class="form-group">
													<label class="form-label">Answer</label>
													<select name="answer[]" class="form-control custom-select answer" required="true" disabled="true">
														<?php
														$ans = $row['answer'];
														if($ans==1)
														echo "<option value='1' selected>Option 1</option>";
													    else echo "<option value='1'>Option 1</option>";
														if($ans==2)
														echo "<option value='2' selected>Option 2</option>";
													    else echo "<option value='2'>Option 2</option>";
														if($ans==3)
														echo "<option value='3' selected>Option 3</option>";
													    else echo "<option value='3'>Option 3</option>";
														if($ans==4)
														echo "<option value='4' selected>Option 4</option>";
														else echo "<option value='4'>Option 4</option>";
														?>
													</select>
												</div>
											</div>
											<div class="col-sm-12 col-lg-12">
												<div class="form-group">
													<label class="form-label">Explanation</label>
													<textarea name="reason[]" class="form-control reason" rows="4" placeholder="Explanation" disabled="true"><?php echo $reason;?></textarea>
												</div>
											</div>		
										</div>
										<?php 
											$i = $i + 1;
										}
									       $_SESSION['ques_num'] = $i-1;
									       $_SESSION['ques_update_set'] = true;
									       $_SESSION['quiz_id'] = $_POST['exam_id'];
										?>
                                         
										
											<!-- <input class="btn btn-primary ml-auto " id="save-changes" type="submit" value="Save Changes">  -->
									  <div class="card-footer text-right">
								         <!-- <div style="display: flex;justify-content: flex-end;" class="d-flex">
								           <button  type="submit" class="btn btn-primary ml-auto" id="save-changes" value="Save Changes">Save Changes</button>
								         </div> -->
								       </div> 
								         
									</form>
									
								</div>

							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
<?php
 		}
									 	
?>
	<hr>
		<!-- <div class="explaining-feature">
			<h4>Select a Quiz</h4>
			<h5>To Update a Question</h5>
			<ul>
				<li>Click on Edit <i style="color: blue;" class="fas fa-pencil-alt"></i> icon</li>
				<li>Do amends</li>
				<li>Click on Upload <i style="color: blue;" class="fas fa-save"></i> icon</li>
			</ul>
			<h5>To delete a Question</h5>
			<ul>
				<li>Click on delete <i style="color: red;" class="fas fa-trash-alt"></i> icon</li>
				<li>Click YES to confirm</li>
			</ul>
			<br>
			<h5>To add more Questions in this Quiz use EXPAND QUIZ FEATURE</h5>
		</div> -->

	<?php include 'includes/scripts.php'; ?>
	</body>


</html>