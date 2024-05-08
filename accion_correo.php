<?php
$dir = dirname(__FILE__);
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require $dir . '/PHPMailer-master/src/Exception.php';
require $dir . '/PHPMailer-master/src/PHPMailer.php';
require $dir . '/PHPMailer-master/src/SMTP.php';

function enviarCorreo($destinatario, $asunto, $mensaje) {
    $mail = new PHPMailer(true);

    try {
        // Configuración del servidor SMTP de Gmail
        $mail->isSMTP();
        $mail->Host = ' smtp.office365.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'e.bolivia@hotmail.com';
        $mail->Password = 'fiigfixagpnamjuu';
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;

        // Destinatario y asunto
        $mail->setFrom('e.bolivia@hotmail.com', 'Electro Led');
        $mail->addAddress($destinatario);
        $mail->Subject = $asunto;

        // Contenido del correo
        $mail->isHTML(true);
        $mail->Body = $mensaje;

        // Enviar el correo
        $mail->send();
        return true;
    } catch (Exception $e) {
        echo 'Error al enviar el correo: ' . $mail->ErrorInfo;
        return false;
    }
}
?>
