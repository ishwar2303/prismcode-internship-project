<?php 
	require_once('connection.php');
	require_once('middleware.php');
	if(isset($_POST['QuizID']) && isset($_POST['EmailReg'])){
		$quizID = cleanInput($_POST['QuizID']);
		$emailReg = cleanInput($_POST['EmailReg']);
		$sql = "SELECT * FROM attempts WHERE (email='$emailReg' AND quiz_id='$quizID') or (registration_no='$emailReg' AND quiz_id='$quizID')";
		$result = mysqli_query($conn,$sql);
		$rowCandidate = $result->fetch_assoc();
		if($result->num_rows>0){
			$sql = "SELECT * FROM quizes WHERE quiz_id='$quizID'";
			$result = mysqli_query($conn,$sql);
			$row = $result->fetch_assoc();


			if($row['show_evaluation']==1){
				?>
				<div style="width:100%;color: blue;margin-bottom: 10px;border-bottom: 1.5px solid #bdc3c7; padding-bottom: 5px;"><b><?php echo $row['quiz_name']; ?></b></div>
				<div>
					<label><span><b>Date :</b></span> 
						<span>
						<?php
						$time = explode(' ',$rowCandidate['time_stamp']);
						echo $time[0];
						?>							
						</span>
					</label>
				</div>
				<div>
					<label><span><b>Candidate :</b></span> <span><?php echo $rowCandidate['fullname'];?></span></label>
				</div>
				<?php 
				if($rowCandidate['registration_no'] == '')
					$regNo = 'Not Provided';
				else $regNo = $rowCandidate['registration_no'];
				?>
				<div>
					<label><span><b>Registration No :</b></span> <span><?php echo $regNo;?></span></label>
				</div>
				<div>
					<label>
						<span><b>E-mail :</b></span></span> <span><?php echo $rowCandidate['email'];?></span>
					</label>
				</div>

				<div>
					<label>
						<span class="align-same"><b>Total Questions</b></span> <span><?php echo ": ".$rowCandidate['no_of_questions'];?></span>
					</label>
				</div>
				<div>
					<label>
						<span class="align-same"><b>Correct Answers</b></span> <span><?php echo ": ".$rowCandidate['correct'];?></span>
					</label>
				</div>
				<div>
					<label>
						<span class="align-same"><b>Wrong Answers</b></span> <span><?php echo ": ".$rowCandidate['wrong'];?></span>
					</label>
				</div>
				<div>
					<label>
						<span class="align-same"><b>Not Attempted</b></span> <span><?php echo ": ".$rowCandidate['not_attempted'];?></span>
					</label>
				</div>
				<div>
					<label>
						<span class="align-same"><b>Total Marks</b></span> <span><?php echo ": ".$rowCandidate['total_marks'];?></span>
					</label>
				</div>
				<div>
					<label>
						<span class="align-same"><b>Your Score</b></span></span> <span><?php echo ": ".$rowCandidate['score'];?></span>
					</label>
				</div>
				<?php 
				$percentage = ($rowCandidate['score']/$rowCandidate['total_marks'])*100;

			    $b=0;
			    $control = 0;
			    $ans = "";
			         $str = $percentage.'A';
			         $p=0;
			         
			         while($str["$p"]!='A' && $b != 3)
			         {
			           $ans = $ans.$str["$p"];
			           
			           if($str["$p"]=='.' || $control ==1)
			            {$b = $b + 1; $control=1;}
			           
			           $p++;

			         }
			         $ans = (int)$ans;
			         if($ans<0)	
			         	$ans = 0;
				?>
				<div>
					<label><span class="align-same"><b>Your Percentage :</b></span></span> <span><?php echo $ans.'%';?></span></label>
				</div>
				<div>
					<label><span><b>Evaluation :</b></span> 
						
						<?php
						if($percentage>=$rowCandidate['pass_percentage']){
							?>
							<span style="color: green">Congratulations</span>
							<?php
						}
						else{
							?>
							<span style="color:red">You need more Practice!</span>
							<?php
						}

						?>
						
					</label>
				</div>
				<script type="text/javascript">
					document.getElementById('result-card').style.display = 'block';
					document.getElementsByClassName('black-cover-for-result')[0].style.display = 'block';
				</script>
				<?php 
			}
			else{
				?>
				<script type="text/javascript">showResultNotOpenPopup();</script>
				<?php 
			}
		}
		else{
			?>
			<script type="text/javascript">showNoAttemptsFound();</script>
			<?php
		}
	}
?>