<?php
	// Inserting All Data After Fetching Personal Information
	function getandinsert($mobile,$conn)
	{
		// Getting Employee Id From Personal Information Table
		$stmt = "SELECT * FROM personal_information_details WHERE MOBILE_NO = $mobile";
		$query = mysqli_query($conn,$stmt);
		$data = mysqli_fetch_array($query);
		$eid = $data["EMPLOYEE_ID"];
		// Inserting Qualification Data
		insert_qualification_data($eid,$conn);
		// Inserting Service Data
		insert_service_data($eid,$conn);
		// Inserting Department Data
		insert_department_data($eid,$conn);
		// Inserting RC / OC / Short Term Course / Workshop / Training / FDP / Conference / Seminar  Data
		insert_training_data($eid,$conn);
		// Inserting Paper Data
		insert_paper_data($eid,$conn);
		// Inserting Book Data
		insert_book_data($eid,$conn);
		// Inserting Project Data
		insert_project_data($eid,$conn);
		// Inserting Award Data
		insert_award_data($eid,$conn);
		// Inserting Committe Data
		insert_committe_data($eid,$conn);
		// Form Closing
		close();
	}

	// Qualification Data Inserting Function
	function insert_qualification_data($eid,$conn)
	{
		// Data Getting From Form
		$qualification = $_POST['qualification'];
		$board = $_POST['board'];
		$year = $_POST['year'];
		$subjects = $_POST['subjects'];
		$result = $_POST['result'];
		$class = $_POST['class'];
		// Insering Every Row Data
		foreach ($qualification as $key => $value)
		{
			if(!empty($_FILES['quldoc']["name"]))
			{
				$targetDir = "uploads/";
				$fileName = $_FILES['quldoc']['name'][$key];
				$targetFilePath = $targetDir . $fileName;
				$fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);
				$allowTypes = array('jpg','png','jpeg','gif','pdf');
				$path = $targetDir . $eid . round(((microtime(true)*1000)*rand(0,10000))/999999999). $fileName;
				if(in_array($fileType, $allowTypes))
				{
					if($_FILES['quldoc']['size'][$key]<512000)
					{
						if(move_uploaded_file($_FILES['quldoc']['tmp_name'][$key], $path))
						{
							$stmt = "INSERT INTO qualification_details(EMPLOYEE_ID,QUALIFICATION,BOARD_UNIVERSITY,YEAR_OF_PASS,SUBJECTS,RESULT_IN_PERCENT,CLASS,QUALIFICATION_DOCUMENTS)VALUES('".$eid."','".$value."','".$board[$key]."','".$year[$key]."','".$subjects[$key]."','".$result[$key]."','".$class[$key]."','".$path."')";
							$query = mysqli_query($conn,$stmt);
						}
					}
				}
			}
		}
	}

	// Service Data Inserting Function
	function insert_service_data($eid,$conn){
		// Data Getting From Form
		$name_of_college = $_POST['name_of_college'];
		$sfrom = $_POST['sfrom'];
		$sto = $_POST['sto'];
		foreach ($name_of_college as $key => $value) 
		{	
			if(!empty($value))
			{
				$stmt = "INSERT INTO service_details(EMPLOYEE_ID,NAME_OF_COLLEGE,SFROM,STO) VALUES ('".$eid."','".$value."','".$sfrom[$key]."','".$sto[$key]."')";
				$query = mysqli_query($conn,$stmt);
			}
		}

	}

	// Department Data Inserting Function
	function insert_department_data($eid,$conn){
		// Data Getting From Form
		$dept_exam_name = $_POST['dept_exam_name'];
		$dept_regno = $_POST['dept_regno'];
		$dept_year_of_pass = $_POST['dept_year_of_pass'];

		foreach ($dept_exam_name as $key => $value)
		{
			if(!empty($_FILES['dept_document']["name"]))
			{
				$targetDir = "uploads/";
				$fileName = $_FILES['dept_document']['name'][$key];
				$targetFilePath = $targetDir . $fileName;
				$fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);
				$allowTypes = array('jpg','png','jpeg','gif','pdf');
				$path = $targetDir . $eid . round(((microtime(true)*1000)*rand(0,10000))/999999999). $fileName;
				if(in_array($fileType, $allowTypes))
				{
					if($_FILES['dept_document']['size'][$key]<512000)
					{
						if(move_uploaded_file($_FILES['dept_document']['tmp_name'][$key], $path))
						{
							$stmt = "INSERT INTO department_exam_details(EMPLOYEE_ID,NAME,REG_NO,YEAR_OF_PASSING,CERTIFICATE)VALUES('".$eid."','".$dept_exam_name[$key]."','".$dept_regno[$key]."','".$dept_year_of_pass[$key]."','".$path."')";
							$query = mysqli_query($conn,$stmt);
						}
					}
				}
			}
		}
	}

	// RC / OC / Short Term Course / Workshop / Training / FDP / Conference / Seminar Data Inserting Function
	function insert_training_data($eid,$conn){
		// Data Getting From Form
		$training_type = $_POST['training_type'];
		$tfrom = $_POST['tfrom'];
		$tto = $_POST['tto'];
		$training_name = $_POST['training_name'];
		$training_place = $_POST['training_place'];

		foreach ($training_type as $key => $value)
		{
			if(!empty($_FILES['training_document']["name"]))
			{
				$targetDir = "uploads/";
				$fileName = $_FILES['training_document']['name'][$key];
				$targetFilePath = $targetDir . $fileName;
				$fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);
				$allowTypes = array('jpg','png','jpeg','gif','pdf');
				$path = $targetDir . $eid . round(((microtime(true)*1000)*rand(0,10000))/999999999). $fileName;
				if(in_array($fileType, $allowTypes))
				{
					if($_FILES['training_document']['size'][$key]<512000)
					{
						if(move_uploaded_file($_FILES['training_document']['tmp_name'][$key], $path))
						{
							$stmt = "INSERT INTO training_details(EMPLOYEE_ID,TYPE,TFROM,TTO,NAME_OF_COURSE,PLACE,CERTIFICATE)VALUES('".$eid."','".$training_type[$key]."','".$tfrom[$key]."','".$tto[$key]."','".$training_name[$key]."','".$training_place[$key]."','".$path."')";
							$query = mysqli_query($conn,$stmt);
						}
					}
				}
			}
		}
	}

	// Paper Data Inserting Function
	function insert_paper_data($eid,$conn){
		// Data Getting From Form
		$paper_type = $_POST['paper_type'];
		$paper_level = $_POST['paper_level'];
		$paper_name = $_POST['paper_name'];
		$paper_date = $_POST['paper_date'];
		$paper_title = $_POST['paper_title'];

		foreach ($paper_type as $key => $value)
		{
			if(!empty($_FILES['paper_document']["name"]))
			{
				$targetDir = "uploads/";
				$fileName = $_FILES['paper_document']['name'][$key];
				$targetFilePath = $targetDir . $fileName;
				$fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);
				$allowTypes = array('jpg','png','jpeg','gif','pdf');
				$path = $targetDir . $eid . round(((microtime(true)*1000)*rand(0,10000))/999999999). $fileName;
				if(in_array($fileType, $allowTypes))
				{
					if($_FILES['paper_document']['size'][$key]<512000)
					{
						if(move_uploaded_file($_FILES['paper_document']['tmp_name'][$key], $path))
						{
							$stmt = "INSERT INTO paper_details(EMPLOYEE_ID,TYPE,LEVEL,NAME,PAPER_DATE,PAPER_TITLE,CERTIFICATE)VALUES('".$eid."','".$paper_type[$key]."','".$paper_level[$key]."','".$paper_name[$key]."','".$paper_date[$key]."','".$paper_title[$key]."','".$path."')";
							$query = mysqli_query($conn,$stmt);
						}
					}
				}
			}
		}
	}

	// Book Data Inserting Function
	function insert_book_data($eid,$conn){
		// Data Getting From Form
		$book_name = $_POST['book_name'];
		$no_of_chapters = $_POST['no_of_chapters'];
		$pages_from = $_POST['pages_from'];
		$pages_to = $_POST['pages_to'];
		$bp_year =$_POST['bp_year'];

		foreach ($book_name as $key => $value)
		{
			if(!empty($_FILES['book_document']["name"]))
			{
				$targetDir = "uploads/";
				$fileName = $_FILES['book_document']['name'][$key];
				$targetFilePath = $targetDir . $fileName;
				$fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);
				$allowTypes = array('jpg','png','jpeg','gif','pdf');
				$path = $targetDir . $eid . round(((microtime(true)*1000)*rand(0,10000))/999999999). $fileName;
				if(in_array($fileType, $allowTypes))
				{
					if($_FILES['book_document']['size'][$key]<512000)
					{
						if(move_uploaded_file($_FILES['book_document']['tmp_name'][$key], $path))
						{
							$stmt = "INSERT INTO book_published_details(EMPLOYEE_ID,NAME,NO_OF_CHAPTERS,BPFROM,BPTO,BP_YEAR,DOCUMENT)VALUES('".$eid."','".$book_name[$key]."','".$no_of_chapters[$key]."','".$pages_from[$key]."','".$pages_to[$key]."','".$bp_year[$key]."','".$path."')";
							$query = mysqli_query($conn,$stmt);
						}
					}
				}
			}
		}
	}

	// Project Data Inserting Function
	function insert_project_data($eid,$conn){
		// Data Getting From Form
		$project_type = $_POST['project_type'];
		$project_name = $_POST['project_name'];
		$project_sponser = $_POST['project_sponser'];
		$project_amount = $_POST['project_amount'];
		$project_sanction_year = $_POST['project_sanction_year'];

		foreach ($project_type as $key => $value)
		{
			if(!empty($_FILES['project_document']["name"]))
			{
				$targetDir = "uploads/";
				$fileName = $_FILES['project_document']['name'][$key];
				$targetFilePath = $targetDir . $fileName;
				$fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);
				$allowTypes = array('jpg','png','jpeg','gif','pdf');
				$path = $targetDir . $eid . round(((microtime(true)*1000)*rand(0,10000))/999999999). $fileName;
				if(in_array($fileType, $allowTypes))
				{
					if($_FILES['project_document']['size'][$key]<512000)
					{
						if(move_uploaded_file($_FILES['project_document']['tmp_name'][$key], $path))
						{
							$stmt = "INSERT INTO project_details(EMPLOYEE_ID,TYPE,NAME,SPONSERER,AMOUNT,YEAR_OF_SANCTION,UC)VALUES('".$eid."','".$project_type[$key]."','".$project_name[$key]."','".$project_sponser[$key]."','".$project_amount[$key]."','".$project_sanction_year[$key]."','".$path."')";
							$query = mysqli_query($conn,$stmt);
						}
					}
				}
			}
		}
	}

	// Award Data Inserting Function
	function insert_award_data($eid,$conn){
		// Data Getting From Form
		$award_name = $_POST['award_name'];
		$award_organiser = $_POST['award_organiser'];

		foreach ($award_name as $key => $value)
		{
			if(!empty($_FILES['award_certificate']["name"]))
			{
				$targetDir = "uploads/";
				$fileName = $_FILES['award_certificate']['name'][$key];
				$targetFilePath = $targetDir . $fileName;
				$fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);
				$allowTypes = array('jpg','png','jpeg','gif','pdf');
				$path = $targetDir . $eid . round(((microtime(true)*1000)*rand(0,10000))/999999999). $fileName;
				if(in_array($fileType, $allowTypes))
				{
					if($_FILES['award_certificate']['size'][$key]<512000)
					{
						if(move_uploaded_file($_FILES['award_certificate']['tmp_name'][$key], $path))
						{
							$stmt = "INSERT INTO award_details(EMPLOYEE_ID,NAME,AWARD_ORGANISATION,CERTIFICATE)VALUES('".$eid."','".$award_name[$key]."','".$award_organiser[$key]."','".$path."')";
							$query = mysqli_query($conn,$stmt);
						}
					}
				}
			}
		}
	}

	// Committe Membership Data Inserting Function
	function insert_committe_data($eid,$conn){
		// Data Getting From Form
		$committe_name = $_POST['committe_name'];
		$role = $_POST['role'];
		$member_from = $_POST['member_from'];
		$member_to = $_POST['member_to'];
		foreach ($committe_name as $key => $value) 
		{
			if($value != "---Select---" || $role[$key] != "---Select---" || $member_from[$key] != "---Select---" || $member_to[$key] != "---Select---")
			{
				$stmt = "INSERT INTO committe_details(EMPLOYEE_ID,COMMI_NAME,CHAIRPERSON_MEMBER,CMFROM,CMTO) VALUES ('".$eid."','".$value."','".$role[$key]."','".$member_from[$key]."','".$member_to[$key]."')";
				$query = mysqli_query($conn,$stmt);
			}
		}
	}

	// Form Closing Function
	function close(){
		echo "<script>alert('Data saved succcessfully');</script>";
		echo "<script> window.location.href = 'home.php'</script>";
	}

	function back(){
				echo "<script> window.location.href = '3.php'</script>";
			}

?>