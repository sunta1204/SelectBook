<?php
	ob_start();
	session_start();

	$Line = $_GET["Line"];
	$_SESSION["strBID"][$Line] = "";
	$_SESSION["strQty"][$Line] = "";

	echo "<script>window.location.href='show.php'</script>";
?>