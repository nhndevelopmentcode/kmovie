<?php
	require_once ('header.php');
	
	
	// login process
	if (isset($_GET['btn-login'])) {
		
		// assign post value to variable
		$username = trim($_GET['username']);
		$password = trim($_GET['password']);
		
		// create new user info and assign value to pass as param
		$obj = new userinfo();
		$obj->setUserName($username);
		$obj->setPassword($password);
		
		// instantiate uesr business logic
		$userbol = new userbol();
		$userid = $userbol->getUserByUserCriteria($obj);
		
		if (!empty($userid)) {
			session_start();
			$_SESSION['user_id'] = $userid;
			$_SESSION['username'] = $username;
			header("Location: index.php");
		}else{
			$error = "User name or Password does not exist.";
		}
	}
?>
<div class="signin-form">
	<div class="container">
		<form class="form-signin shs-login" method="get" name="login" id="login-form">

			<h2 class="form-signin-heading">Log In</h2>
			<hr/>

				<div id="error">
				<?php
					if(isset($error))
				{  ?>
				<div class="alert alert-danger"> 
				<span class="glyphicon glyphicon-info-sign"></span> &nbsp; <?php echo $error.' !'; ?> 
				</div>
				<?php 
				} ?>
				</div>

				<div class="form-group">
				<input type="text" class="form-control" placeholder="User Name" name="username" id="user_name" value="<?php if(isset($error)){echo $username;} ?>"/>
				<span id="check-e"></span>
				</div>

				<div class="form-group">
				<input type="password" class="form-control" placeholder="Password" name="password" id="password" value="<?php if(isset($error)){echo $password;} ?>"/>
				</div>
			<hr />

			<div class="form-group">
				<button type="submit" class="btn btn-default" name="btn-login" id="btn-login">
					<span class="glyphicon glyphicon-log-in"></span> &nbsp; Sign In
				</button> 
			</div>  
		</form>

	</div>
    
</div>