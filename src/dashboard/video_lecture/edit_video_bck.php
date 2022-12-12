<?php
include('../../../includes/connect.php');
$id = $_POST['video_id'];
$topic= $_POST['topic'];
$subject = $_POST['subject'];
$about = $_POST['about'];
$vidFilename=$_FILES['video']['name'];
$vidTempName=$_FILES['video']['tmp_name'];
$target_file="lectures/".$vidFilename;
$data="";
$usn = $_COOKIE['username'];
$date = date("Y-m-d") ;
$videoExt=pathinfo($vidFilename,PATHINFO_EXTENSION);
$validVideo=array('mp4','jpeg','webm','mpg','mpeg','ogg','m4p','m4v','avi','wmv','mov','mp2','mpe','3gp','avchd','flv','swf','qt','jpg');
if( in_array( $videoExt , $validVideo) ){
    move_uploaded_file($vidTempName,$target_file);
}else{
    $data="vns";
}
if($topic !="" && $subject !="" && $vidFilename !=""){
    $sql = "UPDATE `video_lecture` SET `video_topic` = '$topic', `video_src`='$target_file', `video_subject`='$subject', `video_about`='about',`date`='$date' WHERE video_id='$id' AND uploaded_by = '$usn'";
    $query = mysqli_query($conn,$sql);
    if($query){
        $data="success";
    }else{
        $data ="fail";
    }
}
echo $data;

?>