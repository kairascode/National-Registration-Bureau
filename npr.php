<?php include("header.php");?>
<html>
<head>
<title>NPR-RECORD</title>
<link rel="stylesheet" type="text/css" a href="record.css">
</head>
<body bgcolor="#859250">
<?php
if(isset($_POST['srno'])){$srno=$_POST['srno'];}
if(isset($_POST['id_no'])){$idno=$_POST['id_no'];}
if(isset($_POST['tp'])){$typ=$_POST['tp'];}
if(isset($_POST['apname'])){$apname=$_POST['apname'];}
if(isset($_POST['sex'])){$sex=$_POST['sex'];}
if(isset($_POST['dob'])){$dob=$_POST['dob'];}
if(isset($_POST['pob'])){$pob=$_POST['pob'];}
if(isset($_POST['father'])){$father=$_POST['father'];}
if(isset($_POST['mother'])){$mother=$_POST['mother'];}
if(isset($_POST['phone'])){$phone=$_POST['phone'];}
if(isset($_POST['drec'])){$drec=$_POST['drec'];}
$conn=mysql_connect("localhost","root","") or die("SERVER NOT FOUND!!");
mysql_select_db("nrd") or die("Database not found!!");
$qry=mysql_query("INSERT INTO register (no,srno,id_no,typ,applicant,sex,dob,pob,father,mother,phone,drecorded,dreceived) VALUES
('','$srno','$idno','$typ','$apname','$sex','$dob','$pob','$father','$mother','$phone','$drec','')");
if($qry)
{
	echo"<p><font color='red' size='4'type='bold'>The applicant,$apname with serial number:$srno and is $typ has been recorded</font></p>";
}
else{
	echo"";
}
echo"<form method='POST' action=''>
<p align='center'>NPR</P><HR><br>
SERIAL NUMBER:<input type='text' name='srno'  maxlength='9' required size='20'>&nbsp&nbsp
<input type='hidden' name='id_no' value='0' >
<input type='hidden' name='tp' value='NPR'>
APPLICANT NAME:<input type='text' name='apname' maxlength='35' required size='20'><br><br><br><br><HR>
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
?>
</body>
</html>