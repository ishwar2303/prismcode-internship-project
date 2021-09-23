<!DOCTYPE html>
<html>
<head>
  <title>Create Quiz | Admin</title>
</head>
</html>
<?php
  session_start();
  require_once('connection.php');
  require_once('middleware.php');
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
  
  $_SESSION['quiz_details_Set'] = true;
  
  $quiz_name = '';
  $object_type = '';
  $description = '';
  $question_num = '';
  $level = '';
  $state = '';
  $key = '';
  $time = '';
  $marks = '';
  $negative = '';
  $passing = '';
  $fetch_limit = '';

  $quiz_name_error = '';
  $object_type_error = '';
  $level_error = '';
  $description_error = '';
  $question_num_error = '';
  $state_error = '';
  $key_error = '';
  $time_error = '';
  $marks_error = '';
  $negative_error = '';
  $passing_error = '';
  $fetch_limit_error = '';
?>

<?php 

if(isset($_POST['test']) && isset($_POST['description']) && isset($_POST['question_num']) && isset($_POST['exam_key'])){
    $quiz_name = cleanInput($_POST['test']);
    $description = cleanInput($_POST['description']);
    $question_num = cleanInput($_POST['question_num']);
    $key = cleanInput($_POST['exam_key']);
    $icon = '<i class="fas fa-exclamation-circle"></i>';
    $control = 1;
    
    if($quiz_name == ''){
        $control = 0;
        $quiz_name_error = $icon.' Quiz name required';
    }
    
    if(isset($_POST['object_type'])) {
      $object_type = cleanInput($_POST['object_type']);
      if($object_type != 1 && $object_type != 2) {
        $object_type_error = 'Select Object type';
        $control = 0;
      }
      else if($object_type == 2 && isset($_POST['fetch_limit'])) {
        $fetch_limit = cleanInput($_POST['fetch_limit']);
        if($fetch_limit <= 0) {
          $fetch_limit_error = $icon.' Object type is "Question Bank" so please mention number of questions to fetch from the Question Bank. <br/> You can update this any time via Edit Quiz Option.';
          $control = 0;
        }
      }
    }
    else {
      $object_type_error = $icon.' Select Object type';
      $control = 0;
    }

    if(isset($_POST['level'])){
      $level = cleanInput($_POST['level']);
      if($level == ''){
          $control = 0;
          $level_error = $icon.' Select level';
      }
      else if($level!=1 && $level!=2 && $level!=3){
          $control = 0;
          $level_error = $icon.' Invalid level';
      }
    }
    else{
      $control = 0;
      $level_error = $icon.' Select level';
    }

    if($description == ''){
        $control = 0;
        $description_error = $icon.' Description required';
    }
    else if(strlen($description) > 1500){
        $control = 0;
        $description_error = $icon.' Characters limit 1500';
    }

    if($question_num == ''){
      $control = 0;
      $question_num_error = $icon.' Number of questions required';
    }
    else if(!ctype_alnum($question_num)){
      $control = 0;
      $question_num_error = $icon.' Invalid characters';
    }

    if(isset($_POST['state'])){
      $state = cleanInput($_POST['state']);
      if($state != 0 && $state != 1){
          $control = 0;
          $state_error = $icon.' Invalid status';
      }
    }
    else{
      $control = 0;
      $state_error = $icon.' Status required';
    }

    if($key == ''){
        $control = 0;
        $key_error = $icon.' Exam key required';
    }
    else if(strlen($key)<6 || strlen($key) > 15){
        $control = 0;
        $key_error = $icon.' Minimum 6 characters and Maximum 15 characters';
    }

    if(isset($_POST['time'])){
      $time = cleanInput($_POST['time']);
      if($time!=-1 && $time!=900 && $time!=1800 && $time!=2700 && $time!=3600 && $time!=7200 && $time!=10800){
        $control = 0;
        $time_error = $icon.' Choose time from given options';
      }
    }
    else{
      $control = 0;
      $time_error = $icon.' Time required';
    }

    if(isset($_POST['marks'])){
      $marks = cleanInput($_POST['marks']);
      if($marks!=1 && $marks!=2 && $marks!=3 && $marks!=4){
        $control = 0;
        $marks_error = $icon.' Choose marks from given options';
      }
    }
    else{
      $control = 0;
      $marks_error = $icon.' Mark per question required';
    }
    
    if(isset($_POST['negative'])){
      $negative = cleanInput($_POST['negative']);
      if($negative!=0 && $negative!=0.5 && $negative!=1 && $negative!=2){
        $control = 0;
        $negative_error = $icon.' Choose negative marking from given options';
      }
    }
    else{
      $control = 0;
      $negative_error = $icon.' Negative marking required';
    }
    
    if(isset($_POST['passing'])){
      $passing = cleanInput($_POST['passing']);
      if($passing!=50 && $passing!=60 && $passing!=70 && $passing!=80 && $passing!=90){
        $control = 0;
        $passing_error = $icon.' Choose passing marks from given options';
      }
    }
    else{
      $control = 0;
      $passing_error = $icon.' Passing percentage required';
    }

    if($control){
      if($level == 1)
          $level = 'Beginner';
      if($level == 2)
          $level = 'Intermediate';
      if($level == 3)
          $level = 'Advance';
      $sql = "INSERT INTO `quizes` (`quiz_id`, `quiz_name`, `difficulty_level`, `description`, `number_of_questions`, `is_active`, `Exam_key`, `key_access`, `shuffle`, `time_duration`, `marks_per_question`, `negative_marking`, `passing_percentage`, `admin_email_id`, `time_stamp`, `object_type`, `fetch_limit`) VALUES (NULL, '$quiz_name', '$level', '$description', '$question_num', '$state', '$key', '0', '0', '$time', '$marks', '$negative', '$passing', '$_SESSION[admin_id]', current_timestamp(), '$object_type', '$fetch_limit')";
      mysqli_query($conn,$sql) or die(mysqli_error($conn));
      $last_id = $conn->insert_id;
      $_SESSION['question_num'] = $question_num;
      $_SESSION['quiz_name'] = $quiz_name;
      $_SESSION['quiz_id'] = $last_id;
      $_SESSION['message'] = 'Quiz Created Successfully';
      $_SESSION['color'] = '#68a030';
      $_SESSION['question_details_set'] = true;
      $_SESSION['success_msg'] = 'Quiz : '.$quiz_name.'<br/> Created : Success';
      header('location: question_feed.php');
    }


}

