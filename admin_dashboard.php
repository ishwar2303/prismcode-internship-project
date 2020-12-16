<!DOCTYPE html>
<html>
<head>
  <title>Admin Dashboard</title>
</head>
<?php

require_once('connection.php');

session_start();
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

                $sql = "SELECT * FROM quizes WHERE admin_email_id='$_SESSION[admin_id]'";
                $result = mysqli_query($conn,$sql);
                while($row = $result->fetch_assoc()){

                    $sql = "SELECT * FROM question_bank WHERE quiz_id='$row[quiz_id]'";
                    $temp = mysqli_query($conn,$sql);  
                    if($temp->num_rows == 0)
                    {   
                       $sql = "UPDATE quizes SET number_of_questions='0', is_active='0' WHERE quiz_id='$row[quiz_id]'";
                        mysqli_query($conn,$sql);
                    }
                    else{
                       $QueNum = $temp->num_rows;
                       $sql = "UPDATE quizes SET number_of_questions='$QueNum' WHERE quiz_id='$row[quiz_id]'";
                        mysqli_query($conn,$sql);
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
              <div class="text-xxs font-weight-bold text-primary text-uppercase mb-1">Active Quizes </div>
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
<div class="row row-card row-deck">
  <div class="col-12">
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">Quizes</h3>
      </div>
      <?php 

            $temp = "SELECT * FROM quizes WHERE admin_email_id='$_SESSION[admin_id]'";
            $result = mysqli_query($conn,$temp);
      if($result->num_rows>0){

      ?>

      <div class="table-responsive">
        <table class="table table-card table-vcenter text-nowrap">
          <thead>
            <tr>
              <th class="w-1">S No.</th>
              <th>Quiz Name</th>  
              <th style="text-align: center;">Questions</th>
              <th>Quiz Status</th> 
              <th>Created</th>
              <th style="text-align: center;">Edit</th>
              <th style="text-align: center;">Delete</th>
             
            </tr>
          </thead>
          <tbody>
            <?php
            
            $i = 1;
            while($row = $result->fetch_assoc())
            {  
               
            ?>
            <tr>
              <td>
                <span class="text-muted"><?php echo $i; ?></span>
              </td>
              <td><?php echo $row['quiz_name']; ?></td>
              <td style="text-align: center;"><?php echo $row['number_of_questions'];?></td>
              <td>
                <?php 
                   if($row['is_active'])
                   {echo "<span class='status-icon bg-success'></span>Active<div class='count-active'></div>"; } 
                   else echo "<span class='status-icon bg-unsuccess'></span>Inactive";
                ?>
              </td>
              <td><?php echo $row['time_stamp'];?></td>
              <td style="text-align: center;"><i style="color: #2980b9; cursor: pointer;" class="fas fa-edit quiz-edit-icon"></i></td>
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
              <td style="text-align: center;" class="text-center">
                <!--
                <a id="delete-exam-link" onclick="return confirmation()" class="icon" href="delete_exam_query.php?exam_id=<?php echo $row['quiz_id']?>">
                -->
                  <?php 
                    $QID = "'".$row['quiz_id']."'";
                  ?>
                  <i style="cursor: pointer;" onclick="confirmQuizDeletion(<?php echo $QID; ?>)" class="fas fa-trash-alt text-danger">
                    
                  </i>
                <!-- </a> -->
              </td>
            </tr>
          </tbody>
          <?php
          $i =$i + 1;
        }
        ?>
        </table>
      </div>
      <?php 
      }
      else {
        ?>
        <div style="width: 100%;height: 50vh;font-size: 20px; display: flex;justify-content: center;align-items: center;color: #e74c3c;flex-direction: column;">
          <i style="font-size: 40px; margin-bottom : 25px;" class="fas fa-graduation-cap"></i>
          <label>No Quiz Registered!</label>
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
<div onclick="onClickBlackCoverOfQuizUpdate()" class="black-cover-quiz-details"></div>
</body>

</html>
