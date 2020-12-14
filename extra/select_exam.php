<?php
  session_start();

  require_once('connection.php');
    
    if(isset($_SESSION['if_TEST_is_set']))
      header('location: logout.php');

    if(isset($_SESSION['login_time']))
     {
        $current_time = time();
        $login_time = $_SESSION['login_time'];
      if($current_time - $login_time   > 3000)  // 5min
      {
         header('location: logout.php');
      }
     }
     else header('location: logout.php');


    $sql = "SELECT * FROM quizes";

    $result = mysqli_query($conn,$sql);
    $num = $result->num_rows;
 
?>
<!DOCTYPE html>
<html>
<head>
  <title>Select Test</title>
  <link rel="stylesheet" type="text/css" href="select_exam_pageCSS.css">

</head>
<body>  
  <center>
    <header>
        <div class="main-container">
            <div class="logout"><a href="logout.php">Logout</a></div>
        </div>
    </header>
    <h1>Choose Exam</h1>
    <div>
    
      <form action="take_quiz.php" method="post">
        <select name='test_selected'>
         <?php
               
               while($row = $result->fetch_assoc())
               {
                  $time = $row['time_duration'];
                  if($time == 900 )
                    $show_time = "15 minutes";
                  if($time == 1800)
                    $show_time = "30 minutes";
                  if($time == 2700)
                    $show_time = "45 minutes";
                  if($time == 3600)
                    $show_time = "1 hour";
                  if($time == 7200)
                      $show_time = "2 hour";
                  if($time == 10800)
                      $show_time = "3 hour";
                  if($row['is_active'] == 1)  // for active test
                  echo "<option value ='$row[quiz_id]'>Exam : $row[quiz_name]&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                  |&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Time : $show_time</option>";  
               }
         ?>
         </select><br /><br />
      Exam Key  <input id="key" type="password" name="exam_key" required><br / ><br />
      
      <button id="submit" stype="submit">Start Test</button>
      
      
      </form>
    </div>
    </center>
</body>
</html>