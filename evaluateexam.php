
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
      $spline_data = Array();
      $spline_temp = 0;
      if(isset($_SESSION['ANSWER']))
      {
        $selected_answer = $_SESSION['ANSWER'];

        for($i=0;$i<$num;$i++)
        {
                if($selected_answer[$i+1]!=0)
                {
                   if($selected_answer[$i+1]==$answer["$i"]) {
                     array_push($right,$i+1);
                     $spline_temp += 1;
                   }
                   else {
                        array_push($wrong,$i+1);
                        $spline_temp -= 1;
                    }
                }
                else array_push($not_attempt,$i+1);
                
                array_push($spline_data, $spline_temp);
        }
    $spline_data = json_encode($spline_data);
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
    <!-- <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css"> -->
    <script src="https://kit.fontawesome.com/f9bbf9ac4e.js"></script>
    <link href="css/materialize.css" rel="stylesheet">
     <link href="css/dashboard.css" rel="stylesheet">
     <link rel="stylesheet" href="css/sb-admin-2.css">
     <link rel="stylesheet" href="css/custom/evaluate-exam.css">

    <!-- Highcharts -->
    <script src="https://code.highcharts.com/highcharts.js"></script>

    <!-- Crossfilter -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/crossfilter/1.3.12/crossfilter.min.js"></script>
    <script type="text/javascript">
    
    var rightAnswers = <?php echo sizeof($right);?>;
    var wrongAnswers = <?php echo sizeof($wrong);?>;
    var notAttemptedAnswers = <?php echo sizeof($not_attempt);?>;
    var totalQuestions = rightAnswers + wrongAnswers + notAttemptedAnswers;
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
          p.document.write("<style>td{text-align: center; border:0.5px solid #bdc3c7;}table{margin-top:15px;}.mcq-option{border: 0.5px solid rgba(0,0,0,0.4);border-radius: 3px;padding: 5px;margin-top:5px;}pre{display:flex;}</style>");
          p.document.write('</head>');
          p.document.write('<body style="font-family:monospace;">');
          p.document.write("<div style='display:flex;width:100%;justify-content-space-between;font-weight:bold;font-size:25px;'>");
          p.document.write("<div>");
          p.document.write(quizName);
          p.document.write("</div>")
          p.document.write("<div style='display:flex;flex:1;justify-content:flex-end;'>");
          p.document.write("QuizWit</sup>");
          p.document.write("</div>")
          p.document.write("</div>");
          var questions = document.getElementsByClassName('questions');
          console.log(questions)
          var option1 = document.getElementsByClassName('mcq-option-1')
          var option2 = document.getElementsByClassName('mcq-option-2')
          var option3 = document.getElementsByClassName('mcq-option-3')
          var option4 = document.getElementsByClassName('mcq-option-4')
          var answers = document.getElementsByClassName('answers');
          var i;
          for(i=0;i<questions.length;i++){
            p.document.write("<div style='border : 3px solid #bdc3c7; padding:10px; margin : 5px 0px; border-radius : 5px;' class='main-container'>");  // main container
              p.document.write("<div style='display:flex; flex-direction:column' class='question-container'>") //question container

                p.document.write("<div style='width:35px;' class='serial-no'>"); // Q no
                  p.document.write((i+1)+".&nbsp;");
                p.document.write("</div>");
                p.document.write("<div class='question'>"); // question
                  p.document.write('<div>')
                  p.document.write(questions[i].innerHTML.replaceAll(/\n/g, '<br/>'));
                  console.log(questions[i].innerHTML)
                  p.document.write('</div>')
                p.document.write("</div>");
                
                p.document.write("<div class='options'>"); // options
                  p.document.write('<div class="mcq-option">')
                    p.document.write(option1[i].innerHTML.replaceAll(/\n/g, '<br/>'));
                  p.document.write('</div')
                  p.document.write('<div class="mcq-option">')
                    p.document.write(option2[i].innerHTML.replaceAll(/\n/g, '<br/>'));
                  p.document.write('</div>')
                  p.document.write('<div class="mcq-option">')
                    p.document.write(option3[i].innerHTML.replaceAll(/\n/g, '<br/>'));
                  p.document.write('</div>')
                  p.document.write('<div class="mcq-option">')
                    p.document.write(option4[i].innerHTML.replaceAll(/\n/g, '<br/>'));
                  p.document.write('</div>')
                p.document.write("</div>");

              p.document.write("</div>");

              p.document.write("<div style='display:flex; margin-top:5px;' class='answer'>");
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
      if((int)$ans>=$passingPercentage){
        $quiz_name = $quizName;
        if(!isset($_SESSION['certification_cleared'])){
          $sql = "INSERT INTO `certifications` (`certificate_id`, `quiz_name`, `date`, `candidate_name`, `score`, `email`) VALUES (NULL, '$quiz_name', current_timestamp(), '$_SESSION[name]', '$ans', '$_SESSION[email]')";
          $conn->query($sql);
          $certificate_id = $conn->insert_id;
          $_SESSION['certificate_id'] = $certificate_id;
        }
        $_SESSION['certification_cleared'] = true;
        if(isset($_SESSION['certificate_id']) && $showEvaluation){
        ?>
        <div class="certificate-btn-container">
          <a class="certificate-btn" href="certificate.php?cid=<?php echo base64_encode($_SESSION['certificate_id']); ?>" target="_blank">QuizWit <b style="font-size: 22px;"><?php echo $quiz_name; ?></b> View Certificate <i class="fas fa-arrow-right"></i></a>
        </div>
        <?php
        }
      }
    ?>
<?php 
if($showEvaluation){
?>
   <!-- <label class="print-question-paper">
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
  </label>  -->
    <div style="margin-top: 5px;margin-right: 7px;display: flex;justify-content: center;" class="my-3 my-md-5">
        <div style="padding : 10px 5px; margin : 0;" class="container">
            <?php 
              if((int)$ans>=$passingPercentage){
                $class = 'certification-clear';
              }
              else $class = 'certification-failed';
            ?>
            <div class="page-header <?php echo $class; ?> shadow-c">
                <h4 class="page-tilte">
                    <?php  
                      if((int)$ans>=$passingPercentage){
                        echo "&nbsp;&nbsp;<i class='fas fa-check'></i>&nbsp;&nbsp;"."Congratulations, You have clear the certification.";
                      }
                      else echo "&nbsp;&nbsp;<i class='fas fa-exclamation-circle'></i>&nbsp;&nbsp;"."Thank you for attempting the exam. Unfortunately, you need more practice before you clear the certification."; 
                    ?>
                </h4>
            </div>
            
            <div class="score-card-container">
                <div >
                    <div>Your Score</div>
                    <div><?php echo $score."/".$totalMarks; ?></div>
                </div>
                <div>
                    <div>Percentage</div>
                    <div><?php echo $ans."%";?></div>
                </div>
                <div>
                    <div>Total Questions</div>
                    <div><?php echo $_SESSION['question_no'];?></div>
                </div>
                <div style="color: #80a25c;">
                    <div>Correct</div>
                    <div><?php echo sizeof($right); ?></div>
                </div>
                <div style="color: #a0403f;">
                    <div>Wrong</div>
                    <div><?php echo sizeof($wrong); ?></div>
                </div>
                <div style="color: #ac9740;">
                    <div>Not Attempted</div>
                    <div><?php echo sizeof($not_attempt); ?></div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-body performance-chart-container">
                            <div id="performanceChart1"></div> 
                            <div id="performanceChart2"></div>                   
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
                       
                        <div  class="border-<?php echo $add;?>" style="margin-bottom: 6px;border-radius : 3px; box-shadow: 0px 0px 15px 0px rgb(0 0 0 / 60%);">
                            <div style="border-radius : 3px; padding : 8px 10px;display: flex; justify-content: space-between; align-items: center; " id="headingOne">
                                <h6 onclick="hide_show()" class="mb-0">
                                    
                                    Q <?php echo $num;?>&nbsp;
                                   <?php 
                                      $question = $row['question'];
                                      $len = strlen($question);
                                      $end_index = 50;
                                      if($len < 50)
                                        $end_index = $len;
                                      $show_question_part = substr($question, 0, $end_index);
                                      
                                   ?>
                                   <span style="font-size:14px"><?php echo $show_question_part.' . . .'; ?></span>
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
                                    <p>
<?php 
	if($row['formatted']){
		?>
<pre>
<code><?php echo $row['question'];?></code>
</pre>
<?php
	}
	else echo str_replace("\n", "<br/>", $row['question']);
?>	
                                    </p>
                                    <p>
                                        <span style="border-radius: 3px; padding : 5px 10px; background:#9e9e9e;" class="text-white">Options</span>
                                    </p>
                                    <?php
                                        $option_1 = 'unselected';
                                        $option_2 = 'unselected';
                                        $option_3 = 'unselected';
                                        $option_4 = 'unselected';
                                        $selection = true;
                                        if($selected_answer["$ans_index"]!=0)
                                        {
                                           $option_no = $selected_answer["$ans_index"];
                                           if($option_no == 1)
                                            $option_1 = 'selected';
                                           if($option_no == 2)
                                            $option_2 = 'selected';
                                           if($option_no == 3)
                                            $option_3 = 'selected';
                                           if($option_no == 4)
                                            $option_4 = 'selected';
                                        }
                                        else $selection = false;
                                        $correct = false;
                                        if($selection){
                                          if($row['answer'] == 1){
                                            $option_1 = $option_1.' correct-option';
                                            $correct = true;
                                          }
                                          if($row['answer'] == 2){
                                            $option_2 = $option_2.' correct-option';
                                            $correct = true;
                                          }
                                          if($row['answer'] == 3){
                                            $option_3 = $option_3.' correct-option';
                                            $correct = true;
                                          }
                                          if($row['answer'] == 4){
                                            $option_4 = $option_4.' correct-option';
                                            $correct = true;
                                          }
                                        }
                                        if($selection){
                                          if($option_no == 1 && $row['answer'] != 1)
                                           $option_1 = $option_1.' wrong-option';
                                          if($option_no == 2 && $row['answer'] != 2)
                                           $option_2 =  $option_2.' wrong-option';
                                          if($option_no == 3 && $row['answer'] != 3)
                                           $option_3 =  $option_3.' wrong-option';
                                          if($option_no == 4 && $row['answer'] != 4)
                                           $option_4 =  $option_4.' wrong-option';
                                        }
                                    ?> 
                                    
                                    <div style="display:flex;flex-direction:column;" class="mcq-options">
                                      <span class="mcq-option">
<pre class="option-layout <?php echo $option_1; ?>">
<code class="mcq-option-1"><span class="bold">A </span><span><?php echo $row['option_1']; ?></span></code>
</pre>
                                      </span>
                                      <span class="mcq-option">
<pre class="option-layout <?php echo $option_2; ?>">
<code class="mcq-option-2"><span class="bold">B </span><span><?php echo $row['option_2']; ?></span></code>
</pre>
                                      </span>
                                      <span class="mcq-option">
<pre class="option-layout <?php echo $option_3; ?>">
<code class="mcq-option-3"><span class="bold">C </span><span><?php echo $row['option_3']; ?></span></code>
</pre>
                                      </span>
                                      <span class="mcq-option">
<pre class="option-layout <?php echo $option_4; ?>">
<code class="mcq-option-4"><span class="bold">D </span><span><?php echo $row['option_4']; ?></span></code>
</pre>
                                      </span>
                                    </div>

                                    <p style="margin-top: 5px;">
                                      <?php 
                                        if(!$selection){
                                          ?>   
                                           <span style="border-radius: 3px; padding : 5px 10px; background: #608f2f;" class="text-white">Correct Option : 
                                          

                                          <?php
                                            $option_no = $row['answer'];
                                            if($option_no == 1)
                                            echo 'A';
                                            if($option_no == 2)
                                            echo 'B';
                                            if($option_no == 3)
                                            echo 'C';
                                            if($option_no == 4)
                                            echo 'D';
                                            ?>
                                           </span>
                                            <?php
                                        }
                                      ?> 
                                    </p>
                                    <P class="answers" style="display: none;"> 
                                      <?php
                                          $option_no = $row['answer'];

                                          if($option_no == 1)
                                          echo 'A';
                                          if($option_no == 2)
                                          echo 'B';
                                          if($option_no == 3)
                                          echo 'C';
                                          if($option_no == 4)
                                          echo 'D';
                                      ?>   
                                    </P>
                                    
                                    <p>
                                        <span style="border-radius: 3px; padding : 5px 10px;" class="text-white bg-secondary">Explanation</span>
                                    </p>
                                    <p>
                                            <?php 
                                            if($row['reason'] == '')
                                              echo "Not Provided!";
                                            else {
                                              ?>
<pre>
<code class="reason"><?php echo $row['reason']; ?></code>
</pre>
                                              <?php
                                            }
                                            ?>
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

<script type="text/javascript">
    Highcharts.chart('performanceChart1', {
    chart: {
        type: 'column'
    },
    title: {
        text: 'Performance Chart'
    },
    accessibility: {
        announceNewData: {
            enabled: true
        }
    },
    xAxis: {
        type: 'category'
    },
    yAxis: {
        title: {
            text: ''
        }

    },
    legend: {
        enabled: false
    },
    plotOptions: {
        series: {
            borderWidth: 0,
            dataLabels: {
                enabled: true
            }
        }
    },
    credits: {
        enabled: false
    },
    tooltip: {
        headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
        pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y:.2f}%</b> of total<br/>',
        formatter: function(){
            return ((this.y/(totalQuestions))*100).toFixed(2) + "%"
        }
    },

    series: [
        {
            name: "Browsers",
            colorByPoint: true,
            data: [
                {
                    name: "Correct",
                    y: rightAnswers,
                    color: '#80a25c'
                },
                {
                    name: "Not Attempted",
                    y: notAttemptedAnswers,
                    color: '#ac9740'
                },
                {
                    name: "Wrong",
                    y: wrongAnswers,
                    color: '#a0403f'
                }
            ]
        }
    ]
});

var splineData = <?php echo $spline_data; ?>;
var tempFlow = 0;
var flowStatus = [];
const flowCalculate = () => {
    for(let i=0; i<splineData.length; i++) {
        if(splineData[i] > tempFlow) {
            flowStatus.push('Correct');
        }
        else if(splineData[i] == tempFlow) {
            flowStatus.push('Not Attempted');
        }
        else {
            flowStatus.push('Wrong');
        }
        tempFlow = splineData[i];
    }
}
flowCalculate()
Highcharts.chart('performanceChart2', {
    chart: {
        type: 'spline'
    },
    title: {
        text: 'Attempt Flow'
    },
    yAxis: {
        labels: {
            formatter: function () {
                return this.value ;
            }
        }
    },
    xAxis: {
        title: {
            text: ''
        }
    },
    tooltip: {
        crosshairs: true,
        shared: true,
        formatter: function() {
            var temp = 'Question ' + (this.x+1) + '<br/>' + flowStatus[this.x]
            return temp
        }
    },
    legend: {
        enabled: false
    },
    credits: {
        enabled: false
    },
    plotOptions: {
        spline: {
            marker: {
                radius: 4,
                lineColor: 'green',
                lineWidth: 1
            }
        }
    },
    series: [{
        data: <?php echo $spline_data; ?>

    }]
});
</script>
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