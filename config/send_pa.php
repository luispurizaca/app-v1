<?php
//LIBRERIA PHPMAILER
require_once(__DIR__.'/class.phpmailer.php');
require_once(__DIR__.'/class.smtp.php');
require_once(__DIR__.'/conexion_bd.php');

//ID PLAN
$id_plan = (int)$_GET['id'];
$row_plan_alimentacion = mysqli_fetch_array(mysqli_query($con, "SELECT * FROM plan_alimentacion WHERE id = '$id_plan' LIMIT 1"));

$tipo_plan = (int)$row_plan_alimentacion['tipo_plan'];
if($tipo_plan == 1){
$style_pa = 'display: none;';
} else {
$style_pa = '';
}
$codigo_registro = $letra_add.(((int)substr($row_plan_alimentacion['codigo'], 2, 100)) + 1);

$horario_1 = $row_plan_alimentacion['horario_1'];
$horario_2 = $row_plan_alimentacion['horario_2'];
$hora_desayuno = $row_plan_alimentacion['hora_desayuno'];
$hora_media_manana = $row_plan_alimentacion['hora_media_manana'];
$hora_almuerzo = $row_plan_alimentacion['hora_almuerzo'];
$hora_media_tarde = $row_plan_alimentacion['hora_media_tarde'];
$hora_cena = $row_plan_alimentacion['hora_cena'];

$uno_opcion_1_desayuno = $row_plan_alimentacion['1_opcion_1_desayuno'];
$uno_opcion_2_desayuno = $row_plan_alimentacion['1_opcion_2_desayuno'];
$uno_opcion_1_media_manana = $row_plan_alimentacion['1_opcion_1_media_manana'];
$uno_opcion_2_media_manana = $row_plan_alimentacion['1_opcion_2_media_manana'];
$uno_opcion_1_almuerzo = $row_plan_alimentacion['1_opcion_1_almuerzo'];
$uno_opcion_2_almuerzo = $row_plan_alimentacion['1_opcion_2_almuerzo'];
$uno_opcion_1_media_tarde = $row_plan_alimentacion['1_opcion_1_media_tarde'];
$uno_opcion_2_media_tarde = $row_plan_alimentacion['1_opcion_2_media_tarde'];
$uno_opcion_1_cena = $row_plan_alimentacion['1_opcion_1_cena'];
$uno_opcion_2_cena = $row_plan_alimentacion['1_opcion_2_cena'];

$dos_opcion_1_desayuno = $row_plan_alimentacion['2_opcion_1_desayuno'];
$dos_opcion_2_desayuno = $row_plan_alimentacion['2_opcion_2_desayuno'];
$dos_opcion_1_media_manana = $row_plan_alimentacion['2_opcion_1_media_manana'];
$dos_opcion_2_media_manana = $row_plan_alimentacion['2_opcion_2_media_manana'];
$dos_opcion_1_almuerzo = $row_plan_alimentacion['2_opcion_1_almuerzo'];
$dos_opcion_2_almuerzo = $row_plan_alimentacion['2_opcion_2_almuerzo'];
$dos_opcion_1_media_tarde = $row_plan_alimentacion['2_opcion_1_media_tarde'];
$dos_opcion_2_media_tarde = $row_plan_alimentacion['2_opcion_2_media_tarde'];
$dos_opcion_1_cena = $row_plan_alimentacion['2_opcion_1_cena'];
$dos_opcion_2_cena = $row_plan_alimentacion['2_opcion_2_cena'];

$fecha_plan = date('Y-m-d', strtotime($row_plan_alimentacion['fecha_envio']));
$title_2 = $horario_1;
$title_3 = $horario_2;

//DATOS DEL PACIENTE
$id_paciente = (int)$row_plan_alimentacion['id_paciente'];
$query_datos_paciente = mysqli_fetch_array(mysqli_query($con, "SELECT nombres, apellidos, correo FROM usuario WHERE id_tipo_usuario = 2 AND id = '$id_paciente' LIMIT 1"));

//NOMBRE DEL PACIENTE
$nombre_paciente = $query_datos_paciente[0].' '.$query_datos_paciente[1];

//CORREO DE DESTINO
$email_destino = $query_datos_paciente[2];

// HTML CONTENIDO DEL EMAIL
ob_start();
?>
<table style="width: 100%; padding: 10px; border-collapse: collapse;">
<tr>
<td style="color: #111; padding: 20px; padding-left: 0; font-size: 17px; text-align: left; padding-bottom: 0px;" colspan="2">
Hola <b><?php echo $nombre_paciente; ?>,</b><br><br>
Recuerda que un cuerpo sano posee una mente.<br><br>

