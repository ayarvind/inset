<div id="uploadedVideodct">
   
                <?php
                include('../../includes/connect.php');

                $usn = $_COOKIE['username'];
                           
                            if(isset($_POST['q'])){

                                
                                $q = $_POST['q'];
                               
                                        include('getlecture.php');
                                         ?>
                                       
                                         <?php



                    $sql = "SELECT * FROM smt WHERE  smt_topic LIKE '%$q%' OR smt_subject LIKE '%$q%' OR smt_file_name LIKE '%$q%' ORDER BY smt_id DESC";
                    $query = mysqli_query($conn,$sql);
                    $num = mysqli_num_rows($query);
                                
                        include('shortcut.php');
                        if($num == 0){
                            ?>
                                <!-- <div class="conatiner" style="display:<?php echo $displayType; ?>">
                                <br> 
                                 <center>
                                 <h1 style="color:gray;">Oh ! Sorry</h1> 
                                    <font style="font-szie:14px;"> We can not find any result based on <strong><span style="color:#333"><?php echo $q ?></span> </strong> from server</font> <br>
                                           <br>     <a href="https://www.google.com/search?q=<?php echo $q ?>" style="text-decoration:none;padding:5px 7px;border:1px solid dodgerblue;display:inline-block;border-radius:8px;">Search it in Google</a>
                                </center>
                                </div> -->
                                
                            <?php
                    }
                            }else{
                // include('includes/connect.php');

                $sql = "SELECT * FROM smt  ORDER BY smt_id DESC";
                $query = mysqli_query($conn,$sql);
                $num = mysqli_num_rows($query);
                            }
                // $sql = "SELECT * FROM smt WHERE uploaded_by = '$usn' ORDER BY smt_id DESC";
            
                if($num!=0){
                    while($rows = mysqli_fetch_assoc($query)){
                        ?>
                        
                        <table  border="0">
                        <tr>
                            <td><a href="#smtContent" role="button" class="ExpandSmt" data-id="src/dashboard/stm/<?php echo $rows['smt_src'] ?>">  <embed style="width:190px;max-height:110px;background:#f9f9f9" src="src/dashboard/stm/<?php echo $rows['smt_src'] ?>">  </td>
                            <td valign="top" style="width:60%"> <font style="color:gray;font-size:13px;">
                            <a href="#smtContent" role="button" class="ExpandSmt" data-id="src/dashboard/stm/<?php echo $rows['smt_src'] ?>">
                            <div style="text-algin:vertical-top;display:table;">
                          <span style="color:#333">  Topic</span> : <?php echo substr($rows['smt_topic'],0,160) ?>..</font> <br>
                            <font style="color:#333;font-size:13px;">Subject : <span style="color:green"> <?php echo $rows['smt_subject'] ?> </span> </font>
                            <br>
                            
                            <font style="color:#333;font-size:12px;">Uploaded on : <span style="color:gray"> <?php echo $rows['date'] ?> </span> </font>

                    </div>
                    <font style="color:#333;font-size:12px;">Name : <span style="color:gray"><?php echo trim($rows['smt_file_name']) ?> </span> </font>
                            <font style="color:dodgerblue;font-size:10px;">  &nbsp <i class="fa fa-check"></i> </font>
                      
                        </td>
                        <td valign="top" style="text-allign:right;"> <a role="button" id="openActionMenu" style="padding:6px 17px;font-size:17px;" onclick="document.getElementById('<?php echo $rows['smt_id'] ?>').style.display='block'"> <i class="fa fa-ellipsis-v"></i> </a>
                        <div class="menuCardContainer" style="display:none;" id="<?php echo $rows['smt_id'] ?>">
                                <div class="menuCard">
                                    
    
                                <ul class="nav">
                                <a role="button" id="openActionMenu" style="color:#333;padding:12px 17px;font-size:17px;" onclick="document.getElementById('<?php echo $rows['smt_id'] ?>').style.display='none'"> &times</a>
                                    
                                    <li> <a role="button" class="bookmarkSmt" data-id="<?php echo $rows['smt_id'] ;?>"> <i class="fa fa-bookmark"></i> Bookmark</a> </li>
                                    <li> <a role="button"> <i class="fa fa-info-circle"></i> View detail</a> </li>

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
                    <!-- <div>
                        <center>
                        <font style="color:gray;font-size:41px;">Sorry !</font><br>
                    <font style="color:#333;font-size:16px;">Could not find any study materials</font>
                  
                        </center>
                     </div>
                            -->
                    <?php
                }

                
                ?>
             
     </div>
     <div class="smtContent">
         <div class="meuActionForsmt">
             <table>
                 <tr>
                     <td> <a href="#" id="openInBrowser"> <i class="fa fa-expand"></i> </a> </td>
                     <td> <a href="#exitSmt" id="exitSmt"><i class="fa fa-times-circle" style="font-size:22px;"></i>

</a> </td>


                 </tr>
             </table>
         </div>
      <center>  <div id="embedFile"></div> </center>
      <div class="404NotFound">
          <?php include("src/404.php") ?>
      </div>
     
     
     </div>              
<style>
    
    .meuActionForsmt{
        background:#333;
        padding:13px 8px;
        color:white;
    }
    .smtContent img{
        width:100%;
        /* height:100vh; */
    }
    .meuActionForsmt td{
        padding:3px 14px;
    }
    .meuActionForsmt a{
        color:white;
    }
    .smtContent{
        width:82%;
        top:0px;
        float:right;
        display:block;
        position:fixed;
        right:0px;
        background:white;
        bottom:0px;
        /* top:50px; */
        /* overflow-y:auto; */
        height:100vh;

    }
    #smtImgContainer{
        overflow:auto;
        width:82%;
        /* top:0px; */
        /* float:right; */
        display:block;
        position:fixed;
        right:0px;
        background:white;
        bottom:0px;
        top:60px;
        /* overflow-y:auto; */
        height:91vh;
    }
    #smtContentSrc{
        width:auto;
        height:auto;
        margin-top:5px;
        overflow:auto;

    }
    #uploadedVideodct table{
        /* width:54%; */
        margin-bottom:3px;
        background:#f9f9f9;
    }
    #uploadedVideodct{
        /* position:relative;
        
        margin:0px;
        width:50%;
        background:red;
        margin-left:10px;
        margin-top:20px;
        overflow-y:auto;
        margin-bottom:30px;
        height:90vh; */
        background:white;
        /* border:1px solid #ddd; */
        padding:12px 18px;
        width:100%;
        /* margin-left:50%; */
        /* height: */
        margin-top:20px;
        /* margin-right:20%; */

    }
    .menuCard{
        width:160px;
        position:absolute;
        padding:0px 0px;
        background:white;
        color:#3333;
        float:right;
        right:43%;
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
    @media screen and (max-width: 700px) {
            #uploadedVideodct{
        position:fixed;
        width:100%;
        background:#f9f9f9;
        padding:2px 5px;
        /* left:-; */
        left:-50%;
        right:0px;
        /* top:0px; */
        border:none;
        overflow-x:hidden;
        margin-top:0px;
        overflow-y:auto;
        bottom:0px;
        height:85vh;

               
            }
            #exitSmt{
      display:block;
    }
            .menuCard{
                right:40px;
            }
            .smtContent{
        width:100%;
        /* float:right; */
        display:none;
        position:fixed;
        right:0px;
        left:0px;
        background:#f9f9f9;
        top:50px;

        height:90vh;

    }
    #smtImgContainer{
        background:white;
        top:106px;
        width:100%;
        left:0px;
        right:0px;
    }
    #smtImgContainer img{
        width:100%;
    }
    #uploadedVideodct table{
        width:100%;
    }
    }
