<?php 
    session_start();
    require_once('connection.php');
    require_once('middleware.php');
    if(isset($_POST['problem']) && isset($_POST['questionID'])){
        $problem = cleanInput($_POST['problem']);
        $question_id = cleanInput($_POST['questionID']);
        if($problem != '' && $question_id != ''){
            $sql = "SELECT * FROM reported_questions WHERE question_id='$question_id' AND email='$_SESSION[email]'";
            $result = $conn->query($sql);
                if($result->num_rows < 3){
                $sql = "INSERT INTO `reported_questions` (`report_id`, `question_id`, `email`, `problem`, `amend`, `timestamp`) VALUES (NULL, '$question_id', '$_SESSION[email]', '$problem', '0', current_timestamp())";
                $conn->query($sql);
                if($conn->error == ''){
                ?>
                    <div class="success-msg"><i class="fas fa-check"></i> Question reported successfully</div>
                    <script>closeReportQuestion()</script>
                <?php
                }
                else{
                    ?>
                    <div class="error-msg"><i class="fas fa-exclamation-circle"></i> Question reported successfully</div>
                    <?php
                }
            }
            else{
                ?>
                <div class="note-msg"><i class="fas fa-exclamation-circle"></i> You have already reported this question 3 times</div>
                <?php
            }
        }
        else{
            ?>
                <div class="error-msg"><i class="fas fa-exclamation-circle"></i>Fill required fields</div>
            <?php
        }
    }
    else{
        ?>
        <div class="error-msg"><i class="fas fa-exclamation-circle"></i>Error : Inappropriate submission</div>
        <?php
    }
?>