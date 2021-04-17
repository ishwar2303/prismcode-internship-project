
<?php

    session_start();
    require_once('connection.php');
     
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Contact Us</title>
  <style >
    .button{
      background-color: #cbb09b;
    }
    .gradient {background: linear-gradient(45deg, #2980b9, #3498db);
}
  </style>

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
  <?php include 'includes/header.php'; ?>
  <?php include 'includes/navbar.php'; ?>

      <!-- Section: form gradient -->
      <div class="container">
  <div style="height: 55px;"></div>
<section class="form-gradient mb-5">

  <!--Form with header-->
  <div class="card mh-100">

    <!--Header-->
    <div class="gradient">

      <div class="row d-flex justify-content-center">
        <h3 class="white-text mb-0 py-5 font-weight-bold">Contact Us</h3>
      </div>

    </div>
    <!--Header-->

    <div class="card-body mx-4">
      
      <form action="" method="post">
      <div class="md-form">
        <i class="fas fa-tag prefix grey-text"></i>
        <input type="text" name="subject" id="form106" class="form-control" required>
        <label for="form106">Subject</label>
      </div>

      <div class="md-form">
        <i class="fas fa-pencil-alt prefix grey-text"></i>
        <textarea id="form107" name="message" class="md-textarea form-control" rows="5" required></textarea>
        <label for="form107">Your message</label>
      </div>
      

      <!--Grid row-->
      <div class="row d-flex align-items-center mb-3 mt-4">

        <!--Grid column-->
        <div class="col-md-12">
          <div class="text-center">
            <button type="submit" class="btn ml-auto" style="background-color: #2980b9; color: white;">Send</button>
          </div>
        </div>
        </form>
        <!--Grid column-->

      </div>
      <!--Grid row-->
    </div>

  </div>
  <!--/Form with header-->

</section>
<!-- Footer -->


<!-- Footer -->
   
</body>
</html>


<?php
  if(isset($_POST['subject']) && isset($_POST['message']))
  {
       $subject = mysqli_real_escape_string($conn,$_POST['subject']);
       $message = mysqli_real_escape_string($conn,$_POST['message']);
       $subject = strip_tags($subject);
       $message = strip_tags($message);
       if(!empty($message) && !empty($subject)){
        $sql ="INSERT INTO `message` (`message_id`, `subject`, `message`, `email`, `timestamp`) VALUES (NULL, '$subject', '$message', '$_SESSION[email]', current_timestamp())";
        
        mysqli_query($conn,$sql);
        $_SESSION['message'] = 'Message Sent Successfully';
        $_SESSION['color'] = '#f39c12';
        ?>
        <script type="text/javascript">location.href='admin_dashboard.php';</script>
        <?php 
        }
        else{
        $_SESSION['message'] = 'Subject And Message Required!';
        $_SESSION['color'] = '#cd201f';
        ?>
        <script type="text/javascript">location.href='contact_us.php';</script>
        <?php 
      }
}
 
?>