<?php

class Userinfo {

	/* Member variables */
	private $userid;
	private $username;
	private $password;
	private $phoneno;
	

	/** Get user id */
	public function setUserId($userid){
		$this-> userid = userid;
	}

	/** Set user id */
	public function getUserId() {
		return $this-> userid;
	}

	/** Set user name */
	public function setUserName($username) { 
		$this-> username = $username;
	}

	/** Get user name */
	public function getUserName() {
		return $this->username;
	}
	
	/** Set password */
	public function setPassword($password) { 
		$this->password = $password;
	}

	/** Get password */
	public function getPassword() {
		return $this->password;
	}
	
	/** Set user's phone no */
	public function setPhoneNo($phoneno) { 
		$this->phoneno = $phoneno;
	}

	/** Get user's phone no */
	public function getPhoneNo() {
		return $this->$phoneno;
	}

}
?>