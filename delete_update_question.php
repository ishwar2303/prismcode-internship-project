<?php 

session_start();
require_once('connection.php');
require_once('middleware.php');

if(isset($_POST['quesID']) && isset($_POST['delete']) && isset($_POST['quizID']) && isset($_POST['quesNum'])){
	$question_id = cleanInput($_POST['quesID']);
	$sql = "DELETE FROM question_bank WHERE question_id='$_POST[quesID]'"; // delete question
	mysqli_query($conn,$sql);
	$QueNum = cleanInput($_POST['quesNum']);
	$QueNum--;
	$QuizID = cleanInput($_POST['quizID']);
	$sql = "UPDATE quizes set number_of_questions='$QueNum' WHERE quiz_id='$QuizID'"; // update number of questions in quizes
	mysqli_query($conn,$sql);
	$sql = "SELECT * FROM question_bank WHERE quiz_id='$QuizID'";
	$result = mysqli_query($conn,$sql);
	$i=1;
	$minOneQue = 0;
	if($QueNum==0){
		?>
		<script type="text/javascript">location.href='admin_dashboard.php';</script>
		<?php
	}
	?>
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
													$('.updating-msg').show()
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
																quizID : <?php echo $QuizID;?>,
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
														$('.deleting-msg').show()
															hideCustomConfirmation();
															$("#all-questions").load(url,{
																quesID : <?php echo $row['question_id'];?>,
																delete : true,
																quizID : <?php echo $QuizID;?>,
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
											$minOneQue = 1;
										}
									       $_SESSION['ques_num'] = $i-1;
									       $_SESSION['ques_update_set'] = true;
									       $_SESSION['quiz_id'] = $_POST['quizID'];
										?>
                                         
										
											<!-- <input class="btn btn-primary ml-auto " id="save-changes" type="submit" value="Save Changes">  -->
											<?php 
											if($minOneQue){
											?>
									  <div class="card-footer text-right">
								         <!-- <div style="display: flex;justify-content: flex-end;" class="d-flex">
								           <button  type="submit" class="btn btn-primary ml-auto" id="save-changes" value="Save Changes">Save Changes</button>
								         </div> -->
								       </div> 
								       <?php 
								   }
								   ?>
								        <script type="text/javascript">
								        	
        document.getElementsByClassName('deleted-successfully')[0].style.display='block';
        setTimeout(hideMessage,1500);
		$('.deleting-msg').hide()
								        </script> 
									</form>
	<?php 


}
else if(isset($_POST['quesID']) && isset($_POST['update']) && isset($_POST['quizID']) && isset($_POST['quesNum'])){

	$QuizID = cleanInput($_POST['quizID']);
	$QueNum = cleanInput($_POST['quesNum']);
	$que = $_POST['que'];
	$o1  = $_POST['op1'];
	$o2  = $_POST['op2'];
	$o3  = $_POST['op3'];
	$o4  = $_POST['op4'];
	$ans   = $_POST['ans'];
	$res   = $_POST['res'];
	$form = $_POST['formatted'];
	$que = convertEntities($que);
	$o1 = convertEntities($o1);
	$o2 = convertEntities($o2);
	$o3 = convertEntities($o3);
	$o4 = convertEntities($o4);
	$res = convertEntities($res);
	$form = convertEntities($form);
	
	$break = '<br/>';
	$control = 1;
	$i=0;
	if($que == ''){
		$err = 'Empty question entry not allowed';
		$control = 0;
	}
	else if($o1=='' || $o2=='' || $o3=='' || $o4 == ''){
		$err = 'Options can not be empty';
		$control = 0;
	}
	else if($ans!=1 && $ans!=2 && $ans!=3 && $ans!=4){
		$err = 'Invalid answer value';
		$control = 0;
	}
	else if($form!=0 && $form!=1){
	  $err = 'Invalid formatted option';
	  $control = 0;
	}
	if($control){
		$sql = "UPDATE question_bank SET question='$que', option_1='$o1', option_2='$o2', option_3='$o3', option_4='$o4', answer='$ans', reason='$res', formatted='$form' WHERE question_id='$_POST[quesID]'";
		mysqli_query($conn,$sql) or die(mysqli_error($conn));
	}
	else{
		?>
		<div class="error-in-updating"><i class="fas fa-exclamation-circle"></i> <?php echo $err; ?> <button id="close-error-in-updating">Ok</button></div>
		<script>
			updateError = document.getElementsByClassName('error-in-updating')[0];
			updateError.style.display = 'block'
			document.getElementById('close-error-in-updating').addEventListener('click', () => {
			updateError.style.display = 'none'
			})
		</script>
		<?php
	}
	$sql = "SELECT * FROM question_bank WHERE quiz_id='$QuizID'";
	$result = mysqli_query($conn,$sql);
	$i = 1;
	$minOneQue = 0;
      ?>
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
											<span onclick="enableOption(<?php echo $i-1;?>)" class="edit-icon">				<i  class="fas fa-pencil-alt"></i>
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
													$('.updating-msg').show()
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
																quizID : <?php echo $QuizID;?>,
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
														$('.deleting-msg').show()
															hideCustomConfirmation();
															$("#all-questions").load(url,{
																quesID : <?php echo $row['question_id'];?>,
																delete : true,
																quizID : <?php echo $QuizID;?>,
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
											$minOneQue = 1;
										}
									       $_SESSION['ques_num'] = $i-1;
									       $_SESSION['ques_update_set'] = true;
									       $_SESSION['quiz_id'] = $_POST['quizID'];
										?>
                                         
										
											<!-- <input class="btn btn-primary ml-auto " id="save-changes" type="submit" value="Save Changes">  -->
											<?php 
											if($minOneQue){
											?>
									  <div class="card-footer text-right">
								         <!-- <div style="display: flex;justify-content: flex-end;" class="d-flex">
								           <button  type="submit" class="btn btn-primary ml-auto" id="save-changes" value="Save Changes">Save Changes</button>
								         </div> -->
								       </div> 
								       <?php
								   }
								   ?>
								         
									</form>
									<script type="text/javascript">	
        document.getElementsByClassName('updated-successfully')[0].style.display='block';
        setTimeout(hideMessage,1500);
		$('.updating-msg').hide()
									</script>
      <?php 
}
?>