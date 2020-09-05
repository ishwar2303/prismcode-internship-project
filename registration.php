<?php
	require_once('connection.php');
    
    if(isset($_POST['firstname']) && isset($_POST['lastname']) && isset($_POST['contact']) && isset($_POST['gender']) && isset($_POST['state']) && isset($_POST['dob']) && isset($_POST['address']) && isset($_POST['institution']) && isset($_POST['email']) && isset($_POST['password']) && isset($_POST['confirm_password']))
    {
     
    if(!empty($_POST['firstname']) && !empty($_POST['contact']) && !empty($_POST['email']) && !empty($_POST['dob']) && !empty($_POST['email']) && !empty($_POST['password']) && !empty($_POST['confirm_password']))  
    	
      {

            $firstname = mysqli_real_escape_string($conn,$_POST['firstname']);
            $lastname = mysqli_real_escape_string($conn,$_POST['lastname']);
            $contact = mysqli_real_escape_string($conn,$_POST['contact']);
            $gender = mysqli_real_escape_string($conn,$_POST['gender']);
            $state = mysqli_real_escape_string($conn,$_POST['state']);
            $dob = mysqli_real_escape_string($conn,$_POST['dob']);
            $address = mysqli_real_escape_string($conn,$_POST['address']);
            $institution = mysqli_real_escape_string($conn,$_POST['institution']);
            $email = mysqli_real_escape_string($conn,$_POST['email']);
            $password = mysqli_real_escape_string($conn,$_POST['password']);
            $confpassword = mysqli_real_escape_string($conn,$_POST['confirm_password']);
            
            $firstname = strip_tags($firstname);
            $lastname = strip_tags($lastname);
            $contact = strip_tags($contact);
            $gender = strip_tags($gender);
            $state = strip_tags($state);
            $dob = strip_tags($dob);
            $address = strip_tags($address);
            $institution = strip_tags($institution);
            $email = strip_tags($email);
            $password = strip_tags($password);
            $confpassword = strip_tags($confpassword);
            if(!empty($firstname) && !empty($contact) && !empty($gender) && !empty($state) && !empty($dob) && !empty($address) && !empty($email) && !empty($password)) {
                if($password == $confpassword){
                    $sql="SELECT * FROM registered_admin WHERE admin_email='$email'";
                    $result = mysqli_query($conn,$sql);
                        if($result->num_rows == 0){
                    		$sql = "INSERT INTO `registered_admin` (`admin_id`, `first_name`, `last_name`, `admin_contact`, `admin_gender`, `state`, `date_of_birth`, `admin_address`, `institution_name`, `admin_email`, `admin_password`) VALUES (NULL, '$firstname', '$lastname', '$contact', '$gender', '$state', '$dob', '$address', '$institution', '$email', '$password')";
                    		mysqli_query($conn,$sql);
                            $_SESSION['name'] = $firstname." ".$lastname;
                            $_SESSION['email'] = $email;
                            $_SESSION['login_time'] = time();
                            ?>
                                <span style="color : green;">Registration Successful</span>
                                <span style="color : green;">E-mail : <?php echo $email;?></span>
                                <span style="color : green;" >Password : <?php echo $password?></span>
                                <span style='top-margin : 20px;width: 90px;height: 35px;border-radius: 5px;' id="submit-form-btn" style="cursor: pointer;" onclick="location.href='index.php';">Login</span>
                            <script type="text/javascript">showPopupContainer();</script>
                            <?php 
                        }
                        else {
                            ?>
                            <span style='color:red;'>E-mail Already registered!</span>
                            <script type="text/javascript">showPopupContainer();</script>
                            <?php
                        }
                }
                else {
                ?>
                <span style='color:red;'>Password Not matched!</span>
                <script type="text/javascript">showPopupContainer();</script>
                <?php
                }
         }       
         else {
            ?>
            <span style='color:red;'>Required fields should not be empty!</span>
            <script type="text/javascript">showPopupContainer();</script>
            <?php
            }
    }
      else {
        ?>
        <span style='color:red;'>Fill required fields!</span>
        <script type="text/javascript">showPopupContainer();</script>
        <?php
        }
    }
    else {
        ?>
        <span style='color:red;'>Intervention with index!</span>
        <script type="text/javascript">showPopupContainer();</script><?php
    }
?>