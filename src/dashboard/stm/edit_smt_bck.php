<?php
include('../../../includes/connect.php');
$topic= $_POST['topic'];
$id = $_POST['smt_id'];

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

$smt_path_parts = pathinfo($smtFilename);
$fileSmtName=$smt_path_parts['filename'];

if( in_array( $smtExt , $validSmt) ){
    move_uploaded_file($smtTempName,$target_file);
}else{
    $data="vns";
}
if($topic !="" && $subject !="" && $smtFilename !=""){
    $sql = "UPDATE `smt` SET `smt_topic` = '$topic', `smt_src`='$target_file', `smt_subject`='$subject', `smt_about`='about',`date`='$date',`smt_file_name`='$fileSmtName' WHERE smt_id='$id' AND uploaded_by = '$usn'";
    $query = mysqli_query($conn,$sql);
    if($query){
        $data="success";
    }else{
        $data ="fail";
    }
}
echo $data;

?>

