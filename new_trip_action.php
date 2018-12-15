<?php
$conn=mysqli_connect("localhost","root","","travel");
$trip_code=$_POST['trip_code'];
$departure=$_POST['departure'];
$destination = $_POST['destination'];
$date = $_POST['date'];
$location = $_POST['location'];
$time = $_POST['time'];

$len = sizeof($location);


// echo $location[0]." ".$time[0];
if (!$conn)
{
	die('Could not connect: '. mysql_error());
}
else{

	$i=0;
	while($i<$len) {
				$l= $location[$i];
				$t=$time[$i];	
				 //echo $l." ".$t;

				$query_new_trip = "INSERT INTO trip VALUES('$trip_code','$departure','$destination','$date','$l','$t')";
				/*Again QUERY Execution function and PUT the VAlue in a VARIABLE*/
				$return = mysqli_query($conn, $query_new_trip);

				$i=$i+1;
				
				}
				if ($return===TRUE)
					{

	 				 echo "<h1>New trip created successfully </h1>";
	 				 header("Location: http://localhost/travel/menu.html");
	  				}
			else
			{
				echo "Wrong";
			}


}
?>
