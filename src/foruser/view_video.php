<div class="conatiner">
<?php
     include('../../includes/connect.php');

     $usn = $_COOKIE['username'];
        $vidId = $_POST['video_id'];
         $sql = "SELECT * FROM video_lecture WHERE  video_id='$vidId'";
         $query = mysqli_query($conn,$sql);
         $num = mysqli_num_rows($query);
         if($num!=0){
             while($rows = mysqli_fetch_assoc($query)){
                    ?>
                                <div class="card" id="vidSection">
                                <video id="videoTag" controls>
                                        <source src="src/dashboard/video_lecture/<?php echo $rows['video_src'] ?>">
                                </video> 
                                </div>
                                <idv class="card" id="desSect">
                                       <div class="conatiner" style="padding:4px 8px;">
                                       <span style="color:#333;font-size:23px;"> <?php echo $rows['video_topic'] ?> </span>
                                       <br>
                                       <table>
                                       <tr>
                                       <td><span style="color:#333;float:left;font-size:12px;">  <?php echo $rows['date'] ?> </span>  </td>
                                      <td> <span style="color:green;font-size:13px;margin-left:30px;">  <?php echo ucfirst($rows['video_subject']) ?> </span> </td>

                                       </tr>
                                       </table>
                                       <br>
                                       <div class="card">
                                                    <span><?php echo nl2br($rows['video_about']) ?></span>
                                       </div>
                                       </div>
                                      
                                </div>
                    <?php
             }
         }
?>

</div>


<style>
#vidSection{
    /* background:red; */
    width:63%;
}
#desSect{
    
    background:#f9f9f9;
    width:63%;
 

}
    #videoTag{
        width:100%;
        height:auto;
        max-height:660px;
        background:#f9f9f9;
    }
    @media screen and (max-width: 700px) {
        
#vidSection{
    /* background:red; */
    width:110%;
    margin-left:-20px;
}

#desSect{
    width:110%;
    margin-left:-20px;
}
#videoTag{
        width:100%;
        height:auto;
        position:sticky;
        right:0px;
        left:0px;
        max-height:660px;
        background:#f9f9f9;
    }
    }
</style>