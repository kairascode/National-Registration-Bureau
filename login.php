<?php
session_start();
$username=mysql_escape_string($_POST['username']);
$pass=(mysql_escape_string($_POST['pass']));
if($username&&$pass){
include("conn.php");
$qry=mysql_query("SELECT* FROM user where username='$username' and password='$pass'");
$rows=mysql_num_rows($qry);
if($rows!==0){
	while($row=mysql_fetch_assoc($qry))
	{
	$dbuser=$row['username'];
	$dbpass=$row['password'];
	}
	if($username==$dbuser&&$pass==$dbpass){
	header('location:profile.php');
	$_SESSION['loggedin']=true;
	$_SESSION['username']=$username;
	
	}
}
else
{
	/////////A.K.K////////
	echo"<html><head><title>ERROR</TITLE></head>
	<body bgcolor='#131089'><font color='red' size='14'type='bold'>
	INVALID LOGIN CREDENTIALS... ACCESS DENIED!!</font><br>
	<a href='index.php'><font color='white'>Click here to login again</font></a></body></html>";
	}
	
}

?>
