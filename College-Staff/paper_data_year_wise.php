<!DOCTYPE html>
<html>
<head>
	<title>Paper Details Year Wise</title>
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
	<h2 align="center">Papers Information</h2>
	<div class="select_field" align="center">
		<form action="paper_data_year_wise_fetch.php" method="POST">
			<center>
			<table>
				<tr>
					<td class="font_bold" align="center">TYPE</td><td class="font_bold" align="center">Start Date</td><td class="font_bold" align="center">End Date</td>
				</tr>
				<tr>
				<td>
					<select name="paper_type"><option>---Select---</option><option>JOURNAL</option><option>CONFERENCE</option><option>SEMINAR</option></select>
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
			$sql = "SELECT pid.NAME AS PNAME,TYPE,LEVEL,pd.NAME AS PDNAME,PAPER_DATE,PAPER_TITLE,CERTIFICATE FROM PERSONAL_INFORMATION_DETAILS pid,PAPER_DETAILS pd WHERE pid.EMPLOYEE_ID = pd.EMPLOYEE_ID AND PAPER_DATE BETWEEN '1900-01-01' AND '$stop' ORDER BY PNAME";
			$result = mysqli_query($conn,$sql);
			echo "<center><table class='list'>";
			$slno = 1;
			if(mysqli_num_rows($result)>0)
			{
				echo "<br>
						<tr class='table_head'>
							<th>SL NO</th>
							<th>TEACHER NAME</th>
							<th>PAPER TYPE</th>
							<th>LEVEL</th>
							<th>PAPER NAME</th>
							<th>PAPER_DATE</th>
							<th>PAPER_TITLE</th>
							<th>CERTIFICATE</th>
						</tr>";
				while($row = mysqli_fetch_assoc($result))
				{
					echo "<tr>";
					echo "<td>" . $slno. "</td>";
					echo "<td>" . $row["PNAME"]. "</td>";
					echo "<td>" . $row["LEVEL"]. "</td>";
					echo "<td>" . $row["TYPE"]. "</td>";
					echo "<td>" . $row["PDNAME"]. "</td>";
					echo "<td>" . $row["PAPER_DATE"]. "</td>";
					echo "<td>" . $row["PAPER_TITLE"]. "</td>";
					echo "<td><center><a class='btn' href='".$row["CERTIFICATE"]."'>&nbsp &nbsp &nbspView &nbsp&nbsp&nbsp</a></center></td>";
					echo "</tr>";
					$slno++;
				}
				echo "</table>";
				echo "<br>No of Papers ". $slno-1;
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