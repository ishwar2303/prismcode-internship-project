<?php
	require_once('connection.php');
    require_once('middleware.php');
    session_start();
    if(isset($_POST['firstname']) && isset($_POST['lastname']) && isset($_POST['contact']) && isset($_POST['gender']) && isset($_POST['state']) && isset($_POST['dob']) && isset($_POST['address']) && isset($_POST['institution']) && isset($_POST['email']) && isset($_POST['password']) && isset($_POST['confirm_password']))
    {
        $firstname = cleanInput($_POST['firstname']);
        $lastname = cleanInput($_POST['lastname']);
        $contact = cleanInput($_POST['contact']);
        $gender = cleanInput($_POST['gender']);
        $state = cleanInput($_POST['state']);
        $dob = cleanInput($_POST['dob']);
        $address = cleanInput($_POST['address']);
        $institution = cleanInput($_POST['institution']);
        $email = cleanInput($_POST['email']);
        $password = cleanInput($_POST['password']);
        $confpassword = cleanInput($_POST['confirm_password']);
        $control = 1;
        $error_messages = array();
        if($firstname == ''){
            $error_msg = 'First Name required';
            array_push($error_messages, $error_msg);
        }
        else if(!alphaSpaceValidation($firstname)){
            $error_msg = 'Invalid First Name';
            array_push($error_messages, $error_msg);
        }
        if($lastname!= '' && !alphaSpaceValidation($lastname)){
            $error_msg = 'Invalid Last Name';
            array_push($error_messages, $error_msg);
        }
        if($gender == ''){
            $error_msg = 'Gender requried';
            array_push($error_messages, $error_msg);
        }
        else if($gender != 'male' && $gender!= 'female' && $gender != 'others'){
            $error_msg = 'Invalid gender';
            array_push($error_messages, $error_msg);
        }
        if($contact == ''){
            $error_msg = 'Contact requried';
            array_push($error_messages, $error_msg);
        }
        else if(strlen($contact) < 6 || strlen($contact) > 10){
            $error_msg = 'Invalid Contact';
            array_push($error_messages, $error_msg);
        }
        else if(!ctype_digit($contact)){
            $error_msg = 'Invalid Contact';
            array_push($error_messages, $error_msg);
        }
        if($state == ''){
            $error_msg = 'State required';
            array_push($error_messages, $error_msg);
        }
        if($email == ''){
            $error_msg = 'E-mail required';
            array_push($error_messages, $error_msg);
        }
        else if(!emailValidation($email)){
            $error_msg = 'Invalid E-mail';
            array_push($error_messages, $error_msg);
        }
        else{
            $sql="SELECT * FROM registered_admin WHERE admin_email='$email'";
            $result = mysqli_query($conn,$sql);
            if($result->num_rows == 1){
                $error_msg = 'E-mail already registered';
                array_push($error_messages, $error_msg);
            }
        }

        if($dob == ''){
            $error_msg = 'Date of Birth required';
            array_push($error_messages, $error_msg);
        }
        else{
            $dob_obj = new DateTime($dob);
            $dob_epoch = $dob_obj->format('U');
            $current_time = time();
            if($dob_epoch > $current_time){
                $error_msg = 'Invalid DOB';
                array_push($error_messages, $error_msg);
            }
            else if($dob_epoch > $current_time - 375840000){
                $error_msg = 'Age limit 12 years';
                array_push($error_messages, $error_msg);
            }
            else if($dob_epoch < $current_time - 2522880000){
                $error_msg = 'Max age limit 80 years';
                array_push($error_messages, $error_msg);
            }
        }

        if($password == ''){
            $error_msg = 'Password required';
            array_push($error_messages, $error_msg);
        }
        else if(strlen($password) < 6){
            $error_msg = 'Minimum password length should be 6 characters';
            array_push($error_messages, $error_msg);
        }

        if($password != $confpassword){
            $error_msg = 'Password not matched';
            array_push($error_messages, $error_msg);
        }


        if(sizeof($error_messages) == 0){
            $sql = "INSERT INTO `registered_admin` (`admin_id`, `first_name`, `last_name`, `admin_contact`, `admin_gender`, `state`, `date_of_birth`, `admin_address`, `institution_name`, `admin_email`, `admin_password`) VALUES (NULL, '$firstname', '$lastname', '$contact', '$gender', '$state', '$dob', '$address', '$institution', '$email', '$password')";
            mysqli_query($conn,$sql);
            $_SESSION['name'] = $firstname." ".$lastname;
            $_SESSION['email'] = $email;
            $_SESSION['login_time'] = time();
            $_SESSION['admin_id'] = $conn->insert_id;
            ?>
            <div class="success-msg">
                <span>Registration Successfull</span>
                <span>We are redirecting you to dashboard</span>
                <div class="progress-bar-container border">
                    <div id="progress-bar"></div>
                </div>
            </div>
            <span></span>
            <script type="text/javascript">
                showPopupContainer();
                interval = setInterval(progressBar, 50);
            </script>
            <?php 
        }
        else{
            foreach($error_messages as $msg){
                ?>
                <div class="error-msg">
                    <i class="fas fa-exclamation-circle"></i> 
                    <?php echo $msg; ?>
                </div>
                <script type="text/javascript">showPopupContainer();</script>
                <?php
            }
        }
    }
    else {
        ?>
        <span style='color:red;'>Intervention with index!</span>
        <script type="text/javascript">showPopupContainer();</script>
        <?php
    }
?>