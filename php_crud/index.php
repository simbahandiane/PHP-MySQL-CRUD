<?php include('server.php');?>
<!DOCTYPE html>
<html>
<head>
	<title>Sample CRUD</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
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
				<td><?php echo $row['EmployeeId']; ?></td>
				<td><?php echo $row['EmployeeName']; ?></td>
				<td><?php echo $row['Department']; ?></td>
				<td><?php echo $row['Position']; ?></td>
				<td><?php echo $row['Status']; ?></td>
				<td>
					<a href="#">Edit</a>
				</td>
				<td>
					<a href="#">Update</a>
				</td>
				<td>
					<a href="#">Delete</a>
				</td>
			</tr>
		<?php } ?>

			
		</tbody>
	</table>

	<form method="POST" action="server.php">
		<div class="input-group">
			<label>Employee Id</label>
			<input type="text" name="employeeId">
		</div>
		<div class="input-group">
			<label>Employee Name</label>
			<input type="text" name="employeeName">
		</div>
		<div class="input-group">
			<label>Department</label>
			<input type="text" name="department">
		</div>
		<div class="input-group">
			<label>Position</label>
			<input type="text" name="position">
		</div>
		<div class="input-group">
			<label>Status</label>
			<input type="text" name="status">
		</div>
		<div class="input-group">
			<button type="submit" name="save" class="btn">Save</button>
		</div>
	</form>
</body>
</html>