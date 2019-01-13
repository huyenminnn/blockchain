<?php 
	$act = isset($_GET['act'])?$_GET['act']:'check';
	
	switch ($act) {
		case 'check':
			require_once('Blockchain.php');
			$bc = new Blockchain();
			$bc->checkBlockchain();
			break;
		case 'create':
			require_once('Blockchain.php');
			$bc = new Blockchain();
			$bc->create();
			break;
		case 'add':
			require_once('Blockchain.php');
			$bc = new Blockchain();
			$bc->addBlock();
			break;
		case 'addTx':
			require_once('Transaction.php');
			$tx = new Transaction();
			$tx->newTx();
			break;
		default:
			# code...
			break;
	}
 ?>