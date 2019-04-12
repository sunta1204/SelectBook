<?php 
	session_start();
	include '../connect.php';

	$stmt=$pdo->prepare("UPDATE employee SET e_name = ? , e_surname = ? , e_address = ?,e_district= ? ,e_province =?, e_postcode = ?, e_tel = ? WHERE e_id = ?");
	$stmt->bindParam(1,$_POST['e_name']);
	$stmt->bindParam(2,$_POST['e_surname']);
	$stmt->bindParam(3,$_POST['e_address']);
	$stmt->bindParam(4,$_POST['e_district']);
	$stmt->bindParam(5,$_POST['e_province']);
	$stmt->bindParam(6,$_POST['e_postcode']);
	$stmt->bindParam(7,$_POST['e_tel']);
	$stmt->bindParam(8,$_POST['e_id']);
	$stmt->execute();
	$rowCount = $stmt->rowcount();

	if ($rowCount > 0) {
		setcookie('edit_profile_success',1,time()+5,'/');
		echo "<script>window.location.href='employee_home.php'</script>";
	} else {
		setcookie('edit_profile_error',1,time()+5,'/');
		echo "<script>window.location.href='employee_home.php'</script>";
	}
?>