<?php 
	session_start();
	include '../connect.php';

	$stmt=$pdo->prepare("INSERT INTO book (b_id,b_name,b_author,b_price,b_stock) VALUES (?,?,?,?,?)");
	$stmt->bindParam(1,$_POST['b_id']);
	$stmt->bindParam(2,$_POST['b_name']);
	$stmt->bindParam(3,$_POST['b_author']);
	$stmt->bindParam(4,$_POST['b_price']);
	$stmt->bindParam(5,$_POST['b_stock']);
	$stmt->execute();
	$rowCount=$stmt->rowcount();

	if ($rowCount > 0) {
		setcookie('add_book_success',1,time()+5,'/');
		echo "<script> window.location.href= 'employee_home.php' </script>";
	} else {
		setcookie('add_book_error',1,time()+5,'/');
		echo "<script> window.location.href= 'employee_home.php' </script>";
	}
?>