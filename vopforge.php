<?php
session_start();
$flag=0;
$opass = $_POST['p3'];
$pass = $_POST['p1'];
$cnps = $_POST['p2'];
$patt3='/^[a-zA-Z0-9]{6,12}$/';
$patt1='/^[0-9]{2}[a-zA-Z]{3}[0-9]{4}$/';
function opass($patt3,$opass){
if(!preg_match($patt3,$opass)){
     echo "please enter the current valid password";
	return false;
	 }
else
	return true;
	
}
function pass($patt3,$pass){
if(!preg_match($patt3,$pass)){
     echo "please enter the valid password";
	return false;
	 }
else
	return true;
	
}
function cnfpas($pass,$cnps){
	if($pass != $cnps){
		echo "Password Doesnot Match!!";
		return false;
	}
	else
		return true;
}

if(opass($patt3,$opass)){
if(pass($patt3,$pass)){
if(cnfpas($pass,$cnps)){
	$dbhost = 'localhost';
$dbuser = 'root';
$dbpass = '';
$conn = mysqli_connect($dbhost, $dbuser, $dbpass);
if(! $conn )
{
die('Could not connect: ' . mysqli_error($conn));
}
$mail = $_SESSION["vlogin_user"];
	mysqli_select_db($conn,'project');
$sql= "select password from vellore;";
$res = mysqli_query($conn,$sql);
while($num = mysqli_fetch_assoc($res)){
	if($num['password'] == $opass){
		$flag = 1;
	 $sql2 = "update vellore set password = '$pass' where regno = '$mail' ;";
     $res2 = mysqli_query($conn,$sql2);
	 
	 echo "Successfully Changed!!!!";
	 }
	
}
if($flag == 0)
	echo "Invalid Credentials";
mysqli_close($conn);

}
}}
?>