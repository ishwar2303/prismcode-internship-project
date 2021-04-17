<!DOCTYPE html>
<html>
<head>
  <title>Insert Questions | Admin</title>
</head>
</html>
<?php
session_start();
require_once('connection.php');

    if(!isset($_SESSION['question_details_set']))
    	header('location: admin_logout.php');
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


    $_SESSION['question_feeded'] = true;


?>
<!DOCTYPE html>
<html>

	<title>Feed Quiz Question</title>
	<?php include 'includes/header.php'; ?>
    <?php include 'includes/navbar.php'; ?>

		<h1></h1>
	
        <div class="my-3 my-md-5">
		<div class="container">
			<div class="page-header">
			</div>
			<div style="margin : 34px -12px;" class="row row-cards row-deck">
				<div class="col-12">
					<div class="card">
						<div class="card-header">
							<h3 class="card-title">Fill All Entries</h3>
						</div>
						<div class="card-body">
							<form action="insert_question.php" method="post" >
								<?php require 'includes/flash-message.php'; ?>
			
           <?php
             
             $n = $_SESSION['question_num'];
            for($i=1;$i<=$n;$i++)
            {
            	?>
					<div style="margin-left: 0.25rem;margin-right: 0.25rem;" class="row p-4 mb-2 border rounded border-muted">
						<div class="col-sm-12 col-lg-12">
							<div class="form-group">
								<label class="form-label">Question <?php echo  $i; ?></label>
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
								<select name="answer[]" class="form-control ht-50 custom-select" required>
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
				<div class="d-flex" style="display: flex;justify-content: flex-end;">
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
		
	
  
   <?php include 'includes/scripts.php';?>
</body>

</html>