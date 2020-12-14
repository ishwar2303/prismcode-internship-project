
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script type="text/javascript">

$(document).ready(function(){
  $('body').bind("cut copy paste",function(e) {
     e.preventDefault();
  });
});
jQuery(document).ready(function() {
    function disableSelection(e) {
        if (typeof e.onselectstart != "undefined") e.onselectstart = function() {
            return false
        };
        else if (typeof e.style.MozUserSelect != "undefined") e.style.MozUserSelect = "none";
        else e.onmousedown = function() {
            return false
        };
        e.style.cursor = "default"
    }
    window.onload = function() {
        hideAll();setInterval(Timer,1000);
        Timer();
        count();
        disableSelection(document.body);
    };

    window.addEventListener("keydown", function(e) {
        if (e.ctrlKey && (e.which == 65 || e.which == 66 || e.which == 67 || e.which == 70 || e.which == 73 || e.which == 80 || e.which == 83 || e.which == 85 || e.which == 86)) {
            e.preventDefault()
        }
    });
    document.keypress = function(e) {
        if (e.ctrlKey && (e.which == 65 || e.which == 66 || e.which == 70 || e.which == 67 || e.which == 73 || e.which == 80 || e.which == 83 || e.which == 85 || e.which == 86)) {}
        return false
    };

    document.onkeydown = function(e) {
        e = e || window.event;
        if (e.keyCode == 123 || e.keyCode == 18) {
            return false
        }
    };

    document.oncontextmenu = function(e) {
        var t = e || window.event;
        var n = t.target || t.srcElement;
        if (n.nodeName != "A") return false
    };
    document.ondragstart = function() {
        return false
    };
});
  </script>

