<?php
function html_plan($array){

//PARAMETROS ARRAY
$id_plan = (int)$array[0];
$fn_nuevo_plan = (int)$array[1];
$fn_tipo_plan = (int)$array[2];
$fn_id_paciente = (int)$array[3];
$fn_editar = (int)$array[4];

//VARIABLE DE CONEXION
global $con;

//SI ES NUEVO PLAN
if(empty($id_plan)){

$tipo_plan = $fn_tipo_plan;
$id_paciente = $fn_id_paciente;
} else {

//CONSULTA DATOS PLAN
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

$fn_indicaciones = $row_plan_alimentacion['indicaciones'];

$fecha_plan = date('d/m/Y', strtotime($row_plan_alimentacion['fecha_envio']));
$title_2 = $horario_1;
$title_3 = $horario_2;

//ID DEL PACIENTE
$id_paciente = (int)$row_plan_alimentacion['id_paciente'];
}

//DATOS DEL PACIENTE
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
<table style="width: 100%; padding: 10px; border-collapse: collapse; background-image: url(http://www.nutrikatherinealfaro.com.pe/app-v1/vendors/images/marca-agua.png); background-size: contain; background-position: right; background-repeat: no-repeat;">
<tr>
<td style="vertical-align: top; width: 100%; height: 850px;">
<!-- CONTENIDO -->
<?php
if($tipo_plan == 1){
?>
<table style="width: 100%; padding: 10px; border-collapse: collapse;">
<tr>
<td style="width: 20%; color: #111; font-weight: bold; background: #95cf32; text-align: center; padding: 10px; font-size: 14px; border: 1px solid #95cf32;">
Comidas
</td>
<td style="width: 80%; color: #111; font-weight: bold; background: #95cf32; text-align: center; padding: 10px; font-size: 14px; border: 1px solid #95cf32;">
PLAN DETOX POR 1 D&Iacute;A
</td>
</tr>
<tr>
<td style="width: 20%; vertical-align: middle; padding: 20px; text-align: center; border: 1px solid #95cf32;">
<b style="font-size: 14px;">DESAYUNO</b><br>
<?php
if(empty($fn_nuevo_plan) && $fn_editar != 1){
?>
<span style="font-size: 14px;"><?php echo $hora_desayuno; ?></span>
<?php
} else {
?>
<input id="fp_hora_desayuno" class="form-control n-form-control" type="text" style="font-size: 15px; text-align: center; font-weight: bold; width: 60%; margin: auto;" value="<?php echo $hora_desayuno; ?>">
<?php
}
?>
</td>
<td style="width: 80%; vertical-align: middle; padding: 20px; text-align: left; border: 1px solid #95cf32;">
<?php
if(empty($fn_nuevo_plan) && $fn_editar != 1){
?>
<br><br>
<?php
if(!empty($uno_opcion_1_desayuno)){
?>
<b style="font-size: 13px;">Opci&oacute;n 1:</b><br>
<span style="font-size: 13px;"><?php echo $uno_opcion_1_desayuno; ?></span><br><br>
<?php
}
if(!empty($uno_opcion_2_desayuno)){
?>
<b style="font-size: 13px;">Opci&oacute;n 2:</b><br>
<span style="font-size: 13px;"><?php echo $uno_opcion_2_desayuno; ?></span><br><br>
<?php
}
} else {
?>
<b style="font-size: 13px;">Opci&oacute;n 1:</b><br>
<textarea id="fp_uno_opcion_1_desayuno" class="form-control" type="text" style="font-size: 11px; text-align: left; margin: auto; height: 90px;">
<?php echo $uno_opcion_1_desayuno; ?>
</textarea>
<b style="font-size: 13px;">Opci&oacute;n 2:</b><br>
<textarea id="fp_uno_opcion_2_desayuno" class="form-control" type="text" style="font-size: 11px; text-align: left; margin: auto; height: 90px;">
<?php echo $uno_opcion_2_desayuno; ?>
</textarea>
<?php
}
?>
</td>
</tr>
<tr>
<td style="width: 20%; vertical-align: middle; padding: 20px; text-align: center; background: #E9E555;">
<b style="font-size: 12px;">MEDIA MA&Ntilde;ANA</b><br>
<?php
if(empty($fn_nuevo_plan) && $fn_editar != 1){
?>
<span style="font-size: 12px;"><?php echo $hora_media_manana; ?></span>
<?php
} else {
?>
<input id="fp_hora_media_manana" class="form-control n-form-control" type="text" style="font-size: 15px; text-align: center; font-weight: bold; width: 60%; margin: auto;" value="<?php echo $hora_media_manana; ?>">
<?php
}
?>
</td>
<td style="width: 80%; vertical-align: middle; padding: 20px; text-align: center; background: #E9E555;">
<?php
if(empty($fn_nuevo_plan) && $fn_editar != 1){
?>
<span style="font-size: 13px;"><?php echo $uno_opcion_1_media_manana; ?></span>
<?php
} else {
?>
<textarea id="fp_uno_opcion_1_media_manana" class="form-control" type="text" style="font-size: 11px; text-align: center; margin: auto; height: 30px;">
<?php echo $uno_opcion_1_media_manana; ?>
</textarea>
<?php
}
?>
</td>
</tr>
<tr>
<td style="width: 20%; vertical-align: middle; padding: 20px; text-align: center; border: 1px solid #95cf32;">
<b style="font-size: 14px;">ALMUERZO</b><br>
<?php
if(empty($fn_nuevo_plan) && $fn_editar != 1){
?>
<span style="font-size: 14px;"><?php echo $hora_almuerzo; ?></span>
<?php
} else {
?>
<input id="fp_hora_almuerzo" class="form-control n-form-control" type="text" style="font-size: 15px; text-align: center; font-weight: bold; width: 60%; margin: auto;" value="<?php echo $hora_almuerzo; ?>">
<?php
}
?>
</td>
<td style="width: 80%; vertical-align: middle; padding: 20px; text-align: left; border: 1px solid #95cf32;">
<?php
if(empty($fn_nuevo_plan) && $fn_editar != 1){
?>
<br><br>
<?php
if(!empty($uno_opcion_1_almuerzo)){
?>
<b style="font-size: 13px;">Opci&oacute;n 1:</b><br>
<span style="font-size: 13px;"><?php echo $uno_opcion_1_almuerzo; ?></span><br><br>
<?php
}
if(!empty($uno_opcion_2_almuerzo)){
?>
<b style="font-size: 13px;">Opci&oacute;n 2:</b><br>
<span style="font-size: 13px;"><?php echo $uno_opcion_2_almuerzo; ?></span><br><br>
<?php
}
} else {
?>
<b style="font-size: 13px;">Opci&oacute;n 1:</b><br>
<textarea id="fp_uno_opcion_1_almuerzo" class="form-control" type="text" style="font-size: 11px; text-align: left; margin: auto; height: 90px;">
<?php echo $uno_opcion_1_almuerzo; ?>
</textarea>
<b style="font-size: 13px;">Opci&oacute;n 2:</b><br>
<textarea id="fp_uno_opcion_2_almuerzo" class="form-control" type="text" style="font-size: 11px; text-align: left; margin: auto; height: 90px;">
<?php echo $uno_opcion_2_almuerzo; ?>
</textarea>
<?php
}
?>
</td>
</tr>
<tr>
<td style="width: 20%; vertical-align: middle; padding: 20px; text-align: center; background: #E9E555;">
<b style="font-size: 12px;">MEDIA TARDE</b><br>
<?php
if(empty($fn_nuevo_plan) && $fn_editar != 1){
?>
<span style="font-size: 12px;"><?php echo $hora_media_tarde; ?></span>
<?php
} else {
?>
<input id="fp_hora_media_tarde" class="form-control n-form-control" type="text" style="font-size: 15px; text-align: center; font-weight: bold; width: 60%; margin: auto;" value="<?php echo $hora_media_tarde; ?>">
<?php
}
?>
</td>
<td style="width: 80%; vertical-align: middle; padding: 20px; text-align: center; background: #E9E555;">
<?php
if(empty($fn_nuevo_plan) && $fn_editar != 1){
?>
<span style="font-size: 13px;"><?php echo $uno_opcion_1_media_tarde; ?></span>
<?php
} else {
?>
<textarea id="fp_uno_opcion_1_media_tarde" class="form-control" type="text" style="font-size: 11px; text-align: center; margin: auto; height: 30px;">
<?php echo $uno_opcion_1_media_tarde; ?>
</textarea>
<?php
}
?>
</td>
</tr>
<tr>
<td style="width: 20%; vertical-align: middle; padding: 20px; text-align: center; border: 1px solid #95cf32;">
<b style="font-size: 14px;">CENA</b><br>
<?php
if(empty($fn_nuevo_plan) && $fn_editar != 1){
?>
<span style="font-size: 14px;"><?php echo $hora_cena; ?></span>
<?php
} else {
?>
<input id="fp_hora_cena" class="form-control n-form-control" type="text" style="font-size: 15px; text-align: center; font-weight: bold; width: 60%; margin: auto;" value="<?php echo $hora_cena; ?>">
<?php
}
?>
</td>
<td style="width: 80%; vertical-align: middle; padding: 20px; text-align: left; border: 1px solid #95cf32;">
<?php
if(empty($fn_nuevo_plan) && $fn_editar != 1){
?>
<br><br>
<?php
if(!empty($uno_opcion_1_cena)){
?>
<b style="font-size: 13px;">Opci&oacute;n 1:</b><br>
<span style="font-size: 13px;"><?php echo $uno_opcion_1_cena; ?></span><br><br>
<?php
}
if(!empty($uno_opcion_2_cena)){
?>
<b style="font-size: 13px;">Opci&oacute;n 2:</b><br>
<span style="font-size: 13px;"><?php echo $uno_opcion_2_cena; ?></span><br><br>
<?php
}
} else {
?>
<b style="font-size: 13px;">Opci&oacute;n 1:</b><br>
<textarea id="fp_uno_opcion_1_cena" class="form-control" type="text" style="font-size: 11px; text-align: left; margin: auto; height: 90px;">
<?php echo $uno_opcion_1_cena; ?>
</textarea>
<b style="font-size: 13px;">Opci&oacute;n 2:</b><br>
<textarea id="fp_uno_opcion_2_cena" class="form-control" type="text" style="font-size: 11px; text-align: left; margin: auto; height: 90px;">
<?php echo $uno_opcion_2_cena; ?>
</textarea>
<?php
}
?>
</td>
</tr>
</table>
<?php
} else {
?>
<table style="width: 100%; padding: 10px; border-collapse: collapse;">
<tr>
<td style="width: 20%; color: #111; font-weight: bold; text-align: center; padding: 10px; font-size: 12px;">
Realizar el d&iacute;a: <?php echo $fecha_plan; ?>
</td>
<td style="width: 40%; color: #111; font-weight: bold; text-align: center; padding: 10px; font-size: 12px;">
Nombres: <?php echo $nombre_paciente; ?>
</td>
<td style="width: 40%; color: #111; font-weight: bold; text-align: center; padding: 10px; font-size: 12px;">

</td>
</tr>
<tr>
<td style="width: 20%; color: #111; font-weight: bold; background: #95cf32; text-align: center; padding: 10px; font-size: 14px; border: 1px solid #95cf32;">
Comidas
</td>
<td style="width: 40%; color: #111; font-weight: bold; background: #95cf32; text-align: center; padding: 10px; font-size: 14px; border: 1px solid #95cf32;">
<?php
if(empty($fn_nuevo_plan) && $fn_editar != 1){
echo $title_2; 
} else {
?>
<input id="fp_title_2" class="form-control n-form-control" type="text" style="font-size: 15px; text-align: center; font-weight: bold;" value="<?php echo $title_2; ?>">
<?php
}
?>
</td>
<td style="width: 40%; color: #111; font-weight: bold; background: #95cf32; text-align: center; padding: 10px; font-size: 14px; border: 1px solid #95cf32;">
<?php
if(empty($fn_nuevo_plan) && $fn_editar != 1){
echo $title_3; 
} else {
?>
<input id="fp_title_3" class="form-control n-form-control" type="text" style="font-size: 15px; text-align: center; font-weight: bold;" value="<?php echo $title_3; ?>">
<?php
}
?>
</td>
</tr>
<tr>
<td style="width: 20%; vertical-align: middle; padding: 20px; text-align: center; border: 1px solid #95cf32;">
<b style="font-size: 14px;">DESAYUNO</b><br>
<?php
if(empty($fn_nuevo_plan) && $fn_editar != 1){
?>
<span style="font-size: 14px;"><?php echo $hora_desayuno; ?></span>
<?php
} else {
?>
<input id="fp_hora_desayuno" class="form-control n-form-control" type="text" style="font-size: 15px; text-align: center; font-weight: bold; width: 60%; margin: auto;" value="<?php echo $hora_desayuno; ?>">
<?php
}
?>
</td>
<td style="width: 40%; vertical-align: middle; padding: 20px; text-align: left; border: 1px solid #95cf32;">
<?php
if(empty($fn_nuevo_plan) && $fn_editar != 1){
?>
<br><br>
<?php
if(!empty($uno_opcion_1_desayuno)){
?>
<b style="font-size: 13px;">Opci&oacute;n 1:</b><br>
<span style="font-size: 13px;"><?php echo $uno_opcion_1_desayuno; ?></span><br><br>
<?php
}
if(!empty($uno_opcion_2_desayuno)){
?>
<b style="font-size: 13px;">Opci&oacute;n 2:</b><br>
<span style="font-size: 13px;"><?php echo $uno_opcion_2_desayuno; ?></span><br><br>
<?php
}
} else {
?>
<b style="font-size: 13px;">Opci&oacute;n 1:</b><br>
<textarea id="fp_uno_opcion_1_desayuno" class="form-control" type="text" style="font-size: 11px; text-align: left; margin: auto; height: 90px;">
<?php echo $uno_opcion_1_desayuno; ?>
</textarea>
<b style="font-size: 13px;">Opci&oacute;n 2:</b><br>
<textarea id="fp_uno_opcion_2_desayuno" class="form-control" type="text" style="font-size: 11px; text-align: left; margin: auto; height: 90px;">
<?php echo $uno_opcion_2_desayuno; ?>
</textarea>
<?php
}
?>
</td>
<td style="width: 40%; vertical-align: middle; padding: 20px; text-align: left; border: 1px solid #95cf32;">
<?php
if(empty($fn_nuevo_plan) && $fn_editar != 1){
?>
<br><br>
<?php
if(!empty($dos_opcion_1_desayuno)){
?>
<b style="font-size: 13px;">Opci&oacute;n 1:</b><br>
<span style="font-size: 13px;"><?php echo $dos_opcion_1_desayuno; ?></span><br><br>
<?php
}
if(!empty($dos_opcion_2_desayuno)){
?>
<b style="font-size: 13px;">Opci&oacute;n 2:</b><br>
<span style="font-size: 13px;"><?php echo $dos_opcion_2_desayuno; ?></span><br><br>
<?php
}
} else {
?>
<b style="font-size: 13px;">Opci&oacute;n 1:</b><br>
<textarea id="fp_dos_opcion_1_desayuno" class="form-control" type="text" style="font-size: 11px; text-align: left; margin: auto; height: 90px;">
<?php echo $dos_opcion_1_desayuno; ?>
</textarea>
<b style="font-size: 13px;">Opci&oacute;n 2:</b><br>
<textarea id="fp_dos_opcion_2_desayuno" class="form-control" type="text" style="font-size: 11px; text-align: left; margin: auto; height: 90px;">
<?php echo $dos_opcion_2_desayuno; ?>
</textarea>
<?php
}
?>
</td>
</tr>
<tr>
<td style="width: 20%; vertical-align: middle; padding: 20px; text-align: center; background: #E9E555;">
<b style="font-size: 12px;">MEDIA MA&Ntilde;ANA</b><br>
<?php
if(empty($fn_nuevo_plan) && $fn_editar != 1){
?>
<span style="font-size: 12px;"><?php echo $hora_media_manana; ?></span>
<?php
} else {
?>
<input id="fp_hora_media_manana" class="form-control n-form-control" type="text" style="font-size: 15px; text-align: center; font-weight: bold; width: 60%; margin: auto;" value="<?php echo $hora_media_manana; ?>">
<?php
}
?>
</td>
<td style="width: 40%; vertical-align: middle; padding: 20px; text-align: center; background: #E9E555;">
<?php
if(empty($fn_nuevo_plan) && $fn_editar != 1){
?>
<span style="font-size: 13px;"><?php echo $uno_opcion_1_media_manana; ?></span>
<?php
} else {
?>
<textarea id="fp_uno_opcion_1_media_manana" class="form-control" type="text" style="font-size: 11px; text-align: center; margin: auto; height: 30px;">
<?php echo $uno_opcion_1_media_manana; ?>
</textarea>
<?php
}
?>
</td>
<td style="width: 40%; vertical-align: middle; padding: 20px; text-align: center; background: #E9E555;">
<?php
if(empty($fn_nuevo_plan) && $fn_editar != 1){
?>
<span style="font-size: 13px;"><?php echo $dos_opcion_1_media_manana; ?></span>
<?php
} else {
?>
<textarea id="fp_dos_opcion_1_media_manana" class="form-control" type="text" style="font-size: 11px; text-align: center; margin: auto; height: 30px;">
<?php echo $dos_opcion_1_media_manana; ?>
</textarea>
<?php
}
?>
</td>
</tr>
<tr>
<td style="width: 20%; vertical-align: middle; padding: 20px; text-align: center; border: 1px solid #95cf32;">
<b style="font-size: 14px;">ALMUERZO</b><br>
<?php
if(empty($fn_nuevo_plan) && $fn_editar != 1){
?>
<span style="font-size: 14px;"><?php echo $hora_almuerzo; ?></span>
<?php
} else {
?>
<input id="fp_hora_almuerzo" class="form-control n-form-control" type="text" style="font-size: 15px; text-align: center; font-weight: bold; width: 60%; margin: auto;" value="<?php echo $hora_almuerzo; ?>">
<?php
}
?>
</td>
<td style="width: 40%; vertical-align: middle; padding: 20px; text-align: left; border: 1px solid #95cf32;">
<?php
if(empty($fn_nuevo_plan) && $fn_editar != 1){
?>
<br><br>
<?php
if(!empty($uno_opcion_1_almuerzo)){
?>
<b style="font-size: 13px;">Opci&oacute;n 1:</b><br>
<span style="font-size: 13px;"><?php echo $uno_opcion_1_almuerzo; ?></span><br><br>
<?php
}
if(!empty($uno_opcion_2_almuerzo)){
?>
<b style="font-size: 13px;">Opci&oacute;n 2:</b><br>
<span style="font-size: 13px;"><?php echo $uno_opcion_2_almuerzo; ?></span><br><br>
<?php
}
} else {
?>
<b style="font-size: 13px;">Opci&oacute;n 1:</b><br>
<textarea id="fp_uno_opcion_1_almuerzo" class="form-control" type="text" style="font-size: 11px; text-align: left; margin: auto; height: 90px;">
<?php echo $uno_opcion_1_almuerzo; ?>
</textarea>
<b style="font-size: 13px;">Opci&oacute;n 2:</b><br>
<textarea id="fp_uno_opcion_2_almuerzo" class="form-control" type="text" style="font-size: 11px; text-align: left; margin: auto; height: 90px;">
<?php echo $uno_opcion_2_almuerzo; ?>
</textarea>
<?php
}
?>
</td>
<td style="width: 40%; vertical-align: middle; padding: 20px; text-align: left; border: 1px solid #95cf32;">
<?php
if(empty($fn_nuevo_plan) && $fn_editar != 1){
?>
<br><br>
<?php
if(!empty($dos_opcion_1_almuerzo)){
?>
<b style="font-size: 13px;">Opci&oacute;n 1:</b><br>
<span style="font-size: 13px;"><?php echo $dos_opcion_1_almuerzo; ?></span><br><br>
<?php
}
if(!empty($dos_opcion_2_almuerzo)){
?>
<b style="font-size: 13px;">Opci&oacute;n 2:</b><br>
<span style="font-size: 13px;"><?php echo $dos_opcion_2_almuerzo; ?></span><br><br>
<?php
}
} else {
?>
<b style="font-size: 13px;">Opci&oacute;n 1:</b><br>
<textarea id="fp_dos_opcion_1_almuerzo" class="form-control" type="text" style="font-size: 11px; text-align: left; margin: auto; height: 90px;">
<?php echo $dos_opcion_1_almuerzo; ?>
</textarea>
<b style="font-size: 13px;">Opci&oacute;n 2:</b><br>
<textarea id="fp_dos_opcion_2_almuerzo" class="form-control" type="text" style="font-size: 11px; text-align: left; margin: auto; height: 90px;">
<?php echo $dos_opcion_2_almuerzo; ?>
</textarea>
<?php
}
?>
</td>
</tr>
<tr>
<td style="width: 20%; vertical-align: middle; padding: 20px; text-align: center; background: #E9E555;">
<b style="font-size: 12px;">MEDIA TARDE</b><br>
<?php
if(empty($fn_nuevo_plan) && $fn_editar != 1){
?>
<span style="font-size: 12px;"><?php echo $hora_media_tarde; ?></span>
<?php
} else {
?>
<input id="fp_hora_media_tarde" class="form-control n-form-control" type="text" style="font-size: 15px; text-align: center; font-weight: bold; width: 60%; margin: auto;" value="<?php echo $hora_media_tarde; ?>">
<?php
}
?>
</td>
<td style="width: 40%; vertical-align: middle; padding: 20px; text-align: center; background: #E9E555;">
<?php
if(empty($fn_nuevo_plan) && $fn_editar != 1){
?>
<span style="font-size: 13px;"><?php echo $uno_opcion_1_media_tarde; ?></span>
<?php
} else {
?>
<textarea id="fp_uno_opcion_1_media_tarde" class="form-control" type="text" style="font-size: 11px; text-align: center; margin: auto; height: 30px;">
<?php echo $uno_opcion_1_media_tarde; ?>
</textarea>
<?php
}
?>
</td>
<td style="width: 40%; vertical-align: middle; padding: 20px; text-align: center; background: #E9E555;">
<?php
if(empty($fn_nuevo_plan) && $fn_editar != 1){
?>
<span style="font-size: 13px;"><?php echo $dos_opcion_1_media_tarde; ?></span>
<?php
} else {
?>
<textarea id="fp_dos_opcion_1_media_tarde" class="form-control" type="text" style="font-size: 11px; text-align: center; margin: auto; height: 30px;">
<?php echo $dos_opcion_1_media_tarde; ?>
</textarea>
<?php
}
?>
</td>
</tr>
<tr>
<td style="width: 20%; vertical-align: middle; padding: 20px; text-align: center; border: 1px solid #95cf32;">
<b style="font-size: 14px;">CENA</b><br>
<?php
if(empty($fn_nuevo_plan) && $fn_editar != 1){
?>
<span style="font-size: 14px;"><?php echo $hora_cena; ?></span>
<?php
} else {
?>
<input id="fp_hora_cena" class="form-control n-form-control" type="text" style="font-size: 15px; text-align: center; font-weight: bold; width: 60%; margin: auto;" value="<?php echo $hora_cena; ?>">
<?php
}
?>
</td>
<td style="width: 40%; vertical-align: middle; padding: 20px; text-align: left; border: 1px solid #95cf32;">
<?php
if(empty($fn_nuevo_plan) && $fn_editar != 1){
?>
<br><br>
<?php
if(!empty($uno_opcion_1_cena)){
?>
<b style="font-size: 13px;">Opci&oacute;n 1:</b><br>
<span style="font-size: 13px;"><?php echo $uno_opcion_1_cena; ?></span><br><br>
<?php
}
if(!empty($uno_opcion_2_cena)){
?>
<b style="font-size: 13px;">Opci&oacute;n 2:</b><br>
<span style="font-size: 13px;"><?php echo $uno_opcion_2_cena; ?></span><br><br>
<?php
}
} else {
?>
<b style="font-size: 13px;">Opci&oacute;n 1:</b><br>
<textarea id="fp_uno_opcion_1_cena" class="form-control" type="text" style="font-size: 11px; text-align: left; margin: auto; height: 90px;">
<?php echo $uno_opcion_1_cena; ?>
</textarea>
<b style="font-size: 13px;">Opci&oacute;n 2:</b><br>
<textarea id="fp_uno_opcion_2_cena" class="form-control" type="text" style="font-size: 11px; text-align: left; margin: auto; height: 90px;">
<?php echo $uno_opcion_2_cena; ?>
</textarea>
<?php
}
?>
</td>
<td style="width: 40%; vertical-align: middle; padding: 20px; text-align: left; border: 1px solid #95cf32;">
<?php
if(empty($fn_nuevo_plan) && $fn_editar != 1){
?>
<br><br>
<?php
if(!empty($dos_opcion_1_cena)){
?>
<b style="font-size: 13px;">Opci&oacute;n 1:</b><br>
<span style="font-size: 13px;"><?php echo $dos_opcion_1_cena; ?></span><br><br>
<?php
}
if(!empty($dos_opcion_2_cena)){
?>
<b style="font-size: 13px;">Opci&oacute;n 2:</b><br>
<span style="font-size: 13px;"><?php echo $dos_opcion_2_cena; ?></span><br><br>
<?php
}
} else {
?>
<b style="font-size: 13px;">Opci&oacute;n 1:</b><br>
<textarea id="fp_dos_opcion_1_cena" class="form-control" type="text" style="font-size: 11px; text-align: left; margin: auto; height: 90px;">
<?php echo $dos_opcion_1_cena; ?>
</textarea>
<b style="font-size: 13px;">Opci&oacute;n 2:</b><br>
<textarea id="fp_dos_opcion_2_cena" class="form-control" type="text" style="font-size: 11px; text-align: left; margin: auto; height: 90px;">
<?php echo $dos_opcion_2_cena; ?>
</textarea>
<?php
}
?>
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
<img src="http://www.nutrikatherinealfaro.com.pe/app-v1/vendors/images/pdf-footer.png" style="width: 100%; height: auto;">
</div>

<!-- PRIMERA PAGINA -->
<div id="headerContent" style="padding-left: 30px;">
<img src="http://www.nutrikatherinealfaro.com.pe/app-v1/vendors/images/logo-completo.png" style="width: 150px; height: auto;">
</div>
<table style="width: 100%; padding: 10px; border-collapse: collapse; background-image: url(http://www.nutrikatherinealfaro.com.pe/app-v1/vendors/images/marca-agua.png); background-size: contain; background-position: right; background-repeat: no-repeat;">
<tr>
<td style="vertical-align: middle; width: 100%; height: 850px;">
<!-- CONTENIDO -->
<table style="width: 100%; padding: 10px; border-collapse: collapse;">
<tr>
<td style="width: 100%; color: #111; text-align: left; padding: 10px; font-size: 12px; margin-top: 0; padding-top: 0;">
<?php
if(empty($fn_nuevo_plan) && $fn_editar != 1){
$fn_indicaciones = str_replace(array("\r\n", "\n\r", "\r", "\n"), "<br />", $fn_indicaciones);

echo str_replace('INDICACIONES:', '<b>INDICACIONES:</b>', $fn_indicaciones);
} else {
if(empty($fn_indicaciones)){
?>
<textarea id="fn_indicaciones" class="form-control" type="text" style="font-size: 11px; text-align: left; margin: auto; height: 200px;">
INDICACIONES:

1.- 01 comida especial en la semana.
2.- Diariamente, consumir 10 vasos con agua (250ml) (incluyen las bebidas de entre comidas).
3.- No a&ntilde;adir az&uacute;car rubia ni blanca a las preparaciones. De preferencia, utilizar Stevia.
3.- Si en caso, te diera hambre, consumir frutos secos (no pasas, ni man&iacute;), huevos, aceitunas, palta, tomar m&aacute;s bebida.
4.- Dormir entre 6 a 8 horas diarias.
</textarea>
<?php
} else {
?>
<textarea id="fn_indicaciones" class="form-control" type="text" style="font-size: 11px; text-align: left; margin: auto; height: 200px;">
<?php echo $fn_indicaciones; ?>
</textarea>
<?php
}
}
?>
</td>
</tr>
</table>
<!-- FIN -->
</td>
</tr>
</table>
<div id="footerContent">
<img src="http://www.nutrikatherinealfaro.com.pe/app-v1/vendors/images/pdf-footer.png" style="width: 100%; height: auto;">
</div>
<?php
$content = ob_get_clean();
return $content;
}