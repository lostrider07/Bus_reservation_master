<?php
$flag = 0;

	
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
    $regn = $_POST["t1"];
	$phno = $_POST["t2"];
	mysqli_select_db($conn,'project');
	$sql = "select regno,phno,password,email from vellore ;";
	$res = mysqli_query($conn,$sql);
	while($num = mysqli_fetch_assoc($res)){
	if($num['regno'] == $regn && $num['phno'] == $phno){
		$flag = 1;

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
$mail->Username = 'shai.pasha2014@vit.ac.in';

//Password to use for SMTP authentication
$mail->Password = 'imrojh786';

//Set who the message is to be sent from
$mail->setFrom('shai.pasha2014@vit.ac.in','VIT Login');

//Set an alternative reply-to address
//$mail->addReplyTo('ksravan605@gmail.com','sra1');

//Set who the message is to be sent to
$mail->addAddress($num['email']);

//Set the subject line
$mail->Subject = 'Password';

//Read an HTML message body from an external file, convert referenced images to embedded,
//convert HTML into a basic plain-text alternative body
$mail->msgHTML($num['password'], dirname(__FILE__));

//Replace the plain text body with one created manually
$mail->AltBody = 'This is a plain-text message body';

//Attach an image file


//send the message, check for errors
if (!$mail->send()) {
    echo "Mailer Error: " . $mail->ErrorInfo;
} else {
    echo "Your Password is Sent to Your Registerd Mail Address";
	
	
}
	}
	}
if($flag == 0){
  echo "Invalid Credentials";	
echo '<a href = "../../forget.html">Back';
} 
		
?>