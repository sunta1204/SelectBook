<?php 
	session_start();
	include '../connect.php';

	date_default_timezone_set('Asia/Bangkok');
	$date = date('d/m/Y');

	$stmt2=$pdo->prepare("INSERT INTO book (b_name , b_author , b_price , b_stock ) VALUES (?,?,?,?)");
	$stmt2->bindParam(1,$_POST['b_name']);
	$stmt2->bindParam(2,$_POST['b_author']);
	$stmt2->bindParam(3,$_POST['o_price']);
	$stmt2->bindParam(4,$_POST['o_qty']);
	$stmt2->execute();
	$rowCount2=$stmt2->rowcount();

	$b_id = $pdo->lastInsertId();

	$stmt=$pdo->prepare("INSERT INTO orders (b_id,p_id,o_qty,o_price,o_total,o_date) VALUES (?,?,?,?,?,?)");
	$stmt->bindParam(1,$b_id);
	$stmt->bindParam(2,$_POST['p_id']);
	$stmt->bindParam(3,$_POST['o_qty']);
	$stmt->bindParam(4,$_POST['o_price']);
	$stmt->bindParam(5,$_POST['o_total']);
	$stmt->bindParam(6,$date);
	$stmt->execute();
	$rowCount=$stmt->rowcount();

	

	if ($rowCount > 0 ) {
		setcookie('order_book_success',1,time()+5,'/');
		echo "<script>window.location.href='employee_home.php'</script>";
	} else {
		setcookie('order_book_error',1,time()+5,'/');
		echo "<script>window.location.href='employee_home.php'</script>";
	}

?>