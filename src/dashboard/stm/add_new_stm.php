<?php include('subject_option.php') ?>

<div class="conatiner" id="formConatinerVideo">
    <form id="smtForm">
        
        
  <input type="text" class="form-control" id="topic" name="topic" placeholder="Enter topic with chapter name " required>
        <div id="preview-img" style="display:none;">

        <!-- <img id="imgTagPre" style="width:100%;background:#f9f9f9;height:260px;margin-bottom:4px;" > -->
        <embed src="" id="imgTagPre"  style="width:100%;background:#f9f9f9;height:260px;margin-bottom:4px;"> 
        </div>
       <a role="button" style="padding:8px 12px;border:1px solid #ddd;outline:none;text-decoration:none;" onclick="document.getElementById('materail').click()">Select material</a>
  <input type="file"  style="display:none;" name="smt" class="form-control" id="materail" required>


<select style="padding:8px 12px;border:1px solid #ddd;outline:none;" name="subject" id="subject" required>
                        
                     <?php
                                for ($i=0; $i < count($option); $i++) { 
                                    echo ' <option value="'.$option[$i].'">'.strtoupper($option[$i]).'</option>';
                                }
                        ?>



        </select>


  <textarea class="form-control" id="aboutMaterial" rows="3" placeholder="Write about material" name="about"></textarea>
            <div id="progressBar"></div>
  <a role="button" style="padding:8px 12px;border:1px solid #ddd;outline:none;text-decoration:none;" id="cancelUpdation">Cancel</a>
  <a role="button" id="upload_smt" style="padding:8px 12px;border:1px solid #ddd;outline:none;text-decoration:none;color">Upload</a>

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
                // $('#embed').hide
            

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
            url:"src/dashboard/stm/upload_smt_bck.php",
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
                    msg("Material has uploaded");
                       

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