
<?php
error_reporting(0);
$server="localhost";
$username="root";

$password="";

$db="makechat";

$conn=mysqlii_connect($server,$username,$password,$db);

if(!$conn){

  ?>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <center>
<div class="server-failure" style="  width:60%;
  margin-top:156px;
  background: white;
  border-radius: 4px;
  border:1px solid #f3f3f3;
  padding:33px 32px;">
  <span style="padding:12px;font-size:28px;">Sorry!</span>
  <p>Could not connect to the server.</p>
  <a href="javascript:void(0)" style="color:dodgerblue;text-decoration:none;" onclick="reloadPage()">Try again</a>
</div>
<script>
  function reloadPage(){
    location.reload();
  }
</script>
</center>
<?php
exit();

}


?>