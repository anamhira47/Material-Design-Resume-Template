<?php
/**
 * This is the standard config file for sending mail through Gmail. If you would like to change the config File visit the PHPMailer documentation for further example or uses for php. There are a plethora of other ways to use this.

 */
$_POST['name'] = $name;
$_POST['email'] = $email;
$_POST['subject'] = $subject;
$_POST['other'] = $other;
$_POST['message'] = $message ;
/**
 * This example shows settings to use when sending via Google's Gmail servers.
 */
//SMTP needs accurate times, and the PHP time zone MUST be set
//This should be done in your php.ini, but this is how to do it if you don't have access to that
date_default_timezone_set('Etc/UTC');
require '../PHPMailerAutoload.php';
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
$mail->Username = "email";
//Password to use for SMTP authentication
$mail->Password = "password";
//Set who the message is to be sent from
$mail->setFrom($email, $name);

//Set who the message is to be sent to
$mail->addAddress('your email', 'your name');
//Set the subject line
$mail->Subject = $subject;
//Read an HTML message body from an external file, convert referenced images to embedded,
//convert HTML into a basic plain-text alternative body

//Replace the plain text body with one created manually
$mail->AltBody = $message;

//Attach an image file

//send the message, check for errors
if (!$mail->send()) {
    echo "Mailer Error: " . $mail->ErrorInfo;
} else {
    echo "Message sent!";
}

header('location:/thankyou.php');

?>
