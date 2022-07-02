<?php
$flag = 0;
session_start();
$i=0;
$j=0;
$dbhost = 'localhost';
$dbuser = 'root';
$dbpass = '';
$conn = mysqli_connect($dbhost, $dbuser, $dbpass);
if(! $conn )
{
die('Could not connect: ' . mysqli_error($conn));
}
mysqli_select_db($conn,'project');
$a = $_SESSION["vflogin_user"];
$b = "select subject from faculty where facid = $a;";
$c =  mysqli_query($conn,$b);
$d = mysqli_fetch_array($c);
$sql= "select * from vellore;";
$sqla= "select * from vellore;";
$ress = mysqli_query($conn,$sqla);

$res = mysqli_query($conn,$sql);


?>
<html>
<body>
<form action = "" method = "post">
<?php
while($num = mysqli_fetch_array($res)){
	$p = "obj".$i;
	echo $num[1].":"."<input type='text' name='$p'></br></br>";
    $i++;
	
}
global $m;
$m = $i;
?>
<input type = "submit" name = "submit" value = "Submit">
</form>
</body>
</html>
<?php
extract($_POST);
if(isset($_POST['submit'])){


for($j=0;$j<$m;$j++){
	$p = "obj".$j;
	
	$row = mysqli_fetch_array($ress);
	$nae = $_POST[$p];
	$sql4 = "update vellore set $d[0] = $nae where regno = '$row[1] '";
     $resa = mysqli_query($conn,$sql4);
$flag = 1;
 
	}
if($flag == 1){
	echo "Updated Succesfully !!";
}

}
?>


