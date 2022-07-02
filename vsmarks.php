<?php
session_start();
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
$sql = " select count(*) a from information_schema.columns where table_name = 'vellore';";
$res = mysqli_query($conn,$sql);
$a = mysqli_fetch_assoc($res);
$sql2 =  "select * from vellore";
//$sql2 = " select column_name from information_schema.columns where table_name = 'vellore';";
$res2 = mysqli_query($conn,$sql2);
//$b = mysqli_fetch_field($res2);
$sql3 = "select * from vellore where regno = '$mail'";
$res3 = mysqli_query($conn,$sql3);
$c = mysqli_fetch_array($res3);
$j=0;
while($b = mysqli_fetch_field($res2) ){
	if($j<11){
	
	$j++;}
	else 
		break;
}
for($i=12;$i<$a['a'] && $b = mysqli_fetch_field($res2);$i++){
	echo $b->name."&nbsp".$c[$i]."<br>";
}
}
?>