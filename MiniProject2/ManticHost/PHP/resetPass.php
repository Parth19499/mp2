<?php
session_start();
    $db='smarthea_mp2';
    $id=$_POST['id'];
//$myPDO = new PDO('mysql:host=localhost;dbname=smathea_mp2', 'smathea_Parth', 'Parth@19499');
$connection = new mysqli('localhost','smarthea_Parth','Parth@19499',$db) or die("connection failed");
$npass=$_POST['npass'];
$ncpass=$_POST['ncpass'];
if($npass != $ncpass){
    print '<script type="text/javascript">';
    print 'alert("Password does not match!!!")';
    print '</script>';
    print '<script type="text/javascript">location.href = "resetPass.html";</script>';
}
else {
    $hashed_npass=md5($npass);
    $update="UPDATE userdetails SET password='".$hashed_npass."' WHERE email='".$_SESSION["YOEMAIL"]."'";
    $result=mysqli_query($connection,$update);
    if(mysqli_query($connection,$update)){
        echo "Done";
    }
    else {
        echo "Something went wrong";
        
    }
}
?>