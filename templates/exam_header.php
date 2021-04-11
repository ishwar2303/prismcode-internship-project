<head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script type="text/javascript">

// $(document).ready(function(){
//   $('body').bind("cut copy paste",function(e) {
//      e.preventDefault();
//   });
// });
// jQuery(document).ready(function() {
//     function disableSelection(e) {
//         if (typeof e.onselectstart != "undefined") e.onselectstart = function() {
//             return false
//         };
//         else if (typeof e.style.MozUserSelect != "undefined") e.style.MozUserSelect = "none";
//         else e.onmousedown = function() {
//             return false
//         };
//         e.style.cursor = "default"
//     }
//     window.onload = function() {
//         hideAll();setInterval(Timer,1000);
//         Timer();
//         count();
//         disableSelection(document.body);
//     };

//     window.addEventListener("keydown", function(e) {
//         if (e.ctrlKey && (e.which == 65 || e.which == 66 || e.which == 67 || e.which == 70 || e.which == 73 || e.which == 80 || e.which == 83 || e.which == 85 || e.which == 86)) {
//             e.preventDefault()
//         }
//     });
//     document.keypress = function(e) {
//         if (e.ctrlKey && (e.which == 65 || e.which == 66 || e.which == 70 || e.which == 67 || e.which == 73 || e.which == 80 || e.which == 83 || e.which == 85 || e.which == 86)) {}
//         return false
//     };

//     document.onkeydown = function(e) {
//         e = e || window.event;
//         if (e.keyCode == 123 || e.keyCode == 18) {
//             return false
//         }
//     };

//     document.oncontextmenu = function(e) {
//         var t = e || window.event;
//         var n = t.target || t.srcElement;
//         if (n.nodeName != "A") return false
//     };
//     document.ondragstart = function() {
//         return false
//     };
// });
  </script>

<style>
    pre{
        background: white;
        /* padding: 0; */
    }
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
        height: 100%;
        z-index: 60;
    width: 260px;
    display: flex;
    /* border: 0.5px solid #bdc3c7; */
    flex-direction: column;
    align-items: center;
    background: #333333;
    border-radius: 3px;
    /* border-bottom: 0.25rem solid #bdc3c7 !important; */
    margin-top: 5px;
    margin-bottom: -32px;
    padding: 5px 10px;
    color: white;
            box-shadow: 0px 0px 15px 0px rgb(0 0 0 / 60%);
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
        /* height: 40px; */
        display: flex;
        align-items: center;
        /* border-bottom : 2px solid #bdc3c7; */
        width: 100%;
        justify-content: center;
        font-size: 18px;
        font-weight: 400;
        color : #95a5a6;
        text-align: center;
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
        border-radius: 0px;
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
        /* width: 300px; */
        display: flex;
        justify-content: center;
        padding-bottom: 11px;
    }
    .container-right{
        /* width: 85%; */
        position: relative;
        display: flex;
        flex: 1;
        flex-direction: column;
        padding: 0px 10px;
    }  
    .question-answer-container{
            box-shadow: 0px 0px 15px 0px rgb(0 0 0 / 60%);
        background: #333333;
        color: white;
        border-bottom-left-radius: 3px;
        border-bottom-right-radius: 3px;
        padding: 5px;
        display: none;
    } 
    .exam-status{
        display: flex;
        justify-content: space-between;
        flex-wrap: wrap;
        margin-top: -0px;
    }
    .status-card{
        background: #333333;
        color: white;
        width: 49.5%;
        display: flex;
        flex-direction: column;
        justify-content: space-evenly;
        padding: 7px 15px; 
        /* border : 0.5px solid #bdc3c7; */
        border-radius: 3px;
            box-shadow: 0px 0px 15px 0px rgb(0 0 0 / 60%);
    /* border-left: 5px solid #333333; */
        margin-top: 5px;
    }
    .status-card > i{
        font-size: 20px;
    }
    /* .s-one{
        border-color: #5783a0;
    }
    .s-two{
        border-color :rgb(94, 186, 0);
    }
    .s-three{
        border-color: #cd201f;
    }
    .s-four{
        border-color: #9b59b6;
    } */
    
    
    .s-one > i{
        color: #6faed8;
    }
    .s-two > i{
        color :rgb(94, 186, 0);
    }
    .s-three > i{
        color: #f1c40f;
    }
    .s-four > i{
        color: #d085ee;
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
        color : #f1c40f;
    }
    .review{
        font-weight: 600;
        font-size: 18px;
        color : #d085ee;

    }
    .totalquestion{
        color: #6faed8;
    }
    .status-labels{
        font-weight: bold;
        display: flex;
        justify-content: center;
    }
    .question-sno{
        /* height: 70px; */
        display: flex;
        justify-content: space-between;
        flex-direction: column;


    }
    .question-sno-padding{
        height: 36px;
    }
    .question-sno > div{
        display: flex;
        justify-content: space-between;
    }
    .question-no{
        padding-top: 5px;
        font-size: 18px;
    }
    .question{
        font-family: monospace;
        padding: 5px 10px;
        background: white;
        font-weight: bold;
        color: #233058;
        font-size: 17px;
        border-radius: 3px;
        border-bottom-right-radius: 0;
        border-bottom-left-radius: 0;
        /* box-shadow: 0px 1px 2px 0px #bdc3c7;
        margin-bottom: 1px; */
    }
    .question > pre{
        color : #233058;
    }
    .answer-container{
        padding: 5px 10px;
        background: white;
        color: white;
        margin-top: 0px;
        padding-top: 15px;
        border-radius: 3px;
        border-top-right-radius: 0;
        border-top-left-radius: 0;
        /* max-height: 200px; */
        overflow-y: auto;
    }
    .answer-container > label{
        display: flex;
        flex-direction: row;
        flex : 1;
    }
    .answer-container > label > span{
        border-radius: 5px;
        display: flex;
        width: 100%;
    }
    .option-serial{
        margin-right : 15px;
        color : black;
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
        background: #333333;
        color: white;
            width: 24%;
        }
        .top-padding{
            height: 65px;
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
    .question-switch-container > span{
        color: white;
    }
    .question-switch-container > div{
        justify-content: flex-start;
        padding-left: 10px;
    }
    .container-right > .container{
        width: 100%;
    }
    .question-container{
        overflow-x: auto;
    }
    .answer-container{

    }
    .phone-card{
        margin-bottom: 0.5rem;
    }
}
.question{
    /* height: 250px; */
    overflow-y: scroll;
}
.text-left{
    border-radius: 3px;
}

