<?php include("header.php");?>
<html>
<head>
<title>PROFILE</title>
<link rel="stylesheet" type="text/css" a href="profstyle.css">
<link rel="stylesheet" type="text/css" a href="record.css">
</head>
<body bgcolor="#859250">
<div id="container">
<div id="aside">
<form id="side" method="POST" action=""><input type="hidden" name="cat" value="npr"><input type="submit" name="submit" value="Record NPR" onclick="view"></form>
<form id="side" method="POST" action=""><input type="hidden" name="cat" value="others"><input type="submit" name="submit" value="RecordOTHERS" onclick="view"></form>
<form id="side" method="POST" action=""><input type="hidden" name="cat" value="receive"><input type="submit" name="submit" value="Receive ID" onclick="view"></form>
<form id="side" method="POST" action=""><input type="hidden" name="cat" value="search"><input type="submit" name="submit" value="Search" onclick="view"></form>
<form id="side" method="POST" action=""><input type="hidden" name="cat" value="returns"><input type="submit" name="submit" value="Returns" onclick="view"></form>

<!--<a href="recordo.php" onclick="view">Record Others</A></li><br><li><a href="rnpr.php"onclick="view">Receive ID</a></li><br>

<li><a href="search.php"onclick="view">Search</A></li><br>
<li><a href="returns.php"onclick="view">Returns</A></li><br>-->
<li><a href="logout.php">Logout</a></li></ul>
</div>
<div id="view">
<?php
if(isset($_POST['submit']))
if(isset($_POST['srno'])){$srno=$_POST['srno'];}
if(isset($_POST['id_no'])){$idno=$_POST['id_no'];}
if(isset($_POST['cat'])){$cat=$_POST['cat'];}
if(isset($_POST['drec'])){$drec=$_POST['drec'];}
if(isset($_POST['drec1'])){$drec1=$_POST['drec1'];}
if(isset($_POST['search'])){$search=$_POST['search'];}
/*if(isset($_POST['tp'])){$typ=$_POST['tp'];}
if(isset($_POST['apname'])){$apname=$_POST['apname'];}
if(isset($_POST['sex'])){$sex=$_POST['sex'];}
if(isset($_POST['dob'])){$dob=$_POST['dob'];}
if(isset($_POST['pob'])){$pob=$_POST['pob'];}
if(isset($_POST['father'])){$father=$_POST['father'];}
if(isset($_POST['mother'])){$mother=$_POST['mother'];}
if(isset($_POST['phone'])){$phone=$_POST['phone'];}

if(isset($_POST['drec2'])){$drec2=$_POST['drec2'];}

if(isset($_POST['dreceived'])){$dreceived=$_POST['dreceived'];}
if(isset($_POST['srno'])){$srno=$_POST['srno'];}*/

$conn=mysql_connect("localhost","root","") or die("SERVER NOT FOUND!!");
mysql_select_db("nrd") or die("Database not found!!");

