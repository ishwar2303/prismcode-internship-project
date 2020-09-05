<!DOCTYPE html>
<html>
<head>
  <title>Leaderboard</title>
</head>
</html>
<?php
   session_start();
    require_once('connection.php');
    if(isset($_SESSION['login_time']))
     {
        $current_time = time();
        $login_time = $_SESSION['login_time'];
      if($current_time - $login_time   > 30000)  
      {
         header('location: admin_logout.php');
      }
     }
     else header('location: admin_logout.php');
?>
<!DOCTYPE html>
<html>

    <?php include 'includes/header.php'; ?>
    <?php include 'includes/navbar.php'; ?>


    <div class="container">
      
  <div style="height: 55px;"></div>
      <div class="row row-card row-deck">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h2 class="card-title">Results</h2>
            </div>
            <div class="card-body">
              <form action="" method="POST">
               <div class="col-sm-12 col-lg-12">
                 <div class="form-group">
                    <label class="form-label">Select Quiz :</label>
                  <!--   <div class="input-field col s12"> -->
                      <select  name="exam_id" class="form-control custom-select select-exam">
                        <option value disabled>Select Quiz</option>
                        <?php 
                      
                      $temp = "SELECT * FROM quizes WHERE admin_email_id='$_SESSION[admin_id]' ORDER BY quiz_name";
                               $result = mysqli_query($conn,$temp);

                          while($row = $result->fetch_assoc())
                          {
                            $sql = "SELECT * FROM question_bank WHERE quiz_id='$row[quiz_id]'";
                            $temp = mysqli_query($conn,$sql);  
                            if($temp->num_rows>0)
                              {  
                              
                                  echo "<option  value='$row[quiz_id]'>$row[quiz_name]</option>";
                              }
                          }
                          
                      ?>
                       
                       </select>
                          <button name="submit" class="check-score btn btn-primary ml-auto" value="Check" type="submit">Check</button>
                 </div>
               </div>
              </form>
            </div>
            <div class="table-responsive">
              <table class="table card-table table-vcenter text-nowrap">

        <?php 
        if(isset($_POST['exam_id']))
        {
         $sql = "SELECT * FROM attempts WHERE quiz_id='$_POST[exam_id]' ORDER BY score DESC,time_stamp ASC";
            $result1 = mysqli_query($conn,$sql);
            if($result1->num_rows>0){
       ?>

                    <script type="text/javascript">
                      $(document).ready(function(){
                        $("#delete-all-attempts").click(function(){
                          var url = 'delete_attempt.php';
                          showCustomConfirmation();
                            $("#cancel").click(function(){
                              hideCustomConfirmation();
                            });

                            $("#confirm").click(function(){

                              hideCustomConfirmation();
                            $("#quiz-leaderboard-info").load(url,{
                              quizID : <?php echo $_POST['exam_id'];?>,
                              deleteAll : true
                            });
                          });
                        });
                      });
                    </script>
                  <div class="leaderboard-heading">
                  <span id="leaderboard-quiz-name" style="font-weight:bold;font-size:20px;width: 600px;">
                    <?php 
                    if(isset($_POST['exam_id']))
                    {
                      $sql = "SELECT quiz_name,passing_percentage FROM quizes WHERE quiz_id='$_POST[exam_id]'";
                      $result = mysqli_query($conn,$sql);
                      $r = $result->fetch_assoc();
                      echo $r['quiz_name'];
                    }
                    ?>    </span>
                    <div class="reload-print-container">
                      <button  class="reload-leaderboard">
                        <i id="reload-leaderboard-icon" class="fas fa-redo-alt"></i>
                        <span style="font-size: 15px;">Reload</span>
                      </button>
                      <button  id="delete-all-attempts"><span><i class="fas fa-trash-alt"></i></span><span>Delete All Attempts</span></button>
                      <button style="background: #4b4b4b;" onclick="printLeaderboard()" class="print-result"><span><i class="fas fa-print"></i></span><span>Print</span></button>
                      
                    </div>
                    </div>
                    <script type="text/javascript">
                      $(document).ready(function(){
                        $(".reload-leaderboard").eq(0).click(function(){
                          var url = 'delete_attempt.php';
                          $("#quiz-leaderboard-info").load(url,{
                            quizID : <?php echo $_POST['exam_id'];?>
                          });
                        });
                      });
                    </script>
                <thead id="table-heading-leaderboard">
                  <tr>
                    <th class="w-1">Rank</th>
                    <th>Student Name</th>
                    <th>Registration No</th>
                    <th>Email</th>
                    <th>Score</th>
                    <th>Percentage</th>
                    <th>Result</th>
                    <th>Timestamp</th>
                    <th>Delete</th>
                  </tr>
                </thead>
                <tbody id="quiz-leaderboard-info">
          <?php
            $i = 1;
            while($row = $result1->fetch_assoc())
            {
                ?>


                  <tr>                                                 <!-- Passed -->
                    <td>                                                 <!-- | -->
                      <span class="text-muted"><?php echo $i;?></span>                  <!-- | -->  
                    </td>                                                <!-- |  -->                                    <!-- | -->
                    <td><?php echo $row['fullname']; ?></td>
                    <td><?php echo $row['registration_no'];?></td>
                    <td><?php echo $row['email']; ?></td> 
                    <td class="score"><?php echo $row['score']."/".$row['total_marks']; ?></td>                                   <!-- | -->
                    <?php 
                    $percentage = ($row['score']/$row['total_marks'])*100;
                    ?>
                   
                    <td>
                    <?php 
                      $b=0;
                      $control = 0;
                      $ans = "";
                           $str = $percentage.'A';
                           $p=0;
                           while($str["$p"]!='A' && $b != 3)
                           {
                             $ans = $ans.$str["$p"];
                             
                             if($str["$p"]=='.' || $control ==1)
                              {$b = $b + 1; $control=1;}
                             $p++;
                           } 
                           $ans = (int)$ans;
                      if($ans<0)
                        $ans = 0;

                      $ans = $ans."%";
                      echo $ans;
                      ?>
                    </td>
                     <td>                              
                    <?php
                      if($percentage>=$row['pass_percentage'])
                      echo "<span class='status-icon bg-success'></span> P";
                      else     echo "<span class='status-icon bg-danger'></span> F";    
                             ?>                                    
                    </td>
                    <td><?php echo $row['time_stamp'];?></td>
                    <td style="text-align: center;"><i style="cursor: pointer;" class="fas fa-trash-alt text-danger"></i></td>                                                  
                  </tr> 
                  <script type="text/javascript">
                    $(document).ready(function(){
                      $(".text-danger").eq(<?php echo $i-1;?>).click(function(){
                        var url = 'delete_attempt.php';
                        showCustomConfirmation();
                            $("#cancel").click(function(){
                              hideCustomConfirmation();
                            });

                            $("#confirm").click(function(){

                              hideCustomConfirmation();
                          $("#quiz-leaderboard-info").load(url,{
                            attemptID : <?php echo $row['attempt_id'];?>,
                            quizID : <?php echo $_POST['exam_id'];?>
                          });
                        });
                      });
                    });
                  </script>

<?php      
                   $i = $i + 1;
            }
          }
          else{
            $sql = "SELECT quiz_name FROM quizes WHERE quiz_id='$_POST[exam_id]'";
            $result = mysqli_query($conn,$sql);
            $row = $result->fetch_assoc();
            ?>
              <label style="display: flex;justify-content: space-evenly;align-items: center;height: 50vh;flex-direction: column;">
               <i style="font-size: 80px;" class="far fa-frown"></i>
               <label><?php echo $row['quiz_name'];?></label>
               <label style="font-size : 18px;">No student has given Quiz yet!</label>
              </label>
            <?php
          }
        }
        ?>
                                                                  <!-- user -->
                </tbody>
              </table>
            </div>
          </div>
        </div>       
      </div>
    </div>


    <?php include 'includes/scripts.php'; ?>
   </body>

</html>