<?php 

$name = $_POST['sname'];
$regno = $_POST['regno'];
$pass = $_POST['pass'];
$gen=$_POST['g'];
$dob = $_POST['dob'];
$prg = $_POST['prg'];
$nation = $_POST['n'];
$nlg = $_POST['nlg'];
$blg = $_POST['blg'];
$eid = $_POST['eid'];
$padd = $_POST['padd'];
$pn = $_POST['p1'];
$patt1='/^[A-Za-z]{3,30}$/';
$patt2='/^[a-zA-Z]{3,20}$/';
$patt3='/^[a-zA-Z0-9]{3,12}$/';
$patt4='/^(0?[1-9]|[12][0-9]|3[01])[\/\-](0?[1-9]|1[012])[\/\-][0-9]{4}$/';
$patt5='/^[A-Za-z]{3,20}$/';
$patt6='/^[A-Za-z]{3,10}$/';
$patt7='/^[A-Za-z]{4,10}$/';
$patt8='/^[A-Za-z0-9]{5,30}$/';
$patt9='/^[0-9]{10}$/';
function name($patt1,$name){
if(!preg_match($patt1,$name)){
echo "Please enter the valid name<br>";
return false;
}
else
	return true;
}
function regno($patt2,$regno){
if(!preg_match($patt2,$regno)){
echo "Please enter valid reg_no";
}
else
	return true;
}
function pass($patt3,$pass){
if(!preg_match($patt3,$pass)){
     echo "please enter the valid password";
}
else
	return true;
	
}
function gen($gen){
if($_POST['g']=="ab"){
echo "please select valid gender";
}
else
	return true;
}
function dob($patt4,$dob){
if(!preg_match($patt4,$dob)){
echo "please enter valid date of birth";
}
else
	return true;
}

function prg($patt5,$prg){
if(!preg_match($patt5,$prg)){
echo "please enter valid program";
}
else
	return true;
}
function nation($patt6,$nation){
if(!preg_match($patt6,$nation)){
echo "Please enter valid nation";
}
else
	return true;
}
function nlg($patt7,$nlg){
if(!preg_match($patt7,$nlg)){
echo "Please enter valid language";
}
else
	return true;
}
function blg($blg){
if($_POST['blg']=="0"){
echo "please select valid blood group";
}
else
	return true;
}
function eid($eid){
if(!filter_var($eid,FILTER_VALIDATE_EMAIL)){
echo "please enter the valid email";
}
else
	return true;
}
function padd($patt8,$padd){
if(!preg_match($patt8,$padd)){
echo "please enter the valid addres";
}
else
	return true;
}
function pn($patt9,$pn){
if(!preg_match($patt9,$pn)){
echo "please enter the valid phone number";
}
else
	return true;
}



if(name($patt1,$name)){
if(regno($patt2,$regno)){
if(pass($patt3,$pass)){
if(gen($gen)){
if(dob($patt4,$dob)){
if(prg($patt5,$prg)){
if(nation($patt6,$nation)){
if(nlg($patt7,$nlg)){
if(blg($blg)){
if(eid($eid)){
if(padd($patt8,$padd)){
if(pn($patt9,$pn)){
	$dbhost = 'localhost';
$dbuser = 'root';
$dbpass = '';
$conn = mysqli_connect($dbhost, $dbuser, $dbpass);
if(! $conn )
{
die('Could not connect: ' . mysqli_error($conn));
}
	
	$sql = "insert into chennai values('$name','$regno','$pass','$gen','$dob','$prg','$nation','$nlg','$blg','$eid','$padd','$pn');";
mysqli_select_db($conn,'project');
$retval = mysqli_query( $conn,$sql );
if(! $retval )
{
die('Could not enter data: ' . mysqli_error($conn));
}
echo "Entered data successfully\n"; 
mysqli_close($conn);

}
}}}}}}}}}}}




?>










