<?php 
	session_start();
	include '../connect.php';

	$stmt=$pdo->prepare("UPDATE book SET b_name = ? , b_author = ? , b_price = ? , b_stock = ? WHERE b_id = ?");
	$stmt->bindParam(1,$_POST['b_name']);
	$stmt->bindParam(2,$_POST['b_author']);
	$stmt->bindParam(3,$_POST['b_price']);
	$stmt->bindParam(4,$_POST['b_stock']);
	$stmt->bindParam(5,$_POST['b_id']);
	$stmt->execute();
	$rowCount = $stmt->rowcount();

	if ($rowCount > 0) {
		setcookie('edit_book_success',1,time()+5,'/');
		echo "<script>window.location.href='employee_home.php'</script>";
	}else {
		setcookie('edit_book_error',1,time()+5,'/');
		echo "<script>window.location.href='employee_home.php'</script>";
	}

?>