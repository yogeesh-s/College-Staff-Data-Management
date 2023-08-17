<!DOCTYPE html>
<html>
<head>
	<title>Add Promotion Data</title>
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
	<h2 align="center">ADD PROMOTION DATA</h2><br>
	<center>
	<form action="" method="POST" enctype="multipart/form-data">
			<table class="tab1">
				<tr>
					<td><label class="font_bold"> <b>EMPLOYEE NAME :</label></td>
			<td><select name="name">
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
		</td>
					<td><b>DESIGNATION</b></td>
					<td><select name="designation">
							<option>Principal Grade II</option>
							<option>Principal Grade I</option>
							<option>Principal Incharge</option>
							<option>Professor</option>
							<option>Assistant Professor</option>
							<option>Associate Professor I</option>
							<option>Associate Professor II</option>
							<option>Associate Professor III</option>
						</select></td>
						<td><b>DATE</b></td>
						<td><input type="date"  name="promotion_date"></td>
						<td><b>ORDER COPY</b></td>
						<td><input type="file"  name="quldoc"></td>
				</tr>
			</table>
			<br>

			<input class="sbtn" type="submit" name="save" id="sbtn" value="Save Data">
					&nbsp&nbsp&nbsp&nbsp
			<input class="wrnbtn" type="reset" name="reset" id="add" value="Reset">
			<br>
	</form>
	</center>
	<br><br>
	<h2 align="center">ADD TRANSFER / DEPUTATION / DEATH DATA</h2><br>
	<center>
	<form action="" method="POST" enctype="multipart/form-data">
			<table class="tab1">
				<tr>
					<td><label class="font_bold"> <b>EMPLOYEE NAME :</label></td>
			<td><select name="id">
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
		</td>
						<td><b>DATE OF TRANSFER / DEPUTATION / DEATH</b></td>
						<td><input type="date"  name="transfer_date"></td>
						<td><b>DESTINATION INSTITUTE</b></td>
						<td><input type="text"  name="instute"></td>
				</tr>
			</table>
			<br>

			<input class="sbtn" type="submit" name="save2" id="sbtn" value="Save Data">
					&nbsp&nbsp&nbsp&nbsp
			<input class="wrnbtn" type="reset" name="reset" id="add" value="Reset">
			<br>
	</form>
	</center>
	<?php 
		if(isset($_POST['save']))
		{
			$id = $_POST['name'];
			$designation = $_POST['designation'];
			$promotion_date = $_POST['promotion_date'];
			if(!empty($_FILES['quldoc']["name"]))
			{
				$targetDir = "uploads/";
				$fileName = $_FILES['quldoc']['name'];
				$targetFilePath = $targetDir . $fileName;
				$fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);
				$allowTypes = array('jpg','png','jpeg','gif','pdf');
				$path = $targetDir . $id . round(((microtime(true)*1000)*rand(0,10000))/999999999). $fileName;
				if(in_array($fileType, $allowTypes))
				{
					if($_FILES['quldoc']['size']<512000)
					{
						if(move_uploaded_file($_FILES['quldoc']['tmp_name'], $path))
						{
							$stmt = "INSERT INTO `promotion_data`( `EMPLOYEE_ID`, `DESIGNATION`, `PROMOTION_DATE`, `ORDER_COPY`) VALUES ('".$id."','".$designation."','".$promotion_date."','".$path."')";
							$query = mysqli_query($conn,$stmt);
							$stmt2 = "UPDATE PERSONAL_INFORMATION_DETAILS SET `DESIGNATION` = '$designation' WHERE EMPLOYEE_ID = '$id'";
							$query2 = mysqli_query($conn,$stmt2);
						}
					}
				}
			}
			echo "<script>alert('Promotion data added successfully.')</script>";
		    echo "<script> window.location.href = 'teaching_staff_data_add.php'</script>"; 
			
		}

		if(isset($_POST['save2']))
		{
			$id = $_POST['id'];
			$transfer_date = $_POST['transfer_date'];
			$instute = $_POST['instute'];
			
			$stmt = "INSERT INTO `deputation_data`( `EMPLOYEE_ID`, `DEPUTATION_DATE`, `INSTITUTE`) VALUES ('".$id."','".$transfer_date."','".$instute."')";
			$query = mysqli_query($conn,$stmt);
			$stmt1 = "SELECT * FROM PERSONAL_INFORMATION_DETAILS WHERE EMPLOYEE_ID = '$id'";
			$query1 = mysqli_query($conn,$stmt1);
			if(mysqli_num_rows($query1)>0)
			{
				$row = mysqli_fetch_array($query1);
				if($row["DEPUTATION_FROM"]==NULL)
				{
					$stmt2 = "INSERT INTO `service_details`( `EMPLOYEE_ID`, `NAME_OF_COLLEGE`, `SFROM`, `STO`) VALUES ('".$id."','GFGC Shimoga','".$row['DATE_OF_ENTRY_SERVICE']."','".$transfer_date."')";
					$query2 = mysqli_query($conn,$stmt2);
					echo "<script>alert('Transfer / Deputation data added successfully.')</script>";
		    		echo "<script> window.location.href = 'teaching_staff_data_add.php'</script>";
				}
				else{
					$stmt2 = "INSERT INTO `service_details`( `EMPLOYEE_ID`, `NAME_OF_COLLEGE`, `SFROM`, `STO`) VALUES ('".$id."','GFGC Shimoga','".$row["DEPUTATION_FROM"]."','".$transfer_date."')";
					$query2 = mysqli_query($conn,$stmt2);
					echo "<script>alert('Transfer / Deputation data added successfully.')</script>";
		    		echo "<script> window.location.href = 'teaching_staff_data_add.php'</script>";
				}
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