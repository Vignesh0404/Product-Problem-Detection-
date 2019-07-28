<?php
	
	//intialize variables
	$name = "";
	$product ="";
	$id =0;
	
	// connect to database
	$db = mysqli_connect('localhost','root','');


	// if save button is clicked
	if (isset($_POST['save'])) {
		$name = $_POST['name'];
		$product =$_POST['product'];

		$query= "INSERT INTO info (name,product) VALUES ('$name','$product')";
		mysqli_query($db,$query);
		header('location:sample1.php');//redirect to the main page after inserting
	}


	//re




?>