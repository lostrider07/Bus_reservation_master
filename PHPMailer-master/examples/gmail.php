<?php
$errors = "";
session_start();

	
/**
 * This example shows settings to use when sending via Google's Gmail servers.
 */

//SMTP needs accurate times, and the PHP time zone MUST be set
//This should be done in your php.ini, but this is how to do it if you don't have access to that
date_default_timezone_set('Asia/Calcutta');

require '../PHPMailerAutoload.php';
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
	$sql = "select email from vellore where regno = '$mail';";
	$res = mysqli_query($conn,$sql);
	$num = mysqli_fetch_assoc($res);

//Create a new PHPMailer instance
$mail = new PHPMailer;

//Tell PHPMailer to use SMTP
$mail->isSMTP();

//Enable SMTP debugging
// 0 = off (for production use)
// 1 = client messages
// 2 = client and server messages
$mail->SMTPDebug = 0;

//Ask for HTML-friendly debug output
$mail->Debugoutput = 'html';

//Set the hostname of the mail server
$mail->Host = 'smtp.gmail.com';
// use
// $mail->Host = gethostbyname('smtp.gmail.com');
// if your network does not support SMTP over IPv6

//Set the SMTP port number - 587 for authenticated TLS, a.k.a. RFC4409 SMTP submission
$mail->Port = 587;

//Set the encryption system to use - ssl (deprecated) or tls
$mail->SMTPSecure = 'tls';

//Whether to use SMTP authentication
$mail->SMTPAuth = true;

//Username to use for SMTP authentication - use full email address for gmail
$mail->Username = $num['email'];

//Password to use for SMTP authentication
$mail->Password = $_POST['pass'];

//Set who the message is to be sent from
$mail->setFrom($num['email'], $_SESSION["vlogin_user"]);

//Set an alternative reply-to address
$mail->addReplyTo($num['email'], $_SESSION["vlogin_user"]);

//Set who the message is to be sent to
$mail->addAddress($_POST['email']);

//Set the subject line
$mail->Subject = $_POST['t1'];

//Read an HTML message body from an external file, convert referenced images to embedded,
//convert HTML into a basic plain-text alternative body
$mail->msgHTML($_POST['t2'], dirname(__FILE__));

//Replace the plain text body with one created manually
$mail->AltBody = 'This is a plain-text message body';

//Get the uploaded file information
$name_of_uploaded_file =
    basename($_FILES['uploaded_file']['name']);
 
//get the file extension of the file
$type_of_uploaded_file =
    substr($name_of_uploaded_file,
    strrpos($name_of_uploaded_file, '.') + 1);
 
$size_of_uploaded_file =
    $_FILES["uploaded_file"]["size"]/1024;//size in KBs
	
	//Settings
$max_allowed_file_size = 1000; // size in KB
$allowed_extensions = array("jpg", "jpeg", "gif", "bmp","png");
$upload_folder = './uploads/';
 
//Validations
if($size_of_uploaded_file > $max_allowed_file_size )
{
  $errors .= "\n Size of file should be less than $max_allowed_file_size";
}
 
//------ Validate the file extension -----
$allowed_ext = false;
for($i=0; $i<sizeof($allowed_extensions); $i++)
{
  if(strcasecmp($allowed_extensions[$i],$type_of_uploaded_file) == 0)
  {
    $allowed_ext = true;
  }
}
 
if(!$allowed_ext)
{
  $errors .= "\n The uploaded file is not supported file type. ".
  " Only the following file types are supported: ".implode(',',$allowed_extensions);
}

//copy the temp. uploaded file to uploads folder
$path_of_uploaded_file = $upload_folder . $name_of_uploaded_file;
$tmp_path = $_FILES["uploaded_file"]["tmp_name"];
 
if(is_uploaded_file($tmp_path))
{
  if(!copy($tmp_path,$path_of_uploaded_file))
  {
    $errors .= '\n error while copying the uploaded file';
  }
}

//Attach an image file
$mail->addAttachment($path_of_uploaded_file);

//send the message, check for errors
if (!$mail->send()) {
    echo "Mailer Error: " . $mail->ErrorInfo;
} else {
    echo "Message sent!";
	
	
}
?>