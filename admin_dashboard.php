<!DOCTYPE html>
<html>
<head>
  <title>Admin Dashboard</title>
</head>
<?php

require_once('connection.php');
session_start();

function getCurrentUrl() {
    if(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on') {
          $l = 1;  
         $url = "https://";   
    }
    else  {
         $url = "http://";  $l = 0;
    } 
    // Append the host(domain name, ip) to the URL.   
    $url.= $_SERVER['HTTP_HOST'];   
    
    // Append the requested resource location to the URL   
    $url.= $_SERVER['REQUEST_URI'];    
      
    return substr($url, 0, strlen($url) - strlen("admin_dashboard.php") + $l)."index.php?student_login=success&auto_quiz=";  
}

if(isset($_SESSION['login_time']))
     {
      $current_time = time();
        $login_time = $_SESSION['login_time'];
      if($current_time - $login_time   > 18000)  
      {
         header('location: admin_logout.php');
         return;
      }
     }
     else {header('location: admin_logout.php');return;}

                $sql = "SELECT * FROM quizes WHERE admin_email_id='$_SESSION[admin_id]' ORDER BY quiz_name";
                $result = mysqli_query($conn,$sql);
                while($row = $result->fetch_assoc()){

                    $sql = "SELECT * FROM question_bank WHERE quiz_id='$row[quiz_id]'";
                    $temp = mysqli_query($conn,$sql);  
                    if($temp->num_rows == 0)
                    {   
                       $sql = "UPDATE quizes SET number_of_questions='0', fetch_limit = '0', is_active='0' WHERE quiz_id='$row[quiz_id]'";
                        mysqli_query($conn,$sql);
                    }
                    else{
                       $QueNum = $temp->num_rows;
                       $sql = "UPDATE quizes SET number_of_questions='$QueNum' WHERE quiz_id='$row[quiz_id]'";
                        mysqli_query($conn,$sql);
                       if($QueNum < $row['fetch_limit']) {
                          $sql = "UPDATE quizes SET fetch_limit='$QueNum' WHERE quiz_id='$row[quiz_id]'";
                          mysqli_query($conn, $sql);
                       }
                    }
                }


    
include('includes/header.php'); 

include('includes/navbar.php'); 

    $temp = "SELECT quiz_id FROM quizes WHERE admin_email_id='$_SESSION[admin_id]'";
    $result1 = mysqli_query($conn,$temp);
    $answer = 0; 
    $Fail = 0;
    while($row1 = $result1->fetch_assoc())
    {
        $sql = "SELECT * FROM attempts WHERE quiz_id='$row1[quiz_id]'";
        $result2 = mysqli_query($conn,$sql);
        while($row2 = $result2->fetch_assoc())
        {
          $candidatePercentage = ($row2['score']/$row2['total_marks'])*100;
          if($candidatePercentage<$row2['pass_percentage'])
            $Fail = $Fail + 1;
        }
        $answer = $answer + $result2->num_rows;
    }
    $ans = "";
    $pass_percentage = 0;
    if($answer!=0)
    {
      $pass_percentage = 100*(($answer - $Fail)/$answer);
      $ans = $pass_percentage;
    }
    
    $b=0;
    $control = 0;
    $ans = "";
         $str = $pass_percentage.'A';
         $p=0;
         
         while($str["$p"]!='A' && $b != 3)
         {
           $ans = $ans.$str["$p"];
           
           if($str["$p"]=='.' || $control ==1)
            {$b = $b + 1; $control=1;}
           
           $p++;

         }   
        $sql = "SELECT report_id FROM `reported_questions` JOIN `question_bank` on reported_questions.question_id=question_bank.question_id JOIN `quizes` on question_bank.quiz_id=quizes.quiz_id WHERE quizes.admin_email_id='$_SESSION[admin_id]' AND amend='0'";
        $report_result = $conn->query($sql);
        $report_count = $report_result->num_rows;
        if($report_count > 0){
          if($report_count == 1)
            $msg = '1 Question was reported';
          else $msg = $report_count.' Questions were reported';
          $_SESSION['note_msg'] = $msg;
        }
?>


