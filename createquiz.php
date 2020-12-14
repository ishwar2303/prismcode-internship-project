<!DOCTYPE html>
<html>
<head>
  <title>Create Quiz | Admin</title>
</head>
</html>
<?php
  session_start();
  require_once('connection.php');
    
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
    padding: 3px 5px;
    left : 0px;
    top: 67px;
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
         <h4 class="card-title">Create Quiz</h4>
       </div>
       <div class="card-body">
         <form id="create_exam_form" action ="insert_quiz_details.php" method="POST" onsubmit="return validation()">
           <div style="margin : 10px;" class="row">
             <div class="col-sm-12 col-lg-12">
               <div class="form-group">
                 <label class="form-label">Quiz Name</label>
                 <input id="quiz_name"   type="text" name="test" maxlength="35" class="form-control" placeholder="Quiz Name" value required="">
               </div>
             </div>
             <div class="col-sm-12 col-lg-12">
               <div class="form-group">
                <label class="form-label">Difficulty Level</label>
                <div class="selectgroup w-100">
                   <label class="selectgroup-item">
                     <input type="radio" name="level" value="Beginner" class="selectgroup-input" required="">
                     <span class="selectgroup-button">Beginner</span>
                   </label>
                   <label class="selectgroup-item">
                     <input type="radio" name="level" value="Intermediate" class="selectgroup-input" required="">
                     <span class="selectgroup-button">Intermediate</span>
                   </label>
                   <label class="selectgroup-item">
                     <input type="radio" name="level" value="Advance" class="selectgroup-input" required="">
                     <span class="selectgroup-button">Advance</span>
                   </label>
                </div>
               </div>
             </div>
           <div class="col-sm-12 col-lg-12">
             <div style="position: relative;" class="form-group">
             <label class="form-label">Description
               <span class="form-label-small">
                 <span id="character_count">0</span>
                 "/1500"
               </span>
             </label> 
             <textarea id="description" onkeyup="$('#character_count').text(this.value.length);" maxlength="1500" class="form-control" name="description" rows="4" placeholder="Quiz Description..." required></textarea>
             <div style="top:143px;" class="help-hint">
                 Give a detailed description that explains about the Quiz. Visitors can see the description on home page.
                 There is no need to write number of question or time alloted as it will be already mention.
               </div>
             </div>
           </div>
           <div class="col-sm-12 col-lg-12">
             <div style="position: relative;" class="form-group">
               <label class="form-label">Number of Questions</label>
               <input id="questions" type="number" min= "1" max="100" name="question_num" class="form-control" placeholder="Number of Questions" value required>
               <div class="help-hint">
                 You can add more questions to your quiz at any time using expand quiz in Quiz Action.
               </div>
             </div>
           </div>
           <div class="col-sm-12 col-lg-12">
             <div style="position: relative;" class="form-group">
               <label class="form-label">Exam Key</label>
               <input id="exam" type="text" minlength="6" maxlength="15" name="exam_key" class="form-control" placeholder="Exam Key"  required>
               <div class="help-hint">
                 Exam key can have minimum 6 characters and maximum 15 characters, without this key no one can access your Quiz. Public access feature can be used for revealing key to everyone.
               </div>
             </div>
           </div>
           <div class="col-sm-12 col-lg-12">
            <label class="form-label">Time duration</label>
                 <div class="selectgroup w-100">

                 <label class="selectgroup-item">
                   <input type="radio" name="time" value="900" class="selectgroup-input" value="0" required="">
                   <span class="selectgroup-button">15 min</span>
                </label>
                 <label class="selectgroup-item">
                   <input type="radio" name="time" value="1800" class="selectgroup-input" value="0" required="">
                   <span class="selectgroup-button">30 min</span>
                </label>
                <label class="selectgroup-item">
                   <input type="radio" name="time" value="2700" class="selectgroup-input" value="0" required="">
                   <span class="selectgroup-button">45 min</span>
                </label>
                <label class="selectgroup-item">
                   <input type="radio" name="time" value="3600" class="selectgroup-input" value="0" required="">
                   <span class="selectgroup-button">1 hr</span>
                </label>
                <label class="selectgroup-item">
                   <input type="radio" name="time" value="7200" class="selectgroup-input" value="0" required="">
                   <span class="selectgroup-button">2 hrs</span>
                </label>
                <label class="selectgroup-item">
                   <input type="radio" name="time" value="10800" class="selectgroup-input" value="0" required="">
                   <span class="selectgroup-button">3 hrs </span>
                </label>
               </div>
           </div>

           <div class="col-sm-12 col-lg-12">
            <label class="form-label">Marks per Question</label>
                 <div class="selectgroup w-100">
                 <label class="selectgroup-item">
                  <input type="radio" name="marks" value="1" class="selectgroup-input" value="1" required="">
                  <span class="selectgroup-button">1</span>
                 </label>
                 <label class="selectgroup-item">
                   <input type="radio" name="marks" value="2" class="selectgroup-input" value="0" required="">
                   <span class="selectgroup-button">2</span>
                </label>
                <label class="selectgroup-item">
                   <input type="radio" name="marks" value="3" class="selectgroup-input" value="0" required="">
                   <span class="selectgroup-button">3</span>
                </label>
                <label class="selectgroup-item">
                   <input type="radio" name="marks" value="4" class="selectgroup-input" value="0" required="">
                   <span class="selectgroup-button">4</span>
                </label>
               </div>
           </div>

           <div class="col-sm-12 col-lg-12">
            <label class="form-label">Negative Marking</label>
                 <div class="selectgroup w-100">
                 <label class="selectgroup-item">
                  <input type="radio" name="negative" value="0" class="selectgroup-input" value="1" required="">
                  <span class="selectgroup-button">0</span>
                 </label>
                 <label class="selectgroup-item">
                   <input type="radio" name="negative" value="0.5" class="selectgroup-input" value="0" required="">
                   <span class="selectgroup-button">-0.5</span>
                </label>
                <label class="selectgroup-item">
                   <input type="radio" name="negative" value="1" class="selectgroup-input" value="0" required="">
                   <span class="selectgroup-button">-1</span>
                </label>
                <label class="selectgroup-item">
                   <input type="radio" name="negative" value="2" class="selectgroup-input" value="0" required="">
                   <span class="selectgroup-button">-2</span>
                </label>
               </div>
           </div>

           <div class="col-sm-12 col-lg-12">
            <label class="form-label">Passing Percentage</label>
             
                <div class="selectgroup w-100">
                 <label class="selectgroup-item">
                  <input type="radio" name="passing" value="50" class="selectgroup-input" value="1" required="">
                  <span class="selectgroup-button">50%</span>
                 </label>
                 <label class="selectgroup-item">
                   <input type="radio" name="passing" value="60" class="selectgroup-input" value="0" required="">
                   <span class="selectgroup-button">60%</span>
                </label>
                <label class="selectgroup-item">
                   <input type="radio" name="passing" value="70" class="selectgroup-input" value="0" required="">
                   <span class="selectgroup-button">70%</span>
                </label>
                <label class="selectgroup-item">
                   <input type="radio" name="passing" value="80" class="selectgroup-input" value="0" required="">
                   <span class="selectgroup-button">80%</span>
                </label>
                <label class="selectgroup-item">
                   <input type="radio" name="passing" value="90" class="selectgroup-input" value="0" required="">
                   <span class="selectgroup-button">90%</span>
                </label>
               </div>
           </div>
           <div class="col-sm-12 col-lg-12">
           <div class="form-group">
            <label class="form-label">Quiz Status</label>
             <div class="selectgroup w-100">
               <label class="selectgroup-item">
                <input type="radio" name="state" value="1" class="selectgroup-input" value="1" required="">
                 <span class="selectgroup-button">Active</span>
               </label>
               <label class="selectgroup-item">
                 <input type="radio" name="state" value="0" class="selectgroup-input" value="0" required="">
                 <span class="selectgroup-button">Inactive</span>
              </label>
             </div>
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


<!-- Begin Page Content
<div class="container-fluid">

  Page Heading
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Create Quiz</h1>
    <a href="admin_logged_in.php" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
        class="fas  fa-sm text-white-50"></i> Add</a>
  </div>
 -->



<?php
  include('includes/scripts.php');
?>
</body>

</html>