<?php
include('../../../includes/connect.php');
$topic= $_POST['topic'];
$subject = $_POST['subject'];
$about = $_POST['about'];
$smtFilename=$_FILES['smt']['name'];
$smtTempName=$_FILES['smt']['tmp_name'];
$target_file="material/".$smtFilename;
$data="";
$usn = $_COOKIE['username'];
$date = date("Y-m-d") ;

$smtExt=pathinfo($smtFilename,PATHINFO_EXTENSION);
$validSmt=array('jpg','gif','webp','tiff','psd','raw','bmp','heif','indd','jpeg','jfif','pdf');
$smt_path_parts = pathinfo($smtFilename);
$fileSmtName=$smt_path_parts['filename'];


if( in_array( $smtExt , $validSmt) ){
    move_uploaded_file($smtTempName,$target_file);
}else{
    $data="vns";
}
if($topic !="" && $subject !="" && $smtFilename !=""){
    $sql = "INSERT INTO `smt`(`smt_topic`, `smt_src`, `smt_subject`,`smt_file_name`, `smt_about`,`uploaded_by`,`date`) VALUES ('$topic','$target_file','$subject','$fileSmtName','$about','$usn','$date')";

    $query = mysqli_query($conn,$sql);
    if($query){
        $data="success";
    }else{
        $data ="fail";
    }
}
echo $data;

?>