<?php 

require_once('connection.php');
if(isset($_POST['quizID'])){
	$sql = "SELECT * FROM quizes WHERE quiz_id='$_POST[quizID]'";
	$result = mysqli_query($conn,$sql);
  if($result->num_rows>0){
	$row = $result->fetch_assoc();

                            if($row['time_duration'] == -1)
                            $time_duration = 'No Time Limit';
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

?>
                  <div id="quiz-name"><?php echo $row['quiz_name'];?></div>
                  <?php 
                  $height = "225px";
                  if($row['key_access']){
                    $height = "200px";
                  ?>
                  <div id="exam-key" class="desc-block">
                    <span>Exam Key <span class="exam-key"><?php echo $row['Exam_key'];?></span></span>
                    <span><?php echo $row['difficulty_level']; ?></span>
                  </div>
                  <?php 
                  }
                  ?>
                  <div id="questions-time"><span>Questions <span class="no-of-questions"><?php echo $row['number_of_questions'];?></span></span><span>Duration <span class="duration"><?php echo $time_duration;?></span></span></div>
                  <div class="desc-block">
                    <span>Marks per Question 
                      <span class="mark-per-question"> <?php echo $row['marks_per_question']; ?></span>
                    </span>
                    <?php $negative_marking = $row['negative_marking']; ?>
                    <span style="margin-left:125px;">
                    <?php 
                          if($negative_marking == 0)
                            echo 'No Negative Marking'; 
                          else echo 'Negative Marking Per Question <span class="negative-marking">-'.$negative_marking.'</span>';
                          ?>
                    </span>
                  </div>
                  <div class="desc-block">
                    <span>Certification on <span class="certification-on"><?php echo $row['passing_percentage']."%"; ?></span></span>
                  </div>
                  <div style="max-height: <?php echo $height;?>" id="quiz-description"><h6 class="f-w-bold">Description</h6><div><?php echo str_replace("\n", "</br>", $row['description']);?></div></div>
                  <script type="text/javascript">openDescriptionPopup();</script>
                  <?php
          }
          else{
            ?>
                  <label class="cancel-icon-container">
                    <i onclick="closeDescriptionPopup()" class="fas fa-times"></i>
                  </label>
                  <div id="quiz-name"></div>
                  <div id="quiz-description" style="color : red;">Quiz no more available!</div>
                  <script type="text/javascript">openDescriptionPopup();</script>

            <?php
          }
  }
?>