<?php
include('connect.php');
$usn = $_COOKIE['username'];

$sql1 = "SELECT * FROM bookmark WHERE   `username`='$usn' AND `type`='smt'";
$query = mysqli_query($conn,$sql1);
if($query){
    $num = mysqli_num_rows($query);
    if($num !=0){
        while($data = mysqli_fetch_assoc($query)){
            $src_id = data['bookmar_src_id'];
            $sql2  = "SELECT * FROM smt WHERE smt_id='$src_id' ";
            $query2 = mysqli_query($conn,$sql2);
            if($query2){
                $num1 =  mysqli_num_rows($query2);
                // echo $num1;
            $rows = mysqli_fetch_assoc(mysqli_query($conn,$sql2));
                
            
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
        }
    }else{
        echo 'No bookmark found';
    }
}else{
    echo 'Server failure';
}

?>