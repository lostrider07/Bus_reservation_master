<?php
session_start();
unset($_SESSION["vlogin_user"]);

header("Location: vlogin.php");
?>