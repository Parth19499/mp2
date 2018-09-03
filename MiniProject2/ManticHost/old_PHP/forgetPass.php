<?php
echo "im in";
$db = 'smarthea_mp2';
$connection = new mysqli('localhost','smarthea_Parth','Parth@19499',$db) or die("connection failed");
$subemail=$_POST['subemail'];
	$sql="select * from userdetails where username='".$subemail."'";
	$query=mysqli_query($connection,$sql);
	$result=mysqli_num_rows($query);
	if($result == 0){
		print '<script type="text/javascript">';
		print 'alert("User does not exists.")';
		print '</script>';
	}
	else if(mysqli_query($connection,$sql) && $result==1){
		echo "user exists";
		$msg="Please click<a href="smarthealth.mantic.host/resetPass.html">&nbsp;here&nbsp;</a> to reset password.";
		$subject="Password Reset";
		mail($subemail, $subject, $msg);
		echo "<script type="text/javascript">showMe()</script>";
		$randno=strval(rand(0,999999));
		$length=strlen($randno);
		if($length<6){
			while (strlen($randno)<6) {
				$randno="0"+$randno;
			}
		}
		$update="UPDATE userdetails set otp_validate='".$randno."' WHERE email='".$subemail."'";
		if(mysqli_query($connection,$update)){
			echo "rand no up success";
		}
		else{
			echo "something went wrong!!!";
		}
		function valOtp(){
			$otp=$_POST['otp'];
			// $db = 'smarthea_mp2';
			// $connection = new mysqli('localhost','smarthea_Parth','Parth@19499',$db) or die("connection failed");
			$val="SELECT * FROM userdetails WHERE otp_validate='".$otp."'";
			$res=mysql_num_rows(mysqli_query($connection,$val));
			if($res == 1 && mysqli_query($connection,$val)){
				echo "<script type="text/javascript">showMeT()</script>";
			}
			else{
				echo "something went wrong!!!";
			}
		}
		function resetPass(){
			$npass=$_POST['npass'];
			$ncpass=$_POST['ncpass'];
			if($npass != $ncpass){
				print '<script type="text/javascript">';
				print 'alert("Password does not match!!!")';
				print '</script>';
			}
			else{
				$hashed_npass=password_hash($npass, PASSWORD_DEFAULT);
				// $db = 'smarthea_mp2';
				// $connection = new mysqli('localhost','smarthea_Parth','Parth@19499',$db) or die("connection failed");
				$query="UPDATE userdetails SET password='".$hashed_npass."' WHERE email='".$subemail."'";
			}
		}
	$connection->close();
?>