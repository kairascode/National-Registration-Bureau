<html>
<head>
<title>RECORDS</title>
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
echo"<p align='right'><h3><font color='#665743'>You are logged in as $username</H3> </font></p>";
}?>
</head>
<body bgcolor="#859250">
<P ALIGN="center"><a href="profile.php">Home</A>&nbsp&nbsp|||&nbsp&nbsp<a href="delplication.php">Delayed Applications</A>&nbsp&nbsp|||&nbsp&nbsp <a href="printer.php">Print Register</a>&nbsp&nbsp|||&nbsp&nbsp<a href="logout.php">Logout</A></p>
<?php
include("conn.php");
$perPage=100;
$qry=mysql_query("select * FROM register");
$pagesQuery=mysql_num_rows($qry);
$pages=ceil($pagesQuery/$perPage);

if(!isset($_GET['page'])){
/////////A.K.K////////
header("location:pagination.php?page=1");
}
else{
$page=$_GET['page'];
}

$start=(($page-1)*$perPage);

$prev=$page-1;
$next=$page+1;
if($num>1){
echo"<a href='?page=$prev'>prev</a>";
}
else if($num<1){
	echo"$num";
}
for($num=1;$num<=$pages;$num+=1)
{
	
echo"<a href='?page=$num'>&nbsp$num&nbsp</a>";

}
if($next<=$pages)
	
echo"<a href='?page=$next'>next</a>";
//echo $prev;

//echo $next;

echo"<br>current page <font color='blue' size='8'>$page</font> of<font color='blue' size='8'> $pages </font>";
echo"Total records <font color='blue' size='8'>$pagesQuery</font>";
$qry=mysql_query("select* from register LIMIT $start,$perPage ");
echo"<table border=0>";
echo"<tr bgcolor='black' height='50'><th><font color='red'type='bold'>SERIAL NO<th>
<font color='red'type='bold'>ID CARD NO<th><font color='red'type='bold'>APPLICANT<th><font color='red'type='bold'>TYPE<th><font color='red'type='bold'>SEX<th><font color='red'type='bold'>DATE OF BIRTH<th><font color='red'type='bold'>PLACE OF BIRTH<th><font color='red'type='bold'>
MOBILE#<th><font color='red'type='bold'>DATE RECORDED<Th><font color='red'type='bold'>DATE RECEIVED<Th><font color='red'type='bold'>REMARKS</Th></TR>";

while($row=mysql_fetch_assoc($qry))
{
$srno=$row['srno'];
$idno=$row['id_no'];
$appname=$row['applicant'];
$typ=$row['typ'];
$sex=$row['sex'];
$dob=$row['dob'];
$pob=$row['pob'];
$phone=$row['phone'];
$drecorded=$row['drecorded'];
$dreceived=$row['dreceived'];
$recodedBy=$row['recodedBy'];
$remarks=$row['remarks'];

echo"<tr bgcolor='#FFCDCD' height='50'><td>$srno<td>$idno<td>$appname<td>$typ<td>$sex<td>$dob<td>$pob<td>$phone<td>$drecorded<td>$dreceived<td>$remarks</td></tr>";

//echo"</table>";
}
echo"</table>";
if(!isset($_GET['page'])){

header("location:pagination.php?page=1");
}
else{
$page=$_GET['page'];
}

$start=(($page-1)*$perPage);

$prev=$page-1;
$next=$page+1;
if($num>1){
//echo"<a href='?page=$prev'>prev</a>";
}
else if($num<1){
	echo"$num";
}
for($num=1;$num<=$pages;$num+=1)
{
	
echo"<a href='?page=$num'>&nbsp$num&nbsp</a>";

}
if($next<=$pages)
	
echo"<a href='?page=$next'>next</a>";
//$num=1;

mysql_close($conn);
?>
</body>
</html>