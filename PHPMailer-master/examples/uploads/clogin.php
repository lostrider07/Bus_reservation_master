<!DOCTYPE HTML>
<html>
  <head>
    <title>Chennai login</title>
    <style>
	
.error {
	color: #FF0000;
}
    .top{
    color:white;
    text-align:center;
    font-variant:bold;
    background-color:#000040;
  }
    .s1{
    margin-top:0px;
    border-style:none;
    border-color:white;
    border-width:0px;
    padding:8px
  }
  .s4{
    position:relative;
    top:150px;
    left:290px;
    font-size:25px;
    color:darkblue;
  }
  .s5{
    position: relative;
    top:200px;
    left:0px
    width: 100%;
    height: 200px;
  }
    </style>

  </head>
<body>
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
$capt = $_POST['field3'];
$a = $_SESSION['my_captcha2'];

mysqli_select_db($conn,'project');
$sql= "select regno,password from chennai;";
$res = mysqli_query($conn,$sql);
while($num = mysqli_fetch_assoc($res)){
	if($num['regno'] == $uname && $num['password'] == $pass && $a==$capt){
		
        $_SESSION["login_user"] = $num['regno'];
		
	}
	else
	$flag = "*Invalid Credentials";

}

if(isset($_SESSION["login_user"])) {
header("Location: cmnpage.html");
}

mysqli_close($conn);
}

?>


 
    <div class="top" style="position:fixed;top:0px;width:100%;left:0px;" >
      <img src="logo.png" align="left" height="90px" width="90px" style="padding-left:35%;">
      <h1 class="s1" style="padding-right:35%;">FFCS Student Login<br>(Chennai Campus)</h1>
    </div>
    <font class="s4">VIT University welcomes You to the New World of Convenience &nbsp;&nbsp;<span size="35px">FFCS</span></font>
<div class="s5">
  <form name="f1" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method = "POST">
 
  
  <center>
  <span class="error"><?php echo $flag ;?></span>
  <table border="0" style="box-shadow:5px 5px 20px black;width:30%;height:90%;background-color:skyblue;"cellpadding="3" cellspacing="5">
<tr>
<td colspan=2>
</td>
</tr>
    <tr>
      <th align="left">
        Registration No.
      </th>
      <td>
        <input type="text" style="border-radius:3px;" id="n1" name="field1" placeholder="Eg:14MSE0301" required>
      </td>
    </tr>
    <tr>
      <th align="left">
      Password
      </th>
      <td >
        <input id="password" type="password" style="border-radius:3px;" name="field2"><br>
		<input type="checkbox" onchange="document.getElementById('password').type = this.checked ? 'text' : 'password'"> Show password
      </td>
    </tr>
	<tr>
      <th align="left">
        Enter the captcha:
      </th>
      <td>
	  <?php
       create_image();
        print "<img src=image2.png?".date("U").">";
        function create_image(){

      if(isset($_SESSION['my_captcha2']))
      {
      unset($_SESSION['my_captcha2']);
      }
      $string1="abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
      $string2="1234567890";
      $string=$string1.$string2;
      $string= str_shuffle($string);
      $random_text= substr($string,0,6);
      $_SESSION['my_captcha2'] =$random_text;
      $im = @imageCreate (100,30) or die ("Cannot Initialize new GD image stream");

      $background_color = imageColorAllocate ($im, 204, 204, 204);
      $text_color = imageColorAllocate ($im, 51, 51, 255);
      imageString($im,5,5,10,$_SESSION['my_captcha2'],$text_color);
      imagePng($im,"image2.png");
      imagedestroy($im);
    }
       ?><br>
        <input type="text" style="border-radius:3px;" id="n1" name="field3" required>
      </td>
    </tr>
    <tr>
    <td colspan=2>
    </td>
    </tr>
    <tr>
      <td align="center" colspan="2">
        <input type="submit" name="submit" value="Login">
        <input type="reset" name="" value="reset">
        <a href="csignup.html">NEW USERS REGISTER HERE</a>
      </td>
    </tr>
    <tr>
      <td>
        <font size="4">Forget Password??</font>
      </td>
      <td>
        <a href="cforgpass.html"><font color="red" size="5">Click Here</font></a>
      </td>
    </tr>
  </table>
  
  
</center>
</form>
</div>
  </body>
</html>