?>

<?php 
  
  include('includes/header.php'); 
  include('includes/navbar.php'); 

 ?>

 <!-- <div class="my-3 my-md-5">
  <div class="container">
    <div class="page-header">
      <h3 class="page-title">Create Exam</h3>
    </div>
  </div>
 </div>  -->

<style type="text/css">
  .help-hint{
    position: absolute;
    background: #4b4b4b;
    padding: 7px 8px;
    left : 0px;
    top: 80px;
    opacity: 0.9;
    border-radius: 5px;
    color: white;
    z-index: 1;
    display: none;
  }
</style>
 <script>
$(document).ready(function(){

  $(".help-hint").slideUp();


  $("#description").focusin(function(){
      $(".help-hint").eq(0).slideDown();
  });

  $("#description").focusout(function(){
   $(".help-hint").eq(0).slideUp();
  });



  $("#questions").focusin(function(){
    $(".help-hint").eq(1).slideDown();
  });


  $("#questions").focusout(function(){
    $(".help-hint").eq(1).slideUp();
  });


  $("#exam").focusin(function(){
    $(".help-hint").eq(2).slideDown();
  });


  $("#exam").focusout(function(){
    $(".help-hint").eq(2).slideUp();
  });
});
 </script>
  <div style="height: 55px;"></div>
 <div class="row row-cards row-deck">
   <div class="col-12">
     <div class="card">
       <div class="card-header">
         <h4 class="card-title" style="margin-left:10px;">Create Quiz</h4>
       </div>
         <?php require 'includes/flash-message.php'; ?>
       <div class="card-body">
         <form id="create_exam_form" action ="" method="POST" onsubmit="return validation()">
           <div style="margin : 10px;" class="row">
             <div class="col-sm-12 col-lg-12">
               <div class="form-group m-0">
                 <label class="form-label">Quiz Name</label>
                 <input id="quiz_name"   type="text" name="test" maxlength="100" class="form-control ht-50" placeholder="Quiz Name" value="<?php echo $quiz_name; ?>">
                 <div class="form-error"><?php echo $quiz_name_error; ?></div>
               </div>
             </div>
             <div class="col-sm-12 col-lg-12">
               <div class="form-group m-0">
                <label class="form-label">Object Type 
                  <span class="field-info-block">
                    <i class="fas fa-info-circle"></i> 
                    <div>
                      Object type let you handle how to serve the questions. 
                      <br/> 
                      Quiz type is standard all questions will be served in quiz.
                      <br/> 
                      Question Bank type let you set fetch limit(x number of questions will be served from total questions in that quiz)
                    </div> 
                  </span> 
                </label>
                <div class="selectgroup w-100">
                   <label class="selectgroup-item m-0">
                     <input type="radio" name="object_type" value="1" class="selectgroup-input objectType" <?php echo $object_type == 1 ? 'checked' : ''; ?>>
                     <span class="selectgroup-button">Quiz</span>
                   </label>
                   <label class="selectgroup-item m-0">
                     <input type="radio" name="object_type" value="2" class="selectgroup-input objectType" <?php echo $object_type == 2 ? 'checked' : ''; ?>>
                     <span class="selectgroup-button">Question Bank</span>
                   </label>
                </div>
                 <div class="form-error"><?php echo $object_type_error; ?></div>
               </div>
             </div>
             <div class="col-sm-12 col-lg-12" id="fetchLimitOption" >
               <div style="position: relative;" class="form-group m-0">
                 <label class="form-label">Fetch Limit
                  <span class="field-info-block">
                    <i class="fas fa-info-circle"></i> 
                    <div>
                      Number of questions to fetch from Question Bank.
                    </div> 
                  </span> 
                 </label>
                 <input  id="fetch-limit" type="number" min= "1" max="100" name="fetch_limit" class="form-control ht-50" placeholder="Number of Questions" value="<?php echo $fetch_limit; ?>">
                 
               </div>
               <div class="form-error"><?php echo $fetch_limit_error; ?></div>
             </div>
             <script type="text/javascript">
                let fetchLimitOption = document.getElementById('fetchLimitOption')
                let objectType = document.getElementsByClassName('objectType')
                const toggleFetchLimitOption = () => {
                  if(objectType[1].checked) {
                    fetchLimitOption.style.display = 'block'
                  }
                  else {
                    fetchLimitOption.style.display = 'none'
                  }
                }
                for(let i=0; i<objectType.length; i++) {
                  objectType[i].addEventListener('click', toggleFetchLimitOption)
                }
             </script>
             <div class="col-sm-12 col-lg-12">
               <div class="form-group m-0">
                <label class="form-label">Difficulty Level</label>
                <div class="selectgroup w-100">
                   <label class="selectgroup-item m-0">
                     <input type="radio" name="level" value="1" class="selectgroup-input" <?php echo $level == 1 ? 'checked' : ''; ?>>
                     <span class="selectgroup-button">Beginner</span>
                   </label>
                   <label class="selectgroup-item m-0">
                     <input type="radio" name="level" value="2" class="selectgroup-input" <?php echo $level == 2 ? 'checked' : ''; ?>>
                     <span class="selectgroup-button">Intermediate</span>
                   </label>
                   <label class="selectgroup-item m-0">
                     <input type="radio" name="level" value="3" class="selectgroup-input" <?php echo $level == 3 ? 'checked' : ''; ?>>
                     <span class="selectgroup-button">Advance</span>
                   </label>
                </div>
                 <div class="form-error"><?php echo $level_error; ?></div>
               </div>
             </div>
           <div class="col-sm-12 col-lg-12">
             <div style="position: relative;" class="form-group m-0">
             <label class="form-label">Description
               <span class="form-label-small">
                 <span id="character_count">0</span>
                 "/1500"
               </span>
             </label> 
             <textarea id="description" onkeyup="$('#character_count').text(this.value.length);" maxlength="1500" class="form-control" name="description" rows="4" placeholder="Quiz Description..." ><?php echo $description; ?></textarea>
             <div style="top:143px;" class="help-hint">
                 Give a detailed description that explains about the Quiz. Visitors can see the description on home page.
                 There is no need to write number of question or time allotted as it will be already mention.
               </div>
             </div>
             <div class="form-error"><?php echo $description_error; ?></div>
           </div>
           <div class="col-sm-12 col-lg-12">
             <div style="position: relative;" class="form-group m-0">
               <label class="form-label">Number of Questions</label>
               <input id="questions" type="number" min= "1" max="100" name="question_num" class="form-control ht-50" placeholder="Number of Questions" value="<?php echo $question_num; ?>">
               <div class="help-hint">
                 After filling this form a new form will open to feed questions.
                 <br/>
                 You can add more questions to a quiz using expand quiz option in Quiz Action.
               </div>
             </div>
             <div class="form-error"><?php echo $question_num_error; ?></div>
           </div>
           <div class="col-sm-12 col-lg-12">
             <div style="position: relative;" class="form-group m-0">
               <label class="form-label">Exam Key</label>
               <input id="exam" type="text" name="exam_key" class="form-control ht-50" placeholder="Exam Key" value="<?php echo $key; ?>">
               <div class="help-hint">
                 Exam key can have minimum 6 characters and maximum 15 characters, without this key no one can access your Quiz. Public access feature can be used for revealing key to everyone.
               </div>
             </div>
              <div class="form-error"><?php echo $key_error; ?></div>
           </div>
           <div class="col-sm-12 col-lg-12">
           <?php 
              $checked = 'checked';
              $t1 = '';
              $t2 = '';
              $t3 = '';
              $t4 = '';
              $t5 = '';
              $t6 = '';

              if($time == 900)
                $t1 = $checked;
              if($time == 1800)
                $t2 = $checked;
              if($time == 2700)
                $t3 = $checked;
              if($time == 3600)
                $t4 = $checked;
              if($time == 7200)
                $t5 = $checked;
              if($time == 10800)
                $t6 = $checked;
           ?>
            <label class="form-label">Time duration</label>
                 <div class="selectgroup w-100">
                 <label class="selectgroup-item m-0">
                   <input type="radio" name="time" value="-1" class="selectgroup-input" <?php echo $time == '-1' ? 'checked' : '';?>>
                   <span class="selectgroup-button">No Time Limit</span>
                </label>
                 <label class="selectgroup-item m-0">
                   <input type="radio" name="time" value="900" class="selectgroup-input" <?php echo $t1; ?>>
                   <span class="selectgroup-button">15 min</span>
                </label>
                 <label class="selectgroup-item m-0">
                   <input type="radio" name="time" value="1800" class="selectgroup-input" <?php echo $t2; ?>>
                   <span class="selectgroup-button">30 min</span>
                </label>
                <label class="selectgroup-item m-0">
                   <input type="radio" name="time" value="2700" class="selectgroup-input" <?php echo $t3; ?>>
                   <span class="selectgroup-button">45 min</span>
                </label>
                <label class="selectgroup-item m-0">
                   <input type="radio" name="time" value="3600" class="selectgroup-input" <?php echo $t4; ?>>
                   <span class="selectgroup-button">1 hr</span>
                </label>
                <label class="selectgroup-item m-0">
                   <input type="radio" name="time" value="7200" class="selectgroup-input" <?php echo $t5; ?>>
                   <span class="selectgroup-button">2 hrs</span>
                </label>
                <label class="selectgroup-item m-0">
                   <input type="radio" name="time" value="10800" class="selectgroup-input" <?php echo $t6; ?>>
                   <span class="selectgroup-button">3 hrs </span>
                </label>
               </div>
                 <div class="form-error"><?php echo $time_error; ?></div>
           </div>

           <div class="col-sm-12 col-lg-12">
            <label class="form-label">Marks per Question</label>
                 <div class="selectgroup w-100">
                 <label class="selectgroup-item m-0">
                  <input type="radio" name="marks" value="1" class="selectgroup-input" <?php echo $marks == 1 ? 'checked' : ''; ?>>
                  <span class="selectgroup-button">1</span>
                 </label>
                 <label class="selectgroup-item m-0">
                   <input type="radio" name="marks" value="2" class="selectgroup-input" <?php echo $marks == 2 ? 'checked' : ''; ?>>
                   <span class="selectgroup-button">2</span>
                </label>
                <label class="selectgroup-item m-0">
                   <input type="radio" name="marks" value="3" class="selectgroup-input" <?php echo $marks == 3 ? 'checked' : ''; ?>>
                   <span class="selectgroup-button">3</span>
                </label>
                <label class="selectgroup-item m-0">
                   <input type="radio" name="marks" value="4" class="selectgroup-input" <?php echo $marks == 4 ? 'checked' : ''; ?>>
                   <span class="selectgroup-button">4</span>
                </label>
               </div>
                 <div class="form-error"><?php echo $marks_error; ?></div>
           </div>

           <div class="col-sm-12 col-lg-12">
            <label class="form-label">Negative Marking</label>
                 <div class="selectgroup w-100">
                 <label class="selectgroup-item m-0">
                  <input type="radio" name="negative" value="0" class="selectgroup-input" <?php echo $negative == 0 ? 'checked' : ''; ?>>
                  <span class="selectgroup-button">No</span>
                 </label>
                 <label class="selectgroup-item m-0">
                   <input type="radio" name="negative" value="0.5" class="selectgroup-input" <?php echo $negative == 0.5 ? 'checked' : ''; ?>>
                   <span class="selectgroup-button">-0.5</span>
                </label>
                <label class="selectgroup-item m-0">
                   <input type="radio" name="negative" value="1" class="selectgroup-input" <?php echo $negative == 1 ? 'checked' : ''; ?>>
                   <span class="selectgroup-button">-1</span>
                </label>
                <label class="selectgroup-item m-0">
                   <input type="radio" name="negative" value="2" class="selectgroup-input" <?php echo $negative == 2 ? 'checked' : ''; ?>>
                   <span class="selectgroup-button">-2</span>
                </label>
               </div>
                 <div class="form-error"><?php echo $negative_error; ?></div>
           </div>

           <div class="col-sm-12 col-lg-12">
            <label class="form-label">Passing Percentage</label>
             
                <div class="selectgroup w-100">
                 <label class="selectgroup-item m-0">
                  <input type="radio" name="passing" value="50" class="selectgroup-input"  <?php echo $passing == 50 ? 'checked' : ''; ?>>
                  <span class="selectgroup-button">50%</span>
                 </label>
                 <label class="selectgroup-item m-0">
                   <input type="radio" name="passing" value="60" class="selectgroup-input" <?php echo $passing == 60 ? 'checked' : ''; ?>>
                   <span class="selectgroup-button">60%</span>
                </label>
                <label class="selectgroup-item m-0">
                   <input type="radio" name="passing" value="70" class="selectgroup-input" <?php echo $passing == 70 ? 'checked' : ''; ?>>
                   <span class="selectgroup-button">70%</span>
                </label>
                <label class="selectgroup-item m-0">
                   <input type="radio" name="passing" value="80" class="selectgroup-input" <?php echo $passing == 80 ? 'checked' : ''; ?>>
                   <span class="selectgroup-button">80%</span>
                </label>
                <label class="selectgroup-item m-0">
                   <input type="radio" name="passing" value="90" class="selectgroup-input" <?php echo $passing == 90 ? 'checked' : ''; ?>>
                   <span class="selectgroup-button">90%</span>
                </label>
               </div>
                 <div class="form-error"><?php echo $passing_error; ?></div>
           </div>
           <div class="col-sm-12 col-lg-12">
           <div class="form-group m-0">
            <label class="form-label">Quiz Status</label>
             <div class="selectgroup w-100">
               <label class="selectgroup-item m-0">
                <input type="radio" name="state" value="1" class="selectgroup-input" value="1" <?php echo $state == 1 ? 'checked' : ''; ?>>
                 <span class="selectgroup-button">Active</span>
               </label>
               <label class="selectgroup-item m-0">
                 <input type="radio" name="state" value="0" class="selectgroup-input" value="0" <?php echo $state == 0 ? 'checked' : ''; ?>>
                 <span class="selectgroup-button">Inactive</span>
              </label>
             </div>
                 <div class="form-error"><?php echo $state_error; ?></div>
           </div>
          </div>
         </div>
         </form>
       </div>
       <div class="card-footer text-right">
         <div style="display: flex;justify-content: space-between;" class="d-flex">
           <button form="create_exam_form" type="reset" class="btn btn-secondary">Reset</button>
           <button form="create_exam_form" type="submit" name="submit" class="btn btn-primary ml-auto">Submit</button>
         </div>
       </div>
     </div>
   </div>
 </div>


<?php
  include('includes/scripts.php');
?>

<script type="text/javascript">
  toggleFetchLimitOption()
</script>
</body>

</html>
