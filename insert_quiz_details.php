<?php
    
    session_start();
		require_once('connection.php');
    
   if(!isset($_SESSION['quiz_details_Set']))
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
    if(isset($_SESSION['email']) && isset($_SESSION['name']))
    {
    	$email = $_SESSION['email'];
        $name = $_SESSION['name'];
        $_SESSION['question_details_set'] = true; 
    }
    else {
    	header('location: admin_logout.php');
    }

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
     $question_num = $_POST['question_num'];
     $question_num = strip_tags($question_num);
     $state = $_POST['state'];
     $state = strip_tags($state);
     $key = $_POST['exam_key'];
     $key = strip_tags($key);
     $time = $_POST['time'];
     $time = strip_tags($time);
     $marks = $_POST['marks'];
     $negative = $_POST['negative'];
     $passing = $_POST['passing'];
     $_SESSION['question_num'] = $question_num;
     $_SESSION['quiz_name'] = $quiz_name;
     //print_r($_POST);
     if(!empty($quiz_name) && !empty($level) && !empty($description) && !empty($question_num) && !empty($key) && !empty($marks) && !empty($passing)){
     $sql = "INSERT INTO `quizes` (`quiz_id`, `quiz_name`, `difficulty_level`, `description`, `number_of_questions`, `is_active`, `Exam_key`, `key_access`, `shuffle`, `time_duration`, `marks_per_question`, `negative_marking`, `passing_percentage`, `admin_email_id`, `time_stamp`) VALUES (NULL, '$quiz_name', '$level', '$description', '$question_num', '$state', '$key', '0', '0', '$time', '$marks', '$negative', '$passing', '$_SESSION[admin_id]', current_timestamp())";
         mysqli_query($conn,$sql) or die(mysqli_error($conn));
         $last_id = $conn->insert_id;
         $_SESSION['quiz_id'] = $last_id;
         $_SESSION['message'] = 'Quiz Created Successfully';
         $_SESSION['color'] = '#68a030';
         header('location: question_feed.php');
    }
    else{
    $_SESSION['message'] = 'Something Went Wrong!';
    $_SESSION['color'] = '#cd201f';
    header('location: createquiz.php');
    }
?>