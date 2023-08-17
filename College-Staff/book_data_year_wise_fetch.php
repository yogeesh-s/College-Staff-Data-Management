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
			border: 1px solid #D5D5D5;
			padding: 5px;
		}

		.list td{
			border: 1px solid #D5D5D5;
			padding: 25px;
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
			echo "<br><h2>BOOK DETAILS</h2>";
			$sql = "SELECT pid.NAME AS PNAME,bpd.NAME AS BNAME,pid.EMPLOYEE_ID,NO_OF_CHAPTERS,BPFROM,BPTO,BP_YEAR,DOCUMENT FROM PERSONAL_INFORMATION_DETAILS pid,BOOK_PUBLISHED_DETAILS bpd WHERE pid.EMPLOYEE_ID = bpd.EMPLOYEE_ID AND BP_YEAR BETWEEN '$start' AND '$stop'";
			$result = mysqli_query($conn,$sql);
			echo "<center><table class='list'>";
			$slno = 1;
			if(mysqli_num_rows($result)>0)
			{
				echo "<br>
						<tr class='table_head'>
							<th>SL NO</th>
							<th>TEACHER NAME</th>
							<th>BOOK NAME</th>
							<th>NO OF CHAPTERS</th>
							<th>PAGES FROM</th>
							<th>PAGES TO</th>
							<th>YEAR</th>
							<th>DOCUMENT</th>
						</tr>";
				while($row = mysqli_fetch_assoc($result))
				{
					echo "<tr>";
					echo "<td>" . $slno. "</td>";
					echo "<td>" . $row["PNAME"]. "</td>";
					echo "<td>" . $row["BNAME"]. "</td>";
					echo "<td>" . $row["NO_OF_CHAPTERS"]. "</td>";
					echo "<td>" . $row["BPFROM"]. "</td>";
					echo "<td>" . $row["BPTO"]. "</td>";
					echo "<td>" . $row["BP_YEAR"]. "</td>";
					echo "<td><center><a class='btn' href='".$row["DOCUMENT"]."'>&nbsp &nbsp &nbspView &nbsp&nbsp&nbsp</a></center></td>";
					echo "</tr>";
					$slno++;
				}
				echo "</table>";
				echo "<br>No of Books ". $slno-1;
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