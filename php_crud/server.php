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
	// if(isset($_POST['update'])){
	// 	$EmployeeId = mysql_real_escape_string($_POST['employeeId']);
	// 	$EmployeeName = mysql_real_escape_string($_POST['employeeName']);
	// 	$Department = mysql_real_escape_string($_POST['department']);
	// 	$Position = mysql_real_escape_string($_POST['position']);
	// 	$status = mysql_real_escape_string($_POST['status']);	}

	if (isset($_GET['del'])) {
		$EmployeeId = $_GET['del'];
		mysqli_query($database, "DELETE FROM sampledb WHERE EmployeeId = $EmployeeId");
		$_SESSION['msg'] = "Employee Deleted";
		header("Location: index.php");
		exit();
	}
?>

<?php

	$output='';

	if (isset($_GET['q']) && $_GET['q'] !== ' ') {
		# code...
		$searchq = $_GET['q'];

		$q = mysqli_query($database, "SELECT * FROM sampledb WHERE EmployeeName LIKE '%$searchq%' OR Position LIKE '%$searchq%'") or die(mysqli_error());
	
		$c = mysqli_num_rows($q);
		if ($c == 0) {
		# code...
			$output = 'No Results';
		}else{
			while ($row = mysqli_fetch_array($q)) {
			# code...
				$EmployeeId = $row['EmployeeId'];
				$EmployeeName = $row['EmployeeName'];
				$Department = $row['Department'];
				$Position = $row['Position'];
				$Status = $row['Status'];

				$output .= '
						<table>
							<thead>
								<tr>
									<th>Employee Id</th>
									<th>Employee Name</th>
									<th>Department</th>
									<th>Position</th>
									<th>Status</th>
									<th colspan="2">Action</th>
								</tr>
							</thead>
							<tbody>
							<?php while ($row = mysqli_fetch_array($results)){ ?>
								<tr>
									<td>'.$EmployeeId.'</td>
									<td>'.$EmployeeName.'</td>
									<td>'.$Department.'</td>
									<td>'.$Position.'</td>
									<td>'.$Status.'</td>
								</tr>
							<?php } ?>
							</tbody>
						</table>
				';
			}
		}
	}else{
//
	}
	
	print("$output");
	mysqli_close($database);
?>
