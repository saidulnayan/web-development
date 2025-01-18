<?php if(!isset($_SESSION)){
	session_start();
	}  
?>

<?php include('header.php'); ?>






	<!-- this is for donor registraton -->
	<div class="dashboard" style="background-color:#fff;">
		<h3 class="text-center" style="background-color:#272327;color: #fff;padding: 5px;">All registered Doctor List</h3>
		
		
	</div>
		
			<div class="all_user" style="margin-top:0px; margin-left: 40px;">
				<?php 
					include('../config.php');

					$sql = " SELECT * FROM doctor";
					$result = mysqli_query($conn,$sql);
					$count = mysqli_num_rows($result);

					if($count>=1){
						echo "<table border='1' align='center' cellpadding='32'>
							<tr>
								
								<th>Name</th>
								
								<th>Address</th>
								<th>Mobile</th>
								<th>Email</th>
								<th>Expert in</th>

								<th>Fee</th>
								<th>Action</th>
								
							</tr>";
						while($row=mysqli_fetch_array($result)){
								echo "<tr>";
								// echo "<td>".$row['doctor_id']."</td>";
								echo "<td>".$row['name']."</td>";
								
								echo "<td>".$row['address']."</td>";
								echo "<td>".$row['contact']."</td>";
								echo "<td>".$row['email']."</td>";
								echo "<td>".$row['expertise']."</td>";
								
								echo "<td>".$row['fee']."</td>";
								?>

								<td><a href="viewDoctor.php?userid=<?php echo $row['userid'] ?>">Delete</a></td>;
								<?php

								echo "</tr>";
						}
						echo "</table>";
					}
					else{
						print "<p align='center'>Sorry, No match found for your search result..!!!</p>";
					}

					?>

					<!-- Cancel Booking -->


			<?php
							include('../config.php');
							if(isset($_GET['userid'])){
							// sql to delete a record
							$deleteId = $_GET['userid'];
							$sql = "DELETE FROM doctor WHERE userid='$deleteId'";

							if (mysqli_query($conn, $sql)) {
							    echo "<script>alert('User has been deleted!');</script>";
								echo "<script> location.href='http://localhost/das/admin/viewDoctor.php'; </script>";
        exit;
								
							} else {
							     echo "<script>alert('There was an Error')<script>";
							}

							mysqli_close($conn);
						}

						   // if (isset($_GET['booking_id'])) {
        // $note_del = mysqli_real_escape_string($conn, $_GET['booking_id']);
        // $file_uploader = $_SESSION['username'];
        // $del_query = "DELETE FROM uploads WHERE file_id='$note_del'";
        // $run_del_query = mysqli_query($conn, $del_query) or die (mysqli_error($conn));
        // if (mysqli_affected_rows($conn) > 0) {
        //     echo "<script>alert('note deleted successfully');
        //     window.location.href='index.php';</script>";
        // }
        // else {
        //  echo "<script>alert('error occured.try again!');</script>";   
        // }
        // }


					?> 



	<!-- Cancel Booking End-->
			
			</div>
		
	
	
	

	
 <?php include('footer.php'); ?>


	
	</div><!--  containerFluid Ends -->




	<script src="js/bootstrap.min.js"></script>


 
			



	
</body>
</html>
