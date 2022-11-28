<?php
$con= mysqli_connect("h1use0ulyws4lqr1.cbetxkdyhwsb.us-east-1.rds.amazonaws.com","if3ryonp8v2yhks5","e3wg4fsqc8vljrh0","mdbdl32mu2ovolnh");
if(!$con){
   die("condb err");
}
else{
    //echo "condb succ";
}
mysqli_query($con, "SET NAMES 'utf8' "); 
?>