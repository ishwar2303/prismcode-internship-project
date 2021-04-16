<head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  

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
        setQuestionContainerHeight()
    }
</script>
	<title>Quiz</title>
    <!-- <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css"> -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <script src="https://kit.fontawesome.com/f9bbf9ac4e.js"></script>
	 <!-- Compiled and minified CSS -->
    <link href="css/sb-admin-2.css" rel="stylesheet">
    <link href="css/dashboard.css" rel="stylesheet">
    <link rel="stylesheet" href="css/custom/exam_header.css">
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
    <script type="text/javascript" src="js/stop-copy-paste.js"></script>
    <script type="text/javascript" src="take_quizJAVAscript.js"></script>

</head>
<body onload="hideAll();setInterval(Timer,1000);Timer();">

    <div class="marking-popup">
      <div class="small-popup">
        <span>Constitute <?php echo $questionMarks; ?></span>
        <span style="width: 100%;height: 30px;display: flex;justify-content: center;align-items: center;color : #cd201f;"> 
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
