<!DOCTYPE HTML>
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
echo"<p align='right'><h3><font color='#665743'>You are logged in as $username  </h3></font></p>";
}?>
</head>
<body bgcolor="#859250">
<P ALIGN="center"><a href="profile.php">HOME</A>&nbsp&nbsp|||&nbsp&nbsp<a href="logout.php">Logout</A></p>
<?php
	if(isset($_POST['search']));
	if(isset($_POST['applicant'])){mysql_escape_string($applicant=$_POST['applicant']);}
	
	include("conn.php");
	
	$qry=mysql_query("select * from register where applicant like '%$applicant%'");
	$result=mysql_num_rows($qry);
	if(!$result==0){
	echo"<table border=1 align='center'bgcolor=#FFCDCD>
		<tr><th>Photo<th>Serial#<th>ID#<th>Applicant<th>DOB<th>POB<th>Type</th></tr>";
		
	while($row=mysql_fetch_assoc($qry)){
		$app=$row['applicant'];
		$idno=$row['id_no'];
		$dob=$row['dob'];
		$typ=$row['typ'];
		$pob=$row['pob'];
		$srno=$row['srno'];
		$photo=$row['imageSize'];
		echo"<tr><td><img src='uploads/$photo' height='50' width='50'><td>$srno<td>$idno<td>$app<td>$dob<td>$pob<td>$typ</td></tr>";
	
	}
	}
	if($result==0){
		echo"<font color='blue' size='14'>$applicant is not found in the register. You may refine your search and try again</font>";
	}


	?>
	</body>
	</html>