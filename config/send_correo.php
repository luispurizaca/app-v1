<?php
require_once(__DIR__.'/conexion_bd.php');

//UTF8
header('Content-Type: text/html; charset=UTF-8');

//LIBRERIA PHPMAILER
require_once(__DIR__.'/class.phpmailer.php');
require_once(__DIR__.'/class.smtp.php');

$asunto = $_GET['asunto'];

//CORREO DE DESTINO
$email_destino = $_GET['email_destino'];

//NOMBRE DEL PACIENTE
$nombre_paciente = $_GET['nombre_paciente'];

//NOMBRE DEL PROGRAMA
$nombre_programa = $_GET['nombre_programa'];

//USUARIO
$usuario = $_GET['usuario'];

//CLAVE
$clave = $_GET['clave'];

//VALIDAR CORREO
$mail_correcto = 0;
if((strlen($email_destino) >= 6) && (substr_count($email_destino, "@") == 1) && (substr($email_destino, 0, 1) != "@") && (substr($email_destino, strlen($email_destino)-1, 1) != "@")){
if ((!strstr($email_destino, "'")) && (!strstr($email_destino, "\"")) && (!strstr($email_destino, "\\")) && (!strstr($email_destino, "\$")) && (!strstr($email_destino, " "))) {
if (substr_count($email_destino, ".") >= 1){
$term_dom = substr(strrchr($email_destino, '.'), 1);
if (strlen($term_dom) > 1 && strlen($term_dom) < 5 && (!strstr($term_dom, "@")) ){
$antes_dom = substr($email_destino, 0, strlen($email_destino) - strlen($term_dom) - 1);
$caracter_ult = substr($antes_dom,strlen($antes_dom)-1,1);
if ($caracter_ult != "@" && $caracter_ult != "."){
$mail_correcto = 1;
}
}
}
}
}
if($mail_correcto == 0){
$email_destino_final = '';
} else {
$email_destino_final = $email_destino;
}

//VALIDAR SI ES EMAIL INCORRECTO
if(empty($email_destino_final)){
?>
<!--<div class="alert" role="alert" style="background: #ff9c00; color: white; padding-left: 5pt; padding-bottom: 4pt; padding-top: 4pt; font-size: 12px;">
<button type="button" class="close" data-dismiss="alert" style="color: white; opacity: 0.8; font-weight: normal; position: relative; bottom: 1px; font-size: 18px;">&times;</button>
<i class="fa fa-warning" style="font-size: 10px;"></i>&nbsp;&nbsp;(*) Ingrese un email v&aacute;lido.
</div>-->
<?php
exit();
exit();
}

// EMAIL FROM
$sender = 'plandealimentacion@nutrikatherinealfaro.com.pe';
$senderName = 'Katherine Alfaro';

// EMAIL TO
$recipient = $email_destino;

// DATOS SMTP
$usernameSmtp = 'AKIAUKBIZMV5QZVILUPM';
$passwordSmtp = 'BKJgC3CX8pQ9hYBh0zJhBIvFlQsGPkMS+K5LhH90Wugx';
$host = 'email-smtp.us-east-1.amazonaws.com';
$port = 587;

// ASUNTO
$subject = $asunto;

$firma_nombre = 'Katherine Alfaro Alarcon';
$firma_telefono = '999999999';
$firma_email = 'katherine-alfaro@outlook.com';
$firma_cargo = 'Nutricionista';
$firma_direccion = 'Lima';

// HTML CONTENIDO DEL EMAIL
$bodyHtml = "<table style='width: 100%; padding: 10px; border-collapse: collapse;'>
<tr>
<td colspan='2' style='background: white; text-align: left;'>
<div style='text-align:center'>
<div style='text-align:center; color:#4f4f4f'>
<img src='//nutrikatherinealfaro.com.pe/app-v1/vendors/images/icono.png' width='180px'>
</div>
<h3 style='color:#4f4f4f'>Hola, ".$nombre_paciente."!</h3>
</div>
<div style='text-align:justify;color:#4f4f4f'>
<h4>Bienvenido al ".$nombre_programa."
<br>
Tu usuario: ".$usuario."
<br>
Tu clave: ".$clave."
</h4>
</div>
</td>
</tr>
<tr>
<td colspan='2' style='background-color: white'>
<p style='color: #b3b3b3 !important; font-size: 11px; text-align: center; margin: 30px 0px 0px'>Correo electr&oacute;nico enviado desde: <a href='//nutrikatherinealfaro.com.pe/' target='_blank' rel='noopener noreferrer' data-auth='NotApplicable' style='color:#95cf32; text-decoration:none'>nutrikatherinealfaro.com.pe</a></p>
</div>
</td>
</tr>
</table>";

$mail = new PHPMailer(true);

try {
// CONFIGURACIONES SMTP
$mail->isSMTP();
$mail->setFrom($sender, $senderName);
$mail->Username   = $usernameSmtp;
$mail->Password   = $passwordSmtp;
$mail->Host       = $host;
$mail->Port       = $port;
$mail->SMTPAuth   = true;
$mail->SMTPSecure = 'tls';

// DATOS DEL EMAIL
$mail->CharSet    = 'UTF-8';
$mail->isHTML(true);
$mail->addAddress($recipient);
$mail->Subject    = $subject;
$mail->Body       = $bodyHtml;

//ADJUNTAR ARCHIVO ADJUNTO
//$mail->AddAttachment($archivo_file, $archivo_file);

$mail->Send();

//ELIMINAR ARCHIVO ADJUNTO
//unlink($archivo_file);
echo "Email enviado.";
} catch (phpmailerException $e) {
echo "Ocurri&oacute; un problema. {$e->errorMessage()}", PHP_EOL; //Catch errors from PHPMailer.
} catch (Exception $e) {
echo "Email no enviado. {$mail->ErrorInfo}", PHP_EOL; //Catch errors from Amazon SES.
}