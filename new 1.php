<?php
include("conn.php");
$qry=mysql_query("select COUNT(*) FROM register");
$res=mysql_fetch_row($rqy);
$numrows=$res[0];

//number of rows per pafe
$rowperpage=50;
//total pages
$totalpages=ceil($numrows/$rowsperpage);
//get the current pages
if(isset($_GET['currentpage']) && is_numeric($_GET['currentpage'])){
	
	// cast var as int
	$currentpage=(int)$_GET['currentpage'];
	
}
else{
	//default page number
	$currentpage=1;
	
}//end if

// if current page is greater than totalif

if($currentpage>$totalpages){
	//set current page to last apge
	$currentpage=$totalpages;
	
}//end if
//if current page is less than firstpage
if($currentpage<1){
	//set current page to first page
	$currentpage=1;

}//end if
//offset
$offset=($currentpage-1)*$rowperpage;

//get the info from db

$sql=mysql_query();






?>