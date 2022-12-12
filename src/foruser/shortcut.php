<?php
$displayType = "block";
        if($q=="dashboard"){
            $displayType = "none";
            $ShUrl = "../dashboard/index.php";
            // $num ==1;
            ?>
               <!-- <font style="color:gray;font-size:17px;">Dashbaord opened</font> -->
            <?php
        }
        include($ShUrl);

?>

