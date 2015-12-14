<?php

include './model/accountItem.php';

class account {

	private $params_ ;
	private $item_ ;

	public function __construct($params) {
		
		$this->params_ = $params;
		$this->item_ = new accountItem();
	}

	public function loginAction() {

		$this->item_->load($this->params_['account']);
		if($this->params_['type'] !== $this->item_->type) {
			throw new Exception('Type error');
		}
		if($this->params_['password'] !== $this->item_->password) {
			throw new Exception('Password wrong');
		}
		return true;
	}

	public function registAction() {
		
		try {
			$this->item_->load($this->params_['account']);
		}
		catch(Exception $e) {
			if($e->getMessage() == 'account doesn\'t exist') {
				$this->item_->password = $this->params_['password'];
				$this->item_->type = $this->params_['type'];
				$this->item_->save();
				return;
			}
			else {
				throw $e;
			}
		}
		throw new Exception('account has existed');
	}

	public function updateAction() {
		
		$this->item_->account = $this->params_['account'];
		$this->item_->password = $this->params_['password'];
		$this->item_->update();
	}	

	public function deleteAction() {

		$this->item_->account = $this->params_['account'];
		$this->item_->delete();
	}		


}

?>
