<?php
$flag = "";
session_start();
extract($_POST);
if(isset($_POST['submit'])){
$dbhost = 'localhost';
$dbuser = 'root';
$dbpass = '';
$conn = mysqli_connect($dbhost, $dbuser, $dbpass);

if(! $conn )
{
die('Could not connect: ' . mysqli_error($conn));
}
$uname = $_POST['field1'];
$pass = $_POST['field2']; 
$capt = $_REQUEST['field3'];
$a = $_SESSION['my_captcha'];
mysqli_select_db($conn,'project');
$sql= "select regno,password from vellore;";
$res = mysqli_query($conn,$sql);
while($num = mysqli_fetch_assoc($res)){
	if($num['regno'] == $uname && $num['password'] == $pass && $a==$capt){
		
        $_SESSION["vlogin_user"] = $num['regno'];
		
	}
	else
	$flag = "*Invalid Credentials";
}

if(isset($_SESSION["vlogin_user"])) {
header("Location: vmnpage.html");
}

mysqli_close($conn);
}

?>
<html>
<head>
<title>Vellore login</title>
<style type="text/css">
.error {color: #FF0000;
}
.s2{
color:white;
text-align:center;
font-variant:bold;
background-color:#16e5c3;
}
.s3{
margin-top:0px;
border-style:none;
border-color:white;
border-width:0px;
padding:8px
}
table{
  margin-top:2px;
  border-style:solid;
  border-color:red;
  width:30%;
  position:fixed;
  top:150px;
  left:35%;
}
.button{
    background-color:white;
    color: lightblue;
    border: 1px solid white;
    padding: 6px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin: 4px 2px;
    cursor: pointer;
    border-radius: 4px;
}
.button:hover{
  background-color:lightblue;
  color: white;
}
</style>
<script type="text/javascript">

</script>
</head>
<body>
<div class="s2" style="position:fixed;top:0px;width:100%;left:0px;" >
<h1 class="s3">Bus Booking</h1>
</div>

<div style="background-color:lightgray;border:1px solid black;position:fixed;top:149px;left:34%;height:240px;padding:5px;width:29.5%;">
<form name="f1" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method = "POST">

<table align="center" border="0" width="100" height="200" cellpadding="5" style="right:16%;left:14.5%" >
<tr bgcolor="gray" >
<th colspan="2">
</th>
</tr>
<tr>
<th align="left" bgcolor="gray"><font color="black">User id.</font></th>
<td bgcolor="lightpink">
<input type="text" name="field1" size="25px" id="n1" placeholder="Eg:Gowtham" required></td>
</tr>
<tr>
<th align="left" bgcolor="gray"><font color="black">Password</font></th>
<td bgcolor="lightpink">
<input id="password" type="password" name="field2" size="25px">
<br><input type="checkbox" onchange="document.getElementById('password').type = this.checked ? 'text' : 'password'"> <span align="left"> Show password </span><br>
</td>
</tr>
<tr>
<br>
<input type="text" name="field3" size="25px">

</td>
</tr>
<tr>
<td colspan="2" bgcolor="gray" bgcolor="lightgray">
<center><input class="button" type="submit" name="submit" value="Login">&nbsp;&nbsp;
<input class="button" type="reset" name="button2">
<a href="akh.html">NEW USERS REGISTER HERE</a> </center></td>
</tr>
</table>

</form>
</div>

<div style=" position:fixed;top:355px;text-align:center;left:38%;color:red;">
<h3>Forgot password?? &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="forget.html">Click Here</a></h3>
</div>
<span class="error"><?php echo $flag ;?></span>
<div class="s2" style="position:fixed;top:500px;left:0px;width:100%">
<h1 class="s3" >

Copyright@2016
</h1>
</div>
</body>
</html>
