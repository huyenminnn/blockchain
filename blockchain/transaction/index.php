<?php 
	
	include_once('addTx.php');
	include_once('db_connect.php');
	$obj = new Connection();
	$con = $obj->connn;
	if (isset($_POST['sb'])) {
		$sql = "INSERT INTO transactions (data,isValid) VALUES ('".$_POST['data']."',0)";
		$result = $con->query($sql);
	}
 ?>