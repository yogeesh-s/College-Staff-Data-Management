<!DOCTYPE html>
<html>
<head>
	<title>Function Details</title>
	<?php include "connection.php"; ?>
	<link rel="stylesheet" type="text/css" href="style.css">
	<script type="text/javascript" src="js/jquery-3.6.0.min.js"></script>
	<style type="text/css">
		.tab1{
			margin-top: 10px;
			border: 1px solid black;
			padding: 5px 0px 5px 0px;
			border-collapse: collapse;
			font-size: 18px;
			width: 45%;
		}

		.tab1 th{
			border: 1px solid #cbcbcb;
			border-collapse: collapse;
			padding: 5px 5px 5px 5px;
		}

		.tab1 input{
			padding: 4px;
			width: 85%;
			border: 1px solid #adadad;
		}
		.tab1 textarea{
			padding: 7px;
			width: 83%;
			border: 1px solid #adadad;
		}
		.tab1 select{
			padding: 4px;
			width: 88%;
			border: 1px solid #adadad;
		}

		.tab1 td{
			border: 1px solid #cbcbcb;
			border-collapse: collapse;
			padding: 5px 5px 5px 5px;
			text-align: center;
		}
		.header{
			text-align: center;
		}
		.header h1{
			margin-top: 5px;
			font-family: 'Ubuntu', sans-serif;
		}
		.sbtn{
			background: #0d9e31;
			color: white;
			padding: 10px;
			font-size: 15px;
			font-family: 'Roboto',sans-serif;
			border-radius: 5px;
			text-shadow: 2px 2px 5px black;
			text-align: center;
			border: none;
		}
		.wrnbtn{
			background: #EEA100;
			color: white;
			border: none;
			width: 100px;
			padding: 10px 20px 10px 20px;
			font-size: 15px;
			font-family: 'Roboto',sans-serif;
			border-radius: 5px;
			text-shadow: 2px 2px 5px black;
		}
		.addbtn{
			background: #0062fc;
			color: white;
			border: none;
			width: 100px;
			padding: 10px 15px 10px 15px;
			font-size: 15px;
			font-family: 'Roboto',sans-serif;
			border-radius: 5px;
			text-shadow: 2px 2px 5px black;
		}
		.rmvbtn{
			background: #ff382a;
			color: white;
			border: none;
			width: 100px;
			padding: 10px 20px 10px 20px;
			font-size: 15px;
			font-family: 'Roboto',sans-serif;
			border-radius: 5px;
			text-shadow: 2px 2px 5px black;
		}
	</style>
	<script type="text/javascript">
		$(document).ready(function(){
			$("#add_resource_person").click(function(){
				var rp = '<tr><td>GUEST / RESOURCE PERSON</td><td><input type="text" name="guest[]"></td><td><input class="rmvbtn" type="button" name="Remove" id="remove" value="Remove"></td></tr>';
				$("#resource_person_field").append(rp);
				
			});

			$("#resource_person_field").on('click','#remove',function(){
				$(this).closest('tr').remove();
			});

			$("#add_coordinator").click(function(){
				var cod = '<tr><td>PROGRAM COORDINATOR</td><td><input type="text" name="coordinator[]"></td><td><input class="rmvbtn" type="button" name="Remove" id="remove" value="Remove"></td></tr>';
				$("#coordinator_field").append(cod);
				
			});

			$("#coordinator_field").on('click','#remove',function(){
				$(this).closest('tr').remove();
			});

			$("#add_category").click(function(){
				var cod = '<tr><td>FUNCTION ORGANIZER</td><td><select name="category[]"><option>---SELECT---</option><?php include "connection.php";$sql = "SELECT * FROM function_master";$query = mysqli_query($conn,$sql);if(mysqli_num_rows($query)>0){while($row = mysqli_fetch_assoc($query)){if($row['CATEGORY_NAME']!=""){echo "<option value".$row['CATEGORY_NAME'].">".$row['CATEGORY_NAME']."</option>";}}}?>
					</select></td><td><input class="rmvbtn" type="button" name="Remove" id="remove" value="Remove"></td></tr>';
				$("#category_field").append(cod);
				
			});

			$("#category_field").on('click','#remove',function(){
				$(this).closest('tr').remove();
			});

		});
	</script>
