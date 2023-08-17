<!DOCTYPE html>
<html>
<head>
	<title>Teaching Staff Data Fetch</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<style>
		@import url('https://fonts.googleapis.com/css2?family=Ubuntu');
		@import url('https://fonts.googleapis.com/css2?family=Roboto');
		*{
			padding:0;	
			margin:0;
			text-decoration: none;
		}

		body{
			padding: 0% 3% 0% 3%;
			font-family: 'Roboto', sans-serif;
			color: #444444;

		}
		.header{
			text-align: center;
		}
		.header h1{
			margin-top: 5px;
			font-family: 'Ubuntu', sans-serif;
		}
		.container{
			width: 80%;
			margin: auto;
			padding: 20px;
		}
		.box{
			border: #00d2ff double 1px;
			border-radius: 20px 0px 20px 0px;

		}
		.heading{
			padding: 5px;
			margin: 0px;
			background: linear-gradient(90deg, #00d2ff 0%, #3a47d5 100%);
			color: #fff;	
			font-weight: bold;
			font-size: 24px;
			text-align: center;
			border-radius: 20px 0px 0px 0px;
		}
		.box a{
			background: linear-gradient(90deg, #00C9FF 0%, #92FE9D 100%);
			color: #606060;
			font-weight: bold;
			padding: 20px;
			margin: 10px;
			border-radius: 25px 5px 25px 0px; 
			text-shadow: none;
		}
	</style>
</head>
<body>
	<div class="header">
		<h1>GOVERNMENT FIRST GRADE COLLEGE</h1>
		<p>BAPUJI NAGARA, SHIMOGA 577201</p>
	</div>
	<?php include 'header.php' ?>
	<div class="container">
		<div class="box">
			<div class="heading"> FETCH USING EMPLOYEE NAME</div>
			<br><br>
			<center>
				<a href="teacher_complete_data.php">TEACHER COMPLETE DATA</a>
				<a href="service_data_fetch.php">SERVICE DATA</a>
				<a href="department_exam_data.php">DEPARTMENT EXAM DATA</a><br><br><br><br>
				<a href="conference_data.php">RC / OC / SHORT TERM COURSE / WORKSHOP / TRAINING / FDP / CONFERENCE / SEMINAR DATA</a><br><br><br><br>
				<a href="paper_data.php">PAPER DATA</a>
				<a href="book_published_data.php">BOOK PUBLISHED DATA</a><br><br><br><br>
				<a href="project_data.php">PROJECT MINOR / MAJOR DATA</a>
				<a href="bos_boe_valuation_data.php">BOS / BOE / VALUATION MEMBER DATA</a><br><br><br><br>
				<a href="guideship_data.php">GUIDESHIP DATA</a>
				<a href="award_data.php">AWARDS DATA</a><br><br><br><br>
				<a href="committe_membership_data.php">COMMITTE MEMBERSHIP DATA</a><br><br><br>
			</center>
		</div>
		<br>
		<div class="box">
			<div class="heading"> TEACHER DATA YEAR WISE</div>
			<br><br>
			<center>
				<a href="teacher_experience_data.php">EXPERIENCE DATA</a>
				<a href="paper_data_year_wise.php">PAPER DETAILS</a>
				<a href="research_guide_data_year_wise.php">RESEARCH GUIDE</a><br><br><br><br>
				<a href="book_data_year_wise.php">BOOK DATA</a>
				<a href="research_student_year_wise_data.php">RESEARCH STUDENT</a><br><br><br><br>
				<a href="conference_data_year_wise.php">RC / OC / SHORT TERM COURSE / WORKSHOP / TRAINING / FDP / CONFERENCE / SEMINAR DATA</a><br><br><br><br>
				<a href="bos_boe_valuation_data_year_wise.php">BOS / BOE / VALUATION MEMBER DATA</a><br><br><br><br>
				<a href="project_data_year_wise.php">PROJECT MINOR / MAJOR DATA</a><a href="committe_data_year_wise.php">COMMITTE DATA</a><br><br><br>
			</center>
		</div>
	</div>
	<?php include 'footer.php' ?>
</body>
</html>