<!DOCTYPE html>
<html>
<head>
	<title>Fetch Function Information</title>
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
		<form action="organizer_function_information.php" method="POST">
			<h2 align="center">FUNCTION DATA</h2>
			<br>
			<center>
			<table>
				<tr>
					<td class="font_bold" align="center">TYPE</td><td class="font_bold" align="center">Start Date</td><td class="font_bold" align="center">End Date</td>
				</tr>
				<tr>
				<td>
					<select name="name">
				<?php 
					$sql = "SELECT * FROM function_master";
					$result = mysqli_query($conn,$sql);
					if(mysqli_num_rows($result)>0)
					{
						while($row = mysqli_fetch_assoc($result))
						{
							echo "<option>".$row['CATEGORY_NAME']."</option>";
						}
					}
				?>
			</select>
				</td>
				<td>
					<input type="date" name="start" value="<?php echo date('Y-m-d'); ?>"/>
				</td>
				<td>
					<input type="date" name="stop" value="<?php echo date('Y-m-d'); ?>"/>
				</td>
				<td>
					<input  class="btn" type="submit" value="Get Data">
				</td>
				</tr>
			</table>
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
			padding: 20px;
		}
		.btn{
			text-align: center;
			background: #3395FF;
			border: none;
			border-radius: 5px;
			padding: 10px;
			color: #fff;
		}
		input[type='date']{
			padding: 7px;
			border: #C3C3C3 solid 1px;
			margin: 5px;
		}
	</style>
	<center>
		<table class="list">
			<tr class="table_head">
				<th>Sl No</th>
				<th>Title</th>
				<th>Date</th>
				<th>Name</th>
				<th>No of students attended</th>
				<th>Option</th>
			</tr>
			<?php 
				$sql = "SELECT * FROM FUNCTION_DATA ORDER BY PROGRAM_DATE DESC";
				$result = mysqli_query($conn,$sql);
				if(mysqli_num_rows($result)>0)
				{
					$slno = 1;
					while($row = mysqli_fetch_assoc($result))
					{
						echo "<tr>";
						echo "<td>" . $slno. "</td>";
						echo "<td>" . $row["TITLE"]. "</td>";
						echo "<td>" . $row["PROGRAM_DATE"]. "</td>";
						echo "<td>" . $row["NAME"]. "</td>";
						echo "<td>" . $row["NO_OF_STUDENTS_ATTENDED"]. "</td>";
						echo "<td><center><a class='btn' href='detailed_function_information.php?name=".$row["ID"]."'>&nbsp &nbsp &nbspView &nbsp&nbsp&nbsp</a></center></td>";
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