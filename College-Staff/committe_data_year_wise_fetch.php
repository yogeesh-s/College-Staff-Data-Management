<!DOCTYPE html>
<html>
<head>
	<?php
		//error_reporting(0);
		?>
	<title>Committee Data</title>
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
		<h2 align="center">COMMITTEE DATA</h2>
		<br>
		<?php
			$type = $_POST['name'];
			$start = $_POST['start'];
			$stop = $_POST['stop'];			
			$sql3 = "SELECT * FROM COMMITTE_DETAILS CD,PERSONAL_INFORMATION_DETAILS PID WHERE COMMI_NAME = '$type' AND PID.EMPLOYEE_ID = CD.EMPLOYEE_ID AND CHAIRPERSON_MEMBER = 'Chairman' AND CMFROM >= '$start' AND CMTO <= '$stop'";
			$result3 = mysqli_query($conn,$sql3);
			if(mysqli_num_rows($result3)>0)
			{
				$sl=1;
				echo "<table class=tab2><tr><td colspan='4'><h2> Chairperson Details :</h2></td></tr>";
				echo "<tr>
						<th>SL NO</th>
						<th>Chairperson</th>
						<th>FROM</th>
						<th>TO</th>
					</tr>";
				while($row3 = mysqli_fetch_assoc($result3))
				{
					echo "<tr>
							<td>".$sl."</td>
							<td>".$row3["NAME"]."</td>
							<td>".$row3["CMFROM"]."</td>	
							<td>".$row3["CMTO"]."</td>				
						</tr>";
						$sl++;
				}
				echo "</table>";
			}

			$sql4 = "SELECT * FROM COMMITTE_DETAILS CD,PERSONAL_INFORMATION_DETAILS PID WHERE COMMI_NAME = '$type' AND PID.EMPLOYEE_ID = CD.EMPLOYEE_ID AND CHAIRPERSON_MEMBER = 'Member' AND CMFROM >= '$start' AND CMTO <= '$stop'";
			$result4 = mysqli_query($conn,$sql4);
			if(mysqli_num_rows($result4)>0)
			{
				$sl=1;
				echo "<table class=tab2><tr><td colspan='4'><h2> Member Details :</h2></td></tr>";
				echo "<tr>
						<th>SL NO</th>
						<th>Chairperson</th>
						<th>FROM</th>
						<th>TO</th>
					</tr>";
				while($row4 = mysqli_fetch_assoc($result4))
				{
					echo "<tr>
							<td>".$sl."</td>
							<td>".$row4["NAME"]."</td>
							<td>".$row4["CMFROM"]."</td>	
							<td>".$row4["CMTO"]."</td>				
						</tr>";
						$sl++;
				}
				echo "</table>";
			}

		

			echo "<button class='btn' onclick='window.print()'>&nbsp&nbsp&nbspPrint&nbsp&nbsp&nbsp</button>";
			
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