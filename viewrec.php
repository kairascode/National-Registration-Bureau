<html>
<head>
<style type="text/css">
.pagNumActive{color:#000;border:#060 1px solid;background-color:#D2FFD2;padding-left:3px;padding-right:3px}
.paginationNumbers a:link{color:#000;text-decoration:none;border:#999 1px solid;background-color"#F0F0F0;padding-left:3px;padding-right:3px}
.paginationNumbers a:visited{coloer:#000;text-decoration:none;background-color:#F0F0F0;padding-left:3px;padding-right:3px}
.paginationNumbers a:hover{color:#000;text-decoration:none;border:#060 1px solid;background-color:#D2FFD2;padding-left:3px;padding-right:3px}
.paginationNumbers a:active{color:#000;text-decoration:none;border:#999 1px solid;background-color:#F0F0F0;padding-left:3px;padding-right:3px}
</style>
</head>
<body>
<?php
$sql=mysql_query("select * from register ORDER BY srno ASC");
$totalrows=mysql_num_rows($sql)//get total rows from db query
if(isset($_GET['pn'])){// get pn(page number) from URL vars if it is present

$pn=preg_replace('#[^0-9]#i','',$_GET['pn']);// filter everything but numbers for security
}
else{// if the pn URL variable is not present force it to be value of page number 1
$pn=1;
}
// this is where we set how many db items to shw on each page
$itemsPerPage=10;
// get the value of the last page in the pagination result set
$lastPage=ceil($totalrows/$itemsPerPage);
// be sure URL variable $pn is no lower than page 1 and no higher than $lastPage
if($pn<1){
$pn=1; //force it to be 11
}
else if($pn>$lastPage){
$pn=$lastPage;
}
// create the nubers to click in between next and back buttons
$centerPages="";
$sub1=$pn-1;
$sub2=$pn-2;
$add1=$pn+1;
$add2=$pn+2;

if($pn==1){
$centerPages.='&nbsp;<span class="pagNumActive">'.$pn.'</span>$nbsp;';
$centerPages.='&nbsp;<a href='.$_SERVER['PHP_SELF'].'?pn='.$add1.'">'.$add1.'</a>&nbsp;';
}
else if($pn==$lastPage){
$centerPages.='&nbsp;< ahref='.$_SERVER['PHP_SELF'].'?pn='.$sub1.'>'.$sub1.'</a>$nbsp;';
$centerPages.='&nbsp;<span class="pagNumActive">'.$pn.'</span>$nbsp;';
}
else if($pn>2&&$pn<($lastPage-1)){
$centerPages.='&nbsp; <a href='.$_SERVER['PHP_SELF'].'?pn='.$sub2.'</a>&nbsp;';
$centerPages.='&nbsp; <a href='.$_SERVER['PHP_SELF'].'?pn='.$sub1.'</a>&nbsp;';
$centerPages.='&nbsp;<span class="pagNumActive">'.$pn.'</span>&nbsp;';
$centerPages.='&nbsp;< ahref='.$_SERVER['PHP_SELF'].'?pn='.$add1.'>'.$add1.'</a>$nbsp;';
$centerPages.='&nbsp;< ahref='.$_SERVER['PHP_SELF'].'?pn='.$add2.'>'.$add2.'</a>$nbsp;';
}
else if($pn>1&& $pn<$lastPage){
$centerPages.='&nbsp;< ahref='.$_SERVER['PHP_SELF'].'?pn='.$sub1.'>'.$sub1.'</a>$nbsp;';
$centerPages.='&nbsp;<span class="pagNumActive">'.$pn.'</span>&nbsp;';
$centerPages.='&nbsp;< ahref='.$_SERVER['PHP_SELF'].'?pn='.$add1.'>'.$add1.'</a>$nbsp;';
}
//this line sets the limit renge
$limit='LIMIT'.($pn-1)*$itemsPerPage.','.$itemsPerPage;
// run the same query as above but this time add $limit onto the end of the SQL syntax

$sql2=mysql_query("select*from registry ORDER BY srno ASC $limit");

$paginationDisplay="";
if($lastPage!="1"){
//this shows the user what page they are on and the total number of pages
$paginationDisplay.='Page<strong>'.$pn.'</strong> of'.$lastPage.'<img src="" width="48" height="1" alt="spacer"/>';

//if we are not on page 1 we can press the Back buttons

if($pn!=1){
$previous=$pn-1;
$paginationDisplay.='&nbsp; <a href='.$_SERVER['PHP_SELF'].'?pn='.$previous.'>BACK</A>';
}
// lay in the clickable numbers to display here between the bavk and next links
$paginationDisplay.='<span class="paginationNumbers">'.$centerPages.'</span>';
// if we are not on the very last page we can place the Next buttons
if($pn!=$lastPage){
$nextPage=$pn+1;
$paginationDisplay.='&nbsp; <a href='.$_SERVER['PHP_SELF'].'?pn='.$nextPage.'>NEXT</a>';
}
}
$outputList='';
while($row=mysql_fetch_array($sql2)){
$srno=$row['srno'];
$appName=$row['applicant'];
$typ=$row['typ'];
 
 echo"<table border=1>
 <tr>td>SERIAL NO<td>APPLICANT<TD>TYPE</TD></TR>";
 echo"<tr><td>".$srno."<td>".$appName."<td>".$typ."</td><tr>
 </table>";
?>
</body>
</html>