<?php
if($_SERVER["REQUEST_METHOD"]=="POST"){

include("conn.php");

loginPort();
}

function loginPort(){

global $conn;

$username=$_POST['username'];
$password=$_POST['password'];

$q="select*from user where username='$username' and password='$password'";
$qry=mysqli_query($conn,$q);

$result=mysqli_num_rows($qry);

if(!$result==0){

echo"login successful";

}
else{
echo"login failed";

}

}
mysqli_close($conn);
?>