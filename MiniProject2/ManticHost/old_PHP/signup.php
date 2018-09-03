<?php
	$email=$_POST['email'];
	$pass=$_POST['pass'];
	$name=$_POST['name'];
	$ru=$_POST['ru'];
	$dob=htmlentities($_POST['dob']);
	$hashed_pass = md5($pass);
	$db = 'smarthea_mp2';
	$connection = new mysqli('localhost','smarthea_Parth','Parth@19499',$db) or die("connection failed");
	// $sql1="";
	// if(mysql_query($connection,$sql1))
	$sql="INSERT INTO userdetails(name,email,password,dob) VALUES ('".$name."','".$email."','".$hashed_pass."','".$dob."')";
	if(mysqli_query($connection,$sql)){
		echo "success!!!";
		print '<script type="text/javascript">';
		print 'alert("The data is inserted!!!")';
		print '</script>';
	}
	else{
		echo "user already exists!!!";
	}
	$connection->close();
?>