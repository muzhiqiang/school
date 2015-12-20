<?php

require './model/accountItem.php';

class account {

	private $item_ ;

	public function __construct() {
		
		$this->item_ = new accountItem();
	}

	public function loginAction() {

		$this->item_->load($_POST['Account']);
		if($_POST['Type'] !== $this->item_->type) {
			throw new Exception('Type error');
		}
		if($_POST['Password'] !== $this->item_->password) {
			throw new Exception('Password wrong');
		}

   		$_SESSION['Account'] = $_POST['Account'];   
		return ;
	}

	public function registAction() {
		
		try {
			$this->item_->load($_POST['Account']);
		}
		catch(Exception $e) {
			if($e->getMessage() == 'account doesn\'t exist') {
				$this->item_->password = $_POST['Password'];
				$this->item_->type = $_POST['Type'];
				$this->item_->save();
				return ;
			}
			else {
				throw $e;
			}
		}
		throw new Exception('account has existed');
	}

	public function logoutAction() {

		unset($_SESSION['Account']);
		exit();
	} 

	public function updateAction() {
		
		$this->item_->account = $_SESSION['Account'];
		$this->item_->password = $_POST['Password'];
		$this->item_->update();
	}	

	public function deleteAction() {

		$this->item_->account = $_SESSION['Account'];
		$this->item_->delete();
		unset($_SESSION[$_POST['Account']]);
	}		


}

?>
