<html>
<head>
<?php include("header.php");?>
<link rel="stylesheet" type="text/css" a href="record.css">
</head>
<body id="bdy">
<P ALIGN="center"><a href="index.php">HOME</A></p>
<?php
if(isset($_POST['user'])){$user=mysql_escape_string($_POST['user']);}
if(isset($_POST['dpass'])){$dpass=md5(mysql_escape_string($_POST['dpass']));}
if(isset($_POST['npass'])){$npass=md5(mysql_escape_string($_POST['npass']));}
if(isset($_POST['cpass'])){$cpass=md5(mysql_escape_string($_POST['cpass']));}

if($npass==$cpass && $dpass){ // check for passwords
include("conn.php");

$qry1=mysql_query("select * from user where username='$user' ");
$row=mysql_fetch_array($qry1);

$dbuser=$row['username'];
$dbpass=$row['password'];

	if($dpass==$dbpass){//check whether default password matches the password in db

			if($dbuser==$user){// check whether the user input matches the db user if true change the password
			$qry=mysql_query("update user set password='$cpass' where password='$dpass' and username='$user'");
			$result=mysql_fetch_array($qry);
			echo"<p align='center'><font color='green' size='5'type='bold'>$user, Your password has been successfully reset!!</font></p>";
			}
			else {
			echo"<p align='center'><font color='red' size='5'type='bold'>Invalid username!!!</font></p>";
			}
			/////////////////////////end check for default password//////////////////////////////////

	}else
	{echo"<p align='center'><font color='red' size='5'type='bold'>invalid default password!!!</font></p>";
	}
}else 
	if($npass!=$cpass){
echo"<p align='center'><font color='red' size='5'type='bold'>New password confirmation failed!!</font></p>";
}
	
 ?>

<p align="center"><form method="POST" action="">
<P align="center"><strong>PASSWORD RESET FORM</strong></p><br><hr>
USERNAME:<input type="text" name="user" maxlength="10" pattern=[a-z]+ required><br><hr>
DEFAULT PASSWORD:<input type="password" name="dpass" maxlength="8" pattern=[a-z,1-9]+ required><br><hr>
NEW PASSWORD:<input type="password" name="npass" maxlength="8" pattern=[a-z,1-9]+ required><br><hr>
CONFIRM PASSWORD:<input type="password" name="cpass" maxlength="8" pattern=[a-z,1-9]+ required><br><hr>
<input type="submit" name="submit" value="RESET">
</form></p>
</body>
</html>