<?php 
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

/* Clase Exception */
require 'PHPMailer\src\Exception.php';

/* Clase principal de PHPMailer */
require 'PHPMailer\src\PHPMailer.php';

/* Clase SMTP, necesaria si quieres usar SMTP */
require 'PHPMailer\src\SMTP.php';

$imagenCodificada = $_POST["imagen"];
$imagenCodificadaLimpia = str_replace("data:image/png;base64,", "", $imagenCodificada);
$imagenDecodificada = base64_decode($imagenCodificadaLimpia);
$nombreImagenGuardada = $_SERVER['DOCUMENT_ROOT'] ."/VIGO/letrero/letrero/img/"."/imagen_" . uniqid() . ".png";
file_put_contents($nombreImagenGuardada, $imagenDecodificada);

$mail = new PHPMailer(true);
$mail->CharSet = 'utf-8';
$mail->Host = "smtp.gmail.com";
$mail->SetFrom('estel@gmail.com', 'Esteban Lucas Martinez');
$mail->IsSMTP();
$mail->SMTPAuth = true;
$mail->Username = "estelukas2@gmail.com";
$mail->Password = "slyo aqez hoxw qcfv";
$mail->SMTPSecure = "tls";
$mail->Port = 587;
$mail->AddAddress("estelukas3@gmail.com","Esteban Lucas f");
$mail->SMTPDebug  = 1;   //Muestra las trazas del mail, 0 para ocultarla
$mail->isHTML(true);
$mail->AddEmbeddedImage($nombreImagenGuardada, "imag", $nombreImagenGuardada);
$mail->Name ="Esteban Lucas";                         // Set email format to HTML
$mail->Subject = 'Here is the subject';
$mail->Body    = '
<p><span style="font-size:14px"><strong>Hola, este es un nuevo correo desde la p&aacute;gina de prueba.</strong></span></p>

<p><span style="font-size:18px"><strong>Han solicitado un nuevo dise&ntilde;o como la siguiente imagen.</strong></span></p>
<br>

<img alt="PHPMailer" src="cid:imag">';
$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

/*if ($archivoName != "") {
 $mail->AddAttachment($archivoTemp, $archivoName);
}*/
if(!$mail->send()) {
 echo 'Message could not be sent.';
 echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
 echo 'Message has been sent';
}
?>