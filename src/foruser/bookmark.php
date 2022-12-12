<?php
   include('../../includes/connect.php');
    $id = $_POST['get_id'];
    // $id= 3;
    $type = $_POST['get_type'];
    // $type = "smt";
    $data = "";
    $usn = $_COOKIE['username'];
    $date = date('Y-m-d');
    if($type !="" && $id !=""){
        $sql2 = "SELECT * FROM bookmark WHERE username='$usn' AND bookmark_src_id='$id'";
        $query2 = mysqli_query($conn,$sql2);
        $num = mysqli_num_rows($query2);
        // echo $num;
        if($num == 0){
    $sql = "INSERT INTO `bookmark`(`bookmark_src_id`, `type`,`username`,`date`) VALUES ('$id','$type','$usn','$date')";
    $query = mysqli_query($conn,$sql);
    if($query){
        $data = "ADDED";
    }else{
        $data = "FAIL";
    }
}else{
   //
}
    }
    echo $data;
?>