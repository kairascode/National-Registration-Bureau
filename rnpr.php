
<html>
<head>
<link rel="stylesheet" type="text/css" a href="record.css">
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
echo"<p align='right'><h3><font color='#665743'>You are logged in as $username </h3></font></p>";
}?>
</head>
<body bgcolor="#859250">
<P ALIGN="center"><a href="profile.php">HOME</A>&nbsp&nbsp|||&nbsp&nbsp<a href="logout.php">Logout</A></p>
<?php

if(isset($_POST['srno'])){$srno=mysql_escape_string($_POST['srno']);}
if(isset($_POST['id_no'])){$kp=mysql_escape_string($_POST['id_no']);}
if(isset($_POST['dreceived'])){$dreceived=mysql_escape_string($_POST['dreceived']);}

include("conn.php");
$qry1=mysql_query("select * from register where srno='$srno'");
/////////A.K.K////////
$result=mysql_fetch_array($qry1);
$dr=$result['dreceived'];
$dbsrno=$result['srno'];
if($dr=="0000-00-00"){
$qry=mysql_query("update register set id_no='$kp',dreceived='$dreceived',remarks='' where srno='$srno'"); 
$rows=mysql_num_rows($qry);

if($dbsrno==$srno){
	
echo"<font color='blue' size='14'>The ID Card No $kp with Serial No $srno has been successfully received</font>";		
}
else{
echo"<font color='blue' size='14'>The Serial No $srno is not found in the system</font>";
}
}else{
	echo"<font color='blue' size='14'>The ID Card is already received.</font>";
}
?>

</body>
</html>