<!DOCTYPE html>
<html>
<head>
	<title>Home Page</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<div class="header">
		<h1>GOVERNMENT FIRST GRADE COLLEGE</h1>
		<p>BAPUJI NAGARA, SHIMOGA 577201</p>
	</div>
	<br>
	<center>
		<div class="navbar">
		  <a class="nav-active" href="home.php">Home</a>
		  <a style="float:right" href="about_us.php">About Us</a>
		  <a style="float:right" href="function_home.php">Function Management</a>
		  <div class="dropdown">
		  	<button class="dropbtn">Non Teaching</button>
		    <div class="dropdown-content">
		      <a href="add_nonteacher_data.php">Registration</a>
		      <a href="nonteaching_staff_data_fetch.php">Fetch Data</a>
		   	</div>
  		  </div>
  		  <div class="dropdown">
		  	<button class="dropbtn">Teaching</button>
		    <div class="dropdown-content">
		      <a href="add_teacher_data.php">Registration</a>
		      <a href="teaching_staff_data_fetch.php">Fetch Data</a>
		      <a href="teaching_staff_data_add.php">Add Data</a>
		   	</div>
  		  </div> 
		</div>
	</center>
	<br>
	<div class="container">
		<a href="add_teacher_data.php">
			<div class="card1">
				Teaching Staff Registration
			</div>
		</a>
		<a href="add_nonteacher_data.php">
			<div class="card2">
				Non Teaching Staff Registration
			</div><br>
		</a>
		<a href="teaching_staff_data_fetch.php">
			<div class="card3">
				Get Teaching Staff Data
			</div>
		</a>
		<a href="nonteaching_staff_data_fetch.php">
			<div class="card4">
				Get Non Teaching Staff Data
			</div>
		</a>
		<a href="teaching_staff_data_add.php">
			<div class="card5">
				Add Teaching Staff Data
			</div>
		</a>
		<a href="function_home.php">
			<div class="card6">
				Function Data Management
			</div>
		</a>
	</div>
	<?php include 'footer.php' ?>
</body>
</html>