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
</script>
<style type="text/css">
  #select-exam{
  width: 310px;
  height: 40px;
  margin-top: 10px;
  border-radius : 5px;
  border : 0.5px solid #bdc3c7;
}
#key{
  width: 300px;
  height: 40px;
  margin-top: 10px;
  border-radius : 5px;
  border : 0.5px solid #bdc3c7;
  padding: 0px 5px;
}
#key:focus{
  outline : none;
  box-shadow: 0px 0px 0px 3px rgba(52, 152, 219,0.5); 
  border-color: #3498db;
}
#select-exam:focus{
  outline : none;
  box-shadow: 0px 0px 0px 3px rgba(52, 152, 219,0.5);
  border-color: #3498db;
}
.field-container{
  display: flex;
  flex-direction: column;
}
form{
  padding: 25px;
  border-radius: 5px;
  margin : 0px 5px;
}
.form-container
{
  display: flex;
  justify-content: center;
  padding-top: 100px;
}
#next-btn{
  width: 310px;
  height: 40px;
  margin-top: 10px;
  border-radius : 5px;
  border : 0.5px solid #bdc3c7;
  font-weight: 500;
  background: #2980b9;
  color: white;
}
#next-btn:focus{
  outline : none;
}
#next-btn:hover{
  background: #3498db;
}
footer{
  background: #4b4b4b;
  color: white;
  height: 60px;
  display: flex;
  justify-content: center;
  align-items: center;
  width: 100%;
}
.wrapper{
  height: 92vh;
  display: flex;
  flex-direction: column;
  justify-content: space-between;
  align-items: center;
}
@media screen and (max-width: 380px){
  .form-container{
    width: 95%;
  }
  #select-exam{
    width : 280px;
  }
  #next-btn{
    width: 280px;
  }
  #key{
    width: 270px;
  }
  form{
    padding: 25px 15px; 
  }
}
</style>
</head>
<?php if($num>0)
{
?>
<body>
  <div class="wrapper">
  <div class="form-container">
		<form id="myform" class="white" action="check_attempt.php" method="POST">
			<div class="field-container">
      <label style="font-size: 18px;"><b>Select Exam</b></label>
				
				<select id="select-exam" name='test_selected'>
					<option value disabled>Select Quiz</option>
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
                  if($temp->num_rows>=5)
                  {    
                      if($row['is_active'] == 1)  // for active test
                      echo "<option value ='$row[quiz_id]'>$row[quiz_name]</option>";
                  }  
               }
         ?>
         </select>
			</div>

			<div style="margin-top: 15px;" class="field-container">
			<label style="font-size: 18px;"><b>Exam Key</b></label>
			<input id="key" type="password" name="exam_key" required>
			</div>

      <div style="margin-top: 15px;" class="center">
        <button id="next-btn" type="submit"  name="submit" value="Login" class="z-depth-0" >NEXT</button>
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
              <div style="height: 40vh;width: 100%; display: flex;flex-direction: column;justify-content: center;align-items: center; " class="robot-img-container">
                <label><img style="width : 150px; height: 150px;" src="images/robot_sticker.png"></label>
                <label style=" color : #e74c3c;">Currently No Quizes are available!</label>
              </div>
              <?php
}
?>

    <div  class="black-cover">
      
    </div>
    <div  class="already-given-exam-popup">
      <div class="small-popup">
        <span style="width: 100%;height: 30px;display: flex;justify-content: center;align-items: center;color : #e74c3c;">Already given Exam!</span>
      <span onclick="hideAlreadyGivenExamPopup()" class="close-smallpopup">Close</span>
      </div>
     
    </div>
    <div class="incorrect-key">
      <div class="small-popup">
        <span style="width: 100%;height: 30px;display: flex;justify-content: center;align-items: center;color : #e74c3c;">Incorrect Key!</span>
      <span onclick="hideIncorrectKeypopup()" class="close-smallpopup">Close</span>
      </div>
    </div>

  <footer>
    © 2020 Provision. All rights reserved
  </footer>
  </div>
</body>


</html>