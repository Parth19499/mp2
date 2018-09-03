<?php
	$email=$_POST['email'];
	$pass=$_POST['pass'];
	$name=$_POST['name'];
	$dob=htmlentities($_POST['dob']);
	$hashed_pass = md5($pass);
	$ru=$_POST['ru'];
	$disease=$_POST['disease'];
	//$qualification=$_POST['qualification'];
	$db = 'smarthea_mp2';
	$connection = new mysqli('localhost','smarthea_Parth','Parth@19499',$db) or die("connection failed");
	if($ru == "user"){
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
	}
	else if($ru == "patient"){
	    $sql="INSERT INTO patientdetails VALUES('".$name."','".$email."','".$hashed_pass."','".$disease."')";
	    if(mysqli_query($connection,$sql)){
	        echo "success!!!";
		    print '<script type="text/javascript">';
		    print 'alert("The data is inserted!!!")';
		    print '</script>';
	    }
	    else{
	        echo "patient already exists!!!";
	    }
	}
	else{
	    //starting of so code
	   // $allow = array("jpg", "jpeg", "gif", "png");
    //     $todir = 'images/Doctor_Qualification/';
    //     if ( !!$_FILES['file']['tmp_name'] ){
    //         $info = explode('.', strtolower( $_FILES['file']['name']) );
    //         if ( in_array( end($info), $allow) ){
    //             if ( move_uploaded_file( $_FILES['file']['tmp_name'], $todir . basename($_FILES['file']['name'] ) ) ){
    //                 // the file has been moved correctly
    //             }
    //         }
    //         else{
    //             // error this file ext is not allowed
    //         }
    //     }
	    //Ending of so code
	    //Starting of yo
	    if(isset($_POST['btn_upload']))
            {
                $filetmp = $_FILES["file_img"]["tmp_name"];
                $filename = $_FILES["file_img"]["name"];
                $filetype = $_FILES["file_img"]["type"];
                $filepath = "../images/dq/".$filename;
                if(file_exists("../images/dq/")){
                    echo "suc cess";
                }
                else{
                    echo "errorB";
                }
                if(move_uploaded_file($filetmp,$filepath)){
                    echo "successYo!!!";
                }
                else{
                    echo "Error";
                }
                echo $filetmp;
                //$sql = "INSERT INTO doctordetails VALUES ('$filename','$filepath','$filetype')";
                //$result = mysqli_query($connection,$sql);
                $sql="INSERT INTO doctordetails VALUES('".$name."','".$email."','".$hashed_pass."','".$filename."','".$filepath."','".$filetype."')";
	    if(mysqli_query($connection,$sql)){
	        echo "success!!!";
		    print '<script type="text/javascript">';
		    print 'alert("The data is inserted!!!")';
		    print '</script>';
	    }
	    else{
	        echo "doctor already exists!!!";
	    }
            }

	    //Ending of yo
	    
	}
	$connection->close();
?>