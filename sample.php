<!DOCTYPE html>
<html lang="en">
	<head>
		<title>sample</title>
	</head>
<body>

	<div class="col-md-3"></div>
	<div class="col-md-6 well">
		<h3 class="text-primary">PROJECT NAME</h3>
		<hr style="border-top:1px dotted #ccc;"/>
		<form action="store.php" method="POST">
			<h3>Form Field</h3>
			<div id="forms" class="form-inline">
				Vendor_name: <input type="text" class="form-control" placeholder="Enter Vendor_name" name="vname">
			</div>
			<br />
			<input type="submit" name="submit">
			<button type="button" class="btn btn-primary" onclick="addField();">Add Field</button>
		</form>
	</div>
<script src="sample.js"></script>	
</body>	
</html>