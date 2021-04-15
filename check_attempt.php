<?php 

 	session_start();
 	require_once('connection.php');
  if(isset($_SESSION['exam_end'])){
    header('Location: feedback.php');
    return;
  }
    if(isset($_SESSION['student_login_time']))
     {
        $current_time = time();
        $student_login_time = $_SESSION['student_login_time'];
        if($current_time - $student_login_time   > 30000) 
        {
         header('location: logout.php');
        }
     }
     else header('location: logout.php');
    if(isset($_POST['setTest'])){
      $_SESSION['test_is_set'] = true;
      ?>
      <script type="text/javascript">onClickBlackCover();</script>
      <script type="text/javascript">location.href='takeexam.php';</script>
      <?php
    }
     else if(isset($_POST['unsetSession'])){
      unset($_SESSION['exam_id']);
      unset($_SESSION['exam_key']);
      unset($_SESSION['quiz_name']);
      unset($_SESSION['time_duration']);
      unset($_SESSION['QUESTIONS']);
      ?>
        <script type="text/javascript">onClickBlackCover();</script>
      <?php
     }
    else if(isset($_POST['test_selected']) && isset($_POST['exam_key']))
    {
      if(!empty($_POST['test_selected']) && !empty($_POST['exam_key']))
      {
        $quiz_id =  $_POST['test_selected'];
        $exam_key = mysqli_real_escape_string($conn,$_POST['exam_key']);
         
         $sql = "SELECT * FROM attempts WHERE (quiz_id='$quiz_id' AND email='$_SESSION[email]') OR (quiz_id='$quiz_id' AND registration_no='$_SESSION[regNo]')";
         $result = mysqli_query($conn,$sql);
         if($result->num_rows == 0)
         {

         	 $sql = "SELECT * FROM quizes WHERE quiz_id='$quiz_id'";
    		   $result = mysqli_query($conn,$sql);

          		 if($result->num_rows == 1)
          		 {
            			$row = $result->fetch_assoc();
            			$KEY = $row['Exam_key'];
            			$time_duration = $row['time_duration'];
                  $numberOfQuestions = $row['number_of_questions'];
                  $shuffle = $row['shuffle'];
            		 if($KEY != $exam_key){
                  ?>
                    <script type="text/javascript">showIncorrectKeypopup();</script>
                  <?php
                 }
            		 else
                 { 
                          $_SESSION['exam_key'] = $exam_key;
                          $_SESSION['exam_id'] = $quiz_id;
                          $_SESSION['time_duration'] = $time_duration;
                          $_SESSION['quiz_name'] = $row['quiz_name'];
                          $marks = $row['marks_per_question'];
                          $passing = $row['passing_percentage'];
                          $negative = $row['negative_marking'];
                          
                            if($row['time_duration']==900)
                            $time_duration = "15 Minutes";
                            if($row['time_duration']==1800)
                            $time_duration = "30 Minutes";
                            if($row['time_duration']==2700)
                            $time_duration = "45 Minutes";
                            if($row['time_duration']==3600)
                            $time_duration = "1 Hour";
                            if($row['time_duration']==7200)
                            $time_duration = "2 Hours";
                            if($row['time_duration']==10800)
                            $time_duration = "3 Hours";

                          $sql = "SELECT * FROM question_bank WHERE quiz_id='$quiz_id'";
                          $resultQue = mysqli_query($conn,$sql);
                          if(isset($_SESSION['QUESTIONS']))
                            unset($_SESSION['QUESTIONS']);
                          $_SESSION['QUESTIONS'] = array();
                          $_SESSION['CORRANSWERS'] = array();
                          $questions = array();
                          $answers = array();
                          while($rowQue = $resultQue->fetch_assoc()){
                            array_push($questions, $rowQue['question_id']);
                            array_push($answers, $rowQue['answer']);
                          }
                          if($shuffle){
                              $count = 0;
                              $itr = 0;
                              $num = sizeof($questions);
                              $key = mt_rand(1,$num-1);
                              while(sizeof($_SESSION['QUESTIONS']) < $num)
                              {
                                if($count == $key){
                                  array_push($_SESSION['QUESTIONS'], $questions[$itr]);
                                  array_push($_SESSION['CORRANSWERS'], $answers[$itr]);
                                  $count = 0;
                                  $questions[$itr] = -1;
                                }

                                $itr++;
                                $itr = $itr%$num;
                                if($questions[$itr] != -1)
                                  $count++;
                              }
                          }
                          else{
                            $_SESSION['QUESTIONS'] = $questions;
                            $_SESSION['CORRANSWERS'] = $answers;
                          }
                          ?>
                            <label style="display: flex;justify-content: flex-end;padding-right: 20px;font-weight: 600;"><?php echo $row['difficulty_level'];?></label>
                            <label style="font-weight: 600;font-size: 17px;padding-left: -10px;"><?php echo $row['quiz_name'];?></label>
                            <ul id="" style="list-style: circle;">
                              <li><i class="fas fa-angle-right list-icon"></i>Quiz contain <?php echo $numberOfQuestions;?> Questions.</li>
                              <li><i class="fas fa-angle-right list-icon"></i>Time duration for Quiz is <?php echo $time_duration;?>.</li>
                              <li><i class="fas fa-angle-right list-icon"></i>Each Question constitute <?php echo $marks;?> marks.</li>
                              <li><i class="fas fa-angle-right list-icon"></i>
                                <?php 
                                  if($negative == 0){
                                    echo "No negative marking.";
                                  }
                                  else{
                                    echo "For wrong answer $negative will be deducted.";
                                  }
                                ?>
                              </li>
                              <!-- <li><i class="fas fa-angle-right list-icon"></i>Certification clearing percentage is <?php echo $passing;?>%.</li> -->
                              
                              <li><i class="fas fa-angle-right list-icon"></i>One can switch to any Question at any time.</li> 
                              <li><i class="fas fa-angle-right list-icon"></i>Only 1 Attempt is available.</li> 
                              <li><i class="fas fa-angle-right list-icon"></i>Internet connection broke! 
                                <ul style="padding-left: 25px;">
                                  <li style="color:red;"><i class="fas fa-times sub-list-icon"></i>Don't close browser else exam will be canceled.</li>
                                  <li style="color:green;"><i class="fas fa-check sub-list-icon"></i>Wait for reconnectivity.</li>
                                </ul>
                              </li>
                              <li style="color : blue;"><i class="fas fa-angle-right list-icon"></i>You will be proctored during the exam.</li>
                              <li></li>
                              <li></li>
                              <li></li>
                              <li></li>
                              <li></li>
                            </ul>
                          <script type="text/javascript">showPopupContainer();</script>
                          <?php
                       }
          		 }

         	
         }
         else  {

                    ?>
                    <script type="text/javascript">showAlreadyGivenExamPopup();</script>
                    <?php
        }
      }
    }
 	
?>