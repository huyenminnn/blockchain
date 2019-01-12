<?php 
	/**
	 * 
	 */
	include_once('models/transaction.php');
	class Transaction
	{
		var $isValid;
		var $txModel;
		function __construct()
		{
			$this->isValid = 0;
			$this->txModel = new TransactionModel();
		}

		function newTx(){
			$data = isset($_POST['data'])?$_POST['data']:'';
			if ($data != '') {
				$tx['isValid'] = 0;
				$tx['data'] = $data;
				$result = $this->txModel->insert($tx);
				setcookie('msg','Successful!',time()+1);
			} else {
				setcookie('msg','Create fail!',time()+1);
			}
			header('location: ?act=show');
		}

		function list(){
			return $this->txModel->getAll();
		}

		function update($data){
			$this->txModel->update($data);
		}
	}
 ?>