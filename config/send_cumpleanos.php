<?php
//LIBRERIA PHPMAILER
require_once(__DIR__.'/class.phpmailer.php');
require_once(__DIR__.'/class.smtp.php');
require_once(__DIR__.'/conexion_bd.php');

//DATOS DEL PACIENTE
$id_paciente = (int)$_GET['id_paciente'];
$query_datos_paciente = mysqli_fetch_array(mysqli_query($con, "SELECT nombres, apellidos, correo FROM usuario WHERE id_tipo_usuario = 2 AND id = '$id_paciente' LIMIT 1"));

//NOMBRE DEL PACIENTE
$nombre_paciente = $query_datos_paciente[0];

//CORREO DE DESTINO
$email_destino = $query_datos_paciente[2];

// HTML CONTENIDO DEL EMAIL
ob_start();
?>
<table style="width: 100%; padding: 10px; border-collapse: collapse;">
<tr>
<td style="color: #111; padding: 20px; padding-left: 0; font-size: 17px; text-align: left; padding-bottom: 0px;">
Hola <b><?php echo $nombre_paciente; ?>,</b><br><br>
Nuestro equipo te desea un feliz cumplea&ntilde;os y muchos a&ntilde;os de vida llenos de felicidad y amor. Que se cumplan todos tus sue&ntilde;os.<br><br>
Feliz D&iacute;a<br><br>
Saludos<br>
Equipo ReKupera tu peso ideal by<br>
Katherine Alfaro – Nutricionista y Coach<br>
</td>
</tr>
</table>
<?php
$bodyHtml = ob_get_contents();
ob_end_clean();

//NOMBRE DEL PROGRAMA
$nombre_programa = $_GET['nombre_programa'];

//ASUNTO
$asunto = 'Feliz Cumpleaños '.$nombre_paciente.'!';

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

//EMAIL FROM
$sender = 'plandealimentacion@nutrikatherinealfaro.com.pe';
$senderName = 'Katherine Alfaro';

//EMAIL TO
$recipient = $email_destino_final;

//DATOS SMTP
$usernameSmtp = 'plandealimentacion@nutrikatherinealfaro.com.pe';
$passwordSmtp = 'pieritoperu7';
$host = 'mail.nutrikatherinealfaro.com.pe';
$port = 587;

//ASUNTO
$subject = $asunto;

$mail = new PHPMailer(true);

try {
// CONFIGURACIONES SMTP
//$mail->isSMTP();
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
//$mail->addBCC('katherine-alfaro@outlook.com');
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