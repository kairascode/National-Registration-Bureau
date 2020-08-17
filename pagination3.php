<?php
include("conn.php");

$sql=mysql_query("select*from register");

$numRows=mysql_num_rows($sql);

$perPage=2;

$totalRows=ceil($numRows/$perPage);

//current page
if(!isset($_GET['page']))
{
$page=1;
}
else
{
$page=$_GET['page'];
}
//start position
if($page<=1){
$start=0;}
else{
$start=$page*$perPage-$perPage;
}
$prev=$page-1;
$next=$page+1;

if($prev>0){
echo"<a href='?page=$prev'>prev</a>";}
//numbers
$num=1;
for($num;$num<=$totalRows;$num+=1)
{
if($page==$num){
echo $page;
}else{
echo"<a href='?page=$num'>$num</a> ";
}
}

if($page<ceil($numRows/$perPage)){
echo"<a href='?page=$next'>next</a>";}
$qry=mysql_query("select*from register ORDER BY srno ASC LIMIT $start,$perPage");
while($row=mysql_fetch_array($qry))
{

$srno=$row['srno'];
$applicant=$row['applicant'];
$type=$row['typ'];

echo $srno'&nbsp&nbsp'$applicant'&nbsp&nbsp'$type'<br>';
}


?>
