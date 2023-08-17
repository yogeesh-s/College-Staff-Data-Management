<!DOCTYPE html>
<html>
<head>
	<title>Non Teaching Staff Data Add</title>
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
			border: #f2709c double 1px;
			border-radius: 20px 0px 20px 0px;

		}
		.heading{
			padding: 5px;
			margin: 0px;
			background: linear-gradient(90deg, #f2709c 0%, #ff9472 100%,#f2709c);
			color: #fff;	
			font-weight: bold;
			font-size: 24px;
			text-align: center;
			border-radius: 20px 0px 0px 0px;
		}
		.box a{
			background: linear-gradient(to right, #f2709c, #ff9472);
			color: #fff;
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
			<div class="heading"> NON TEACHING STAFF DATA</div>
			<br><br>
			<center>
				<a href="complete_data_nonteaching.php">COMPLETE DATA</a>
				<a href="service_data_fetch_nonteaching.php">SERVICE DATA</a>
				<a href="department_exam_data_nonteaching.php">DEPARTMENT EXAM DATA</a><br><br><br><br>
				<a href="award_data_nonteaching.php">AWARDS</a>
				<a href="experience_data_nonteaching.php">EXPERIENCE DATA</a><br><br><br>
			</center>
			
		</div>
		<br>
	</div>
<?php include 'footer.php' ?>
</body>
</html>