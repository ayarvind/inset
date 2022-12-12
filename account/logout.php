<?php

    setcookie("username","",time()-3600,'/');
    setcookie("email","",time()-3600,'/');
    setcookie("fullname","",time()-3600,'/');
    header("location:explore_login.php");
?>
