<html>
<head>
<title>NFSMS</TITLE>
<link rel="stylesheet" type="text/css" a href="form.css">
<link rel="stylesheet" type="text/css" a href="whole.css">
<?php include("header.php");?>
</head>

<body bgcolor="#859250">

<form method="POST" action="login.php">
USERNAME:<input type="text" name="username" pattern=[a-z]+ required maxlength="10"><br><br>
PASSWORD:<input type="password" name="pass" pattern=[a-z,1-9]+ required maxlength="7"><br><br>
<p align="center"><input type="submit" name="submit" value="ACCESS SYSTEM"></p>

<p>Want to reset your password? <a href="resetpass.php">Click here</a></p>
</form></p>

</body>
</html>