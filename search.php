<html>
<head>
<title>SEARCH RECORD</title>
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
/////////A.K.K////////

if(isset($_POST['srno'])){(int)$srno=mysql_escape_string($_POST['srno']);}

//include("conn.php");// connect to DB

include("conn.php");
$qry=mysql_query("select  * from register where srno='$srno'");
$result=mysql_fetch_assoc($qry);
$dbsrno=$result['srno'];
$photo=$result['imageSize'];
if($dbsrno==$srno){ //check whether form input matches DB content


/*
echo"<table border=1 bgcolor='white' align='center'>";
echo"<tr colspan='1'><td align=''><img src='uploads/$photo' height='200' width='200'><td colspan='2' bgcolor='#FFDCDE'>".$result['applicant']."</td></tr>";
echo"<tr bgcolor='blue' height='10'><td><font color='red' size=''>SERIAL_NUMBER&nbsp&nbsp&nbsp<TD><font color='red'>ID_CARD NO&nbsp&nbsp&nbsp<TD><font color='red'>TYPE&nbsp&nbsp&nbsp</td</tr>";
echo"<tr bgcolor='#FFDCDE'height='50'><td align='center'>".$result['srno']."<td align='center'>".$result['id_no']."<td>".$result['typ']."</td></tr>";
//echo"<tr bgcolor='black'><TD><font color='red'>APPLICANT&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</TD></tr>";
//echo"<tr bgcolor='white'height='' colspan='3'><td align=''>".$result['applicant']."</td></tr>";
echo"<tr bgcolor='blue'><TD><font color='red'>DATE_OF_BIRTH&nbsp&nbsp&nbsp<TD><font color='red'>PLACE OF BIRTH&nbsp&nbsp&nbsp<TD><font color='red'>DATE RECORDED&nbsp&nbsp&nbsp</TD></tr>";
echo"<tr bgcolor='#FFDCDE' height='50'><td align='center'>".$result['dob']."<td align='center'>".$result['pob']."<td align='center'>".$result['drecorded']."</td></tr>";
echo"<tr bgcolor='blue'><TD colspan='1' align='center'><font color='red'>DATE RECEIVED<td colspan='2'><font color='red'>REMARKS</td></tr>";
echo"<tr bgcolor='#FFDCDE' height='50'><td colspan='1' align='center' font size='16'>".$result['dreceived']."<td colspan='2' align='center' font size='16'>".$result['remarks']."</td></tr>";
echo"</table>";
}
else{
echo"<font color='#892312' type='bold' size='10'>The Applicant with serial $srno is not found in the Register</font>";
}
*/
mysql_close($conn);
?>
</body>
</html>