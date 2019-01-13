<?php 
	include_once('db_connect.php');
	$obj = new Connection();
	$con = $obj->connn;
	$data = array();
	$sql = "SELECT * FROM blocks";
	$result = $con->query($sql);
	while($row = $result->fetch_assoc()){
		$data[] = $row;
	}
	include_once('bc.php');
 ?>