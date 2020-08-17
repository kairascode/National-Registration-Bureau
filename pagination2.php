<?php
//1.connect to server
include("conn.php");
//2. main sql query
$sql="select * from register";
//3.show all records
$result=mysql_query($sql);

while($row=mysql_fetch_array($result))
{
echo $row['srno'].'&nbsp&nbsp'.$row['applicant']."<br>";
}
//4.mysql start position
if($page<=1)
$start=0;
else
$start=$page*$per_page-$per_page;
//5.records shown amount
$per_page=2;

//6.append limit for shown records
$sql.="LIMIT $start,$per_page";
//7.how many pages to show
$num_pages=ceil($num_rows/$per_page);
//7.how much records are in database
$num_rowa=mysql_num_rows(mysql_query($sql));
//8.prev,numbers, next links
$prev=$page-1;
$next=$page+1;

echo "<br>";

//prev
if($prev>0)
echo"<a href='?page=$prev'>prev</a>";
//numbers
$number=1;
for($number; $number<=$num_pages;$number+=1)
{
echo"<a href='?page=$number'>$number</a>";
}
// next
if($page<ceil($num_rows/$per_page))
echo"<a href='?page=$next'>next</a>";
?>
