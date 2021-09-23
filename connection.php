<?php

date_default_timezone_set("Asia/Kolkata");

$servername = "localhost:3306";
$username = "root";
$password = "2303";
$dbname = "certification_system";


$conn = new mysqli($servername,$username,$password,$dbname);
if($conn->connect_error){
	die(header('Location: error_page.php'));
}

?>
