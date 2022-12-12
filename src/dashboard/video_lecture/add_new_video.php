<div class="conatiner" id="formConatinerVideo">
    <form id="Videoform">
        
        
  <input type="text" class="form-control" id="topic" name="topic" placeholder="Enter topic with chapter name " required>
        <div id="preview-video" style="display:none;">

        <video style="width:100%;background:#f9f9f9;" controls>
            <source id="videoTag">
        </video>

        </div>
       <a role="button" style="padding:8px 12px;border:1px solid #ddd;outline:none;text-decoration:none;" onclick="document.getElementById('Selectvideo').click()">Select video</a>
  <input type="file" style="display:none;" name="video" class="form-control" id="Selectvideo" required>


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


  <textarea class="form-control" id="aboutLecture" rows="3" placeholder="Write about lecture" name="about"></textarea>
            <div id="progressBar"></div>
  <a role="button" style="padding:8px 12px;border:1px solid #ddd;outline:none;text-decoration:none;" id="cancelUpdation">Cancel</a>
  <a role="button" id="uploadVideo" style="padding:8px 12px;border:1px solid #ddd;outline:none;text-decoration:none;color">Upload</a>

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
     
     $(document).on("change", "#Selectvideo", function(evt) {
  var $source = $('#videoTag');

  $source[0].src = URL.createObjectURL(this.files[0]);
  $source.parent()[0].load();
  $("#preview-video").show();
})

$("document").ready(function(){
 $("#cancelUpdation").click(function(){
    cancelUploadation();
 });
    $("#uploadVideo").click(function(){
        sendData();

    });
    function sendData(){
        var form=$("#Videoform")[0];
         var Data= new FormData(form);
          
        $.ajax({
            url:"src/dashboard/video_lecture/upload_video_bck.php",
            type:"post",
            data:Data,
            contentType:false,
             processData:false,
             beforeSend:function(){
                progress();
             },
             success:function(data){
                 if(data=="success"){
                    msg("Could not upload ! Please try again");
                 }else if(data=="vns"){
                    msg("Video file is not supported currently in Instant");
                 }else{
                       
                    msg("Lecture had uploadded");

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