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

 

// $mail->SMTPDebug = SMTP::DEBUG_SERVER;

 

//Set the hostname of the mail server

// $mail->Host = 'smtp.gmail.com';
$mail->Host = 'localhost';

//Use `$mail->Host = gethostbyname('smtp.gmail.com');`

//if your network does not support SMTP over IPv6,

//though this may cause issues with TLS

 

//Set the SMTP port number:

// - 465 for SMTP with implicit TLS, a.k.a. RFC8314 SMTPS or

// - 587 for SMTP+STARTTLS

// $mail->Port = 465;
$mail->Port = 25;

 

//Set the encryption mechanism to use:

// - SMTPS (implicit TLS on port 465) or

// - STARTTLS (explicit TLS on port 587)

$mail->SMTPSecure = '';

 

//Whether to use SMTP authentication

// $mail->SMTPAuth = true;
$mail->SMTPAuth = false;
// $mail->SMTPAutoTLS = false;

 

//Username to use for SMTP authentication - use full email address for gmail

$mail->Username = '';

$mail->Helo = ''; 

//Password to use for SMTP authentication

// $mail->Password = '}_wIW5#Aak8#';

// GoDaddy Settings */*/*/*/*/*/*/*/*/*/*/*/*/*/*/*/*/*/*/*/*/*/
// 
// public $Host = 'localhost';

/**
* Sets the default SMTP server port.
* @var int
*/
// public $Port = 25;

/**
* Sets the SMTP HELO of the message (Default is $Hostname).
* @var string
*/
// public $Helo = '';

/**
* Sets connection prefix.
* Options are "", "ssl" or "tls"
* @var string
*/
// public $SMTPSecure = '';

/**
* Sets SMTP authentication. Utilizes the Username and Password variables.
* @var bool
*/
// public $SMTPAuth = false;

/**
* Sets SMTP username.
* @var string
*/
// public $Username = '';

/**
* Sets SMTP password.
* @var string
 */
// public $Password = '';

// */*/*/*/*/*/*/*/*/*/*/*/*/*/*/*/*/*/*/*/*/*/*/*/



//Set who the message is to be sent from

//Note that with gmail you can only use your account address (same as `Username`)

//or predefined aliases that you have configured within your account.

//Do not use user-submitted addresses in here

// $mail->setFrom('alexjholmes1981@gmail.com');
$mail->setFrom('alex@alexjholmes.co.uk');

 

//Set an alternative reply-to address

//This is a good place to put user-submitted addresses

// $mail->addReplyTo('nelson@itcareerswitch.co.uk');

 

//Set who the message is to be sent to

$mail->addAddress('alex_j_holmes@outlook.com');

//$mail->addAddress('nelson@itcareerswitch.co.uk');

 

//Set the subject line

$mail->Subject = $_POST['subject'];

 

//Read an HTML message body from an external file, convert referenced images to embedded,

//convert HTML into a basic plain-text alternative body

// $mail->msgHTML(file_get_contents('contents.html'), __DIR__);

$mail->Body = 'Message from:> ' . $_POST['name'] . '    Email address:> ' . $_POST['email'] . '      '. $_POST['message'];

 

//Replace the plain text body with one created manually

// $mail->AltBody = 'This is a plain-text message body';

 

//Attach an image file

// $mail->addAttachment('images/phpmailer_mini.png');

 

header('Content-Type: application/json; charset=UTF-8');

 

//send the message, check for errors

if (!$mail->send()) {

    echo json_encode('Mailer Error: ' . $mail->ErrorInfo);

} else {

    echo json_encode('Message Sent');

   

}




?>