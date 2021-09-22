<?php 

require_once('connection.php');
require_once('middleware.php');

if(isset($_POST['quizName'])){
    $search_quiz_name = strtolower(cleanInput($_POST['quizName']));
    $sql = "SELECT * FROM quizes";
    $result = $conn->query($sql);
    $quizzes = array();
    while($row = $result->fetch_assoc()){
        if($row['is_active']){ // if quiz is active
            $db_quiz_name = strtolower($row['quiz_name']);
            $k = 0;
            $control = 1;
            $s_len = strlen($search_quiz_name);
            $c_len = strlen($db_quiz_name);
            if($s_len > $c_len)
                $len = $c_len;
            else $len = $s_len;
            for($i=0; $i<$len; $i++){
                if($search_quiz_name[$i] != $db_quiz_name[$k++]){
                    $control = 0;
                    break;
                }
            }
            if($control){
                array_push($quizzes, $row);
            }
        }
    }
}

?>


<?php 
    if(sizeof($quizzes) == 0){
        ?>
        <div class="danger"><i class="fas fa-exclamation-circle"></i> No quizzes found with the given name</div>
        <?php
        return;
    }
    ?>
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>  
    <div class="table card-table table-vcenter text-nowrap mt-15px">
        <div class="quiz-blocks">
    <?php
    
    $i=0;
    foreach($quizzes as $row){
        ?>
               <?php
                   $sql = "SELECT * FROM question_bank WHERE quiz_id = '$row[quiz_id]'";
                   $result1 = mysqli_query($conn,$sql);
                   if($result1->num_rows>0)
                       {
                        ?>
                             <div>
                                 <div class="view-description-popup">
                                       <div class="space-between">
                                         <span><?php echo $row['quiz_name'];?></span>
                                         <span class="ml-20px"><?php echo $row['difficulty_level']; ?></span>
                                       </div>
                                 </div>
                                    <script type="text/javascript">
                                        $(document).ready(function(){
                                        $(".view-description-popup").eq(<?php echo $i;?>).click(function(){
                                            $('.opening-quiz-details').show()
                                            // $(".view-description-popup").eq(<?php echo $i ?>).html('<i style="font-size:12px" class="fas fa-sync fa-spin m-1"></i> Loading')
                                            var url = 'description_popup.php'
                                            setTimeout(() => {
                                            $("#description-popup-content").load(url,{
                                                quizID : <?php echo $row['quiz_id'];?>
                                            });
                                            $('.opening-quiz-details').hide()
                                            // $(".view-description-popup").eq(<?php echo $i ?>).html('View Details')
                                            }, 500)
                                        });
                                        });
                                    </script>
                             </div>
                        <?php
                    $i++;
                    }
               
           ?>

        <?php
    }
    

?>

</div>
      </div>