<?php
$flag=0;
$uname = $_POST['t1'];
$phno = $_POST['t2'];
$pass = $_POST['p1'];
$cnps = $_POST['p2'];
$patt3='/^[a-zA-Z0-9]{6,12}$/';
$patt2='/^[0-9]{10}$/';
$patt1='/^[0-9]{2}[a-zA-Z]{3}[0-9]{4}$/';
function regno($patt1,$uname){
if(!preg_match($patt1,$uname)){
echo "Please enter valid User Name";
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
function pn($patt2,$phno){
if(!preg_match($patt2,$phno)){
echo "please enter the valid phone number";
return false;
}
else
	return true;
}
if(regno($patt1,$uname)){
if(pn($patt2,$phno)){
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
	mysqli_select_db($conn,'project');
$sql= "select regno,phno from chennai;";
$res = mysqli_query($conn,$sql);
while($num = mysqli_fetch_assoc($res)){
	if($num['regno'] == $uname && $num['phno'] == $phno){
		$flag = 1;
	 $sql2 = "update chennai set password = '$pass' where regno = '$uname' ;";
     $res2 = mysqli_query($conn,$sql2);
	 
	 echo "Successfully Changed!!!!";
	 }
	
}
if($flag == 0)
	echo "Invalid Credentials";
mysqli_close($conn);

}
}}}
?>