<?php

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;
    
    //Load Composer's autoloader
    require '../config/vendor/autoload.php';
    
    //Create an instance; passing `true` enables exceptions
function sendMail()
{
    $mail = new PHPMailer(true);
    $msg = $_POST['message'];
    try {

        $mail->isSMTP(); //Send using SMTP
        $mail->CharSet = 'UFT-8';
        $mail->Host = ''; //Set the SMTP server to send through
        $mail->SMTPAuth = true; //Enable SMTP authentication
        $mail->Username = ''; //SMTP username
        $mail->Password = ''; //SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS; //Enable implicit TLS encryption
        $mail->Port = 465; //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
    	$mail->CharSet = 'UTF-8';
        //Recipients
        $mail->setFrom('');
        $mail->addAddress('v.parrot@garageparrot.fr'); //Add a recipient
        
        //Content
        $mail->isHTML(true); //Set email format to HTML
        $mail->Subject = 'Formulaire contact';
        $mail->Body = "$msg";
        //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

        $mail->send();

?>  <?php

        echo '<script>alert("Votre formulaire à bien été envoyé");</script>';
    } catch (Exception $e) {
        echo "<script>alert('Votre formulaire n'a pas été envoyé, erreur :{$mail->ErrorInfo}');</script>";
    }
}
    
