<?php 

    require_once('connection.php');
    require_once('middleware.php');
    if(isset($_POST['quizID']) && isset($_POST['shuffle'])){
        $quizId = cleanInput($_POST['quizID']);
        $sql = "SELECT quiz_name, shuffle FROM quizes WHERE quiz_id = '$quizId'";
        $result = $conn->query($sql);
        if ($result->num_rows == 1) {
            $row = $result->fetch_assoc();
            $quiz_name = $row['quiz_name'];
            $sql = "SELECT question_id FROM question_bank WHERE quiz_id='$quizId'";
            $res = $conn->query($sql);
            $toggle = 0;
            if($res->num_rows == 0){
                $message = "Quiz doesn't have questions";
            }
            else{
                $toggle = $row['shuffle'];
                $toggle = !$toggle;
                if ($toggle) {
                    $message = 'Questions will be shuffled';
                } else {
                    $message = 'Questions will appear in same sequence to all candidates';
                }
                $sql = "UPDATE quizes SET shuffle='$toggle' WHERE quiz_id='$quizId'";
                $conn->query($sql); }
            ?>

            <span><?php echo $quiz_name; ?></span>
            <br/>
            <span><?php echo $message; ?></span>
            <br/>
            <script>
                shuffleMessage()
            </script>
            <div>
                <button onclick="hideShuffleMessage()">Got It</button>
            </div>
        <?php
            if ($toggle) {
                ?>
                <script>
                    
                    document.getElementById('toggle-shuffle-checkbox<?php echo $quizId; ?>').checked = true
                </script>
                <?php
            } else {
                ?>
                <script>
                    
                    document.getElementById('toggle-shuffle-checkbox<?php echo $quizId; ?>').checked = false
                </script>
                <?php
            }
        }
    }

?>