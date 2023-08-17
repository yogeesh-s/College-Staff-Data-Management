<!DOCTYPE html>
<html>
<head>
	<title>Details of User</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<script type="text/javascript" src="js/jquery-3.6.0.min.js"></script>
	<?php 
		include 'connection.php'; 
	?>
	</script>
	<style>
		.box{
			background: fff;
			font-size: 16px;
			padding: 20px;
			border: 1.5px solid #9D9D9D;
			margin: auto;
			width: 400px;
			border-radius:10px;
			box-shadow: 3px 3px 3px;
			text-align: center;
		}
		.box ul{
			padding-left: 20px;
		}
		.box li{
			padding: 5px;
			list-style-type: none;
		}
	</style>
</head>
<body>
	<div class="header">
		<h1>GOVERNMENT FIRST GRADE COLLEGE</h1>
		<p>BAPUJI NAGARA, SHIMOGA 577201</p>
	</div>
	<?php include 'header.php' ?>
	<h2 align="center">About Us</h2>
	<br>
	<div class="box">
		This Project is Developed By III Year BCA Students.
		<br>
		<br>
		Under Guidance of Vanishree K S Assistant Professor.
		<br>
		<br>
		<h3>Our Team Members are </h3>
		<br>
		<ul>
			<li>Yogeesh S</li>
			<li>Hemanth J M</li>
			<li>Yuvaraj A</li>
			<li>Ranjitha R</li>
			<li>Ramya R</li>
		</ul>
	</div>
	<?php include 'footer.php' ?>
</body>
</html>