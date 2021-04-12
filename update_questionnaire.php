<?php
	session_start();
	require_once('connection.php');
    
    if(!isset($_SESSION['ques_update_set']))
     header('location: admin_logout.php');
  
  $question = $_POST['question'];
  $option1  = $_POST['option1'];
  $option2  = $_POST['option2'];
  $option3  = $_POST['option3'];
  $option4  = $_POST['option4'];
  $answer   = $_POST['answer'];
  $reason   = $_POST['reason'];
  $num      = $_SESSION['ques_num'];
  $questionID = $_POST['questionID'];

  function convertEntities($string){
    $string = trim($string);
    $string = htmlentities($string);
    $string = str_replace("&nbsp;", " ", $string);
    $string = str_replace("'", "&#39;", $string);
    
    $string = str_replace("\\", "&#92;", $string);
    return $string;
   }
    $i=0;
    foreach ($questionID as $ID){
      $que = convertEntities($question[$i]);
      $o1 = convertEntities($option1[$i]);
      $o2 = convertEntities($option2[$i]);
      $o3 = convertEntities($option3[$i]);
      $o4 = convertEntities($option4[$i]);
      $res = convertEntities($reason[$i]);
      $sql = "UPDATE question_bank SET question='$que', option_1='$o1', option_2='$o2', option_3='$o3', option_4='$o4', answer='$answer[$i]', reason='$res' WHERE question_id='$ID'";
      mysqli_query($conn,$sql);
      $i = $i + 1;
    }
    $_SESSION['message'] = 'Questionnaire Updated';
    $_SESSION['color'] = '#27ae60';
    unset($_SESSION['ques_update_set']);
    header('location: admin_dashboard.php');
?>