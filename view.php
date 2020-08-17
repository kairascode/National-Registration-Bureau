<?php

if(isset($_POST['srno'])){(int)$srno=mysql_escape_string($_POST['srno']);}

//include("conn.php");// connect to DB

$conn=mysql_connect("localhost","root","") or die("SERVER NOT FOUND!!");
mysql_select_db("nrbT") or die("Database not found!!");
$qry=mysql_query("select  * from register where srno='$srno'");
$result=mysql_fetch_assoc($qry);
$dbsrno=$result['srno'];

if($dbsrno==$srno){ //check whether form input matches DB content

echo"<table border=1>";
echo"<tr bgcolor='black' height='50'><td><font color='red' type='bold'>SERIAL_NUMBER&nbsp&nbsp&nbsp<TD><font color='red'>ID_CARD NO&nbsp&nbsp&nbsp</td</tr>";
echo"<TD><font color='red'>TYPE&nbsp&nbsp&nbsp<TD><font color='red'>APPLICANT&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<TD><font color='red'>SEX&nbsp&nbsp&nbsp
<TD><font color='red'>DATE_OF_BIRTH&nbsp&nbsp&nbsp<TD><font color='red'>PLACE OF BIRTH&nbsp&nbsp&nbsp<TD><font color='red'>DATE RECORDED&nbsp&nbsp&nbsp<TD><font color='red'>DATE RECEIVED<td><font color='red'>PHOTO</td></tr>";
echo"<tr bgcolor='white'height='100'><td align='center'>".$result['srno']."<td align='center'>".$result['id_no']."<td align='center'>".$result['typ']."<td align='center'>".$result['applicant']."<td>".
$result['sex']."<td align='center'>".$result['dob']."<td align='center'>".$result['pob']."<td align='center'>".$result['drecorded']."<td align='center'>".$result['dreceived']."<td align='center'><img src='uploads'/".$result['image']." height='50' width='50'></td></tr></font>";
echo"</table>";
}
else{
echo"<font color='#892312' type='bold' size='10'>The Applicant with serial $srno is not found in the Register</font>";
}

echo"<form method='POST' action='' enctype='multipart/form-data'>
SERIAL:<input type='text' name='srno' required><br><br>

<input type='submit' value='View'>
</form>";
?>
</body>
</html>