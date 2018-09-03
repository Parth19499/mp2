<?php
	session_start();
	$db='smarthea_mp2';
	$otp=$_POST['otpVal'];
	$temp="yo";
	$connection = new mysqli('localhost','smarthea_Parth','Parth@19499',$db) or die("connection failed");
	$otpcheck="SELECT email from userdetails WHERE otp_validate='".$otp."'";
	if($res=mysqli_query($connection,$otpcheck)){
			while ($row=mysqli_fetch_row($res)) {
				$temp=$row[0];
			}
			 mysqli_free_result($res);
	}
	if($temp == $_SESSION["YOEMAIL"]){
		$clsotp="UPDATE userdetails set otp_validate='' WHERE email='".$_SESSION["YOEMAIL"]."'";
 		mysqli_query($connection,$clsotp);
    	print '<script type="text/javascript">location.href = "resetPass.html";</script>';
	}
	else{
		print '<script type="text/javascript">';
		print 'alert("something went wrong")';
		print '</script>';
	}
	$connection->close();
?>