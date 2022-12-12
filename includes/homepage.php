<div id="viewport">
  <!-- Sidebar -->
  <div id="sidebar">
    <header>
      <a href="index.php">  <img src="src/instant_logo_6548.png" style="width:45px;border-radius:40px;margin-left:4px;"> <font style="color:dodgerblue;font-size:28px;">Ins</font> <font style="color:#04ba75;font-size:28px;">tant</font>  </a>
        <button id="closeMenu">&times</button>
    </header>
    <ul class="nav">
     





      <?php
     include('includes/connect.php');
    $usn = $_COOKIE['username'];

    $sqlC = "SELECT * FROM user_account WHERE  role='admin'";
    $queryC = mysqli_query($conn,$sqlC);
    
    if($queryC){
    $num = mysqli_num_rows($queryC);
        if($num !=0){
            while($data = mysqli_fetch_assoc($queryC)){
                if($usn == $data['username']){
                   ?>
             <li>
        <a href="?ur_q=src/dashboard/" style="font-size:16px;">
          <i class="fa fa-dashboard" style="color:dodgerblue"></i> Dashbaord
        </a>
      </li> 
                   <?php

                }else{
                    continue;
                }
            }
        }
    
    }

    

 ?>











      <li>
        <a href="#" style="font-size:16px;">
          <i class="fa fa-book" style="color:coral"></i> Book store
        </a>
      </li>
      <li>
        <a href="#" style="font-size:16px;">
          <i class="fa fa-pencil" style="color:purple"></i> Notes
        </a>
      </li>
      
      <li>
        <a href="#" style="font-size:17px;">
          <i class="fa fa-calendar" style="color:#0ec26e"></i> Events
        </a>
      </li>
      <li>
        <a href="index.php?ur_q=src/bookmark/&usn=<?php echo $_COOKIE['username'] ?>" style="font-size:17px;">
          <i class="fa fa-bookmark" style="color:#0682b8"></i>  Bookmark
        </a>
      </li>
      <li>
        <a href="#" style="font-size:16px;">
          <i class="fa fa-cog" style="color:#f24a1b"></i> Setting
        </a>
      </li>
      <li>
        <a href="?ur_q=src/aboutP/&type=contact" style="font-size:16px;">
          <i class="fa fa-phone" style="color:#087278"></i> Contact
        </a>
      </li>
    </ul>
  </div>
  <!-- Content -->
  <div id="content" class="contentPc">
    <nav>
      <div class="">
        <!-- <ul class="nav navbar-nav navbar-right">
          <li>
            
            </a>
          </li>
          <li></li>
        </ul> -->
        <table width="100%" border="0">
          <tr>
            <td id="openMenuSideBar" style="text-align:left;"> <a href="#" id="openSideBar"> <i class="fa fa-bars"> </i> </a> </td>
           
              <?php 
                  $swidth = '<script>
                  document.write(screen.width);
                  </script>';
                  // echo $swidth;
                  if($swidth <= 840){
                    // echo "yes";
                    ?>

                      <td id="searchConatiner"> 
                        <?php include('searchui.php') ?>
                      </td> 
                      <?php
                  }else{
                    // echo 'hello';
                  }
              ?>

          <td id="openMsgConatiner"> <a href="#"><i class="fa fa-comment"></i></a>  </td>
            <td id="openNotiConatiner"> <a href="#"><i class="fa fa-bell"></i> </td>
            <td id="openSearchConatiner" style="width:100%" style="display:none"> <a id="openOverLaySearch"> <i class="fa fa-search"></i> </a> </td>

          
            <td id="openUsersConatiner" >  <a href="?ur_q=account/&usn=<?php echo $_COOKIE['username'] ?>"><?php echo substr($_COOKIE['fullname'],0,2); ?></a></td>
          
          </tr>
        </table>
      </div>
    </nav>
    <div id='overSearh'>
                    <?php
                            include('searchui.php');
                    ?>
    </div>
    <div class="container-fluid" id="content-conatiner"> <br><br>
    <div id="contF">
     <?php
     if(isset($_GET['ur_q'])){
         $page  = $_GET['ur_q'].'index.php';
        include($page) ;

     }else{
        include('src/index.php') ;

     }
     ?>
     </div>
  <?php include('footer.php') ;?>

    </div>
  </div>
  
</div>




<style>


@import url('https://fonts.googleapis.com/css?family=Roboto:300,400,400i,500');

body {
  overflow-x: hidden;
  font-family: 'Roboto', sans-serif;
  font-size: 16px;
  
  -webkit-user-select: none; /* Safari */
  -ms-user-select: none; /* IE 10 and IE 11 */
  user-select: none; /* Standard syntax */

}

/* Toggle Styles */

