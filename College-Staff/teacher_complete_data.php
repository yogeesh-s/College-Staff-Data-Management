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
</head>
<body>
	<div class="header">
		<h1>GOVERNMENT FIRST GRADE COLLEGE</h1>
		<p>BAPUJI NAGARA, SHIMOGA 577201</p>
	</div>
	<?php include 'header.php' ?>
	<div class="select_field" align="center">
		<form action="teacher_complete_data_fetch.php" method="POST">
		<label class="font_bold"> Employee Name :</label>
			<select name="name">
				<option>---Select---</option>
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
			<input  class="btn" type="submit" value="Get Data">
		</form>
	</div>
	<style type="text/css">
		.list{
			margin-top: 10px;
			border: #EDEDED solid 1px;
			padding: 10px 0px 10px 0px;
			border-collapse: collapse;
			font-size: 16px;
		}
		.table_head{
			height: 50px;
		}
		.list tr:nth-child(even){
			background: #fff;
		}

		.list tr:nth-child(odd){
			background: #EDEDED ;
		}

		.list th{
			padding: 5px;
		}

		.list td{
			padding: 5px 30px 5px 30px;
		}
		.btn{
			text-align: center;
			background: #3395FF;
			border: none;
			border-radius: 5px;
			padding: 10px;
			color: #fff;
		}
	</style>
	<center>
		<table class="list">
			<tr class="table_head">
				<th>Sl No</th>
				<th>Profile Picture</th>
				<th>Name</th>
				<th>Designation</th>
				<th>Department</th>
				<th>Employee Type</th>
				<th>Option</th>
			</tr>
			<?php 
				$sql = "SELECT * FROM PERSONAL_INFORMATION_DETAILS WHERE STAFF_TYPE = 'TEACHING' ORDER BY NAME";
				$result = mysqli_query($conn,$sql);
				if(mysqli_num_rows($result)>0)
				{
					$slno = 1;
					while($row = mysqli_fetch_assoc($result))
					{
						echo "<tr>";
						echo "<td>" . $slno. "</td>";
			?>
			<td><img src="<?php echo $row["PROFILE_PICTURE"]?>" width="100" height="100"></td>
			<?php
						echo "<td>" . $row["NAME"]. "</td>";
						echo "<td>" . $row["DESIGNATION"]. "</td>";
						echo "<td>" . $row["DEPARTMENT"]. "</td>";
						echo "<td>" . $row["EMPLOYEE_TYPE"]. "</td>";
						echo "<td><center><a class='btn' href='teacher_complete_data_fetch.php?name=".$row["EMPLOYEE_ID"]."'>&nbsp &nbsp &nbspView &nbsp&nbsp&nbsp</a></center></td>";
						echo "</tr>";
						$slno++;
					}
				}
				else{
					echo "<tr><th colspan='7'>No Data Found</td></th></tr>";
				}
				echo "</table>";
			?>
		</table>
	</center>
	<style type="text/css">
		.select_field{
			padding: 50px;
		}

		.select_field select{
			border: 1px solid rgb(195 195 195);
			border-radius: 3px;
			font-weight: 600;
			font-size: 14px;
			padding: 7px;
			color: #444444;
		}

		.font_bold{
			font-weight: bold;
		}

	</style>
	<?php include 'footer.php' ?>
</body>
</html>