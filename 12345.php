
<HTML>
<head>
<title>COMMENTS</title>
<?php 
session_start();
include("header.php");
if(!isset($_SESSION['loggedin']))
{
	//$_SESSION['username']=$username;
header("location:index.php");
exit;
}
else{
	$username=$_SESSION['username'];
echo"<p align='right'><h3><font color='#665743'>You are logged in as $username  </h3></font></p>";
}?>
</head>
<body bgcolor="#859250">
<P ALIGN="center"><a href="profile.php">HOME</A>&nbsp&nbsp|||&nbsp&nbsp <a href="logout.php">Logout</A></p>
<?php
if(isset($_POST['serial'])){(int)$srno=mysql_escape_string($_POST['serial']);}
if(isset($_POST['comment'])){$comment=mysql_escape_string($_POST['comment']);}

include("conn.php");
$q=mysql_query("select*from register where srno='$srno'");
$result=mysql_fetch_array($q);
$srl=$result['srno'];
if($srno==$srl){
$qry=mysql_query("update register set remarks='$comment' where srno='$srno' ");
$row=mysql_fetch_array($qry);

/////////A.K.K////////
switch($row){
	case $row==0;
	echo"$srno not found in the register";
	break;
	case $row==1;
	echo"<font color='#892312' type='bold' size='10'>Remark for $srno noted</FONT>";
	break;
}
}else{
	echo"<font color='#892312' type='bold' size='10'>Please quote valid Serial number to comment</FONT>";
}
mysql_close($conn);

?>
</body>
</html>