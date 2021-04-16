<?php 

if(isset($_POST['test']) && isset($_POST['level']) && isset($_POST['description']) && isset($_POST['question_num']) && isset($_POST['state']) && isset($_POST['exam_key']) && isset($_POST['time']) && isset($_POST['marks']) && isset($_POST['negative']) && isset($_POST['passing'])){
      
    $quiz_name = cleanInput($_POST['test']);
    $level = cleanInput($_POST['level']);
    $description = cleanInput($_POST['description']);
    $question_num = cleanInput($_POST['question_num']);
    $state = cleanInput($_POST['state']);
    $key = cleanInput($_POST['exam_key']);
    $time = cleanInput($_POST['time']);
    $marks = cleanInput($_POST['marks']);
    $negative = cleanInput($_POST['negative']);
    $passing = cleanInput($_POST['passing']);
    $control = 1;
    
    if($quiz_name == ''){
        $control = 0;
        $quiz_name_error = 'Quiz name required';
    }
    
    if($level == ''){
        $control = 0;
        $level_error = 'Select level';
    }
    else if($level!=1 && $level!=2 && $level!=3){
        $control = 0;
        $level_error = 'Invalid level';
    }
    else {
        
        if($level == 1)
            $level = 'Beginner';
        if($level == 2)
            $level = 'Intermediate';
        if($level == 3)
            $level = 'Advance';
    }

    if($description == ''){
        $control = 0;
        $description_error = 'Description required';
    }
    else if(strlen($description) > 1500){
        $control = 0;
        $description_error = 'Characters limit 1500';
    }

    if($state != 0 && $state != 1){
        $control = 0;
        $level_error = 'Invalid status';
    }

    if($key == ''){
        $control = 0;
        $key_error = 'Exam key required';
    }
    else if(strlen($key)<6 || strlen($key) > 15){
        $control = 0;
        $key_error = 'Minimum characters 6 and Maximum characters 15';
    }

    $_SESSION['question_num'] = $question_num;
    $_SESSION['quiz_name'] = $quiz_name;

}

?>