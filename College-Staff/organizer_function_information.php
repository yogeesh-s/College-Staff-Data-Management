<!DOCTYPE html>
<html>
<head>
	<title>Function Information</title>
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
	<h2 align="center">FUNCTION DATA</h2>
	<br>
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
				$type = $_POST['name'];
				$start = $_POST['start'];
				$stop = $_POST['stop'];
				$sql = "SELECT FD.ID AS FID,TITLE,PROGRAM_DATE,NAME,NO_OF_STUDENTS_ATTENDED FROM FUNCTION_DATA FD,FUNCTION_CATEGORY FC WHERE FC.CATEGORY_NAME = '$type' AND FD.ID = FC.FUNCTION_ID AND PROGRAM_DATE BETWEEN '$start' AND '$stop'";
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
						echo "<td><center><a class='btn' href='detailed_function_information.php?name=".$row["FID"]."'>&nbsp &nbsp &nbspView &nbsp&nbsp&nbsp</a></center></td>";
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