
    <?php 
    $conn=mysqli_connect("localhost","root","","travel");


if(@$_POST['submit']=="check") {
	


	 $trip_code = $_POST['trip_code'];
    $query = "select * from join_trip where trip_code = '$trip_code'";
  	$res = mysqli_query($conn,$query);
  	$num = mysqli_num_rows($res);
?>
  	<h1 class="heading"><b> Trip Member </b></h1>
				<table  class="table table-hover" border="1">
			    	<thead>
			    	<tr>
			    		<th>Name</th>
			    		<th>Mobile </th>
			    		<th>Location</th>
			    		<th>Time</th>
			    	</tr>
			    	</thead>

<?php
   if($num>0) {


		while ($rows=mysqli_fetch_row($res))
		{
			?>
			<tbody>	
			<?php
			echo "<tr>";
			echo "<td>";
			echo $rows[0];
			echo "</td>";
			echo "<td>";
			echo $rows[1];
			echo "</td>";
			echo "<td>";
			echo $rows[5];
			echo "</td>";
			echo "<td>";
			echo $rows[6];
			echo "</td>";
			echo "</tr>";
			echo "</br>";
			
			 }
			 ?>
			 </tbody>
			</table>

		<?php }
		

 } 
 ?>



<html>
<body>
	<div class="Logout_menu"> 
		<a style="text-decoration:none;color: white;" href="index.html"><p>Logout</p></a>
	</div>
   <form action ="" method="post" enctype="multipart/form-data">
		<table class="table table-bordered">
	<tr>
					<td>Trip code :</td>
					<td><input  type="text"  class="form-control" name="trip_code" required placeholder="example : Dhk12" /></td>
	</tr>
		</table>

		<input type="submit" class="btn btn-primary" name="submit" value="check" />
	</form>
</body>
</html>


