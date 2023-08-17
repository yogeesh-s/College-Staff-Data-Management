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
		.table_head{
			height: 50px;
			background: #EDEDED;
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
		.box{
			border: 1px solid #cbcbcb;
			padding: 10px;
			margin: 10px;
		}
	</style>
	<div class="header">
		<h1>GOVERNMENT FIRST GRADE COLLEGE</h1>
		<p>BAPUJI NAGARA, SHIMOGA 577201</p>
	</div>
	<?php include 'header.php' ?>
	<center>
		<h2>BOS / BOE / VALUATION DATA</h2>
		<?php
			$start = $_POST['start'];
			$stop = $_POST['stop'];
			$type = $_POST['bos_type'];
			$sql1 = "SELECT ID FROM BOS_BOE_VALUATION_DEATAILS WHERE BOS_YEAR BETWEEN '$start' AND '$stop' AND TYPE = '$type'";
			$result1 = mysqli_query($conn,$sql1);
			$sl = 0;
			if(mysqli_num_rows($result1)>0)
			{
				while($row1 = mysqli_fetch_assoc($result1))
				{
					$id = $row1["ID"];
					$sql2 = "SELECT ID,NAME FROM PERSONAL_INFORMATION_DETAILS pid,BOS_BOE_VALUATION_DEATAILS bvd WHERE pid.EMPLOYEE_ID = bvd.EMPLOYEE_ID AND ID='$id'";
					$result2 = mysqli_query($conn,$sql2);
					if(mysqli_num_rows($result2)>0)
					{
						while($row2 = mysqli_fetch_assoc($result2))
						{
							echo "<div class='box'>";
							echo "<br><table class='tab1'>";
							echo "<tr><td>NAME</td><td>".$row2["NAME"]."</td></tr>";
							echo "</table>";
					
							$sql3 = "SELECT * FROM BOS_BOE_VALUATION_DEATAILS WHERE ID = $id";
							$result3 = mysqli_query($conn,$sql3);
							{
								if(mysqli_num_rows($result3)>0)
								{ 
									while($row3 = mysqli_fetch_assoc($result3))
									{
										echo "<table class='tab1'>
										<tr class='table_head'>
													<th>TYPE</th>
													<th>YEAR</th>
													<th>UNIVERSITY</th>
												</tr>
												<tr>
													<td>".$row3["TYPE"]."</td>
													<td>".$row3["BOS_YEAR"]."</td>
													<td>".$row3["UNIVERSITY"]."</td>					
												</tr>";
										$sql4 = "SELECT * FROM MEETING_VALUATION_DETAILS WHERE ID = $id";
										$result4 = mysqli_query($conn,$sql4);
										if(mysqli_num_rows($result4)>0)
										{ 
											echo "<table id='student_field' class='tab1'>
													<tr>
														<td colspan='4'><h3>Meeting / Valuation Details :</h3></td>
													</tr>
													<tr class='table_head'>
														<th>YEAR</th>
														<th>FROM</th>
														<th>TO</th>
														<th>ATTENDANCE CERTIFICATE</th>
													</tr>";
													while($row4 = mysqli_fetch_assoc($result4))
													{
														echo "<tr>
															<td>".$row4["MEETING_YEAR"]."</td>
															<td>".$row4["MFROM"]."</td>
															<td>".$row4["MTO"]."</td>
															<td><center><a class='btn' href='".$row4["ATTENDANCE"]."'>&nbsp&nbsp&nbsp&nbspView&nbsp&nbsp&nbsp&nbsp</a></center></td>
														</tr>";
													}
													echo "</table>";
										}
										echo "</td>
										</tr>";
									}	
									echo "</table>";
								}	
							}
							echo "</div>";
						}
					}
					$sl++;
				}
				echo "Number of BOS / BOE / BOE is ".$sl;
				echo "<br><br><button class='btn' onclick='window.print()'>&nbsp&nbsp&nbspPrint&nbsp&nbsp&nbsp</button>";
				
			}
			else{
				echo "<center>No Data Found</center>";

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