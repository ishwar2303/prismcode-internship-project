<?php 
require_once('connection.php');
session_start();

if(isset($_POST['quesID']) && isset($_POST['delete']) && isset($_POST['quizID']) && isset($_POST['quesNum'])){
	
	$sql = "DELETE FROM question_bank WHERE question_id='$_POST[quesID]'"; // delete question
	mysqli_query($conn,$sql);
	$QueNum = $_POST['quesNum'];
	$QueNum--;
	$QuizID = $_POST['quizID'];
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
						 				?>
						 				<input class="question-id" type="number" name="questionID[]" value="<?php echo $row['question_id'];?>" required disabled="true">
										<div style="margin:3px 0px;" class="row p-4 mb-2 border rounded border-muted set-container">
											<span onclick="enableOption(<?php echo $i-1;?>)" class="edit-icon">												<i  class="fas fa-edit"></i>
												<span class="edit-hint">Edit</span>
											</span>
											<span  class="update-question">
												<i  class="fas fa-upload"></i>
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
																res : reason
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
															hideCustomConfirmation();
														});

														$("#confirm").click(function(){

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
											</div>
											<div class="col-sm-12 col-lg-6">
												<div class="form-group">
													<label class="form-label">Option 1</label>
													<input type="text" name="option1[]" class="form-control option1" placeholder="Option 1" value="<?php echo $option1;?>" required="true" disabled="true">
												</div>
											</div>
											<div class="col-sm-12 col-lg-6">
												<div class="form-group">
													<label class="form-label">Option 2</label>
													<input type="text" name="option2[]" class="form-control option2" placeholder="Option 2" value="<?php echo $option2;?>" required="true" disabled="true">
												</div>
											</div>
											<div class="col-sm-12 col-lg-6">
												<div class="form-group">
													<label class="form-label">Option 3</label>
													<input type="text" name="option3[]" class="form-control option3" placeholder="Option 3" value="<?php echo $option3;?>" required="true" disabled="true">
												</div>
											</div>
											<div class="col-sm-12 col-lg-6">
												<div class="form-group">
													<label class="form-label">Option 4</label>
													<input type="text" name="option4[]" class="form-control option4" placeholder="Option 4" value="<?php echo $option4;?>" required="true" disabled="true">
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
								         <div style="display: flex;justify-content: flex-end;" class="d-flex">
								           <button  type="submit" class="btn btn-primary ml-auto" id="save-changes" value="Save Changes">Save Changes</button>
								         </div>
								       </div> 
								       <?php 
								   }
								   ?>
								        <script type="text/javascript">
								        	
        document.getElementsByClassName('deleted-successfully')[0].style.display='block';
        setTimeout(hideMessage,1500);
								        </script> 
									</form>
	<?php 


}
else if(isset($_POST['quesID']) && isset($_POST['update']) && isset($_POST['quizID']) && isset($_POST['quesNum'])){

  $QuizID = $_POST['quizID'];
	$QueNum = $_POST['quesNum'];
  $que = $_POST['que'];
  $o1  = $_POST['op1'];
  $o2  = $_POST['op2'];
  $o3  = $_POST['op3'];
  $o4  = $_POST['op4'];
  $ans   = $_POST['ans'];
  $res   = $_POST['res'];

      $que = htmlentities($que);
      $que = str_replace("  ", "&nbsp;&nbsp;", $que);
      $que = str_replace("'", "&#39;", $que);
      $que = str_replace("\n", "<br/>", $que);
      $o1 = htmlentities($o1);
      $o1 = str_replace("  ", "&nbsp;&nbsp;", $o1);
      $o1 = str_replace("'", "&#39;", $o1);
      $o1 = str_replace("\n", "<br/>", $o1);
      $o2 = htmlentities($o2);
      $o2 = str_replace("  ", "&nbsp;&nbsp;", $o2);
      $o2 = str_replace("'", "&#39;", $o2);
      $o2 = str_replace("\n", "<br/>", $o2);
      $o3 = htmlentities($o3);
      $o3 = str_replace("  ", "&nbsp;&nbsp;", $o3);
      $o3 = str_replace("'", "&#39;", $o3);
      $o3 = str_replace("\n", "<br/>", $o3);
      $o4 = htmlentities($o4);
      $o4 = str_replace("  ", "&nbsp;&nbsp;", $o4);
      $o4 = str_replace("'", "&#39;", $o4);
      $o4 = str_replace("\n", "<br/>", $o4);
      $res = htmlentities($res);
      $res = str_replace("  ", "&nbsp;&nbsp;", $res);
      $res = str_replace("'", "&#39;", $res);
      $res = str_replace("\n", "<br/>", $res);
      $sql = "UPDATE question_bank SET question='$que', option_1='$o1', option_2='$o2', option_3='$o3', option_4='$o4', answer='$ans', reason='$res' WHERE question_id='$_POST[quesID]'";
      mysqli_query($conn,$sql) or die(mysqli_error($conn));

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
						 				?>
						 				<input class="question-id" type="number" name="questionID[]" value="<?php echo $row['question_id'];?>" required disabled="true">
										<div style="margin:3px 0px;" class="row p-4 mb-2 border rounded border-muted set-container">
											<span onclick="enableOption(<?php echo $i-1;?>)" class="edit-icon">				<i  class="fas fa-edit"></i>
												<span class="edit-hint">Edit</span>
											</span>
											<span  class="update-question">
												<i  class="fas fa-upload"></i>
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
																res : reason
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
															hideCustomConfirmation();
														});

														$("#confirm").click(function(){

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
											</div>
											<div class="col-sm-12 col-lg-6">
												<div class="form-group">
													<label class="form-label">Option 1</label>
													<input type="text" name="option1[]" class="form-control option1" placeholder="Option 1" value="<?php echo $option1;?>" required="true" disabled="true">
												</div>
											</div>
											<div class="col-sm-12 col-lg-6">
												<div class="form-group">
													<label class="form-label">Option 2</label>
													<input type="text" name="option2[]" class="form-control option2" placeholder="Option 2" value="<?php echo $option2;?>" required="true" disabled="true">
												</div>
											</div>
											<div class="col-sm-12 col-lg-6">
												<div class="form-group">
													<label class="form-label">Option 3</label>
													<input type="text" name="option3[]" class="form-control option3" placeholder="Option 3" value="<?php echo $option3;?>" required="true" disabled="true">
												</div>
											</div>
											<div class="col-sm-12 col-lg-6">
												<div class="form-group">
													<label class="form-label">Option 4</label>
													<input type="text" name="option4[]" class="form-control option4" placeholder="Option 4" value="<?php echo $option4;?>" required="true" disabled="true">
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
								         <div style="display: flex;justify-content: flex-end;" class="d-flex">
								           <button  type="submit" class="btn btn-primary ml-auto" id="save-changes" value="Save Changes">Save Changes</button>
								         </div>
								       </div> 
								       <?php
								   }
								   ?>
								         
									</form>
									<script type="text/javascript">	
        document.getElementsByClassName('updated-successfully')[0].style.display='block';
        setTimeout(hideMessage,1500);
										
									</script>
      <?php 
}
?>