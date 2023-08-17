<!DOCTYPE html>
<html>
<head>
	<title>ADD BOS / BOE VALUATION DATA</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<script type="text/javascript" src="js/jquery-3.6.0.min.js"></script>
	<?php 
		include 'connection.php'; 
		include 'functions.php';
	?>
	<script type="text/javascript">
		$(document).ready(function(){
			$("#add_meeting").click(function(){
				var meeting = '<tr><td><input type="text" name="meeting_year[]"></td><td><input type="date" name="mfrom[]" value="<?php echo date('Y-m-d'); ?>"></td><td><input type="date" name="mto[]" value="<?php echo date('Y-m-d'); ?>"></td><td><input type="file" name="attendance_certificate[]"></td><td><input class="rmvbtn" type="button" name="Remove" id="remove" value="Remove"></td></tr>';
				$("#meeting_field").append(meeting);
				
			});

			$("#meeting_field").on('click','#remove',function(){
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
		<h2>ADD BOS / BOE VALUATION DATA</h2>
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
				<td colspan="5"><h2>BOS / BOE / Valuation Member :</h2></td>
			</tr>
			<tr>
				<td>
					<table id="valuation_field" class="tab1">
						<tr>
							<th>TYPE</th>
							<th>YEAR</th>
							<th>UNIVERSITY</th>
						</tr>
						<tr>
							<td><select name="vauation_type"><option>BOS</option><option>BOE</option><option>Valuation Member</option></select></td>
							<td><select name="valuation_year" >
									<option>2030</option>
									<option>2029</option>
									<option>2028</option>
									<option>2027</option>
									<option>2026</option>
									<option>2025</option>
									<option>2024</option>
									<option>2023</option>
									<option>2022</option>
									<option>2021</option>
									<option>2020</option>
									<option>2019</option>
									<option>2018</option>
									<option>2017</option>
									<option>2016</option>
									<option>2015</option>
									<option>2014</option>
									<option>2013</option>
									<option>2012</option>
									<option>2011</option>
									<option>2010</option>
									<option>2009</option>
									<option>2008</option>
									<option>2007</option>
									<option>2006</option>
									<option>2005</option>
									<option>2004</option>
									<option>2003</option>
									<option>2002</option>
									<option>2001</option>
									<option>2000</option>
									<option>1999</option>
									<option>1998</option>
									<option>1997</option>
									<option>1996</option>
									<option>1995</option>
									<option>1994</option>
									<option>1993</option>
									<option>1992</option>
									<option>1991</option>
									<option>1990</option>
						</select></td>
							<td><input type="text" name="valuation_university" ></td>
						</tr>
				</table>

				<table id="meeting_field" class="tab1">
					<tr>
						<td colspan="5"><h2>Meeting / Valuation Details :</h2></td>
					</tr>
					<tr>
						<th>YEAR</th>
						<th>FROM</th>
						<th>TO</th>
						<th>ATTENDANCE CERTIFICATE</th>
						<th></th>
					</tr>
					<tr>
						<td><input type="text" name="meeting_year[]"></td>
						<td><input type="date" name="mfrom[]" value="<?php echo date('Y-m-d'); ?>"></td>
						<td><input type="date" name="mto[]" value="<?php echo date('Y-m-d'); ?>"></td>
						<td><input type="file" name="attendance_certificate[]"></td>
						<td><input class="addbtn" type="button" name="add" id="add_meeting" value="Add"></td>
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
			$type = $_POST['vauation_type'];
			$year = $_POST['valuation_year'];;
			$university = $_POST['valuation_university'];

			$insert_data_query = "INSERT INTO bos_boe_valuation_deatails(EMPLOYEE_ID,TYPE,BOS_YEAR,UNIVERSITY) VALUES ('".$eid."','".$type."','".$year."','".$university."')";
			$insert_data_result = mysqli_query($conn,$insert_data_query);
			insert_meeting_data($eid,$type,$year,$university,$conn);
			
		}

		function insert_meeting_data($eid,$type,$year,$university,$conn){
			// Data Getting From Form
			$search_query = "SELECT * FROM bos_boe_valuation_deatails WHERE TYPE = '$type' AND UNIVERSITY = '$university' AND BOS_YEAR = '$year' AND EMPLOYEE_ID = '$eid'";
			$search_result = mysqli_query($conn,$search_query);
			$search_data = mysqli_fetch_array($search_result);
			$id = $search_data['ID'];
			$meeting_year = $_POST['meeting_year'];
			$mfrom = $_POST['mfrom'];
			$mto = $_POST['mto'];

			foreach ($meeting_year as $key => $value)
			{
				if(!empty($_FILES['attendance_certificate']["name"]))
				{
					$targetDir = "uploads/";
					$fileName = $_FILES['attendance_certificate']['name'][$key];
					$targetFilePath = $targetDir . $fileName;
					$fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);
					$allowTypes = array('jpg','png','jpeg','gif','pdf');
					$path = $targetDir . $eid . round(((microtime(true)*1000)*rand(0,10000))/999999999). $fileName;
					if(in_array($fileType, $allowTypes))
					{
						if($_FILES['attendance_certificate']['size'][$key]<512000)
						{
							if(move_uploaded_file($_FILES['attendance_certificate']['tmp_name'][$key], $path))
							{
								$stmt = "INSERT INTO meeting_valuation_details(ID,MEETING_YEAR,MFROM,MTO,ATTENDANCE)VALUES('".$id."','".$meeting_year[$key]."','".$mfrom[$key]."','".$mto[$key]."','".$path."')";
								$query = mysqli_query($conn,$stmt);
								echo "<script>alert('Data saved succcessfully');</script>";
								echo "<script> window.location.href = 'home.php'</script>";
							}
						}
					}
				}
			}
		}
	?>
	<style>
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
	</center>
	
	
	<?php include 'footer.php' ?>
</body>
</html>