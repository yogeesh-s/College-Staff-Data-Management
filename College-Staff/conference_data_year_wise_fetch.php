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
		.list tr:nth-child(odd){
			background: #fff;
		}

		.list tr:nth-child(even){
			background: #EDEDED ;
		}

		.list th{
			padding: 5px;
			border: 1px solid #D5D5D5;
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
			$type = $_POST['conference_type'];
			$start = $_POST['start'];
			$stop = $_POST['stop'];
			echo "<br><h2>RC / OC / SHORT TERM COURSE / WORKSHOP / TRAINING / FDP / CONFERENCE / SEMINAR DATA</h2>";
			if($type!="---Select---")
			{
				$sql = "SELECT pid.NAME AS PNAME,TYPE,TFROM,TTO,NAME_OF_COURSE,PLACE,CERTIFICATE FROM PERSONAL_INFORMATION_DETAILS pid,TRAINING_DETAILS pd WHERE pid.EMPLOYEE_ID = pd.EMPLOYEE_ID AND TFROM >= '$start' AND TTO <= '$stop' AND TYPE = '$type' ORDER BY PNAME";
				$result = mysqli_query($conn,$sql);
				echo "<center><table class='list'>";
				$slno = 1;
				if(mysqli_num_rows($result)>0)
				{
					echo "<br>
							<tr class='table_head'>
								<th>SL NO</th>
								<th>TEACHER NAME</th>
								<th>TYPE</th>
								<th>FROM</th>
								<th>TO</th>
								<th>NAME OF COURSE</th>
								<th>CERTIFICATE</th>
							</tr>";
					while($row = mysqli_fetch_assoc($result))
					{
						echo "<tr>";
						echo "<td>" . $slno. "</td>";
						echo "<td>" . $row["PNAME"]. "</td>";
						echo "<td>" . $row["TYPE"]. "</td>";
						echo "<td>" . $row["TFROM"]. "</td>";
						echo "<td>" . $row["TTO"]. "</td>";
						echo "<td>" . $row["NAME_OF_COURSE"]. "</td>";
						echo "<td><center><a class='btn' href='".$row["CERTIFICATE"]."'>&nbsp &nbsp &nbspView &nbsp&nbsp&nbsp</a></center></td>";
						echo "</tr>";
						$slno++;
				}
				echo "</table>";
				echo "<br>No of ".$type." is ".$slno-1;
				echo "<br><br><button class='btn' onclick='window.print()'>&nbsp&nbsp&nbspPrint&nbsp&nbsp&nbsp</button>";
				}
				else
				{
					echo "<table class=list><tr class='table_head'><td colspan='7'><h2>RC / OC / SHORT TERM COURSE / WORKSHOP / TRAINING / FDP / CONFERENCE / SEMINAR DATA :</h2></td></tr>";
					echo "<tr><td colspan='7' align='center'>No Data Found</td></tr></table>";
				}
			}
			else{
				echo "<table class=tab2><tr><td colspan='7'><h3>Error Occured</h3></td></tr>";
				echo "<tr><td colspan='7' align='center'><br>You not selected any Data <br><br>Please Select Proper Data
				<br><br>
				<a class='link' href='3.php'>Back</a>&nbsp&nbsp|&nbsp&nbsp<a class='link' href='home.php'>Home</a><br>&nbsp</td></tr></table>";
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