<?php
if($tipo_plan == 1){
?>
Te env&iacute;o tu plan detox que debes realizarlo el d&iacute;a <?php echo $fecha_plan; ?>.<br><br>
<?php
} else {
?>
Te env&iacute;o tu plan de alimentaci�n de la semana. Para obtener mejores resultados realizarlo en un 100%..<br><br>
<?php
}
?>
Cualquier consulta, no dudes en escribirme<br><br>
Saludos<br>
Equipo ReKupera tu peso ideal by<br>
Katherine Alfaro � Nutricionista y Coach<br>
</td>
</tr>
<tr>
<td style="color: #111; padding: 20px; padding-left: 0; font-size: 17px; text-align: left; padding-top: 15px;" colspan="2"><b>Fecha: <?php echo $fecha_plan; ?></b></td>
</tr>
<tr>
<td style="color: #111; background: #95cf32; text-align: center; padding: 20px; font-size: 17px; border: 1px solid #95cf32;">
<?php echo $title_1; ?>
</td>
<td style="color: #111; background: #95cf32; text-align: center; padding: 20px; font-size: 17px; border: 1px solid #95cf32;">
<?php echo $title_2; ?>
</td>
<td style="color: #111; background: #95cf32; text-align: center; padding: 20px; font-size: 17px; border: 1px solid #95cf32; <?php echo $style_pa; ?>">
<?php echo $title_3; ?>
</td>
</tr>
<tr>
<td style="vertical-align: middle; padding: 20px; text-align: center; border: 1px solid #95cf32;">
<b style="font-size: 17px;">DESAYUNO<br><?php echo $hora_desayuno; ?></b>
</td>
<td style="vertical-align: middle; padding: 20px; text-align: left; border: 1px solid #95cf32;">
<table style="width: 100%; margin: 0 auto;">
<tr>
<td style="width: 20%; text-align: center;">
<b>Opci&oacute;n 1:</b>
</td>
<td style="width: 80%;">
<?php echo $uno_opcion_1_desayuno; ?>
</td>
</tr>
<tr>
<td style="width: 20%; text-align: center;">
<b>Opci&oacute;n 2:</b>
</td>
<td style="width: 80%;">
<?php echo $uno_opcion_2_desayuno; ?>
</td>
</tr>
</table>
</td>
<td style="vertical-align: middle; padding: 20px; text-align: left; border: 1px solid #95cf32; <?php echo $style_pa; ?>">
<table style="width: 100%; margin: 0 auto;">
<tr>
<td style="width: 20%; text-align: center;">
<b>Opci&oacute;n 1:</b>
</td>
<td style="width: 80%;">
<?php echo $dos_opcion_1_desayuno; ?>
</td>
</tr>
<tr>
<td style="width: 20%; text-align: center;">
<b>Opci&oacute;n 2:</b>
</td>
<td style="width: 80%;">
<?php echo $dos_opcion_2_desayuno; ?>
</td>
</tr>
</table>
</td>
</tr>
<tr>
<td style="vertical-align: middle; padding: 10px; text-align: center; background: #E9E555; border: 1px solid #95cf32;">
<b style="font-size: 12px;">MEDIA MA&Ntilde;ANA<br><?php echo $hora_media_manana; ?></b>
</td>
<td style="vertical-align: middle; padding: 20px; text-align: center; background: #E9E555; border: 1px solid #95cf32;">
<table style="width: 100%; margin: 0 auto;">
<tr>
<td style="width: 20%; text-align: center;"></td>
<td style="width: 80%;">
<?php echo $uno_opcion_1_media_manana; ?>
</td>
</tr>
</table>
</td>
<td style="vertical-align: middle; padding: 20px; text-align: center; background: #E9E555; border: 1px solid #95cf32; <?php echo $style_pa; ?>">
<table style="width: 100%; margin: 0 auto;">
<tr>
<td style="width: 20%; text-align: center;"></td>
<td style="width: 80%;">
<?php echo $dos_opcion_1_media_manana; ?>
</td>
</tr>
</table>
</td>
</tr>
<tr>
<td style="vertical-align: middle; padding: 20px; text-align: center; border: 1px solid #95cf32;">
<b style="font-size: 17px;">ALMUERZO<br><?php echo $hora_almuerzo; ?></b>
</td>
<td style="vertical-align: middle; padding: 20px; text-align: left; border: 1px solid #95cf32;">
<table style="width: 100%; margin: 0 auto;">
<tr>
<td style="width: 20%; text-align: center;">
<b>Opci&oacute;n 1:</b>
</td>
<td style="width: 80%;">
<?php echo $uno_opcion_1_almuerzo; ?>
</td>
</tr>
<tr>
<td style="width: 20%; text-align: center;">
<b>Opci&oacute;n 2:</b>
</td>
<td style="width: 80%;">
<?php echo $uno_opcion_2_almuerzo; ?>
</td>
</tr>
</table>
</td>
<td style="vertical-align: middle; padding: 20px; text-align: left; border: 1px solid #95cf32; <?php echo $style_pa; ?>">
<table style="width: 100%; margin: 0 auto;">
<tr>
<td style="width: 20%; text-align: center;">
<b>Opci&oacute;n 1:</b>
</td>
<td style="width: 80%;">
<?php echo $dos_opcion_1_almuerzo; ?>
</td>
</tr>
<tr>
<td style="width: 20%; text-align: center;">
<b>Opci&oacute;n 2:</b>
</td>
<td style="width: 80%;">
<?php echo $dos_opcion_2_almuerzo; ?>
</td>
</tr>
</table>
</td>
</tr>
<tr>
<td style="vertical-align: middle; padding: 10px; text-align: center; background: #E9E555; border: 1px solid #95cf32;">
<b style="font-size: 12px;">MEDIA TARDE<br><?php echo $hora_media_tarde; ?></b>
</td>
<td style="vertical-align: middle; padding: 10px; text-align: center; background: #E9E555; border: 1px solid #95cf32;">
<?php echo $uno_opcion_1_media_tarde; ?>
</td>
<td style="vertical-align: middle; padding: 10px; text-align: center; background: #E9E555; border: 1px solid #95cf32; <?php echo $style_pa; ?>">
<?php echo $dos_opcion_1_media_tarde; ?>
</td>
</tr>
<tr>
<td style="vertical-align: middle; padding: 20px; text-align: center; border: 1px solid #95cf32;">
<b style="font-size: 17px;">CENA<br><?php echo $hora_cena; ?></b>
</td>
<td style="vertical-align: middle; padding: 20px; text-align: left; border: 1px solid #95cf32;">
<table style="width: 100%; margin: 0 auto;">
<tr>
<td style="width: 20%; text-align: center;">
<b>Opci&oacute;n 1:</b>
</td>
<td style="width: 80%;">
<?php echo $uno_opcion_1_cena; ?>
</td>
</tr>
<tr>
<td style="width: 20%; text-align: center;">
<b>Opci&oacute;n 2:</b>
</td>
<td style="width: 80%;">
<?php echo $uno_opcion_2_cena; ?>
</td>
</tr>
</table>
</td>
<td style="vertical-align: middle; padding: 20px; text-align: left; border: 1px solid #95cf32; <?php echo $style_pa; ?>">
<table style="width: 100%; margin: 0 auto;">
<tr>
<td style="width: 20%; text-align: center;">
<b>Opci&oacute;n 1:</b>
</td>
<td style="width: 80%;">
<?php echo $dos_opcion_1_cena; ?>
</td>
</tr>
<tr>
<td style="width: 20%; text-align: center;">
<b>Opci&oacute;n 2:</b>
</td>
<td style="width: 80%;">
<?php echo $dos_opcion_2_cena; ?>
</td>
</tr>
</table>
</td>
</tr>
</table>
<?php
$bodyHtml = ob_get_contents();
ob_end_clean();

//NOMBRE DEL PROGRAMA
$nombre_programa = $_GET['nombre_programa'];

//ASUNTO
if($tipo_plan == 1){
$asunto = 'Programa ReKupera tu peso ideal � Plan Detox';
} else {
$asunto = 'Programa ReKupera tu peso ideal � Plan de Alimentaci�n';
}

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
mysqli_query($con, "UPDATE plan_alimentacion SET estado_envio = 1 WHERE id = '$id_plan' LIMIT 1");
} catch (phpmailerException $e) {
echo "Ocurri&oacute; un problema. {$e->errorMessage()}", PHP_EOL; //Catch errors from PHPMailer.
} catch (Exception $e) {
echo "Email no enviado. {$mail->ErrorInfo}", PHP_EOL; //Catch errors from Amazon SES.
}