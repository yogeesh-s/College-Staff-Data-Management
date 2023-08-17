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
	<h2 align="center">Experience Information</h2>
	<div class="select_field" align="center">
		<form action="teacher_experience_data_fetch.php" method="POST">
			<table>
				<tr>
					<td class="font_bold" align="center">Start Date</td><td class="font_bold" align="center">End Date</td>
				</tr>
				<tr>
				<td>
					<input type="date" name="start" value="<?php echo date('Y-m-d'); ?>"/>
				</td>
				<td>
					<input type="date" name="stop" value="<?php echo date('Y-m-d'); ?>"/>
				</td>
				<td>
					<input  class="btn" type="submit" value="Get Data">
				</td>
		</form>
	</div>
	<style type="text/css">
		.list{
			margin-top: 10px;
			border: #C6C6C6 solid 1px;
			padding: 10px 0px 10px 0px;
			border-collapse: collapse;
			font-size: 16px;
		}
		.table_head{
			height: 35px;
			background: #E7E7E7;
		}
		

		.list th{
			padding: 5px;
			border: #C6C6C6 solid 1px;
		}

		.list td{
			padding: 5px 30px 5px 30px;
			border: #C6C6C6 solid 1px;
		}
		.btn{
			text-align: center;
			background: #3395FF;
			border: none;
			border-radius: 5px;
			padding: 10px;
			color: #fff;
		}
		.link{
				color:red;
				text-shadow: none;
				font-weight: bold;
			}
		input[type='date']{
			padding: 7px;
			border: #C3C3C3 solid 1px;
			margin: 5px;
		}
	</style>
		<?php
			$date = new DateTime();
			$stop = $date->format('Y-m-d');
				$sql = "SELECT * FROM PERSONAL_INFORMATION_DETAILS WHERE STAFF_TYPE = 'TEACHING' AND DATE_OF_ENTRY_SERVICE BETWEEN '1900-01-01' AND '$stop'";
				$result = mysqli_query($conn,$sql);
				echo "<center><table class='list'>";
				if(mysqli_num_rows($result)>0)
				{
					echo "<br>
							<tr class='table_head'>
								<th rowspan='2'>Sl No</th>
								<th rowspan='2'>Name</th>
								<th rowspan='2'>Department</th>
								<th colspan='2'>Experience</th>
								<th rowspan='2'>Designation</th>
							</tr>
							<tr class='table_head'>
								<th>Total</th>
								<th>Present Institute</th>
							</tr>";
					$slno = 1;
					while($row = mysqli_fetch_assoc($result))
					{
						echo "<tr>";
						echo "<td>" . $slno. "</td>";
						echo "<td>" . $row["NAME"]. "</td>";
						echo "<td>" . $row["DEPARTMENT"]. "</td>";
						$date1 = new DateTime($row["DATE_OF_ENTRY_SERVICE"]);
						$date2 = new DateTime();
						$interval = $date1->diff($date2);
						echo "<td>" . $interval->y." Years ". $interval->m." Months". "</td>";
						if($row["DEPUTATION_FROM"]==NULL){
							echo "<td>" . $interval->y." Years ". $interval->m." Months". "</td>";
						}
						else{
							$date3 = new DateTime($row["DEPUTATION_FROM"]);
							$interval = $date3->diff($date2);
							echo "<td>" . $interval->y." Years ". $interval->m." Months". "</td>";
						}
						
						echo "<td>" . $row["DESIGNATION"]. "</td>";
						echo "</tr>";
						$slno++;
					}
					echo "</center></table>";
				}
				else{ 
					echo "<tr><td colspan='6'><center>No Data Found</center></td></tr>";
					echo "</center></table>";
				}
		?>		
	<style type="text/css">
		.select_field{
			padding: 15px;
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