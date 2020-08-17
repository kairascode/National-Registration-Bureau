<html>
<head>
<title>REGISTER</title>
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
<P ALIGN="center"><a href="pagination.php">HOME</A>&nbsp&nbsp|||&nbsp&nbsp<input type='button' value='Print Register' onClick='printDiv(rec);'/>|||&nbsp&nbsp <a href="logout.php">Logout</A></p>
<div id='rec'>
<?php
include("conn.php");
$qry=mysql_query("select * FROM register");
echo"<table border=1>";
echo"<tr bgcolor='gray'><th colspan='11'>REGISTER</th></tr>";
echo"<tr bgcolor='gray' height='50'><th><font color='black'type='bold'>SERIAL NO<th>
<font color='black'type='bold'>ID CARD NO<th><font color='black'type='bold'>APPLICANT<th><font color='black'type='bold'>TYPE<th><font color='black'type='bold'>SEX<th><font color='black'type='bold'>DATE OF BIRTH<th><font color='black'type='bold'>PLACE OF BIRTH<th><font color='black'type='bold'>
MOBILE#<th><font color='black'type='bold'>DATE RECORDED<Th><font color='black'type='bold'>DATE RECEIVED<Th><font color='black'type='bold'>REMARKS</Th></TR>";

while($row=mysql_fetch_array($qry))
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

echo"<tr bgcolor='white' height='50'><td>$srno<td>$idno<td>$appname<td>$typ<td>$sex<td>$dob<td>$pob<td>$phone<td>$drecorded<td>$dreceived<td>$remarks</td></tr>";
}
?>
</div>
<script type="text/javascript">
function printDiv(rec){
var printContents=document.getElementById("rec").innerHTML;
var originalContent=document.body.innerHTML=printContents;
window.print();
document.body.innerHTML=originalContents;
}
</script>
</body>
</html>