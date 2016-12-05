<?php 
 class userbol {
	 
	function insertUser(userinfo $userinfo){
		$userdal = new userdal( );
		$result = $userdal->insertUser($userinfo);
		if ($result) {
			return $result;
		} else {
			die ( "Error in Business Logic of insert user." );
		}
	}
	
	function getUserByUserId($userid){
		$userdal = new userdal( );
		$result = $userdal->getUserByUserId($userid);
		if ($result) {
			return $result;
		} else {
			die ( "Error in Business Logic of get user." );
		}
	}
	
	function getUserByUserCriteria($criObj) {
		$userdal = new userdal( );
		$cri = ' AND';
		if(!empty($criObj->getUserName())){
			$cri .=  ' name = \''. mysql_escape_string($criObj->getUserName()) . '\'';
		}
		
		if(!empty($criObj->getPassword())){
			$cri .= ' AND password = \''. md5($criObj->getPassword()) . '\'';
		}
		
		$result = mysql_fetch_assoc($userdal->getUserByUserCriteria($cri));
		return $result['userid'];
	}
	
	public function UserLogout()
   {
        session_destroy();
        unset($_SESSION['user_session']);
        return true;
   }
 }
?>