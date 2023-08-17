<!DOCTYPE html>
<html>
<head>
	<title>Details of User</title>
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
	<div class="select_field" align="center">
		<form action="committe_data.php" method="POST">
			<table>
				<tr>
					<td class="font_bold" align="center">COMMITTE NAME</td><td class="font_bold" align="center">FROM</td><td class="font_bold" align="center">TO</td>
				</tr>
				<tr>
				<td>
					<select name="committe_name">
								<option>---Select---</option>
								<option>IQAC</option>
								<option>NAAC</option>
								<option>NSS</option>
								<option>NCC</option>
								<option>YRC</option>
								<option>ROVER</option>
								<option>RANGER</option>
								<option>POSH</option>
								<option>TIMETABLE</option>
								<option>PURCHASE</option>
								<option>TENDER</option>
								<option>SC/ST CELL</option>
								<option>GRIVANCE REDRESSAL</option>
								<option>ANTI RAGGING</option>
								<option>EXAMINATION</option>
								<option>WOMAN EMPOWERMENT</option>
								<option>DISCIPLINARY</option>
								<option>MAGAZINE</option>
								<option>OBC CELL</option>
								<option>MINORITY CELL</option>
					</select>
				</td>
				<td>
					<select name="start" >
						<option>---Select---</option>
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
					<select name="stop" >
						<option>---Select---</option>
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
		</form>
	</div>
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
		}

		.list td{
			padding: 5px 30px 5px 30px;
		}
		.btn{
			text-align: center;
			background: #3395FF;
			border: none;
			border-radius: 5px;
			padding: 10px;
			color: #fff;
		}
		input[type='date']{
			padding: 7px;
			border: #C3C3C3 solid 1px;
			margin: 5px;
		}
	</style>
	</center>
	<style type="text/css">
		.select_field{
			padding: 50px;
		}

		.select_field select{
			border: 1px solid rgb(195 195 195);
			border-radius: 3px;
			font-weight: 600;
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