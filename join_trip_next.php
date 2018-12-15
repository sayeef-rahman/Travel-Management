
<?php
session_start();
if(isset($_SESSION["destination"])&&isset($_SESSION["departure"])&&isset($_SESSION["trip_code"])){
	$departure = $_SESSION["departure"];
	$destination = $_SESSION["destination"];
	$trip_code = $_SESSION["trip_code"];
}

$conn=mysqli_connect("localhost","root","","travel");


if(@$_POST['stime1']=='time'){
	
	$slec_loc = $_POST['selected_loc'];
	$query = "select time from trip where location = '$slec_loc'";
	$res = mysqli_query($conn,$query);
   $num = mysqli_num_rows($res);
   if($num>0) {
		while($row=mysqli_fetch_row($res)){
			echo "<br><br>";
			echo "Departure : ",$departure;
			echo "<br><br><br>";
			echo "Destination : ",$destination;
			echo "<br><br>";
			$time2 = $row[0];
			echo "Location : ",$slec_loc;
			$_SESSION['session_location'] = $slec_loc;
			echo "<br><br>";
			echo "Time ",$time2;
			$_SESSION['session_time'] = $time2;
			echo "<br><br>";
			}


			
		
		}

}


if(@$_POST['join_trip']=="Join Trip") {

		$departure=$_SESSION["departure"]; 
		$destination=$_SESSION["destination"]; 
		$trip_code=$_SESSION["trip_code"];
		if(isset($_SESSION['mobile'])){
			 $mobile = $_SESSION['mobile'];
			 $location = $_SESSION['session_location'];
			 $time = $_SESSION['session_time'];
			
			$sql_name = "select name from user_info where mobile = '$mobile'"; 
			$result_name=mysqli_query($conn,$sql_name);

			$num = mysqli_num_rows($result_name);
 		  	if($num>0) {
			while($row=mysqli_fetch_row($result_name)){
				$name = $row[0];
			}
		
		}

		    
			 $sql = "INSERT into join_trip values('$name','$mobile','$departure','$destination','$trip_code','$location','$time')";
				if (mysqli_query($conn, $sql))
					{
	 				 echo "<h1>Insert into join trip successfully</h1>";
	  				}
			}
			else
			{
				echo "Wrong";
			}
		

}



if(@$_POST['submit']=="check") {
	 $trip_code = $_POST['trip_code'];
    $query = "select * from trip where trip_code = '$trip_code'";
  $res = mysqli_query($conn,$query);
  $num = mysqli_num_rows($res);
  if($num>0) {
		while($row=mysqli_fetch_row($res)){
			$departure = $row[1];
			$destination = $row[2];
			
			}
			echo "<br><br>";
			echo "Departure : ",$departure;
			echo "<br><br><br>";
			echo "Destination : ",$destination;
			echo "<br><br>";
		
		}
		$_SESSION["departure"] = $departure;
		$_SESSION["destination"] = $destination;
		$_SESSION["trip_code"] = $trip_code;
				
 }
 
?>



<form action="" method="POST" enctype="multipart/form-data">

<?php
$sql = "select location from trip where trip_code = '$trip_code'";
   $qry = mysqli_query($conn,$sql);
   $num = mysqli_num_rows($qry);
	if($num>0) {
	?>	
		<select name="selected_loc">
			  <option selected>select a Location  ....</option>

		<?php while($row=mysqli_fetch_row($qry)){
			$location = $row[0];
				
		?>
            <option value="<?php echo $location; ?>"><?php echo $location; ?></option>
    		
    			<?php }} ?>
			</select>

			<input type="submit" class="btn btn-primary" name="stime1" value="time" />
</form>

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

<form action ="" method="post" >
	<input type="submit" class="btn btn-primary" name="join_trip" value="Join Trip" />
</form>

</body>