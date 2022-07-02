<?php
session_start();
if($_SESSION["vlogin_user"]) {
$dbhost = 'localhost';
$dbuser = 'root';
$dbpass = '';
$conn = mysqli_connect($dbhost, $dbuser, $dbpass);
if(! $conn )
{
die('Could not connect: ' . mysqli_error($conn));
}
mysqli_select_db($conn,'project');
$mail = $_SESSION["vlogin_user"];
$sql = "select name from vellore where regno = '$mail';";
$res = mysqli_query($conn,$sql);
$num = mysqli_fetch_assoc($res);
}?>
<html>
<head>
<title>Welcome </title>
</head>
<body>
<?php

?>
Welcome <b><?php echo $num['name']; ?></b>
 

</body>
</html>