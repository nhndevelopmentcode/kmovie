<?php
session_start ();
session_destroy();
require_once("header.php");
?>

<div class="signin-form">
	<div class="container">
	<form class="shs-login">
	<h4 align="center">You have been logged out.</h4>
	<a align="center" href="index.php">Login Again</a>
	</form>
</div>