<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>View All Comments</title>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.0/jquery.min.js"></script>
<script type="text/javascript">
$(function() 
{
$(".view_comments").click(function() 
{

var ID = $(this).attr("id");

$.ajax({
type: "POST",
url: "viewajax.php",
data: "msg_id="+ ID, 
cache: false,
success: function(html){
$("#view_comments"+ID).prepend(html);
$("#view"+ID).remove();
$("#two_comments"+ID).remove();
}
});

return false;
});
});
</script>

<style>
body{background:#fff;font-family:"lucida grande",tahoma,verdana,arial,sans-serif;font-size:11px;color:#333;margin:0;padding:0;text-align:left;direction:ltr;unicode-bidi:embed}
*
{
margin:0px;
padding:0px;

}
a
{	text-decoration:none; }
	

.egg{min-height:58px;padding-bottom:8px;position:relative}
.egg_Body{border-top:1px solid #eee;color:#808080;padding-top:8px}
.egg_Message{font-size:13px !important;font-weight:normal;overflow:hidden}

h3{font-size:13px;color:#333;margin:0;padding:0}
.comment_ui
{
background-color:#f2f2f2;border-bottom:1px solid #e5eaf1;clear:left;float:none;overflow:hidden;margin-bottom:2px;padding:6px 4px 3px 6px;width:431px; 
}
.dddd
{
background-color:#f2f2f2;border-bottom:1px solid #e5eaf1;clear:left;float:none;overflow:hidden;margin-bottom:2px;padding:6px 4px 3px 6px;width:431px; 
}
.comment_text{padding:2px 0 4px; color:#333333}
.comment_actual_text{display:inline;padding-left:.4em}

ol { 
	list-style:none;
	margin:0 auto;
	width:500px;
	margin-top: 20px;
}
.clean { display:none}
.editbox
{
overflow: hidden; height: 61px;border:solid 1px #0099CC; min-width:488px; max-width:488px; font-size:12px;font-family:Arial, Helvetica, sans-serif; padding:5px
}
#but{
background-color: #5B74A8;
border: 1px solid #29447e;
padding:2px 16px;
font-family:Arial, Helvetica, sans-serif;
color:#FFFFFF;
float:right;
cursor:pointer;
margin-top: 2px;
}
#buts{
background-color: #5B74A8;
border: 1px solid #29447e;
padding:2px 16px;
font-family:Arial, Helvetica, sans-serif;
color:#FFFFFF;
float:right;
cursor:pointer;
height: 32px;
}
.egg_Message img{
float:left;
padding-right: 7px;
}
#sssss{
float:right;
width: 392px;
}
</style>
</head>

<body>

<ol>
<li style="margin-bottom: 50px;">
<form action="savemessage.php" method="post">
<textarea class="editbox" cols="23" rows="3" name="message"></textarea>
<input id="but" name="" type="submit" value="POST" />
</form>
</li>
<?php
include("db.php");
$msql=mysql_query("select * from messages order by msg_id desc");
while($messagecount=mysql_fetch_array($msql))
{
$id=$messagecount['msg_id'];
$msgcontent=$messagecount['message'];
?>
<li class="egg">

<div class="egg_Body">
<h3 class="egg_Message" >
<img src="profile.jpg" /><span><?php echo $msgcontent; ?></span>

<div style="margin-top:10px; margin-left: 58px;">
<?php 

$sql=mysql_query("select * from comments where msg_id_fk='$id' order by com_id");
$comment_count=mysql_num_rows($sql);

if($comment_count>2)
{
$second_count=$comment_count-2;
?>
<div class="comment_ui" id="view<?php echo $id; ?>">
<div>
<a href="#" class="view_comments" id="<?php echo $id; ?>">View all <?php echo $comment_count; ?> comments</a>
</div>
</div>
<?php 
} 
else 
{
$second_count=0;
}
?>

<div id="view_comments<?php echo $id; ?>"></div>

<div id="two_comments<?php echo $id; ?>">
<?php
$listsql=mysql_query("select * from comments where msg_id_fk='$id' order by com_id limit $second_count,2 ");
while($rowsmall=mysql_fetch_array($listsql))
{ 
$c_id=$rowsmall['com_id'];
$comment=$rowsmall['comments'];
?>

<div class="comment_ui">

<div class="comment_text">
<div  class="comment_actual_text"><img src="profile.jpg" width="32" height="32" /><div id="sssss"><?php echo $comment; ?></div></div>
</div>

</div>

<?php } ?>
<div class="dddd">
<div>
<img src="profile.jpg" width="32" height="32" />
<form action="savecomment.php" method="post">
<input name="mesgid" type="hidden" value="<?php echo $id ?>" />
<input name="mcomment" type="text" placeholder="Write a comment..." style="height: 24px; border:1px solid #BDC7D8; padding:3px; border-width: 1px 0px 1px 1px; width:302px;" />
<input id="buts" name="" type="submit" value="ENTER" />
</form>
</div>
</div>
</div>


</div>
</div>
</li>
<?php
}
?>
</ol>

</body>
</html>
