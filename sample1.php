<?php include('server1.php'); ?>
<!DOCTYPE html>
<html>
<head>
	<title>Project1</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<TABLE>
		<thread>
			<tr>
				<th>Vendor's Name</th>
				<th>Vendor's Product</th>
				<th colspan="2">Action</th>
			</tr>
		</thread>
		<tbody>
			<<?php while ($row = mysqli_fetch_array($results)) {
				# code...
			} ?>
			<tr>
				<td>Vignesh</td>
				<td>Pencils</td>
				<td>
					<a href="#">Edit</a>
				</td>
				<td>
					<a href="#">Delete</a>
				</td>
			</tr>
		</tbody>
	</TABLE>

	<form action="server1.php" method="post">
		<div class="input-group">
		<label>Vendor's Name</label>
		<input type="text" name="name">
		</div>
		<div class="input-group">
		<label>Vendor's Product</label>
		<input type="text" name="product">
		</div>
		<div class="input-group">
		<button type="submit" name="save"> SAVE</button>
		</div>
	</form>

</body>
</html>