<!-- Begin Page Content -->
<div class="container-fluid">
  <div style="height: 50px;"></div>

  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4">

  </div>

  <!-- Content Row -->
  <div class="row">

    <!-- Total Questions-->
    <div class="col-xl-3 col-md-6 mb-4 height115">
      <div class="card border-left-primary shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div style="padding: 0px 10px;" class="col mr-2">
              <div class="text-xxs font-weight-bold text-primary text-uppercase mb-1">Active</div>
              <div class="h6 mb-0 font-weight-bold text-gray-800">

               <h4 id="active-EXAM"></h4> <!-- print total no. of question -->

              </div>
            </div>
            <div style="display:flex;width: 50%;height:100%;justify-content: flex-end;align-items:flex-end;padding-right: 10px;" class="col-auto">
              <!-- <i class="fas fa-calendar fa-2x text-gray-300"></i> -->
              <i class="fas fa-question-circle fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Attempted question -->
    <div class="col-xl-3 col-md-6 mb-4 height115">
      <div class="card border-left-success shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div style="padding: 0px 10px;" class="col mr-2">
              <div class="text-xxs font-weight-bold text-success text-uppercase mb-1">Attempts</div>
              <div class="h6 mb-0 font-weight-bold text-gray-800"><?php echo $answer;?></div>  <!-- Number of attempted questions by user -->
            </div>
            <div style="display:flex;width: 50%;height:100%;justify-content: flex-end;align-items:flex-end;padding-right: 10px;" class="col-auto">
              <i class="fas fa-check-square fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Remaining Questions -->
    <div class="col-xl-3 col-md-6 mb-4 height115">
      <div class="card border-left-info shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div style="padding: 0px 10px;" class="col mr-2">
              <div class="text-xxs font-weight-bold text-info text-uppercase mb-1">Passed</div>
              <div class="row no-gutters align-items-center">
                
                <div style="display:flex;width: 50%;height:100%;justify-content: flex-end;align-items:flex-end;padding-right: 10px;" class="col">
                  <div style="width: 100%;" class="progress progress-sm mr-2">
                    <?php echo "<div class='progress-bar bg-info' role='progressbar' style='width: $ans%' aria-valuenow='$pass_percentage'
                      aria-valuemin='0' aria-valuemax='100'></div>";?>
                  </div>
                </div>
              </div>
              <div class="mt-1">
                  <div class="h6 mb-0 mr-3 font-weight-bold text-gray-800"><?php echo $ans."%";?></div> 
                  <!-- Remaining question % -->
                </div>
            </div>
            <div style="display:flex;width: 50%;height:100%;justify-content: flex-end;align-items:flex-end;padding-right: 10px;" class="col-auto">
              <i class="fas fa-check fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Timer -->
    <div class="col-xl-3 col-md-6 mb-4 height115">
      <div class="card border-left-warning shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div style="padding: 0px 10px;" class="col mr-2">
              <div class="text-xss font-weight-bold text-red text-uppercase mb-1">Failed</div>
              <div class="h6 mb-0 font-weight-bold text-gray-800"><?php echo $Fail;?></div>
            </div>
            <div style="display:flex;width: 50%;height:100%;justify-content: flex-end;align-items:flex-end;padding-right: 10px;" class="col-auto">
              <i class="fas fa-times-circle fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Content Row -->
