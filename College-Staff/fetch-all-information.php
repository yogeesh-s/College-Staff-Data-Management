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
			//$eid = $_POST['name'];
			$eid = $_GET['id'];
			$eid = $eid[0]; //Solving array to string conversion
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
						echo "<tr><td><b> DESIGNATION </b></td><td>".$row["DESIGNATION"]."</td><td><b> DEPARTMENT </b></td><td>".$row["DEPARTMENT"]."</td><td><b> EMPLOYEE TYPE </b></td><td>".$row["EMPLOYEE_TYPE"]."</td></tr>";
						echo "<tr><td><b> DATE OF ENTRY INTO SERVICE</b></td><td>".$row["DATE_OF_ENTRY_SERVICE"]."</td><td><b> MODE OF APPOINTMENT</b></td><td>".$row["MODE_OF_APPOINT"]."</td>";
						if($row["DEPUTATION_FROM"]==NULL){
							echo "<td colspan='2' ></td></tr>";
						}
						else{
							echo "<td><b> DEPUTATION FROM </b></td><td>".$row["DEPUTATION_FROM"]."</td></tr>";
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


					$sql5 = "SELECT * FROM TRAINING_DETAILS WHERE EMPLOYEE_ID = '$eid'";
					$result5 = mysqli_query($conn,$sql5);
					if(mysqli_num_rows($result5)>0)
					{
						echo "<table class=tab2><tr><td colspan='6'><h2>RC / OC / Short Term Course / Workshop / Training / FDP / Conference / Seminar :</h2></td></tr>";
						echo "<tr>
								<th rowspan='2'>TYPE</th>
								<th colSpan='2'>PERIOD</th>
								<th rowspan='2'>NAME OF COURSE</th>
								<th rowspan='2'>PLACE<br>(College/MHRD/University/ASC)</th>
								<th rowspan='2'>CERTIFICATE</th>
							</tr>
							<tr>
								<th>FROM</th>
								<th>TO</th>
							</tr>
							";
						while($row5 = mysqli_fetch_assoc($result5))
						{
							echo "<tr>
									<td>".$row5["TYPE"]."</td>
									<td>".$row5["TFROM"]."</td>
									<td>".$row5["TTO"]."</td>
									<td>".$row5["NAME_OF_COURSE"]."</td>
									<td>".$row5["PLACE"]."</td>
									<td><center><a class='btn' href='".$row5["CERTIFICATE"]."'>&nbsp&nbsp&nbsp&nbspView&nbsp&nbsp&nbsp&nbsp</a></center></td>					
								</tr>";
						}
						echo "</table>";
					}
					else
					{
						echo "<table class=tab2><tr><td colspan='6'><h2>RC / OC / Short Term Course / Workshop / Training / FDP / Conference / Seminar :</h2></td></tr>";
						echo "<tr><td colspan='6' align='center'>No Data Found</td></tr></table>";
					}

					$sql4 = "SELECT * FROM paper_details WHERE EMPLOYEE_ID = '$eid'";
					$result4 = mysqli_query($conn,$sql4);
					if(mysqli_num_rows($result4)>0)
					{
						echo "<table class=tab2><tr><td colspan='7'><h2>Paper Details :</h2></td></tr>";
						echo "<tr>
								<th>TYPE</th>
								<th>LEVEL</th>
								<th>NAME</th>
								<th>DATE</th>
								<th>PAPER TITLE</th>
								<th>CERTIFICATE</th>
							</tr>

							";
						while($row4 = mysqli_fetch_assoc($result4))
						{
							echo "<tr>
									<td>".$row4["TYPE"]."</td>
									<td>".$row4["LEVEL"]."</td>
									<td>".$row4["NAME"]."</td>
									<td>".$row4["DATE"]."</td>
									<td>".$row4["PAPER_TITLE"]."</td>
									<td><center><a class='btn' href='".$row4["CERTIFICATE"]."'>&nbsp&nbsp&nbsp&nbspView&nbsp&nbsp&nbsp&nbsp</a></center></td>					
								</tr>";
						}
						echo "</table>";
					}
					else
					{
						echo "<table class=tab2><tr><td colspan='7'><h2>Paper Details :</h2></td></tr>";
						echo "<tr><td colspan='7' align='center'>No Data Found</td></tr></table>";
					}

					$sql6 = "SELECT * FROM book_PUBLISHED_details WHERE EMPLOYEE_ID = '$eid'";
					$result6 = mysqli_query($conn,$sql6);
					if(mysqli_num_rows($result6)>0)
					{
						echo "<table class=tab2><tr><td colspan='7'><h2>Book Published  Details :</h2></td></tr>";
						echo "<tr>
								<th rowspan='2'>NAME</th>
								<th rowspan='2'>NO OF CHAPTERS</th>
								<th colspan='2'>PAGES</th>
								<th rowspan='2'>DOCUMENT</th>
							</tr>
							<tr>
								<th>FROM</th>
								<th>TO</th>
							</tr>";
						while($row6 = mysqli_fetch_assoc($result6))
						{
							echo "<tr>
									<td>".$row6["NAME"]."</td>
									<td>".$row6["NO_OF_CHAPTERS"]."</td>
									<td>".$row6["BPFROM"]."</td>
									<td>".$row6["BPTO"]."</td>
									<td><center><a class='btn' href='".$row6["DOCUMENT"]."'>&nbsp&nbsp&nbsp&nbspView&nbsp&nbsp&nbsp&nbsp</a></center></td>					
								</tr>";
						}
						echo "</table>";
					}
					else
					{
						echo "<table class=tab2><tr><td colspan='7'><h2>Book Published  Details :</h2></td></tr>";
						echo "<tr><td colspan='7' align='center'>No Data Found</td></tr></table>";
					}

					$sql7 = "SELECT * FROM PROJECT_DETAILS WHERE EMPLOYEE_ID = '$eid'";
					$result7 = mysqli_query($conn,$sql7);
					if(mysqli_num_rows($result7)>0)
					{
						echo "<table class=tab2><tr><td colspan='6'><h2>Project  Details :</h2></td></tr>";
						echo "<tr>
								<th>TYPE</th>
								<th>NAME</th>
								<th>SPONSERER</th>
								<th>AMOUNT</th>
								<th>YEAR OF SANCTION</th>
								<th>DOCUMENT</th>
							</tr>";
						while($row7 = mysqli_fetch_assoc($result7))
						{
							echo "<tr>
									<td>".$row7["TYPE"]."</td>
									<td>".$row7["NAME"]."</td>
									<td>".$row7["SPONSERER"]."</td>
									<td>".$row7["AMOUNT"]."</td>
									<td>".$row7["YEAR_OF_SANCTION"]."</td>
									<td><center><a class='btn' href='".$row7["UC"]."'>&nbsp&nbsp&nbsp&nbspView&nbsp&nbsp&nbsp&nbsp</a></center></td>					
								</tr>";
						}
						echo "</table>";
					}
					else
					{
						echo "<table class=tab2><tr><td colspan='7'><h2>Project  Details :</h2></td></tr>";
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

					$sql8 = "SELECT * FROM COMMITTE_DETAILS WHERE EMPLOYEE_ID = '$eid'";
					$result8 = mysqli_query($conn,$sql8);
					if(mysqli_num_rows($result8)>0)
					{
						echo "<table class=tab2><tr><td colspan='6'><h2>Committe Membership  Details :</h2></td></tr>";
						echo "<tr>
								<th>COMMITTE NAME</th>
								<th>CHAIRPERSON / MEMBER</th>
								<th>FROM</th>
								<th>TO</th>	
							</tr>";
						while($row8 = mysqli_fetch_assoc($result8))
						{
							echo "<tr>
									<td>".$row8["COMMI_NAME"]."</td>
									<td>".$row8["CHAIRPERSON_MEMBER"]."</td>
									<td>".$row8["CMFROM"]."</td>
									<td>".$row8["CMTO"]."</td>	
								</tr>";
						}
						echo "</table>";
					}
					else
					{
						echo "<table class=tab2><tr><td colspan='7'><h2>Committe Membership  Details  Details :</h2></td></tr>";
						echo "<tr><td colspan='7' align='center'>No Data Found</td></tr></table>";
					}

					$sql9 = "SELECT * FROM GUIDESHIP_DETAILS WHERE EMPLOYEE_ID = '$eid'";
					$result9 = mysqli_query($conn,$sql9);
					if(mysqli_num_rows($result9)>0)
					{ 
						echo "<table class='tab1'>
								<tr>
									<td colspan='5'><h2>Guideship Details:</h2></td>
								</tr>";
						while($row9 = mysqli_fetch_assoc($result9))
						{
							echo "<tr>
									<td>
										<table class='tab1'>
											<tr>
												<th rowspan='2'>SUBJECT</th>
												<th rowspan='2'>UNIVERSITY NAME</th>
												<th colspan='2'>VALIDITY</th>
												<th rowspan='2'>CERTIFICATE</th>
											</tr>
											<tr>
												<th>FROM</th>
												<th>TO</th>
											</tr>
											<tr>
												<td>".$row9["SUBJECT_NAME"]."</td>
												<td>".$row9["UNIVERSITY_NAME"]."</td>
												<td>".$row9["GFROM"]."</td>
												<td>".$row9["GTO"]."</td>
												<td><center><a class='btn' href='".$row9["CERTIFICATE"]."'>&nbsp&nbsp&nbsp&nbspView&nbsp&nbsp&nbsp&nbsp</a></center></td>					
											</tr>
										</table>";
							$sql10 = "SELECT * FROM GUIDESHIP_STUDENT_DETAILS WHERE GUIDESHIP_ID =".$row9["SL_NO"];
							$result10 = mysqli_query($conn,$sql10);
							if(mysqli_num_rows($result10)>0)
							{ 
								echo "<table id='student_field' class='tab1'>
										<tr>
											<td colspan='4'><h3>Student Details :</h3></td>
										</tr>
										<tr>
											<th>STUDENT NAME</th>
											<th>REG DATE & ID</th>
											<th>TITLE OF THESIS</th>
											<th>COMPLETION DATE</th>
										</tr>";
										while($row10 = mysqli_fetch_assoc($result10))
										{
											echo "<tr>
												<td>".$row10["STUDENT_NAME"]."</td>
												<td>".$row10["REGDATE_ID"]."</td>
												<td>".$row10["TITLE_OF_THESIS"]."</td>
												<td>".$row10["COMPLETION_DATE"]."</td>
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
						echo "<table class=tab2><tr><td colspan='7'><h2>Guideship Details :</h2></td></tr>";
						echo "<tr><td colspan='7' align='center'>No Data Found</td></tr></table>";
					}
					echo "<button class='btn' onclick='window.print()'>&nbsp&nbsp&nbspPrint&nbsp&nbsp&nbsp</button>";
				}
				else{
					echo "<table class=tab2><tr><td colspan='7'><h3>Error Occured</h3></td></tr>";
					echo "<tr><td colspan='7' align='center'><br>You not selected any Employee Name <br><br>Please Select Employee Name
					<br><br>
					<a href='3.php'>Back</a>&nbsp&nbsp|&nbsp&nbsp<a href='home.php'>Home</a><br>&nbsp</td></tr></table>";
				}
		?>	
		<style type="text/css">
			a{
				color:red;
				text-shadow: none;
				font-weight: bold;
			}
		</style>
	<center>
		<?php include 'footer.php' ?>
</body>
</html>