.all-questions-container{
    margin-top: 5px;
}
form{
    margin-bottom: 0;
}
.question-switch-container{
    margin-right: 10px;
}
#show-question-switch:focus{
    outline: none;
}
#toggle-question-switch-icon-close{
    display: none;
}
#toggle-question-switch-icon-open{

}
pre{
    
    padding: 3px;
}
.question-no-padding{
    height: 30px;
}
</style>
<script type="text/javascript">
    var toggleSwitch = 0;
    function showSwitchQuestionOption(){
        let x = document.getElementsByClassName('question-switch-container')[0]
        let y = document.getElementById('toggle-question-switch-icon-close')
        let z = document.getElementById('toggle-question-switch-icon-open')
        if(toggleSwitch == 1)
            {
                x.style.display = 'none';
                x.style.marginRight = '0px';
                z.style.display = 'block'
                y.style.display = 'none'
                toggleSwitch = 0;
            }
            else{

                x.style.display = 'flex';
                x.style.marginRight = '10px';
                z.style.display = 'none'
                y.style.display = 'block'
                toggleSwitch = 1;
            }
        setQuestionHeaderWidth(toggleSwitch)
    }
</script>
	<title>Quiz</title>
    <!-- <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css"> -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <script src="https://kit.fontawesome.com/f9bbf9ac4e.js"></script>
	 <!-- Compiled and minified CSS -->
    <link href="css/sb-admin-2.css" rel="stylesheet">
  <link href="css/dashboard.css" rel="stylesheet">
<style>