<style>
    .uncheck-option{
    height: 30px;
    background: linear-gradient(90deg, #FEC001, #FA990A);
    color: black;
    border-radius: 3px;
    cursor: pointer;
    display: none;
    padding: 0px 7px;
    line-height: 30px;
    margin-bottom: 5px;
    font-weight: 500;
    }
    .marking{

    height: 30px;
    background: linear-gradient(90deg, #FEC001, #FA990A);
    color: black;
    border-radius: 3px;
    cursor: pointer;
    padding: 0px 30px;
    line-height: 30px;
    margin-bottom: 5px;
    font-weight: 500;
    }
    .marking:hover, .mark-as-review:hover, .remove-from-review:hover,.uncheck-option:hover{
        background: linear-gradient(90deg, #FA990A, #FEC001);
    }
    .mark-as-review{
    height: 30px;
    background: linear-gradient(90deg, #FEC001, #FA990A);
    color: black;
    border-radius: 3px;
    cursor: pointer;
    padding: 0px 7px;
    line-height: 30px;
    margin-bottom: 5px;
    font-weight: 500;
    }
    .remove-from-review{

    height: 30px;
    background: linear-gradient(90deg, #FEC001, #FA990A);
    color: black;
    border-radius: 3px;
    cursor: pointer;
    padding: 0px 5px;
    line-height: 30px;
    margin-bottom: 5px;
    display: none;
    font-weight: 500;
    }
    .border-buttom-red{
        border-bottom: 0.25rem #FC1A1A;
    }
    .max-width{
        max-width: 100%;
        margin-top: -10px;
        padding: 0%;
    }
    .main{
        width : 100%;
    }
    .margin-progress{
        margin-left: 24px;
        margin-right: 24px;
    }
    .text-left{
        text-align: left;
    }
    .question-switch-container{
        width: 240px;
        display: flex;
        border : 0.5px solid #bdc3c7;
        flex-direction: column;
        align-items: center;
        background: white;
        border-radius: 5px;
        border-bottom: 0.25rem solid #bdc3c7 !important;
        margin-top : 5px;
        margin-bottom: -22px;
    }
    .questions-labels-status{

        display: flex;
        width: 95%;
        padding: 10px 0px;
        justify-content: center;
        height: 400px;
        overflow-y: scroll;
    }
    .questions-labels-status > div{
        flex-wrap: wrap;
        display: flex;
        height: 0;
    }
    .question-switch-container > span{
        height: 30px;
        display: flex;
        align-items: center;
        border-bottom : 2px solid #bdc3c7;
        width: 100%;
        justify-content: center;
        font-size: 18px;
        font-weight: 650;
        color : #95a5a6;
    }
    .question-switch-container div > label{
        font-size: 17px;
        display: flex;
        align-items: center;
        justify-content: center;
        border: 0.5px solid #bdc3c7;
        margin: 0;
        width: 35px;
        height: 35px;
        margin: 3px;
        cursor: pointer;
        border-radius: 3px;
    }
    .question-switch-container div > label:hover{
        background: #ecf0f1;
    }
    .main-container{
        display: flex;
        justify-content: space-evenly;
        margin: 0px 0px;
        padding: 3px;
        margin-bottom: 5px;
    }
    .container-left{
        width: 300px;
        display: flex;
        justify-content: center;
        padding-bottom: 62px;
    }
    .container-right{
        width: 85%;
        display: flex;
        justify-content: center;
        flex-direction: column;
        padding: 0px 10px;
    }  
    .question-answer-container{
        background: #2980b9;
        color: white;
        border-bottom-left-radius: 5px;
        border-bottom-right-radius: 5px;
        padding: 5px;
        display: none;
    } 
    .exam-status{
        display: flex;
        justify-content: space-between;
        flex-wrap: wrap;
    }
    .status-card{
        background: white;
        width: 49.5%;
        display: flex;
        flex-direction: column;
        justify-content: space-evenly;
        padding: 10px 15px; 
        background: white;
        border : 0.5px solid #bdc3c7;
        border-radius: 5px;
        border-bottom : 3px solid blue;
        margin-top: 5px;
    }
    .s-one{
        border-color: #bdc3c7;
    }
    .s-two{
        border-color :rgb(94, 186, 0);
    }
    .s-three{
        border-color: #cd201f;
    }
    .s-four{
        border-color: #9b59b6;
    }
    .totalquestion{
        display: flex;
        justify-content: center;
        align-items: center;
        font-weight: 600;
        font-size: 18px;
    }
    .attempted, .remaining, .review{

        display: flex;
        justify-content: center;
        align-items: center;
    }
    .attempted{

        font-weight: 600;
        font-size: 18px;
        color : rgb(94, 186, 0);
    }
    .remaining{

        font-weight: 600;
        font-size: 18px;
        color : #cd201f;
    }
    .review{
        font-weight: 600;
        font-size: 18px;
        color : #9b59b6;

    }
    .status-labels{
        font-weight: bold;
        display: flex;
        justify-content: center;
    }
    .question-sno{
        height: 70px;
        display: flex;
        justify-content: space-between;
        flex-direction: column;
    }
    .question-sno > div{
        display: flex;
        justify-content: space-between;
    }
    .question-no{
        font-size: 18px;
    }
    .question{
        padding: 5px 10px;
        background: white;
        color: black;
        border-radius: 5px;
        border-bottom-right-radius: 0;
        border-bottom-left-radius: 0;
        box-shadow: 0px 1px 2px 0px #bdc3c7;
        margin-bottom: 1px;
    }
    .answer-container{
        padding: 5px 10px;
        background: white;
        color: white;
        margin-top: 0px;
        padding-top: 15px;
        border-radius: 5px;
        border-top-right-radius: 0;
        border-top-left-radius: 0;
    }
    .options{
        width: 100%;
    }

    .question-mark-hint{
        display: flex;
        justify-content: space-evenly;
        align-items: flex-start;
        flex-direction: column;
        height: 200px;
    }
    .question-mark-hint > div{
        display: flex;
        width: 150px;
        justify-content: flex-start;
        align-items: center;
    }
    #attempted-block{

        font-size: 17px;
        display: flex;
        align-items: center;
        justify-content: center;
        border: 0.5px solid #bdc3c7;
        margin: 0;
        width: 20px;
        height: 20px;
        margin: 3px;
        cursor: pointer;
        border-radius: 3px;
        background: rgb(94, 186, 0);
    }
    #review-block{
        font-size: 17px;
        display: flex;
        align-items: center;
        justify-content: center;
        border: 0.5px solid #bdc3c7;
        margin: 0;
        width: 20px;
        height: 20px;
        margin: 3px;
        cursor: pointer;
        border-radius: 3px;
        background: #9b59b6;

    }
    #remaining-block{
        font-size: 17px;
        display: flex;
        align-items: center;
        justify-content: center;
        border: 0.5px solid #bdc3c7;
        margin: 0;
        width: 20px;
        height: 20px;
        margin: 3px;
        cursor: pointer;
        border-radius: 3px;

    }
    @media screen and (min-width:901px){
        .status-card{
            width: 24%;
        }
        .top-padding{
            height: 0px;
        }
    }
@media screen and (max-width: 900px) {
    .questions-labels-status{
        height: 280px;
    }
    .question-mark-hint{
        height: 120px;
        margin-top: 15px;
    }
        .top-padding{
            height: 50px;
        }
    .main-container{
        display: flex;
        padding: 5px;
        flex-direction: column;
        align-items: center;
        margin-top: -15px;
    }
    .container-left{
        width: 100%;
        display: flex;
        justify-content: center;
        padding-bottom: 5px;
    }
    .container-right{
        width: 100%;
        display: flex;
        justify-content: center;
        flex-direction: column;
        padding: 0;
    }.question-switch-container{
        width: 100%;
        position: absolute;
        top : 66px;
        left: 50%;
        z-index: 3;
        position: fixed;
        display: none;
        transform: translate(-50%);
        margin-top: 0;
    }   
    .question-switch-container > div{
        justify-content: flex-start;
        padding-left: 10px;
    }
    .container-right > .container{
        width: 100%;
    }
    .question-container{
    }
    .answer-container{

    }
    .phone-card{
        margin-bottom: 0.5rem;
    }
}
.question{
    height: 250px;
    overflow-y: scroll;
}
.text-left{
    border-radius: 5px;
}

.all-questions-container{
    margin-top: 5px;
}
</style>
<script type="text/javascript">
    var toggleSwitch = 1;
    function showSwitchQuestionOption(){
        if(toggleSwitch == 1)
            {
                document.getElementsByClassName('question-switch-container')[0].style.display = 'block';
                toggleSwitch = 0;
            }
            else{

                document.getElementsByClassName('question-switch-container')[0].style.display = 'none';
                toggleSwitch = 1;
            }
    }
</script>
	<title>Quiz</title>
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

	 <!-- Compiled and minified CSS -->
    <link href="css/sb-admin-2.css" rel="stylesheet">
  <link href="css/dashboard.css" rel="stylesheet">

       <!-- <script>
            function check_password()
            {
                  var x = document.getElementById("pass").value;
                  var y = document.getElementById("confpass").value;
                  if(x==y)
                        return true
                  else {alert("password not matched"); return false;}
            }
      </script>
     -->
  
    <style type="text/css">
    	.brand{
    		background: #cbb09b !important;
    		border-radius: 15px;
    	}
    	.brand-text{
    		color:  #cbb09b !important;
            
    	}
    	.brand-logo{
    		border-radius: 15px;
    	
    	}
        .container
        {
            width : 100%;
        }
    	#main
        {
            width : 50px;
            height :50px;
            
            position: absolute;
            right : 49.8%;
            font-size: 3rem;
        }
    	form{
    		max-width: 460px;
    		margin: 20px auto;
    		padding: 40px;
    		border-radius: 15px;
    	}
    	img {
		  	position: absolute;
            left:3%;
			border-radius: 15px;
		  	padding: 5px;
		  	width: 150px;


		}
        .date-day
          {
            font-size: large;
          }
          .custom-alert{

              position: absolute;
              top : 50%;
              left : 50%;
              transform: translate(-50%,-50%);
              border : 0.5px solid #bdc3c7;
              border-radius: 15px;
              height:200px;
              width: 220px;
              background: white;
              box-shadow: 0px 0px 3px 0px black;
              position: fixed;
              z-index: 7;
              display: none;
              padding: 25px 0px;
          }
          .custom-alert > div{
            display: flex;
            flex-direction: column;
            align-items: center;
            width: 100%;
            padding: 10px;
          }
          .custom-alert > div label{
            width : 100%;
            height : 50px;
            display: flex;
            justify-content: center;
            align-items: center;
          }
          #no-btn{
            width: 80px;
            height: 35px;

            border-radius: 5px;
            color: white;
            border : none;
            cursor: pointer;
            background: #c0392b;
          }
          #yes-btn{
            width: 80px;
            height: 35px;

            border-radius: 5px;
            color: white;
            border : none;
            cursor: pointer;background: #27ae60

          }
          #no-btn:hover{
            background: #e74c3c;
          }
          #no-btn:focus{
            outline: none;
          }
          #yes-btn:hover{
            background: #2ecc71;
          }
          #yes-btn:focus{
            outline: none;
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
        z-index: 4;
        display: none;
          }

          #prev{
            background: #3d3d3d;
            border-radius: 5px;
            color : white;
            width: 120px;
            height: 35px;
            border : none;
          }
          #next{
            background: #2980b9;
            border-radius: 5px;
            color : white;
            width: 120px;
            height: 35px;
            border : none;
          }
          #btn-submit{
            background: rgb(94, 186, 0);
            border-radius: 5px;
            color : white;
            width: 120px;
            height: 35px;
            border : none;
          }
          #next:hover{
            background: #3498db;
          }
          #next:focus{
            outline: none;
          }
          #next > span{
            margin-right: 20px;
          }
          #prev > i{
            margin-right: 20px;
          }
          #prev:hover{
            background: #4b4b4b;
          }
          #prev:focus{
            outline: none;
          }
          #submit{
            outline: none;
          }
          #btn-submit > span{
            margin-right: 15px;
          }

      .marking-popup{
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
      .timer-test{
        color : white;
      }
    </style>
    <script type="text/javascript">
        function showCustomAlertPopup(){
            document.getElementsByClassName('custom-alert')[0].style.display='block';
            document.getElementsByClassName('black-cover')[0].style.display='block';
        }
        function hideCustomAlertPopup(){
            document.getElementsByClassName('custom-alert')[0].style.display='none';
            document.getElementsByClassName('black-cover')[0].style.display='none';
        }

      function showMarkingpopup(){
        document.getElementsByClassName('marking-popup')[0].style.display = 'block';
      }
      function hideMarkingpopup(){
        document.getElementsByClassName('marking-popup')[0].style.display = 'none';

      }
    function autoSubmit()
    {
      showCustomAlertPopup();
    }
        $(document).ready(function(){
            $("#yes-btn").click(function(){
                document.getElementById('myform').submit();
            });
        });
    </script>
    <script type="text/javascript" src="take_quizJAVAscript.js"></script>

</head>
<body onload="hideAll();setInterval(Timer,1000);Timer();">

    <div class="marking-popup">
      <div class="small-popup">
        <span>Constitute <?php echo $questionMarks; ?></span>
        <span style="width: 100%;height: 30px;display: flex;justify-content: center;align-items: center;color : #e74c3c;"> 
            <?php
            if($negativeMarking > 0) 
                echo "Negative Marking -".$negativeMarking;
            else echo "No negative marking!"; 
            ?>
            
        </span>
      <span onclick="hideMarkingpopup()" class="close-smallpopup">Close</span>
      </div>
    </div>

    <div class="black-cover"></div>
    <div class="custom-alert">
        <div>
            <label style="color : red;font-size: 19px;font-weight: bold;">Are you sure!</label>
            <label style="font-size: 17px;">Submit Quiz</label>
            <div style=";display: flex;justify-content: space-evenly;align-items: center;width: 100%;" class="custom-alert-btn-container">
                <button onclick="hideCustomAlertPopup();" id="no-btn">No</button>
                <button id="yes-btn">Yes</button>
            </div>   
        </div>
    </div>
    <div style="display: flex;align-items: center;height: 65px;justify-content: center;" class="header py-4">
        <div style="margin: 0px 0px; width: 95%;" >

            <div style="display: flex;justify-content: space-between;">
                <div style="color : blue;font-size: 28px;" class="date-day">QuizWit<?php /*echo "Date : ".date('d-m-yy')."<br />"."Day &nbsp;: ".date("l");*/?></div>

                <button onclick="showSwitchQuestionOption()" id="show-question-switch" >
                    <i style="color:#2980b9" class="fas fa-bars"></i>
                </button>

                                   <div  style="align-self: center;" class="h2 m-0 timer-test">
                                        <?php 
                                        $_SESSION['page_refresh_time'] = time();
                                        if(!isset($_SESSION['test_start_time']))
                                        {
                                            echo $time_duration;
                                            $_SESSION['test_start_time'] = time();
                                            $_SESSION['test_start_time'] = (int)$_SESSION['test_start_time'] + (int)$time_duration;
                                        }
                                        else{
                                            $newTime = (int)$_SESSION['test_start_time']-(int)$_SESSION['page_refresh_time'];
                                            echo $newTime;
                                        }
                                        ?>
                                    </div>
                <button style="margin-left: 0" class="btn btn-outline-danger ml-auto end-quiz" onclick="autoSubmit()">
                    End Quiz
                </button>
            </div>
        </div>
    </div>
	<!-- <nav class="white z-depth-0">
		<div class="container">
           <div class="d-flex justify-content-between">
                <a href="#" class="header-brand">
                    <img src="templates/download.jpg" alt="brand-logo">
                </a>
                
            <ul id="nav-mobile" class="">
                <li><a href="login.php" class=" btn btn-outline-danger ml-auto ">End Quiz
                    
                </a></li>
            </ul>
           </div>    
        </div>
	</nav>
	 -->
