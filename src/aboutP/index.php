<?php 
        $type = $_GET['type'];
        if($type == 'ab'){
            ?>

<div class="conatiner">
    <div class="card" style="padding:12px 18px ; background:white;">
                <h1>About Instant</h1>
       
                <!-- <p><strong>Instant</strong> formly known as <strong>Inset</strong> is platfrom provides users to access their academy activity in digital form .</p> -->
    
 <p> Welcome to Instant, your personal acadmic assistant. We're dedicated to giving you the very best of academy products, with a focus on your best performance .

It is startup based company founded  by <a href='#'>Arvind Yadhuvanshi</a>. <br> 


we hope you enjoy our  products as much as we] enjoy offering them to you. If you have any questions or comments, please don't hesitate to contact us.

<br>
Sincerely,
<br>
<span style="color:green">Arvind </span>
</p>

            </div>
</div>
            <?php
        }else if($type=='contact'){
            ?>
             <div class="conatcts" style="width:60%;margin-right:20%;margin-left:20%;" >
                  <div class="cards" style="padding:13px 18px;border-radius:12px;border:1px solid #ddd;">
                          
                  <span>Conatct us on</span><br>
                  <ul>
                      <li> <a href="tel:1234567890"><i class='fa fa-phone fa-fw'>  </i>1234567890 </a></li>
                 <li> <a href="tel:6573655128"><i class='fa fa-phone fa-fw'>  </i>6573655128  </a></li>
                  <li><a href="tel:1354374272"><i class='fa fa-phone fa-fw'>  </i>1354374272  </a></li>
                </ul>
                    <span>Our email address is <a >jupiter@gmail.com</a> </span>   
                       
                        <style>
                            ul{
                                list-style-type:none;
                            }
                            .conatcts ul li{
                                margin-left:-40px;
                            }
                        </style>


                </div>
            </div>

            <?php
                   }
?>
