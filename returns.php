<html>
<head>
<title>MONTHLY RETURNS</title>

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
<P ALIGN="center"><a href="profile.php">HOME</A>&nbsp&nbsp|||&nbsp&nbsp <a href="logout.php">Logout</A></p>
<?php
if(isset($_POST['submit']))
	if(isset($_POST['drec1'])){$drec1=mysql_escape_string($_POST['drec1']);}
if(isset($_POST['drec2'])){$drec2=mysql_escape_string($_POST['drec2']);}

include("conn.php");

$qry=mysql_query("select* from register where typ='NPR' and sex='MALE' and drecorded between '$drec1' and '$drec2'");
$rs=mysql_num_rows($qry);

$qry1=mysql_query("select* from register where typ='NPR' and sex='FEMALE' and drecorded between '$drec1' and '$drec2'");
$rs1=mysql_num_rows($qry1);

$qry2M=mysql_query("select* from register where typ='DUP(MUTILATION)' and sex='MALE' and drecorded between '$drec1' and '$drec2'");
$rs2M=mysql_num_rows($qry2M);

$qry2L=mysql_query("select* from register where typ='DUP(LOSS)' and sex='MALE' and drecorded between '$drec1' and '$drec2'");
$rs2L=mysql_num_rows($qry2L);


$qry3M=mysql_query("select* from register where typ='DUP(MUTILATION)' and sex='FEMALE' and drecorded between '$drec1' and '$drec2'");
$rs3M=mysql_num_rows($qry3M);

$qry3L=mysql_query("select* from register where typ='DUP(LOSS)' and sex='FEMALE' and drecorded between '$drec1' and '$drec2'");
$rs3L=mysql_num_rows($qry3L);

$qry4=mysql_query("select* from register where typ='TYPE4' and sex='MALE' and drecorded between '$drec1' and '$drec2'");
$rs4=mysql_num_rows($qry4);

$qry5=mysql_query("select* from register where typ='TYPE4' and sex='FEMALE' and drecorded between '$drec1' and '$drec2'");
$rs5=mysql_num_rows($qry5);

$qry6=mysql_query("select* from register where typ='TYPE5' and sex='MALE' and drecorded between '$drec1' and '$drec2'");
$rs6=mysql_num_rows($qry6);

$qry7=mysql_query("select* from register where typ='TYPE5' and sex='FEMALE' and drecorded between '$drec1' and '$drec2'");
$rs7=mysql_num_rows($qry7);

$qry8=mysql_query("select* from register where typ='COP' and sex='MALE' and drecorded between '$drec1' and '$drec2'");
$rs8=mysql_num_rows($qry8);

$qry9=mysql_query("select* from register where typ='COP' and sex='FEMALE' and drecorded between '$drec1' and '$drec2'");
$rs9=mysql_num_rows($qry9);

$npr=$rs+$rs1;
$male=$rs2L+$rs2M;
$female=$rs3M + $rs3L;
$others=$male+$female+$rs4+$rs5+$rs6+$rs7+$rs8+$rs9;
$appTotal=$npr+$others;

echo"<table>";
echo"<font color='#695887' size='14'>FROM:$drec1 &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspTO:$drec2</font><br><br><br>";
echo"<font color='#695887' size='10'>APPLICATIONS MADE:<font color='blue' size='8'type='bold'>$appTotal";
echo"<tr bgcolor=#239878><td>TOTAL NPR-MALE<td>TOTAL NPR-FEMALE<td>TOTAL DUP-MALE<td>TOTAL DUP-FMALE<td>TOTAL TYPE4-MALE<td>
TOTAL TYPE4-FEMALE<td>TOTAL TYPE5-MALE<td>TOTAL TYPE5-FEMALE<td>TOTAL COP-MALE<td>TOTAL COP-FEMALE</td></tr>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp";
echo"<tr bgcolor=#984858><td><font color='orange' size='8'type='bold'>$rs<td><font color='orange' size='8'type='bold'>
$rs1<td><font color='orange' size='8'type='bold'>$male<td><font color='orange' size='8'type='bold'>$female<td><font color='orange' size='8'type='bold'>
$rs4<td><font color='orange' size='8'type='bold'>$rs5<td><font color='orange' size='8'type='bold'>$rs6<td><font color='orange' size='8'type='bold'>
$rs7<td><font color='orange' size='8'type='bold'>$rs8<td><font color='orange' size='8'type='bold'>$rs9</td><tr>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp";
echo"<tr bgcolor=#637838><td colspan='2'><font color='orange' size='5'type='bold'>TOTAL NPR=$npr <td colspan='8'><p align='center'><font color='orange' size='5'type='bold'>TOTAL OTHERS=$others</p></td></tr>";
//
ECHO"";
?>
</div>

