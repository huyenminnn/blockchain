<?php 
	include_once('db_connect.php');
	$obj = new Connection();
	$con = $obj->connn;
	$id = $_GET['id'];
	$sql = "SELECT * FROM blocks WHERE height=".$id;
	$result = $con->query($sql)->fetch_assoc();
	if (json_decode($result['data'])==null) {
		echo "<p>".$result['data']."</p>";
	} else{
		$data = json_decode($result['data']);

		$res = '<p>';
		foreach ($data as $key => $value) {
			$res .= "Transaction ".$value->id.": ".$value->data."</br>";
		}
		$res .= "</p>";
		echo $res;
	}
	
 ?>