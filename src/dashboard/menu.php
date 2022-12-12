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
                   
                                    <div style="margin-top:10px;">


                                    <div class="topnav" id="topNavDash" style="">
                                        <ul>
                                            
                                                <li> <a href="?ur_q=src/dashboard/video_lecture/">Video lecture</a>  <font style="color:gary;font-size:11px;margin-left:12px;">Add or upadtes video lectures</font> </li>
                                                <li> <a href="?ur_q=src/dashboard/stm/">Study material</a> <font style="color:gary;font-size:11px;margin-left:12px;">Upload or update  study material</font> </li>
                                                <li> <a href="#test">Test paper</a> <font style="color:gary;font-size:12px;margin-left:11px;">Set test paper</font> </li>
                                                <li> <a href="#doubts">Doubts</a><font style="color:gary;font-size:12px;margin-left:11px;">Take doubts from students</font> </li>
                                                <li> <a href="#">Home work</a> <font style="color:gary;font-size:12px;margin-left:11px;">Give home work to students</font> </li>
                                                <li> <a href="#notice">Notice board</a> <font style="color:gary;font-size:12px;margin-left:11px;">Provide any notification to the students</font> </li>
                                                <li> <a href="#student_views">Student views</a> <font style="color:gary;font-size:12px;margin-left:11px;">View feedback sent by students</font> </li>
                                        

                                            


                                        
                                        </table>
                                    </div>
                                    <div class="container" id="mains-content" style="margin-top:3px;">
                                    <!--  -->
                                    </div>
                                    </div>
                                    <style>
                                    #topNavDash{
                                    
                                    }
                                    #topNavDash ul{
                                        list-style-type:none;
                                    }
                                    #topNavDash ul li{
                                        padding:4px 8px;
                                        border-bottom:1px solid #ddd;
                                        margin-left:-50px;

                                    }
                                    #topNavDash ul li a{
                                        text-decoration:none;
                                        /* text-align:center; */
                                        padding:12px 14px;
                                        /* color:
                                        */
                                        display:block;

                                    }
                                    @media screen and (min-width: 700px) {
                                        #topNavDash ul{
                                                width:60%;
                                                margin-right:00%;
                                            margin-top:30px;
                                                margin-lefT:40%;
                                                border:1px solid #ddd;
                                        }
                                    #topNavDash ul li{
                                        padding:4px 8px;
                                        border-bottom:1px solid #ddd;
                                        margin-left:-40px;
                                        

                                    }

                                    #topNavDash ul li a{
                                        text-decoration:none;
                                        /* text-align:center; */
                                        padding:12px 14px;
                                        /* color:
                                        */
                                        display:block;

                                    }   
                                    }
                                    </style>
                   <?php

                }else{
                    
                    continue;
                }
            }
        }
    
    }

    

 ?>




