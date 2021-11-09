<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

require '../PHPMailer/Exception.php';
require '../PHPMailer/PHPMailer.php';
require '../PHPMailer/SMTP.php';

$mail = new PHPMailer(true);

$correo = $_POST['correo'];
$nombre = $_POST['nombre'];
$mensaje = $_POST['mensaje'];

try {

    $mail->SMTPDebug = SMTP::DEBUG_SERVER;
    $mail->isSMTP();

    $mail->Host       = 'smtp.gmail.com';
    $mail->SMTPAuth   = true;
    $mail->Username   = 'Johans08lol@gmail.com';
   	$mail->Password   = 'chancho8808VD;';
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
    $mail->Port       = 465;

    //Recipients

    $mail->setFrom('Johans08lol@gmail.com', 'Johans'); // De
    $mail->addAddress('Johans08lol@gmail.com', 'Johans'); // Para
    $mail->addAddress($correo, $nombre); // Para

    //Content
    $mail->isHTML(true);
    $mail->Subject = 'Nuevo mensaje desde formulario';
    $mail->Body    = 'Ha recibido un nuevo mensaje desde el formulario de contacto <br>';
    $mail->Body    .= "<b>Nombre: </b> {$nombre} <br>";
    $mail->Body    .= "<b>Correo: </b> {$correo} <br>";
    $mail->Body    .= "<b>Mensaje: </b> {$mensaje}";

    $mail->send();

    echo 1;
} catch (Exception $e) {
    echo 0;
}




