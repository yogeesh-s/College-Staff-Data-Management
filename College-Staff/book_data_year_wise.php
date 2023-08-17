<!DOCTYPE html>
<html>
<head>
	<title>Book Data Year Wise</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<script type="text/javascript" src="js/jquery-3.6.0.min.js"></script>
	<?php 
		include 'connection.php'; 
	?>
	</script>
</head>
<body>
	<div class="header">
		<h1>GOVERNMENT FIRST GRADE COLLEGE</h1>
		<p>BAPUJI NAGARA, SHIMOGA 577201</p>
	</div>
	<?php include 'header.php' ?>
	<h2 align="center">Book Guide Year Wise</h2>
	<div class="select_field" align="center">
		<form action="book_data_year_wise_fetch.php" method="POST">
			<center>
			<table>
				<tr>
					<td class="font_bold" align="center">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspStart Year&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</td><td class="font_bold" align="center">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspEnd Year&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</td>
				</tr>
				<tr>
				<td>
					&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<select name="start" >
						<option>2030</option>
						<option>2029</option>
						<option>2028</option>
						<option>2027</option>
						<option>2026</option>
						<option>2025</option>
						<option>2024</option>
						<option>2023</option>
						<option>2022</option>
						<option>2021</option>
						<option>2020</option>
						<option>2019</option>
						<option>2018</option>
						<option>2017</option>
						<option>2016</option>
						<option>2015</option>
						<option>2014</option>
						<option>2013</option>
						<option>2012</option>
						<option>2011</option>
						<option>2010</option>
						<option>2009</option>
						<option>2008</option>
						<option>2007</option>
						<option>2006</option>
						<option>2005</option>
						<option>2004</option>
						<option>2003</option>
						<option>2002</option>
						<option>2001</option>
						<option>2000</option>
						<option>1999</option>
						<option>1998</option>
						<option>1997</option>
						<option>1996</option>
						<option>1995</option>
						<option>1994</option>
						<option>1993</option>
						<option>1992</option>
						<option>1991</option>
						<option>1990</option>
					</select>
				</td>
				<td>
					&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<select name="stop" >
						<option>2030</option>
						<option>2029</option>
						<option>2028</option>
						<option>2027</option>
						<option>2026</option>
						<option>2025</option>
						<option>2024</option>
						<option>2023</option>
						<option>2022</option>
						<option>2021</option>
						<option>2020</option>
						<option>2019</option>
						<option>2018</option>
						<option>2017</option>
						<option>2016</option>
						<option>2015</option>
						<option>2014</option>
						<option>2013</option>
						<option>2012</option>
						<option>2011</option>
						<option>2010</option>
						<option>2009</option>
						<option>2008</option>
						<option>2007</option>
						<option>2006</option>
						<option>2005</option>
						<option>2004</option>
						<option>2003</option>
						<option>2002</option>
						<option>2001</option>
						<option>2000</option>
						<option>1999</option>
						<option>1998</option>
						<option>1997</option>
						<option>1996</option>
						<option>1995</option>
						<option>1994</option>
						<option>1993</option>
						<option>1992</option>
						<option>1991</option>
						<option>1990</option>
					</select>
				</td>
				<td>
					<input  class="btn" type="submit" value="Get Data">
				</td>
				</tr>
			</table>
		</form>
	</div>
	<br>
	<h2 align="center">Book Consolidate Data</h2>
	<style type="text/css">
		.list{
			margin-top: 10px;
			border: #EDEDED solid 1px;
			padding: 10px 0px 10px 0px;
			border-collapse: collapse;
			font-size: 16px;
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
			padding: 5px;
			border: 1px solid #D5D5D5;
		}

		.list td{
			padding: 25px;
			border: 1px solid #EDEDED;
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
		input[type='date']{
			padding: 7px;
			border: #C3C3C3 solid 1px;
			margin: 5px;
		}
	</style>
		<?php
			$sql = "SELECT pid.NAME AS PNAME,bpd.NAME AS BNAME,pid.EMPLOYEE_ID,NO_OF_CHAPTERS,BPFROM,BPTO,BP_YEAR,DOCUMENT FROM PERSONAL_INFORMATION_DETAILS pid,BOOK_PUBLISHED_DETAILS bpd WHERE pid.EMPLOYEE_ID = bpd.EMPLOYEE_ID AND BP_YEAR BETWEEN '1900' AND '2100'";
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
		.select_field{
			padding: 15px;
		}

		.select_field select{
			border: 1px solid rgb(195 195 195);
			border-radius: 3px;
			font-size: 14px;
			padding: 7px;
			color: #444444;
		}

		.font_bold{
			font-weight: bold;
		}

	</style>
	<?php include 'footer.php' ?>
</body>
</html>