<div id="received id">
<?php

$nprm=mysql_query("select* from register where typ='NPR' and sex='MALE' and dreceived between '$drec1' and '$drec2'");
$nprmresult=mysql_num_rows($nprm);
$nprf=mysql_query("select* from register where typ='NPR' and sex='FEMALE' and dreceived between '$drec1' and '$drec2'");
$nprfresult=mysql_num_rows($nprf);

$receivedNpr=$nprmresult+$nprfresult;

$copm=mysql_query("select* from register where typ='COP-MALE' and sex='MALE' and dreceived between '$drec1' and '$drec2'");
$copmresult=mysql_num_rows($copm);

$copf=mysql_query("select* from register where typ='COP-FEMALE' and sex='FEMALE' and dreceived between '$drec1' and '$drec2'");
$copfresult=mysql_num_rows($copf);

$dupmL=mysql_query("select* from register where typ='DUP(LOSS)' and sex='MALE' and dreceived between '$drec1' and '$drec2'");
$dupmLresult=mysql_num_rows($dupmL);

$dupfL=mysql_query("select* from register where typ='DUP(LOSS)' and sex='FEMALE' and dreceived between '$drec1' and '$drec2'");
$dupfLresult=mysql_num_rows($dupfL);


$dupm=mysql_query("select* from register where typ='DUP(MUTILATION)' and sex='MALE' and dreceived between '$drec1' and '$drec2'");
$dupmresult=mysql_num_rows($dupm);


$dupf=mysql_query("select* from register where typ='DUP(MUTILATION)' and sex='FEMALE' and dreceived between '$drec1' and '$drec2'");
$dupfresult=mysql_num_rows($dupf);

$typ4m=mysql_query("select* from register where typ='TYPE4' and sex='MALE' and dreceived between '$drec1' and '$drec2'");
$typ4mresult=mysql_num_rows($typ4m);

$typ4f=mysql_query("select* from register where typ='TYPE4' and sex='FEMALE' and dreceived between '$drec1' and '$drec2'");
$type4fresult=mysql_num_rows($typ4f);

$typ5m=mysql_query("select* from register where typ='TYPE5' and sex='MALE' and dreceived between '$drec1' and '$drec2'");
$typ5mresult=mysql_num_rows($typ5m);

$typ5f=mysql_query("select* from register where typ='TYPE5' and sex='FEMALE' and dreceived between '$drec1' and '$drec2'");
$type5fresult=mysql_num_rows($typ5f);

$dupmale=$dupmresult+$dupmLresult;

$dupfemale=$dupfresult+$dupfLresult;

$receivedOthers=$copmresult+$copfresult+$dupmale+$dupfemale+$typ4mresult+$type4fresult+$typ5mresult+$type5fresult;

$recTotal=$receivedOthers+$receivedNpr;

echo"<table>";
echo"<font color='#695887' size='10'>RECEIVED ID CARDS:<font color='blue' size='8'type='bold'>$recTotal";
echo"<tr bgcolor=#239878><td>TOTAL NPR-MALE<td>TOTAL NPR-FEMALE<td>TOTAL DUP-MALE<td>TOTAL DUP-FMALE<td>TOTAL TYPE4-MALE<td>
TOTAL TYPE4-FEMALE<td>TOTAL TYPE5-MALE<td>TOTAL TYPE5-FEMALE<td>TOTAL COP-MALE<td>TOTAL COP-FEMALE</td></tr>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp";
echo"<tr bgcolor=#984858><td><font color='orange' size='8'type='bold'>$nprmresult<td><font color='orange' size='8'type='bold'>
$nprfresult<td><font color='orange' size='8'type='bold'>$dupmale<td><font color='orange' size='8'type='bold'>$dupfemale<td><font color='orange' size='8'type='bold'>
$typ4mresult<td><font color='orange' size='8'type='bold'>$type4fresult<td><font color='orange' size='8'type='bold'>$typ5mresult<td><font color='orange' size='8'type='bold'>
$type5fresult<td><font color='orange' size='8'type='bold'>$copmresult<td><font color='orange' size='8'type='bold'>$copfresult</td><tr>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp";
echo"<tr bgcolor=#637838><td colspan='2'><font color='orange' size='5'type='bold'>TOTAL NPR=$receivedNpr <td colspan='8'><p align='center'><font color='orange' size='5'type='bold'>TOTAL OTHERS=$receivedOthers</p></td></tr>";
//
mysql_close($conn);
?>
</div>
</body>
<script type="text/javascript">
function view()
{
	document.getElementById("view");
}
</html>