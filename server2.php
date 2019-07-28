<?php

	// session_start();
	//initalize
	$problems="";
	$frequency="";
	$severity = "" ;
	$detection = "";
	$rpm= "";
	$weightage="";
	$ratings="";
	$final="";
	$sum =0;

	$edit_state = false;




// connect to database
$db = mysqli_connect('localhost','root','','srm');


// if save button is clicked
if (isset($_POST['save'])) {
	$vid = $_POST['vid'];
	$problems = $_POST['problems'];
	$frequency= $_POST['frequency'];
	$severity = $_POST['severity'];
	$detection = $_POST['detection'];
	$ratings=$_POST['ratings'];

	$rpm = $frequency * $severity * $detection;



	$result1 = mysqli_query($db, "SELECT * FROM input");
	
	//var_dump($result1);
	while ($row = mysqli_fetch_array($result1))
	{
		//var_dump($row);
		$sum= $sum+$row['rpm'];
	}
	$sum=$sum+$rpm;
	$weightage= ($rpm / (float)$sum) * 100;

	


	$query ="INSERT INTO input (vid, problems, frequency, severity, detection, rpm,ratings, weightage) VALUES ('$vid', '$problems' , '$frequency' , '$severity' , '$detection' , '$rpm','$ratings','$weightage')";
	if (mysqli_query($db, $query)) {
		$_SESSION['msg1'] = "Address Saved";
		header('location: page2.php?vid='.$vid);	
	}

}		









		// update records
		if (isset($_POST['update']))
	 {
		$problems = mysqli_real_escape_string($db,$_POST['problems']);
		$frequency = mysqli_real_escape_string($db,$_POST['frequency']);
		$severity = mysqli_real_escape_string($db,$_POST['severity']);
		$detection = mysqli_real_escape_string($db,$_POST['detection']);
		$ratings= mysqli_real_escape_string($db,$_POST['ratings']);
		$weightage= '';
		$id = mysqli_real_escape_string($db,$_POST['id']);
		$vid = mysqli_real_escape_string($db,$_POST['vid']);
		$query = "UPDATE input SET problems='$problems', frequency='$frequency', severity='$severity', detection='$detection', ratings='$ratings', weightage='$weightage' WHERE id=$id";
		if (!mysqli_query($db,$query)) {
			echo("Error description: " . mysqli_error($db));
		}
		$_SESSION['msg1'] = "Adress Saved";
		$_SESSION['msg1'] = "Address Saved";

		header('location: page2.php?vid='.$vid);



	}


// delete records
	if (isset($_GET['del'])) {
		$vid = $_GET['vid'];
		$id = $_GET['del'];
		mysqli_query($db, "DELETE FROM input WHERE id=$id");
		$_SESSION['msg1'] = "Adress Deleted";
		header('location: page2.php?vid='.$vid);
	}
//retrieve records
		$results = mysqli_query($db, "SELECT * FROM input");


?>