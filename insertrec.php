
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
<a href="profile.php">HOME</a>&nbsp&nbsp|||&nbsp&nbsp<a href="logout.php">LOGOUT</a><BR>
<?php
if(isset($_POST['srno'])){(int)$srno=mysql_escape_string($_POST['srno']);}
if(isset($_POST['id_no'])){(int)$idno=mysql_escape_string($_POST['id_no']);}
if(isset($_POST['tp'])){$typ=mysql_escape_string($_POST['tp']);}
if(isset($_POST['apname'])){$apname=mysql_escape_string($_POST['apname']);}
if(isset($_POST['sex'])){$sex=mysql_escape_string($_POST['sex']);}
if(isset($_POST['dob'])){$dob=mysql_escape_string($_POST['dob']);}
if(isset($_POST['pob'])){$pob=mysql_escape_string($_POST['pob']);}
if(isset($_POST['phone'])){(int)$phone=mysql_escape_string($_POST['phone']);}
if(isset($_POST['drec'])){$drec=mysql_escape_string($_POST['drec']);}
$drecev='0000-00-00';
if(isset($_FILES['image'])){
// image properties
$image=$_FILES['image']['name'];
$imgsize=$_FILES['image']['size'];
$temploc=$_FILES['image']['tmp_name'];
$error=$_FILES['image']['error'];
}

//get file extension
$imageExt=explode('.',$image);
$imageExt=strtolower(end($imageExt));

// allowed type of files for upload
$allowed=array('jpg','jpeg');

if(in_array($imageExt,$allowed)){
if($error===0){
if($imgsize<=20000000){
$newImageName=uniqid('',true).'.'.$imageExt;

$destination='uploads/'.$newImageName;

//Record information to the database

if(move_uploaded_file($temploc,$destination)){

include("conn.php");

$sql=mysql_query("select* from register where srno='$srno'");
$row=mysql_num_rows($sql);
if($row===0){
$qry=mysql_query("insert into register(srno,id_no,typ,applicant,sex,dob,pob,phone,drecorded,dreceived,image,imageSize,recordedBy,remarks) VALUES
('$srno','$idno','$typ','$apname','$sex','$dob','$pob','$phone','$drec','$drecev','$image','$newImageName','$username','')");

/////////A.K.K////////
echo"<p><font color='BLUE' size='8'type='bold'>The applicant,$apname with serial number:$srno and is $typ has been recorded</font></p>";
}
else if($row!==0){
	echo"<font color='RED' size='8'type='bold'>$apname IS ALREADY IN THE REGISTER</font></p>";
}
}
}
}
}
else{
	echo"photo not allowed";
}

mysql_close($conn);

?>
</body>
</html>