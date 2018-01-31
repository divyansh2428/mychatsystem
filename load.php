<?php
$link=mysqli_connect("localhost","id4155199_chalobatekrain","7532802088","id4155199_chalobatekrain");
if(mysqli_connect_error())
    die ("Connection Error !");
$query="SELECT * FROM messages LIMIT 100";
$result=mysqli_query($link,$query);
while($row=mysqli_fetch_assoc($result))
{
    $name=$row['name'];
	$comment=$row['message'];
    $time=$row['datetime'];
?>
<div class="chats"><strong><?=$name?>:</strong> <?=$comment?> <p style="color:darkgrey"><?=date("j/m/Y g:i:sa", strtotime($time))?></p></div>
<?php
}
?>