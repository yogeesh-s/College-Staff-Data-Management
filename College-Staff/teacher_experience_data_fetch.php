<!DOCTYPE html>
<html>
<head>
	<title></title>
	<?php include 'connection.php'; ?>
	<link rel="stylesheet" type="text/css" href="style.css">
	<script type="text/javascript" src="js/jquery-3.6.0.min.js"></script>
</head>
<body>
	<style type="text/css">
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
			if($start!="---Select---"&&$stop!="---Select---")
			{
				echo "<center>
				<br>
				<h2>Experience Details</h2>
				<br>
				<table class='list'>
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
				$sql = "SELECT * FROM PERSONAL_INFORMATION_DETAILS WHERE STAFF_TYPE = 'TEACHING' AND DATE_OF_ENTRY_SERVICE BETWEEN '$start' AND '$stop'";
				$result = mysqli_query($conn,$sql);
				if(mysqli_num_rows($result)>0)
				{
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
					echo "</table>";
					echo "<br><button class='btn' onclick='window.print()'>&nbsp&nbsp&nbspPrint&nbsp&nbsp&nbsp</button>";
				}
				else{ 
					echo "<tr><td colspan='6'><center>No Data Found</center></td></tr>";
				}
			}
			else{
				echo "<table class=tab2><tr><td colspan='7'><h3>Error Occured</h3></td></tr>";
				echo "<tr><td colspan='7' align='center'><br>You not selected any Employee Name <br><br>Please Select Employee Name
				<br><br>
				<a class='link' href='3.php'>Back</a>&nbsp&nbsp|&nbsp&nbsp<a class='link' href='home.php'>Home</a><br>&nbsp</td></tr></table>";
			}
		?>		
	</center>
	<?php include 'footer.php' ?>
</body>
</html>