<!DOCTYPE html>
<html>
<head>
  <title>Reported Queries | Admin</title>
</head>
</html>
<?php
    session_start();
    require_once('connection.php');
    require_once('middleware.php');
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

     if(isset($_GET['deleteReportId'])){
         $delete_report_id = cleanInput($_GET['deleteReportId']);
         $sql = "DELETE FROM reported_questions WHERE report_id='$delete_report_id'";
         $conn->query($sql);
         if($conn->error == ''){
             $_SESSION['success_msg'] = 'Issue deleted sucessfully';
         }
         else{
             $_SESSION['error_msg'] = $conn->error;
         }
         header('Location: view-reported-queries.php');
         exit;
     }
     if(isset($_GET['changeStatus']) && isset($_GET['toggle'])){
         $change_status_report_id = cleanInput($_GET['changeStatus']);
         $toggle = cleanInput($_GET['toggle']);
         if($toggle == 1 || $toggle == 0){
             $toggle = !$toggle;
             if($toggle == 1)
                $msg = 'Issue marked as resolved';
             else $msg = 'Issue marked as pending';
             $sql = "UPDATE reported_questions SET amend='$toggle' WHERE report_id='$change_status_report_id'";
             $conn->query($sql);
             if($conn->error == ''){
                 $_SESSION['success_msg'] = $msg;
             }
             else{
                 $_SESSION['error_msg'] = $msg;
             }
             header('Location: view-reported-queries.php');
             exit;
         }
     }

     $sql = "SELECT reported_questions.report_id, reported_questions.question_id, reported_questions.amend, reported_questions.problem, reported_questions.email, reported_questions.timestamp, question_bank.question, question_bank.formatted, quizes.quiz_name, quizes.quiz_id FROM `reported_questions` JOIN `question_bank` on reported_questions.question_id=question_bank.question_id JOIN `quizes` on question_bank.quiz_id=quizes.quiz_id;";
     $report_result = $conn->query($sql);

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
						<h2 class="card-title">Reported Queries</h2>
					</div>
					<?php require 'includes/flash-message.php'; ?>
                    <div>
                    <?php 
                        while($row = $report_result->fetch_assoc()){
                            ?>
                            <div class="card mt-1">
                                <div class="space-between ">
                                    <div class="h5">Quiz : <?php echo $row['quiz_name']; ?></div>
                                    <div>
                                        <a onclick="return confirm('Are you sure')" href="view-reported-queries.php?changeStatus=<?php echo $row['report_id']; ?>&toggle=<?php echo $row['amend']; ?>" class="block-theme-edit-icon">
                                            
                                            <?php $amend = $row['amend'];
                                                if($amend == 1){
                                                    ?>
                                                    <i class="fas fa-check-double"></i>
                                                    <div class="block-theme-edit-hint">Mark as pending</div>
                                                    <?php
                                                } 
                                                else{
                                                    ?>
                                                    <i class="fas fa-exclamation-circle"></i>
                                                    <div class="block-theme-edit-hint">Mark as resolved</div>
                                                    <?php
                                                }
                                            ?>
                                        </a>
                                        <a onclick="return confirm('Are you sure')" href="view-reported-queries.php?deleteReportId=<?php echo $row['report_id']; ?>" class="block-theme-delete-icon">
                                            <i class="fas fa-trash-alt"></i>
                                            <div class="block-theme-delete-hint">Delete Issue</div>
                                        </a>
                                    </div>
                                </div>
                                <div class="h6 mb-0">Question</div>
                                <div class="pd-tb-5px">
                                    <?php 
                                        if(!$row['formatted'])
                                            echo $row['question'];
                                        else{
                                            ?>
<pre>
<code><?php echo $row['question']; ?></code>
</pre>
                                            <?php
                                        }
                                    ?>
                                </div>
                                <div class="h6 mt-1 mb-0">Issue</div>
                                <div class=" danger"><?php echo str_replace("\n", "<br/>", $row['problem']); ?></div>
                                <hr>
                                <div class="h6 space-between">
                                    <?php echo $row['amend'] == 1 ? '<span class="green-block">Solved</span>' : '<span class="red-block">Unsolved</span>'; ?>
                                    <button class="btn btn-primary" onclick="location.href='questionnaire.php?exam_id=<?php echo $row['quiz_id']; ?>'">Go to Quiz</button>
                                </div>
                                <div class="space-between mt-1">
                                    <?php $time = new DateTime($row['timestamp']); ?>
                                    <div class="h6">Reported on <br/><?php echo $time->format('d-m-Y').'<br/>'.$time->format('h:i:sa'); ?></div>
                                    <div class="h6">Reported by <br/><?php echo $row['email']; ?></div>
                                </div>
                            </div>
                            <?php
                        }
                    ?>
                    </div>
                    <?php  
                        if($report_result->num_rows == 0){
                            ?>
                                <div class="danger pd-20px"><i class="fas fa-exclamation-circle"></i> No Reported Issues</div>
                            <?php
                        }
                    ?>
				</div>
			</div>
		</div>
		<hr>
		
	</div>
    
   
	<?php include 'includes/scripts.php'; ?>
	
</body>

</html>