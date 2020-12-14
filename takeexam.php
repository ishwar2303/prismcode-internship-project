  
<?php
    session_start();
    
	require_once('connection.php');
    
	if(isset($_SESSION['exam_end'])){
		header('Location: feedback.php?feedback=true');
		return;
	}
    if(isset($_SESSION['submit']))
      {header('location: logout.php');return; }

    if(isset($_SESSION['student_login_time']))
     {
      $current_time = time();
        $student_login_time = $_SESSION['student_login_time'];
      if($current_time - $student_login_time   > 30000)  
      {
         header('location: logout.php');
         return;
      }
     }
     else {header('location: logout.php');return;}
    
  	if(!isset($_SESSION['test_is_set'])){
  		header('Location: select_exam.php');
  		return;
  	}
   
        $quiz_id =  $_SESSION['exam_id'];
        $exam_key = $_SESSION['exam_key'];
        $time_duration = $_SESSION['time_duration'];
     if(!isset($_SESSION['time_duration'])){
     	header('Location: logout.php');
     }
    $_SESSION['quiz_start_time'] = time();
    $QUESTIONS = $_SESSION['QUESTIONS'];
    $_SESSION['question_no'] = sizeof($_SESSION['QUESTIONS']);     
    $i=1;

    $sql = "SELECT * FROM quizes WHERE quiz_id='$_SESSION[exam_id]'";
    $result = mysqli_query($conn,$sql);
    $row = $result->fetch_assoc();
    $quizName = $row['quiz_name'];
    $negativeMarking = $row['negative_marking'];
    $marksPerQuestion = $row['marks_per_question'];
    $passingPercentage = $row['passing_percentage'];
    $totalMarksOfExam = $row['marks_per_question']*$_SESSION['question_no'];
    if($marksPerQuestion == 1){
    	$questionMarks = $marksPerQuestion."&nbsp;Mark";
    }
    else{
		$questionMarks = $marksPerQuestion."&nbsp;Marks";
    }
    if(!isset($_SESSION['ANSWER'])){
    	$m = 0;
    	$_SESSION['ANSWER'] = array();
    	for($m=0;$m<=$_SESSION['question_no'];$m++){
    		array_push($_SESSION['ANSWER'],0);
    	}
    }
    if(!isset($_SESSION['REVIEW'])){
		$_SESSION['REVIEW'] = array();
		$l = sizeof($_SESSION['QUESTIONS']);
		for($v=0;$v<=$l;$v++){
			array_push($_SESSION['REVIEW'],0);
		}
	}
?>
	<?php include 'templates/exam_header.php'; ?>
	<div class="top-padding"></div>
	<div class="main-container">
		<div class="container-left">
			<!-- <div class="page-header">
				<h1 class="page-title">
					Quiz Name
				</h1>
			</div> -->
			<div class="question-switch-container">	
				<span>QUESTIONS</span>
				<div class="questions-labels-status">
					<div>
					<?php 
					for($k=1;$k<=$_SESSION['question_no'];$k++)
					{
					?>
					<label class="selectgroup-button" onclick="switchToQuestion(<?php echo $k-1;?>)"><?php echo $k;?></label>
					<?php 
					}
					?>
					</div>
				</div>
				<div class="question-mark-hint">
					
	                        			<span style="width: 100%;padding: 3px 5px;color:#2980b9;">Click on blocks to switch.</span>	
					<div>
						<span style="margin-right: 10px;" id="attempted-block"></span>
						<span>Attempted</span>
					</div>
					<div>
						<span style="margin-right: 10px;" id="review-block"></span>
						<span>Review</span>
					</div>
					<div>
						<span style="margin-right: 10px;" id="remaining-block"></span>
						<span>Remaining</span>
					</div>
				</div>
			</div>
		</div>	
		<div style="padding: 0px;" class="container-right">
			<div class="exam-status">
				<div class="status-card s-one">
					<label class="totalquestion"><?php echo $_SESSION['question_no'];?></label>
					<label class="status-labels">Questions</label>
				</div>
				<div class="status-card s-two">
					<label class="attempted">0</label>
					<label class="status-labels">Attempted</label>
				</div>
				<div class="status-card s-three">
					<label class="remaining"><?php echo $_SESSION['question_no'];?></label>
					<label class="status-labels">Remaining</label>
				</div>
				<div class="status-card s-four">
					<label class="review">0</label>
					<label class="status-labels">Review</label>
				</div>
			</div>

						<div style="padding-left: 0px; padding-right: 0px;" class="all-questions-container">
							<form style="margin-top: 3px;" id="myform" method="POST" action="evaluateexam.php" onsubmit="return confirmation()" class="max-width">
							<div  style="margin: 0px 0px;height: 10px;border-bottom-left-radius: 0px;border-bottom-right-radius: 0px; background: #bdc3c7;" class="progress progress-sm margin-progress">
								<div  class="progress-bar bg-green" style="width: 0%; height: 100%;"></div>
							</div>

