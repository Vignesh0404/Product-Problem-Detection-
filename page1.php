<?php include('server1.php'); 

	//fetch the record to be updated
	if(isset($_GET['edit']))
	{
		$id = $_GET['edit'];
		$edit_state = true;
		$rec = mysqli_query($db, "SELECT * FROM info WHERE id=$id");
		$record = mysqli_fetch_array($rec);
		$name = $record['name'];
		$product = $record['product'];
		$id = $record ['id'];
		$edit_state = true;
	} else {
		$edit_state = false;
	}


?>


<!DOCTYPE html>
<html>
<head>
	<title>Page1</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>


	<?php if(isset($_SESSION['msg'])): ?>
		<div class="msg">
			<?php
				echo $_SESSION['msg'];
				unset($_SESSION['msg']);

			?>
		</div>
	<?php endif ?>



	<table>
		<thead>
			<tr>
				<th>Vendor's Name</th>
				<th>Vendor's Product</th>
				<th>Action</th> <!-- colspan="3"-->
			</tr>
		</thead>
		<tbody>
			 <?php while ($row = mysqli_fetch_array($results1)) { ?>
				 	<tr>
					<td><a href="page2.php?vid=<?php echo $row['id']; ?>"><?php echo $row['name']; ?></td>
					<td><?php echo $row['product']; ?></td>
					<td>
						<a class="edit_btn" href="page1.php?edit=<?php echo $row['id']; ?>">Edit</a>
					</td>
					<td>
						<a class="del_btn" href="server1.php?del=<?php echo $row ['id'];?>">Delete</a>
					</td>
				</tr>

			 
			 
		<?php } ?>
		</tbody>
	</table>

	<form action="server1.php" method="post">
		<input type="hidden" name="id" value="<?php echo $id; ?>">
		<div class="input-group">
		<label>Vendor's Name</label>
		<input type="text" name="name" value="<?php echo $name;?> ">
		</div>
		<div class="input-group">
		<label>Vendor's Product</label>
		<input type="text" name="product" value="<?php echo $product; ?>">
		</div>
		<div class="input-group">
		<?php if ($edit_state == false): ?>
			<button type="submit" name="save" class="btn"> SAVE</button>
		<?php else: ?>
			<button type="submit" name="update" class="btn"> UPDATE</button>
		<?php endif ?>
		</div>
	</form>

</body>
</html>