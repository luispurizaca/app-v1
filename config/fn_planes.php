<?php
function html_plan($id_plan){
global $con;

$row_plan_alimentacion = mysqli_fetch_array(mysqli_query($con, "SELECT * FROM plan_alimentacion WHERE id = '$id_plan' LIMIT 1"));

$tipo_plan = (int)$row_plan_alimentacion['tipo_plan'];
$codigo_registro = $row_plan_alimentacion['codigo'];

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

$fecha_plan = date('d/m/Y', strtotime($row_plan_alimentacion['fecha_envio']));
$title_2 = $horario_1;
$title_3 = $horario_2;

//DATOS DEL PACIENTE
$id_paciente = (int)$row_plan_alimentacion['id_paciente'];
$query_datos_paciente = mysqli_fetch_array(mysqli_query($con, "SELECT nombres, apellidos, correo FROM usuario WHERE id_tipo_usuario = 2 AND id = '$id_paciente' LIMIT 1"));

//NOMBRE DEL PACIENTE
$nombre_paciente = $query_datos_paciente[0].' '.$query_datos_paciente[1];

//HTML
ob_start();
?>
<!-- PRIMERA PAGINA -->
<div id="headerContent" style="padding-left: 30px;">
<img src="http://www.nutrikatherinealfaro.com.pe/app-v1/vendors/images/logo-completo.png" style="width: 150px; height: auto;">
</div>
<table style="width: 100%; padding: 10px; border-collapse: collapse; background-image: url(../../../vendors/images/marca-agua.png); background-size: contain; background-position: right; background-repeat: no-repeat;">
<tr>
<td style="vertical-align: top; width: 100%; height: 850px;">
<!-- CONTENIDO -->
<?php
if($tipo_plan == 1){
?>

<?php
} else {
?>
<table style="width: 100%; padding: 10px; border-collapse: collapse;">
<tr>
<td style="width: 20%; color: #111; font-weight: bold; text-align: center; padding: 10px; font-size: 12px; margin-top: 0; padding-top: 0;">
Inicio: <?php echo $fecha_plan; ?>
</td>
<td style="width: 40%; color: #111; font-weight: bold; text-align: center; padding: 10px; font-size: 12px; margin-top: 0; padding-top: 0;">
Nombre: <?php echo $nombre_paciente; ?>
</td>
<td style="width: 40%; color: #111; font-weight: bold; text-align: center; padding: 10px; font-size: 12px; margin-top: 0; padding-top: 0;">
Prox. Cita: <?php echo $fecha_plan; ?>
</td>
</tr>
<tr>
<td style="width: 20%; color: #111; font-weight: bold; background: #95cf32; text-align: center; padding: 10px; font-size: 14px; border: 1px solid #95cf32;">
Horario
</td>
<td style="width: 40%; color: #111; font-weight: bold; background: #95cf32; text-align: center; padding: 10px; font-size: 14px; border: 1px solid #95cf32;">
<?php echo $title_2; ?>
</td>
<td style="width: 40%; color: #111; font-weight: bold; background: #95cf32; text-align: center; padding: 10px; font-size: 14px; border: 1px solid #95cf32;">
<?php echo $title_3; ?>
</td>
</tr>
<tr>
<td style="width: 20%; vertical-align: middle; padding: 20px; text-align: center; border: 1px solid #95cf32;">
<b style="font-size: 14px;">DESAYUNO</b><br>
<span style="font-size: 14px;"><?php echo $hora_desayuno; ?></span>
</td>
<td style="width: 40%; vertical-align: middle; padding: 20px; text-align: left; border: 1px solid #95cf32;">
<br><br>
<b style="font-size: 13px;">Opci&oacute;n 1:</b><br>
<span style="font-size: 13px;"><?php echo $uno_opcion_1_desayuno; ?></span><br><br>
<b style="font-size: 13px;">Opci&oacute;n 2:</b><br>
<span style="font-size: 13px;"><?php echo $uno_opcion_2_desayuno; ?></span><br><br>
</td>
<td style="width: 40%; vertical-align: middle; padding: 20px; text-align: left; border: 1px solid #95cf32;">
<br><br>
<b style="font-size: 13px;">Opci&oacute;n 1:</b><br>
<span style="font-size: 13px;"><?php echo $dos_opcion_1_desayuno; ?></span><br><br>
<b style="font-size: 13px;">Opci&oacute;n 2:</b><br>
<span style="font-size: 13px;"><?php echo $dos_opcion_2_desayuno; ?></span><br><br>
</td>
</tr>
<tr>
<td style="width: 20%; vertical-align: middle; padding: 20px; text-align: center; background: #E9E555;">
<b style="font-size: 12px;">MEDIA MA&Ntilde;ANA</b><br>
<span style="font-size: 12px;"><?php echo $hora_media_manana; ?></span>
</td>
<td style="width: 40%; vertical-align: middle; padding: 20px; text-align: center; background: #E9E555;">
<span style="font-size: 13px;"><?php echo $uno_opcion_1_media_manana; ?></span>
</td>
<td style="width: 40%; vertical-align: middle; padding: 20px; text-align: center; background: #E9E555;">
<span style="font-size: 13px;"><?php echo $dos_opcion_1_media_manana; ?></span>
</td>
</tr>
<tr>
<td style="width: 20%; vertical-align: middle; padding: 20px; text-align: center; border: 1px solid #95cf32;">
<b style="font-size: 14px;">ALMUERZO</b><br>
<span style="font-size: 14px;"><?php echo $hora_almuerzo; ?></span>
</td>
<td style="width: 40%; vertical-align: middle; padding: 20px; text-align: left; border: 1px solid #95cf32;">
<br><br>
<b style="font-size: 13px;">Opci&oacute;n 1:</b><br>
<span style="font-size: 13px;"><?php echo $uno_opcion_1_almuerzo; ?></span><br><br>
<b style="font-size: 13px;">Opci&oacute;n 2:</b><br>
<span style="font-size: 13px;"><?php echo $uno_opcion_2_almuerzo; ?></span><br><br>
</td>
<td style="width: 40%; vertical-align: middle; padding: 20px; text-align: left; border: 1px solid #95cf32;">
<br><br>
<b style="font-size: 13px;">Opci&oacute;n 1:</b><br>
<span style="font-size: 13px;"><?php echo $dos_opcion_1_almuerzo; ?></span><br><br>
<b style="font-size: 13px;">Opci&oacute;n 2:</b><br>
<span style="font-size: 13px;"><?php echo $dos_opcion_2_almuerzo; ?></span><br><br>
</td>
</tr>
<tr>
<td style="width: 20%; vertical-align: middle; padding: 20px; text-align: center; background: #E9E555;">
<b style="font-size: 12px;">MEDIA TARDE</b><br>
<span style="font-size: 12px;"><?php echo $hora_media_tarde; ?></span>
</td>
<td style="width: 40%; vertical-align: middle; padding: 20px; text-align: center; background: #E9E555;">
<span style="font-size: 13px;"><?php echo $uno_opcion_1_media_tarde; ?></span>
</td>
<td style="width: 40%; vertical-align: middle; padding: 20px; text-align: center; background: #E9E555;">
<span style="font-size: 13px;"><?php echo $dos_opcion_1_media_tarde; ?></span>
</td>
</tr>
<tr>
<td style="width: 20%; vertical-align: middle; padding: 20px; text-align: center; border: 1px solid #95cf32;">
<b style="font-size: 14px;">CENA</b><br>
<span style="font-size: 14px;"><?php echo $hora_cena; ?></span>
</td>
<td style="width: 40%; vertical-align: middle; padding: 20px; text-align: left; border: 1px solid #95cf32;">
<br><br>
<b style="font-size: 13px;">Opci&oacute;n 1:</b><br>
<span style="font-size: 13px;"><?php echo $uno_opcion_1_cena; ?></span><br><br>
<b style="font-size: 13px;">Opci&oacute;n 2:</b><br>
<span style="font-size: 13px;"><?php echo $uno_opcion_2_cena; ?></span><br><br>
</td>
<td style="width: 40%; vertical-align: middle; padding: 20px; text-align: left; border: 1px solid #95cf32;">
<br><br>
<b style="font-size: 13px;">Opci&oacute;n 1:</b><br>
<span style="font-size: 13px;"><?php echo $dos_opcion_1_cena; ?></span><br><br>
<b style="font-size: 13px;">Opci&oacute;n 2:</b><br>
<span style="font-size: 13px;"><?php echo $dos_opcion_2_cena; ?></span><br><br>
</td>
</tr>
</table>
<?php
}
?>
<!-- FIN -->
</td>
</tr>
</table>
<div id="footerContent">
<img src="../../../vendors/images/pdf-footer.png" style="width: 100%; height: auto;">
</div>

<!-- PRIMERA PAGINA -->
<div id="headerContent" style="padding-left: 30px;">
<img src="http://www.nutrikatherinealfaro.com.pe/app-v1/vendors/images/logo-completo.png" style="width: 150px; height: auto;">
</div>
<table style="width: 100%; padding: 10px; border-collapse: collapse; background-image: url(../../../vendors/images/marca-agua.png); background-size: contain; background-position: right; background-repeat: no-repeat;">
<tr>
<td style="vertical-align: middle; width: 100%; height: 850px;">
<!-- CONTENIDO -->
<table style="width: 100%; padding: 10px; border-collapse: collapse;">
<tr>
<td style="width: 100%; color: #111; font-weight: bold; text-align: left; padding: 10px; font-size: 12px; margin-top: 0; padding-top: 0;">
<b>Indicaciones:</b><br><br>
1.-01 comida especial en la semana.<br>
2.- Diariamente, consumir 10 vasos con agua (250ml) (incluyen las bebidas de entre comidas).<br>
3.- No a&ntilde;adir az&uacute;car rubia ni blanca a las preparaciones. De preferencia, utilizar Stevia.<br>
3.- Si en caso, te diera hambre, consumir frutos secos (no pasas, ni man&iacute;), huevos, aceitunas, palta, tomar m�s bebida.<br>
4.- Dormir entre 6 a 8 horas diarias.<br>
5.- Consumir diariamente al levantarse 01 vaso de agua caliente con zumo de 2 limones.<br>
c/ 1 crdta de salvado de trigo.
</td>
</tr>
</table>
<!-- FIN -->
</td>
</tr>
</table>
<div id="footerContent">
<img src="../../../vendors/images/pdf-footer.png" style="width: 100%; height: auto;">
</div>
<?php
$content = ob_get_clean();
return $content;
}