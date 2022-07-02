<?php
$name=$regno=$gender=$dob=$prog=$nation=$lang=$bg=$email=$addr=$phno="";
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
$sql = "select * from vellore where regno = '$mail';";
$res = mysqli_query($conn,$sql);
$num = mysqli_fetch_assoc($res);
$name = $num['name'];
$regno = $num['regno'];
$gender = $num['gender'];
$dob = $num['dob'];
$prog = $num['program'];
$nation = $num['nation'];
$lang = $num['lang'];
$bg = $num['bg'];
$email = $num['email'];
$addr = $num['addr'];
$phno = $num['phno'];
mysqli_close($conn);
?>
<html>
<head>
<style>
.lab{
      font-family: "Arial";
      font-weight: bold;
      font-size: 16;
    }
</style>
</head>
<body>
<table>
<tr>
<td>
<label class="lab" for="name">Name :</td> <td></td><td><?php echo $name ;?></td></label>
</tr>
<tr>
<td>
<label class="lab">Registration No :</td> <td></td><td><?php echo $regno ;?></td></label>
</tr>
<tr>
<td>
<label class="lab">Gender :</td> <td></td><td><?php echo $gender ;?></td></label>
</tr>
<tr>
<td>
<label class="lab">Date Of Birth :</td> <td></td><td><?php echo $dob ;?></td></label>
</tr>
<tr>
<td>
<label class="lab">Program :</td><td></td> <td><?php echo $prog ;?></td></label>
</tr>
<tr>
<td>
<label class="lab">Nation :</td> <td> &nbsp</td><td><?php echo $nation ;?></td></label>
</tr>
<tr>
<td>
<label class="lab">Language :</td> <td></td><td><?php echo $lang ;?></td></label>
</tr>
<tr>
<td>
<label class="lab">Blood Group :</td> <td></td><td><?php echo $bg ;?></td></label>
</tr>
<tr>
<td>
<label class="lab">Email :</td> <td></td><td><?php echo $email ;?></td></label>
</tr>
<tr>
<td>
<label class="lab">Address :</td> <td></td><td><?php echo $addr ;?></td></label>
</tr>
<tr>
<td>
<label class="lab">Mobile No :</td> <td></td><td><?php echo $phno ;?></td></label>
</tr>
</table>
</body>
</html>