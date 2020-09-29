<?php
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
$usernameSmtp = 'plandealimentacion@nutrikatherinealfaro.com.pe';
$passwordSmtp = 'pieritoperu7';
$host = 'mail.nutrikatherinealfaro.com.pe';
$port = 587;

// ASUNTO
$subject = $asunto;

// HTML CONTENIDO DEL EMAIL
$bodyHtml = '
<table style="width: 100%; padding: 10px; border-collapse: collapse;">
<tr>
<td style="background: white; text-align: left;">
<div style="text-align: left">
<h3 style="color:#4f4f4f">Hola '.$nombre_paciente.',</h3>
</div>
<div style="text-align: justify ;color: #4f4f4f">
Quiero agradecerte la confianza depositada en nuestros servicios, los cuales, est&aacute;n orientados a resolver tus metas personales de corto y mediano plazo.
<br><br>
Recuerda que cuanto m&aacute;s alineado est&eacute;s al mismo, lograr&aacute;s estar m&aacute;s cerca de tus objetivos personales. La disciplina es vital para lograr tus objetivos.
<br><br>
Te env&iacute;o el link, con tu usuario y contrase&ntilde;a para que puedas acceder a tu cuenta y registrar los datos solicitados:
<br><br>
<table style="width: 100%;">
<tr>
<td style="width: 25%;"></td>
<td style="width: 50%;">
<table style="width: 100%;">
<tr>
<td style="width: 50%; font-weight: bold;">Link:</td>
<td style="width: 50%; font-weight: bold;">www.nutrikatherinealfaro.com.pe</td>
</tr>
<tr>
<td style="width: 50%; font-weight: bold;">Usuario:</td>
<td style="width: 50%; font-weight: bold;">'.$usuario.'</td>
</tr>
<tr>
<td style="width: 50%; font-weight: bold;">Contrase&ntilde;a:</td>
<td style="width: 50%; font-weight: bold;">'.$clave.'</td>
</tr>
</table>
</td>
<td style="width: 25%;"></td>
</tr>
</table>
<br>
Por favor, siéntete en confianza de consultar cualquier duda que tengas.
<br><br>
Saludos<br>
<b>Katherine Alfaro</b><br>
<b>Nutricionista y Coach</b><br>
</div>
</td>
</tr>
<tr>
<td style="background-color: white">
<p style="color: #b3b3b3 !important; font-size: 11px; text-align: center; margin: 30px 0px 0px">Correo electr&oacute;nico enviado desde: <a href="//nutrikatherinealfaro.com.pe/" target="_blank" rel="noopener noreferrer" data-auth="NotApplicable" style="color:#95cf32; text-decoration:none">nutrikatherinealfaro.com.pe</a></p>
</td>
</tr>
</table>
';

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