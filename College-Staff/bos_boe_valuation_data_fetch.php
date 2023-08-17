<!DOCTYPE html>
<html>
<head>
	<?php
		error_reporting(0);
		?>
	<title>BOS / BOE / Valuation Member Data</title>
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
						echo "<tr><th> NAME  </th><td>".$row["NAME"]."<th>DESIGNATION</th><td>".$row["DESIGNATION"]."</td><th> DEPARTMENT </th><td>".$row["DEPARTMENT"]."</td><th> EMPLOYEE TYPE </th><td>".$row["EMPLOYEE_TYPE"]."</td></tr>";
						echo "</table>";
					}
				}
				
				$sql11 = "SELECT * FROM BOS_BOE_VALUATION_DEATAILS WHERE EMPLOYEE_ID = '$eid'";
				$result11 = mysqli_query($conn,$sql11);
				if(mysqli_num_rows($result11)>0)
				{ 
					echo "<table class='tab1'>
							<tr>
								<td colspan='5'><h2>BOS / BOE / Valuation Details:</h2></td>
							</tr>";
					while($row11 = mysqli_fetch_assoc($result11))
					{
						echo "<tr>
								<td>
									<table class='tab1'>
										<tr>
											<th>TYPE</th>
											<th>YEAR</th>
											<th>UNIVERSITY</th>
										</tr>
										<tr>
											<td>".$row11["TYPE"]."</td>
											<td>".$row11["BOS_YEAR"]."</td>
											<td>".$row11["UNIVERSITY"]."</td>					
										</tr>
									</table>";
						$sql12 = "SELECT * FROM MEETING_VALUATION_DETAILS WHERE ID =".$row11["ID"];
						$result12 = mysqli_query($conn,$sql12);
						if(mysqli_num_rows($result12)>0)
						{ 
							echo "<table id='student_field' class='tab1'>
									<tr>
										<td colspan='4'><h3>Meeting / Valuation Details :</h3></td>
									</tr>
									<tr>
										<th>YEAR</th>
										<th>FROM</th>
										<th>TO</th>
										<th>ATTENDANCE CERTIFICATE</th>
									</tr>";
									while($row12 = mysqli_fetch_assoc($result12))
									{
										echo "<tr>
											<td>".$row12["MEETING_YEAR"]."</td>
											<td>".$row12["MFROM"]."</td>
											<td>".$row12["MTO"]."</td>
											<td><center><a class='btn' href='".$row12["ATTENDANCE"]."'>&nbsp&nbsp&nbsp&nbspView&nbsp&nbsp&nbsp&nbsp</a></center></td>
										</tr>";
									}
									echo "</table>";
						}
						echo "</td>
						</tr>";
					}	
					echo "</table>";
				}
				else
				{
					echo "<table class=tab2><tr><td colspan='7'><h2>BOS / BOE / Valuation Details :</h2></td></tr>";
					echo "<tr><td colspan='7' align='center'>No Data Found</td></tr></table>";
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