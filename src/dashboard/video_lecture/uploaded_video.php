<div id="uploadedVideodct" style="background:white;">
   
                <?php
                include('../../../includes/connect.php');

                $usn = $_COOKIE['username'];
                $sql = "SELECT * FROM video_lecture WHERE uploaded_by='$usn'";
                $query = mysqli_query($conn,$sql);
                $num = mysqli_num_rows($query);
                if($num!=0){
                    while($rows = mysqli_fetch_assoc($query)){
                        ?>
                         <table width="100%"  border="0">
                        <tr>
                            <td> <video style="width:170px;max-height:90px;background:#f9f9f9"> <source src="src/dashboard/video_lecture/<?php echo $rows['video_src'] ?>"> </video> </td>
                            <td valign="top" style="width:60%"> <font style="color:gray;font-size:13px;">
                            <div style="text-algin:vertical-top;display:table;">
                          <span style="color:#333">  Topic</span> : <?php echo substr($rows['video_topic'],0,60) ?>..</font> <br>
                            <font style="color:#333;font-size:13px;">Subject : <span style="color:green"> <?php echo $rows['video_subject'] ?> </span> </font>
                            <br>
                            <font style="color:#333;font-size:12px;">Uploaded on : <span style="color:gray"> <?php echo $rows['date'] ?> </span> </font>

                    </div>
                        </td>
                        <td valign="top"> <a role="button" id="openActionMenu" style="padding:6px 17px;font-size:17px;" onclick="document.getElementById('<?php echo $rows['video_id'] ?>').style.display='block'"> <i class="fa fa-ellipsis-v"></i> </a>
                        <div class="menuCardContainer" style="display:none;" id="<?php echo $rows['video_id'] ?>">
                                <div class="menuCard">
                                    
    
                                <ul class="nav">
                                <a role="button" id="openActionMenu" style="color:#333;padding:12px 17px;font-size:17px;" onclick="document.getElementById('<?php echo $rows['video_id'] ?>').style.display='none'"> &times</a>
                                    <li> <a role="button" class="editVideo" data-id="<?php echo $rows['video_id'] ;?>"> <i class="fa fa-pencil"></i> Edit</a> </li>
                                    <li> <a role="button" class="deleteVideo" data-id="<?php echo $rows['video_id'] ;?>"> <i class="fa fa-trash"></i> Delete</a> </li>
                                    <li> <a role="button"> <i class="fa fa-info-circle"></i> Video details</a> </li>

                                </ul>
                                </div>
                                </div>
                    
                    </td>
                        </tr>
                        </table>
                        <?php
                    }
                }else{
                    ?>
                    <div>
                        <center>
                        <font style="color:gray;font-size:41px;">Sorry !</font><br>
                    <font style="color:#333;font-size:16px;">Could not find any videos</font>
                  
                        </center>
                     </div>
                           
                    <?php
                }

                
                ?>
             
             
<div id="msgConatiner">
    <div id="alertMsg">
                    <font id="alertMsgtxt">Do you want to delete it forever .</font> <br> <br>
                  <a role="button" style="margin-right:20px;" onclick="document.getElementById('msgConatiner').style.display='none'">Cancel</a>  <a role="button" id="continuePr">Continue</a>
    </div>

</div>
</div>
                   
<style>
    #uploadedVideodct{
        position:absolute;
        margin:0px;
        width:40%;
        background:white;
        left:2px;
        right:2px;
        margin-top:4px;
    }
    .menuCard{
        width:160px;
        position:absolute;
        padding:0px 0px;
        background:white;
        color:#3333;
        float:right;
        right:0px;
        margin-top:-25px;
        margin-right:-30px;
        box-shadow:0px 0px 9px 0px rgba(0,0,0,0.3);
        border-radius:5px;
        color:gray;

    }
    .menuCard i{
        margin-right:9px;
    }
    .menuCard ul li a{
        font-size:15px;
        padding:8px 7px;
        color:#333;
    }
    #uploadedVideodct td{
        padding:3px 0px;
        padding-right:9px;
        /* border-bottom:1px solid #ddd; */
    }
    .menuCardContainer{
        position:absolute;
        left:0px;
        right:0px ;
        width:100%;
        /* margin-top:0px; */
        height:100vh;
        background:transparent;
    }
    #msgConatiner{
        position:absolute;
        background:white;
        border-radius:6px;
        /* height:80px; */
        box-shadow:0px 0px 9px 0px rgba(0,0,0,0.3);
        padding:12px 18px;
        width:340px;
        left:40%;
        margin-top:-80px;
        display:none;
        right:30%;
    }
    @media screen and (max-width: 700px) {
            #uploadedVideodct{
                width:100%;
            }
            .menuCard{
                right:50px;
            }
            #msgConatiner{
                left:15px;
                right:10px;
            }

    }
</style>
<script>
    $(document).on("click",".deleteVideo",function(){
        var id = $(this).data("id");

                    $("#msgConatiner").show();
                    $(".menuCardContainer").hide();

                var confirm =""; 
                $('#continuePr').click(function(){
                    deleteVideo();
                });
                  function deleteVideo(){
                $.ajax({
                url:"src/dashboard/video_lecture/delete_video.php",
                type : "post",
                data:{video_id:id},
                success:function(data){
                    if(data =="success"){
                        $("#alertMsgtxt").html("Something went wrong");

                    }else{
                        
                        // $("#uploadedVideodct").closest("table").hide();
                        $("#uploadeVideo").trigger("click");
                    $("#msgConatiner").hide();

                    }
                }
            });
            }
           
    });

    $(document).on("click",".editVideo",function(){
        var video_id = $(this).data("id");

                $.ajax({
                url:"src/dashboard/video_lecture/edit_video.php",
                type : "post",
                data:{video_id:video_id},
                success:function(data1){
                    $("#getResult").html(data1);
                }
            });
    
           
    });
</script>