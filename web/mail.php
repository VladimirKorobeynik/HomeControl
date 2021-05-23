<?
require_once "../vendor/autoload.php";
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;


function sendMail(
	$host,
	$username, 
	$password, 
	$to,
	$subject,
	$body) {
	$mail = new PHPMailer(true);

	$mail->isSMTP();
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
    $mail->Host       = $host;                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = $username;                     //SMTP username
    $mail->Password   = $password;                               //SMTP password
    $mail->Port       = 25;                                    //TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

    //Recipients
    $mail->setFrom($username, $username);
    $mail->addAddress($to, $to);     //Add a recipient

    $mail->Subject = $subject;
    $mail->Body    = $body;

    $mail->send();	
}