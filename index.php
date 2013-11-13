<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Flickr Like Title Edit</title>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/
libs/jquery/1.3.0/jquery.min.js"></script> 
 
 <script type="text/javascript"> 
$(function() 
{

$("h4").click(function() 
{
var titleid = $(this).attr("id");
var sid=titleid.split("title");
var id=sid[1];
var dataString = 'id='+ id ;
var parent = $(this).parent();
$(this).hide();
$("#formbox"+id).show();
return false;
});
	
$(".save").click(function() 
{
var A=$(this).parent().parent();
var X=A.attr('id');
var d=X.split("formbox");
var id=d[1];
var Z=$("#"+X+" input.content").val();
var dataString = 'id='+ id +'&title='+Z ;

$.ajax({
type: "POST",
url: "imageajax.php",
data: dataString,
cache: false,
success: function(data)
{
A.hide(); 
$("#title"+id).html(Z); 
$("#title"+id).show(); 
}
});






return false;
});
	
$(".cancel").click(function() 
{
var A=$(this).parent().parent();
var X= A.attr("id");
var d=X.split("formbox");
var id=d[1];
var parent = $(this).parent();
$("#title"+id).show();
A.hide();

return false;
});
	
});
 
 
</script> 
<style>
#container
{
margin:0 auto;
width:900px;
font-family:Arial, Helvetica, sans-serif;

}
td
{
width:300px;
}
h4
{
margin:0px;
padding:0px;
}
h4:hover
{
background-color:#ffffcc;
}
.save
{
background-color:#cc0000;
color:#fff;
padding:4px;
font-size:11px;
border:solid 1px #cc0000;
text-weight:bold;
-moz-border-radius:5px;-webkit-border-radius:5px;

}

.cancel
{
background-color:#dedede;
color:#333;
padding:4px;
font-size:11px;
border:solid 1px #dedede;
-moz-border-radius:5px;-webkit-border-radius:5px;
}

</style>
</head>

<body>

<div id="container">
<h1>Flickr Like Title Edit with Jquery and Ajax.</h1>
<table width="100%" style='margin-top:20px'>
<tr>
<?php
include('db.php');
$sql=mysql_query("select id,title,imageurl from images");

while($row=mysql_fetch_array($sql))
{
$id=$row['id'];
$title=$row['title'];
$imageurl=$row['imageurl'];
?>
<td>
<div id="formbox<?php echo $id; ?>" style="display:none">
<form method="post"  name="form<?php echo $id; ?>">
<input type="text" value="<?php echo $title; ?>" name='content' class='content'/><br />
<input type='submit' value=" SAVE "  class="save" />  or  <input type="button" value=" Cancel "  class="cancel"/>
</form>
</div>
<h4 id="title<?php echo $id; ?>"  title="Click to edit"><?php echo $title; ?></h4>
<img src="<?php echo $imageurl; ?>" />
</td>
<?php } ?>


</tr>
</table>

</div>
</body>
</html>
