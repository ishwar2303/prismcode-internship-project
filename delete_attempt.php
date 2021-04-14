<?php 
	require_once('connection.php');
	if(isset($_POST['quizID'])){
    if(isset($_POST['deleteAll'])){
      $sql = "SELECT * FROM attempts WHERE quiz_id='$_POST[quizID]'";
      $result = mysqli_query($conn,$sql);
      while($row = $result->fetch_assoc()){
        $sql = "DELETE FROM feedback WHERE attempt_id='$row[attempt_id]'";
        mysqli_query($conn,$sql);
      }
      $sql = "DELETE FROM attempts WHERE quiz_id='$_POST[quizID]'";
     mysqli_query($conn,$sql);
     ?>
     <script type="text/javascript">
       document.getElementById('delete-all-attempts').style.display='none';
       document.getElementsByClassName('print-result')[0].style.display = 'none';
       document.getElementById('reload-leaderboard-btn').innerHTML = '<i id="reload-leaderboard-icon" class="fas fa-redo-alt"></i><span style="font-size: 15px;">Reload</span>'
     </script>
     <?php
     return;
    }
    if(isset($_POST['attemptID'])){
      $sql = "DELETE FROM feedback WHERE attempt_id='$_POST[attemptID]'";
      mysqli_query($conn,$sql);
		 $sql = "DELETE FROM attempts WHERE attempt_id='$_POST[attemptID]'";
		 mysqli_query($conn,$sql);
		}
         $sql = "SELECT * FROM attempts WHERE quiz_id='$_POST[quizID]' ORDER BY score DESC,time_stamp ASC";
            $result = mysqli_query($conn,$sql);

            $i = 1;
            if($result->num_rows>0){
                while($row = $result->fetch_assoc())
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
                              $("#confirm").off();
                              hideCustomConfirmation();
                            });

                            $("#confirm").click(function(){

                              hideCustomConfirmation();
    	                        $("#quiz-leaderboard-info").load(url,{
    	                          attemptID : <?php echo $row['attempt_id'];?>,
    	                          quizID : <?php echo $_POST['quizID'];?>
    	                        });
    	                     });
                          });
                        });
                      </script>

    <?php      
                       $i = $i + 1;
                }
                ?>
                <script type="text/javascript">
       document.getElementById('delete-all-attempts').style.display='block';
       document.getElementsByClassName('print-result')[0].style.display = 'block';

       document.getElementById('delete-all-attempts').style.display='flex';
       document.getElementsByClassName('print-result')[0].style.display = 'flex';  
       document.getElementById('reload-leaderboard-btn').innerHTML = '<i id="reload-leaderboard-icon" class="fas fa-redo-alt"></i><span">Reload</span>'
     </script>
                <?php
            }
            else {
              ?>
              <div style="color: #cd201f;padding:25px;"><i class="fas fa-exclamation-circle"></i>  No attempts were found for this exam</div>
              <script type="text/javascript">
       document.getElementById('delete-all-attempts').style.display='none';
       document.getElementsByClassName('print-result')[0].style.display = 'none';
       document.getElementById('reload-leaderboard-btn').innerHTML = '<i id="reload-leaderboard-icon" class="fas fa-redo-alt"></i><span">Reload</span>'
              </script>
              <?php
            }

	}

?>