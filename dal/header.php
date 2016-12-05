<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv='cache-control' content='no-cache'>
	<meta http-equiv='cache-control' content='no-Store'>
	<meta http-equiv='expires' content='Mon, 22 Jul 2002 11:12:01 GMT'>
	<meta http-equiv="Pragma" content="no-cache">
    <meta name="description" content="">
    <meta name="author" content="">
	
    <title>Shwe Hnin Si</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/freelancer.min.css" rel="stylesheet">
	<link href="css/style.css" rel="stylesheet">
	
	<!-- JavaScript -->
	<script src="js/jquery.js"></script>
    <script src="js/core.js"></script>
	<script src="js/jquery-1.10.2.js"></script>
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery-ui.js"></script>
	<script src="js/jquery.validate.min.js"></script>
	<script src="js/jquery.fancybox.js?v=2.1.5"></script>
    <script src="js/jquery.mobile.custom.js"></script>
    <script src="js/jquery.mobile.custom.min.js"></script>
</head>

<?php
require_once('library/reference.php');
require_once ('classloader.php');
session_start();

$moviebol = new moviebol();
$result = $moviebol->selectSeriesTypes();

/* header("Cache-Control: no-cache, no-store, must-revalidate"); // HTTP 1.1.
header("Pragma: no-cache"); */ // HTTP 1.0.
?>

<!-- header -->
<div class="preview_heading">

  <div class="preview_logo">
	<img src="img/logo.png" class="img-logo"></img>
	<a href="">Shwe Hnin Si</a>
	<?php if(isset($_SESSION['user_id'])){ ?>
	<a href="logout.php" class="glyphicon glyphicon-log-out"></a>
	<?php } 
	 if (isset($result)){
	
	?>
	
	<span class="nav-open">&nbsp;</span>
	<div id="mySidenav" class="sidenav">
	  <a href="javascript:void(0)" class="closebtn">&times;</a>
	  <li class="nv-type" id="mvt-all">All</li>
	  <?php
	  while($row = mysql_fetch_array($result))
		  {
			echo '<li class="nv-type" id="mvt-'.$row['serie'].'">'. $row['serietype'].'</li>';  
		  } 
	  ?>
		<li>&nbsp;</li>
	</div>
	<?php 
	 }
	?>
  </div>
  
  <div></div>
 </div>

<body class="full-screen-preview dark-black-bg">