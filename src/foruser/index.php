<?php //include('getsmt.php')?>

<div class="navbarTabConatiner">
            <ul  style="overflow-x:auto;list-style-type:none;">
                    <li><a role="button" id="smtLoad">Notes</a></li>
                    <li><a role="button" id="lectureLoad">Videos</a></li>

            </ul>
</div>
<div class="container" id="LoadSMTLC">

</div>
</div>
            <script>
                    $(document).ready(function(){
                        setInterval(() => {
                            if($("#searchConatiner").css("display")=="block"){
                                $("#LoadSMTLC").hide();
                            }
                        }, 1000);
                        $("#smtLoad").click(function(){
                            loadSMTLC("src/foruser/getsmt.php"); 
                        });
                        $("#lectureLoad").click(function(){
                            loadSMTLC("src/foruser/getlecture.php"); 
                        });
                        
                                function loadSMTLC(URL){
                                    $.ajax({
                                        url:URL,
                                        type:"post",
                                        beforeSend:function(){
                                            $("#LoadSMTLC").html('<i class="fa fa-spinner"></i>');

                                        },
                                        success:function(res){
                                                $("#LoadSMTLC").html(res);
                                        }
                                    })

                                }
                    });
            </script>

<style>
.navbarTabConatiner{
    /* margin-top:0px; */
    background:dodgerblue;
    color:white;

    /* background: */
    margin-top:-20px;
    /* padding:4px 7px; */
    /* border-bottom:1px solid #ddd; */
}
.navbarTabConatiner ul li{
    margin-right:20px;
}
.navbarTabConatiner ul li a{
    text-decoration:none;
    float:left;
    color:white;
    padding:7px 12px;
}
</style>