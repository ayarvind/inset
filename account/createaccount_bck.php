<?php
session_start();
include("../includes/connect.php");

error_reporting(0);
    $eml=$_POST['email'];
    $usn=$_POST['username'];
    $fname=$_POST['fullname'];
    $psw=$_POST['password'];
    $file_name=$_FILES['profile']['name'];
    $temp_name=$_FILES['profile']['tmp_name'];
    $target_file="profile/".$file_name;
    $extProfile=pathinfo($file_name,PATHINFO_EXTENSION);

        // if($eml !="" && $usn !="" && $fname="" && $psw !=""){

       


    $validExt=array('jpg','png','gif','webp','tiff','psd','raw','bmp','heif','indd','jpeg');    
    $msg='';
      
    $mdpsw=md5($psw);

    $for_usn="SELECT * FROM user_account WHERE username='$usn'";
    $perform=mysqli_query($conn,$for_usn);
    $total_data=mysqli_num_rows($perform);
    if($total_data == 0 ){

      if(in_array($extProfile,$validExt)){
        move_uploaded_file($temp_name,$target_file);
      }else{
        $folder="null";
      }
    $sql = "INSERT INTO `user_account`(`email`, `username`, `fullname`, `password`, `profile`,`role`) VALUES ('$eml','$fname','$usn','$mdpsw','$target_file','user')";
    // $sql="INSERT INTO user_account(`email`, `fullname`, `username`, `password`, `profile`) VALUES('$eml','$fname','$usn','$mdpsw','$target_file')";
    $query=mysqli_query($conn,$sql);
    if($query){
      
      setcookie("username",$usn,time()+3*60*60*24,'/');
      setcookie("fullname",$fname,time()+3*60*60*24,'/');
        $msg="Success";
    }else{
      $msg='404';

    }
  }else{
    echo $usn;
  }
// }
echo $msg;
?>