<?php 
$i = 1;
$j = 0;
$t = 0;
	foreach ($QUESTIONS as $QueID)
	{
		$sql = "SELECT question,option_1,option_2,option_3,option_4 FROM question_bank WHERE question_id='$QueID'";
		$result = mysqli_query($conn,$sql);
		$row = $result->fetch_assoc();
    ?>


                        <div class="question-answer-container">
                        	<div class="question-container">
	                        	<div class="question-sno">
	                        		<div>
	                        			<label class="question-no"><?php echo "Question $i";?></label>
	                        			<span onclick="showMarkingpopup()" class="marking">Marking</span>
	                        		</div>
	                        		<div>	
 	                        			<span class="mark-as-review">Mark as Review</span>
 	                        			<span class="remove-from-review">Remove from Review</span>
	                        			<span class="uncheck-option">Clear Response</span>
	                        		</div>
									<?php 
									if($_SESSION['ANSWER'][$i] == 0){
									?>
									<script type="text/javascript">
										document.getElementsByClassName('uncheck-option')[<?php echo $i-1;?>].style.display='none';
										document.getElementsByClassName('mark-as-review')[<?php echo $i-1;?>].style.display='none';
									</script>
	                        		<?php 
	                        		}
	                        		?>
						

 									<input style="display: none;" type="checkbox" class="review-checkbox">	
 	                        		<?php 
									if($_SESSION['REVIEW'][$i] == 1){
									?>
									<script type="text/javascript">
										document.getElementsByClassName('review-checkbox')[<?php echo $i-1;?>].checked = true;
										reviewQuestion(<?php echo $i;?>);
									</script>
									<?php
									}
									?>
 	                        		<script type="text/javascript">
	                        			$(document).ready(function(){
	                        				$(".mark-as-review").eq(<?php echo $j;?>).click(function(){
	                        					var url = 'save_answer_in_session.php';
	                        					$('#for-load').load(url,{
	                        						review : true,
	                        						ques : <?php echo $i;?>
	                        					});
	                        					document.getElementsByClassName('review-checkbox')[<?php echo $i-1;?>].checked = true;
	                        					document.getElementsByClassName('mark-as-review')[<?php echo $i-1;?>].style.display='none';
	                        					document.getElementsByClassName('remove-from-review')[<?php echo $i-1;?>].style.display='block';
	                        					reviewQuestion(<?php echo $i;?>);
	                        				});
	                        				$(".remove-from-review").eq(<?php echo $j;?>).click(function(){
	                        					var url = 'save_answer_in_session.php';
	                        					$('#for-load').load(url,{
	                        						removeReview : true,
	                        						ques : <?php echo $i;?>
	                        					});
	                        					document.getElementsByClassName('review-checkbox')[<?php echo $i-1;?>].checked = false;
	                        					document.getElementsByClassName('mark-as-review')[<?php echo $i-1;?>].style.display='block';
	                        					document.getElementsByClassName('remove-from-review')[<?php echo $i-1;?>].style.display='none';
	                        					removeReviewQuestion(<?php echo $i;?>);
	                        				});
	                        				$(".uncheck-option").eq(<?php echo $j;?>).click(function(){
	                        					var url = 'save_answer_in_session.php';
	                        					$('#for-load').load(url,{
	                        						uncheck : true,
	                        						ques : <?php echo $i;?>,
	                        						removeReview : true
	                        					});
	                        					var j = <?php echo $i-1;?>;
	                        					var i;
	                        					for(i=4*j;i<4*j+4;i++){
	                        						document.getElementsByClassName('selectgroup-input')[i].checked=false;
	                        					}
	                        					document.getElementsByClassName('review-checkbox')[<?php echo $i-1;?>].checked=false;
	                        					var x = document.getElementsByClassName('question-switch-container')[0].getElementsByTagName('label')[<?php echo $i-1;?>];

                								x.style.background = 'white';
                								x.style.color = '#95a5a6';
                								document.getElementsByClassName('uncheck-option')[<?php echo $i-1;?>].style.display='none';
                								document.getElementsByClassName('mark-as-review')[<?php echo $i-1;?>].style.display='none';

                								document.getElementsByClassName('remove-from-review')[<?php echo $i-1;?>].style.display='none';
                								count();
	                        				});
	                        			});
	                        		</script>
	                        	</div>
	                        	<div class="question">
	                        		<?php echo $row['question'];?>
	                        	</div>
                        	</div>
                        	<div class="answer-container">
												<label class="selectgroup-item options">
													<input class="selectgroup-input" type="radio" name="ans[<?php echo $j;?>]" value="1" onclick="updateStatus(<?php echo $i;?>)">
													<span style="border-radius: 5px;" class="selectgroup-button text-left"><?php echo $row['option_1'];?></span>
												</label>
												<?php 
												if($_SESSION['ANSWER'][$i] == 1){
													?>
													<script type="text/javascript">document.getElementsByClassName('selectgroup-input')[<?php echo $t;?>].checked=true;</script>
													<?php
												}
												?>
												<script type="text/javascript">
													$(document).ready(function(){
														$('.selectgroup-item').eq(<?php echo $t; $t++;?>).click(function(){
															var url = 'save_answer_in_session.php';
															$('#for-load').load(url,{
																ques : <?php echo $i;?>,
																ans : 1 
															});
														});
													});
												</script>
												<label class="selectgroup-item options">
													<input class="selectgroup-input " type="radio" name="ans[<?php echo $j;?>]" value="2" onclick="updateStatus(<?php echo $i;?>)">
													<span style="border-radius: 5px;" class="selectgroup-button text-left"><?php echo $row['option_2'];?></span>
												</label>
												<?php 
												if($_SESSION['ANSWER'][$i] == 2){
													?>
													<script type="text/javascript">document.getElementsByClassName('selectgroup-input')[<?php echo $t;?>].checked=true;</script>
													<?php
												}
												?>
												<script type="text/javascript">
													$(document).ready(function(){
														$('.selectgroup-item').eq(<?php echo $t; $t++;?>).click(function(){
															var url = 'save_answer_in_session.php';
															$('#for-load').load(url,{
																ques : <?php echo $i;?>,
																ans : 2 
															});
														});
													});
												</script>
									
												<label class="selectgroup-item options">
													<input class="selectgroup-input" type="radio" name="ans[<?php echo $j;?>]" value="3" onclick="updateStatus(<?php echo $i;?>)">
													<span style="border-radius: 5px;" class="selectgroup-button text-left"><?php echo $row['option_3'];?></span>
												</label>
												<?php 
												if($_SESSION['ANSWER'][$i] == 3){
													?>
													<script type="text/javascript">document.getElementsByClassName('selectgroup-input')[<?php echo $t;?>].checked=true;</script>
													<?php
												}
												?>
												<script type="text/javascript">
													$(document).ready(function(){
														$('.selectgroup-item').eq(<?php echo $t; $t++;?>).click(function(){
															var url = 'save_answer_in_session.php';
															$('#for-load').load(url,{
																ques : <?php echo $i;?>,
																ans : 3 
															});
														});
													});
												</script>
												<label class="selectgroup-item options">
													<input class="selectgroup-input" type="radio" name="ans[<?php echo $j;?>]" value="4" onclick="updateStatus(<?php echo $i;?>)">
													<span style="border-radius: 5px;" class="selectgroup-button text-left"><?php echo $row['option_4'];?></span>
												</label>
												<?php 
												if($_SESSION['ANSWER'][$i] == 4){
													?>
													<script type="text/javascript">document.getElementsByClassName('selectgroup-input')[<?php echo $t;?>].checked=true;</script>
													<?php
												}
												?>
												<script type="text/javascript">
													$(document).ready(function(){
														$('.selectgroup-item').eq(<?php echo $t; $t++;?>).click(function(){
															var url = 'save_answer_in_session.php';
															$('#for-load').load(url,{
																ques : <?php echo $i;?>,
																ans : 4 
															});
														});
													});
												</script>
                        	</div>
                        </div>
                       <?php
      
        $i = $i + 1;
        $j = $j + 1; 
    }
