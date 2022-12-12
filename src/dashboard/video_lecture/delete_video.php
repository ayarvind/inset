<?php
include('../../../includes/connect.php');
$id = $_POST['video_id'];
$usn  = $_COOKIE['username'];
$data = "";
$sql2 = "SELECT video_src FROM `video_lecture` WHERE video_id = '$id' AND uploaded_by = '$usn'";
$query2 = mysqli_query($conn,$sql);
$data  = mysqli_fetch_assoc($query);

$fileVid = fopen($data,"w");
fclose();
chmod($data,0777);
unlink($data);

$sql = "DELETE FROM `video_lecture` WHERE video_id='$id' AND uploaded_by = '$usn'";
$query = mysqli_query($conn,$sql);
if($query){
    $data = "success";
}else{
    $data = "fail";
}
?>