<?php
require("class.phpmailer.php");
if (isset($_POST['name'])) { $name = $_POST['name']; }
if (isset($_POST['email'])) { $email = $_POST['email']; }
if (isset($_POST['phone'])) { $phone = $_POST['phone']; }
if (isset($_POST['enquiryFor'])) { $enquiryFor = $_POST['enquiryFor']; }
if (isset($_POST['msgform'])) { $msgform = $_POST['msgform']; }

else{$msgform='';}

$body_message = 'Name: ' . $name . "\r\n".'<br>';
$body_message1 = 'Email: ' . $email . "\r\n".'<br>';
$body_message2 = 'Phone: ' . $phone . "\r\n".'<br>';
$body_message3 = 'Enquiry: ' . $enquiryFor . "\r\n".'<br>';
$body_message4 = 'Message: ' . $msgform . "\r\n".'<br>';
$mail = new PHPMailer();

$mail->IsSMTP();                                      // set mailer to use SMTP
$mail->Host = "mail.groupinestates.com";  // specify main and backup server
$mail->SMTPAuth = true;     // turn on SMTP authentication
$mail->Username = "admin@groupinestates.com";  // SMTP username
$mail->Password = "admin@123"; // SMTP password

$mail->From = "admin@runwalkanjurmarg.in";
$mail->FromName = "Enquiry From lodha-palava.city";
$mail->AddAddress("info@groupinestates.com");
               // name is optional

$mail->WordWrap = 50;                                 // set word wrap to 50 characters
/*$mail->AddAttachment("/var/tmp/file.tar.gz");         // add attachments
$mail->AddAttachment("/tmp/image.jpg", "new.jpg");    // optional name*/
$mail->IsHTML(true);                                  // set email format to HTML

$mail->Subject = "Enquiry for Lodha Codename Aquville " . $name;
$mail->Body    = $body_message . $body_message1 . $body_message2 . $body_message3 . $body_message4;
$mail->AltBody = " ";

if(!$mail->Send())
{
   echo "Message could not be sent. <p>";
   echo "Mailer Error: " . $mail->ErrorInfo;
   exit;
}
 header("Location:../thanks.php");
?>