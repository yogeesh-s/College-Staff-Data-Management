<!DOCTYPE html>
<html>
<head>
	<title>Add Function Master</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<script type="text/javascript" src="js/jquery-3.6.0.min.js"></script>
	<?php 
		include 'connection.php'; 
		include 'functions.php';
	?>

</head>
<body>
	<div class="header">
		<h1>GOVERNMENT FIRST GRADE COLLEGE</h1>
		<p>BAPUJI NAGARA, SHIMOGA 577201</p>
	</div>
	<?php include 'header.php' ?>
	<h2 align="center">ADD FUNCTION MASTER</h2>
	<form action="" method="POST" enctype="multipart/form-data">
		<center>
			<table class="tab1">
				<tr>
					<td width="200px">FUNCTION MASTER NAME</td>
					<br>
					<td width="200px"><input type="text" name="category" ></td>
				</tr>
			</table>
		</center>
		<center>
			<br>
			<input class="sbtn" type="submit" name="save" id="sbtn" value="Save Data">
					&nbsp&nbsp&nbsp&nbsp
			<input class="wrnbtn" type="reset" name="add" id="add" value="Reset">
			<br>
		</center>
	</form>
	<?php 
		if(isset($_POST['save']))
		{
			$category = $_POST["category"];
			if(!empty($category)){
				$stmt = "INSERT INTO `function_master`( `CATEGORY_NAME`) VALUES ('".$category."')";
				$query = mysqli_query($conn,$stmt);
				echo "<script>alert('Function category added successfully.')</script>";
		        echo "<script> window.location.href = 'function_home.php'</script>"; 
			}
			
		}

	?>
	<style>
		.sbtn{
			background: #0d9e31;
			color: white;
			padding: 12px;
			font-size: 14px;
			font-family: 'Roboto',sans-serif;
			border-radius: 5px;
			text-shadow: 2px 2px 5px black;
			text-align: center;
			border: none;
		}

		select{
			border: 1px solid rgb(195 195 195);
			border-radius: 3px;
			font-size: 14px;
			padding: 6px;
			color: #444444;
		}

		.font_bold{
			font-weight: bold;
		}
	</style>
	<?php include 'footer.php' ?>
</body>
</html>