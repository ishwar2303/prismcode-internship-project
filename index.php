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
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <!-- //Custom Theme files -->
    <!-- online-fonts -->
    <link href="//fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/dashboard.css">
    <link rel="stylesheet" type="text/css" href="css/sb-admin-2.css">

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <style type="text/css">

      .close-smallpopup{
        height: 30px;
        width: 80px;
        display: flex;
        justify-content: center;
        align-items: center;
        border-radius: 5px;
        background: #ecf0f1;
        cursor: pointer;
        font-weight: 500;
      }
      .small-popup{
        display: flex;
        flex-direction: column;
        justify-content: space-evenly;
        align-items: center;
        height: 100%;
      }

      .no-attempts-found{
          position: absolute;
          top : 50%;
          left : 50%;
          transform: translate(-50%,-50%);
          border : 0.5px solid #bdc3c7;
          border-radius: 15px;
          height: 100px;
          width: 200px;
          background: white;
          box-shadow: 0px 0px 3px 0px black;
          position: fixed;
          z-index: 4;
          display: none;
      }
      .result-not-open{
          position: absolute;
          top : 50%;
          left : 50%;
          transform: translate(-50%,-50%);
          border : 0.5px solid #bdc3c7;
          border-radius: 15px;
          height: 100px;
          width: 200px;
          background: white;
          box-shadow: 0px 0px 3px 0px black;
          position: fixed;
          z-index: 4;
          display: none;
      }
      .quiz-just-do-it-container{
        display: flex;
        justify-content: space-between;
        padding-top: 25px;
      }
      .description-popup{
        position: absolute;
        left: 50%;
        top : 50%;
        height: 326px;
        width: 450px;
        border-radius: 15px;
        box-shadow: 0px 0px 1px 0px black;
        border : 0.5px solid #bdc3c7;
        transform: translate(-50%,-50%);
        background: white;
        z-index: 4;
        display: none;
        position: fixed;
        background: #4b4b4b;
        color: white;
      }
      .description-popup-for-description{
        display: flex;
        justify-content: center;
        align-items: center;
        position: absolute;
        left : 0;
        top : 0;
        position: fixed;
        width: 100%;
        height: 100vh;
        background: rgba(75, 75, 75,0.5);
        z-index: 3;
        display: none;
      }
      .cancel-icon-container{
        width: 100%;
        display: flex;
        align-items: center;
        justify-content: flex-end;
        padding-right: 7px;
        padding-top: 5px;
        font-size: 23px;
        height: 27px;
      }
      .cancel-icon-container > i{
        cursor: pointer;
      }
      #quiz-name{
        padding: 3px 13px;
        font-weight: bold;
        margin-top: 5px;
      }
      #questions-time{
        display: flex;
        justify-content: space-between;
        padding: 3px 10px;    
        border: 0.5px solid #bdc3c7;
        margin: 3px 10px;
        border-radius: 3px;
        background: #3498db;
      }
      #exam-key{

        padding: 3px 10px; 
        border: 0.5px solid #bdc3c7;
        margin: 3px 10px;
        border-radius: 3px;
        background: #3498db;
      }
      #quiz-description{
        overflow-y: scroll;
        padding: 3px 10px; 
        border: 0.5px solid #bdc3c7;
        margin: 3px 10px;
        border-radius: 3px;
        background: #3498db;
      }

      .black-cover{
        display: flex;
        justify-content: center;
        align-items: center;
        position: absolute;
        left : 0;
        top : 0;
        position: fixed;
        width: 100%;
        height: 100vh;
        background: rgba(75, 75, 75,0.5);
        z-index: 3;
        display: none;
      }
      .black-cover-for-result{   
        display: flex;
        justify-content: center;
        align-items: center;
        position: absolute;
        left : 0;
        top : 0;
        position: fixed;
        width: 100%;
        height: 100vh;
        background: rgba(75, 75, 75,0.5);
        z-index: 3;
        display: none;
      }
      .login-form-popup{
        position: absolute;
        left: 50%;
        top : 50%;
        height: 326px;
        width: 450px;
        border-radius: 15px;
        box-shadow: 0px 0px 1px 0px black;
        border : 0.5px solid #bdc3c7;
        transform: translate(-50%,-40%);
        background: white;
        z-index: 3;
        display: none;
      }
      .login-option-container{
        display: flex;
        border-top-right-radius: 15px;
        border-top-left-radius: 15px;
      }
      .login-option-container > label{
        display: flex;
        flex : 1;
        height: 40px;
        justify-content: center;
        align-items: center;
        background: #3498db;
        color: white;    
        border-top-left-radius: 15px;
        border-top-right-radius: 15px;
      }
      .input-container{
        display: flex;
        flex-direction: column;
        position: relative;
        width: 100%;
        justify-content: center;
        align-items: center;
        height: 70px;
      }
      .form-input-style{
        border : none;
        border-bottom: 2px solid #bdc3c7;
        width: 80%;
        height: 35px;
        z-index: 4;
        background: transparent;
        transition :  ease-in 1000ms;
      }
      .form-input-style:focus{
        border : none;
        border-bottom : 2px solid #3498db;
        outline: none;
        background: white;
      }
      .input-label{
        position: absolute;
        top : 22px;
        left : 44px;
      }
      .submit-container{
        display: flex;
        justify-content: center;
        align-items: center;
        margin-top: 20px;
      }
      .submit-btn{
        width: 23%;
        height: 35px;
        border-radius: 5px;
        border : 2px solid #2980b9;
        background: #2980b9;
        color : white;
      }
      .submit-btn:hover{
        color: white;
        border : 0.5px solid #3498db;
        background: #3498db;
      }
      .submit-btn:focus{
        outline : none;
      }
      #admin-login-form{
        margin-top: 25px;
      }
      #student-login-form{
        display: none;
      }
      #admin-login-message{
        display: flex;
        justify-content: center;
        align-items: center;
        color : #e74c3c;
        height: 40px;
      }
      .index-header-option{
        color: white;
      }
      .index-header-option:hover{
        color : red;
        cursor: pointer;
      }.phone-drop-btn{
        display: none;
      }
      .phone-click-menu{
        display: none;
      }
      .phone-drop-down-menu
      {
        display: none;
      }

        .laptop-menu{
         width: 600px;
        }
