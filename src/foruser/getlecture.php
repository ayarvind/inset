<?php
                include('../../includes/connect.php');

                $usn = $_COOKIE['username'];


                                    if(isset($_POST['q'])){
                                        $sqlL = "SELECT * FROM video_lecture WHERE video_topic LIKE '%$q%' OR video_subject LIKE '%$q%' ORDER BY video_id DESC";
                                        $queryL = mysqli_query($conn,$sqlL);
                                        $numL = mysqli_num_rows($queryL);
                                        if($numL!=0){
                                            while($rowsL = mysqli_fetch_assoc($queryL)){
                                            ?>
                                              <div class="conatiner">
                                                                       <a role="button" class="openVid" data-id="<?php echo $rowsL['video_id'] ;?>"> <div id="videoHolder">
                                                                            <video style="width:280px;height:auto;max-height:190px;background:#f9f9f9">
                                                                                    <source src="src/dashboard/video_lecture/<?php echo $rowsL['video_src'] ?>">
                                                                            </video>
                                                                            <div class="infoVideo">
                                                                            <table width="100%">
                                                                            <tr>
                                                                            <td><span style="color:#333;font-size:13px;"><?php echo substr($rowsL['video_topic'],0,40); ?></span> <br> <font style="color:gray;font-size:9px;"><?php echo $rowsL['date'] ?></font> </td>
                                                                           <td> <center> <span style="float:right;color:green;font-size:13px;"> <?php echo ucfirst($rows['video_subject'] )?></span> <br>  <font> <i class="fa fa-check-circle" style="color:dodgerblue;"></i> </font></center>  </td>
                                                                            </tr>
                                                                            </table>
                                                                                    
                                                                                    
                                                                            </div>
                                                                        </div>
                                                            </div>
                                                            
                                                           
                                                
 
                                            <?php        
                                            }
                                        }else{
                        ?>
                                 <!-- <div class="conatiner" >
                                <br> 
                                 <center>
                                 <h1 style="color:gray;">Oh ! Sorry</h1> 
                                    <font style="font-szie:14px;"> We can not find any result based on <strong><span style="color:#333"><?php echo $q ?></span> </strong> from server</font> <br>
                                           <br>     <a href="https://www.youtube.com/results?search_query=<?php echo $q ?>" style="text-decoration:none;padding:5px 7px;border:1px solid dodgerblue;display:inline-block;border-radius:8px;">Search in Youtube</a>
                                </center>
                                </div> -->
                        <?php
                                        }
                                    }else{

                                        $sql = "SELECT * FROM video_lecture  ORDER BY video_id DESC";
                                        $query = mysqli_query($conn,$sql);
                                        $num = mysqli_num_rows($query);
                                        if($num!=0){
                                            while($rows = mysqli_fetch_assoc($query)){
                                                      ?>
                                                            <div class="conatiner">
                                                                       <a role="button" class="openVid" data-id="<?php echo $rows['video_id'] ;?>"> <div id="videoHolder">
                                                                            <video style="height:auto;max-height:190px;background:#f9f9f9">
                                                                                    <source src="src/dashboard/video_lecture/<?php echo $rows['video_src'] ?>">
                                                                            </video>
                                                                            <div class="infoVideo">
                                                                            <table width="100%">
                                                                            <tr>
                                                                            <td><span style="color:#333;font-size:13px;"><?php echo substr($rows['video_topic'],0,40); ?></span> <br> <font style="color:gray;font-size:9px;"><?php echo $rows['date'] ?></font> </td>
                                                                           <td> <center> <span style="float:right;color:green;font-size:13px;"> <?php echo ucfirst($rows['video_subject'] )?></span> <br>  <font> <i class="fa fa-check-circle" style="color:dodgerblue;"></i> </font></center>  </td>
                                                                            </tr>
                                                                            </table>
                                                                                    
                                                                                    
                                                                            </div>
                                                                        </div>
                                                            </div>
                                                      <?php  
                                            }
                                        }else{
                                            ?>
                                                    <font>Could not fond any video</font>
                                            <?php
                                        }



                                    }


              
                        ?>

                        <style>
                        #videoHolder{
                            float:left;
                            width:280px;
                            margin:2px;
                            /* background:#f9f9f9; */
                        }
                        #videoHolder video{
            width:280px;
        }
                        #videoHolder table td{
                            padding:2px 5px;
                        }
    @media screen and (max-width: 700px) {
        #videoHolder{
            width:111%;
            position:relative;
            display:inline-block;
            margin-left:-20px;
            /* background:red; */
            /* margin:0px; */
        }
        #videoHolder video{
            width:100%;
        }
    }
                        </style>

                        <script>
                                    $(document).on("click",".openVid",function(){
                                        // LoadSMTLC
                                        var vidId=$(this).data("id"); 
                                        var ele = $(this);
                                        // alert("hello"+vidId);
                                        $.ajax({
                                            url  : "src/foruser/view_video.php",
                                            type:"post",
                                            data:{video_id:vidId},
                                            beforeSend:function(){
                                                $("#LoadSMTLC").html("<center><i class='fa fa-spinner' style='margin-top:40px;color:dodgerblue;font-size:18px;'></i> </center>");

                                            },
                                            success:function(result){
                                                $("#LoadSMTLC").html(result);
                                            }

                                        })

                                    });
                        </script>
