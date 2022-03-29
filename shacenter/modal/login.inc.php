<?php
include '../include/config.php';

if(isset($_POST['adminlogin'])){
	$username = sec($_POST['username']);
	$password = sec($_POST['password']);
	if(empty($username) || empty($password)){
		$_SESSION['empty'] = "خاڵەکان پر بکەوە";
		header('Location: ../index.php');
	}else{
		$passwordenc = hash('gost', $password);
		$AdminQuery = mysqli_query($db , "SELECT * FROM `admintable` WHERE `username` = '$username' AND `password` = '$passwordenc'");
		if(mysqli_num_rows($AdminQuery) == 1){
			while ($AdminRow = mysqli_fetch_assoc($AdminQuery)) {
				$_SESSION['adminid'] = $AdminRow['id'];
				if($username == 'Shadental'){
					header('Location: ../rec.php');
				}else{
					header('Location: ../dctors.php');
				}
			}
		}else{
			$_SESSION['empty'] = "ناو یان پاسورد خەلەتە";
		    header('Location: ../index.php');
		}
	}
}

?>