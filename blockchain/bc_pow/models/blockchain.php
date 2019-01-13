<?php 
	/**
	 * 
	 */
	include_once('db_connect.php');
	class BlockModel
	{
		var $conn;
		function __construct(){
			$object=new Connection();
			$this->conn=$object->connn;
		}
		
		function getAll(){
			$data = array();
			$sql = "SELECT * FROM blocks";
			$result = $this->conn->query($sql);
			while($row = $result->fetch_assoc()){
				$data[] = $row;
			}
			return $data;
		}

		function getLastHeight(){
			$sql = "SELECT COUNT(*) FROM blocks";
			$result = $this->conn->query($sql);
			$data = $result->fetch_assoc();
			return intval($data['COUNT(*)']);
		}

		function getLastBlock(){
			$lh = $this->getLastHeight() - 1;
			$sql = "SELECT * FROM blocks WHERE height=".$lh;
			$result = $this->conn->query($sql);
			$data = $result->fetch_assoc();
			return $data;
		}

		function insert($data){
			$sql = "INSERT INTO blocks (height,preHash,hash,nonce,timest,data) VALUES (".$data->height.",'".$data->preHash."','".$data->hash."',".$data->nonce.",'".$data->timestamp."','".$data->data."')";
			$result = $this->conn->query($sql);
			return $result;
		}
	}
 ?>