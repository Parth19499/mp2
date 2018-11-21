<?php
session_start();
$fb = $_POST['feedbacktext'];
$db = 'smarthea_mp2';
$connection = new mysqli('localhost','smarthea_Parth','Parth@19499',$db) or die("connection failed");
$sql = "select email from feedbackdetails where email = '".$_SESSION[validate_session]."'";
if($result=mysqli_query($connection,$sql)){
    $rowcount = mysqli_num_rows($result);
    mysqli_free_result($result);
}
//print '<script type="text/javascript">alert("'.$rowcount.'");</script>';
if($rowcount == 0){
    $query = "insert into feedbackdetails values('".$_SESSION['validate_session']."','".$fb."')";
    if(mysqli_query($connection,$query)){
        print '<script type="text/javascript">';
        print 'alert("Feedback submitted successfully\nThank you :-)")';
        print '</script>';
        print '<script type="text/javascript">location.href = "../index.php";</script>';
    }
    else{
        print '<script type="text/javascript">';
        print 'alert("Something went wrong while submitting feedback :-(")';
        print '</script>';
        print '<script type="text/javascript">location.href = "../feedback.html";</script>';
    }
}
else{
    $query1 = "update feedbackdetails set feedback='".$fb."' where email='".$_SESSION['validate_session']."'";
    if(mysqli_query($connection,$query1)){
        print '<script type="text/javascript">';
        print 'alert("Feedback updated successfully\nThank you :-)")';
        print '</script>';
        print '<script type="text/javascript">location.href = "../index.php";</script>';
    }
    else{
        print '<script type="text/javascript">';
        print 'alert("Something went wrong while updating feedback :-(")';
        print '</script>';
        print '<script type="text/javascript">location.href = "../feedback.html";</script>';
    }
}
?>