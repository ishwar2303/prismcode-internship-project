<!DOCTYPE html>
<html>
<head>
  <title>Add Question | Admin</title>
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

	<title>Feed Quiz Question</title>
	<style type="text/css">
		
	.explaining-feature{
		margin-bottom: 30px;
		margin-top: -40px;
		background: white;
		padding: 10px;
		border-radius: 5px;
		border: 0.5px solid #e4e4e4;
		margin-left: 5px;
		margin-right: 5px;
	}
	</style>
	<?php include 'includes/header.php'; ?>
    <?php include 'includes/navbar.php'; ?>
 <script>

 </script>
		<div class="my-3 my-md-5">
		<div class="container">
<!-- 
  <div style="height: 55px;"></div> -->
			<div style="margin:58px -12px;" class="row row-cards row-deck">
				<div class="col-12">
					<div class="card">
						<div class="card-header">
							<h3 class="card-title">
								
					Add more questions to Questionnaire
							</h3>
						</div>
						<div class="card-body1">
							<form action="" method="post">
								<div class="row">
									<div style="padding: 3px 20px;" class="col-sm-12 col-lg-12">
										<div class="form-group">
											<label class="form-label">Quizzes</label>
											<select class="form-control custom-select select-exam" name="exam_id">
												<option value disabled>--Select--</option>
												<?php 
        
												$temp = "SELECT * FROM quizes WHERE admin_email_id='$_SESSION[admin_id]' ORDER BY quiz_name";
										                 $result = mysqli_query($conn,$temp);

										            while($row = $result->fetch_assoc())
										            {
										                echo "<option value='$row[quiz_id]'>$row[quiz_name]</option>";
										                 
										            }
												?>
											</select>
											<label class="form-label">Number of Questions : </label>
											<input type="number" id="questions" name="question_no" min= "1" max="20" class="form-control select-exam" placeholder="number of question" required>
											
										</div>
										<button name="submit" class="d-flex btn btn-primary ml-auto" value="Check" type="submit">Submit</button>
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
       if(isset($_POST['exam_id']) && isset($_POST['question_no']))
       {

       ?>
       	 <?php	
       	     $sql = "SELECT quiz_name FROM quizes WHERE quiz_id='$_POST[exam_id]'";
       	     $result = mysqli_query($conn,$sql);
       	     $row = $result->fetch_assoc();
       	     $QuizName = $row['quiz_name'];
             $sql = "SELECT * FROM question_bank WHERE quiz_id='$_POST[exam_id]'";
             $result = mysqli_query($conn,$sql);
             $temp = $result->num_rows; // questions quiz already contain
             $_SESSION['prev_que_no'] = $temp; 
             $space = 100 - $temp;   
             if($_POST['question_no']>$space)
             {
            ?>
              <script type="text/javascript">
               	
               	alert("This quiz contain <?php echo $temp;?> Questions already. Maximum limit is 100. So give question number accordingly.");

               </script>
         <?php
            }
            else
            {
            ?>
        
       
        <div class="my-3 my-md-5">
		<div class="container">
			<div class="page-header">
				<h1 class="page-title"></h1>
			</div>
			<div class="row row-cards row-deck">
				<div class="col-12">
					<div class="card">
						<div class="card-header">
							<h3 class="card-title">Fill All Entries (<?php echo $QuizName."  contain $temp questions."; ?>)</h3>
						</div>
						<div class="card-body">
						<form action="add_questions_to_questionnaire.php" method="post">
			
           <?php
            
             $_SESSION['quiz_id'] = $_POST['exam_id'];
             $n = $_POST['question_no'];
             $_SESSION['question_num'] = $n;
            for($i=1;$i<=$n;$i++)
            {
            	?>
					<div style="margin : 0;" class="row p-4 mb-2 border rounded border-muted">
											<div class="col-sm-12 col-lg-12">
												<div class="form-group">
													<label class="form-label">Question<?php echo  $i; ?></label>
													<textarea name="question[]" class="form-control" rows="4" placeholder="Question <?php echo  $i; ?>" required></textarea>
												</div>
												<div>
													<label class="formatted-label">Formatted : </label>
													<select name="formatted[]" class="select-prop-format formatted">
														<option value="0">No</option>
														<option value="1">Yes</option>
													</select>
												</div>
											</div>
											<div class="col-sm-12 col-lg-6">
												<div class="form-group">
													<label class="form-label">Option 1</label>
													<textarea type="text" name="option1[]" class="form-control" placeholder="Option 1"  required></textarea>
												</div>
											</div>
											<div class="col-sm-12 col-lg-6">
												<div class="form-group">
													<label class="form-label">Option 2</label>
													<textarea type="text" name="option2[]" class="form-control" placeholder="Option 2"  required></textarea>
												</div>
											</div>
											<div class="col-sm-12 col-lg-6">
												<div class="form-group">
													<label class="form-label">Option 3</label>
													<textarea type="text" name="option3[]" class="form-control" placeholder="Option 3"  required></textarea>
												</div>
											</div>
											<div class="col-sm-12 col-lg-6">
												<div class="form-group">
													<label class="form-label">Option 4</label>
													<textarea type="text" name="option4[]" class="form-control" placeholder="Option 4"  required></textarea>
												</div>
											</div>
											<div class="col-sm-12 col-lg-12">
												<div class="form-group">
													<label class="form-label">Answer</label>
													<select name="answer[]" class="form-control custom-select" required>
														<option value='1'>Option 1</option>
														<option value='2'>Option 2</option>
														<option value='3'>Option 3</option>
														<option value='4'>Option 4</option>
													</select>
												</div>
											</div>
											<div class="col-sm-12 col-lg-12">
												<div class="form-group">
													<label class="form-label">Explanation</label>
													<textarea name="reason[]" class="form-control" rows="4" placeholder="Explanation" ></textarea>
												</div>
											</div>		
										</div>
				<?php

	     	}
			?>
			
			                           <div class="card-footer text-right">
								         <div style="display: flex;justify-content: flex-end;" class="d-flex">
								           <button  type="submit" class="btn btn-primary ml-auto" id="save-changes" value="Save Changes">Submit</button>
								         </div>
								       </div> 
		
		</form>
						</div>
					</div>
				</div>	
			</div>
		</div>
	</div>	
		
		<?php
	    }
	 }
	    ?>

		<!-- <div class="explaining-feature">
			<h4>Select a Quiz</h4>
			<ul>
				<li>Enter number of questions you want to Add.</li>
				<li>Fill entries</li>
				<li>Submit</li>
			</ul>
		</div> -->
   <?php include 'includes/scripts.php';?>
  
</body>
</html>