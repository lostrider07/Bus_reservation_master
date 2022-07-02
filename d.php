<?php
session_start();
?>
<html>
<head>
<style>
ul{
list-style:none;
}
.la{
	float: left;
	margin-left : -30px;
	
}
.la a{
	text-align:center;
	display:inline;
	color:white;
	padding:13px 16px;
	text-decoration: none;
}
.la a:hover{
	text-align:left;
	display:inline;
	color:white;
	padding:11px 12px;
background-color:#283b66;
border-radius: 5px;
text-decoration:underline;
}
</style>
</head>
<body bgcolor="lightblue">
<ul style="position:fixed">
<li class="la"><a href="vhello.php" target = "c"><font size="4" color="red">Home</font></a></li></br></br>
<li class="la"><a href="vsinfo.php" target = "c"><font size="4" color="red">User Info</font></a></li></br></br>
<li class="la"><a href="vbook.html" target = "c"><font size="4" color="red">Book Ticket</font></a></li></br></br>
<li class="la"><a href="email.html" target = "c"><font size="4" color="red">E mail</font></a></li></br></br>
<li class="la"><a href="vmnforge.html" target = "c"><font size="4" color="red">Change Password</font></a></li></br></br>
<li class="la"><a href="vlogout.php" target = "_parent"><font size="4" color="red">Logout</font></a></li></br>
</ul>
</body>
<html>