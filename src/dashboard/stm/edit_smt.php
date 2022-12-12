<?php
include('../../../includes/connect.php');
$usn = $_COOKIE['username'];
$id = $_POST['smt_id'];
$sql = "SELECT * FROM smt WHERE smt_id='$id' AND uploaded_by = '$usn'";
$query = mysqli_query($conn,$sql);
$num = mysqli_num_rows($query);
if($num !=""){
    $data = mysqli_fetch_assoc($query);

}
?>
<div class="conatiner" id="formConatinerVideo">
    <form id="smtForm">
        
        
  <input type="text" value=<?php echo $data['smt_topic'] ?> class="form-control" id="topic" name="topic" placeholder="Enter topic with chapter name " required>
        <div id="preview-img" style="display:block;">

        <img id="imgTagPre" src="src/dashboard/stm/<?php echo $data['smt_src'] ?>" style="width:100%;background:#f9f9f9;height:260px;margin-bottom:4px;" >
         
        </div>
       <a role="button" style="padding:8px 12px;border:1px solid #ddd;outline:none;text-decoration:none;" onclick="document.getElementById('materail').click()">Select material</a>
  <input type="file"  style="display:none;" name="smt" class="form-control" id="materail" required>

    <input type="text" value="<?php echo $data['smt_id'] ?>" style="display:none" name="smt_id">
<select style="padding:8px 12px;border:1px solid #ddd;outline:none;" name="subject" id="subject" required>
            <option value="general">General</option>
            <option value="computer">computer/It</option>
            <option value="math">Math</option>
            <option value="Physics">Physics</option>
            <option value="organic">Organic</option>
            <option value="inorganic">Inorganic</option>
            <option value="physical">Physical</option>
            <option value="biology">Biology</option>
            <option value="english">English</option>
            


        </select>


  <textarea class="form-control" id="aboutMaterial" rows="3" placeholder="Write about material" name="about"><?php echo $data['smt_about'] ?></textarea>
            <div id="progressBar"></div>
  <a role="button" style="padding:8px 12px;border:1px solid #ddd;outline:none;text-decoration:none;" id="cancelUpdation">Cancel</a>
  <a role="button" id="upload_smt" style="padding:8px 12px;border:1px solid #ddd;outline:none;text-decoration:none;color">Update</a>

    </form>

    
</div>

<style>
        #progressBar{
            height:3px;
            border-radius:100px;
            width:0px;
            margin-bottom:20px;
            background:dodgerblue;

        }
    #formConatinerVideo{
        width:60%;
        margin-left:10%;
        margin-top:40px;
        /* margin-right:20%; */
        border:1px solid #06c78d;
        padding:12px 16px;
        border-radius:9px;
        margin-bottom:300px;
    }
    #formConatinerVideo input,#formConatinerVideo select,#formConatinerVideo textarea,#formConatinerVideo button{
        margin-bottom:10px;
    }
    @media screen and (max-width: 700px) {
        
    #formConatinerVideo{
        width:100%;
        margin:0px;
        margin-left:-9px;
        margin-top:20px;
       
        /* margin-bottom:300px; */
        

}
    }

</style>

<script>
     
 


function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#imgTagPre').attr('src', e.target.result);
        }

        reader.readAsDataURL(input.files[0]);
    }
}

$("#materail").change(function(){
    readURL(this);
    
    $("#preview-img").show();
});

$("document").ready(function(){
 $("#cancelUpdation").click(function(){
    cancelUploadation();
 });
    $("#upload_smt").click(function(){
        sendData();

    });
    function sendData(){
        var form=$("#smtForm")[0];
         var Data= new FormData(form);
          
        $.ajax({
            url:"src/dashboard/stm/edit_smt_bck.php",
            type:"post",
            data:Data,
            contentType:false,
             processData:false,
             beforeSend:function(){
                progress();
             },
             success:function(data){
                 if(data=="success"){
                    msg("Something went wrong please try again.");

                 }else if(data=="vns"){
                    msg("File is not supported currently in Instant");
                 }else{
                    msg("Material has updated.");
                       

                 }
             }
        });

    }

    function msg(MSG){
        $("#progressBar").css({
                        "background":"white",
                        "color":"green",
                        "height":"40px",
                        "transition":"0.1s",
                    });
                    $("#progressBar").html(MSG);

    }
    function progress(){
        setInterval(() => {
            if($("#progressBar").css("width")=="100%"){
                $("#progressBar").css({
                         "width":"0%",
                         "transition":"0.9s",
                     })   
            }else{
                $("#progressBar").css({
                         "width":"100%",
                         "transition":"0.9s",
                     })
            }
                    
                 }, 1000);
    }
    function cancelUploadation(){
                    location.reload();
    }
})
</script>