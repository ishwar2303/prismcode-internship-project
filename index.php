<?php
  session_start();
  require_once('connection.php');
if(isset($_SESSION['test_started'])){
    header('Location: takeexam.php');
    return;
  }
?>
<!DOCTYPE html>
<html lang="zxx">

<head>
    <title>Home Page | Quiz</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf-8" />
    <meta name="keywords" content="Provision Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
	SmartPhone Compatible web template, free WebDesigns for Nokia, Samsung, LG, Sony Ericsson, Motorola web design" />
    <script>
        addEventListener("load", function() {
            setTimeout(hideURLbar, 0);
        }, false);

        function hideURLbar() {
            window.scrollTo(0, 1);
        }

    </script>
    <!-- Custom Theme files -->
    <link href="css/bootstrap.css" type="text/css" rel="stylesheet" media="all">
    <link href="css/style.css" type="text/css" rel="stylesheet" media="all">
    <!-- font-awesome icons -->
    <!-- <link href="css/font-awesome.min.css" rel="stylesheet"> -->
    <!-- //Custom Theme files -->
    <!-- online-fonts -->
    <script src="https://kit.fontawesome.com/f9bbf9ac4e.js"></script>
    <link href="//fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/dashboard.css">
    <link rel="stylesheet" type="text/css" href="css/sb-admin-2.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="css/custom/index.css">
    <!-- //online-fonts -->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <script type="text/javascript">

      function showResultNotOpenPopup(){
        document.getElementsByClassName('black-cover-for-result')[0].style.display = 'block';
        document.getElementsByClassName('result-not-open')[0].style.display = 'block';
      }
      function hideResultNotOpenPopup(){
        document.getElementsByClassName('black-cover-for-result')[0].style.display = 'none';
        document.getElementsByClassName('result-not-open')[0].style.display = 'none';
      }
      function showNoAttemptsFound(){
        document.getElementsByClassName('black-cover-for-result')[0].style.display = 'block';
        document.getElementsByClassName('no-attempts-found')[0].style.display = 'block';
      }
      function hideNoAttemptsFound(){
        document.getElementsByClassName('black-cover-for-result')[0].style.display = 'none';
        document.getElementsByClassName('no-attempts-found')[0].style.display = 'none';
      }

      function openDescriptionPopup(){
        document.getElementsByClassName('description-popup')[0].style.display = 'block';
        document.getElementsByClassName('description-popup-for-description')[0].style.display = 'block';
      }
      function onClickBlackCoverOfDescription(){
        document.getElementsByClassName('description-popup')[0].style.display = 'none';
        document.getElementsByClassName('description-popup-for-description')[0].style.display = 'none';
      }

      function onClickBlackCoverOfResult(){
        document.getElementById('result-card').style.display = 'none';
        document.getElementsByClassName('black-cover-for-result')[0].style.display = 'none';
        document.getElementsByClassName('no-attempts-found')[0].style.display = 'none';
        document.getElementsByClassName('result-not-open')[0].style.display = 'none';
      }

      function onClickBlackCover(){
        document.getElementsByClassName('black-cover')[0].style.display = 'none';
        document.getElementsByClassName('login-form-popup')[0].style.display = 'none';
      }
      function showLoginFormPopup(){
        document.getElementsByClassName('black-cover')[0].style.display = 'block';
        document.getElementsByClassName('login-form-popup')[0].style.display = 'block';

          var x = document.getElementsByClassName('form-input-style');
          var i;
          // for(i=0;i<x.length;i++){
          //   if(x[i].value == ''){
          //     defaultSetLabel(i);
          //   }
          //   else{
          //     changeLabelPosition(i);
          //   }
          // }
      }

      function showAdminLoginForm(){
        document.getElementById('admin-login-form').style.display = 'block';
        document.getElementById('student-login-form').style.display = 'none';
        var x = document.getElementsByClassName('login-option-container')[0].getElementsByTagName('label');
        document.getElementById('admin-login-label').style.display = 'block';
        document.getElementById('student-login-label').style.display = 'none';
        /*
        x[0].style.background = '#3498db';
        x[0].style.color = 'white';
        x[1].style.background = 'white';
        x[1].style.color = 'black';*/
      }
      function showStudentLoginForm(){
        document.getElementById('student-login-form').style.display = 'block';
        document.getElementById('admin-login-form').style.display = 'none';
        var x = document.getElementsByClassName('login-option-container')[0].getElementsByTagName('label');
        
        document.getElementById('admin-login-label').style.display = 'none';
        document.getElementById('student-login-label').style.display = 'block';
        /*
        x[0].style.background = 'white';
        x[0].style.color = 'black';
        x[1].style.background = '#3498db';
        x[1].style.color = 'white';*/
      }
      function toggleDropdown(){
          if(toggleDrop ==1){
          document.getElementsByClassName('phone-drop')[0].style.display = 'block';
          toggleDrop = 0;

          }
          else{

          document.getElementsByClassName('phone-drop')[0].style.display = 'none';
          toggleDrop = 1;
          }
      }
      $(document).ready(function(){
        $(document).on('submit','#admin-login-form',function(){
          var e = document.getElementsByClassName('form-input-style')[0].value;
          var p = document.getElementsByClassName('form-input-style')[1].value;
          url = 'admin_verification.php';
          $('#admin-login-message').load(url,{
            email : e,
            pass : p
          });
          return false;
        });
      });

      $(document).ready(function(){
        $(document).on('submit','#student-login-form',function(){
          var n = document.getElementsByClassName('form-input-style')[2].value;
          var r = document.getElementsByClassName('form-input-style')[3].value;
          var e = document.getElementsByClassName('form-input-style')[4].value;
          url = 'login.php';
          $('#student-login-message').load(url,{
            name : n,
            regNo : r,
            email : e
          });
          return false;
        });
      });

      var phoneToggleMenu = 1;
      function showHideDropdownMenuInPhone(){
        if(phoneToggleMenu){
        document.getElementsByClassName('phone-drop-down-menu')[0].style.display = 'block';
        phoneToggleMenu = 0;
        }
        else{

        document.getElementsByClassName('phone-drop-down-menu')[0].style.display = 'none';
        phoneToggleMenu = 1;
        }
      }
    </script>
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
</script>
</head>

