<?php include('server1.php');  ?>


<!DOCTYPE html>
<html>
<head>
	<title>final page</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>


	<table >
		<h2>THE FINAL LIST </h2>
    <tr>
      <th>Vendor Name</th>
      <th>Final Value</th>
      <th>Rating Order</th>
    </tr>
    <tr>
    	<?php while ($row = mysqli_fetch_array($results1)) { ?>
      <td><?php echo $row['name']; ?></td>
      <td>2.353</td>
      <td>1</td>
    </tr>
    <?php } ?>
  </table>

</body> 
</html>