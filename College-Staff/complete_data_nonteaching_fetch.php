<!DOCTYPE html>
<html>
<head>
	<?php
		error_reporting(0);
		?>
	<title></title>
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
						echo "<table class='tab1'><tr><td id='heading' colspan='7'><h2>Personal Information :</h2></td></tr>";
						echo "<tr><td rowspan='10'><center><img src='". $row["PROFILE_PICTURE"]."' width='100' height='120'></center></td></tr>";
						echo "<tr><td><b> NAME  </b></td><td>".$row["NAME"]."<td> <b>DOB </b></td><td>".$row["DOB"]."</td><td><b>AADHAAR NO</b> </td><td>".$row["AADHAAR_NO"]."</td></tr>";
						echo "<tr><td> <b>GENDER</b></td><td>".$row["GENDER"]."</td><td> <b>MARITIAL STATUS</b></td><td>".$row["MARITIAL_STATUS"]."</td><td> <b>BLOOD GROUP</b></td><td>".$row["BLOOD_GROUP"]."</td></tr>";
						echo "<tr><td> <b>PAN NO </b></td><td>".$row["PAN_NO"]."</td><td> <b>A/C NO</b> </td><td>".$row["ACC_NO"]."</td><td> <b>IFSC CODE </b></td><td>".$row["IFSC_CODE"]."</td></tr>";
						echo "<tr><td> <b>KGID  </b></td><td>".$row["KGID"]."</td><td> <b>GPF  </b></td><td>".$row["GPFNO"]."</td><td> <b>GER  </b></td><td>".$row["GER_NO"]."</td></tr>";
						echo "<tr><td> <b>RELIGION </b></td> <td>".$row["RELIGION"]."</td><td> <b>CATEGORY </b></td> <td>".$row["CATEGORY"]."</td><td> <b>CASTE  </b></td><td> ".$row["CASTE"]."</td></tr>";
						echo "<tr><td> <b>MOBILE  </b></td><td>".$row["MOBILE_NO"]."</td><td><b> EMAIL  </b></td><td>".$row["EMAIL_ID"]."</td><td rowspan='2' colspan='2'></td></tr>";
						echo "<tr><td><b> POSTAL ADDRESS  </b></td><td>".$row["POSTAL_ADDRESS"]."</td><td><b> PERMANENT ADDRESS </b></td><td>".$row["PERMANENT_ADDRESS"]."</td></tr>";
						echo "<tr><td><b> DESIGNATION </b></td><td>".$row["DESIGNATION"]."</td><td><b> EMPLOYEE TYPE </b></td><td>".$row["EMPLOYEE_TYPE"]."</td>";
						echo "<td><b> DATE OF ENTRY INTO SERVICE</b></td><td>".$row["DATE_OF_ENTRY_SERVICE"]."</td>";
						if($row["DEPUTATION_FROM"]==NULL){
							echo "";
						}
						else{
							echo "<tr><td><b> DEPUTATION FROM </b></td><td>".$row["DEPUTATION_FROM"]."</td><td colspan='6'></td></tr>";

							}
						echo "</table>";
					}
				}

					$sql1 = "SELECT * FROM QUALIFICATION_DETAILS WHERE EMPLOYEE_ID = '$eid'";
					$result1 = mysqli_query($conn,$sql1);
					if(mysqli_num_rows($result1)>0)
					{
						echo "<table class=tab2><tr><td colspan='7'><h2>Qualification Details:</h2></td></tr>";
						echo "<tr>
								<th>QUALIFICATION</th>
								<th>BOARD / UNIVERSITY</th>
								<th>YEAR OF PASSING</th>
								<th>SUBJECTS</th>
								<th>RESULT IN %</th>
								<th>CLASS</th>
								<th>CERTIFICATE</th>
							</tr>";
						while($row1 = mysqli_fetch_assoc($result1))
						{
							echo "<tr>
								<td>".$row1["QUALIFICATION"]."</td>
								<td>".$row1["BOARD_UNIVERSITY"]."</td>
								<td>".$row1["YEAR_OF_PASS"]."</td>
								<td>".$row1["SUBJECTS"]."</td>
								<td>".$row1["RESULT_IN_PERCENT"]."</td>
								<td>".$row1["CLASS"]."</td>
								<td><center><a class='btn' href='".$row1["QUALIFICATION_DOCUMENTS"]."' target='_blank'>&nbsp&nbsp&nbsp&nbspView&nbsp&nbsp&nbsp&nbsp</a></center></td>
							</tr>";
						}
						echo "</table>";
					}
					else
					{
						echo "<table class=tab2><tr><td colspan='7'><h2>Qualification Details :</h2></td></tr>";
						echo "<tr><td colspan='7' align='center'>No Data Found</td></tr></table>";
					}

					$sql2 = "SELECT * FROM SERVICE_DETAILS WHERE EMPLOYEE_ID = '$eid'";
					$result2 = mysqli_query($conn,$sql2);
					if(mysqli_num_rows($result2)>0)
					{
						echo "<table class=tab2><tr><td colspan='3'><h2>Service Details :</h2></td></tr>";
						echo "<tr>
								<th>NAME OF COLLEGE</th>
								<th>FROM</th>
								<th>TO</th>
							</tr>";
						while($row2 = mysqli_fetch_assoc($result2))
						{
							echo "<tr>
									<td>".$row2["NAME_OF_COLLEGE"]."</td>
									<td>".$row2["SFROM"]."</td>
									<td>".$row2["STO"]."</td>
								</tr>";
						}
						echo "</table>";
					}
					else
					{
						echo "<table class=tab2><tr><td colspan='7'><h2>Service Details :</h2></td></tr>";
						echo "<tr><td colspan='7' align='center'>No Data Found</td></tr></table>";
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
					}
					else
					{
						echo "<table class=tab2><tr><td colspan='7'><h2>Department Exam Details :</h2></td></tr>";
						echo "<tr><td colspan='7' align='center'>No Data Found</td></tr></table>";
					}



					$sql8 = "SELECT * FROM AWARD_DETAILS WHERE EMPLOYEE_ID = '$eid'";
					$result8 = mysqli_query($conn,$sql8);
					if(mysqli_num_rows($result8)>0)
					{
						echo "<table class=tab2><tr><td colspan='6'><h2>Awards  Details :</h2></td></tr>";
						echo "<tr>
								<th>NAME</th>
								<th>AWARD ORGANISATION</th>
								<th>CERTIFICATE</th>		
							</tr>";
						while($row8 = mysqli_fetch_assoc($result8))
						{
							echo "<tr>
									<td>".$row8["NAME"]."</td>
									<td>".$row8["AWARD_ORGANISATION"]."</td>
									<td><center><a class='btn' href='".$row8["CERTIFICATE"]."'>&nbsp&nbsp&nbsp&nbspView&nbsp&nbsp&nbsp&nbsp</a></center></td>					
								</tr>";
						}
						echo "</table>";
					}
					else
					{
						echo "<table class=tab2><tr><td colspan='7'><h2>Awards  Details :</h2></td></tr>";
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