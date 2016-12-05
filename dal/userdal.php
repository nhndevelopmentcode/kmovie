<?php 
 class userdal {
	 
	function insertUser(userinfo $userinfo){
		/* $userdal = new userdal();
		$result = $userdal->insertUser($userinfo);
		if ($result) {
			return $result;
		} else {
			die ( "Error in Business Logic of insert user." );
		} */
	}
	
	function getUserByUserId($userid){
		/* $userdal = new userdal( );
		$result = $userdal->getUserByUserId($userid);
		if ($result) {
			return $result;
		} else {
			die ( "Error in Business Logic of get user." );
		} */
	}
	
	function getUserByUserCriteria($cri) {		
		$title = mysql_escape_string($cri);
		$query = "SELECT userid FROM sys_user WHERE 1 = 1 ". $cri .";";
		$result = mysql_query($query);
		return $result;
	}
 }
?>