</head>
<body>
	<div class="header">
		<h1>GOVERNMENT FIRST GRADE COLLEGE</h1>
		<p>BAPUJI NAGARA, SHIMOGA 577201</p>
	</div>
	<?php include 'header.php' ?>
	<center>
		<h2 align="center">ADD FUNCTION INFORMATION</h2>
		<form method="POST" enctype="multipart/form-data" autocomplete="off">
		<table class="tab1">
			<tr>
				<td>TITLE</td><td><input type="text" name="program_title" required></td>
			</tr>
			<tr>
				<td>DATE</td><td><input type="date" name="program_date" required></td>
			</tr>
			<tr>
				<td>NAME</td><td><input type="text" name="program_name" required></td>
			</tr>
			<tr>
				<td>NO OF STUDENTS ATTENDED</td><td><input type="text" name="no_of_students_attended"></td>
			</tr>
			<tr>
				<td>PROGRAM DETAILS</td><td><textarea name="program_details"></textarea></td>
			</tr>
			<tr>
				<td>PICTURE 1</td><td><input type="FILE" name="picture[]"></td>
			</tr>
			<tr>
				<td>PICTURE 2</td><td><input type="FILE" name="picture[]"></td>
			</tr>
			<tr>
				<td>PICTURE 3</td><td><input type="FILE" name="picture[]"></td>
			</tr>
			<tr>
				<td>PICTURE 4</td><td><input type="FILE" name="picture[]"></td>
			</tr>
			<tr>
				<td>PICTURE 5</td><td><input type="FILE" name="picture[]"></td>
			</tr>
		</table>
		<table id="resource_person_field" class="tab1">
			<tr>
				<td>GUEST / RESOURCE PERSON</td><td><input type="text" name="guest[]"></td>
				<td><input class="addbtn" type="button" name="add" id="add_resource_person" value="Add"></td>
			</tr>
			
		</table>
		<table id="coordinator_field" class="tab1">
			<tr>
				<td>PROGRAM COORDINATOR</td><td><input type="text" name="coordinator[]"></td>
				<td><input class="addbtn" type="button" name="add" id="add_coordinator" value="Add"></td>
			</tr>
		</table>
		<table id="category_field" class="tab1">
			<tr>
				<td>FUNCTION ORGANIZER</td>
				<td>
					<select name="category[]">
						<option>---SELECT---</option>
						<?php 
							include "connection.php";
							$sql = "SELECT * FROM function_master";
							$query = mysqli_query($conn,$sql);
							if(mysqli_num_rows($query)>0){
								while($row = mysqli_fetch_assoc($query))
								{
									if($row['CATEGORY_NAME']!=""){
										echo "<option value".$row['CATEGORY_NAME'].">".$row['CATEGORY_NAME']."</option>";
									}
									
								}
							}
						?>
					</select>
				</td>
					<td><input class="addbtn" type="button" name="add" id="add_category" value="Add"></td>
			</tr>
		</table>
		<br>
		<input class="sbtn" type="submit" name="save" id="sbtn" value="Save Data">
		&nbsp&nbsp&nbsp&nbsp
		<input class="wrnbtn" type="reset" name="add" id="add" value="Reset">
		</form>
		<br>
	</center>
	<?php
		function insert_data($conn){
			$sql1 = "SELECT * FROM FUNCTION_DATA ORDER BY ID DESC LIMIT 1";
			$result1 = mysqli_query($conn,$sql1);
			$row1 = mysqli_fetch_array($result1);
			$guest = $_POST['guest'];
			$coordinator = $_POST['coordinator'];
			$category = $_POST['category'];
			$picture = $_POST['picture'];
			foreach ($category as $key => $value)
			{
				if($value!="---SELECT---"){
					$stmt = "INSERT INTO `function_category`(`FUNCTION_ID`, `CATEGORY_NAME`) VALUES ('".$row1["ID"]."','".$value."')";
					$query = mysqli_query($conn,$stmt);
				}
			}
			foreach ($guest as $key => $value)
			{
				if(!empty($value)){
					$stmt = "INSERT INTO `function_guest`( `FUNCTION_ID`, `GUEST_NAME`) VALUES ('".$row1["ID"]."','".$value."')";
					$query = mysqli_query($conn,$stmt);
				}
			}

			foreach ($coordinator as $key => $value)
			{
				if(!empty($value)){
					$stmt = "INSERT INTO `function_coordinator`( `FUNCTION_ID`, `COORDINATOR_NAME`) VALUES ('".$row1["ID"]."','".$value."')";
					$query = mysqli_query($conn,$stmt);
				}
			}
			foreach ($_FILES['picture']['tmp_name'] as $key => $value)
			{
				if(!empty($_FILES['picture']["name"]))
				{
					$targetDir = "uploads/";
					$fileName = $_FILES['picture']['name'][$key];
					$targetFilePath = $targetDir . $fileName;
					$fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);
					$allowTypes = array('jpg','png','jpeg','gif','pdf');
					$path = $targetDir .  round(((microtime(true)*1000)*rand(0,10000))/999999999). $fileName;
					if(in_array($fileType, $allowTypes))
					{
						if($_FILES['picture']['size'][$key]<512000)
						{
							if(move_uploaded_file($_FILES['picture']['tmp_name'][$key], $path))
							{
								$stmt = "INSERT INTO `function_pictures`( `FUNCTION_ID`, `PICTURE_NAME`) VALUES ('".$row1["ID"]."','".$path."')";
								$query = mysqli_query($conn,$stmt);
							}
						}
					}
				}
			}
			echo "<script>alert('Function Added successful.')</script>";
	        echo "<script> window.location.href = 'function_home.php'</script>";  
		}
		if(isset($_POST['save']))
		{
			$program_title = $_POST['program_title'];
			$program_date = $_POST['program_date'];
			$category = $_POST['category'];
			$program_name = $_POST['program_name'];
			$no_of_students_attended = $_POST['no_of_students_attended'];
			$program_details = $_POST['program_details'];
			if($value!="$program_title"){
				$sql = "INSERT INTO `function_data`( `TITLE`, `PROGRAM_DATE`, `NAME`, `NO_OF_STUDENTS_ATTENDED`, `PROGRAM_DETAILS`) VALUES ('".$program_title."','".$program_date."','".$program_name."','".$no_of_students_attended."','".$program_details."')";
				$result = mysqli_query($conn, $sql);  
				insert_data($conn);
			}
		}
		
	?>
	<?php include 'footer.php' ?>
</body>
</html>