<?php
if(isset($_POST['srno'])){$srno=$_POST['srno'];}
if(isset($_FILES['image'])){
// image properties
$image=mysql_escape_string($_FILES['image']['name']);
$imgsize=mysql_escape_string($_FILES['image']['size']);
$temploc=$_FILES['image']['tmp_name'];
$error=$_FILES['image']['error'];
echo"$imgsize";
}

//get file extension
$imageExt=explode('.',$image);
$imageExt=strtolower(end($imageExt));
//echo"$imageExt";
// allowed type of files for upload
$allowed=array('jpg','jpeg');

// check for errors
if(in_array($imageExt,$allowed)){
if($error===0){
if($imgsize<=20000000){
$newImageName=uniqid('',true).'.'.$imageExt;

$destination='uploads/'.$newImageName;

//insert image to the database
if(move_uploaded_file($temploc,$destination)){
$conn=mysql_connect("localhost","root","") or die("SERVER NOT FOUND!!");
mysql_select_db("nrb") or die("Database not found!!");
//$qry=mysql_query("INSERT INTO photos(name,image) VALUES('$image','$newImageName')");
$QRY=mysql_query("UPDATE register set image='$image', imageSize='$newImageName' where srno='$srno'");
$result=mysql_fetch_array($qry);

echo"upload successful";
}
else{
echo"upload failed";
}

}else{
	echo"There is an error in the image uploaded";
}

}
}
else{
echo"This type of photo is not allowed for upload";
}

?>