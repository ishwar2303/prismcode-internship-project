  <?php
  session_start();
  require_once('connection.php');
  
  if(!isset($_SESSION['question_num']) || !isset($_SESSION['quiz_id']))
  header('location: admin_logout.php');
  
  $question = $_POST['question'];
  $option1  = $_POST['option1'];
  $option2  = $_POST['option2'];
  $option3  = $_POST['option3'];
  $option4  = $_POST['option4'];
  $answer   = $_POST['answer'];
  $reason   = $_POST['reason'];
  $formatted = $_POST['formatted'];
  $num      = $_SESSION['question_num'];
  $quiz_id  = $_SESSION['quiz_id'];
  
  
  function convertEntities($string){
    $string = trim($string);
    $string = htmlentities($string);
    $string = str_replace("&nbsp;", " ", $string);
    $string = str_replace("'", "&#39;", $string);
    $string = str_replace("\\", "&#92;", $string);
    return $string;
   }
     for($i=0;$i<$num;$i++)
     {
      $que = convertEntities($question[$i]);
      $o1 = convertEntities($option1[$i]);
      $o2 = convertEntities($option2[$i]);
      $o3 = convertEntities($option3[$i]);
      $o4 = convertEntities($option4[$i]);
      $res = convertEntities($reason[$i]);
      $form = convertEntities($formatted[$i]);
      $sql = "INSERT INTO `question_bank` (`question_id`, `quiz_id`, `question`, `option_1`, `option_2`, `option_3`, `option_4`, `answer`, `reason`, `formatted`) VALUES (NULL, '$quiz_id', '$que', '$o1', '$o2', '$o3', '$o4', '$answer[$i]', '$res', '$form')";
 	    mysqli_query($conn,$sql);
 	   }
      $total = $_SESSION['prev_que_no'] + $num;
      $sql = "UPDATE quizes SET number_of_questions='$total' WHERE quiz_id='$quiz_id'";
      mysqli_query($conn,$sql);

    $_SESSION['message'] = 'Questions Added Successfully';
    $_SESSION['color'] = '#68a030';

    unset($_SESSION['quiz_id']);
    unset($_SESSION['question_num']);
    header('location: admin_dashboard.php');
   ?>