<?php
$db = 'mp2login';
$connection = new mysqli('localhost','root','',$db) or die("connection failed");
$subemail=$_POST['subemail'];
	$sql="select * from userdeatils where username='".$subemail."'";
	$query=mysqli_query($connection,$sql);
	$result=mysqli_num_rows($query);
	if($result == 0){
		print '<script type="text/javascript">';
		print 'alert("User does not exists.")';
		print '</script>';
	}
	else if(mysqli_query($connection,$sql)){
		echo "user exists.";
	}
	$connection->close();
?>