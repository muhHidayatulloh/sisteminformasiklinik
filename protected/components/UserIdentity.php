<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class UserIdentity extends CUserIdentity
{
	/**
	 * Authenticates a user.
	 * The example implementation makes sure if the username and password
	 * are both 'demo'.
	 * In practical applications, this should be changed to authenticate
	 * against some persistent user identity storage (e.g. database).
	 * @return boolean whether authentication succeeds.
	 */

	// private $_id_user;
	// private $_role;
	private $_id;

	public function authenticate()
	{

		$record=User::model()->findByAttributes(array('username'=>$this->username));
        if($record===null)
            $this->errorCode=self::ERROR_USERNAME_INVALID;
        else if(!CPasswordHelper::verifyPassword($this->password,$record->password))
            $this->errorCode=self::ERROR_PASSWORD_INVALID;
        else
        {
            $this->_id=$record->id_user;
			$this->username = $record->username;
            $this->setState('level', $record->level);
            $this->errorCode=self::ERROR_NONE;
        }
        return !$this->errorCode;

		// $users=array(
		// 	// username => password
		// 	'demo'=>'demo',
		// 	'admin'=>'admin',
		// );
		// if(!isset($users[$this->username]))
		// 	$this->errorCode=self::ERROR_USERNAME_INVALID;
		// elseif($users[$this->username]!==$this->password)
		// 	$this->errorCode=self::ERROR_PASSWORD_INVALID;
		// else
		// 	$this->errorCode=self::ERROR_NONE;
		// return !$this->errorCode;

		// $username = strtolower($this->username);
		// $password = Ex::enkrip($this->password);

		// // var_dump($username);
		// // var_dump($password);
		// $users = User::model()->find('LOWER(username)=?', array($username));

		// if($users===null) {
		// 	$this->errorCode=self::ERROR_USERNAME_INVALID;
		// } else if ($users->password != $password){
		// 	// var_dump($users);
			
		// 	$this->errorCode = self::ERROR_PASSWORD_INVALID;
		// } else {
		// 	// validasi berhasil
		// 	$this->_id_user = $users->id_user;
		// 	$this->username = $users->username;
		// 	$this->setState('id_role', $users->id_role);
		// 	$this->errorCode = self::ERROR_NONE;
		// }
		// 	return $this->errorCode == self::ERROR_NONE;
		// }
		
		// public function getId()
		// {
		// 	return $this->_id_user;
		// }
	}

	public function getId()
	{
		return $this->_id;
	}
	
}