if($cat=="npr"){
/*{
$qry=mysql_query("INSERT INTO register (no,srno,id_no,typ,applicant,sex,dob,pob,father,mother,phone,drecorded,dreceived) VALUES
('','$srno','$idno','$typ','$apname','$sex','$dob','$pob','$father','$mother','$phone','$drec','')");
if($qry)
{
	echo"<p><font color='red' size='4'type='bold'>The applicant,$apname with serial number:$srno and is $typ has been recorded</font></p>";
}
else{
	echo"";
}*/
echo"<form method='POST' action='insertrec.php'>
<p align='center'>NPR</P><HR><br>
SERIAL NUMBER:<input type='text' name='srno'  maxlength='9' required size='20'>&nbsp&nbsp
<input type='hidden' name='id_no' value='0' >
<input type='hidden' name='tp' value='NPR'>
APPLICANT NAME:<input type='text' name='apname' maxlength='35' required size='25'><br><br><br><br><HR>
SEX
<select name='sex' required >
<option value=''></option>
<option value='MALE'>MALE</option>
<option value='FEMALE'>FEMALE</option></select>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
DOB:<input type='date' name='dob' required size='30'>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
POB:<input type='text' name='pob' maxlength='20' required size='25' ><br><br><br><br><HR>
FATHER:<input type='text' name='father' maxlength='35' required size='30'>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
MOTHER :<input type='text' name='mother' maxlength='35' required size='30'><br><br><br><br><HR>
MOBILE:<input type='text' name='phone'  maxlength='10' required size='30'>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
DATE RECORDED:<input type='date' name='drec'  required size='30'><br><br><br><br><HR>
<P align='center'><input type='submit' name='submit' value='SAVE'>&nbsp&nbsp&nbsp&nbsp&nbsp
<input type='reset' name='cancel' value='CANCEL'></p>";

echo"</form>";
}//end of NPR
else
	if($cat=="others")
	{
		echo"
	<form method='POST' action='insertrec.php'>
<p align='center'>OTHERS(DUP,TYPE4,COP,TYPE5)</P><br><HR><br>
SERIAL NUMBER:<input type='text' name='srno'  maxlength='9' required>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
ID CARD NO:<input type='text' name='id_no' maxlength='8' required><br><br><br><br><HR>
TYPE<select name='tp' required>
<option value=''></option>
<option value='DUP(MUTILATION)'>DUP(MUTILATION)</option>
<option value='DUP(LOSS)'>DUP(LOSS)</option>
<option value='COP'>COP</option>
<option value='TYPE4'>TYPE4</option>
<option value='TYPE5'>TYPE5</option></select>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
APPLICANT NAME:<input type='text' name='apname' maxlength='35' required ><br><br><br><br><HR>
SEX
<select name='sex' required>
<option value=''></option>
<option value='MALE'>MALE</option>
<option value='FEMALE'>FEMALE</option></select>&nbsp&nbsp&nbsp&nbsp
DOB:<input type='date' name='dob' required>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
POB:<input type='text' name='pob' maxlength='20' required size='22'><br><br><br><br><HR>
FATHER:<input type='text' name='father' maxlength='35' required size='28'>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
MOTHER :<input type='text' name='mother' maxlength='35' required size='22'><br><br><br><br><HR>
MOBILE#:<input type='text' name='phone'  maxlength='10' required >&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
DATE RECORDED:<input type='date' name='drec'  required size='30'><br><br><br><br><HR>
<P align='center'><input type='submit' name='submit' value='SAVE'>&nbsp&nbsp&nbsp&nbsp&nbsp
<input type='reset' name='cancel' value='CANCEL'></p>
</form>	";
	}
	
// END OF OTHERS
else

if($cat=="receive"){
	//if(isset($_POST['submit']))
//$conn-mysql_connect("localhost","root","") or die("Server not found...");
//mysql_select_db("nrd") or die("Database not found...");
$qry=mysql_query("update register set id_no='$idno',dreceived='$dreceived' where srno='$srno'");

echo"<form method='POST' action='rnpr.php'>
<p align='center'>ID RECEIPT FORM</P><HR><br>
SERIAL NO:<input type='text' name='srno' maxlength='9'required>&nbsp&nbsp&nbsp&nbsp<br><br>
ID CARD NO:<input type='text' name='id_no' maxlength='8' required>&nbsp&nbsp&nbsp&nbsp<br><br>
DATE RECEIVED:<input type='date' name='dreceived' required>&nbsp&nbsp&nbsp&nbsp<br><br>
<input type='submit' name='submit' value='RECEIVE'>&nbsp&nbsp&nbsp&nbsp<br><br>";
/*if($srno&&$idno&&$dreceived){
	echo"The ID card no $idno has been received successfuly";
}
else{
	echo"";
}*/
echo"</form>
";
}	
//END OF RECEIVE IDS
else
	
