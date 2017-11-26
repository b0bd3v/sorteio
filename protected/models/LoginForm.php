<?php

class LoginForm extends CFormModel
{
	public $login;
	public $senha;
	private $_identity;

	public function rules()
	{
		return array(
			array('login, senha', 'required'),
			array('senha', 'autenticar'),
		);
	}

	public function autenticar($attribute,$params)
	{
		if(!$this->hasErrors())
		{
			$this->_identity=new UserIdentity($this->login,$this->senha);
			if(!$this->_identity->authenticate())
				$this->addError('senha','Incorrect username or password.');
		}
	}

	public function login()
	{
		if($this->_identity===null)
		{
			$this->_identity= new UserIdentity($this->login,$this->senha);
			$this->_identity->authenticate();
		}
		if($this->_identity->errorCode===UserIdentity::ERROR_NONE)
		{
			Yii::app()->user->login($this->_identity);
			return true;
		}
		else
			return false;
	}
}
