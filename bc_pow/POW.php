<?php
include_once('Transaction.php');
	class ProofOfWork{
		var $target;
		var $nonce;
		var $hash;

		function __construct(){
			$this->target = 2;
		}
		// tra ve so nonce va ma hash cua block
		
		function powGen($b){
			$dataBl = json_decode($b);
			$i = 0;
			$hashBl = '';

			while (!$i) {
				$dataBl->nonce++;
				$prepareData = $dataBl->height.$dataBl->preHash.$dataBl->timestamp.$dataBl->data.$dataBl->nonce;
				$hashBl = hash('sha256', $prepareData);
				$i = $this->compare($hashBl);
			}
			
			$dataBl->hash = $hashBl;
			return json_encode($dataBl);
		}
		function pow($b){

			$dataBl = json_decode($b);
			$data = json_decode($dataBl->data);
			$dataAfter = '';
			foreach ($data as $value) {
				$dataAfter .= $value->data;
			}
			$i = 0;
			$hashBl = '';

			while (!$i) {
				$dataBl->nonce++;
				$prepareData = $dataBl->height.$dataBl->preHash.$dataBl->timestamp.$dataAfter.$dataBl->nonce;
				$hashBl = hash('sha256', $prepareData);
				$i = $this->compare($hashBl);
			}
			$tx = new Transaction();
			foreach ($data as $value) {
				$tx->update($value->id);
			}
			
			$dataBl->hash = $hashBl;
			return json_encode($dataBl);
		}

		function compare($str){
			$i = 1;
			for ($k=0; $k < $this->target; $k++) {
				if ($str[$k]!=="0") {
					$i = 0;
				}
			}
			return $i;
		}
	}
 ?>