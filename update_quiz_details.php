<?php 
session_start();
require_once('connection.php');
require_once('middleware.php');
$quiz_name_error = '';
$level_error = '';
$description_error = '';
$question_num_error = '';
$state_error = '';
$key_error = '';
$time_error = '';
$marks_error = '';
$negative_error = '';
$passing_error = '';
	if(isset($_POST['test']) && isset($_POST['level']) && isset($_POST['description'])  && isset($_POST['state']) && isset($_POST['exam_key']) && isset($_POST['time']) && isset($_POST['quizID'])){
		$quiz_name = cleanInput($_POST['test']);
		$description = cleanInput($_POST['description']);
		$key = cleanInput($_POST['exam_key']);
		$icon = '<i class="fas fa-exclamation-circle"></i>';
		$control = 1;
		$errors = array();
		if($quiz_name == ''){
			$control = 0;
			$quiz_name_error = $icon.' Quiz name required';
			array_push($errors,'Quiz name required');
		}
		
		if(isset($_POST['level'])){
		  $level = cleanInput($_POST['level']);
		  if($level == ''){
			  $control = 0;
			  $level_error = $icon.' Select level';
			  array_push($errors,'Select level');
		  }
		  else if($level!=1 && $level!=2 && $level!=3){
			  $control = 0;
			  $level_error = $icon.' Invalid level';
			  array_push($errors,'Invalid level');
		  }
		}
		else{
		  $control = 0;
		  $level_error = $icon.' Select level';
		  array_push($errors,'Select level');
		}
	
		if($description == ''){
			$control = 0;
			$description_error = $icon.' Description required';
			array_push($errors,'Description required');
		}
		else if(strlen($description) > 1500){
			$control = 0;
			$description_error = $icon.' Characters limit 1500';
			array_push($errors,'Characters limit 1500');
		}
	
		if(isset($_POST['state'])){
		  $state = cleanInput($_POST['state']);
		  if($state != 0 && $state != 1){
			  $control = 0;
			  $state_error = $icon.' Invalid status';
			  array_push($errors,'Invalid status');
		  }
		}
		else{
		  $control = 0;
		  $state_error = $icon.' Status required';
		  array_push($errors,'Status required');
		}
	
		if($key == ''){
			$control = 0;
			$key_error = $icon.' Exam key required';
			array_push($errors,'Exam key required');
		}
		else if(strlen($key)<6 || strlen($key) > 15){
			$control = 0;
			$key_error = $icon.'Exam Key : Minimum 6 characters and Maximum 15 characters';
			array_push($errors,'Exam Key : Minimum 6 characters and Maximum 15 characters');
		}
	
		if(isset($_POST['time'])){
		  $time = cleanInput($_POST['time']);
		  if($time!=-1 && $time!=900 && $time!=1800 && $time!=2700 && $time!=3600 && $time!=7200 && $time!=10800){
			$control = 0;
			$time_error = $icon.' Choose time from given options';
			array_push($errors,'Choose time from given options');
		  }
		}
		else{
		  $control = 0;
		  $time_error = $icon.' Time required';
		  array_push($errors,'Time required');
		}
	
		if(isset($_POST['marks'])){
		  $marks = cleanInput($_POST['marks']);
		  if($marks!=1 && $marks!=2 && $marks!=3 && $marks!=4){
			$control = 0;
			$marks_error = $icon.' Choose marks from given options';
			array_push($errors,'Choose marks from given options');
		  }
		}
		else{
		  $control = 0;
		  $marks_error = $icon.' Mark per question required';
		  array_push($errors,'Mark per question required');
		}
		
		if(isset($_POST['negative'])){
		  $negative = cleanInput($_POST['negative']);
		  if($negative!=0 && $negative!=0.5 && $negative!=1 && $negative!=2){
			$control = 0;
			$negative_error = $icon.' Choose negative marking from given options';
			array_push($errors,'Choose negative marking from given options');
		  }
		}
		else{
		  $control = 0;
		  $negative_error = $icon.' Negative marking required';
		  array_push($errors,'Negative marking required');
		}
		
		if(isset($_POST['passing'])){
		  $passing = cleanInput($_POST['passing']);
		  if($passing!=50 && $passing!=60 && $passing!=70 && $passing!=80 && $passing!=90){
			$control = 0;
			$passing_error = $icon.' Choose passing marks from given options';
			array_push($errors,'Choose passing marks from given options');
		  }
		}
		else{
		  $control = 0;
		  $passing_error = $icon.' Passing percentage required';
		  array_push($errors,'Passing percentage required');
		}
	     $quizID = cleanInput($_POST['quizID']);
		 if($control){
			if($level == 1)
				$level = 'Beginner';
			if($level == 2)
				$level = 'Intermediate';
			if($level == 3)
				$level = 'Advance';
			$sql = "UPDATE quizes SET quiz_name='$quiz_name', difficulty_level='$level', description='$description', is_active='$state', Exam_key='$key', time_duration='$time', marks_per_question='$marks', negative_marking='$negative', passing_percentage='$passing' WHERE quiz_id='$quizID'";
			mysqli_query($conn,$sql) or die(mysqli_error($conn));
			$_SESSION['message'] = 'Quiz Updated Successfully';
			$_SESSION['color'] = '#68a030';
		}
		else{
			$_SESSION['error_msg'] = 'Please fill details appropriately';
			foreach($errors as $err){
				$_SESSION['error_msg'] .= '<br/>'.$err;
			}
		}
		header('Location: admin_dashboard.php');
 	}
 	else {
 		$_SESSION['message'] = 'Something Went Wrong!';
 		$_SESSION['color'] = '#cd201f';
	     header('Location: admin_dashboard.php');
 		
 	}
?>