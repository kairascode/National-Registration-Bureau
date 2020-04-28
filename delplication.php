<!DOCTYPE HTML>
<html>
<head>
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
<body bgcolor=#859250>
<P ALIGN="center"><a href="pagination.php">Home</A>&nbsp&nbsp|||&nbsp&nbsp<input type='button' value='Print Delays' onClick='printDiv(delay);'/>&nbsp&nbsp|||&nbsp&nbsp<a href="logout.php">Logout</A></p>
<div id='delay' bgcolor="white">
<?php

$today=date('y:m:d');
$newd= date('F d,Y',strtotime($today));
include("conn.php");

$qry=mysql_query("select * from register where dreceived='000-00-00' and remarks=''");

echo"<table border=1 bgcolor=#FFCDCD align='center' cellsapcing=1 cellpadding=6>";
echo"<tr bgcolor='gray'><th colspan=7><font color='black' size=5> $sum DELAYED APPLICATIONS AS AT $new</font></th></tr>";
echo"<tr bgcolor='black'><TH><font color='red' size=5>No<th><font color='red' size=5>Serial#<th><font color='red' size=5>Applicant<th><font color='red' size=5>Type<th><font color='red' size=5>Date recorded<th><font color='red' size=5>Days gone by since Application<th><font color='red' size=5>Remarks</th></font></tr>";

while($row=mysql_fetch_assoc($qry)){

$day=$row['drecorded'];	
$app=$row['applicant'];
$srno=$row['srno'];
$remark=$row['remarks'];
$typ=$row['typ'];
$diff=abs(strtotime($day)-strtotime($newd));
$tym=date(strtotime($diff));
$result=floor($diff/(60*60*24));



if($result>=100){	
	
	$total[]=array($srno);
	$no=count($total);
	
	
	echo"<tr><TD>$no<td><font type=bold>$srno</font><td>$app<td>$typ<td align='centre'>$day<td>$result<td>$remark</td><tr>";
	
	
}
}
mysql_close($conn);
?>
</div>
<script type="text/javascript">
function printDiv(delay){
var printContents=document.getElementById("delay").innerHTML;
var originalContent=document.body.innerHTML=printContents;
window.print();
document.body.innerHTML=originalContents;
}
</script>
</body>
</html>