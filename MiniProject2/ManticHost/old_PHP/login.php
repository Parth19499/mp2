<?php
$email=$_POST['email'];
$pass=password_hash($_POST['pass'],PASSWORD_DEFAULT);
$db='smarthea_mp2';
$connection = new mysqli('localhost','smarthea_Parth','Parth@19499',$db) or die("connection failed");
$sql="select * from userdetails where email='".$email."'";
	$query=mysqli_query($connection,$sql);
	$result=mysqli_num_rows($query);
	if($result == 0){
		print '<script type="text/javascript">';
		print 'alert("User does not exists, Please Signup")';
		print '</script>';
	}
	else{
		$password=mysqli_query($connection,"SELECT password from userdetails WHERE email='".$email."'");
		if($pass!=$password){
			print '<script type="text/javascript">';
			print 'alert("Invalid Credentials")';
			print '</script>';	
		}
		else{
			print '<script type="text/javascript">location.href = "Main/index.html";</script>';
		}
	}
?>