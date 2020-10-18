<?php
//TIEMPO MAXIMO DE CARGA
ini_set('max_execution_time', 500);

//SESION Y CONEXION
require_once(__DIR__.'/../../is_logged.php');
require_once(__DIR__.'/../../conexion_bd.php');

//LIBRERIA HTML2PDF
require_once(__DIR__.'/../html2pdf.class.php');

//CONSULTAS BD
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

//CONTENIDO DEL PDF
ob_start();
?>
<page backtop="5mm" backbottom="5mm" backleft="5mm" backright="5mm">
<?php
if($tipo_plan == 1){
?>

<?php
} else {
?>
<table style="width: 100%; padding: 10px; border-collapse: collapse;">
<tr>
<td style="width: 33.3%; color: #111; font-weight: bold; background: #95cf32; text-align: center; padding: 10px; font-size: 13px; border: 1px solid #95cf32;">
<?php echo $title_1; ?>
</td>
<td style="width: 33.3%; color: #111; font-weight: bold; background: #95cf32; text-align: center; padding: 10px; font-size: 13px; border: 1px solid #95cf32;">
<?php echo $title_2; ?>
</td>
<td style="width: 33.3%; color: #111; font-weight: bold; background: #95cf32; text-align: center; padding: 10px; font-size: 13px; border: 1px solid #95cf32;">
<?php echo $title_3; ?>
</td>
</tr>
<tr>
<td style="width: 33.3%; vertical-align: middle; padding: 20px; text-align: center; border: 1px solid #95cf32;">
<b style="font-size: 15px;">DESAYUNO<br><br><?php echo $hora_desayuno; ?></b>
</td>
<td style="width: 33.3%; vertical-align: middle; padding: 20px; text-align: left; border: 1px solid #95cf32;">
<b style="font-size: 13px;">Opci&oacute;n 1:</b><br>
<span style="font-size: 13px;"><?php echo $uno_opcion_1_desayuno; ?></span><br><br>
<b style="font-size: 13px;">Opci&oacute;n 2:</b><br>
<span style="font-size: 13px;"><?php echo $uno_opcion_2_desayuno; ?></span><br><br>
</td>
<td style="width: 33.3%; vertical-align: middle; padding: 20px; text-align: left; border: 1px solid #95cf32;">
<b style="font-size: 13px;">Opci&oacute;n 1:</b><br>
<span style="font-size: 13px;"><?php echo $dos_opcion_1_desayuno; ?></span><br><br>
<b style="font-size: 13px;">Opci&oacute;n 2:</b><br>
<span style="font-size: 13px;"><?php echo $dos_opcion_2_desayuno; ?></span><br><br>
</td>
</tr>
<tr>
<td style="width: 33.3%; vertical-align: middle; padding: 10px; text-align: center; background: #E9E555; border: 1px solid #95cf32;">
<b style="font-size: 12px;">MEDIA MA&Ntilde;ANA<br><?php echo $hora_media_manana; ?></b>
</td>
<td style="width: 33.3%; vertical-align: middle; padding: 20px; text-align: center; background: #E9E555; border: 1px solid #95cf32;">
<table style="width: 100%; margin: 0 auto;">
<tr>
<td style="width: 20%; text-align: center;"></td>
<td style="width: 80%;">
<?php echo $uno_opcion_1_media_manana; ?>
</td>
</tr>
</table>
</td>
<td style="width: 33.3%; vertical-align: middle; padding: 20px; text-align: center; background: #E9E555; border: 1px solid #95cf32; <?php echo $style_pa; ?>">
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
<td style="width: 33.3%; vertical-align: middle; padding: 20px; text-align: center; border: 1px solid #95cf32;">
<b style="font-size: 17px;">ALMUERZO<br><?php echo $hora_almuerzo; ?></b>
</td>
<td style="width: 33.3%; vertical-align: middle; padding: 20px; text-align: left; border: 1px solid #95cf32;">
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
<td style="width: 33.3%; vertical-align: middle; padding: 20px; text-align: left; border: 1px solid #95cf32; <?php echo $style_pa; ?>">
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
<td style="width: 33.3%; vertical-align: middle; padding: 10px; text-align: center; background: #E9E555; border: 1px solid #95cf32;">
<b style="font-size: 12px;">MEDIA TARDE<br><?php echo $hora_media_tarde; ?></b>
</td>
<td style="width: 33.3%; vertical-align: middle; padding: 10px; text-align: center; background: #E9E555; border: 1px solid #95cf32;">
<?php echo $uno_opcion_1_media_tarde; ?>
</td>
<td style="width: 33.3%; vertical-align: middle; padding: 10px; text-align: center; background: #E9E555; border: 1px solid #95cf32; <?php echo $style_pa; ?>">
<?php echo $dos_opcion_1_media_tarde; ?>
</td>
</tr>
<tr>
<td style="width: 33.3%; vertical-align: middle; padding: 20px; text-align: center; border: 1px solid #95cf32;">
<b style="font-size: 17px;">CENA<br><?php echo $hora_cena; ?></b>
</td>
<td style="width: 33.3%; vertical-align: middle; padding: 20px; text-align: left; border: 1px solid #95cf32;">
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
<td style="width: 33.3%; vertical-align: middle; padding: 20px; text-align: left; border: 1px solid #95cf32; <?php echo $style_pa; ?>">
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
}
?>
</page>
<?php
$content = ob_get_clean();

//CONFIGURACION DEL PDF
try{
$html2pdf = new HTML2PDF('P', 'A4', 'es', true, 'UTF-8', array(0, 0, 0, 0));
$html2pdf->pdf->SetDisplayMode('fullpage');
$html2pdf->writeHTML($content, isset($_GET['vuehtml']));
$html2pdf->Output('Plan_detox.pdf');
} catch(HTML2PDF_exception $e){
echo $e;
exit();
exit();
}