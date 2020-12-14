
<?php
  session_start();
  require_once('connection.php');
  if(isset($_SESSION['feedback_sent'])){
     header('location: feedback.php?feedback=true');
     return;
  }
  if(!isset($_SESSION['test_started'])){
     header('location: logout.php');
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
      
      $answer = $_SESSION['CORRANSWERS'];
      $right = array();
      $wrong = array();
      $not_attempt = array();
      $num = $_SESSION['question_no'];
      $ans = 0;
      if(isset($_SESSION['ANSWER']))
      {
        $selected_answer = $_SESSION['ANSWER'];

        for($i=0;$i<$num;$i++)
        {
                if($selected_answer[$i+1]!=0)
                {
                   if($selected_answer[$i+1]==$answer["$i"])
                     array_push($right,$i+1);
                   else array_push($wrong,$i+1);
                }
                else array_push($not_attempt,$i+1);
        }
    
    $sql = "SELECT * FROM quizes WHERE quiz_id='$_SESSION[exam_id]'";
    $result = mysqli_query($conn,$sql);
    $row = $result->fetch_assoc();
    $quizName = $row['quiz_name'];
    $showEvaluation = $row['show_evaluation'];
    $passingPercentage = $row['passing_percentage'];
    $negativeMarking = $row['negative_marking'];
    $marksPerQuestion = $row['marks_per_question'];
    $score = sizeof($right)*$marksPerQuestion - sizeof($wrong)*$negativeMarking;
    if($score>0)
      $result_percentage = ($score*100)/($num*$marksPerQuestion);
    else $result_percentage = 0;
    $totalMarks = $marksPerQuestion*$num;
    $b=0;
    $control = 0;
    $ans = "";
         $str = $result_percentage.'A';
         $p=0;
         
         while($str["$p"]!='A' && $b != 3)
         {
           $ans = $ans.$str["$p"];
           
           if($str["$p"]=='.' || $control ==1)
            {$b = $b + 1; $control=1;}
           
           $p++;

         }
         $_SESSION['result'] = $ans;
   
       }
       else 
       {
          for($w=0;$w<$num;$w++)
            {
              array_push($not_attempt,$w+1);
            }
       }
?>

<!DOCTYPE html>
<html>
<head>
    <title>Evaluation</title>
     <!-- Compiled and minified CSS -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="css/materialize.css" rel="stylesheet">
     <link href="css/dashboard.css" rel="stylesheet">
     <link rel="stylesheet" href="css/sb-admin-2.css">
     <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

    <script type="text/javascript">
    // Load google charts
    
    google.charts.load('current', {'packages':['corechart']});
    google.charts.setOnLoadCallback(drawChart);

    // Draw the chart and set the chart values
    function drawChart() {
      
      var r = <?php echo sizeof($right);?>;
      var w = <?php echo sizeof($wrong);?>;
      var n = <?php echo sizeof($not_attempt);?>;
      var t = r+w+n;
      var data = google.visualization.arrayToDataTable([
      ['Task', 'Hours per Day'],
     /*['Work', 10],*/
      ['Wrong Answer', w/t],
      /*['TV', 4],*/
      ['Correct Answer', r/t],
       ['Not Attempted', n/t],
/*      ['Sleep', 8]*/
    ]);
    
      // Optional; add a title and set the width and height of the chart
      var options = {'title':'My Average Day', 'height':400, colors:['#CD201F','#5EBA00','#E1B12C'],is3D: true};

      // Display the chart inside the <div> element with id="piechart"
      var chart = new google.visualization.PieChart(document.getElementById('piechart'));
      chart.draw(data, options);
    }
    </script>
    
       <script>
            function check_password()
            {
                  var x = document.getElementById("pass").value;
                  var y = document.getElementById("confpass").value;
                  if(x==y)
                        return true;
                  else {alert("password not matched"); return false;}
            }
      </script>
    
  
    <style type="text/css">#thank{
          width: 80%;
          height: 15px;
          font-size: 35px;
        }
      }
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
        .margin-print{
          margin-top: 12px;
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
        #thank{
          width: 100%;
          height: 15px;
          font-size: 17px;display: flex;
          justify-content: center;
          align-items: center;
        }
    </style>
    <style type="text/css">
      @media screen and (max-width: 700px){
        #thank{
          width: 80%;
          height: 15px;
          font-size: 18px;display: flex;
          justify-content: center;
          align-items: center;
        }
        #feedback-link{
          width: 70%;
          height: 50px;
          display: flex;
          align-items: center;
          justify-content: center;
        }
      }
      .question-answer{
        display: none;
      }
      .up-arrow-container, .down-arrow-container{
        width: 35px;
        height: 35px;
        display: flex;
        justify-content: center;
        align-items: center;
        border-radius: 50%;
        cursor: pointer;
        color: black;
      }

      .up-arrow-container:hover, .down-arrow-container:hover{
        background: #ecf0f1;
        color: black;
      }
      .up-arrow-container{
        display: none;
      }
      .up-arrow-container > span, .down-arrow-container > span{
        width: 100%;
        height: 100%;
        display: flex;
        justify-content: center;
        align-items: center;
      }
      .feedback-btn{
        border-radius: 5px;
        background: #2980b9;
        color: white;
        width: 200px;
        height: 40px;
        border : none;
        margin-top: 25px;
      }
      .feedback-btn:hover{
        background: #3498db;
      }
      .feedback-btn:focus{
        outline: none;
      }
      .skip-btn{
        background: #2c3e50;
        margin-top: 15px;
        border-radius: 5px;
        color: white;
        width: 200px;
        height: 40px;
        border : none;
      }
      .skip-btn:hover{
      background : #34495e;
      }
      .skip-btn:focus{
        outline : none;
      }
      .print-question-paper{
        position: absolute;
        top : 60px;
        right: 0px;
        position: fixed;
        height: 55px;
        width: 250px;
        border-radius: 10px;
        background: #2980b9;
        color: white;
        padding: 0px 10px;
        border : 0.5px solid #bdc3c7;
        border-top-right-radius: 0px;
        border-bottom-right-radius: 0px;
        display: flex;
        font-size: 17px;
        z-index: 3;
      }
      #left-arrow-container{
        font-size: 22px;
        display: none;
        border-right: 1px solid white;
        padding-right: 10px;
        height: 100%;
        line-height: 55px;
        cursor: pointer;
      }
      #right-arrow-container{
        font-size: 22px;
        border-right: 1px solid white;
        padding-right: 10px;
        height: 100%;
        line-height: 55px;
        cursor: pointer;
      }
      #book-print-container{
        font-size: 19px;
        display: flex;
        justify-content: space-evenly;
        font-weight: bold;
        flex : 1;
        line-height: 55px;
        background: #3498db;
        cursor: pointer;
      }
      @media screen and (max-width: 700px){
        .print-question-paper{
          right: -216px;
        }
        #right-arrow-container{
          display: none;
        }
        #left-arrow-container{
          display: block;
        }
      }
      .border-success > div:nth-child(1){
        background: #27ae60;
        color: white;
      }
      .border-danger > div:nth-child(1){
        background: #e74c3c; 
        color: white;   
      }
      .border-secondary > div:nth-child(1){
        background: #e6e6e6;
      }
      .question-answer{
        background: white;
        color : black;
        padding: 5px;
      }
    </style>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <script type="text/javascript">
      function showQuestionAnswer(index){
        //document.getElementsByClassName('question-answer')[index].style.display = 'block';
        $(".question-answer").eq(index).slideDown();
        document.getElementsByClassName('up-arrow-container')[index].style.display = 'block';
        document.getElementsByClassName('down-arrow-container')[index].style.display = 'none';
      }
      function hideQuestionAnswer(index){
        $(".question-answer").eq(index).slideUp();
        //document.getElementsByClassName('question-answer')[index].style.display = 'none';
        document.getElementsByClassName('up-arrow-container')[index].style.display = 'none';
        document.getElementsByClassName('down-arrow-container')[index].style.display = 'block';
      }
      $(document).ready(function(){
        $(" #right-arrow-container").click(function(){
          document.getElementsByClassName('print-question-paper')[0].style.right = '-216px';
          document.getElementById('right-arrow-container').style.display = 'none';
          document.getElementById('left-arrow-container').style.display = 'block';
        });
         $(" #left-arrow-container").click(function(){
          document.getElementsByClassName('print-question-paper')[0].style.right = '0px';
          document.getElementById('right-arrow-container').style.display = 'block';
          document.getElementById('left-arrow-container').style.display = 'none';
        });
      });
    </script>
    <script type="text/javascript">
      function printQuestionPaper(quizName){

          
          var p = window.open('','','height=500','width=500');
          p.document.write('<html>');
          p.document.write('<head>');
          p.document.write("<style>td{text-align: center; border:0.5px solid #bdc3c7;}table{margin-top:15px;}</style>");
          p.document.write('</head>');
          p.document.write('<body>');
          p.document.write("<div style='display:flex;width:100%;justify-content-space-between;font-weight:bold;font-size:25px;'>");
          p.document.write("<div>");
          p.document.write(quizName);
          p.document.write("</div>")
          p.document.write("<div style='display:flex;flex:1;justify-content:flex-end;'>");
          p.document.write("QuizWit</sup>");
          p.document.write("</div>")
          p.document.write("</div>");
          var questions = document.getElementsByClassName('questions');
          var answers = document.getElementsByClassName('answers');
          var i;
          for(i=0;i<questions.length;i++){
            p.document.write("<div style='border : 0.5px solid #bdc3c7; padding:10px; margin : 5px 0px; border-radius : 5px;'>");  // main container
              p.document.write("<div style='display:flex;'>") //question container
                p.document.write("<div style='width:35px;'>"); // Q no
                  p.document.write((i+1)+".&nbsp;");
                p.document.write("</div>");
                p.document.write("<div>"); // question
                  p.document.write(questions[i].innerHTML);
                p.document.write("</div>");
              p.document.write("</div>");
              p.document.write("<div style='display:flex; margin-top:5px;'>");
                p.document.write("<div>"); // Ans
                  p.document.write("Ans &nbsp;");
                p.document.write("</div>");
                  p.document.write("<div>"); // answer
                    p.document.write(answers[i].innerHTML);
                p.document.write("</div>");
                p.document.write("</div>");
            p.document.write("</div>");
          }
          p.document.write('</body>');
          p.document.write('</html>');
          p.document.close();
          p.print();
      }
    </script>
