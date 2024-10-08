<?php

ini_set('display_errors', 'On');

error_reporting(E_ALL);

 

//Import PHPMailer classes into the global namespace

//These must be at the top of your script, not inside a function

 

use PHPMailer\PHPMailer\PHPMailer;

use PHPMailer\PHPMailer\SMTP;

use PHPMailer\PHPMailer\Exception;

 

require '../../PHPMailer/src/Exception.php';

require '../../PHPMailer/src/PHPMailer.php';

require '../../PHPMailer/src/SMTP.php';

 

//Create a new PHPMailer instance

$mail = new PHPMailer(true);

 

//Tell PHPMailer to use SMTP

$mail->isSMTP();

 

//Enable SMTP debugging

//SMTP::DEBUG_OFF = off (for production use)

//SMTP::DEBUG_CLIENT = client messages

 

$mail->SMTPDebug = SMTP::DEBUG_SERVER;

 

//Set the hostname of the mail server

$mail->Host = 'smtp.gmail.com';

//Use `$mail->Host = gethostbyname('smtp.gmail.com');`

//if your network does not support SMTP over IPv6,

//though this may cause issues with TLS

 

//Set the SMTP port number:

// - 465 for SMTP with implicit TLS, a.k.a. RFC8314 SMTPS or

// - 587 for SMTP+STARTTLS

$mail->Port = 465;

 

//Set the encryption mechanism to use:

// - SMTPS (implicit TLS on port 465) or

// - STARTTLS (explicit TLS on port 587)

$mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;

 

//Whether to use SMTP authentication

$mail->SMTPAuth = true;

 

//Username to use for SMTP authentication - use full email address for gmail

$mail->Username = 'alexjholmes1981@gmail.com';

 

//Password to use for SMTP authentication

$mail->Password = 'idtokhkkwgatjilx';

 

//Set who the message is to be sent from

//Note that with gmail you can only use your account address (same as `Username`)

//or predefined aliases that you have configured within your account.

//Do not use user-submitted addresses in here

$mail->setFrom('alexjholmes1981@gmail.com');

 

//Set an alternative reply-to address

//This is a good place to put user-submitted addresses

// $mailx->addReplyTo('nelson@itcareerswitch.co.uk');

 

//Set who the message is to be sent to

$mail->addAddress('alex_j_holmes@outlook.com');

//$mail->addAddress('nelson@itcareerswitch.co.uk');

 

//Set the subject line

$mail->Subject = 'PHPMailer GMail SMTP test';

 

//Read an HTML message body from an external file, convert referenced images to embedded,

//convert HTML into a basic plain-text alternative body

// $mail->msgHTML(file_get_contents('contents.html'), __DIR__);

$mail->Body = 'Main body';

 

//Replace the plain text body with one created manually

$mail->AltBody = 'This is a plain-text message body';

 

//Attach an image file

// $mail->addAttachment('images/phpmailer_mini.png');

 

header('Content-Type: application/json; charset=UTF-8');

 

//send the message, check for errors

if (!$mail->send()) {

    echo json_encode('Mailer Error: ' . $mail->ErrorInfo);

} else {

    echo json_encode('Message sent!');

   

}




?>