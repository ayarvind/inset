
<div class="conatiner-fluid" id="vdL" style="margin-top:15px;background:white;">
    <div class="alignTable" style="background:white;">
    
        <ul class="nav" id="meUtable">
            <li> <a role="button" id="uploadeVideo">Uplaoded</a> </li>
            <li> <a role="button"id="Add-new">Add new</a> </li>
</ul>
    <div>
</div>
</div>
<div id="getResult" class="container-fluid" style=""></div>

<style>
    .alignTable{
        padding:4px 7px;
        width:40%;
        margin-left:30%;
        margin-top:120px;
        transition:0.3s;
        margin-right:30%;
    }

    #meUtable{
        width:100%;
        background:white;
        border:1px solid #ddd;
        /* padding:6px 8px; */
        border-radius:2px;
        display:flex;
        list-style-type:none;
       
    }
    #meUtable li{
        width:50%;
        text-align:center;
    }
    #meUtable td a:hover{
            text-decoration:none;
    }
   #getResult{
       transition:0.4s;
       position:fixed;
       overflow-y:auto;
       height:96vh;
       background:white;

   }
    @media screen and (max-width: 700px) {
        .alignTable{
            width:100%;
            margin:0px;
            margin-top:0px;
        }
        #meUtable{
        width:100%;
    } 
   
    }
</style>

<script>
    $(document).ready(function(){
        $("#Add-new").click(function(){
            getData("src/dashboard/video_lecture/add_new_video.php");
        });
        $("#uploadeVideo").click(function(){
            getData("src/dashboard/video_lecture/uploaded_video.php");
        });
        function getData(Url){
            $.ajax({
                url:Url,
                type:"post",
                success:function(result){
                    $("#getResult").html(result);
                    $(".alignTable").css({
                        "margin-top":"0px",
                    });
                    $("#getResult").css({
                        "margin":"0px",
                        "width":"100%",
                        "border-top":"1px solid dodgerblue",
                    })
                    
                }
            })
        }
    })
</script> 