</head>
<body class="grey lighten-4">
<?php 
if($showEvaluation){
?>
  <label class="print-question-paper">
    <span id="right-arrow-container">
      <i class="fas fa-chevron-right"></i>
    </span>
    <span id="left-arrow-container">
      <i class="fas fa-chevron-left"></i>
    </span>
    <?php 
    $quizName = "'".$quizName."'";
    ?>
    <span onclick="printQuestionPaper(<?php echo $quizName;?>)" id="book-print-container">  
      <span>
        <i class="fas fa-print"></i>
      </span>
      <span>Question Paper</span>
    </span>
  </label>
    <div style="margin-top: 5px;margin-right: 7px;display: flex;justify-content: center;" class="my-3 my-md-5">
        <div style="padding : 10px 5px; margin : 0;" class="container">
            <div style="margin:0; border : 0.5px solid ;border-radius: 5px;padding: 5px;" class="page-header">
                <h4 class="page-tilte">
                    <?php  if((int)$ans>=$passingPercentage)
        echo "Congratulation, You have clear the certification.";
      else echo "Thank you for attempting the exam. Unfortunately, you need more practice before you clear the certification."; ?>
                </h4>
            </div>
            <div class="row row-cards row-deck">
                <div  class="col-xl-3 col-md-6 mb-4 height115">
                    <div style="padding: 0;"class="card border-bottom-primary shadow h-100 py-2">
                        <div class="card-body p-3 text-center">
                            <div class="h4 m-0"><?php echo $score."/".$totalMarks; ?></div>
                            <div class="text-xxs font-weight-bold text-primary text-uppercase mb-1">Your Score</div>
                        </div>
                    </div>
                 </div>
                <div class="col-xl-3 col-md-6 mb-4 height115">
                    <div style="padding: 0;" class="card border-bottom-primary shadow h-100 py-2">
                        <div class="card-body p-3 text-center">
                            <div class="h4 m-0"><?php echo $ans."%";?></div>
                            <div class="text-xxs font-weight-bold text-primary text-uppercase mb-1">Percentage</div>
                        </div>
                    </div>
                 </div>
                <div class="col-xl-3 col-md-6 mb-4 height115">
                    <div style="padding: 0;" class="card border-bottom-primary shadow h-100 py-2">
                        <div class="card-body p-3 text-center">
                            <div class="h4 m-0"><?php echo $_SESSION['question_no'];?></div>
                            <div class="text-xxs font-weight-bold text-primary text-uppercase mb-1">Total Question</div>
                        </div>
                    </div>
                 </div>
                <div class="col-xl-3 col-md-6 mb-4 height115">
                    <div style="padding: 0;" class="card border-bottom-success shadow h-100 py-2">
                        <div class="card-body p-3 text-center">
                            <div class="h4 m-0 attempted"><?php echo sizeof($right); ?></div>
                            <div class="text-success text-xxs font-weight-bold text-primary text-uppercase mb-1 ">Correct</div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6 mb-4 height115">
                    <div style="padding: 0;" class="card shadow border-bottom-warning h-100 py-2">
                        <div class="card-body p-3 text-center">
                            <div class="h4 m-0 remaining"><?php echo sizeof($wrong); ?></div>
                            <div class="text-danger text-xxs font-weight-bold text-primary text-uppercase mb-1">Wrong</div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6 mb-4 height115">
                    <div style="padding: 0;" class="card shadow border-bottom-info h-100 py-2">
                        <div class="card-body p-3 text-center">
                            <div  class="h4 m-0 timer-test"><?php echo sizeof($not_attempt); ?></div>
                            <div class="text-cyan text-xxs font-weight-bold text-uppercase mb-1">Not Attempted</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Performance Chart</h3>
                        </div>
                        <div class="card-body">
                           <div id="piechart" >
                           </div>                        
                        </div>
                     </div>
                </div>
                <div class="col-sm-12">
                    <div class="accrodin" id="accordionExample">
                    <?php
                     $j=1;
                     $num = 1;
                     $ans_index = 1;
                      foreach ($_SESSION['QUESTIONS'] as $QueID) {
                        $sql = "SELECT * FROM question_bank WHERE question_id='$QueID'";
                        $result = mysqli_query($conn,$sql);
                        $row = $result->fetch_assoc();
                        $k=1;
                            for($m=0;$m<sizeof($right);$m++)
                            {
                                if($j == $right[$m])
                                {
                                    $k = 2;
                                    break;
                                }
                            }
                            for($m=0;$m<sizeof($wrong);$m++)
                            {
                                if($j == $wrong[$m])
                                {
                                    $k = 3;
                                    break;
                                }
                            }

                            if($k==1)
                                $add = "secondary";
                            if($k==2)
                                $add = "success";
                            if($k==3)
                                $add = "danger";
                    ?>
                       
                        <div  class="card border border-<?php echo $add;?>">
                            <div style="border-radius : 5px; padding : 3px 10px;display: flex; justify-content: space-between; align-items: center;" class="card-header" id="headingOne">
                                <h5 onclick="hide_show()" class="mb-0">
                                    
                                    Question <?php echo $num;?>
                                   
                                </h5> 
                                <label class="down-arrow-container" onclick="showQuestionAnswer(<?php echo $num-1;?>)">
                                  <span><i class="fas fa-chevron-down down-arrow"></i></span>
                                </label>

                                <label class="up-arrow-container" onclick="hideQuestionAnswer(<?php echo $num-1;?>)">
                                  <span><i class="fas fa-chevron-up up-arrow"></i></span>
                                </label>
                                
                            </div>
                            <div class="question-answer" id="collapse1<?php echo $num;?>"  aria-labelledby="headingOne" data-parent="#accordionExample" style>
                                <div class="card-body text-justify">
                                    <p class="questions">
                                        
                                            <?php echo $row['question'];?>
                                        
                                    </p>
                                    <p></p>
                                    <p>
                                        <span style="border-radius: 3px;" class="text-white bg-primary p-1">Selected Option</span>
                                    </p>
                                    <p >
                                    <?php
                                           
                                        if($selected_answer["$ans_index"]!=0)
                                        {
                                           $option_no = $selected_answer["$ans_index"];
                                           if($option_no == 1)
                                            echo $row['option_1'];
                                           if($option_no == 2)
                                            echo $row['option_2'];
                                           if($option_no == 3)
                                            echo $row['option_3'];
                                           if($option_no == 4)
                                            echo $row['option_4'];
                                        }
                                        else echo "Not attempted";
                                    ?> 
                                    </p>
                                    <p>
                                        <span style="border-radius: 3px;" class="text-white bg-success p-1">Correct Option</span>
                                    </p>
                                    <P class="answers">
                                       <?php
                                           $option_no = $row['answer'];

                                           if($option_no == 1)
                                            echo $row['option_1'];
                                           if($option_no == 2)
                                            echo $row['option_2'];
                                           if($option_no == 3)
                                            echo $row['option_3'];
                                           if($option_no == 4)
                                            echo $row['option_4'];
                                       ?>     
                                    </P>
                                    
                                    <p>
                                        <span style="border-radius: 3px;" class="text-white bg-secondary p-1">Explanation</span>
                                    </p>
                                    <p>
                                        <i>
                                            <?php 
                                            if($row['reason'] == '')
                                              echo "Not Provided!";
                                            else echo $row['reason'];
                                            ?>
                                        </i>
                                    </p>
                                    <p></p>
                                </div>
                            </div>
                        </div>
                        <?php 
                  $num++;
                  $j++;
                  $ans_index++;
                    }
                    ?>


                    </div>
                </div>   
                <div id="feedback-div" class="col-sm-12 text-center">
                  <button class="feedback-btn" onclick="location.href='feedback.php?feedback=true';">Give Feedback</button>

                  <button class="skip-btn" onclick="location.href='logout.php';">Skip</button>
                </div>
        </div>
    </div>    

    <?php 
    if(isset($_SESSION['test_start_time']))
        unset($_SESSION['test_start_time']);
    if(isset($_SESSION['page_refresh_time']))
        unset($_SESSION['page_refresh_time']);
    ?>

<?php 
}
else{
?>

  <div style="padding : 35px 0px;display: flex;justify-content: space-between;flex-direction: column;height: 90vh; align-items: center;">
      <div style="font-size: 100px; display: flex;justify-content: center;align-items: center;">
        <i class="fas fa-thumbs-up"></i>
      </div>
      <div style="font-size: 18px;">
        Thank You for your Response.
      </div>
      <div style="display: flex; flex-direction: column;">
        <button class="feedback-btn" onclick="location.href='feedback.php?feedback=true';">Give Feedback</button>

        <button class="skip-btn" onclick="location.href='logout.php';">Skip</button>
      </div>
  </div>
<?php 
}
?>
</body>
</html>

    <!-- <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 mt-3 mt-lg-0 text-center">
                    Copyright &copy; 2020 T&I Industry. All rights reserved.
                </div>  
            </div>
        </div>
    </footer> -->

    <?php
    $rightAnswer = sizeof($right);
    $wrongAnswer = sizeof($wrong);
    $notAttempted = sizeof($not_attempt);
    if(!isset($_SESSION['exam_end']))
    {   
       $sql = "SELECT * FROM attempts WHERE quiz_id='$_SESSION[exam_id]' AND email='$_SESSION[email]'";
       $result = mysqli_query($conn,$sql);
       if($result->num_rows > 0){
       $sql = "UPDATE attempts SET score='$score', correct='$rightAnswer', wrong='$wrongAnswer', not_attempted='$notAttempted', pass_percentage='$passingPercentage', time_stamp=current_timestamp() WHERE email='$_SESSION[email]' AND quiz_id='$_SESSION[exam_id]'";
       mysqli_query($conn,$sql) or die(mysqli_error($conn));
      }
      else{
      $sql = "INSERT INTO `attempts` (`attempt_id`, `quiz_id`, `fullname`, `registration_no`, `email`, `score`, `total_marks`, `correct`, `wrong`, `not_attempted`, `pass_percentage`, `no_of_questions`, `time_stamp`) VALUES (NULL, '$_SESSION[exam_id]', '$_SESSION[name]', '$_SESSION[regNo]', '$_SESSION[email]', '$score', '$totalMarks', '$rightAnswer', '$wrongAnswer', '$notAttempted', '$passingPercentage', '$_SESSION[question_no]', current_timestamp())";
       mysqli_query($conn,$sql) or die(mysqli_error($conn));
      }
      $_SESSION['exam_end'] = true;
      $_SESSION['give_feedback'] = true;
      unset($_SESSION['quiz_name']);
      unset($_SESSION['time_duration']);
      unset($_SESSION['test_is_set']);
    }
    
    ?>