<?php
$link=mysqli_connect("localhost","id4155199_chalobatekrain","7532802088","id4155199_chalobatekrain");
if(mysqli_connect_error())
    die ("Connection Error !");
$query="SELECT * FROM users WHERE id='".$_GET['userid']."'";
$result=mysqli_query($link,$query);
$row=mysqli_fetch_array($result);
$name=$row['username'];
$query="INSERT INTO messages (name,message,datetime) VALUES('".$name."','".$_GET['message']."',CURRENT_TIMESTAMP)";
$result=mysqli_query($link,$query);
?>