</style>
<script>
    $(document).on("click",".bookmarkSmt",function(){
        var id = $(this).data("id");
        elem = $(this);

                    $(".menuCardContainer").hide();
                    bookmarkSmt();
                // var confirm =""; 
               
                  function bookmarkSmt(){
                      type  = "smt";
                $.ajax({
                url:"src/foruser/bookmark.php",
                type : "post",
                data:{get_id:id,get_type:type},
                success:function(data){
                    if(data =="ADDED"){
                        alert("Server failure"); 
                         
                    }else{
                        elem.css({
                            'color':'green',
                        });     
                        alert("Added to boomark"); 
                    }
                }
            });
            }
           
    });

    $(document).on("click",".ExpandSmt",function(){
        $(".404NotFound").html("").hide();
         window.src = $(this).data('id');
        // alert(src);
        $(".smtContent").slideDown("fast");
        // if(src.files[0].name.match(/\.(jpg|jpeg|png|gif)$/)){
        //     $("#smtContentSrc").attr("src",src).css({
        //     "width":"100%",
        // });
        // }else{
            
        if ( /\.(jpe?g|gif|bmp|webp|tiff|psd|raw|heif|indd|jfif)$/i.test(src) ) {
                $("#embedFile").html('<div id="smtImgContainer"><img id="smtContentSrc" src="' + src +'"></div>');
                // $("#smtContentSrc").attr('src',src)
        }else{

      

                    $("#embedFile").html('<iframe src="'+src+'" width="100%" height="94%"></iframe>').css({
                        "width":"100%",
                        "height":"100vh",
                        
                    });
        // }
    }
        
        $("#openInBrowser").attr("href",src);

        
    });
    $("#exitSmt").click(function(){
        $(".smtContent").slideUp("fast");
        src="";
        $("#smtContentSrc").attr('src',"");

    })
    setInterval(() => {
        var hash = window.location.hash;
        // alert(hash);
        if(hash !="#smtContent"){
        $(".smtContent").slideUp("fast");

        }
    }, 300);
</script>
