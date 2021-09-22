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

	if(isset($_SESSION['certification_cleared'])){
		unset($_SESSION['certification_cleared']);
	}
	if(isset($_SESSION['certification_id'])){
		unset($_SESSION['certification_id']);
	}
?>
	<?php include 'templates/exam_header.php'; ?>
	<div class="top-padding"></div>
	<div class="main-container" >
		<div class="container-left">
			<!-- <div class="page-header">
				<h1 class="page-title">
					Quiz Name
				</h1>
			</div> -->
			<div class="question-switch-container">	
				<span style="color : white; border-bottom:1px solid white;padding-bottom:5px"><?php echo $quizName; ?></span>
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
				<span style="font-size:12px;">Marks Per Question : <?php echo $marksPerQuestion; ?></span>
				<span  style="font-size:12px;">
					<?php 
						if($negativeMarking == 0)
							echo 'No Negative Marking'; 
						else echo 'Negative Marking Per Question : -'.$negativeMarking;
					?>
				</span>
				<span style="font-size:12px;"> Certification : <?php echo $passingPercentage.'%'; ?></span>
					
	                        			<span style="width: 100%;padding: 3px 0px;color:#94d5ff;font-size:13px">Click on blocks to switch.</span>	
					<div>
						<span style="margin-right: 10px;" id="attempted-block"></span>
						<span style="font-size:12px;">Attempted</span>
					</div>
					<div>
						<span style="margin-right: 10px;" id="review-block"></span>
						<span style="font-size:12px;">Review</span>
					</div>
					<div>
						<span style="margin-right: 10px;" id="remaining-block"></span>
						<span style="font-size:12px;">Remaining</span>
					</div>
				</div>
			</div>
		</div>	
		<div style="padding: 0px;" class="container-right">
			<div class="exam-status">
				<div class="status-card s-one">
				<i class="fa fa-quora" aria-hidden="true"></i>
					<label class="totalquestion"><?php echo $_SESSION['question_no'];?></label>
					<label class="status-labels">Questions</label>
				</div>
				<div class="status-card s-two">
					<i class="fa fa-check" aria-hidden="true"></i>
					<label class="attempted">0</label>
					<label class="status-labels">Attempted</label>
				</div>
				<div class="status-card s-three">
					<i class="fa fa-archive" aria-hidden="true"></i>
					<label class="remaining"><?php echo $_SESSION['question_no'];?></label>
					<label class="status-labels">Remaining</label>
				</div>
				<div class="status-card s-four">
					<i class="fa fa-star" aria-hidden="true"></i>
					<label class="review">0</label>
					<label class="status-labels">Review</label>
				</div>
			</div>

						<div style="padding-left: 0px; padding-right: 0px;" class="all-questions-container">
							<form style="margin-top: 3px;" id="myform" method="POST" action="evaluateexam.php" onsubmit="return confirmation()" class="max-width">
							<div  style="border: 0.5px solid rgb(0 0 0 / 16%);margin: 0px 0px;height: 10px;border-bottom-left-radius: 0px;border-bottom-right-radius: 0px; background: #bdc3c7;" class="progress progress-sm margin-progress">
								<div  class="progress-bar bg-green" style="width: 0%; height: 100%;"></div>
							</div>
							<div class="question-answer-container-control">

