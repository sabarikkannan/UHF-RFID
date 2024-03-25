<?php
	$Write="<?php $" . "UIDresult=''; " . "echo $" . "UIDresult;" . " ?>";
	file_put_contents('UIDContainer.php',$Write);
?>

<!DOCTYPE html>
<html lang="en">
<html>
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta charset="utf-8">
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<script src="js/bootstrap.min.js"></script>
		<style>
		html {
			font-family: Arial;
			display: inline-block;
			margin: 0px auto;
			text-align: center;
		}

		ul.topnav {
			list-style-type: none;
			margin: auto;
			padding: 0;
			overflow: hidden;
			background-color: #4CAF50;
			width: 70%;
		}

		ul.topnav li {float: left;}

		ul.topnav li a {
			display: block;
			color: white;
			text-align: center;
			padding: 14px 16px;
			text-decoration: none;
		}

		ul.topnav li a:hover:not(.active) {background-color: #3e8e41;}

		ul.topnav li a.active {background-color: #333;}

		ul.topnav li.right {float: right;}

		@media screen and (max-width: 600px) {
			ul.topnav li.right, 
			ul.topnav li {float: none;}
		}
		
		img {
			display: block;
			margin-left: auto;
			margin-right: auto;

			.footer {
  			position: fixed;
  			bottom: 1;
			width: 200px;
			right: 0;
			padding: 10px;
			background-color: #f2f2f2;
			text-align: right;
			
		}
		</style>
		
		<title>Home : RFID ATTENDANCE SYSTEM JCE</title>
	</head>
	
	
	
	<body>
		<h2>ECE FINAL YEAR PROJECT</h2>
		<ul class="topnav">
			<li><a class="active" href="index.php">Home</a></li>
			<li><a href="user_data.php">Attendance Data</a></li>
			<!--<li><a href="registration.php">Registration</a></li>
			<li><a href="read tag.php">Read Tag ID</a></li>-->
		</ul>
		<br>
		<h3>Welcome to JCE ATTENDANCE</h3>
		
		<img src="jce.png" alt="" style="width:55%;">
		<div class="footer">BY</div>
		<div class="footer">S.KKANNAN</div>
		<div class="footer">V.MAGESH</div>
		<div class="footer">K.SELVAKRISHNAN</div>
		

	</body>
</html>
