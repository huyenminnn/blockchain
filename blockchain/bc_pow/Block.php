<?php 
	/**
	 * 
	 */
	require_once('POW.php');
	include_once('Transaction.php');
	class Block
	{
		var $height =0;
		var $preHash;
		var $hash;
		var $nonce;
		var $timestamp;
		var $data;
		
		function __construct(){
			date_default_timezone_set('Asia/Ho_Chi_Minh');
			$this->timestamp = strval(time());
			$this->nonce = 0;
			$this->hash= '';
		}

		function newBlock($height, $preHash){

			$newBlock = new Block();
			$newBlock->height = intval($height);
			$newBlock->preHash = $preHash;

			// lấy data
			$checkTx = $this->random();
			if (!$checkTx) {
				return false;   //neu ko con trans
			} else{             //neu con trans thi tao block
				$newBlock->data = $checkTx;
				$bl = json_encode($newBlock);
				$data = new ProofOfWork();
				$resutl = $data->pow($bl);
				return $resutl;
			}
		}

		function genesisBlock($height, $preHash,$data){
			$newBlock = new Block();
			$newBlock->height = intval($height);
			$newBlock->preHash = $preHash;
			$newBlock->data = $data;
			$bl = json_encode($newBlock);
			$data = new ProofOfWork();
			$resutl = $data->powGen($bl);
			return $resutl;
		}

		function random(){
			$tx = new Transaction();
			$txs = $tx->list();
			// neu co trans
			if ($txs != null) {
				$data = array();
				$numTx = rand(1,sizeof($txs));
				if ($numTx == 1) {
					$data[0] = array_rand($txs, $numTx);
				} else $data = array_rand($txs, $numTx);
				
				$result = array();
				for ($i=0; $i < count($data); $i++) {
					$result[] = $txs[$data[$i]];
				}
				return json_encode($result);
			} else {
				return false;   //neu ko con trans
			}
			
			
		}

		function getIdOfTx($data){
			
		}
	}
 ?>