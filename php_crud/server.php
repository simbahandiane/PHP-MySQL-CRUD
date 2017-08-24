<?php

	session_start();
//initialize
	$EmployeeId = 0;
	$EmployeeName = "";
	$Department = "";
	$Position = "";
	$Status = "";
	$update_rec = false;

	$database = mysqli_connect('localhost','root','D3c0d3d@23','sample');
	

	//Create
	if (isset($_POST['save'])) {
		# code...
		$EmployeeId = $_POST['employeeId'];
		$EmployeeName = $_POST['employeeName'];
		$Department = $_POST['department'];
		$Position = $_POST['position'];
		$Status = $_POST['status'];

		$query = "INSERT INTO sampledb ( EmployeeName, Position, Department, Status) VALUES ('$EmployeeName','$Position','$Department','$Status')";
		mysqli_query($database, $query);
		$_SESSION['msg']= "Record has been saved";
		header("Location: index.php"); //redirect
		exit();
	}

	//Read
	$results = mysqli_query($database,"SELECT * FROM sampledb");

	//update
	if(isset($_POST['update'])){
		$EmployeeId = mysql_real_escape_string($_POST['employeeId']);
		$EmployeeName = mysql_real_escape_string($_POST['employeeName']);
		$Department = mysql_real_escape_string($_POST['department']);
		$Position = mysql_real_escape_string($_POST['position']);
		$status = mysql_real_escape_string($_POST['status']);	}

	if (isset($_GET['del'])) {
		# code...
		printf($EmployeeId) ;
		$EmployeeId = $_GET['del'];
		mysqli_query($database, "DELETE FROM sampledb WHERE EmployeeId = $EmployeeId");
		$_SESSION['msg'] = "Employee Deleted";
		header("Location: index.php");
		exit();
	}
?>