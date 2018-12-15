<?php

$conn=mysqli_connect("localhost","root","","travel");
?>



<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
      <title>New Trip</title>
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/fontawesome-all.min.css">
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script> 


</head>      

<body>



	<form action ="join_trip_next.php" method="post" enctype="multipart/form-data">
		<table class="table table-bordered">
	<tr>
					<td>Trip code :</td>
					<td><input  type="text"  class="form-control" name="trip_code" required placeholder="example : Dhk12" /></td>
	</tr>

		
	
		</table>

		<input type="submit" class="btn btn-primary" name="submit" value="check" />
		
		


		<!-- <button class="btn btn-primary" type="submit" name="submit" value="create">Trip Member</button> -->

	</form>



		
		
		
	


</body>
</html>