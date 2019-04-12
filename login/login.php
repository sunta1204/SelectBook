<?php 
	session_start();
	include '../connect.php';

	$stmt=$pdo->prepare("SELECT * FROM employee WHERE e_id = ? AND e_tel = ?");
	$stmt->bindParam(1,$_POST['e_id']);
	$stmt->bindParam(2,$_POST['e_tel']);
	$stmt->execute();
	$user=$stmt->fetch();

	if (!empty($user)) { 

		$_SESSION["e_id"] = $user["e_id"];
		$_SESSION["e_name"] = $user["e_name"];
		
		
		setcookie('login_success',1,time()+5,'/');
		echo "<script type='text/javascript'> window.location.href = '../employee/employee_home.php';</script>";
		
	} else {
		setcookie('login_error',1,time()+5,'/');
		echo "<script type='text/javascript'> window.location.href = '../index.php';</script>";
	}
?>