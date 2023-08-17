<!DOCTYPE html>
<html>
<head>
	<title>Guideship Information Add</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<script type="text/javascript" src="js/jquery-3.6.0.min.js"></script>
	<?php 
		include 'connection.php'; 
		include 'functions.php';
	?>
	<script type="text/javascript">
		$(document).ready(function(){
			$("#add_student").click(function(){
				var student = '<tr><td><input type="text" name="student_name[]"></td><td><input type="text" name="regdtid[]"></td><td><input type="text" name="title[]"></td><td><input type="date" name="date[]" value="<?php echo date('Y-m-d'); ?>"></td><td><input class="rmvbtn" type="button" name="Remove" id="remove" value="Remove"></td></tr>';
				$("#student_field").append(student);
				
			});

			$("#student_field").on('click','#remove',function(){
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
	<h2 align="center">ADD GUIDESHIP DETAILS</h2>
	<form action="" method="POST" enctype="multipart/form-data">
		<br>
		<br>
		<label class="font_bold"> EMPLOYEE NAME :</label>
			<select name="name">
			<?php 
				$sql = "SELECT * FROM PERSONAL_INFORMATION_DETAILS WHERE STAFF_TYPE = 'TEACHING' ORDER BY NAME";
				$result = mysqli_query($conn,$sql);
				if(mysqli_num_rows($result)>0)
				{
					while($row = mysqli_fetch_assoc($result))
					{
						echo "<option value=".$row["EMPLOYEE_ID"].">" . $row["NAME"]. "</option>";

					}
				}
			?>
			</select>
		<br>
		<table class="tab1">
			<tr>
				<td colspan="5"><h2>Guideship :</h2></td>
			</tr>
			<tr>
				<td>
					<table class="tab1">
						<tr>
							<th rowspan="2">SUBJECT</th>
							<th rowspan="2">UNIVERSITY NAME</th>
							<th colspan="2">VALIDITY</th>
							<th rowspan="2">CERTIFICATE</th>
						</tr>
						<tr>
							<th>FROM</th>
							<th>TO</th>
						</tr>
						<tr>
							<td><input type="text" name="subject" ></td>
							<td><input type="text" name="university_name" ></td>
							<td><input type="date" name="guideship_from" value="<?php echo date('Y-m-d'); ?>"></td>
							<td><input type="date" name="guideship_to" value="<?php echo date('Y-m-d'); ?>"></td>
							<td><input type="file" name="guideship_document"></td>
						</tr>
					</table>

					<table id="student_field" class="tab1">
						<tr>
							<td colspan="5"><h2>Student Details :</h2></td>
						</tr>
						<tr>
							<th>STUDENT NAME</th>
							<th>REG DATE & ID</th>
							<th>TITLE OF THESIS</th>
							<th>COMPLETION DATE</th>
							<th></th>
						</tr>
						<tr>
							<td><input type="text" name="student_name[]"></td>
							<td><input type="text" name="regdtid[]"></td>
							<td><input type="text" name="title[]"></td>
							<td><input type="date" name="date[]" value="<?php echo date('Y-m-d'); ?>"></td>
							<td><input class="addbtn" type="button" name="add" id="add_student" value="Add"></td>
						</tr>
					</table>
				</td>
			</tr>
		</table>
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
			$eid = $_POST["name"];
			$subject = $_POST['subject'];
			$university_name = $_POST['university_name'];
			$guideship_from = $_POST['guideship_from'];
			$guideship_to = $_POST['guideship_to'];
			if(!empty($_FILES['guideship_document']["name"]))
			{
				$targetDir = "uploads/";
				$fileName = $_FILES['guideship_document']['name'];
				$targetFilePath = $targetDir . $fileName;
				$fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);
				$allowTypes = array('jpg','png','jpeg','gif','pdf');
				$path = $targetDir . $eid . round(((microtime(true)*1000)*rand(0,10000))/999999999). $fileName;
				if(in_array($fileType, $allowTypes))
				{
					if($_FILES['guideship_document']['size']<512000)
					{
						if(move_uploaded_file($_FILES['guideship_document']['tmp_name'], $path))
						{
							$stmt = "INSERT INTO guideship_details(EMPLOYEE_ID,SUBJECT_NAME,UNIVERSITY_NAME,GFROM,GTO,CERTIFICATE)VALUES('".$eid."','".$subject."','".$university_name."','".$guideship_from."','".$guideship_to."','".$path."')";
							$query = mysqli_query($conn,$stmt);
							insert_student_data($eid,$conn,$subject);
						}
					}
				}
			}
		}

		function insert_student_data($eid,$conn,$subject){
			$search_query = "SELECT * FROM guideship_details WHERE SUBJECT_NAME = '$subject' && EMPLOYEE_ID = '$eid'";
			$search_result = mysqli_query($conn,$search_query);
			$search_data = mysqli_fetch_array($search_result);
			$id = $search_data['ID'];
			$student_name = $_POST['student_name'];
			$regdtid = $_POST['student_name'];;
			$title = $_POST['title'];
			$date = $_POST['date'];

			foreach ($student_name as $key => $value) 
			{
				$insert_data_query = "INSERT INTO guideship_student_details(GUIDESHIP_ID,STUDENT_NAME,REGDATE_ID,TITLE_OF_THESIS,COMPLETION_DATE) VALUES ('".$id."','".$value."','".$regdtid[$key]."','".$title[$key]."','".$date[$key]."')";
				$insert_data_result = mysqli_query($conn,$insert_data_query);
				echo "<script>alert('Data saved succcessfully');</script>";
				echo "<script> window.location.href = 'home.php'</script>";
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
	</center>
</body>
</html>