<?php 
class Connection{
	var $connn;// thuộc tính của lớp Connection

	function __construct(){
		$servername="localhost";
		$username="root";
		$password="";
		$dbname="blockchain";

		$this->connn =  new mysqli($servername,$username,$password,$dbname);
		$this->connn->set_charset("utf8");


		if($this->connn->connect_error){
			die("Connection failed:".$this->connn->connect_error);

		}
	}
}
?>