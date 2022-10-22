<?php
$con= mysqli_connect("localhost","root","","superq");
if(!$con){
   die("condb err");
}
else{
    //echo "condb succ";
}
mysqli_query($con, "SET NAMES 'utf8' "); 
?>