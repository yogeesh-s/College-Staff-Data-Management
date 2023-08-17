<!DOCTYPE html>
<html>
<head>
	<title>Non Teaching Staff Registration Form</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<script type="text/javascript" src="js/jquery-3.6.0.min.js"></script>
	<?php 
		include 'connection.php'; 
		include 'functions.php';
	?>
	<script type="text/javascript">
		$(document).ready(function(){
			$("#add_qualification").click(function(){
				var edu = '<tr><td><input type="text" name="qualification[]" ></td><td><input type="text" name="board[]" ></td><td><input type="text" name="year[]" ></td><td><input type="text" name="subjects[]" ></td><td><input type="text" name="result[]" ></td><td><input type="text" name="class[]" ></td><td><input type="file" name="quldoc[]"></td><td><input class="rmvbtn" type="button" name="Remove" id="remove" value="Remove"></td></tr>';
				$("#education_field").append(edu);
				
			});

			$("#education_field").on('click','#remove',function(){
				$(this).closest('tr').remove();
			});

			$("#add_serv").click(function(){
				var serv = '<tr><td><input type="text" name="name_of_college[]" ></td><td><input type="date" name="sfrom[]" ></td><td><input type="date" name="sto[]" ></td><td><input class="rmvbtn" type="button" name="Remove" id="remove" value="Remove"></td></tr>';
				$("#service_field").append(serv);
			});

			$("#service_field").on('click','#remove',function(){
				$(this).closest('tr').remove();
			});

			$("#add_dept").click(function(){
				var dept = '<tr><td><input type="text" name="dept_exam_name[]" ></td><td><input type="text" name="dept_regno[]" ></td><td><select name="dept_year_of_pass[]" ><option>---Select---</option><option>2030</option><option>2029</option><option>2028</option><option>2027</option><option>2026</option><option>2025</option><option>2024</option><option>2023</option><option>2022</option><option>2021</option><option>2020</option><option>2019</option><option>2018</option><option>2017</option><option>2016</option><option>2015</option><option>2014</option><option>2013</option><option>2012</option><option>2011</option><option>2010</option><option>2009</option><option>2008</option><option>2007</option><option>2006</option><option>2005</option><option>2004</option><option>2003</option><option>2002</option><option>2001</option><option>2000</option><option>1999</option><option>1998</option><option>1997</option><option>1996</option><option>1995</option><option>1993</option><option>1992</option><option>1991</option><option>1990</option></select></td><td><input type="file" name="dept_document[]"></td><td> <input class="rmvbtn" type="button" name="Remove" id="remove" value="Remove"></td></tr>';
				$("#dept_field").append(dept);
			});

			$("#dept_field").on('click','#remove',function(){
				$(this).closest('tr').remove();
			});

			$("#add_award").click(function(){
				var award = '<tr><td><input type="text" name="award_name[]" ></td><td><input type="text" name="award_organiser[]" ></td><td><input type="file" name="award_certificate[]"></td><td> <input class="rmvbtn" type="button" name="Remove" id="remove" value="Remove"></td></tr>';
				$("#award_field").append(award);
			});

			$("#award_field").on('click','#remove',function(){
				$(this).closest('tr').remove();
			});


		});
	</script>