<body>
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
      unset($_SESSION['student_login_time']);
      unset($_SESSION['regNo']);
      unset($_SESSION['email']);
      unset($_SESSION['name']);
      unset($_SESSION['login_time']);
    }
?>
    <!-- main -->
    <div class="main-content" id="home">
        <!-- header -->
        <header style="" class="home-header">
            <div style="margin:0;" class="container-fluid">
                <!-- nav -->
                <div class="quiz-just-do-it-container">
                    <div id="logo">
                        <h1><a  class="p-0" href="index.php">QuizWit</sup></a></h1>
                    </div>
                    <div class="laptop-menu">
                      <div class="laptop-menu-content-container">
                          <div class="top-laptop-menu">
                            <a href="admin_registration.php">
                              <i class="fas fa-user-circle"></i>
                              <span>Registration</span>
                              <span class="right-end">
                                <i class="fas fa-caret-right"></i>
                              </span>
                              
                            </a>

                            <?php 
                            if(!isset($_SESSION['login_time'])){
                            ?>
                            <label onclick="showLoginFormPopup();showAdminLoginForm()">
                              <i class="fas fa-sign-in-alt"></i>
                              <span>Admin Login</span>
                              <span class="right-end">
                                <i class="fas fa-caret-right"></i>
                              </span>
                            </label>
                            <?php
                            }
                            ?>
                            <?php 
                            if(!isset($_SESSION['student_login_time'])){
                            ?>
                            <label onclick="showLoginFormPopup();showStudentLoginForm()">
                              <i class="fas fa-sign-in-alt"></i>
                              <span>Student Login</span>
                              <span class="right-end">
                                <i class="fas fa-caret-right"></i>
                              </span>
                            </label>
                            <?php 
                            }
                            ?>
                            <?php 
                            if(isset($_SESSION['login_time'])){
                            ?>
                            <a href="admin_dashboard.php">
                              <i class="fas fa-tachometer-alt"></i>
                              <span>Dashboard</span>
                              <span class="right-end">
                                <i class="fas fa-caret-right"></i>
                              </span>
                            </a>
                            <?php
                            }
                            ?>
                            <?php 
                            if(isset($_SESSION['student_login_time'])){
                            ?>
                            <a href="select_exam.php">
                              <i class="fas fa-graduation-cap"></i>
                              <span>Select Exam</span>
                              <span class="right-end">
                                <i class="fas fa-caret-right"></i>
                              </span>
                            </a>
                            <?php 
                            }
                            ?>
                          </div>
                          <div class="bottom-laptop-menu">
                            <a href="#" class="quizzes-btn">
                            <i class="fas fa-diagnoses"></i>
                              <span>Quizzes</span>
                              <span class="right-end">
                                <i class="fas fa-caret-right"></i>
                              </span>
                            </a>
                            <a href="#" class="contact-us-btn">
                              <i class="fas fa-id-card-alt"></i>
                              <span>Contact Us</span>
                              <span class="right-end">
                                <i class="fas fa-caret-right"></i>
                              </span>
                            </a>
                            <a href="#" class="about-us">
                              <i class="far fa-address-card"></i>
                              <span>About Us</span>
                              <span class="right-end">
                                <i class="fas fa-caret-right"></i>
                              </span>
                            </a>
                        </div>
                      </div>
                    </div>
                    <i onclick="showHideDropdownMenuInPhone()" class="fas fa-bars phone-click-menu"></i>
                    <div class="phone-drop-down-menu">
                      <a href="admin_registration.php">
                        <i class="fas fa-user-circle"></i>
                        <span>Admin Registration</span>
                        <span class="right-end">
                          <i class="fas fa-caret-right"></i>
                        </span>
                        
                      </a>

                      <?php 
                      if(!isset($_SESSION['login_time'])){
                      ?>
                      <label onclick="showLoginFormPopup();showAdminLoginForm()">
                        <i class="fas fa-sign-in-alt"></i>
                        <span>Admin Login</span>
                        <span class="right-end">
                          <i class="fas fa-caret-right"></i>
                        </span>
                      </label>
                      <?php
                      }
                      ?>
                      <?php 
                      if(!isset($_SESSION['student_login_time'])){
                      ?>
                      <label onclick="showLoginFormPopup();showStudentLoginForm()">
                        <i class="fas fa-sign-in-alt"></i>
                        <span>Student Login</span>
                        <span class="right-end">
                          <i class="fas fa-caret-right"></i>
                        </span>
                      </label>
                      <?php 
                      }
                      ?>

                      <?php 
                      if(isset($_SESSION['login_time'])){
                      ?>
                      <a href="admin_dashboard.php">
                        <i class="fas fa-tachometer-alt"></i>
                        <span>Dashboard</span>
                        <span class="right-end">
                          <i class="fas fa-caret-right"></i>
                        </span>
                      </a>
                      <?php
                      }
                      ?>
                      <?php 
                      if(isset($_SESSION['student_login_time'])){
                      ?>
                      <a href="select_exam.php">
                        <i class="fas fa-graduation-cap"></i>
                        <span>Select Exam</span>
                        <span class="right-end">
                          <i class="fas fa-caret-right"></i>
                        </span>
                      </a>
                      <?php 
                      }
                      ?>
                      <a href="#" class="quizzes-btn">
                      <i class="fas fa-diagnoses"></i>
                        <span>Quizzes</span>
                        <span class="right-end">
                          <i class="fas fa-caret-right"></i>
                        </span>
                      </a>
                      <a href="#" class="contact-us-btn">
                        <i class="fas fa-id-card-alt"></i>
                        <span>Contact Us</span>
                        <span class="right-end">
                          <i class="fas fa-caret-right"></i>
                        </span>
                      </a>
                      <a href="#" class="about-us">
                        <i class="far fa-address-card"></i>
                        <span>About Us</span>
                        <span class="right-end">
                          <i class="fas fa-caret-right"></i>
                        </span>
                      </a>
                    </div>
                </div>
                <!-- //nav -->
            </div>
        </header>
        <div class="home-header-padding"></div>
        <!-- //header -->

        <script>
          $(".about-us").click(function() {
              $('html,body').animate({
                  scrollTop: $(".our-team-container").offset().top -125},
                  'fast');
          })
          $(".contact-us-btn").click(function() {
              $('html,body').animate({
                  scrollTop: $(".contact-us").offset().top - 125},
                  'fast');
          })
          $(".quizzes-btn").click(function() {
              $('html,body').animate({
                  scrollTop: $(".quizzes").offset().top -125},
                  'fast');
          })

          $(window).on("scroll", function() {
              if($(window).scrollTop() > 50) {
                  $(".home-header").addClass("active-header");
              } else {
                $(".home-header").removeClass("active-header");
              }
          });
        </script>
        <!-- banner -->
        <div class="banner-content-w3pvt">
            <div class="banner-w3layouts-info text-center">
                <h3>Any successful career starts with a good Education</h3>
               
            </div>
        </div>

        <!-- //banner -->
    </div>
    <!-- //main -->
    <!-- /entry -->
    <div class="entry-w3pvt-main py-5">
        <div class="container px-lg-5 py-md-3">
            <div class="entry-w3layouts-info">
                <h4>Best Online Learning Center</h4>
                <p>Education is the passport to the future, for tomorrow belongs to those who prepare for it today. – Malcolm X</p>
            </div>
        </div>
    </div>
    <div class="main-banner">
        <div class="main-banner-content">
                <h3 id="index-slogan">Why QuizWit ?</h3>
                <div>
                  <span style="font-weight: 350;color: #30306c;">
                      Online Quizzes are a popular form of entertainment with learning. 
                      <br/>
                      We provide you one of the most flexible and impeccable platform that enhance your experience in online learning.
                      <br/>
                      All salient features are integrated and can be used effortlessly.
                  </span>
                </div>
        </div>
    </div>
    <!-- //entry -->
    <!-- banner-bottom -->
    <section class="banner-bottom py-5 quizzes" id="about">
        <div style="position: relative;" class="container py-md-4">
            <div class="row banner-grids">
              
               <div   class="table-responsive">

              <?php 
                $sql = "SELECT * FROM quizes WHERE is_active='1' ORDER BY quiz_name";
                $result = mysqli_query($conn,$sql);
                if($result->num_rows>0){
                       ?>
<!--                        <img style="width: 90px;height: 80px;" src="images/happy.jpg">
 -->          
              <h3 style="padding-left:23px;padding-bottom:15px">Currently Active Quizzes</h3>
              <div class="description-popup">
                <div id="description-popup-content">

                </div>
              </div>
              <table class="table card-table table-vcenter text-nowrap">
                <thead>
                  <tr>
                       <th style="font-weight:bold;">Quiz Name</th>
                       <th style="font-weight:bold;">Info</th>
                   </tr>

                </thead>
                <tbody>
                       <?php
                       $i=0;
                       while($row = $result->fetch_assoc())
                       {
                       	$sql = "SELECT * FROM question_bank WHERE quiz_id = '$row[quiz_id]'";
                       	$result1 = mysqli_query($conn,$sql);
                       	if($result1->num_rows>0)
                       		{
		                        ?>
		                             <tr>
		                                 <td><?php echo $row['quiz_name'];?></td>
		                                 <td style="color:#3498db;">
                                        <span class="view-description-popup" style="cursor:pointer;padding-left: 15px;">View Details</span>
                                        <script type="text/javascript">
                                          $(document).ready(function(){
                                            $(".view-description-popup").eq(<?php echo $i;?>).click(function(){
                                              var url = 'description_popup.php'
                                              $("#description-popup-content").load(url,{
                                                 quizID : <?php echo $row['quiz_id'];?>
                                              });
                                            });
                                          });
                                        </script>
                                      </td>
		                             </tr>
		                        <?php
                            $i++;
		                    }
		                }
                       
                   ?>
       
                                                                  <!-- user -->
                </tbody>
              </table>
              <?php 
            }
            else {
              ?>
              <div class="robot-img-container">
                <!-- <img style="width : 150px; height: 150px;" src="images/robot_sticker.png"> -->
                <label style="margin-left : 50px; color : #cd201f;"><i class="fas fa-exclamation-circle"></i>  Currently No Quiz is available!</label>
              </div>
              <?php
            }
            ?>
            </div>

            </div>
        </div>
    </section>

    <!-- Team -->

    <div class="our-team-container">
      <div class="our-team-content br-t-5px">
              <h3>Developers</h3>
              <span>
                  We’re diverse. That’s why we work well as a team.
                  <br/>
                  We provides complete professional services including web design, development, deployment and support.
              </span>
      </div>
      <div class="our-team-images-container">
          <div>
              <div class="team-image-container">
                  <img src="profile_photo/default_image.png" alt="">
                  <div class="cover-team-image">
                      <div class="cover-team-image-content">
                          <label class="cover-team-name-job-title">
                              <span>Ishwar Baisla</span>
                              <span>Software Engineer</span>
                          </label>
                          <label class="cover-team-social-links">
                              <a href="" target="_blank"> <!-- Give link here -->
                              <i class="fa fa-facebook-f"></i>
                              </a>
                              <a href="" target="_blank"> <!-- Give link here -->
                                  <i class="fa fa-twitter"></i>
                              </a>
                              <a href="" target="_blank"> <!-- Give link here -->
                                  <i class="fa fa-instagram"></i>
                              </a>
                              <a href="https://www.linkedin.com/in/ishwar-baisla-8168151aa/" target="_blank"> <!-- Give link here -->
                                  <i class="fa fa-linkedin-square"></i>
                              </a>
                          </label>
                      </div>
                  </div>
              </div>
              <div class="team-image-container">
                  <img src="profile_photo/default_image.png" alt="">
                  <div class="cover-team-image">
                      <div class="cover-team-image-content">
                          <label class="cover-team-name-job-title">
                              <span>Tapas Baranwal</span>
                              <span>Software Engineer</span>
                          </label>
                          <label class="cover-team-social-links">
                              <a href="" target="_blank"> <!-- Give link here -->
                              <i class="fa fa-facebook-f"></i>
                              </a>
                              <a href="" target="_blank"> <!-- Give link here -->
                                  <i class="fa fa-twitter"></i>
                              </a>
                              <a href="" target="_blank"> <!-- Give link here -->
                                  <i class="fa fa-instagram"></i>
                              </a>
                              <a href="" target="_blank"> <!-- Give link here -->
                                  <i class="fa fa-linkedin-square"></i>
                              </a>
                          </label>
                      </div>
                  </div>
              </div>
          </div>
      </div>
    </div>
    <!-- Team block ends -->
    <?php 
      $sql = "SELECT * FROM quizes WHERE show_evaluation='1' ORDER BY quiz_name";

      $result = mysqli_query($conn,$sql);
      $num = $result->num_rows;
      if($num>0){
    ?>
    <div class="result-container">
	  <h5>Select Your Exam</h5>
      <div class="select-exam-for-result">
        <select id="test" name='test_selected'>
          <option value disabled>Select Quiz</option>
         <?php
               
               while($row = $result->fetch_assoc())
               {    
                      echo "<option value ='$row[quiz_id]'>$row[quiz_name], ID :  $row[quiz_id]</option>";
               }
         ?>
         </select>
      </div>
      <div class="email-or-reg-for-result">
        <input oninput="var str = this.value; this.value=str.toUpperCase();" id="regNo-or-email" type="text" placeholder="E-mail or Registration Number" required>
      </div>
      <div>
        <button id="check-result-btn">CHECK RESULT</button>
      </div>
    </div>
    <?php 
    }
    else{
      ?>
        <div class="no-results" style="color : #cd201f;font-weight:400;">
          <label><i class="fas fa-exclamation-circle"></i>  Currently no results are open!</label>
        </div>
      <?php
    }
    ?>
    <div id="result-card">
      <div id="result-content">
        
      </div>
    </div>
    <script type="text/javascript">
      $(document).ready(function(){
        $("#check-result-btn").click(function(){
          var quiz = document.getElementById('test').value;
          var emailReg = document.getElementById('regNo-or-email').value;
          var url = 'check_result.php';
          $('#result-content').load(url,{
            QuizID : quiz,
            EmailReg : emailReg 
          });
        });
      });
    </script>
 
    <!-- footer -->
    <footer class="footer-content text-center py-5 contact-us">
        <div class="container py-md-3">
            <!-- logo -->
            <h2 class="logo2 text-center">
                <a href="#">
                    QuizWit
                </a>
            </h2>
            <!-- //logo -->
            <!-- address -->
            <div class="contact-left-footer mt-md-4">
                <ul>
                    <li>
                        <p>
                            <span class="fa fa-map-marker mr-2"></span>PrismCode Info Solutions Pvt Ltd
                    </li>
                    <li class="mx-4">
                        <p>
                            <span class="fa fa-phone mr-2"></span>+919017527234, +919821671707
                        </p>
                    </li>
                    <li>
                        <p class="text-wh">
                            <span class="fa fa-envelope-open mr-2"></span>
                            <a href="mailto:info@example.com">
                              <span>ishwar2303@gmail.com, tapasbaranwal@gmail.com</span>
                            </a>
                        </p>
                    </li>
                </ul>
            </div>
            <!-- //address -->
            <!-- social icons -->
           
            <!-- //social icons -->
            <!-- copyright -->
            <div class="w3layouts-copy text-center">
                <p class="text-da">© 2020 Provision. All rights reserved 
                    <a href="http://w3layouts.com/"></a>
                </p>
            </div>
            <!-- //copyright -->
            <!-- move top icon -->
			 <div class="move-top text-center mt-3">
            <a href="#home" class="move-top"><span class="fa fa-angle-double-up" aria-hidden="true"></span></a>
			</div>
			<!-- //move top icon -->
        </div>
    </footer>
    <!-- //footer -->



    <div onclick='onClickBlackCover()' class="black-cover">
      
    </div>
    <div onclick='onClickBlackCoverOfDescription()' class="description-popup-for-description">
      
    </div>
    <div onclick="onClickBlackCoverOfResult()" class="black-cover-for-result">
      
    </div>
    <div class="login-form-popup">
        <div>
          <div class="login-option-container">
            <label>
              <span id="admin-login-label" >Admin Login</span>
              <span id="student-login-label">Student Login</span>
            </label>
          </div>
          <div id="admin-login-form">
            <form action="" class="flex-col">
              <div id="admin-login-message"></div>
              <div class="input-container">
                <label class="input-label">E-mail</label>
                <input oninput="var str = this.value; this.value=str.toLowerCase();"  class="form-input-style" type="text" name="email">
              </div>
              <div class="input-container">
                <label class="input-label">Password</label>
                <input  class="form-input-style" type="password" name="pass">
              </div>
              <div class="submit-container mb-15px">
                <input class="submit-btn" type="submit" name="admin-login" value="Login">
              </div>
            </form>
          </div>
          <div id="student-login-form">
            <form action="" style="padding-top:5px" class="flex-col">
              <div id="student-login-message"></div>
              <div class="input-container">
                <label class="input-label">Full Name</label>
                <input oninput="var str = this.value; this.value=str.toUpperCase();"  class="form-input-style" type="text" name="name" >
              </div>
              <div class="input-container">
                <label class="input-label">Registration Number</label>
                <input oninput="var str = this.value; this.value=str.toUpperCase();"  class="form-input-style" type="text" name="regNo" >
              </div>
              <div class="input-container">
                <label class="input-label">E-mail</label>
                <input oninput="var str = this.value; this.value=str.toLowerCase();"  class="form-input-style" type="text" name="email" >
              </div>
              <div class="submit-container mb-15px">
                <input class="submit-btn" type="submit" name='student-login' value="Login">
              </div>
            </form>
          </div>
        </div>
    </div>

    <div  class="result-not-open">
      <div class="small-popup">
        <span style="width: 100%;height: 30px;display: flex;justify-content: center;align-items: center;color : #cd201f;"><i class="fas fa-exclamation-circle mr-5"></i> Result is not Open</span>
        <span>Contact your Admin.</span>
      </div>
     
    </div>
    <div class="no-attempts-found">
      <div class="small-popup">
        <span style="width: 100%;height: 30px;display: flex;justify-content: center;align-items: center;color : #cd201f;"><i class="fas fa-exclamation-circle mr-1"></i> Incorrect Credentials</span>
      </div>
    </div>
</body>

</html>
