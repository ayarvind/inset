<?php
if(isset($_COOKIE['username'])){
    header("location:../");
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Login to ExploreIt</title>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="keywords" content="Login ExploreIt" id="keywords"></meta>
    <meta name="decription" id="description" content="Login to continue in ExploreIt"></meta>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <style>
        .container-holder{
            width:60%;
            margin-left:20%;

            margin-right:20%;
            border:1px solid #ddd;
            background:#f9f9f9;
            border-radius:18px;
            padding:16px 19px;
            margin-top:160px;
        }ul{
            list-style-type:none;
        }
        .container-holder input{
            padding:12px 12px;
            border-radius:8px;
            margin-bottom:16px;
            border:1px solid #ddd;
            width:92%;
            outline:none;
        }
        #login{
            padding:6px 12px;
            text-align:center;
            float:right;
            border:none;
            outline:none;
            background:rgb(38, 145, 82);
            color:white;
            cursor:pointer;
            margin-right:35px;
            border-radius:6px;
            width:80px;
        }
        @media screen and (max-width: 600px) {
            .container-holder{
               width:80%;
               position:absolute;
               margin-left:2%;
            }
            .container{
                margin-left:-40px;
            }
            #login{
                margin-right:0px;
            }
            body{
                background:#f9f9f9;

            }
           
        }
    </style>
</head>
<section class="container-holder">
    <div class="container">
      
        <center>    <p id="msg" style="font-size:15px ;color:purple">Login to continue</p></center>
            <ul>
                <li><input type="email" placeholder="Enter email address" id="email"></li>
                <li><input type="text" placeholder="Enter username" id="username"></li>
                <li><input type="password" placeholder="Enter password" id="password"></li>
                <li><button id="login">Login</button> <p><a href="createaccount.html" style="text-decoration:none;">Signup</a></p> </li>
            </ul>
            
            
            
            
    

    </div>
</section>
<script>
    $(document).ready(function(){
      
        $("#login").click(function(e){
            e.preventDefault();
        var email=$("#email").val();
        var password=$("#password").val();
        var username=$("#username").val();
        if(email =="" && password=="" && username ==""){
            $("#msg").html("Input field is required").css("color","coral");
        }else{
            $.ajax({
                url:"login_bck.php",
                type:"post",
                data:{email:email,username:username,password:password},
                beforeSend:function(){
                $("#msg").html("Just a second");

                },
                success:function(data){
                    if(data =="success"){
                        $("#msg").html("Your login detail is incorrect");

                    }else{
                        location.replace("../index.php");


                    }
                }
            });
        }
    });
});

</script>
<body>
</html>
