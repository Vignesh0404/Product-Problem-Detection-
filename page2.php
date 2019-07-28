
 <?php include('server2.php');
 // fetch the record to be updated

 	if (isset($_GET['vid'])) {
    $edit_state = false;
 		$vid = $_GET['vid'];
 		$rec = mysqli_query($db, "SELECT * FROM input WHERE vid=$vid");
 		$record = mysqli_fetch_array($rec);
 	}
  if (isset($_GET['edit'])) {
    $id = $_GET['edit'];
    $edit_state= true;
    $rec = mysqli_query($db, "SELECT * FROM input WHERE id=$id");
    $record = mysqli_fetch_array($rec);
    $problems= $record['problems'];
    $frequency= $record['frequency'];
    $severity=$record['severity'];
    $detection=$record['detection'];
  }




 ?>


 <!DOCTYPE html>
 <html>
      <head>
           <title>Page 2</title>
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
    <?php include('server1.php');
      $req = mysqli_query($db, "SELECT name FROM info WHERE id=$vid");
      $name = mysqli_fetch_array($req)['name'];
    ?>
    <h3 class="text-primary"><?php  echo $name; ?></h3>

    <hr style="border-top:1px dotted #ccc;"/>


        </div>
           <br /><br />
           <div class="container" style="width:900px;">
                <h2 align="center">Problem Input</h2>
                <h3 align="center">Please fill in the details listed below</h3><br />

                  
                    <label for="dateofbirth">From Date</label>
                <input type="date" name="dateofbirth" id="from">

                 <label for="dateofbirth">To Date</label>
                <input type="date" name="dateofbirth" id="to">

                <button type="button" class="btn" onclick="window.location.href='Pareto.html'">Genrate Pareto Chart</button>
                <button type="button" class="btn1" onclick="window.location.href='page4.php'">Go to weightage page</button>


                
               



                <div id="order_table">




                     <table class="table table-bordered">
                          <tr>

                               <th width="5%">Problems</th>
                               <th width="5%">Frequency</th>
                               <th width="5%">Severity</th>
                               <th width="5%">Detection</th>
                               <th width="5%">RPN</th>
                               <th>Action</th>
                               <th>Action</th>
                          </tr>

                          <tbody>
                          <?php	$results = mysqli_query($db, "SELECT * FROM input WHERE vid=$vid"); ?>
                          <?php while ($row = mysqli_fetch_array($results)) { ?>

                          	<tr>
                              <td><?php echo $row['problems']; ?></td>
                               <td><?php echo $row['frequency'];?></td>
                               <td><?php echo $row['severity'];?></td>
                               <td><?php echo $row['detection'];?></td>
                                <td><?php echo $row['rpm'];?></td>

                        <td>
						<a  href="page2.php?edit=<?php echo $row['id']; ?>&vid=<?php echo $vid; ?>">Edit</a>
					</td>
					<td>
						<a  href="server2.php?del=<?php echo $row ['id'];?>&vid=<?php echo $vid; ?>">Delete</a>
					</td>
                          </tr>




                        <?php  } ?>

                     </tbody>

                     </table>

                </div>

           </div>

           <form method="post" action="server2.php">
           	<input type="hidden" name="vid" value="<?php echo $vid; ?>">
            <input type="hidden" name="id" value="<?php echo $id; ?>">
           	<div class="input-group">
           		<label>Problem</label>
           		<select id="list" name="problems" onchange="getSelectValue();" value="<?php echo $problems; ?>">
              <option value="Delivery of products" <?= $problems=='Delivery of products' ? 'selected' : '' ?>>Delivery of products</option>
              <option value="Rejection" <?= $problems=='Rejection' ? 'selected' : '' ?>>Rejection</option>
              <option value="Rework/failures" <?= $problems=='Rework/failures' ? 'selected' : '' ?>>Rework/failures</option>
               <option value="Packaging" <?= $problems=='Packaging' ? 'selected' : '' ?>>Packaging</option>
               <option value="Quantity" <?= $problems=='Quantity' ? 'selected' : '' ?>>Quantity</option>
               <option value="Logistics" <?= $problems=='Logistics' ? 'selected' : '' ?>>Logistics</option>
               <option value="Specifications" <?= $problems=='Specifications' ? 'selected' : '' ?>>Specifications</option>
               <option value="Others" <?= $problems=='Others' ? 'selected' : '' ?>>Others</option>
              </select>

           	</div>

           		<div class="input-group">
           		<label>Frequency</label>
           		<input type="number" min="0" max="5" step="1 "name="frequency" placeholder="<?php echo $frequency; ?>">
           	</div>


           	<div class="input-group">
           		<label>Severity</label>
           		<input type="number" min="0" max="5" step="1 "name="severity" placeholder="<?php echo $severity; ?>">
           	</div>

           	<div class="input-group">
           		<label>Detection</label>
           		<input type="number" min="0" max="5" step="1 "name="detection" placeholder="<?php echo $detection; ?>">
           	</div>

              <div class="input-group">
              <label>Ratings</label>
              <input type="number" min="0" max="5" step="1 "name="ratings" placeholder="<?php echo $ratings; ?>">
            </div>


           	<div class="input-group">
           		<?php if ($edit_state == false): ?>
           		<button type="submit" name="save" class="btn">SAVE</button>
           		<?php else: ?>
           		<button type="submit" name="update" class="btn">UPDATE</button>
           	</div>
           		<?php endif ?>



           </form>

           



            </body>








 </html>
 <script>
      $(document).ready(function(){
           $.datepicker.setDefaults({
                dateFormat: 'yy-mm-dd'
           });
           $(function(){
                $("#from_date").datepicker();
                $("#to_date").datepicker();
           });
           $('#filter').click(function(){
                var from_date = $('#from_date').val();
                var to_date = $('#to_date').val();
                if(from_date != '' && to_date != '')
                {
                     $.ajax({
                          url:".php",
                          method:"POST",
                          data:{from_date:from_date, to_date:to_date},
                          success:function(data)
                          {
                               $('#order_table').html(data);
                          }
                     });
                }
                else
                {
                     alert("Please Select Date");
                }
           });
      });
 </script>

 <script>

        function getSelectValue()
        {
            var selectedValue = document.getElementById("list").value;
            console.log(selectedValue);
        }
        getSelectValue();

    </script>
