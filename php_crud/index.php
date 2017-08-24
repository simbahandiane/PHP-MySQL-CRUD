<?php include('server.php');
	if (isset($_GET['edit'])) {
		# code...
		$EmployeeId = $_GET['edit'];
		$rec = mysqli_query($database, "SELECT * FROM sampledb WHERE EmployeeId = $EmployeeId");
		$record = mysqli_fetch_array($rec);
		echo $record;
		$EmployeeId = $record['EmployeeId'];
		$EmployeeName = $record['EmployeeName'];
		$Department = $record['Department'];
		$Position = $record['Position'];
		$Status = $record['Status'];
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Sample CRUD</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

	<?php if (isset($_SESSION['msg'])): ?>
		<div class="msg">
			<?php
				echo $_SESSION['msg'];
				unset($_SESSION['msg']);
			?>
		</div>
	<?php endif?>
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
					<a href="index.php?edit=<?php echo $row['EmployeeId'];?>">Update</a>
				</td>
				<td>
					<a href="server.php?del=<?php echo $row['EmployeeId']; ?>">Delete</a>
				</td>
			</tr>
		<?php } ?>

			
		</tbody>
	</table>

	<form method="POST" action="server.php">
		<input type="hidden" name="EmployeeId" value="<?php echo $EmployeeId;?>">
		<div class="input-group" >
			<label>Employee Name</label>
			<input type="text" name="EmployeeName" value="<?php echo $EmployeeName;?>">
		</div>
		<div class="input-group">
			<label>Department</label>
			<input type="text" name="Department" value="<?php echo $Department;?>">
		</div>
		<div class="input-group">
			<label>Position</label>
			<input type="text" name="Position" value="<?php echo $Position;?>">
		</div>
		<div class="input-group">
			<label>Status</label>
			<input type="text" name="Status" value="<?php echo $Status;?>">
		</div>
		<div class="input-group">
		<?php if($update_rec == false) : ?>
			<button type="submit" name="save" class="btn">Save</button>
		<?php else: ?>
			<button type="submit" name="update" class="btn">Update</button>
		<?php endif?>
			<button type="submit" name="delete" class="btn">Delete</button>
			
		</div>
	</form>
</body>
</html>