<div class="row row-card row-deck mb-5">
  <div class="col-12">
    <div class="card">
			<?php require 'includes/flash-message.php'; ?>
      <?php 

      $temp = "SELECT * FROM quizes WHERE admin_email_id='$_SESSION[admin_id]' ORDER BY quiz_id DESC";
      $result = mysqli_query($conn,$temp);
      if($result->num_rows>0){

      ?>

      <div class="table-responsive" style="margin-top: 10px;">
        <table id="dashboard-table" class="table table-card table-vcenter te
        xt-nowrap">
          <thead>
            <tr>
              <th class="w-1">SNo.</th>
              <th>Quiz Name</th>  
              <th>Attempts</th>
              <th>Highest</th>
              <th>Key</th>
              <th>URL</th>
              <th style="text-align: center;">Questions</th>
              <th>Status</th> 
              <th>Created</th>
              <th>Shuffle</th>
              <th style="text-align: center;">Edit/Delete</th>
             
            </tr>
          </thead>
          <tbody>
            <?php
            $i = 1;
            while($row = $result->fetch_assoc())
            {  
               $sql = "SELECT attempt_id FROM `attempts` WHERE quiz_id='$row[quiz_id]'";
               $attempt_res = $conn->query($sql);
               
               $sql = "SELECT MAX(score), fullname, total_marks FROM attempts WHERE quiz_id = '$row[quiz_id]'";
               $max_res = $conn->query($sql);
               $max_score = $max_res->fetch_assoc();
            ?>
            <tr>
              <td >
                <span class="text-muted"><?php echo $i; ?></span>
              </td>
              <td class="<?php echo $row['is_active']==1 ? 'active-row' : ''; ?>"><?php echo $row['quiz_name']; ?></td>
              <td><?php echo $attempt_res->num_rows; ?></td>
              <td><?php echo $max_score['MAX(score)']!='' ? $max_score['MAX(score)'].'/'.$max_score['total_marks'].' <br/> '.'<span style="font-size:11px;">'.$max_score['fullname'].'</span>' : '-'; ?></td>
              <td><span class="key-block"><?php echo $row['Exam_key']; ?></span></td>
              <td>
                <button class="btn btn-primary copy-quiz-url" onclick="quizURLCopy(this, '<?php echo getCurrentUrl().base64_encode($row['quiz_id']); ?>', 'Quiz URL Copied Successfully')">Copy</button>
              </td>
              <td style="text-align: center;">
                <?php
                  if($row['object_type'] == 2) { // question bank
                    echo $row['fetch_limit'].'/'.$row['number_of_questions'];
                  } 
                  else echo $row['number_of_questions'];
                ?>
              </td>
              <td style="text-align: center; font-size: 14px;">
                <?php 
                   if($row['is_active'])
                   {echo "<span class='status-icon bg-success'></span><br/>Active<div class='count-active'></div>"; } 
                   else echo "<span class='status-icon bg-unsuccess'></span><br/>Inactive";
                ?>
              </td>
              <td style="font-size: 14px;">
                <?php
                    $timestamp = $row['time_stamp'];
                    $date_obj = new DateTime($timestamp);
                    echo $date_obj->format('d-m-Y');
                    echo '<br/>';
                    echo $date_obj->format('h:i:sa');
                ?>
              </td>
              <td style="text-align: center;">
                <?php 
                  $checked = '';
                  if($row['shuffle'])
                    $checked = 'checked';
                ?>
                  <label class="custom-toggle-btn toggle-shuffle-question mb-0">
                      <input id="toggle-shuffle-checkbox<?php echo $row['quiz_id']; ?>" type="checkbox" name="gender" <?php echo $checked; ?>>
                      <span>
                          <i class="fas fa-check"></i>
                      </span>
                  </label>
                  <script>
                    $(document).ready(function(){
                      $('.toggle-shuffle-question').eq(<?php echo $i-1; ?>).unbind('click');
                      $('.toggle-shuffle-question').eq(<?php echo $i-1;?>).click(function(evt){
                            evt.stopPropagation();
                            evt.preventDefault()
                            var url = 'toggle-shuffle.php';
                            $("#shuffle-quiz-questions").load(url,{
                              shuffle : true,
                              quizID : <?php echo $row['quiz_id'];?>,
                            });
                      });
                    });
                  </script>
              </td>
              <td >
                  <div class="flex-center">
                    <span class="quiz-edit-icon edit-quiz">
                    <i  class="fas fa-pencil-alt "></i>
                    </span>

                    <?php 
                      $QID = "'".$row['quiz_id']."'";
                    ?>
                    <span class="delete-quiz" onclick="confirmQuizDeletion(<?php echo $QID; ?>)">
                      <i style="cursor: pointer;"  class="fas fa-trash-alt"></i>
                    </span>
                  </div>
                  <script type="text/javascript">
                    $(document).ready(function(){
                      $('.quiz-edit-icon').eq(<?php echo $i-1;?>).click(function(){
                            var url = 'edit_quiz_details.php';
                            $("#quiz-details-content").load(url,{
                              updateQuizDetails : true,
                              quizID : <?php echo $row['quiz_id'];?>
                            });
                      });
                    });
                  </script>
              </td>
            </tr>
          <?php
          $i =$i + 1;
        }
        ?>
          </tbody>
        </table>
      </div>
      <?php 
      }
      else {
        ?>
        <div style="width: 100%;height: 50vh;font-size: 20px; display: flex;justify-content: center;align-items: center;color: #cd201f;flex-direction: column;">
          
          <label><i class="fas fa-exclamation-circle"></i> No Quizzes</label>
          <button class="create-quiz-btn" onclick="location.href='createquiz.php'">Create Quiz</button>
        </div>
        <?php
      }
      ?>

    </div>
  </div>      
</div>
<script type="text/javascript">
  
  var x = document.getElementsByClassName("count-active").length;
  document.getElementById("active-EXAM").innerHTML = x;
  function confirmation()
  {
    y = confirm("Are you sure Quiz will be permanently deleted (No backup)");

    if(y)
      return true;
    else return false;
  }

</script>
  <?php
include('includes/scripts.php');

?>
<div class="quiz-details-popup">
  <div id="quiz-details-content">
  
  </div>
</div>
<div id="shuffle-quiz-questions"></div>
<script>
    function shuffleMessage(){
        let el = document.getElementById('shuffle-quiz-questions')
        el.style.display = 'block'
    }
    function hideShuffleMessage(){
        let el = document.getElementById('shuffle-quiz-questions')
        el.style.display = 'none'
    }

  $(document).ready( function () {
    $('#dashboard-table').DataTable({
      pageLength : 5,
      paging : true,
      lengthMenu: [[5, 10, 20, -1], [5, 10, 20, 'All']]
    });
  } );
</script>
<div onclick="onClickBlackCoverOfQuizUpdate()" class="black-cover-quiz-details"></div>
</body>

</html>

<script type="text/javascript">
  
const quizURLCopy = (btn, copyCode, message) => {
    copyCode = copyCode.trim()
    let textarea = document.createElement('textarea')
    let body = document.body
    textarea.value = copyCode
    document.body.appendChild(textarea)
    textarea.select()
    document.execCommand('copy')
    body.removeChild(textarea)
    textarea.remove()
    if(copyCode != ''){
        btn.classList.remove('url-copy')
        btn.classList.add('url-copied')
        btn.innerHTML = 'Copied'
    }
    else{
        btn.innerHTML = 'Empty cannot be copied'
    }   
    btn.disabled = true
    setTimeout(() => {
        btn.classList.add('url-copy')
        btn.classList.remove('url-copied')
        btn.innerHTML = 'Copy'
        btn.disabled = false

    }, 2000)
}
</script>