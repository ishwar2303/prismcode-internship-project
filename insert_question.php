<?php
  session_start();
  require_once('connection.php');
  if(!isset($_SESSION['question_feeded']))
  header('location: admin_logout.php');

  $question = $_POST['question'];
  $option1  = $_POST['option1'];
  $option2  = $_POST['option2'];
  $option3  = $_POST['option3'];
  $option4  = $_POST['option4'];
  $answer   = $_POST['answer'];
  $reason   = $_POST['reason'];
  $num      = $_SESSION['question_num'];
  $quiz_id  = $_SESSION['quiz_id'];
  
  
     for($i=0;$i<$num;$i++)
     {
      $que = $question[$i];
      $que = htmlentities($que);
      $que = str_replace("  ", "&nbsp;&nbsp;", $que);
      $que = str_replace("'", "&#39;", $que);
      $que = str_replace("\n", "<br/>", $que);
      $o1 = $option1[$i];
      $o1 = htmlentities($o1);
      $o1 = str_replace("  ", "&nbsp;&nbsp;", $o1);
      $o1 = str_replace("'", "&#39;", $o1);
      $o1 = str_replace("\n", "<br/>", $o1);
      $o2 = $option2[$i];
      $o2 = htmlentities($o2);
      $o2 = str_replace("  ", "&nbsp;&nbsp;", $o2);
      $o2 = str_replace("'", "&#39;", $o2);
      $o2 = str_replace("\n", "<br/>", $o2);
      $o3 = $option3[$i];
      $o3 = htmlentities($o3);
      $o3 = str_replace("  ", "&nbsp;&nbsp;", $o3);
      $o3 = str_replace("'", "&#39;", $o3);
      $o3 = str_replace("\n", "<br/>", $o3);
      $o4 = $option4[$i];
      $o4 = htmlentities($o4);
      $o4 = str_replace("  ", "&nbsp;&nbsp;", $o4);
      $o4 = str_replace("'", "&#39;", $o4);
      $o4 = str_replace("\n", "<br/>", $o4);
      $res = $reason[$i];
      $res = htmlentities($res);
      $res = str_replace("  ", "&nbsp;&nbsp;", $res);
      $res = str_replace("'", "&#39;", $res);
      $res = str_replace("\n", "<br/>", $res);
      $sql = "INSERT INTO `question_bank` (`question_id`, `quiz_id`, `question`, `option_1`, `option_2`, `option_3`, `option_4`, `answer`, `reason`) VALUES (NULL, '$quiz_id', '$que', '$o1', '$o2', '$o3', '$o4', '$answer[$i]', '$res')";
 	    mysqli_query($conn,$sql);
 	   }



    $_SESSION['message'] = 'Questions Added Successfully';
    $_SESSION['color'] = '#27ae60';
    unset($_SESSION['question_feeded']);
   header('location: admin_dashboard.php');
 	


?>