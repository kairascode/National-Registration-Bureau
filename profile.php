<html>
<head>
<title>PROFILE</title>
<link rel="stylesheet" type="text/css" a href="profstyle.css">
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
echo"<p align='right'><h3><font color='#665743'>You are logged in as $username &nbsp&nbsp&nbsp&nbsp <a href='logout.php'>click here to logout</a> </h3></font></p>";
}?>
</head>
<body bgcolor="#859250">
<p align="center"></p>
<div id="container">
<div id="aside">
<form id="side" method="POST" action=""><input type="hidden" name="cat" value="npr"><input type="submit" name="submit" value="Record NPR" onclick="view"></form>
<form id="side" method="POST" action=""><input type="hidden" name="cat" value="others"><input type="submit" name="submit" value="RecordOTHERS" onclick="view"></form>
<form id="side" method="POST" action=""><input type="hidden" name="cat" value="receive"><input type="submit" name="submit" value="Receive ID" onclick="view"></form>
<form id="side" method="POST" action=""><input type="hidden" name="cat" value="rejection"><input type="submit" name="submit" value="Reject" onclick="view"></form>
<form id="side" method="POST" action=""><input type="hidden" name="cat" value="search"><input type="submit" name="submit" value="Search" onclick="view"></form>
<form id="side" method="POST" action=""><input type="hidden" name="cat" value="returns"><input type="submit" name="submit" value="Statistics" onclick="view"></form>
<form id="side" method="POST" action="pagination.php"><input type="hidden" name="cat" value="viewreg"><input type="submit" name="submit" value="ConsultRegister" onclick="view"></form>
</div>
<div id="view">
<?php
if(isset($_POST['cat'])){$cat=$_POST['cat'];}

switch($cat){
case "npr";
echo"<form method='POST' action='insertrec.php' enctype='multipart/form-data'>
<p align='center'>NPR</P><HR><br>
SERIAL NUMBER:<input type='text' name='srno' pattern='[0-9]+' placeholder='S/no Only'  maxlength='9' required size='20'>&nbsp&nbsp
<input type='hidden' name='id_no' value='0' >
<input type='hidden' name='tp' value='NPR'>
APPLICANT NAME:<input type='text' name='apname' maxlength='35' pattern='[A-Z']+' placeholder='use uppercase' required size='25'><br><br><br><br><HR>
SEX
<select name='sex' required >
<option value=''></option>
<option value='MALE'>MALE</option>
<option value='FEMALE'>FEMALE</option></select>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
DOB:<input type='date' name='dob' required size='30'>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
POB:<input type='text' name='pob' maxlength='20' pattern='[A-Z '']+' placeholder='use uppercase' required size='25' ><br><br><br><br><HR>
MOBILE:<input type='text' name='phone'  maxlength='10'pattern='[0-9]+' required size='30'>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
PHOTO:<input type='file' name='image' required><br><br>&nbsp&nbsp&nbsp&nbsp&nbsp<hr>
DATE RECORDED:<input type='date' name='drec'  required size='30'><br><br><br><br><HR>
<P align='center'><input type='submit' name='submit' value='SAVE'>&nbsp&nbsp&nbsp&nbsp&nbsp
<input type='reset' name='cancel' value='CANCEL'></p>";
echo"</form>";

break;

//RECORD OTHERS CODE
case "others";
	
		echo"
	<form method='POST' action='insertrec.php' enctype='multipart/form-data'>
<p align='center'>OTHERS(DUP,TYPE4,COP,TYPE5)</P><br><HR><br>
SERIAL NUMBER:<input type='text' name='srno'  maxlength='9' pattern='[0-9]+' placeholder='S/no Only' required>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
ID CARD NO:<input type='text' name='id_no' maxlength='8' pattern='[0-9]+' placeholder='ID No 0nly'required><br><br><br><br><HR>
TYPE<select name='tp' required>
<option value=''></option>
<option value='DUP(MUTILATION)'>DUP(MUTILATION)</option>
<option value='DUP(LOSS)'>DUP(LOSS)</option>
<option value='COP'>COP</option>
<option value='TYPE4'>TYPE4</option>
<option value='TYPE5'>TYPE5</option></select>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
APPLICANT NAME:<input type='text' name='apname' maxlength='35' pattern='[A-Z ]+' placeholder='use uppercase' required ><br><br><br><br><HR>
SEX
<select name='sex' required>
<option value=''></option>
<option value='MALE'>MALE</option>
<option value='FEMALE'>FEMALE</option></select>&nbsp&nbsp&nbsp&nbsp
DOB:<input type='date' name='dob' required>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
POB:<input type='text' name='pob' maxlength='20' pattern='[A-Z'']+' placeholder='use uppercase' required size='22'><br><br><br><br><HR>
MOBILE#:<input type='text' name='phone'  maxlength='10' pattern='[0-9]+' required >&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
PHOTO:<input type='file' name='image' required><br><br>&nbsp&nbsp&nbsp&nbsp&nbsp<hr>
DATE RECORDED:<input type='date' name='drec'  required size='30'><br><br><br><br><HR>
<P align='center'><input type='submit' name='submit' value='SAVE'>&nbsp&nbsp&nbsp&nbsp&nbsp
<input type='reset' name='cancel' value='CANCEL'></p>
</form>	";
// END OF OTHERS
break;

