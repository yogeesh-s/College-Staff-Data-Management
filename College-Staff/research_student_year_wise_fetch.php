<!DOCTYPE html>
<html>
<head>
	<?php
		error_reporting(0);
		?>
	<title>Paper Details</title>
	<?php include 'connection.php'; ?>
	<link rel="stylesheet" type="text/css" href="style.css">
	<script type="text/javascript" src="js/jquery-3.6.0.min.js"></script>
</head>
<body>
	<style type="text/css">
		.list{
			margin-top: 10px;
			border: #EDEDED solid 1px;
			padding: 10px 0px 10px 0px;
			border-collapse: collapse;
			font-size: 16px;
			width: 90%;
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
		.tab2{
			width: 95%;
			margin: 10px;
			border: 1px solid black;
			padding: 5px 0px 5px 0px;
			border-collapse: collapse;
			font-family: 'Roboto', sans-serif;
		}

		.tab2 td{
			border: 1px solid #cbcbcb;
			border-collapse: collapse;
			padding: 10px;
		}
		.tab2 tr:nth-child(even){
			background: #fff;
		}

		.tab2 tr:nth-child(odd){
			background: #EDEDED ;
		}
		.tab2 th{
			border: 1px solid #cbcbcb;
			border-collapse: collapse;
			padding: 10px;
		}
	</style>
	<div class="header">
		<h1>GOVERNMENT FIRST GRADE COLLEGE</h1>
		<p>BAPUJI NAGARA, SHIMOGA 577201</p>
	</div>
	<?php include 'header.php' ?>
	<center>
		<?php
			$start = $_POST['start'];
			$stop = $_POST['stop'];
			echo "<br><h2>RESEARCH STUDENT DETAILS</h2>";
			$sql = "SELECT * FROM PERSONAL_INFORMATION_DETAILS pid,GUIDESHIP_DETAILS gd,GUIDESHIP_STUDENT_DETAILS gsd WHERE pid.EMPLOYEE_ID = gd.EMPLOYEE_ID AND gd.ID = gsd.GUIDESHIP_ID AND GFROM >= '$start' AND GTO <= '$stop'";
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
			.link{
				color:red;
				text-shadow: none;
				font-weight: bold;
			}
		</style>
	<center>
		<?php include 'footer.php' ?>
</body>
</html>