?>    

      
     
               
					</form>
				</div>
				<div style="margin-top: -15px;">
					<div class="d-flex flex-row-reverse justify-content-between">
									<button id ="next"  onclick="nextQuestion()" value="next">
										<span>Next</span>
										<i class="fas fa-chevron-right"></i>
									</button>
									 <button id="btn-submit" name="action" value="submit" onclick="autoSubmit()" type="submit" >
										<span>Submit</span>
									 	<i class="fas fa-thumbs-up"></i>
									</button> 
									
									<button id="prev"  onclick="prevQuestion()" value="previous">
										<i class="fas fa-chevron-left"></i><span>Previous</span>
									</button>
									
					</div>
				</div>
	</div>
	<div id="for-load"></div>
	<script type="text/javascript">
        count();</script>
</body>
</html>
<?php 
if(!isset($_SESSION['test_started'])){
	$sql = "INSERT INTO `attempts` (`attempt_id`, `quiz_id`, `fullname`, `registration_no`, `email`, `score`, `total_marks`, `correct`, `wrong`, `not_attempted`, `pass_percentage`, `no_of_questions`, `time_stamp`) VALUES (NULL, '$_SESSION[exam_id]', '$_SESSION[name]', '$_SESSION[regNo]', '$_SESSION[email]', '0', '$totalMarksOfExam', '0', '0', '0', '$passingPercentage', '$_SESSION[question_no]', current_timestamp())";
       mysqli_query($conn,$sql) or die(mysqli_error($conn));
       $_SESSION['test_started'] = true;
}
?>