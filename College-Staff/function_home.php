<!DOCTYPE html>
<html>
<head>
	<title>Function Information</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<style>
		@import url('https://fonts.googleapis.com/css2?family=Ubuntu');
		@import url('https://fonts.googleapis.com/css2?family=Roboto');
		*{
			padding:0;	
			margin:0;
			text-decoration: none;
		}

		body{
			padding: 0% 3% 0% 3%;
			font-family: 'Roboto', sans-serif;
			color: #444444;

		}
		.header{
			text-align: center;
		}
		.header h1{
			margin-top: 5px;
			font-family: 'Ubuntu', sans-serif;
		}
		.container{
			width: 80%;
			margin: auto;
			padding: 20px;
		}
		.box{
			border: #00d2ff double 1px;
			border-radius: 20px 0px 20px 0px;

		}
		.heading{
			padding: 5px;
			margin: 0px;
			background: linear-gradient(90deg, #00d2ff 0%, #3a47d5 100%);
			color: #fff;	
			font-weight: bold;
			font-size: 24px;
			text-align: center;
			border-radius: 20px 0px 0px 0px;
		}
		.box a{
			background: linear-gradient(90deg, #00C9FF 0%, #92FE9D 100%);
			color: #606060;
			font-weight: bold;
			padding: 20px;
			margin: 10px;
			border-radius: 25px 5px 25px 0px; 
			text-shadow: none;
		}
	</style>
</head>
<body>
	<div class="header">
		<h1>GOVERNMENT FIRST GRADE COLLEGE</h1>
		<p>BAPUJI NAGARA, SHIMOGA 577201</p>
	</div>
	<?php include 'header.php' ?>
	<div class="container">
		<div class="box">
			<div class="heading"> FUNCTION DATA</div>
			<br><br>
			<center>
				<a href="function_information.php">ADD FUNCTION DATA</a>
				<a href="get_function_information.php">GET FUNCTION DATA</a>
				<a href="add_function_master.php">ADD FUNCTION MASTER</a><br><br><br>

			</center>
		</div>
	</div>
	<?php include 'footer.php' ?>
</body>
</html>