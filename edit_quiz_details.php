<?php 
require_once('connection.php');
if(isset($_POST['updateQuizDetails']) && isset($_POST['quizID'])){
	$sql = "SELECT * FROM quizes WHERE quiz_id='$_POST[quizID]'";
	$result = mysqli_query($conn,$sql);
	$row = $result->fetch_assoc();
	?>
	<div class="card-body">
         <form id ="update_quiz_form" action ="update_quiz_details.php" method="POST" onsubmit="return validation()">
           <div class="row">
             <div class="col-sm-12 col-lg-12">
               <div class="form-group">
                 <label class="form-label">Quiz Name</label>
                 <input id="quiz_name"   type="text" name="test" maxlength="30" class="form-control" placeholder="Quiz Name" value="<?php echo $row['quiz_name'];?>" required="">
               </div>
             </div>
             <div class="col-sm-12 col-lg-12">
               <div class="form-group">
                <label class="form-label">Difficulty Level</label>
                <div class="selectgroup w-100">
                	<?php 
                		$radio1 = "";
                		$radio2 = "";
                		$radio3 = "";
                		if($row['difficulty_level'] =="Beginner")
                			$radio1 = "checked='true'";
                		if($row['difficulty_level'] == "Intermediate")
                			$radio2 = "checked='true'";
                		if($row['difficulty_level'] == "Advance")
                			$radio3 = "checked='true'";
                	?>
                   <label class="selectgroup-item">
                     <input type="radio" name="level" value="Beginner" class="selectgroup-input" <?php echo $radio1." ";?>required="">
                     <span class="selectgroup-button level">Beginner</span>
                   </label>
                   <label class="selectgroup-item">
                     <input type="radio" name="level" value="Intermediate" class="selectgroup-input" <?php echo $radio2." ";?>required="">
                     <span class="selectgroup-button level">Intermediate</span>
                   </label>
                   <label class="selectgroup-item">
                     <input type="radio" name="level" value="Advance" class="selectgroup-input" <?php echo $radio3." ";?>required="">
                     <span class="selectgroup-button level">Advance</span>
                   </label>

                </div>
               </div>
             </div>
           
           <div class="col-sm-12 col-lg-12">
             <div class="form-group">
             <label class="form-label">Description
               <span class="form-label-small">
                 <span id="character_count">0</span>
                 "/1500"
               </span>
             </label> 
             <?php 
             $description = str_replace("<br/>", "\n", $row['description']);
             ?>
             <textarea onkeyup="$('#character_count').text(this.value.length);" maxlength="1500" class="form-control" name="description" rows="4" placeholder="Quiz Description..." required><?php echo $description;?></textarea>
             </div>
           </div>
           <div class="col-sm-12 col-lg-12">
             <div class="form-group">
               <label class="form-label">Number of Questions</label>
               <input id="questions" type="number" disabled="true" name="question_num" class="form-control" placeholder="Number of Questions" value="<?php echo $row['number_of_questions'];?>" required>
             </div>
           </div>
           <div class="col-sm-12 col-lg-12">
             <div class="form-group">
               <label class="form-label">Exam Key</label>
               <input id="exam" type="text" maxlength="15" name="exam_key" class="form-control" placeholder="Exam Key" value="<?php echo $row['Exam_key'];?>" required>
             </div>
           </div>
           <div class="col-sm-12 col-lg-12">
            <label class="form-label">Time duration</label>
                <?php 
                $t1 = "";
                $t2 = "";
                $t3 = "";
                $t4 = "";
                $t5 = "";
                $t6 = "";
                if($row['time_duration'] == 900)
                  $t1 = "checked='true'";
                if($row['time_duration'] == 1800)
                  $t2 = "checked='true'";
                if($row['time_duration'] == 2700)
                  $t3 = "checked='true'";
                if($row['time_duration'] == 3600)
                  $t4 = "checked='true'";
                if($row['time_duration'] == 7200)
                  $t5 = "checked='true'";
                if($row['time_duration'] == 10800)
                  $t6 = "checked='true'";
                ?>
                 <div class="selectgroup w-100">
                 <label class="selectgroup-item">
                  <input type="radio" name="time" value="900" class="selectgroup-input" <?php echo $t1." ";?> required="">
                  <span class="selectgroup-button timing">15 min</span>
                 </label>
                 <label class="selectgroup-item">
                   <input type="radio" name="time" value="1800" class="selectgroup-input" <?php echo $t2." ";?> required="">
                   <span class="selectgroup-button timing">30 min</span>
                </label>
                 <label class="selectgroup-item">
                   <input type="radio" name="time" value="2700" class="selectgroup-input" <?php echo $t3." ";?> required="">
                   <span class="selectgroup-button timing">45 min</span>
                </label>
                <label class="selectgroup-item">
                   <input type="radio" name="time" value="3600" class="selectgroup-input" <?php echo $t4." ";?> required="">
                   <span class="selectgroup-button timing">1 hr</span>
                </label>
                <label class="selectgroup-item">
                   <input type="radio" name="time" value="7200" class="selectgroup-input" <?php echo $t5." ";?> required="">
                   <span class="selectgroup-button timing">2 hrs</span>
                </label>
                <label class="selectgroup-item">
                   <input type="radio" name="time" value="10800" class="selectgroup-input" <?php echo $t6." ";?> required="">
                   <span class="selectgroup-button timing">3 hrs </span>
                </label>
               </div>
             
           </div>


           <div class="col-sm-12 col-lg-12">
            <label class="form-label">Marks per Question</label>
            <?php
            $m1 = "";
            $m2 = "";
            $m3 = "";
            $m4 = "";
            if($row['marks_per_question'] == 1)
              $m1 = "checked='true'";
            if($row['marks_per_question'] == 2)
              $m2 = "checked='true'";
            if($row['marks_per_question'] == 3)
              $m3 = "checked='true'";
            if($row['marks_per_question'] == 4)
              $m4 = "checked='true'";
            
            ?>
                 <div class="selectgroup w-100">
                 <label class="selectgroup-item">
                  <input type="radio" name="marks" value="1" class="selectgroup-input" <?php echo $m1." ";?> required="">
                  <span class="selectgroup-button marks">1</span>
                 </label>
                 <label class="selectgroup-item">
                   <input type="radio" name="marks" value="2" class="selectgroup-input" <?php echo $m2." ";?> required="">
                   <span class="selectgroup-button marks">2</span>
                </label>
                <label class="selectgroup-item">
                   <input type="radio" name="marks" value="3" class="selectgroup-input" <?php echo $m3." ";?> required="">
                   <span class="selectgroup-button marks">3</span>
                </label>
                <label class="selectgroup-item">
                   <input type="radio" name="marks" value="4" class="selectgroup-input" <?php echo $m4." ";?> required="">
                   <span class="selectgroup-button marks">4</span>
                </label>
               </div>
           </div>

           <div class="col-sm-12 col-lg-12">
            <label class="form-label">Negative Marking</label>
            <?php 
              $n1 = "";
              $n2 = "";
              $n3 = "";
              $n4 = "";
              if($row['negative_marking'] == 0)
                $n1 = "checked='true'";
              if($row['negative_marking'] == 0.5)
                $n2 = "checked='true'";
              if($row['negative_marking'] == 1)
                $n3 = "checked='true'";
              if($row['negative_marking'] == 2)
                $n4 = "checked='true'";
            ?>
                 <div class="selectgroup w-100">
                 <label class="selectgroup-item">
                  <input type="radio" name="negative" value="0" class="selectgroup-input" <?php echo $n1." ";?> required="">
                  <span class="selectgroup-button negative">0</span>
                 </label>
                 <label class="selectgroup-item">
                   <input type="radio" name="negative" value="0.5" class="selectgroup-input" <?php echo $n2." ";?> required="">
                   <span class="selectgroup-button negative">-0.5</span>
                </label>
                <label class="selectgroup-item">
                   <input type="radio" name="negative" value="1" class="selectgroup-input" <?php echo $n3." ";?> required="">
                   <span class="selectgroup-button negative">-1</span>
                </label>
                <label class="selectgroup-item">
                   <input type="radio" name="negative" value="2" class="selectgroup-input" <?php echo $n4." ";?> required="">
                   <span class="selectgroup-button negative">-2</span>
                </label>
               </div>
           </div>

           <div class="col-sm-12 col-lg-12">
            <label class="form-label">Passing Percentage</label>
             <?php 
             $p1 = "";
             $p2 = "";
             $p3 = "";
             $p4 = "";
             $p5 = "";
             if($row['passing_percentage'] == 50)
              $p1 = "checked='true'";
             if($row['passing_percentage'] == 60)
              $p2 = "checked='true'";
             if($row['passing_percentage'] == 70)
              $p3 = "checked='true'";
             if($row['passing_percentage'] == 80)
              $p4 = "checked='true'";
             if($row['passing_percentage'] == 90)
              $p5 = "checked='true'";
             ?>
                <div class="selectgroup w-100">
                 <label class="selectgroup-item">
                  <input type="radio" name="passing" value="50" <?php echo $p1." ";?>class="selectgroup-input"  required="">
                  <span class="selectgroup-button passing">50%</span>
                 </label>
                 <label class="selectgroup-item">
                   <input type="radio" name="passing" value="60" <?php echo $p2." ";?>class="selectgroup-input"  required="">
                   <span class="selectgroup-button passing">60%</span>
                </label>
                <label class="selectgroup-item">
                   <input type="radio" name="passing" value="70" <?php echo $p3." ";?>class="selectgroup-input"  required="">
                   <span class="selectgroup-button passing">70%</span>
                </label>
                <label class="selectgroup-item">
                   <input type="radio" name="passing" value="80" <?php echo $p4." ";?>class="selectgroup-input"  required="">
                   <span class="selectgroup-button passing">80%</span>
                </label>
                <label class="selectgroup-item">
                   <input type="radio" name="passing" value="90" <?php echo $p5." ";?>class="selectgroup-input"  required="">
                   <span class="selectgroup-button passing">90%</span>
                </label>
               </div>
           </div>

           <div class="col-sm-12 col-lg-12">
           <div class="form-group">
            <label class="form-label">Quiz Status</label>
             <div class="selectgroup w-100">
              <?php 
                $status = $row['is_active'];
                if($status == 1){
                  $active = "checked='true'";
                  $Inactive = "";
                }
                else{
                  $active = "";
                  $Inactive = "checked='true'";

                }
              ?>
               <label class="selectgroup-item">
                <input type="radio" name="state" value="1" class="selectgroup-input" value="1" <?php echo $active." ";?>required="">
                 <span class="selectgroup-button status">Active</span>
               </label>
               <label class="selectgroup-item">
                 <input type="radio" name="state" value="0" class="selectgroup-input" value="0" <?php echo $Inactive." ";?>required="">
                 <span class="selectgroup-button status">Inactive</span>
              </label>
             </div>
           </div>
          </div>
         </div>
         <input style="display: none;"  value="<?php echo $row['quiz_id'];?>" type="number" name="quizID" required>
         </form>
       </div>
       <div class="card-footer text-right">
         <div class="d-flex" style="display: flex;justify-content: space-between;width: 100%;">
           <button form="update_quiz_form" type="reset" class="btn btn-secondary">Reset</button>
           <button form="update_quiz_form" type="submit" name="submit" class="btn btn-primary ml-auto">Update</button>
         </div>
       </div>
       <script type="text/javascript">showQuizDetailsPopup();</script>
	<?php
}
?>