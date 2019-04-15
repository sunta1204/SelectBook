<?php
ob_start();
session_start();
include '../../connect.php';
	
if(!isset($_SESSION["intLine"]))
{

	 $_SESSION["intLine"] = 0;
	 $_SESSION["strBID"][0] = $_GET["b_id"];
	 $_SESSION["strQty"][0] = 1;

	 echo "<script>window.location.href='show.php'</script>";
}
else
{
	
	$key = array_search($_GET["b_id"], $_SESSION["strBID"]);
	if((string)$key != "")
	{
		 $_SESSION["strQty"][$key] = $_SESSION["strQty"][$key] + 1;
	}
	else
	{
		
		 $_SESSION["intLine"] = $_SESSION["intLine"] + 1;
		 $intNewLine = $_SESSION["intLine"];
		 $_SESSION["strBID"][$intNewLine] = $_GET["b_id"];
		 $_SESSION["strQty"][$intNewLine] = 1;
	}
	echo "<script>window.location.href='show.php'</script>";

}
?>