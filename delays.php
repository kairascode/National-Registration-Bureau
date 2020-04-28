<?php
//if(isset($_POST['submit']));
if(isset($_POST['from'])){$from=$_POST['from'];}
if(isset($_POST['to'])){$to=$_POST['to'];}
include("conn.php");

$qry=mysql_query("select*from register where dreceived='0000-00-00' and drecoded between '$from' and '$to'");
$row=mysql_fetch_array($qry);
$dreceived=$row['dreceived'];
$drecorded=$row['drecoded'];
$serial=$row['srno'];
$app=$row['applicant'];
$type=$row['typ'];

$delay=abs($dreceived-$drecorded);

$result=floor($delay/(60*60*24));

if($result>90){
	
	echo"<table>
	<tr><th>SERIAL NO<th>APPLICANT<th>TYPE</th></tr>
	<tr><td>$serial<td>$app<td>$type</td></tr>
	</table>";
}

else{
	
	echo"<form method='POST' action='delays.php'>
FROM:<input type='date' name='from' required><br><br>
TO:<input type='date' name='to' required><br><br>
<input type='submit' name='submit' value='Compute Delays'>
</form>";
	
}



mysql_close($conn);
?>
