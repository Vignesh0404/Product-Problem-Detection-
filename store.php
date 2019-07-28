<?php
$con = mysqli_connect("localhost","root","");

if(!$con)
{
	echo "Not Connected to the database";
}

if(!mysqli_select_db($con,'project1'))
{
	echo "Database Not selected";
}

$vendor_name = $_POST['vname'];

$sql = "INSERT INTO sample(vendor_name) VALUES ('$vendor_name')";

if(!mysqli_query($con,$sql))
{
	echo 'not inserted';
}
else
{
	echo 'inserted';
}

header("refresh:2; url= sample.php");



?>