<?php
session_start();
$db = 'smarthea_mp2';
$id= 'a';
$connection = new mysqli('localhost','smarthea_Parth','Parth@19499',$db) or die("connection failed");
$subemail=$_POST['subemail'];
$_SESSION["YOEMAIL"]=$subemail;
	$sql="select * from userdetails where email='".$subemail."'";
	$query=mysqli_query($connection,$sql);
	$result=mysqli_num_rows($query);
	if($result == 0){
		print '<script type="text/javascript">';
		print 'alert("User does not exists.")';
		print '</script>';
		print '<script type="text/javascript">location.href = "signup.html";</script>';
	}
	else if(mysqli_query($connection,$sql) && $result==1){
		echo "user exists";
		print '<script type="text/javascript">showMe()</script>';
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
		$getidq="SELECT id from userdetails where email='".$subemail."'";
		$suc=mysqli_query($connection,$getidq);
		while($res=mysqli_fetch_array($suc)){
            $id=$res['id'];
        }
		$subject="OTP";
		$msg="Here is your otp: ".$randno;
		$header="From: no-reply@mantichost.com";
		mail($subemail, $subject, $msg,$header);
		print '<script type="text/javascript">location.href = "otpValidate.html";</script>';
		//echo 'prompt("Enter otp")';
// 			$val="SELECT * FROM userdetails WHERE otp_validate='".$otpR."'";
// 			$resu=mysqli_num_rows(mysqli_query($connection,$val));
// 			if($resu == 1){
// 			    echo "otp matched";
// 			    $clsotp="UPDATE userdetails set otp_validate='' WHERE email='".$subemail."'";
//     			mysqli_query($connection,$clsotp);
//     			print '<script type="text/javascript">location.href = "resetPass.html?id='.$id.'";</script>';
// 			}
// 			else{
// 			    echo "something went wrong";
// 			}
			
	}
	$connection->close();
?>