#viewport {
  padding-left: 250px;
  -webkit-transition: all 0.5s ease;
  -moz-transition: all 0.5s ease;
  -o-transition: all 0.5s ease;
  transition: all 0.5s ease;
}
#closeMenu{
  display:none;
}
#content {
  width: 100%;
  position: relative;
  margin-right: 0;
}
#content-conatiner{
  padding:0px;
  margin:0px;
}
#content .navbar{
    border:none;
    border-bottom:1px solid #ddd;
    /* padding:2px 6px; */
}
/* Sidebar Styles */

#sidebar {
  z-index: 1000;
  position: fixed;
  left: 250px;
  width: 250px;
  display:block;
  height: 100%;
  margin-left: -250px;
  /* box-shadow:0px 0px 9px 0px rgba(0,0,0,0.1); */
  border-right:1px solid #ddd;
  overflow-y: auto;
  background:white;
  -webkit-transition: all 0.1s ease;
  -moz-transition: all 0.1s ease;
  -o-transition: all 0.1s ease;
  transition: all 0.1s ease;
}

#sidebar header {
  background-color:#272928;
  font-size: 20px;
  line-height: 52px;
  /* text-align: center; */
}
#closeMenu{
    background:none;
    color:gray;
    border:none;
    outline:none;
    padding:4px 7px;
    margin-right:6px;
    float:right;
}
#sidebar header a {
  color: #fff;
  display: inline-block;
  text-align:left;
  text-decoration: none;
}
#searchConatiner{
  width:70%;
  text-align:right;
}
#openSearchConatiner,#openMenuSideBar{
  display:none;
}
#content nav td #searchInput{
  padding:4px 5px;
  /* height:35px; */
  border:1px solid #ddd;
  outline:none;
  border-radius:2px;
  width:80%;
  

}
#openSearchConatiner,#openMsgConatiner,#openNotiConatiner,#openUsersConatiner{
  width:8%;
  text-align:center;
}
#sidebar header a:hover {
  /* color: #333;
  background:#ddd; */

}

#sidebar .nav{
  
}

#sidebar .nav a{
  background: none;
  /* border-bottom: 1px solid #455A64; */
  color: gray;
  font-size: 14px;
  padding: 16px 24px;
}

#sidebar .nav a:hover{
    color: #333;
  background:#ddd;
}

#sidebar .nav a i{
  margin-right: 16px;
}
#content nav{
  background:white;
  position:fixed;
  top:0px;
  width:82%;
  /* left:0px; */
  right:0px;
  padding:4px 6px;
  /* box-shadow:0px 0px 9px 0px rgba(0,0,0,0.2);
   */
   border:1px solid #ddd;
}
#content nav table td a{
  color:gray;
  text-decoartion:none;
}
#content nav table td{
  padding:8px 10px;
}
#content nav table td a {
  border:1px solid #ddd;
  background:#f9f9f9;
  padding:6px 8px;
  border-radius:50px;
}
#submitSearchInput{
  /* bordeR:none; */
  width:10%;
  outline:none;
  background:white;
  border-radius:2px;
  border-left:none;
  padding:4px 5px;
  /* height:30px; */
  border:1px solid #ddd;


}
@media screen and (max-width: 700px) {
  
#closeMenu{
  display:block;
}
    #sidebar{
     width:0px;
    }
   #content{
     background:white;
     width:100%;
     position:fixed;
     padding:4px 7px;
     left:0px;
     overflow-y:auto;
     height:100vh;
     right:0px;
   }
   #content nav{
     /* margin-top:-17px; */
     width:100%;
     border-bottom:1px solid #ddd;
   }
   #searchConatiner{
     display:none;
   }
   #openSearchConatiner,#openMenuSideBar{
     display:inline-block;
   }
  
#openSearchConatiner,#openMsgConatiner,#openNotiConatiner,#openUsersConatiner{
  width:20%;
  /* text-align:; */
  padding:7px 8px;
  font-size:18px;
}
}
</style>

<script>

  $(document).ready(function(){
    $("#openSideBar").click(function(){
      $("#sidebar").css("width","270px");
    });
    $("#closeMenu").click(function(){
      $("#sidebar").css("width","0px");
    });

    $("#submitSearchInput").click(function(e){
      e.preventDefault();
      $("#contF").css({
        "margin-top":"20px",
        "margin-right":"10px",
        "margint-top":"20px",
      })
      $("#uploadedVideodct").css({
        "width":"100%",
        "background":"white",
      })
      var searchInput = $("#searchInput").val();
      if(searchInput !=""){
        $.ajax({
          url:"src/foruser/getsmt.php",
          type:"post",
          data:{q:searchInput},
          beforeSend:function(){
                 $("#contF").html("<i class='fa fa-spinner' style='font-size:26px;color:dodgerblue;'></i>"); 
          },
          success:function(output){
            $("#contF").html(output); 

          }
        })
      }
    });
    $("#openOverLaySearch").click(function(){
      $("#OverLaySearch").show();
          
            // $("#LoadSMTLC").hide();
    });    
  });
</script>