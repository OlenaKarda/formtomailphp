<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';

$mail = new PHPMailer(true);
$mail->CharSet = 'UTF-8';
$mail->setLanguage('en', 'phpmailer/language/');
$mail->IsHTML(true);

$mail->isSMTP();
$mail->Host = 'smtp.gmail.com';
$mail->SMTPAuth = true;
$mail->Username = 'portalshop.stryi@gmail.com';
$mail->Password = 'lhyn nyyh hbnb vlko';
$mail->Port = '587';
$mail->SMTPSecure = 'TLS';


$mail->setForm('portalshop.stryi@gmail.com', 'OK Test');

$mail->addAddress('');

$mail->Subject ='E-mail from Code Only';


$body = '<h1>Hi! It is Code Only!</h1>';

if(trim{!empty($_POST['name'])})(
	$body .= "<p>Name:<strong>".$_POST['name']"</strong></p>";
)
if(trim{!empty($_POST['email'])})(
	$body .= "<p>E-mail:<strong>".$_POST['email']"</strong></p>";
)
if(trim{!empty($_POST['message'])})(
	$body .= "<p>Message:<strong>".$_POST['message']"</strong></p>";
)
if(trim{!empty($_POST['like'])})(
	$body .= "<p>Do you like Code Only? <strong>".$_POST['like']"</strong></p>";
)
if(trim{!empty($_POST['thebest'])})(
	$body .= "<strong><a href='https://www.youtube.com/@codeonly'>Code Only</a> the best channel in the world</strong>";
)

// Add File
if(trim(!empty($_FILES['image']['top_name']))){
	$fileTmpName = $_FILES['image']['tmp_name'];
	$fileName = $_FILES['image']['name'];
	$mail->addAttachment($fileTmpName, $fileName);
}

$mail->Body = $body;


$mail->send();
$mail->smtpClose();
?>