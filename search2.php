<html>
<head>
<?php include("header.php");?>
<link rel="stylesheet" type="text/css" a href="record.css">
<?php 
session_start();
if(!$_SESSION['loggedin'])
{
header("location:index.php");
exit;
}
else{
echo"<p align='right'><h3><font color='#665743'>You are logged in as $username</h4></font></p>";
}
?>
</head>
<body bgcolor="#659270">
<P ALIGN="center"><a href="profile.php">HOME</A>&nbsp&nbsp|||&nbsp&nbsp<a href="logout.php">Logout</A></p>
<?php
if(isset($_POST['chooser']));
if(isset($_POST['criteria'])){$crit=$_POST['criteria'];}
/////////A.K.K////////

switch($crit){
	
	case"serialno";//search register by serial no
	echo"<form method='POST' action='search.php'>
	<strong>SERIAL NO:</strong>:<input type='text' name='srno' pattern='[0-9]+' maxlength=9 placeholder='SERIAL NUMBER ONLY' required maxlength='35'>
	<input type='submit' name='byserial' value='search'></form>";
	
	break;
	//END SERIAL NO SEARCH
	
	case"name";//search register by applicant's name
	echo"<form method='POST' action='search3.php'>
	
	APPLICANT:<input type='text' name='applicant' pattern='[A-Z ]+' placeholder='UPPER CASE ONLY' required maxlength='35'><br><br>
	<input type='submit' name='byname' value='Search' ><br><br></form>";
	break;
	//END SEARCH BY NAME
	
	}
?>

</body>
</html>