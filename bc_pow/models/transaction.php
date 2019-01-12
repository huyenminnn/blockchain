<?php 
	/**
	 * 
	 */
	include_once('db_connect.php');
	
	class TransactionModel
	{
		
		var $conn;
		function __construct(){
			$object=new Connection();
			$this->conn=$object->connn;
		}
		
		function getAll(){
			$data = array();
			$sql = "SELECT * FROM transactions WHERE isValid=0";
			$result = $this->conn->query($sql);
			while($row = $result->fetch_assoc()){
				$data[] = $row;
			}
			return $data;
		}
		
		function update($data){
			$sql = "UPDATE transactions SET isValid=1 WHERE	id=".$data;
			// foreach ($data as $key => $value) {
			// 	$sql .= $value." OR id=";
			// }
			// $sql = rtrim($sql,'OR id=');
			$result = $this->conn->query($sql);
			return $result;
		}

		function insert($data){
			$sql = "INSERT INTO transactions (data,isValid) VALUES ('".$data['data']."',".$data['isValid'].")";
			$result = $this->conn->query($sql);
			return $result;
		}
	}
 ?>