<?php 
$i = 1;
$j = 0;
$t = 0;
	foreach ($QUESTIONS as $QueID)
	{
		$sql = "SELECT question_id,question,option_1,option_2,option_3,option_4,formatted FROM question_bank WHERE question_id='$QueID'";
		$result = mysqli_query($conn,$sql);
		$row = $result->fetch_assoc();
    ?>


                        <div class="question-answer-container">
                        	<div class="question-container">
	                        	<div class="question-sno">
	                        		<div>
	                        			<label class="question-no"><?php echo "Q $i";?></label>
	                        		</div>
	                        		<div class="question-operations">	
 	                        			<span class="mark-as-review">Mark as review</span>
 	                        			<span class="remove-from-review">Remove from review</span>
	                        			<span class="uncheck-option">Clear Response</span>
										<span class="report-question" onclick="showReportQuestionPopup(<?php echo $row['question_id'] ?>)"><i class="fas fa-exclamation-circle"></i> Report</span>
	                        		</div>
									<?php 
									if($_SESSION['ANSWER'][$i] == 0){
									?>
									<script type="text/javascript">
										document.getElementsByClassName('uncheck-option')[<?php echo $i-1;?>].style.display='none';
										document.getElementsByClassName('mark-as-review')[<?php echo $i-1;?>].style.display='block';
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
												document.getElementsByClassName('question-sno-padding')[<?php echo $i-1; ?>].style.height = '36px'
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

                								x.style.background = 'transparent';
                								x.style.color = '#95a5a6';
                								document.getElementsByClassName('uncheck-option')[<?php echo $i-1;?>].style.display='none';
                								document.getElementsByClassName('mark-as-review')[<?php echo $i-1;?>].style.display='block';

                								document.getElementsByClassName('remove-from-review')[<?php echo $i-1;?>].style.display='none';
                								count();
	                        				});
	                        			});
	                        		</script>
	                        	</div>
								<div class="question-sno-padding"></div>
	                        	<div class="question">
<?php 
	if($row['formatted']){
		?>
<pre>
<code><?php echo $row['question'];?></code>
</pre>
<?php
	}
	else echo str_replace("\n", "<br/>", $row['question']);
?>	
	                        		
	                        	</div>
                        	</div>
                        	<div class="answer-container">
												<label class="selectgroup-item options">
													<input class="selectgroup-input" type="radio" name="ans[<?php echo $j;?>]" value="1" onclick="updateStatus(<?php echo $i;?>)">
													<span style="border-radius: 5px; border:3px solid rgba(0,0,0,0.2)" class="selectgroup-button text-left border-3px">
													<span class="option-serial">A</span>
<!-- <pre>
<code></code>
</pre> -->
<span>
<?php echo str_replace("\n", "<br/>", $row['option_1']); ?>
</span>
													</span>
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
															// document.getElementsByClassName('question-sno-padding')[<?php echo $i-1; ?>].style.height = '70px'
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
													<span style="border-radius: 5px; border:3px solid rgba(0,0,0,0.2)" class="selectgroup-button text-left border-3px">
													<span class="option-serial">B</span>
<!-- <pre>
<code></code>
</pre> -->
<span>
<?php echo str_replace("\n", "<br/>", $row['option_2']); ?>
</span>
													</span>
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
															// document.getElementsByClassName('question-sno-padding')[<?php echo $i-1; ?>].style.height = '70px'
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
													<span style="border-radius: 5px; border:3px solid rgba(0,0,0,0.2)" class="selectgroup-button text-left border-3px">
													<span class="option-serial">C</span>
<!-- <pre>
<code></code>
</pre> -->
<span>
<?php echo str_replace("\n", "<br/>", $row['option_3']); ?>
</span>
													</span>
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
															// document.getElementsByClassName('question-sno-padding')[<?php echo $i-1; ?>].style.height = '70px'
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
													<span style="border-radius: 5px; border:3px solid rgba(0,0,0,0.2)" class="selectgroup-button text-left border-3px">
													<span class="option-serial">D</span>
