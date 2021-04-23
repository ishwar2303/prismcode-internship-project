<?php 
    require_once('connection.php');
    require_once('middleware.php');

    class response{
        public $success;
        public $error;
        public $data;

        function send_response(){
            print_r(json_encode($this));
        }
    }

    $res_obj = new response();
    $res_obj->success = false;
    $res_obj->error = '';
    $res_obj->data = '';

    if(isset($_POST['certificate']) && isset($_POST['email'])){
        $email = cleanInput($_POST['email']);
        if($email == ''){
            $res_obj->error = 'E-mail required';
            $res_obj->send_response();
            return;
        }
        if(!emailValidation($email)){
            $res_obj->error = 'Invalid E-mail';
            $res_obj->send_response();
            return;
        }
        $sql = "SELECT * FROM certifications WHERE email='$email' ORDER BY quiz_name";
        $result = $conn->query($sql);
        if($result->num_rows > 0){
            $certificates = array();
            while($row = $result->fetch_assoc()){
                array_push($certificates, $row);
            }
            $res_obj->data = $certificates;
            $res_obj->success = true;
            $res_obj->send_response();
            return;
        }
        else{
            $res_obj->error = 'No certificates were found';
            $res_obj->send_response();
            return;
        }
    }
    else{
        $res_obj->error = 'Index not set';
        $res_obj->send_response();
        return;
    }

?>