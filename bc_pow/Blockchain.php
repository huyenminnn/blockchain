<?php 
	/**
	 * 
	 */
	include_once('models/blockchain.php');
	include_once('Block.php');
	include_once('Transaction.php');
	define("genesisData", "Create genesis block.");
	class Blockchain 
	{	
		var $blocks;
		var $blockModel;
		function __construct(){
			$this->blockModel = new BlockModel();
			$this->blocks = $this->blockModel->getAll();
		}

		function checkBlockchain(){
			$data = $this->blocks;

			if (!count($data)) {
				include_once('views/createBC.php');
			} else {
				include_once('views/bc.php');
			}
		}

		function show(){
			$data = $this->blocks;
			include_once('views/bc.php');
		}

		function create(){
			$block = new Block();
			$newBlock = json_decode($block->genesisBlock(0,'',genesisData));
			$this->blockModel->insert($newBlock);
			$this->mine();
			$data = $this->blockModel->getAll();
			header('location: ?act=show');
		}

		function getLastBlock(){
			return $this->blockModel->getLastBlock();
			
		}
		function addBlock(){
			$lastBlock = $this->getLastBlock();
			$preHash = $lastBlock['hash'];
			$height = $lastBlock['height'] + 1; 
			$block = new Block();
			$bl = $block->newBlock($height,$preHash);
			if ($bl!=false) {
				$newBlock = json_decode($bl);
				$this->blockModel->insert($newBlock);
			} 
			
		}

		function mine(){
			$current_time_start = date_create('now', timezone_open('Asia/Ho_Chi_Minh'));
			$current_timestamp_start = date_timestamp_get($current_time_start);
			
			while (1) {
			    $current_time_end = date_create('now', timezone_open('Asia/Ho_Chi_Minh'));
			    $current_timestamp_end = date_timestamp_get($current_time_end);

			    if(($current_timestamp_end)-($current_timestamp_start) > 5){
			        $current_time_start = date_create('now', timezone_open('Asia/Ho_Chi_Minh'));
			        $current_timestamp_start = date_timestamp_get($current_time_start);

			        $this->addBlock();
			    }
			}
		}

		function detail(){
			$id = $_GET['id'];
			$result = $this->blockModel->find($id);
			$data = json_decode($result['data']);
			$res = '<p>';
			foreach ($data as $key => $value) {
				$res .= "Transaction ".$value->id.": ".$value->data."</br>";
			}
			$res .= "</p>";
			echo $res;
		}
	}
 ?>