<!DOCTYPE html>
<html>
<head>
  <title>Select Quiz</title>
<?php
  session_start();
  require_once('connection.php');
    if(isset($_SESSION['test_started'])){
      header('Location: takeexam.php');
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
    $sql = "SELECT * FROM quizes WHERE is_active='1' ORDER BY quiz_name";
    $result = mysqli_query($conn,$sql);
    $num = $result->num_rows;
    
    $auto_quiz = '';
    $control_quiz = 1;
    if(isset($_SESSION['auto_quiz'])) {
      $auto_quiz = base64_decode($_SESSION['auto_quiz']);
      $control_quiz = 0;
    }
?>

<?php include 'templates/headerlogin.php'; ?>
<script type="text/javascript">
   $(document).ready(function(){
              $(document).on('submit','#myform',function(){
                var test = document.getElementById('select-exam').value;
                var key = document.getElementById('key').value;
          url = 'check_attempt.php';
          $('#attempt-output').load(url,{
            test_selected : test,
            exam_key : key
          });
          return false;
        });

        $('#cancel-btn').click(function(){
           url = 'check_attempt.php';
          $('#attempt-output').load(url,{
            unsetSession : true
          });
        });    
        $('#start-exam-btn').click(function(){
           url = 'check_attempt.php';
          $('#attempt-output').load(url,{
            setTest : true
          });
        }); 

      });


      function onClickBlackCover(){
        document.getElementsByClassName('black-cover')[0].style.display = 'none';
        document.getElementsByClassName('start-exam-popup')[0].style.display = 'none';
      }
      function showPopupContainer(){
        document.getElementsByClassName('black-cover')[0].style.display = 'block';
        document.getElementsByClassName('start-exam-popup')[0].style.display = 'block';
      }
      function showAlreadyGivenExamPopup(){
        document.getElementsByClassName('black-cover')[0].style.display = 'block';
        document.getElementsByClassName('already-given-exam-popup')[0].style.display = 'block';
      }
      function hideAlreadyGivenExamPopup(){
        document.getElementsByClassName('black-cover')[0].style.display = 'none';
        document.getElementsByClassName('already-given-exam-popup')[0].style.display = 'none';
      }
      function showIncorrectKeypopup(){
        document.getElementsByClassName('black-cover')[0].style.display = 'block';
        document.getElementsByClassName('incorrect-key')[0].style.display = 'block';
      }
      function hideIncorrectKeypopup(){
        document.getElementsByClassName('black-cover')[0].style.display = 'none';
        document.getElementsByClassName('incorrect-key')[0].style.display = 'none';
      }
      
  document.cookie = "userproctored=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;";
</script>
      <!-- <script src="js/stop-copy-paste.js"></script> -->
      <link rel="stylesheet" href="css/custom/select_exam.css">
</head>
<?php if($num>0)
{
?>
<body>
  <div class="wrapper">
  <div class="form-container">
		<form id="myform" class="white" action="check_attempt.php" method="POST">
    <div class="logged-in-as">Logged In as <br/><br/> <span class="highlight-email"><?php echo $_SESSION['email']; ?></span></div>
			<div class="field-container">
      <label style="font-size: 18px;"><b>Select Exam</b></label>
				
				<select id="select-exam" name='test_selected' >
					<option value disabled id="select-quiz-default-option">Select Quiz</option>
         <?php
               
               while($row = $result->fetch_assoc())
               {

                  $time = $row['time_duration'];
                  if($time == 900 )
                    $show_time = "15 minutes";
                  if($time == 1800)
                    $show_time = "30 minutes";
                  if($time == 2700)
                    $show_time = "45 minutes";
                  if($time == 3600)
                    $show_time = "1 hour";
                  if($time == 7200)
                      $show_time = "2 hour";
                  if($time == 10800)
                      $show_time = "3 hour";
                    $sql = "SELECT * FROM question_bank WHERE quiz_id='$row[quiz_id]'";
                    $temp = mysqli_query($conn,$sql);  
                  if($temp->num_rows>0)
                  {   
                      if($row['is_active'] == 1 && $auto_quiz == '')  // for active test
                        echo "<option value ='$row[quiz_id]'>$row[quiz_name]</option>";
                      else if($row['is_active'] == 1 && $row['quiz_id'] == $auto_quiz){
                        echo "<option value ='$row[quiz_id]'>$row[quiz_name]</option>";

                        $control_quiz = 1;
                        break;
                      }
                      else if($row['is_active'] == 0 && $row['quiz_id'] == $auto_quiz) {
                        $control_quiz = 2;
                        break;
                      }
                  }  
               }
         ?>
         </select>

         <script type="text/javascript">
           document.getElementById('select-quiz-default-option').remove();
         </script>
			</div>
      <?php 
        if($control_quiz == 0) {
          $_SESSION['message'] = 'No such Quiz exist';
          $_SESSION['color'] = 'red';
        }
        if($control_quiz == 2) {
          $_SESSION['message'] = 'Quiz is not live';
          $_SESSION['color'] = 'red';
        }
        if($control_quiz == 0 || $control_quiz == 2) {
          ?>
          <script type="text/javascript">
            let a = document.createElement('a')
            a.href = 'index.php';
            
            a.click();
          </script>
          <?php
        }
      ?>

			<div style="margin-top: 15px;" class="field-container">
			<label style="font-size: 18px;"><b>Exam Key</b></label>
			<input id="key" type="password" name="exam_key" required>
			</div>

      <div style="margin-top: 15px;" class="center">
        <button id="next-btn" type="submit"  name="submit" value="Login" class="" >NEXT</button>
      </div>
		</form>
</div>

<div class="start-exam-popup">
  
  <div class="instruction-container">
    <label>Instructions</label>
    <div class="inst-list-container">
      <div id="attempt-output">
        
      </div>
    </div>
  </div>
  <div class="popup-btn-container">
    <button id="cancel-btn">Cancel</button>
    <button id="start-exam-btn">Start Quiz</button>
  </div>
</div>
  <?php 
}
else{

              ?>
              <div style="height: 85vh;width: 100%; display: flex;flex-direction: column;justify-content: center;align-items: center; " class="robot-img-container">
                <!-- <label><img style="width : 150px; height: 150px;" src="images/robot_sticker.png"></label> -->
                <label style="margin-left : 50px; color : #cd201f;font-size:16px;"><i class="fas fa-exclamation-circle"></i>  Currently No Quiz is available!</label>
              </div>
              <?php
}
?>

    <div  class="black-cover">
      
    </div>
    <div  class="already-given-exam-popup">
      <div class="small-popup">
        <span style="width: 100%;height: 30px;display: flex;justify-content: center;align-items: center;color : #cd201f;"><i class="fas fa-exclamation-circle mr-5px"></i>  Already made an attempt!</span>
      <span onclick="hideAlreadyGivenExamPopup()" class="close-smallpopup">Close</span>
      </div>
     
    </div>
    <div class="incorrect-key">
      <div class="small-popup">
        <span style="width: 100%;height: 30px;display: flex;justify-content: center;align-items: center;color : #cd201f;"><i class="fas fa-exclamation-circle mr-5px"></i>  Incorrect Key!</span>
      <span onclick="hideIncorrectKeypopup()" class="close-smallpopup">Close</span>
      </div>
    </div>

  <footer>
    © 2020 Provision. All rights reserved
  </footer>
  </div>
</body>


</html>