.laptop-menu-content-container{
  display: flex;
  flex-direction: column;
  width: 100%;
}
.top-laptop-menu{
  display: flex;
  flex-wrap: wrap;
}
.bottom-laptop-menu{
  display: flex;
  flex-wrap: wrap;
}
  
      .top-laptop-menu > a, .bottom-laptop-menu > a{
        display: flex;
        flex: 1;
        justify-content: flex-start;
        color: white;
        padding: 14px 0px;
        padding-left: 15px;
        padding-right: 15px;
        align-items: center;
        width: 250px;
      }
      .top-laptop-menu > a > span, .bottom-laptop-menu > a > span{
        padding-left: 10px;
      }
       .top-laptop-menu > a:hover, .bottom-laptop-menu > a:hover{
        background: rgba(0,0,0,0.8);
        opacity: 0.9;
      }

      .top-laptop-menu > label, .bottom-laptop-menu > label{
        display: flex;
        flex: 1;
        justify-content: flex-start;
        color: white;
        padding: 14px 0px;
        padding-left: 15px;
        padding-right: 15px;
        align-items: center;
        width: 250px;
        margin-bottom: 0;
        cursor: pointer;
      }
      .top-laptop-menu > label > span, .bottom-laptop-menu > label > span{
        padding-left: 10px;
      }
      .top-laptop-menu > label:hover, .bottom-laptop-menu > label:hover{
        background: rgba(0,0,0,0.8);
        opacity: 0.9;
      }

      .right-end{
        display: none;
      }
      @media screen and (max-width: 800px){
        .laptop-menu{
          display: none;
        }
        .login-form-popup{
          width: 354px;
          position: fixed;
        }
      .input-label{
        position: absolute;
        top : 22px;
        left : 28px;
      }
      .form-input-style{
        width: 83%;
      }
      .description-popup{
        width: 354px;
      }
      .index-header-option{
        color: blue;
      }

      .phone-drop-btn{
        font-size: 26px;
        display: none;
      }
      .phone-drop-btn{
        font-size: 0;
      }
      .toggle{
        width: 0px;
        height: 0px;
        padding: 0;
      }
      .phone-drop{
        background: #4b4b4b;
      }
      .drop-menu-home{
        width: 100%;
      }
      .drop-menu-home:hover{
        background: #636e72;
      }
      .toggle > i{
        font-size: 35px;
      }
      .help{
        font-size: 12px;
        color: black;
        font-weight: bold;
      }
      .phone-click-menu{
        font-size: 35px;
        position: absolute;
        top : 15px;
        right: 15px;
        color: white;
        cursor: pointer;
      }
      .phone-drop-down-menu{
        position: absolute;
        top : 55px;
        width: 94%;
        left : 50%;
        transform: translate(-50%);
        opacity: 0.9;
        background: black;
        border-radius: 10px;
        padding: 12px 0px;
        display: none;
      }
      .phone-drop-down-menu > a{
        display: flex;
        flex: 1;
        justify-content: flex-start;
        color: #3498db;
        padding: 14px 0px;
        padding-left: 15px;
        align-items: center;
        width: 100%;

      }
      .phone-drop-down-menu > a > span{
        padding-left: 10px;
      }
      .phone-drop-down-menu > a:hover{
        background: #3d3d3d;
        color: white;
        opacity: 0.9;
      }

      .phone-drop-down-menu > label{
        display: flex;
        flex: 1;
        justify-content: flex-start;
        color: #3498db;
        padding: 14px 0px;
        padding-left: 15px;
        align-items: center;
        width: 100%;
        margin : 0;

      }
      .phone-drop-down-menu > label > span{
        padding-left: 10px;
      }
      .phone-drop-down-menu > label:hover{
        background: #3d3d3d;
        color: white;
        opacity: 0.9;
      }
      .right-end{
        display: flex;
        padding-right: 15px;
        justify-content: flex-end;
        flex: 1;
      }
}

