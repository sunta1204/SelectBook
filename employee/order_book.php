<?php 
	session_start();
	include '../connect.php';

	date_default_timezone_set('Asia/Bangkok');
	$date = date('d/m/Y');

	$stmt=$pdo->prepare("INSERT INTO orders (b_id,p_id,o_qty,o_price,o_total,o_date) VALUES (?,?,?,?,?,?)");
	$stmt->bindParam(1,$_POST['b_id']);
	$stmt->bindParam(2,$_POST['p_id']);
	$stmt->bindParam(3,$_POST['o_qty']);
	$stmt->bindParam(4,$_POST['o_price']);
	$stmt->bindParam(5,$_POST['o_total']);
	$stmt->bindParam(6,$date);
	$stmt->execute();
	$rowCount=$stmt->rowcount();

	$stmt2=$pdo->prepare("UPDATE book SET b_stock = b_stock + ? WHERE b_id = ?");
	$stmt2->bindParam(1,$_POST['o_qty']);
	$stmt2->bindParam(2,$_POST['b_id']);
	$stmt2->execute();
	$rowCount2=$stmt2->rowcount();

	if ($rowCount2 > 0 ) {
		setcookie('order_book_success',1,time()+5,'/');
		echo "<script>window.location.href='employee_home.php'</script>";
	} else {
		setcookie('order_book_error',1,time()+5,'/');
		echo "<script>window.location.href='employee_home.php'</script>";
	}

?>