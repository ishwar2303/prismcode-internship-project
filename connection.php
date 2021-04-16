<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "certification_system";


// $servername = "quizwit.cakcwgna7dgk.ap-south-1.rds.amazonaws.com";
// $username = "ishwar";
// $password = "qwerty1234";
// $dbname = "certification_system";



$conn = new mysqli($servername,$username,$password,$dbname);
if($conn->connect_error){
	die(header('Location: error_page.php'));
}

?>
