<?php 
	$act = isset($_GET['act'])?$_GET['act']:'check';
	
	switch ($act) {
		case 'check':
			require_once('Blockchain.php');
			$bc = new Blockchain();
			$bc->checkBlockchain();
			break;
		case 'show':
			require_once('Blockchain.php');
			$bc = new Blockchain();
			$bc->show();
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
		case 'detail':
			require_once('Blockchain.php');
			$bc = new Blockchain();

			$bc->detail();
			break;
		default:
			# code...
			break;
	}
 ?>