body{
        overflow-y: hidden;
        height: 100vh;
    }
    .question-answer-container{
        height: 50vh;
        overflow-y: auto;
    }
    .question-container{
        position: relative;
    }
    .question-sno{
        position: fixed;
        z-index: 10;
        background: #333333;
        margin-left: -1px;
        margin-top: -5px;
        padding: 0px 1px;
    }

    </style>
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
            top: 50%;
            left: 50%;
            transform: translate(-50%,-50%);
            border: 0.5px solid #bdc3c7;
            border-radius: 4px;
            height: 200px;
            width: 220px;
            background: white;
            box-shadow: 0px 0px 15px 0px rgb(0 0 0 / 60%);
            z-index: 150;
            display: none;
            padding: 25px 0px;
            position: fixed;
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

            border-radius: 3px;
            color: white;
            border : none;
            cursor: pointer;
            background: #cd201f;
          }
          #yes-btn{
            width: 80px;
            height: 35px;

            border-radius: 3px;
            color: white;
            border : none;
            cursor: pointer;background: #507828;

          }
          #no-btn:hover{
            background: #cd201f;
            box-shadow: 0px 0px 15px 0px rgba(0,0,0,0.6);
          }
          #no-btn:focus{
            outline: none;
          }
          #yes-btn:hover{
            background: #507828;
            box-shadow: 0px 0px 15px 0px rgba(0,0,0,0.6);
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
            border-radius: 3px;
            color : white;
            width: 120px;
            height: 35px;
            border : none;
            box-shadow: 0px 0px 20px 0px rgb(0 0 0 / 60%);
          }
          #next{
            background: #2980b9;
            border-radius: 3px;
            color : white;
            width: 120px;
            height: 35px;
            border : none;
            margin-right: 3px;
    box-shadow: 0px 0px 20px 0px rgb(0 0 0 / 60%);
          }
          #btn-submit{
            background: rgb(94, 186, 0);
            border-radius: 3px;
            color : white;
            width: 120px;
            height: 35px;
            border : none;
            margin-right: 3px;
    box-shadow: 0px 0px 20px 0px rgb(0 0 0 / 60%);
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
        border-radius: 3px;
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
      .exam-header-fixed{
          position: fixed;
          z-index: 100;
          width: 100%;
          box-shadow: 0px 0px 10px 0px rgba(0,0,0,0.5);
      }
      .exam-header-fixed > div > div{
          
    width: 100%;
    display: flex;
    justify-content: space-between;
    align-items: center;

      }
      .timer-container{
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    padding: 5px 10px;
    border-radius: 3px;
    color:white;
      }
      .timer-container > i
      {
    font-size: 23px;
    color: #1cc88a;
    margin-right: 5px;
      }
      /* .next-prev-sub-container{
    position: absolute;
    left : 0;
    bottom: 0;
    position: fixed;
    width: 100%;
    padding-bottom: 10px;
      } */
      .next-prev-sub-container button{
          z-index: 100;
      }
      .next-prev-sub-container #prev{
      }
      .next-prev-sub-container #right{
          margin-right: 5px;
      }
      .question-no-padding{
          height: 30px;
      }
      .question-switch-container{
          z-index: 80;
          display: none;
      }
      .next-prev-sub-container{
    position: absolute;
    bottom: 0;
    height: 50px;
    right: 0px;
    width: 100%;
    position: fixed;
    /* background: blue; */
    z-index: 50;
    padding: 7px 0px;
    display: flex;
    justify-content: space-between;
}
    .mini-text{
        font-size: 15px;
    }
form{
    background: #333333;
    border-radius: 3px;
    border-bottom: 5px solid #333333;
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
            <div style="display: flex;justify-content: space-evenly;align-items: center;width: 100%;" class="custom-alert-btn-container">
                <button onclick="hideCustomAlertPopup();" id="no-btn">No</button>
                <button id="yes-btn">Yes</button>
            </div>   
        </div>
    </div>
    <div style="display: flex;align-items: center;height: 65px;justify-content: center;background:#333333;" class="header py-4 exam-header-fixed">
        <div style="margin: 0px 0px; width: 95%;" >

            <div style="display: flex;justify-content: space-between;">
                <button onclick="showSwitchQuestionOption()" id="show-question-switch" >
                    <i id="toggle-question-switch-icon-close" class="fas fa-times"></i>
                    <i id="toggle-question-switch-icon-open" class="fas fa-bars"></i>
                </button>
                <div style="color : white;font-size: 28px;" class="date-day">QuizWit | <span class="mini-text"><?php echo $_SESSION['name'];?></span><?php /*echo "Date : ".date('d-m-yy')."<br />"."Day &nbsp;: ".date("l");*/?></div>

                <div class="timer-container">
                    <span>Time Remaining</span>
                    <!-- <i class="fas fa-clock"></i> -->
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
                </div>
                <button style="margin-left: 0;background:#cd201f;color:white;" class="btn btn-outline-danger ml-auto end-quiz" onclick="autoSubmit()">
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
