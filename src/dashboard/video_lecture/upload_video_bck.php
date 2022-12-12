<?php
include('../../../includes/connect.php');
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
    $sql = "INSERT INTO `video_lecture`(`video_topic`, `video_src`, `video_subject`, `video_about`,`uploaded_by`,`date`) VALUES ('$topic','$target_file','$subject','$about','$usn','$date')";

    $query = mysqli_query($conn,$sql);
    if($query){
        $data="success";
    }else{
        $data ="fail";
    }
}
echo $data;

?>