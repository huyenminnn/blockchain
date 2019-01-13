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
		function list(){
			return $this->txModel->getAll();
		}

		function update($data){
			$this->txModel->update($data);
		}
	}
 ?>