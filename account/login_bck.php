<?php
session_start();
include("../includes/connect.php");

$email=$_POST['email'];
$pass=$_POST['password'];
$ps=md5($pass);
$usn=$_POST['username'];

$sql="SELECT * FROM user_account WHERE email='$email' AND password='$ps' AND username='$usn'";
$query = mysqli_query($conn,$sql);
$data=mysqli_fetch_assoc($query);
$total=mysqli_num_rows($query);
$fullname=$data['fullname'];
$email=$data['email'];
$username=$data['username'];

if($total !=0){
echo "success";
setcookie("username",$username,time()+3*60*60*24,'/');
setcookie("fullname",$fullname,time()+3*60*60*24,'/');

}else{
  echo "fail";
}

 ?>