<!-- <pre>
<code></code>
</pre>	 -->
<span><?php echo str_replace("\n", "<br/>", $row['option_4']); ?></span>

													</span>
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
															// document.getElementsByClassName('question-sno-padding')[<?php echo $i-1; ?>].style.height = '70px'
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

      
     
					</div>
					</form>
				</div>
				<div style="margin-top: -15px;">
					<div class="d-flex flex-row-reverse justify-content-between next-prev-sub-container">
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
				<div  style="height: 60px;"></div>
	<div id="for-load"></div>

	<div id="proctored-popup">
		<div>
			<div>
				<b><i class="fas fa-exclamation-circle"></i> WARNING</b>
			</div>
			<div id="proctored-msg-img">
				<!-- <img src="images/proctored-2.png" alt=""> -->
			</div>
			<div id="proctored-msg">
			You are being proctored!
			</div>
			<div>
				<button id="close-proctored-popup">Got It</button>
			</div>
		</div>
	</div>
	<div id="black-cover-for-proctored">
	</div>

	<div id="question-report-popup">
		<div>
			<label for="" class="form-label">Report Issue</label>
			<textarea id="question-problem" class="form-control" placeholder="Write your problem here..."></textarea>
			<div class="space-between">
				<button id="close-report-popup" onclick="closeReportQuestion()">Close</button>
				<button id="report-problem" onclick="reportQuestion()">Report</button>
			</div>
		</div>
	</div>
	<div id="black-cover-for-report"></div>
	<div class="question-report-response"></div>
	</div>
	<script>
		document.getElementById('close-proctored-popup').addEventListener('click', () => {
			document.getElementById('proctored-popup').style.display = 'none'
			document.getElementById('black-cover-for-proctored').style.display = 'none'
		})
	</script>

	<script type="text/javascript">
        count();
	</script>
		
	<script>
		function setQuestionHeaderWidth(t){
			let bodyWidth = document.getElementsByTagName('body')[0].offsetWidth
			bodyWidth -=20
			let w = document.getElementsByClassName('progress-sm')[0].offsetWidth
			let q = document.getElementsByClassName('question-container')
			let a = document.getElementsByClassName('answer-container')
			w-= 13
			let qs = document.getElementsByClassName('question-sno')
			if(t)
				bodyWidth-=270
			for(i=0; i<qs.length; i++){
				qs[i].style.width = bodyWidth - 3+ 'px'
				q[i].style.width = bodyWidth - 4+ 'px'
				a[i].style.width = bodyWidth - 4+ 'px'
				// console.log(bodyWidth+'px')
			}
			document.getElementsByClassName('next-prev-sub-container')[0].style.width = bodyWidth + 18+ 'px'
		}
		// setQuestionHeaderWidth(0)

		function setQuestionContainerHeight(){
			let x = document.getElementsByClassName('progress-sm')[0].offsetTop
			let y = document.getElementsByTagName('body')[0].offsetHeight
			// console.log('remainig height : ' + y-x)
			let z = document.getElementsByClassName('question-answer-container')
			let q = document.getElementsByClassName('question')
			for(i=0; i<z.length; i++){
				z[i].style.height = y-x-127 + 'px'
				q[i].style.minHeight = y-x-395 + 'px'
			}
		}
		// setQuestionContainerHeight()
		resizeWindowElements()
    </script>
<script>
	
//removeCookie()

examStarted()
$(window).blur(() => {
  checkCookie() // proctoring user via checking if window looses focus
})
document.getElementsByClassName('main-container')[0].style.display = 'flex'


// full screen trigger
let fullScreenModeBtn = document.getElementById('full-screen-mode')
let controlMode = 1;
let output = document.getElementById('output')
fullScreenModeBtn.addEventListener('click', () => {
    if(controlMode) {
    	controlMode = 0;
	    output.requestFullscreen()
	    fullScreenModeBtn.innerText = 'Exit Full Screen'
    }
    else {
    	controlMode = 1;
	    document.exitFullscreen() 
	    fullScreenModeBtn.innerText = 'Full Screen'
    }
})
showSwitchQuestionOption()

</script>


</body>

</html>
<?php 
if(!isset($_SESSION['test_started'])){
	$sql = "INSERT INTO `attempts` (`attempt_id`, `quiz_id`, `fullname`, `registration_no`, `email`, `score`, `total_marks`, `correct`, `wrong`, `not_attempted`, `pass_percentage`, `no_of_questions`, `time_stamp`) VALUES (NULL, '$_SESSION[exam_id]', '$_SESSION[name]', '$_SESSION[regNo]', '$_SESSION[email]', '0', '$totalMarksOfExam', '0', '0', '0', '$passingPercentage', '$_SESSION[question_no]', current_timestamp())";
       mysqli_query($conn,$sql) or die(mysqli_error($conn));
       $_SESSION['test_started'] = true;
}
?>

