<?php
include("connection.php");
if($_POST['id'])
{
$id=$_POST['id'];
$title=$_POST['title'];
$id = mysql_escape_String($id);
echo "update images set title='$title' where id='$id'";
mysql_query("update images set title='$title' where id='$id'");
}
?>
