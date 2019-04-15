<?php

session_start();
include '../../connect.php';

date_default_timezone_set('Asia/Bangkok');
	$date = date('d/m/Y');

  $Total = 0;
  $SumTotal = 0;

  $stmt=$pdo->prepare("INSERT INTO sale (c_id , e_id , s_date) VALUES (?,?,?)");
  $stmt->bindParam(1,$_POST['c_id']);
  $stmt->bindParam(2,$_SESSION['e_id']);
  $stmt->bindParam(3,$date);
  $stmt->execute();

  $sale_id = $pdo->lastInsertId();

  for($i=0;$i<=(int)$_SESSION["intLine"];$i++)
  {
	  if($_SESSION["strBID"][$i] != "")
	  {
	  		$stmt2=$pdo->prepare("INSERT INTO sale_detail (o_id , b_id , qty) VALUES (?,?,?)");
			$stmt2->bindParam(1,$sale_id);
			$stmt2->bindParam(2,$_SESSION['strBID'][$i]);
			$stmt2->bindParam(3,$_SESSION["strQty"][$i]);
			$stmt2->execute();
			

			$qty = $_SESSION["strQty"][$i];
			$id = $_SESSION['strBID'][$i];

			$stmt3=$pdo->prepare("UPDATE book SET b_stock = b_stock - ? WHERE b_id = ?");
			$stmt3->bindParam(1,$qty);
			$stmt3->bindParam(2,$id);
			$stmt3->execute();

			$rowCount=$stmt3->rowcount();

	  }
  }
  


 	 if ($rowCount > 0 ) {
 	 		unset($_SESSION['strBID']);
 	 		unset($_SESSION['intLine']);
 	 		unset($_SESSION['strQty']);
			setcookie('sale_book_success',1,time()+5,'/');
			echo "<script>window.location.href='view_order.php?sale_id=$sale_id'</script>";
		} else {
			setcookie('sale_book_error',1,time()+5,'/');
			echo "<script>window.location.href='../employee_home.php'</script>";
	}
?>