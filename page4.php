
 <?php include('server2.php');
 // fetch the record to be updated

 	if (isset($_GET['edit'])) {
 		$id = $_GET['edit'];
 		$edit_state= true;

 		$rec = mysqli_query($db, "SELECT * FROM input WHERE id=$id");
    if (!mysqli_query($db, "SELECT * FROM input WHERE id=$id"))
    {
    echo("QError description: " . mysqli_error($con));
    }
 		$record = mysqli_fetch_array($rec);
 		$problems= $record['problems'];
 		$frequency= $record['frequency'];
 		$severity=$record['severity'];
 		$detection=$record['detection'];
 		$id= $record['id'];
 	}




 ?>


 <!DOCTYPE html>
 <html>
      <head>
           <title>Page 4</title>
           <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
           <script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
           <link rel="stylesheet" href="http://code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
           <link rel="stylesheet" type="text/css" href="style.css">





      </head>
      <body>
<?php if(isset($_SESSION['msg1'])): ?>
		<div class="msg1">
			<?php
				echo $_SESSION['msg1'];
				unset($_SESSION['msg1']);

			?>
		</div>
	<?php endif ?>



        <div>

    <h3 class="text-primary">Sid n Co</h3>
    <hr style="border-top:1px dotted #ccc;"/>


        </div>
           <br /><br />
          
                <br />
                <div id="order_table">
                     <table class="table table-bordered">
                          <tr>

                               <th width="5%">Problems</th>
                               <th width="5%">Weightage %(from RPN)</th>
                               
                               <th width="5%">Ratings</th>
                               
                          </tr>

                          <tbody>
                          <?php	$results = mysqli_query($db, "SELECT * FROM input"); ?>
                          <?php while ($row = mysqli_fetch_array($results)) { ?>

                          	<tr>
                              <td><?php echo $row['problems']; ?></td>

                               <td><?php echo $row['weightage'];?></td>
                               
                                <td><?php echo $row['ratings'];?></td>





                        <?php  } ?>

                     </tbody>

                     </table>



                </div>

           </div>

          


 <button type="button" class="btn1" onclick="window.location.href='page5.php'">Calculate Final Value</button>
  <button type="button" class="btn1" onclick="window.location.href='page1.php'">Go to Home page</button>


 </html>
 
