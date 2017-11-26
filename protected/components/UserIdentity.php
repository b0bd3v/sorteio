<?php
class UserIdentity extends CUserIdentity
{
	public function authenticate()
	{
		$data = Usuario::model()->findByAttributes(array('login' => $this->username));
		$user[$data->login] = $data->senha;
		if(!isset($user[$this->username]))
			$this->errorCode=self::ERROR_USERNAME_INVALID;
		elseif($user[$this->username]!==$this->password)
			$this->errorCode=self::ERROR_PASSWORD_INVALID;
		else
			$this->errorCode=self::ERROR_NONE;
		return !$this->errorCode;
	}
}