if($cat=="search")
{
//if(isset($_POST['submit']))
	
//mysql_connect("localhost","root","") or die("Server not found...");
//mysql_select_db("nrd") or die("Database not found...");

$qry=mysql_query("select* from register where srno='$s'");
$result=mysql_fetch_array($qry);
echo"<form method='POST' action=''><strong>SERIAL NO</strong>:<input type='text' name='search' required maxlength='9'><input type='submit' name='submit' value='search'></form>";
//if($result){
echo"<table>";
echo"<tr bgcolor='black'><td><font color='red' type='bold'>SERIAL_NUMBER&nbsp&nbsp&nbsp<TD><font color='red'>ID_CARD NO&nbsp&nbsp&nbsp</td</tr>";
echo"<TD><font color='red'>TYPE&nbsp&nbsp&nbsp<TD><font color='red'>APPLICANT&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<TD><font color='red'>SEX&nbsp&nbsp&nbsp
<TD><font color='red'>DATE_OF_BIRTH&nbsp&nbsp&nbsp<TD><font color='red'>PLACE OF BIRTH&nbsp&nbsp&nbsp<TD><font color='red'>DATE RECORDED&nbsp&nbsp&nbsp<TD><font color='red'>DATE RECEIVED</td></tr>";
echo"<tr bgcolor='white'><td>".$result['srno']."<td>".$result['id_no']."<td>".$result['typ']."<td>".$result['applicant']."<td>".
$result['sex']."<td>".$result['dob']."<td>".$result['pob']."<td>".$result['drecorded']."<td>".$result['dreceived']."</td></tr></font>";
//echo"</table>";
//}
//else
//{
	echo"<font color='#892312' type='bold' size='10'>The serial number $srno is not found in the Register</font>";
//}	
	
	
}//END OF SEARCH
else
	if($cat=="returns"){
	//if(isset($_POST['drec1'])){$drec1=$_POST['drec1'];}
//if(isset($_POST['drec2'])){$drec2=$_POST['drec2'];}
//mysql_connect("localhost","root","") or die("Server not found...");
//mysql_select_db("nrd") or die("Database not found...");

$qry=mysql_query("select* from register where typ='NPR' and sex='MALE' and drecorded between '$drec1' and '$drec2'");
$rs=mysql_num_rows($qry);

$qry1=mysql_query("select* from register where typ='NPR' and sex='FEMALE' and drecorded between '$drec1' and '$drec2'");
$rs1=mysql_num_rows($qry1);

$qry2=mysql_query("select* from register where typ='DUP(MUTILATION)' OR'DUP(LOSS)' and sex='MALE' and drecorded between '$drec1' and '$drec2'");
$rs2=mysql_num_rows($qry2);

$qry3=mysql_query("select* from register where typ='DUP(MUTILATION)' OR'DUP(LOSS)' and sex='FEMALE' and drecorded between '$drec1' and '$drec2'");
$rs3=mysql_num_rows($qry3);

$qry4=mysql_query("select* from register where typ='TYP4' and sex='MALE' and drecorded between '$drec1' and '$drec2'");
$rs4=mysql_num_rows($qry4);

$qry5=mysql_query("select* from register where typ='TYP4' and sex='FEMALE' and drecorded between '$drec1' and '$drec2'");
$rs5=mysql_num_rows($qry5);

$qry6=mysql_query("select* from register where typ='TYP5' and sex='MALE' and drecorded between '$drec1' and '$drec2'");
$rs6=mysql_num_rows($qry6);

$qry7=mysql_query("select* from register where typ='TYP5' and sex='FEMALE' and drecorded between '$drec1' and '$drec2'");
$rs7=mysql_num_rows($qry7);

$qry8=mysql_query("select* from register where typ='COP' and sex='MALE' and drecorded between '$drec1' and '$drec2'");
$rs8=mysql_num_rows($qry8);

$qry9=mysql_query("select* from register where typ='COP' and sex='FEMALE' and drecorded between '$drec1' and '$drec2'");
$rs9=mysql_num_rows($qry9);

$npr=$rs+$rs1;
$others=$rs3+$rs4+$rs5+$rs6+$rs7+$rs8+$rs9;
echo"
<form method='POST' action='' >
<p>MONTHLY RETURNS</P>
FROM:<input type='date' name='drec1' required>
TO:<input type='date' name='drec2' required>
<input type='submit' name='submit' value='COMPUTE'></form>

";
echo"<table>";
echo"<tr bgcolor=#239878><td>TOTAL NPR-MALE<td>TOTAL NPR-FEMALE<td>TOTAL DUP-MALE<td>TOTAL DUP-FMALE<td>TOTAL TYPE4-MALE<td>
TOTAL TYPE4-FEMALE<td>TOTAL TYPE5-MALE<td>TOTAL TYPE5-FEMALE<td>TOTAL COP-MALE<td>TOTAL COP-FEMALE</td></tr>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp";
echo"<tr bgcolor=#984858><td><font color='orange' size='8'type='bold'>$rs<td><font color='orange' size='8'type='bold'>
$rs1<td><font color='orange' size='8'type='bold'>$rs2<td><font color='orange' size='8'type='bold'>$rs3<td><font color='orange' size='8'type='bold'>
$rs4<td><font color='orange' size='8'type='bold'>$rs5<td><font color='orange' size='8'type='bold'>$rs6<td><font color='orange' size='8'type='bold'>
$rs7<td><font color='orange' size='8'type='bold'>$rs8<td><font color='orange' size='8'type='bold'>$rs9</td><tr>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp";
echo"<tr bgcolor=#637838><td colspan='2'><font color='orange' size='5'type='bold'>TOTAL MONTHLY NPR=$npr <td colspan='8'><p align='center'><font color='orange' size='5'type='bold'>TOTAL MONTHLY OTHERS=$others</p></td></tr>";
	
//END OF RETURNS

}
else{
	echo"<img src='pp.jpg' width='1140' height='700'>";
}

?>
</div>
</div>
</body>
<script type="text/javascript">
function view()
{
	document.getElementById("view");
}
</html>