<link rel="stylesheet" type="text/css" href="style.css">
<?php
session_start();
$conn=mysqli_connect("localhost","root","","travel");
$mobile=$_POST['mobile'];
$password=$_POST['password'];
if (!$conn)
{
	die('Could not connect: '. mysql_error());
}

if (@$_POST['submit']=="login")
{

	if(empty($mobile) || empty($password))
		{
				echo "Fill all the boxes.......";
		}
	$query ="SELECT * FROM user_info WHERE mobile='$mobile' AND password='$password'";
	$result=mysqli_query($conn,$query);
	$count= mysqli_num_rows($result);

	if ($count==1)
	{
	//while loop
	  while ($row = mysqli_fetch_assoc($result))
	  {
	    $dbphone = $row['mobile'];
	    $dbpassword = $row['password'];

		    if ($dbphone==$mobile && $dbpassword==$password) 
		    {
		    	 	 $_SESSION['mobile'] = $dbphone;
	 				 header("Location: http://localhost/travel/menu.html");
	 			 
		  	}
		 }
	}
		else
		{
			echo "wrong Mobile number";
		}

}

?>
