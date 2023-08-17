<!DOCTYPE html>
<html>
<head>
	<?php
		error_reporting(0);
		?>
	<title>Department Exam Data</title>
	<?php include 'connection.php'; ?>
	<link rel="stylesheet" type="text/css" href="style.css">
	<script type="text/javascript" src="js/jquery-3.6.0.min.js"></script>
</head>
<body>
	<style type="text/css">
		.tab1{
			margin: 10px;
			width: 95%;
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
	</style>
	<div class="header">
		<h1>GOVERNMENT FIRST GRADE COLLEGE</h1>
		<p>BAPUJI NAGARA, SHIMOGA 577201</p>
	</div>
	<?php include 'header.php' ?>
	<h2 align="center">DEPARTMENT EXAM DATA</h2>
		<br>
	<center>
		<?php
			if($_GET['name']!=""){
				$eid = $_GET['name'];
			}
			else{
				$eid = $_POST['name'];
			}
			if($eid!="---Select---")
			{
				$sql = "SELECT * FROM PERSONAL_INFORMATION_DETAILS WHERE EMPLOYEE_ID = '$eid'";
				$result = mysqli_query($conn,$sql);
				if(mysqli_num_rows($result)>0)
				{
					while($row = mysqli_fetch_assoc($result))
					{
						echo "<br><table class='tab1'>";
						echo "<tr><th> NAME  </th><td>".$row["NAME"]."<th>DESIGNATION</th><td>".$row["DESIGNATION"]."</td><th> STAFF TYPE </th><td>".$row["STAFF_TYPE"]."</td><th> EMPLOYEE TYPE </th><td>".$row["EMPLOYEE_TYPE"]."</td></tr>";
						echo "</table>";
					}
				}

				$sql3 = "SELECT * FROM DEPARTMENT_EXAM_DETAILS WHERE EMPLOYEE_ID = '$eid'";
				$result3 = mysqli_query($conn,$sql3);
				if(mysqli_num_rows($result3)>0)
				{
					echo "<table class=tab2><tr><td colspan='4'><h2>Department Exam Details :</h2></td></tr>";
					echo "<tr>
							<th>NAME</th>
							<th>REG NO</th>
							<th>YEAR OF PASSING</th>
							<th>CERTIFICATE</th>
						</tr>";
					while($row3 = mysqli_fetch_assoc($result3))
					{
						echo "<tr>
								<td>".$row3["NAME"]."</td>
								<td>".$row3["REG_NO"]."</td>
								<td>".$row3["YEAR_OF_PASSING"]."</td>
								<td><center><a class='btn' href='".$row3["CERTIFICATE"]."'>&nbsp&nbsp&nbsp&nbspView&nbsp&nbsp&nbsp&nbsp</a></center></td>					
							</tr>";
					}
					echo "</table>";
					echo "<button class='btn' onclick='window.print()'>&nbsp&nbsp&nbspPrint&nbsp&nbsp&nbsp</button>";
				}
				else
				{
					echo "<table class=tab2><tr><td colspan='7'><h2>Department Exam Details :</h2></td></tr>";
					echo "<tr><td colspan='7' align='center'>No Data Found</td></tr></table>";
				}
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