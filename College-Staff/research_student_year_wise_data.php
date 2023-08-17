<!DOCTYPE html>
<html>
<head>
	<title>Research Guideship Data Year Wise</title>
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
	<h2 align="center">Research Student Year Wise</h2>
	<div class="select_field" align="center">
		<form action="research_student_year_wise_fetch.php" method="POST">
			<center>
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
				</tr>
			</table>
		</center>
		</form>
	</div>
	<center><br><h2>Research Student Consolidate Data</h2></center>
	
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
			border: 1px solid #D5D5D5;
		}

		.list td{
			padding: 25px;
			border: 1px solid #D5D5D5;
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
			$sql = "SELECT * FROM PERSONAL_INFORMATION_DETAILS pid,GUIDESHIP_DETAILS gd,GUIDESHIP_STUDENT_DETAILS gsd WHERE pid.EMPLOYEE_ID = gd.EMPLOYEE_ID AND gd.ID = gsd.GUIDESHIP_ID AND GFROM >= '1900-01-01' AND GTO <= '$stop'";
			$result = mysqli_query($conn,$sql);
			echo "<center><table class='list'>";
			$slno = 1;
			if(mysqli_num_rows($result)>0)
			{
				echo "<br>
						<tr class='table_head'>
							<th>SL NO</th>
							<th>GUIDE NAME</th>
							<th>STUDENT NAME</th>
							<th>REG DATE & ID</th>
							<th>TITLE OF THESIS</th>
							<th>COMPLETION DATE</th>
						</tr>";
				while($row = mysqli_fetch_assoc($result))
				{
					echo "<tr>";
					echo "<td>" . $slno. "</td>";
					echo "<td>" . $row["NAME"]. "</td>";
					echo "<td>" . $row["STUDENT_NAME"]. "</td>";
					echo "<td>" . $row["REGDATE_ID"]. "</td>";
					echo "<td>" . $row["TITLE_OF_THESIS"]. "</td>";
					echo "<td>" . $row["COMPLETION_DATE"]. "</td>";;
					echo "</tr>";
					$slno++;
				}
				echo "</table>";
				echo "<br>No of Students ". $slno-1;
				echo "<br><br><button class='btn' onclick='window.print()'>&nbsp&nbsp&nbspPrint&nbsp&nbsp&nbsp</button>";
			}
			else{
				echo "<tr><th colspan='7'>No Data Found</td></th></tr>";
				echo "</table>";
			}
		?>
	<style type="text/css">
		.select_field{
			padding: 15px;
		}

		.select_field select{
			border: 1px solid rgb(195 195 195);
			border-radius: 3px;
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