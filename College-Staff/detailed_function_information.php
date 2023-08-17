<!DOCTYPE html>
<html>
<head>
	<?php
		//error_reporting(0);
		?>
	<title>Department Exam Data</title>
	<?php include 'connection.php'; ?>
	<link rel="stylesheet" type="text/css" href="style.css">
	<script type="text/javascript" src="js/jquery-3.6.0.min.js"></script>
</head>
<body>
	<style type="text/css">
		.tab1{
			width: 90%;
			margin: 10px;
			border: 1px solid black;
			padding: 5px 0px 5px 0px;
			border-collapse: collapse;
			font-size: 16px;
			font-family: 'Roboto', sans-serif;
		}

		.tab1 td{
			border: 1px solid #cbcbcb;
			border-collapse: collapse;
			padding: 10px;
		}
		.tab1 tr:nth-child(odd){
			background: #fff;
		}

		.tab1 tr:nth-child(even){
			background: #EDEDED ;
		}

		.tab1 #heading{
			background: #EDEDED ;
		}
		.tab2{
			width: 90%;
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
		h2{
			padding: 5px;
			margin: 5px;
		}
		.error{
			font-family: 'Roboto', sans-serif;
			color: red;
			font-weight: bold;
			font-size: 20px;
			border: 1px solid #cbcbcb;
			padding: 50px;
			margin: 10px;
			text-align: center;
			vertical-align: 50px;
		}
		.btn{
			text-align: center;
			background: #3395FF;
			border: none;
			border-radius: 5px;
			padding: 6px;
			margin: 10px;
			color: #fff;
			text-decoration: none;
		}
		.img-container{
			width:90%
		}
		.img-box{
			margin: 20px;
		}
	</style>
	<div class="header">
		<h1>GOVERNMENT FIRST GRADE COLLEGE</h1>
		<p>BAPUJI NAGARA, SHIMOGA 577201</p>
	</div>
	<?php include 'header.php' ?>
	<center>
		<h2 align="center">FUNCTION INFORMATION</h2>
		<br>
		<?php
			if($_GET['name']!=""){
				$eid = $_GET['name'];
				$sql = "SELECT * FROM FUNCTION_DATA WHERE ID = '$eid'";
				$result = mysqli_query($conn,$sql);
				if(mysqli_num_rows($result)>0)
				{	
					while($row = mysqli_fetch_assoc($result))
					{
						echo "<br><table class='tab1'>";
						echo "<tr><td> TITLE  </td><td>".$row["TITLE"]."</tr>
						<tr><td>PROGRAM DTAE</td><td>".$row["PROGRAM_DATE"]."</td></tr>
						<tr><td> NAME </th><td>".$row["NAME"]."</td></tr>
						<tr><td> NO OF STUDENTS ATTENDED </td><td>".$row["NO_OF_STUDENTS_ATTENDED"]."</td></tr>
						<tr><td> PROGRAM DETAILS </td><td>".$row["PROGRAM_DETAILS"]."</td></tr>";
						echo "</table>";
					}
				}

				$sql3 = "SELECT * FROM FUNCTION_CATEGORY WHERE FUNCTION_ID = '$eid'";
				$result3 = mysqli_query($conn,$sql3);
				if(mysqli_num_rows($result3)>0)
				{
					$sl=1;
					echo "<table class=tab2><tr><td colspan='4'><h2>Function Organizers :</h2></td></tr>";
					echo "<tr>
							<th>SL NO</th>
							<th>ORGANIZER</th>
						</tr>";
					while($row3 = mysqli_fetch_assoc($result3))
					{
						echo "<tr>
								<td>".$sl."</td>
								<td>".$row3["CATEGORY_NAME"]."</td>					
							</tr>";
							$sl++;
					}
					echo "</table>";
				}

				$sql3 = "SELECT * FROM FUNCTION_COORDINATOR WHERE FUNCTION_ID = '$eid'";
				$result3 = mysqli_query($conn,$sql3);
				if(mysqli_num_rows($result3)>0)
				{
					$sl=1;
					echo "<table class=tab2><tr><td colspan='4'><h2>Function Coordinator :</h2></td></tr>";
					echo "<tr>
							<th>SL NO</th>
							<th>COORDINATOR</th>
						</tr>";
					while($row3 = mysqli_fetch_assoc($result3))
					{
						echo "<tr>
								<td>".$sl."</td>
								<td>".$row3["COORDINATOR_NAME"]."</td>					
							</tr>";
							$sl++;
					}
					echo "</table>";
				}
				$sql3 = "SELECT * FROM FUNCTION_GUEST WHERE FUNCTION_ID = '$eid'";
				$result3 = mysqli_query($conn,$sql3);
				if(mysqli_num_rows($result3)>0)
				{
					$sl=1;
					echo "<table class=tab2><tr><td colspan='4'><h2>Function Guest :</h2></td></tr>";
					echo "<tr>
							<th>SL NO</th>
							<th>GUEST NAME</th>
						</tr>";
					while($row3 = mysqli_fetch_assoc($result3))
					{
						echo "<tr>
								<td>".$sl."</td>
								<td>".$row3["GUEST_NAME"]."</td>					
							</tr>";
							$sl++;
					}
					echo "</table>";
				}
				$sql3 = "SELECT * FROM FUNCTION_PICTURES WHERE FUNCTION_ID = '$eid'";
				$result3 = mysqli_query($conn,$sql3);
				if(mysqli_num_rows($result3)>0)
				{
					echo "<div class='img-container'>";
					while($row3 = mysqli_fetch_assoc($result3))
					{
						echo "<img class='img-box' src='".$row3["PICTURE_NAME"]."' width='300px'>";
					}
					echo "</div>";
				}

				echo "<button class='btn' onclick='window.print()'>&nbsp&nbsp&nbspPrint&nbsp&nbsp&nbsp</button>";
			}
			else{
				echo "<table class=tab2><tr><td colspan='7'><h3>Error Occured</h3></td></tr>";
				echo "<tr><td colspan='7' align='center'><br>You not selected any Employee Name <br><br>Please Select Employee Name
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