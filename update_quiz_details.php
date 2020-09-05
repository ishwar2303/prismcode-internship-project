<?php 
session_start();
require_once('connection.php');
	if(isset($_POST['test']) && isset($_POST['level']) && isset($_POST['description'])  && isset($_POST['state']) && isset($_POST['exam_key']) && isset($_POST['time']) && isset($_POST['quizID'])){
	     $quiz_name = $_POST['test'];
	     $quiz_name = mysqli_real_escape_string($conn,$quiz_name);
	     $quiz_name = strip_tags($quiz_name);
	     $level = $_POST['level'];
	     $level = mysqli_real_escape_string($conn,$level);
	     $level = strip_tags($level);
	     $description = $_POST['description'];
	     $description = strip_tags($description);
	     $description = str_replace("\n", "<br/>", $description);
	     $description = mysqli_real_escape_string($conn,$description);
	     $state = $_POST['state'];
	     $state = strip_tags($state);
	     $key = $_POST['exam_key'];
	     $key = strip_tags($key);
	     $time = $_POST['time'];
	     $time = strip_tags($time);
	     $passing = $_POST['passing'];
	     $marks = $_POST['marks'];
	     $negative = $_POST['negative'];
	     $quizID = $_POST['quizID'];
	     $quizID = mysqli_real_escape_string($conn,$quizID);
	     $sql = "UPDATE quizes SET quiz_name='$quiz_name', difficulty_level='$level', description='$description', is_active='$state', Exam_key='$key', time_duration='$time', marks_per_question='$marks', negative_marking='$negative', passing_percentage='$passing' WHERE quiz_id='$quizID'";
	     mysqli_query($conn,$sql) or die(mysqli_error($conn));
	     $_SESSION['message'] = 'Quiz Updated Successfully';
	     $_SESSION['color'] = '#27ae60';
	     header('Location: admin_dashboard.php');
 	}
 	else {
 		$_SESSION['message'] = 'Something Went Wrong!';
 		$_SESSION['color'] = '#e74c3c';
	     header('Location: admin_dashboard.php');
 		
 	}
?>