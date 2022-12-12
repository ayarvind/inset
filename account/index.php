<?php
include('includes/connect.php');
if(isset($_COOKIE['username'])){
    $usnid = $_GET['usn'];
    $sql123 = "SELECT * FROM user_account WHERE username='$usnid'";
    $query123 = mysqli_query($conn,$sql123);
    // echo mysqli_num_rows($query123);
    if(mysqli_num_rows($query123)){
        $dataR = mysqli_fetch_assoc($query123);
            ?>
 <center> <div class="menuConatiner" style="padding:13px 16px;color:#333;">
                                                                 <img src="account/<?php echo $dataR['profile'] ?>" alt="<?php echo $_COOKIE['fullname'] ?> Profile picture" style="width:50px;height:50px;border-radius:50px;"> &nbsp <span>Welcome ! <font><?php echo $_COOKIE['fullname'] ?></font></span>
                                                                
                                                                 <div class="menyAnch">

                                                                
                                                                 <a href="#">Manage account</a>
                                                                
                                                                 <a href="instant/?inspg_instant@id=<?php echo md5($dataR['username']) ?>">Your instant page</a> 
                                                                 <a href="account/logout.php">Logout</a>
                                                    </div>
                                                    </div>
</center>
                                                    <style>
                                                        .menuConatiner{
                                                            /* border:1px solid #ddd;
                                                             */
                                                             text-align:left;
                                                             background:#f9f9f9;
                                                             box-shadow:0px 0px 9px 0px rgba(0,0,0,0.2);
                                                            border-radius:8px;
                                                            width:400px;
                                                        }
                                                        .menyAnch a{
                                                                padding:6px ;
                                                                color:#333;
                                                                text-decoration:none;
                                                                display:block;

                                                        }
                                                    </style>
            <?php
        
    }
?>
                                                  
<?php
}else{
    include('explore_login.php');

}
?>