//RECEIVE ID CODE
case "receive";

echo"<form method='POST' action='rnpr.php'>
<p align='center'>ID RECEIPT FORM</P><HR><br>
SERIAL NO:<input type='text' name='srno' maxlength='9' pattern='[0-9]+' placeholder='S/NO Only'><span id='errid' class='errors'>INVALID ID NUMBER</span>&nbsp&nbsp&nbsp&nbsp<br><br>

ID CARD NO:<input type='text' name='id_no' pattern='[0-9]+' maxlength='8' placeholder='ID No only' required>&nbsp&nbsp&nbsp&nbsp<br><br>
DATE RECEIVED:<input type='date' name='dreceived' required>&nbsp&nbsp&nbsp&nbsp<br><br>
<input type='submit' name='submit' value='RECEIVE' onclick='validate();'>&nbsp&nbsp&nbsp&nbsp<br><br>";

echo"</form>
";
break;	
//END OF RECEIVE IDS
//SEARCH CODE
case "search";
echo"<form method='post' action='search2.php'>
SEARCH CRITERIA:<select name='criteria' required>
<option value=''></option>
<option value='serialno'>By Serial</option>
<option value='name'>By name</option></select>
<input type='submit' name='chooser' value='Choose criteria' onclick='resview'>
</form>";

break;
//END OF SEARCH
case "returns";
echo"
<form method='POST' action='returns.php'>
<p>STATISTICS</P>
FROM:<input type='date' name='drec1' required>
TO:<input type='date' name='drec2' required>
<input type='submit' name='submit' value='COMPUTE'></form>";
//END OF RETURNS
break;
case"viewreg";
include("conn.php");
$qry=mysql_query("select*from register");
$row=mysql_num_rows($qry);
$page=50;
$totalpage=ceil($row/$page);
$pg=0;

while($row=mysql_fetch_array($qry)){
echo"<table border=1>
<tr><td>SERIAL NO<td>ID NO<TD>APPLICANT<TD>DOB<TD>POB<TD>SEX<TD>TYPE<TD>DATE RECORDED<TD>DATE RECEIVED</TD></TR>
<tr><td>".$row['srno']."<td>".$row['id_no']."<td>".$row['appname']."<td>".$row['dob']."<td>".$row['pob']."<td>".$row['sex']."<td>".$row['typ']."<td>".$row['drecorded'].
"<td>".$row['dreceived']."</td></tr>
";
}
break;
//check serials order
case"serials";
include("conn.php");
$sql=mysql_query("select srno from register ORDER 'asc' ");

while($result=mysql_fetch_array($sql)){
	
	echo"<table border=1>
	<tr><td>SERIAL NO</td></tr>
	<tr><td>".$result['srno']."</td><tr>";
}
break;
// comment on rejection/spoilt forms
case"rejection";
echo"<form method='POST' action='12345.php'>
COMMENT FOR REJECTED/SPOILT FORMS & RECTIFICATIONS<BR><BR>
SERIAL NO:<input type='text' name='serial' pattern='[0-9 ]+' placeholder='registered serial# only'required maxlength='9'><BR><BR>
COMMENT<BR>
<textarea name='comment' cols=40 rows=5 resizable='false'pattern='[a-zA-Z]+' maxlength='50' placeholder='Only 5O characters allowed. Make it brief' required></textarea><BR><BR>
<input type='submit' name='submit' value='Comment'>
</form>";
break;
case"upload";
// form to upload the photo
echo"<form method='POST' action='imguploader.php' enctype='multipart/form-data'>
SERIAL:<input type='text' name='srno' required><br><br>
File:<input type='file' name='image' size='30'><br><br>
<input type='submit' value='upload'>
</form>";

break;

default:
	echo"<img src='proxy.jpg' width='1140' height='680'>";
}
mysql_close($conn);
?>
</div>
</div>
</body>
<script type="text/javascript">
function validate(){
var srno=document.getElementById("srno");
 if(srno==""){
var errid=document.getElementById("errid");
errid.setAttribute("style","visibility:visible");
}
function view()
{
	document.getElementById("view");
}
function resview(){
	document.getElementById("resview");
}
</script>
</html>