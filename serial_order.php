<?php
include("conn.php");

$sql=mysql_query("select srno from register order asc");

$result=mysql_fetch_array($sql);

for each serial as $result{
	
echo serial;
}

?>