</head>
<body>
	<div class="header">
		<h1>GOVERNMENT FIRST GRADE COLLEGE</h1>
		<p>BAPUJI NAGARA, SHIMOGA 577201</p>
	</div>
	<?php include 'header.php' ?>
	<hr>
		<h1 class="heading">NON TEACHING STAFF REGISTRATION</h1>
	<hr>
		<form method="POST" enctype="multipart/form-data" autocomplete="off">
			<table class="tab1">
				<tr>
					<th><label class="required">SELECT EMPLOYEE TYPE</label></th>
					<th><select name="e_type" required><option>Permanent</option><option>Contract</option><option>CDC</option></select></th>
				</tr>
			</table>
			<table class="tab1">
				<tr>
					<td colspan="6">
						<h2>Personal Information :</h2>
					</td>
				</tr>
				<tr>
					<td> <label class="required">NAME</label>  </td><td><input type="text" name="name" required></td>

					<td> <label class="required">DOB </label></td><td><input type="date" name="dob" value="<?php echo isset($_POST["dob"]) ? $_POST["dob"] : ''; ?>" / required></td>
					<td> <label class="required">AADHAAR NO </label></td><td><input type="tel" id="aadhaar" name="aadhaar_no" pattern="[0-9]{12}" <?php echo isset($_POST["aadhaar"]) ? $_POST["aadhaar"] : ''; ?> required></td>
				</tr>
				<tr>
					<td> <label class="required"> GENDER  </label></td><td><input type="radio" name="gender" value="Male" required> Male <input type="radio" name="gender" value="Female"> Female <input type="radio" name="gender" value="Other"> Other</td>
					<td> <label class="required">MARITIAL STATUS </label></td><td><input type="radio" name="maritial_status" value="Married"required> Married <input type="radio" name="maritial_status" value="Unmarried"> Unmarried</td>
					<td> BLOOD GROUP  </td><td><select name="blood_group"><option>None</option><option>A+</option><option>O+</option><option>B+</option><option>AB+</option><option>A-</option><option>O-</option><option>B-</option><option>AB-</option></td>
				</tr>
				<tr>
					<td> <label>PAN NO  </label></td><td><input type="text" name="pan_no"></td>
					
					<td> <label>A/C NO  </label></td><td><input type="text" name="acc_no"></td>
					<td> <label>IFSC CODE  </label></td><td><input type="text" name="ifsc_code"></td>
				</tr>
				<tr>
					<td> KGID  </td><td><input type="text" name="kgid"></td>
					<td> GPF / PRAN </td><td><input type="text" name="gpf"></td>
					<td> GER  </td><td><input type="text" name="ger"></td>
				</tr>
				<tr>
					<td> <label class="required">RELIGION  </label></td><td><select name="religion"><option>Hindu</option><option>Muslim</option><option>Christian</option><option>Sikh</option><option>Buddhist</option><option>Jain</option><option>Other Religion</option></select></td>
					<td> <label class="required">CATEGORY  </label></td><td><select name="category"><option>General</option><option>SC</option><option>ST</option><option>Cat-1</option><option>Cat-2</option><option>Cat-3</option></select></td>
					<td> <label class="required">CASTE  </label></td><td><input type="text" name="caste"></td>
				</tr>
				<tr>
					<td> <label class="required">MOBILE  </label></td><td><input type="tel" name="mobile" id="mobile" pattern="[0-9]{10}" required value="<?php echo isset($_POST["mobile"]) ? $_POST["mobile"] : ''; ?>"></td>
					<td> <label class="required">EMAIL  </label></td><td><input id="email" type="text" name="email" pattern="[a-zA-Z0-9.-_]{1,}@[a-zA-Z0-9.-]{2,}[.]{1}[a-zA-Z0-9]{2,}" <?php echo isset($_POST["email"]) ? $_POST["email"] : ''; ?> required></td>
					<td rowspan="2" colspan="2"></td>
				</tr>
				<tr>
					<td> <label class="required">POSTAL ADDRESS  </label></td><td><textarea name="postal_address" required></textarea></td>
					<td> <label class="required">PERMANENT ADDRESS </label></td><td><textarea name="parmanent_address" required></textarea></td>
				</tr>
				<tr>
					<td>DESIGNATION</td>
					<td>
						<select name="designation">
							<option>SDA</option>
							<option>FDA</option>
							<option>Typist</option>
							<option>Senior Typist</option>
							<option>Superintendent</option>
							<option>Manager</option>
						</select>
					</td>
					<td colspan="4">
						
					</td>
					
					
				</tr>
				<tr>
					<td> DATE OF ENTRY INTO SERVICE </td><td><input type="date" name="date_of_entry_service" value="<?php echo date('Y-m-d'); ?>"></td>
					<td> DEPUTATION</td><td><input type="radio" name="deputation" value="Yes" required> Yes <input type="radio" name="deputation" value="No"> No </td>
					<td>DEPUTATION FROM</td><td><input type="date" name="deputation_from"></td>
				</tr>
				<tr>
					<td><label class="required">UPLOAD PICTURE</label></td>
					<td>
					    <input class="profile_pic" type="file" name="profile_pic" required><br>
					    <span class="info_red"> * File should be less than 500Kb <br> * Allowed file types jpg , png , jpeg , gif</span>
					    <style>
					    	.info_red{
					    		color: red;
					    		font-size: 12px;
					    		text-align: left;
					    	}
					    	.profile_pic{
					    		border:none;
					    	}
					    </style>
					</td>
					<td colspan="4"></td>
				</tr>
				</table>
				<div style="overflow-x:auto;">
				<table id="education_field" class="tab1">
					<tr>
						<td colspan="8"><h2>Academic Qualification :</h2></td>
					</tr>
					<tr>
						<th>QUALIFICATION</th>
						<th>BOARD / UNIVERSITY</th>
						<th>YEAR OF PASSING</th>
						<th>SUBJECTS</th>
						<th>RESULT IN %</th>
						<th>CLASS</th>
						<th>UPLOAD CERTIFICATE<br>
					    <span class="info_red"> * File should be less than 500Kb <br> * Allowed file types jpg , png , jpeg , gif, pdf</span></th>
						<th></th>
					</tr>
					<tr>
						<td><input type="text" value="SSLC" name="qualification[]" readonly></td>
						<td><input type="text" name="board[]" ></td>
						<td><input type="text" name="year[]" ></td>
						<td><input type="text" name="subjects[]" ></td>
						<td><input type="text" name="result[]" ></td>
						<td><input type="text" name="class[]" ></td>
						<td><input type="file" name="quldoc[]"></td>
						<td></td>
					</tr>
					<tr>
						<td><input type="text" name="qualification[]"></td>
						<td><input type="text" name="board[]" ></td>
						<td><input type="text" name="year[]" ></td>
						<td><input type="text" name="subjects[]" ></td>
						<td><input type="text" name="result[]" ></td>
						<td><input type="text" name="class[]" ></td>
						<td><input type="file" name="quldoc[]"></td>
						<td><input class="addbtn" type="button" name="add" id="add_qualification" value="Add"></td>
					</tr>
				</table>
				</div>
				<table id="service_field" class="tab1">
					<tr>
						<td colspan="4"><h2>Service Data :</h2></td>
					</tr>
					<tr>
						<th>NAME OF COLLEGE</th>
						<th>FROM</th>
						<th>TO</th>
						<th></th>
					</tr>
					<tr>
						<td><input type="text" name="name_of_college[]"></td>
						<td><input type="date" name="sfrom[]"></td>
						<td><input type="date" name="sto[]"></td>
						<td><input class="addbtn" type="button" name="add" id="add_serv" value="Add"></td>
					</tr>
				</table>
				<table id="dept_field" class="tab1">
					<tr>
						<td colspan="6"><h2>Department Exam Details :</h2></td>
					</tr>
					<tr>
						<th>NAME</th>
						<th>REG NO</th>
						<th>YEAR OF PASSING</th>
						<th>CERTIFICATE<br>
					    <span class="info_red"> * File should be less than 500Kb <br> * Allowed file types jpg , png , jpeg , gif, pdf</span></th>
						<th></th>
					</tr>
					<tr>
						<td><input type="text" name="dept_exam_name[]" ></td>
						<td><input type="text" name="dept_regno[]" ></td>
						<td><select name="dept_year_of_pass[]" >
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
						<td><input type="file" name="dept_document[]"></td>
						<td><input class="addbtn" type="button" name="add" id="add_dept" value="Add"></td>
					</tr>
				</table>
				<table id="award_field" class="tab1">
					<tr>
						<td colspan="6"><h2>Awards :</h2></td>
					</tr>
					<tr>
						<th>NAME</th>
						<th>AWARD ORGANISATION</th>
						<th>CERTIFICATE<br>
					    <span class="info_red"> * File should be less than 500Kb <br> * Allowed file types jpg , png , jpeg , gif, pdf</span></th>
						<th></th>
					</tr>
					<tr>
						<td><input type="text" name="award_name[]" ></td>
						<td><input type="text" name="award_organiser[]" ></td>
						<td><input type="file" name="award_certificate[]"></td>
						<td><input class="addbtn" type="button" name="add" id="add_award" value="Add"></td>
					</tr>
				</table>

				<?php
					if(isset($_POST['save']))
					{
						$e_type = $_POST['e_type'];
						$name = $_POST['name'];
						$dob  = $_POST['dob'];
						$new_dob = $new_date = date('Y-m-d', strtotime($_POST['dob']));
						$aadhaar_no  = $_POST['aadhaar_no'];
						$gender  = $_POST['gender'];
						$maritial_status  = $_POST['maritial_status'];
						$blood_group  = $_POST['blood_group'];
						$pan_no  = $_POST['pan_no'];
						$acc_no  = $_POST['acc_no'];
						$ifsc_code  = $_POST['ifsc_code'];
						$kgid  = $_POST['kgid'];
						$gpf  = $_POST['gpf'];
						$ger  = $_POST['ger'];
						$religion  = $_POST['religion'];
						$category  = $_POST['category'];
						$caste  = $_POST['caste'];
						$mobile  = $_POST['mobile'];
						$email  = $_POST['email'];
						$postal_address  = $_POST['postal_address'];
						$parmanent_address  = $_POST['parmanent_address'];
						$designation = $_POST['designation'];
						$deputation = $_POST['deputation'];
						$date_of_entry_service  = $_POST['date_of_entry_service'];
						$deputation_from  = $_POST['deputation_from'];

						if(!empty($_FILES['profile_pic']["name"]))
						{
							$targetDir = "uploads/";
							$fileName = $_FILES['profile_pic']['name'];
							$targetFilePath = $targetDir . $fileName;
							$fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);
							$allowTypes = array('jpg','png','jpeg','gif');
							$path = $targetDir .  round(((microtime(true)*1000)*rand(0,10000))/999999999). $fileName;
							if(in_array($fileType, $allowTypes))
							{
								if($_FILES['profile_pic']['size']<512000)
								{
									if(move_uploaded_file($_FILES['profile_pic']['tmp_name'], $path))
									{
										if($deputation=="Yes"){
											$stmt = "INSERT INTO personal_information_details(STAFF_TYPE,EMPLOYEE_TYPE,NAME,DOB,AADHAAR_NO,GENDER,MARITIAL_STATUS,BLOOD_GROUP,PAN_NO,ACC_NO,IFSC_CODE,KGID,GPFNO,GER_NO,RELIGION,CATEGORY,CASTE,MOBILE_NO,EMAIL_ID,POSTAL_ADDRESS,PERMANENT_ADDRESS,DESIGNATION,DEPARTMENT,MODE_OF_APPOINT,DATE_OF_ENTRY_SERVICE,DEPUTATION_FROM,PROFILE_PICTURE)VALUES('TEACHING','".$e_type."','".$name."','".$dob."','".$aadhaar_no."','".$gender."','".$maritial_status."','".$blood_group."','".$pan_no."','".$acc_no."','".$ifsc_code."','".$kgid."','".$gpf."','".$ger."','".$religion."','".$category."','".$caste."','".$mobile."','".$email."','".$postal_address."','".$parmanent_address."','".$designation."','".$department."','".$mode_of_appoint."','".$date_of_entry_service."','".$deputation_from."','".$path."')";
											$query = mysqli_query($conn,$stmt);
											getandinsert($mobile,$conn);
										}
										else{
											$stmt = "INSERT INTO personal_information_details(STAFF_TYPE,EMPLOYEE_TYPE,NAME,DOB,AADHAAR_NO,GENDER,MARITIAL_STATUS,BLOOD_GROUP,PAN_NO,ACC_NO,IFSC_CODE,KGID,GPFNO,GER_NO,RELIGION,CATEGORY,CASTE,MOBILE_NO,EMAIL_ID,POSTAL_ADDRESS,PERMANENT_ADDRESS,DESIGNATION,DEPARTMENT,MODE_OF_APPOINT,DATE_OF_ENTRY_SERVICE,PROFILE_PICTURE)VALUES('NONTEACHING','".$e_type."','".$name."','".$dob."','".$aadhaar_no."','".$gender."','".$maritial_status."','".$blood_group."','".$pan_no."','".$acc_no."','".$ifsc_code."','".$kgid."','".$gpf."','".$ger."','".$religion."','".$category."','".$caste."','".$mobile."','".$email."','".$postal_address."','".$parmanent_address."','".$designation."','".$department."','".$mode_of_appoint."','".$date_of_entry_service."','".$path."')";
											$query = mysqli_query($conn,$stmt);
											getandinsert($mobile,$conn);
										}
									}
								}
								else
								{
									echo "<script>alert('Profile Picture is greater than 500Kb');</script>";
								}
							}
						}
						else
						{
							echo "<script>alert('Error Occured Please Try Again');</script>";
						}
					}

				?>
				<center>
					<br>
					<style>
						.sbtn{
							background: #0d9e31;
							color: white;
							padding: 10px;
							font-size: 15px;
							font-family: 'Roboto',sans-serif;
							border-radius: 5px;
							text-shadow: 2px 2px 5px black;
							text-align: center;
							border: none;
						}
					</style>
					<input class="sbtn" type="submit" name="save" id="sbtn" value="Save Data">
					&nbsp&nbsp&nbsp&nbsp
					<input class="wrnbtn" type="reset" name="add" id="add" value="Reset">
					<br>
				</center>
		</form>
	<?php include 'footer.php' ?>
	<script type="text/javascript">
		var phone_input = document.getElementById("mobile");

		phone_input.addEventListener('input', () => {
		  phone_input.setCustomValidity('');
		  phone_input.checkValidity();
		});

		phone_input.addEventListener('invalid', () => {
		  if(phone_input.value == '') {
		    phone_input.setCustomValidity('Enter phone number!');
		  } else {
		    phone_input.setCustomValidity('Enter Valid Phone number');
		  }
		});

		var aadhaar_input = document.getElementById("aadhaar");

		aadhaar_input.addEventListener('input', () => {
		 aadhaar_input.setCustomValidity('');
		  aadhaar_input.checkValidity();
		});

		aadhaar_input.addEventListener('invalid', () => {
		  if(aadhaar_input.value == '') {
		   aadhaar_input.setCustomValidity('Enter Aadhaar No!');
		  } else {
		    aadhaar_input.setCustomValidity('Enter Valid Aadhaar No');
		  }
		});

		var email = document.getElementById("email");

		email.addEventListener('input', () => {
		 email.setCustomValidity('');
		  email.checkValidity();
		});

		email.addEventListener('invalid', () => {
		  if(email.value == '') {
		   email.setCustomValidity('Enter Email Id!');
		  } else {
		    email.setCustomValidity('Enter Valid Email Id');
		  }
		});
	</script>

</html>