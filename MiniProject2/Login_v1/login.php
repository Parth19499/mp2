<?php
	$email=$_POST['email'];
	$pass=$_POST['pass'];
	$hashed_pass = password_hash($pass, PASSWORD_DEFAULT);
	$db = 'mp2login';
	$connection = new mysqli('localhost','root','',$db) or die("connection failed");
	$sql="insert into userdeatils values('".$email."','".$hashed_pass."')";
	if(mysqli_query($connection,$sql)){
		echo "success!!!";
		print '<script type="text/javascript">';
		print 'alert("The data is inserted!!!")';
		print '</script>';
	}
	else{
		echo "something went wrong!!!";
	}
	$connection->close();
?>