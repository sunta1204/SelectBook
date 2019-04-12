<?php 
	session_start();
	include '../connect.php';

	$stmt=$pdo->prepare("DELETE FROM book WHERE b_id = ?");
	$stmt->bindParam(1,$_POST['b_id']);
	$stmt->execute();
	$rowCount = $stmt->rowcount();

	if ($rowCount > 0) {
		setcookie('delete_book_success',1,time()+5,'/');
		echo "<script> window.location.href='employee_home.php' </script>";
	}else {
		setcookie('delete_book_error',1,time()+5,'/');
		echo "<script> window.location.href='employee_home.php' </script>";
	}
?>