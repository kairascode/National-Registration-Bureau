<?php

//5.records shown amount
$perPage=5;
// 7. current page
if(!isset($_GET['page']))
{
$page=1;
}
else
{
$page=$_GET['page'];
}
// 4.mysql start position
if($page<=1)
$start=0;
else
$start=$page*$perPage-$perPage;
//  1. connect to server
include("conn.php");
// 2. main sql query
$qry="select* from register";
// 7.how many records are in database
$nrows=mysql_num_rows(mysql_query($qry));
// 8. how many pages are at all
$npages=ceil($nrows/$perPage);
// 6. Append limit for shown records
$qry.="LIMIT $start,$perPage";
// 3. show all records
$result=mysql_query($qry);
while($row=mysql_fetch_array($result){
echo "$row['srno'].$row['applicant'].$row['typ'].'<br>";
// 8. prev,numbers, next links
$prev=$page-1;
$next=$page+1;

echo"<hr>";
//prev
if($prev>0)
echo"<a href='?page=$prev'>prev</a>";
//numbers
$num=1;
for($num;$num<=$npages;$num+=1)
{
if($page==$num){

}
echo"<a href='?page=$num'>$num</a> ";
}
//next
if($page<ceil($nrows/$perPage))
echo"<a href='?page=$next'>next</a>";
?>