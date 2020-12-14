<?php 
	session_start();
	if(isset($_POST['ques']) && isset($_POST['ans'])){
		$key = $_POST['ques'];
		$_SESSION['ANSWER'][$key] = $_POST['ans'];
	}
	if(isset($_POST['ques']) && isset($_POST['uncheck'])){
		$key = $_POST['ques'];
		$_SESSION['ANSWER'][$key] = 0;
	}
	if(isset($_POST['ques']) && isset($_POST['review'])){
		$key = $_POST['ques'];
		$_SESSION['REVIEW'][$key] = 1;
	}
	if(isset($_POST['ques']) && isset($_POST['removeReview'])){
		$key = $_POST['ques'];
		$_SESSION['REVIEW'][$key] = 0;
	}
?>