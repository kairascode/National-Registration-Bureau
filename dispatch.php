<html>
<head>
<?php
include("header.php");
if(!isset($_SESSION['loggedin']))
{
header("location:index.php");
exit;
}
else{
	$username=$_SESSION['username'];
echo"<p align='right'><h3><font color='#665743'>You are logged in as $username  </h3></font></p>";
}
?>
</head>
<body bgcolor="#859250">
<P ALIGN="center"><a href="pagination.php">Home</A>&nbsp&nbsp|||<a href="logout.php">Logout</A></p>
<?php
$today=date('y:m:d');
$newd= date('F d,Y',strtotime($today));


include("conn.php");

$qry=mysql_query("select* from register");

echo"<table border=1 bgcolor=#FFCDCD align='' cellsapcing=1 cellpadding=6>
<tr><th>No<th>SERIAL #<th>ID#<th>TYPE</th></tr>";

while($row=mysql_fetch_array($qry)){
	
	$total[]=array($srno);
	$no=count($total);

$drec=$row["drecorded"];
$srno=$row['srno'];
$typ=$row['typ'];
$idno=$row['id_no'];
$dispdate=abs(strtotime($drec) - strtotime($newd));
$result=floor($diff/(60*60*24));

if($result==3){
	echo"<tr><TD>$no<td><font type=bold>$srno</font><td>$idno<td>$typ</td><tr>";
	//echo"</table>";
}
}
?>
</body>