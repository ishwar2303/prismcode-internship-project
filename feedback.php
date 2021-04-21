<!DOCTYPE html>
<html>
<head>
  <title>Feedback</title>
</head>
</html>
<?php
        session_start();
		require_once('connection.php');
  if(isset($_SESSION['student_login_time']))
     {
      $current_time = time();
        $student_login_time = $_SESSION['student_login_time'];
      if($current_time - $student_login_time   > 300000) 
      {
         header('location: logout.php');
      }
     }
     else header('location: logout.php');

  if(isset($_GET['feedback'])){
    
    $_SESSION['feedback_sent'] = true;
    unset($_SESSION['test_started']);
  }
  else if(isset($_SESSION['test_started'])){
    header('Location: takeexam.php');
    return;
  }
    
    if(!isset($_SESSION['give_feedback']))
    {
      header('Location: logout.php');
      return;
    }
    $_SESSION['submit'] = "true";
?>  <style >
    .button{
      background-color: #3498db;
    }
    .gradient {
              background-image:
                                linear-gradient(
                                  45deg,
                                  #2980b9,
                                  #3498db
    );
}

#btnBar{
  display: none;
}
.success-pop-up
{
  text-align: center;   
        padding: 10px 25px;
  color:white ;
  padding-top : 10px;
  border-radius: 5px;
  position: absolute;
  top : 40%;
  transform: translate(-50%,-50%);
  left: 50%;
  display: none;
  font-size: 16px;
  z-index: 5;
} 
#skip-btn{
  width: 80px;
  height: 35px;
  box-shadow: 0px 0px 2px 0px #bdc3c7;
  border-radius: 5px;
  background: #4b4b4b;
  font-weight: 500;
  color: white;
  display: flex;
  justify-content: center;
  align-items: center;
  }
  </style>

<script type="text/javascript">
  
      var interval;
      var top_value = 40;
      function timer_on()
      {
        interval=setInterval(Timer,100);
      }
      function Timer()
      {     
        document.getElementsByClassName("success-pop-up")[0].style.transition="background 4000ms linear";
        document.getElementsByClassName("success-pop-up")[0].style.background="transparent";
              
        top_value = top_value+1;
        var temp = top_value+"%";
        document.getElementsByClassName("success-pop-up")[0].style.top=temp;

        if(top_value == 80)
        {
        clearTimeout(interval);
        document.getElementsByClassName("success-pop-up")[0].style.display="none";
        }

        
      } 
      function show_success(color)
      {
        var x = document.getElementsByClassName("success-pop-up");
        x[0].style.display="block";
        x[0].style.background = color;
}
 function submitFeedback() {
  document.getElementById('myform').submit();
 }
</script>
  <!-- Font Awesome -->
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
<!-- Google Fonts -->
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap">
<!-- Bootstrap core CSS -->
<!-- <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet"> -->
<!-- Material Design Bootstrap -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.18.0/css/mdb.min.css" rel="stylesheet">
<!-- JQuery -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<!-- Bootstrap tooltips -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.4/umd/popper.min.js"></script>
<!-- Bootstrap core JavaScript -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/js/bootstrap.min.js"></script>
<!-- MDB core JavaScript -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.18.0/js/mdb.min.js"></script>
</head>
<body>
    <?php include('includes/header.php'); ?>
<div class="success-pop-up">
  <?php 
  if(isset($_SESSION['message']))
    {
            echo $_SESSION['message'];
        }

  ?>
</div>
<?php 
if(isset($_SESSION['message']) && isset($_SESSION['color']))
    {
      echo "<script>show_success('$_SESSION[color]');timer_on();</script>";
      unset($_SESSION['message']);
      unset($_SESSION['color']);
    }
?>
  <div style="margin-top: 25px;" class="container">
<section class="form-gradient mb-5">

  <!--Form with header-->
  <div class="card mh-100">

    <!--Header-->
    <div class="gradient">

      <div class="row d-flex justify-content-center">
        <h3 class="white-text mb-0 py-5 font-weight-bold">Feedback</h3>
      </div>

    </div>
    <!--Header-->

    <div class="card-body mx-4">
      
      <form id="myform" action="" method="post">
      <div class="md-form">
        <i class="fas fa-pencil-alt prefix grey-text"></i>
        <textarea id="form107" name="comment" class="md-textarea form-control" rows="5" required></textarea>
        <label for="form107">Your message</label>
      </div>
      

      <!--Grid row-->

        <!--Grid column-->
        
        </form>
        <div class="col-md-12">
          <div class="text-center">
            <button  class="btn ml-auto" onclick="location.href='logout.php';">Skip</button>
            <button  onclick="submitFeedback()" class="btn ml-auto" style="background-color: #3498db; color: white;">Send</button>
          </div>
        </div>
        <!--Grid column-->

      </div>
      <!--Grid row-->
    </div>

  </div>
  <!--/Form with header-->

</section>

   

</body>
</html>
<?php
    if(isset($_SESSION['test_started']))
      unset($_SESSION['test_started']);
    if(isset($_SESSION['question_no']))
      unset($_SESSION['question_no']);
    if(isset($_SESSION['ANSWER']))
      unset($_SESSION['ANSWER']);
    if(isset($_SESSION['QUESTIONS']))
      unset($_SESSION['QUESTIONS']);
    if(isset($_SESSION['CORRANSWERS']))
      unset($_SESSION['CORRANSWERS']);
    if(isset($_SESSION['REVIEW']))
      unset($_SESSION['REVIEW']);
    if(isset($_POST['comment'])){
            $comment = $_POST['comment'];
            $comment = mysqli_real_escape_string($conn,$comment);
            $comment = strip_tags($comment);
            $sql = "SELECT * FROM attempts WHERE quiz_id='$_SESSION[exam_id]' AND email='$_SESSION[email]'";
            $result = mysqli_query($conn,$sql);
            $row = $result->fetch_assoc();
            $AID = $row['attempt_id'];
            if(!empty($comment)){
        		$sql = "INSERT INTO feedback (`feedback_id`, `comment`, `attempt_id`) VALUES (NULL, '$comment', '$AID')";
        		mysqli_query($conn,$sql) or die(mysqli_error($conn));
       			$_SESSION['message'] = 'Feedback Sent Successfully';
            $_SESSION['color'] = '#4b4b4b';
            unset($_SESSION['exam_end']);
           ?>
           <script>
                   location.href='index.php';
            </script>";
            <?php
          }
          else{
            $_SESSION['message'] = 'Message Required!';
            $_SESSION['color'] = '#cd201f';
            ?>
            <script type="text/javascript">location.href='feedback.php';</script>
            <?php
          }
        }
        
?>