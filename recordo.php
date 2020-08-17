<?php include("header.php");?>
<html>
<head>
<title>OTHERS-RECORD</title>
<link rel="stylesheet" type="text/css" a href="record.css">
</head>
<body bgcolor="#859250">
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
</form>
</body>
</html>