<link rel="stylesheet" type="text/css" href="style.css">
<?php
$conn=mysqli_connect("localhost","root","","travel");
$name=$_POST['name'];
$phone=$_POST['mobile'];
$occu=$_POST['occupation'];
$link=$_POST['link'];
$password=$_POST['pass'];
//$set3=$_POST['search_source'];
if (!$conn)
{
	die('Could not connect: ' . mysql_error());
}
if (@$_POST['submit']=="register")
{
	if(empty($name) || empty($phone) || empty($occu) || empty($link) || empty($password))
		{
			echo "Fill all the boxes.......";
		}
	
	else 
		{
			$phone_len=strlen($phone);
			$password_len=strlen($password);
			if($phone_len==11 && $password_len>=8 )
			{
				 $sql = "INSERT into user_info values('$name','$phone','$occu','$link','$password')";
				if (mysqli_query($conn, $sql))
					{
	 				 echo "<h1>Registration  successfully completed</h1>";
	 				 ?>
	 				 <a href="login.html" style="text-align: center;">Login</a><br>
	 				 <?php
	  				}
			}
			else
			{
				echo "Wrong";
			}
		}
}
?>