.admin-login-label{
  display: none;
}
.student-login-label{
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
a{
  text-decoration: none;
}
#log{
  margin-right: 10px;
}
@media screen and (min-width: 801px){

      .phone-click-menu{
        display: none;
        position: absolute;
        opacity: 0;z-index: -2;
      }
      .phone-drop-down-menu
      {
        display: none;
      }
      .phone-drop-down-menu > a
      {
        display: none;
      }
      .phone-drop-down-menu > label
      {
        display: none;
      }
}
@media screen and (max-width: 900px) and (min-width: 801px){
  #logo {
    width: 250px;
  }
  #logo a{
    font-size: 33px;
  }
  #logo a > sup{
    font-size: 25px;
  }
}
.result-container{
  display: flex;
  justify-content: center;
  align-items: center;
  flex-direction: column;
  background: rgba(236, 240, 241,0.3);
    padding: 25px;
}
.email-or-reg-for-result > input{
  width: 300px;
  height: 40px;
  margin-top: 10px;
  border-radius : 5px;
  border : 0.5px solid #bdc3c7;
  padding: 0px 5px;
}
.email-or-reg-for-result > input:focus{
  outline : none;
  box-shadow: 0px 0px 0px 3px rgba(52, 152, 219,0.5); 
  border-color: #3498db;
}
.select-exam-for-result > select{
  width: 300px;
  height: 40px;
  margin-top: 10px;
  border-radius : 5px;
  border : 0.5px solid #bdc3c7;
}
.select-exam-for-result > select:focus{
  outline : none;
  box-shadow: 0px 0px 0px 3px rgba(52, 152, 219,0.5);
  border-color: #3498db;
}
#check-result-btn{
  width: 300px;
  height: 40px;
  margin-top: 10px;
  border-radius : 5px;
  border : 0.5px solid #bdc3c7;
  font-weight: 500;
  background: #27ae60;
  color: white;
}
#check-result-btn:hover{
  background: #2ecc71;
  color: white;
}
#check-result-btn:focus{
  outline: none;
}
#result-card{
  width: 400px;
  height: 480px;
  position: absolute;
  left: 50%;
  top : 50%;
  transform: translate(-50%,-50%);
  border-radius: 5px;
  padding: 20px 10px;
  display: none;
  z-index: 4;
  position : fixed;
  background: white;
  box-shadow : 0px 0px 2px 0px black;
  overflow-x: scroll;
}
#result-content{
  display: flex;
  flex-direction: column;
  justify-content: space-evenly;
  align-items: center;
  height: 100%;
}
#result-content > div{
  display: flex;
  align-self: flex-start;
  justify-content: flex-start;
}
@media screen and (max-width : 430px){
  #result-card{
    width: 330px;
  }
  #result-content{
    overflow-x: scroll;
    height: 430px;
    overflow-y: hidden;
  }
}
.align-same{
  width: 200px;
}
.no-results{
  display: flex;
  justify-content: center;
  align-items: center;
  background: #ecf0f1;
  padding : 10px 0px; 
}
.no-results > label{
  color : red;
  font-weight: bold;
}
    </style>
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
      function changeLabelPosition(index){
        var x = document.getElementsByClassName('input-label')[index];
        x.style.top = '-5px';
        //x.style.left = '45px';
        x.style.color = '#2980b9';
          x.style.transition = 'ease-in 100ms';
      }

        function defaultSetLabel(index){
          var x = document.getElementsByClassName('input-label')[index];
          var value = document.getElementsByClassName('form-input-style')[index].value;
          if(value == ''){
            x.style.top = '22px';
            //x.style.left = '50px';
            x.style.color = '#95a5a6';
            x.style.transition = 'ease-in 100ms';  
          }
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
          for(i=0;i<x.length;i++){
            if(x[i].value == ''){
              defaultSetLabel(i);
            }
            else{
              changeLabelPosition(i);
            }
          }
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
          $('#admin-login-message').load(url,{
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
    }
?>
    <!-- main -->
    <div class="main-content" id="home">
        <!-- header -->
        <header style="margin:0;padding:0;z-index: 0;">
            <div style="margin:0;" class="container-fluid">
                <!-- nav -->
                <div class="quiz-just-do-it-container">
                    <div id="logo">
                        <h1><a href="index.php">QuizWit</sup></a></h1>
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
                            <a href="">
                              <i class="fas fa-eye"></i>
                              <span>Take a Look</span>
                              <span class="right-end">
                                <i class="fas fa-caret-right"></i>
                              </span>
                            </a>
                            <a href="">
                              <i class="fas fa-id-card-alt"></i>
                              <span>Contact Us</span>
                              <span class="right-end">
                                <i class="fas fa-caret-right"></i>
                              </span>
                            </a>
                            <a href="">
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
                      <a href="">
                        <i class="fas fa-eye"></i>
                        <span>Take a Look</span>
                        <span class="right-end">
                          <i class="fas fa-caret-right"></i>
                        </span>
                      </a>
                      <a href="">
                        <i class="fas fa-id-card-alt"></i>
                        <span>Contact Us</span>
                        <span class="right-end">
                          <i class="fas fa-caret-right"></i>
                        </span>
                      </a>
                      <a href="">
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
        <!-- //header -->

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
    <!-- //entry -->
    <!-- banner-bottom -->
    <section class="banner-bottom py-5" id="about">
        <div style="position: relative;" class="container py-md-4">
            <div class="row banner-grids">
              
               <div   class="table-responsive">

              <?php 
                $sql = "SELECT * FROM quizes WHERE is_active='1' ORDER BY quiz_name";
                $result = mysqli_query($conn,$sql);
                if($result->num_rows>0){
                       ?>
<!--                        <img style="width: 90px;height: 80px;" src="images/happy.jpg">
 -->          <div style="display: flex; width: 340px; justify-content: space-evenly;"><i style="font-size : 35px;" class="fas fa-laptop"></i><span>See description for more details.</span></div>
              <div class="description-popup">
                <div id="description-popup-content">

                </div>
              </div>
              <table class="table card-table table-vcenter text-nowrap">
                <thead>
                  <tr>
                       <th>Quiz Name</th>
                       <th>Description</th>
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
                                        <span class="view-description-popup" style="cursor:pointer;padding-left: 15px;"><i style="margin-right : 3px;" class="fas fa-eye"></i>View</span>
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
                <img style="width : 150px; height: 150px;" src="images/robot_sticker.png">
                <label style="margin-left : 50px; color : #e74c3c; font-weight: bold;">Currently No Quizes are available!</label>
              </div>
              <?php
            }
            ?>
            </div>

            </div>
        </div>
    </section>

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
                      echo "<option value ='$row[quiz_id]'>$row[quiz_name]</option>";
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
        <div class="no-results">
          <label>Currently no results are open!</label>
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
    <footer class="footer-content text-center py-5">
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
            <form action="">
              <div class="input-container">
                <label class="input-label">E-mail</label>
                <input oninput="var str = this.value; this.value=str.toLowerCase();" onkeyup="changeLabelPosition(0)" onfocusout="defaultSetLabel(0)" class="form-input-style" type="email" name="email" required>
              </div>
              <div class="input-container">
                <label class="input-label">Password</label>
                <input onkeyup="changeLabelPosition(1)" onfocusout="defaultSetLabel(1)" class="form-input-style" type="password" name="pass" required>
              </div>
              <div class="submit-container">
                <input class="submit-btn" type="submit" name="admin-login" value="Login">
              </div>
              <div id="admin-login-message"></div>
            </form>
          </div>
          <div id="student-login-form">
            <form action="">
              <div class="input-container">
                <label class="input-label">Full Name</label>
                <input oninput="var str = this.value; this.value=str.toUpperCase();" onkeyup="changeLabelPosition(2)" onfocusout="defaultSetLabel(2)" class="form-input-style" type="text" name="name" required>
              </div>
              <div class="input-container">
                <label class="input-label">Registration Number</label>
                <input oninput="var str = this.value; this.value=str.toUpperCase();" onkeyup="changeLabelPosition(3)" onfocusout="defaultSetLabel(3)" class="form-input-style" type="text" name="regNo" required="true">
              </div>
              <div class="input-container">
                <label class="input-label">E-mail</label>
                <input oninput="var str = this.value; this.value=str.toLowerCase();" onkeyup="changeLabelPosition(4)" onfocusout="defaultSetLabel(4)" class="form-input-style" type="email" name="email" required>
              </div>
              <div class="submit-container">
                <input class="submit-btn" type="submit" name='student-login' value="Login">
              </div>
              <div id="student-login-message"></div>
            </form>
          </div>
        </div>
    </div>

    <div  class="result-not-open">
      <div class="small-popup">
        <span style="width: 100%;height: 30px;display: flex;justify-content: center;align-items: center;color : #e74c3c;">Result is not Open!</span>
        <span>Contact your Admin.</span>
      </div>
     
    </div>
    <div class="no-attempts-found">
      <div class="small-popup">
        <span style="width: 100%;height: 30px;display: flex;justify-content: center;align-items: center;color : #e74c3c;">Incorrect Credentials!</span>
      </div>
    </div>
</body>

</html>
