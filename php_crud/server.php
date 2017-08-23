<?php
//initialize
	$EmployeeId = 0;
	$EmployeeName = "";
	$Department = "";
	$Position = "";
	$Status = "";

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
		header('location : index.php'); //redirect
	}

	//Read
	$results = mysqli_query($database,"SELECT * FROM sampledb");
?>