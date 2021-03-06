<?php
// Notificar todos los errores excepto E_NOTICE
error_reporting(E_ALL ^ E_NOTICE);

//REQUIRES
require_once(__DIR__.'/is_logged.php');
require_once(__DIR__.'/conexion_bd.php');
require_once(__DIR__.'/datos_bd.php');
require_once(__DIR__.'/funciones.php');
require_once(__DIR__.'/pagination_dinamica.php');

//VIEW CONTROLLER
$view_controller = (int)$_GET['view_controller'];

//NEGOCIA OPERACION
$negocia_operacion = (int)$_GET['negocia_operacion'];

//1. VISUALIZAR
if($negocia_operacion == 1){

//ID CONSULTAR
$id_registro = (int)$_POST['id'];

//ARRAY FILTROS
$array_filtros = array($view_controller, 0, 2, 0, 1, $id_registro, '', '', '', '', 1, '', '');

//FUNCION
$funcion_datos = consulta($array_filtros);

//CONSULTA
$array_funcion = $funcion_datos[1];
foreach($array_funcion as $row){

//2. PACIENTES
if($view_controller == 2){
$ret_codigo = $row[0];
$ret_nombres = $row[1];
$ret_apellidos = $row[2];
$ret_genero = $row[3];
$ret_fecha_nacimiento = date('d/m/Y', strtotime($row[4]));
$ret_correo = $row[5];
$ret_telefono = $row[6];
$ret_estado = $row[7];
$ret_id_tipo_usuario = $row[8];
$ret_id_usuario = $row[9];
$ret_id_tipo_documento = $row[10];
$ret_numero_documento = $row[11];
$ret_texto_tipo_documento = $row[12];
$texto_genero = $row[13];
$css_color = $row[14];
$texto_estado = $row[15];
$ret_texto_edad = $row[16].' a&ntilde;os';
$ret_date_added = date('d/m/Y', strtotime($row[17]));
$ret_instagram = $row[18];
$ret_direccion = $row[19];
$ret_distrito = $row[20];
$ret_provincia = $row[21];
$ret_departamento = $row[22];
$ret_residencia = $row[23];
$ret_maximo_pacientes = $row[24];
$ret_peso_meta = $row[25];
$ret_peso_actual = $row[26];
$ret_talla_actual = $row[27];
$ret_imc_actual = $row[28];
$ret_edad_en_anos = $row[29];
$ret_edad_en_meses = $row[30];
$diagnostico = $row[31];
}

//4. SUSCRIPCIONES
if($view_controller == 4){
$ret_id_suscripcion = $row[0];
$ret_id_programa = $row[1];
$ret_id_nutricionista = $row[2];
$ret_id_paciente = $row[3];
$ret_fecha_inicio = date('d/m/Y', strtotime($row[4]));
$ret_fecha_fin = date('d/m/Y', strtotime($row[5]));
$ret_estado = $row[6];
$ret_indicaciones = $row[7];
$ret_nombre_paciente = $row[8];
$ret_nombre_programa = $row[9];
$css_color = $row[10];
$texto_estado = $row[11];
}

//5. CONTROLES
if($view_controller == 5){
$ret_id_control = $row[0];
$ret_codigo_control = $row[1];
$ret_fecha = date('d/m/Y', strtotime($row[2]));
$ret_id_suscripcion = $row[3];
$ret_id_programa = $row[4];
$ret_id_nutricionista = $row[5];
$ret_id_paciente = $row[6];
$ret_nombre_programa = $row[7];
$ret_nombre_paciente = $row[8];
$ret_peso = $row[9];
$ret_imc = $row[10];
$ret_brazo = $row[11];
$ret_pecho = $row[12];
$ret_cintura = $row[13];
$ret_cadera = $row[14];
$ret_gluteo = $row[15];
$ret_muslo = $row[16];
$ret_pantorrilla = $row[17];
$ret_diagnostico = $row[18];
$ret_suscripcion_fecha_inicio = date('d/m/Y', strtotime($row[19]));
$ret_suscripcion_fecha_fin = date('d/m/Y', strtotime($row[20]));
$ret_suscripcion_estado = $row[21];
$css_color = $row[22];
$texto_estado = $row[23];
$ret_nombre_nutricionista = $row[24];
}
}

//2. PACIENTES
if($view_controller == 2){
$location_atras = 'pacientes.php';
$title = '('.$ret_codigo.') '.$ret_nombres.' '.$ret_apellidos;
?>
<div class="col-md-12" style="padding-top: 25px;">
<div style="padding-left: 15px; color: #95cf32; font-weight: bold; font-size: 20px;">
<?php echo $title; ?>
<br><hr>
</div>
<div id="div_plan_paciente">
<div class="row">
<div class="col-md-4">
<table style="width: 100%;">
<tr>
<td style="width: 50%; padding-left: 15px; font-weight: bold; font-size: 13px;">Tipo Documento:</td>
<td style="width: 50%; padding-left: 15px; font-size: 13px;"><?php echo $ret_texto_tipo_documento; ?></td>
</tr>
<tr>
<td style="width: 50%; padding-left: 15px; font-weight: bold; font-size: 13px;">N&#176; Documento:</td>
<td style="width: 50%; padding-left: 15px; font-size: 13px;"><?php echo $ret_numero_documento; ?></td>
</tr>
<tr>
<td style="width: 50%; padding-left: 15px; font-weight: bold; font-size: 13px;">G&eacute;nero:</td>
<td style="width: 50%; padding-left: 15px; font-size: 13px;"><?php echo $texto_genero; ?></td>
</tr>
<tr>
<td style="width: 50%; padding-left: 15px; font-weight: bold; font-size: 13px;">Edad:</td>
<td style="width: 50%; padding-left: 15px; font-size: 13px;"><?php echo $ret_texto_edad; ?></td>
</tr>
<tr>
<td style="width: 50%; padding-left: 15px; font-weight: bold; font-size: 13px;">Fecha Nac:</td>
<td style="width: 50%; padding-left: 15px; font-size: 13px;"><?php echo $ret_fecha_nacimiento; ?></td>
</tr>
</table>
</div>
<div class="col-md-4">
<table>
<tr>
<td style="width: 30%; padding-left: 15px; font-weight: bold; font-size: 13px;">N&#176; Socio:</td>
<td style="width: 70%; padding-left: 15px; font-size: 13px;"><?php echo $ret_codigo; ?></td>
</tr>
<tr>
<td style="width: 30%; padding-left: 15px; font-weight: bold; font-size: 13px;">F. Registro:</td>
<td style="width: 70%; padding-left: 15px; font-size: 13px;"><?php echo $ret_date_added; ?></td>
</tr>
<tr>
<td style="width: 30%; padding-left: 15px; font-weight: bold; font-size: 13px;">Correo:</td>
<td style="width: 70%; padding-left: 15px; font-size: 13px;"><?php echo $ret_correo; ?></td>
</tr>
<tr>
<td style="width: 30%; padding-left: 15px; font-weight: bold; font-size: 13px;">Tel&eacute;fono:</td>
<td style="width: 70%; padding-left: 15px; font-size: 13px;"><?php echo $ret_telefono; ?></td>
</tr>
<tr>
<td style="width: 30%; padding-left: 15px; font-weight: bold; font-size: 13px;">Instagram:</td>
<td style="width: 70%; padding-left: 15px; font-size: 13px;"><?php echo $ret_instagram; ?></td>
</tr>
</table>
</div>
<div class="col-md-4">
<table>
<tr>
<td style="width: 30%; padding-left: 15px; font-weight: bold; font-size: 13px;">Direcci&oacute;n:</td>
<td style="width: 70%; padding-left: 15px; font-size: 13px;"><?php echo $ret_direccion; ?></td>
</tr>
<tr>
<td style="width: 30%; padding-left: 15px; font-weight: bold; font-size: 13px;">Distrito:</td>
<td style="width: 70%; padding-left: 15px; font-size: 13px;"><?php echo $ret_distrito; ?></td>
</tr>
<tr>
<td style="width: 30%; padding-left: 15px; font-weight: bold; font-size: 13px;">Provincia:</td>
<td style="width: 70%; padding-left: 15px; font-size: 13px;"><?php echo $ret_provincia; ?></td>
</tr>
<tr>
<td style="width: 30%; padding-left: 15px; font-weight: bold; font-size: 13px;">Departamento:</td>
<td style="width: 70%; padding-left: 15px; font-size: 13px;"><?php echo $ret_departamento; ?></td>
</tr>
<tr>
<td style="width: 30%; padding-left: 15px; font-weight: bold; font-size: 13px;">Residencia:</td>
<td style="width: 70%; padding-left: 15px; font-size: 13px;"><?php echo $ret_residencia; ?></td>
</tr>
</table>
</div>
</div>
<br>
<?php
$query_suscripcion = mysqli_query($con, "SELECT id, id_programa, fecha_inicio, fecha_fin, estado FROM suscripcion_programa WHERE id_paciente = '$ret_id_usuario' ORDER BY id ASC");
if(mysqli_num_rows($query_suscripcion) > 0){
?>
<div class="table-responsive">
<table style="width: 1000px !important; margin: 0 auto;">
<tr>
<td class="td-title" style="width: 20% !important;">Planes Rekupera</td>
<td class="td-title" style="width: 20% !important;">Fecha Inicio</td>
<td class="td-title" style="width: 20% !important;">Fecha Fin</td>
<td class="td-title" style="width: 20% !important;">Estado</td>
<td class="td-title" style="width: 20% !important;">Acci&oacute;n</td>
</tr>
<?php
while($row_suscripcion = mysqli_fetch_array($query_suscripcion)){
$id_suscripcion = $row_suscripcion[0];
$id_programa = $row_suscripcion[1];
$fecha_inicio = date('d/m/Y', strtotime($row_suscripcion[2]));
$fecha_fin = date('d/m/Y', strtotime($row_suscripcion[3]));
$estado = $row_suscripcion[4];

//NOMBRE DEL PROGRAMA
$row_nombre_programa = mysqli_fetch_array(mysqli_query($con, "SELECT nombre_completo FROM programa WHERE id = '$id_programa' LIMIT 1"));
$nombre_programa = $row_nombre_programa[0];
//SUSCRIPCION ACTIVA
if($estado == 1){
$texto_condicion = 'Activo';
$css_condicion_color = '#95cf32';
} else {
$texto_condicion = 'Culminado';
$css_condicion_color = '#F26C3C';
}
?>
<tr class="tr-hover" style="cursor: pointer;">
<td class="td-content" style="width: 20% !important;"><?php echo $nombre_programa; ?></td>
<td class="td-content" style="width: 20% !important;"><?php echo $fecha_inicio; ?></td>
<td class="td-content" style="width: 20% !important;"><?php echo $fecha_fin; ?></td>
<td class="td-content" style="width: 20% !important; color: <?php echo $css_condicion_color; ?>; font-weight: bold;"><?php echo $texto_condicion; ?></td>
<td class="td-content" style="width: 20% !important; font-weight: bold;"><a href="javascript:void(0)" onclick="location.href = 'controles.php?suscripcion=<?php echo $id_suscripcion ?>'" data-toggle="tooltip" data-placement="top" title="" data-original-title="Ver todos los controles"><i class="fa fa-eye" style="font-size: 13px;"></i></a></td>
</tr>
<?php
}
?>
</table>
</div>
<?php

//GENERO DEL PACIENTE
$row_genero = mysqli_fetch_array(mysqli_query($con, "SELECT genero FROM usuario WHERE id_tipo_usuario = 2 AND id = '$ret_id_usuario' LIMIT 1"));
$genero_paciente = (int)$row_genero[0];

//OBTENER CONTROLES
$sql_controles = mysqli_query($con, "SELECT DATE_FORMAT(fecha, '%Y-%m-%d'), codigo, id_suscripcion, peso, talla, cuello, brazo, pecho, cintura, gluteo, muslo, pantorrilla, id_paciente FROM control WHERE id_paciente = '$ret_id_usuario' ORDER BY DATE_FORMAT(fecha, '%Y-%m-%d') ASC");
$array_controles;
$i_controles = 0;
while($row_controles = mysqli_fetch_array($sql_controles)){
$control_fecha = date('d/m/y', strtotime($row_controles[0]));
$control_codigo = $row_controles[1];
$control_id_suscripcion = (int)$row_controles[2];
$control_peso = (float)$row_controles[3];
$control_talla = (float)$row_controles[4];
$control_cuello = (float)$row_controles[5];
$control_brazo = (float)$row_controles[6];
$control_pecho = (float)$row_controles[7];
$control_cintura = (float)$row_controles[8];
$control_gluteo = (float)$row_controles[9];
$control_muslo = (float)$row_controles[10];
$control_pantorrilla = (float)$row_controles[11];
$control_id_paciente = (float)$row_controles[12];

//OBTENER ID DEL PROGRAMA
$query_suscripcion = mysqli_fetch_array(mysqli_query($con, "SELECT id_programa FROM suscripcion_programa WHERE id = '$control_id_suscripcion' ORDER BY id ASC LIMIT 1"));
$id_programa = (int)$query_suscripcion[0];

//NOMBRE DEL PROGRAMA
$row_nombre_programa = mysqli_fetch_array(mysqli_query($con, "SELECT nombre FROM programa WHERE id = '$id_programa' LIMIT 1"));
$nombre_programa = $row_nombre_programa[0];



$talla_en_cm = $control_talla * 100;

//% GRASA HOMBRES
if($genero_paciente == 1){
$porcentaje_grasa = 495 / (1.0324 - 0.19077 * (log10($control_cintura - $control_cuello)) + 0.15456*(log10($talla_en_cm)))-450;

//DIAGNOSTICO
if($porcentaje_grasa >= 26){
$diagnostico_grasa = 'Obesidad';
} elseif($porcentaje_grasa >= 18 && $porcentaje_grasa <= 25){
$diagnostico_grasa = 'Aceptable';
} elseif($porcentaje_grasa >= 14 && $porcentaje_grasa <= 17){
$diagnostico_grasa = 'Fitness';
} elseif($porcentaje_grasa >= 6 && $porcentaje_grasa <= 13){
$diagnostico_grasa = 'Atleta';
} elseif($porcentaje_grasa >= 2 && $porcentaje_grasa <= 4){
$diagnostico_grasa = 'Grasa Esencial';
} else {
$diagnostico_grasa = '';
}

} else {
$porcentaje_grasa = 495 / (1.29579 - 0.35004 * (log10($control_cintura + $control_gluteo - $control_cuello)) + 0.22100 * (log10($talla_en_cm))) - 450;

//DIAGNOSTICO
if($porcentaje_grasa >= 32){
$diagnostico_grasa = 'Obesidad';
} elseif($porcentaje_grasa >= 25 && $porcentaje_grasa <= 31){
$diagnostico_grasa = 'Aceptable';
} elseif($porcentaje_grasa >= 21 && $porcentaje_grasa <= 24){
$diagnostico_grasa = 'Fitness';
} elseif($porcentaje_grasa >= 14 && $porcentaje_grasa <= 20){
$diagnostico_grasa = 'Atleta';
} elseif($porcentaje_grasa >= 10 && $porcentaje_grasa <= 12){
$diagnostico_grasa = 'Grasa Esencial';
} else {
$diagnostico_grasa = '';
}
}

//MASA CORPORAL MAGRA
$masa_corporal_magra = ROUND((($control_peso * (100 - round($porcentaje_grasa, 1))) / 100), 1);




$array_controles[$i_controles] = array($control_fecha, $control_codigo, $nombre_programa, $control_peso, round($porcentaje_grasa, 1), $masa_corporal_magra);
$i_controles++;
}

//PESO
$max = 0;
foreach($array_controles as $array_valor){
if($array_valor[3] > $max){
$max = $array_valor[3];
}
}
$max = $max + 1;
$min = ((float)$ret_peso_meta) - 5;

//% DE GRASA
$max_grasa = 0;
$min_grasa = $array_controles[0][4];
foreach($array_controles as $array_valor){

//MAXIMO
if($array_valor[4] > $max_grasa){
$max_grasa = $array_valor[4];
}

//MIIMO
if($array_valor[4] < $min_grasa){
$min_grasa = $array_valor[4];
}
}
$max_grasa = $max_grasa + 1;
$min_grasa = $min_grasa - 1;

//MM
$max_mm = 0;
$min_mm = $array_controles[0][5];
foreach($array_controles as $array_valor){

//MAXIMO
if($array_valor[5] > $max_mm){
$max_mm = $array_valor[5];
}

//MIIMO
if($array_valor[5] < $min_mm){
$min_mm = $array_valor[5];
}
}
$max_mm = $max_mm + 1;
$min_mm = $min_mm - 1;
?>
<div class="row">
<div class="col-md-6 text-center" style="padding-top: 40px;">
<div id="chart1"></div>
<script>
var options = {

//TITULO DEL CHART
title: {
text: '(KG) Peso',
align: 'center',
style: {
fontSize: "16px",
color: '#95cf32'
}
},

//CONFIGURACION DEL CHART
chart: {
height: 350,
type: 'line',
toolbar: {
show: false
}
},

//DATOS EJE X
xaxis: {
categories: [
<?php
foreach($array_controles as $array_valor){
?>
['<?php echo $array_valor[0]; ?>', '<?php echo $array_valor[1]; ?>', '<?php echo $array_valor[2]; ?>'],
<?php
}
?>
],
labels: {
rotate: 0
}
},

//CONFIGURACION EJE Y
yaxis: {
min: <?php echo $min; ?>,
max: <?php echo $max; ?>,
title: {
text: '(KG) PESO'
}
},

//DATOS EJE Y
series: [
{
name: '(KG) Peso',
data: [
<?php
foreach($array_controles as $array_valor){
?>
<?php echo $array_valor[3]; ?>,
<?php
}
?>
]
}
],

//GRID: Fondo de Malla
grid: {
show: true,
padding: {
left: 10,
right: 10
}
},

//GROSOR DE LINEAS O BARRAS
stroke: {
width: 1,
curve: 'straight'
},

//TIPO DE LINEAS O BARRAS
fill: {
type: 'solid'
},

//TAMA�O PUNTOS DE RELACION (BOLITAS)
markers: {
size: 3,
colors: ["#95cf32"],
strokeColors: "#95cf32",
strokeWidth: 1,
hover: {
size: 5
}
}
};
var chart = new ApexCharts(document.querySelector('#chart1'), options);
chart.render();
</script>
</div>
<div class="col-md-6 text-center" style="padding-top: 70px;">
<table style="width: 250px; margin: 0 auto; border: 1px solid #95cf32;">
<tr>
<td style="width: 100% !important; text-align: center; background: #95cf32;" colspan="2"><span style="color: #fff; font-size: 16px;">Meta Final</span></td>
</tr>
<tr>
<td style="width: 50% !important; text-align: left; padding-left: 10px;"><span style="color: #111; font-weight: bold; font-size: 13px;">Talla Actual</span></td>
<td style="width: 50% !important; text-align: left; padding-left: 5px;"><span style="color: #111; font-weight: bold; font-size: 13px;">: <?php echo $ret_talla_actual; ?> m</span></td>
</tr>
<tr>
<td style="width: 50% !important; text-align: left; padding-left: 10px;"><span style="color: #111; font-weight: bold; font-size: 13px;">Peso Actual</span></td>
<td style="width: 50% !important; text-align: left; padding-left: 5px;"><span style="color: #111; font-weight: bold; font-size: 13px;">: <?php echo $ret_peso_actual; ?> KG</span></td>
</tr>
<tr>
<td style="width: 50% !important; text-align: left; padding-left: 10px;"><span style="color: #111; font-weight: bold; font-size: 13px;">Peso Meta Final</span></td>
<td style="width: 50% !important; text-align: left; padding-left: 5px;">
<?php
if($_SESSION['ID_TIPO_USUARIO'] == 1){
?>
<span style="color: #111; font-weight: bold; font-size: 13px;">: <input type="text" style="font-size: 13px; font-weight: bold; width: 40px; text-align: center;" id="input_peso_meta_general" value="<?php echo $ret_peso_meta; ?>" onblur="save_peso_meta_general()"> KG</span>
<script>
function save_peso_meta_general(){
if(confirm('Desea actualizar el Peso Meta General del Socio?')){
var peso_meta_general = $('#input_peso_meta_general').val();
$.ajax({
url: 'config/ajax.php?negocia_operacion=4&id_paciente=<?php echo $ret_id_usuario; ?>&peso_meta_general='+peso_meta_general
});
}
}
</script>
<?php
} else {
?>
<span style="color: #111; font-weight: bold; font-size: 13px;">: <?php echo $ret_peso_meta; ?> KG</span>
<?php
}
?>
</td>
</tr>
<tr>
<td style="width: 50% !important; text-align: left; padding-left: 10px;"><span style="color: #111; font-weight: bold; font-size: 13px;">Plan de acci&oacute;n</span></td>
<td style="width: 50% !important; text-align: left; padding-left: 5px;"><span style="color: #111; font-weight: bold; font-size: 13px;">: Perder <?php echo ($ret_peso_actual - $ret_peso_meta); ?> KG</span></td>
</tr>
<tr>
<td style="width: 50% !important; text-align: left; padding-left: 10px;"><span style="color: #111; font-weight: bold; font-size: 13px;">Diagn&oacute;stico IMC</span></td>
<td style="width: 50% !important; text-align: left; padding-left: 5px;"><span style="color: #111; font-weight: bold; font-size: 13px;">: <?php echo $diagnostico; ?></span></td>
</tr>
<tr>
<td style="width: 100% !important; text-align: center;" colspan="2">
<button type="button" onclick="location.href = 'historia.php?id_paciente=<?php echo $id_registro; ?>'" style="font-size: 10px; background: #95cf32; color: white; padding: 2px;">Registrar Historia</button>
</td>
</tr>
</table>
</div>
<div class="col-md-6 text-center" style="padding-top: 40px;">
<div id="chart2"></div>
<script>
var options = {

//TITULO DEL CHART
title: {
text: '(%) Grasa',
align: 'center',
style: {
fontSize: "16px",
color: '#95cf32'
}
},

//CONFIGURACION DEL CHART
chart: {
height: 350,
type: 'line',
toolbar: {
show: false
}
},

//DATOS EJE X
xaxis: {
categories: [
<?php
foreach($array_controles as $array_valor){
?>
['<?php echo $array_valor[0]; ?>', '<?php echo $array_valor[1]; ?>', '<?php echo $array_valor[2]; ?>'],
<?php
}
?>
],
labels: {
rotate: 0
}
},

//CONFIGURACION EJE Y
yaxis: {
min: <?php echo $min_grasa; ?>,
max: <?php echo $max_grasa; ?>,
title: {
text: '(%) GRASA'
}
},

//DATOS EJE Y
series: [
{
name: '(%) Grasa',
data: [
<?php
foreach($array_controles as $array_valor){
?>
<?php echo $array_valor[4]; ?>,
<?php
}
?>
]
}
],

//GRID: Fondo de Malla
grid: {
show: true,
padding: {
left: 10,
right: 10
}
},

//GROSOR DE LINEAS O BARRAS
stroke: {
width: 1,
curve: 'straight'
},

//TIPO DE LINEAS O BARRAS
fill: {
type: 'solid'
},

//TAMA�O PUNTOS DE RELACION (BOLITAS)
markers: {
size: 3,
colors: ["#95cf32"],
strokeColors: "#95cf32",
strokeWidth: 1,
hover: {
size: 5
}
}
};
var chart = new ApexCharts(document.querySelector('#chart2'), options);
chart.render();
</script>
</div>
<div class="col-md-6 text-center" style="padding-top: 40px;">
<div id="chart3"></div>
<script>
var options = {

//TITULO DEL CHART
title: {
text: '(KG) MM',
align: 'center',
style: {
fontSize: '16px',
color: '#95cf32'
}
},

//CONFIGURACION DEL CHART
chart: {
height: 350,
type: 'line',
toolbar: {
show: false
}
},

//DATOS EJE X
xaxis: {
categories: [
<?php
foreach($array_controles as $array_valor){
?>
['<?php echo $array_valor[0]; ?>', '<?php echo $array_valor[1]; ?>', '<?php echo $array_valor[2]; ?>'],
<?php
}
?>
],
labels: {
rotate: 0
}
},

//CONFIGURACION EJE Y
yaxis: {
min: <?php echo $min_mm; ?>,
max: <?php echo $max_mm; ?>,
title: {
text: '(KG) MM'
}
},

//DATOS EJE Y
series: [
{
name: '(KG) MM',
data: [
<?php
foreach($array_controles as $array_valor){
?>
<?php echo $array_valor[5]; ?>,
<?php
}
?>
]
}
],

//GRID: Fondo de Malla
grid: {
show: true,
padding: {
left: 10,
right: 10
}
},

//GROSOR DE LINEAS O BARRAS
stroke: {
width: 1,
curve: 'straight'
},

//TIPO DE LINEAS O BARRAS
fill: {
type: 'solid'
},

//TAMA�O PUNTOS DE RELACION (BOLITAS)
markers: {
size: 3,
colors: ["#95cf32"],
strokeColors: "#95cf32",
strokeWidth: 1,
hover: {
size: 5
}
}
};
var chart = new ApexCharts(document.querySelector('#chart3'), options);
chart.render();
</script>
</div>
</div>
<?php
}
?>
</div>
</div>
<?php
}

//4. SUSCRIPCIONES
if($view_controller == 4){
$location_atras = 'suscripciones.php';
$title = $ret_nombre_paciente;
?>
<div class="col-md-12" style="padding-top: 25px;">
<h4 class="font-20 weight-500 mb-10 text-capitalize">
<div class="font-30" style="padding-left: 15px; color: #95cf32; font-weight: bold;">
<?php echo $title; ?>
<br><hr>
</div>
</h4>
<br>
<table style="width: 100%;">
<tr>
<td style="width: 25%; padding-left: 15px; font-weight: bold; background: rgba(149, 207, 50, 0.5); border: 1px solid white; text-align: center;">Planes Rekupera</td>
<td style="width: 25%; padding-left: 15px; font-weight: bold; background: rgba(149, 207, 50, 0.5); border: 1px solid white; text-align: center;">Fecha Inicio</td>
<td style="width: 25%; padding-left: 15px; font-weight: bold; background: rgba(149, 207, 50, 0.5); border: 1px solid white; text-align: center;">Fecha Fin</td>
<td style="width: 25%; padding-left: 15px; font-weight: bold; background: rgba(149, 207, 50, 0.5); border: 1px solid white; text-align: center;">Estado</td>
</tr>
<tr>
<td style="width: 25%; padding-left: 15px; border: 1px solid white;"><?php echo $ret_nombre_programa; ?></td>
<td style="width: 25%; padding-left: 15px; border: 1px solid white; text-align: center;"><?php echo $ret_fecha_inicio; ?></td>
<td style="width: 25%; padding-left: 15px; border: 1px solid white; text-align: center;"><?php echo $ret_fecha_fin; ?></td>
<td style="width: 25%; padding-left: 15px; border: 1px solid white; text-align: center; color: <?php echo $css_color; ?>; font-weight: bold;"><?php echo $texto_estado; ?></td>
</tr>
</table>
</div>
<?php
}

//4. CONTROLES
if($view_controller == 5){
$location_atras = 'suscripciones.php';
$title = $ret_codigo_control.' - '.$ret_nombre_paciente;
?>
<div class="col-md-12" style="padding-top: 25px;">
<h4 class="font-20 weight-500 mb-10 text-capitalize">
<div class="font-30" style="padding-left: 15px; color: #95cf32; font-weight: bold;">
<?php echo $title; ?>
<br><hr>
</div>
</h4>
<br>
<table style="width: 100%;">
<tr>
<td style="width: 25%; padding-left: 15px; font-weight: bold; background: rgba(149, 207, 50, 0.5); border: 1px solid white; text-align: center;">Plan Rekupera</td>
<td style="width: 25%; padding-left: 15px; font-weight: bold; background: rgba(149, 207, 50, 0.5); border: 1px solid white; text-align: center;">Fecha Inicio</td>
<td style="width: 25%; padding-left: 15px; font-weight: bold; background: rgba(149, 207, 50, 0.5); border: 1px solid white; text-align: center;">Fecha Fin</td>
<td style="width: 25%; padding-left: 15px; font-weight: bold; background: rgba(149, 207, 50, 0.5); border: 1px solid white; text-align: center;">Estado</td>
</tr>
<tr>
<td style="width: 25%; padding-left: 15px; border: 1px solid white;"><?php echo $ret_nombre_programa; ?></td>
<td style="width: 25%; padding-left: 15px; border: 1px solid white; text-align: center;"><?php echo $ret_suscripcion_fecha_inicio; ?></td>
<td style="width: 25%; padding-left: 15px; border: 1px solid white; text-align: center;"><?php echo $ret_suscripcion_fecha_fin; ?></td>
<td style="width: 25%; padding-left: 15px; border: 1px solid white; text-align: center; color: <?php echo $css_color; ?>; font-weight: bold;"><?php echo $texto_estado; ?></td>
</tr>
</table>
<br>
<h4 class="font-20 weight-500 mb-10 text-capitalize">
<div style="padding-left: 15px; color: #111; font-weight: bold; font-size: 20px;">Datos Antropom&eacute;tricos</div>
</h4>
<table style="width: 100%;">
<tr>
<td style="width: 30%; padding-left: 15px; font-weight: bold; background: rgba(149, 207, 50, 0.5); border: 1px solid white;">Fecha:</td>
<td style="width: 70%; padding-left: 15px; background: rgba(149, 207, 50, 0.5); border: 1px solid white;"><?php echo $ret_fecha; ?></td>
</tr>
<tr>
<td style="width: 30%; padding-left: 15px; font-weight: bold; background: rgba(149, 207, 50, 0.5); border: 1px solid white;">Peso (Kg):</td>
<td style="width: 70%; padding-left: 15px; background: rgba(149, 207, 50, 0.5); border: 1px solid white;"><?php echo $ret_peso; ?></td>
</tr>
<tr>
<td style="width: 50%; padding-left: 15px; font-weight: bold; background: rgba(149, 207, 50, 0.5); border: 1px solid white;">IMC (%g):</td>
<td style="width: 50%; padding-left: 15px; background: rgba(149, 207, 50, 0.5); border: 1px solid white;"><?php echo $ret_imc; ?></td>
</tr>
<tr>
<td style="width: 50%; padding-left: 15px; font-weight: bold; background: rgba(149, 207, 50, 0.5); border: 1px solid white;">(%) Grasa:</td>
<td style="width: 50%; padding-left: 15px; background: rgba(149, 207, 50, 0.5); border: 1px solid white;"><?php echo $ret_p_grasa; ?></td>
</tr>
<tr>
<td style="width: 50%; padding-left: 15px; font-weight: bold; background: rgba(149, 207, 50, 0.5); border: 1px solid white;">(%) MM:</td>
<td style="width: 50%; padding-left: 15px; background: rgba(149, 207, 50, 0.5); border: 1px solid white;"><?php echo $ret_p_mm; ?></td>
</tr>
<tr>
<td style="width: 50%; padding-left: 15px; font-weight: bold; background: rgba(149, 207, 50, 0.5); border: 1px solid white;">Diagn&oacute;stico IMC:</td>
<td style="width: 50%; padding-left: 15px; background: rgba(149, 207, 50, 0.5); border: 1px solid white;">
<?php echo $ret_diagnostico; ?>
</td>
</tr>
<tr>
<td style="width: 50%; padding-left: 15px; font-weight: bold; background: rgba(149, 207, 50, 0.5); border: 1px solid white;">Brazo:</td>
<td style="width: 50%; padding-left: 15px; background: rgba(149, 207, 50, 0.5); border: 1px solid white;"><?php echo $ret_brazo; ?></td>
</tr>
<tr>
<td style="width: 50%; padding-left: 15px; font-weight: bold; background: rgba(149, 207, 50, 0.5); border: 1px solid white;">Pecho:</td>
<td style="width: 50%; padding-left: 15px; background: rgba(149, 207, 50, 0.5); border: 1px solid white;"><?php echo $ret_pecho; ?></td>
</tr>
<tr>
<td style="width: 50%; padding-left: 15px; font-weight: bold; background: rgba(149, 207, 50, 0.5); border: 1px solid white;">Cintura:</td>
<td style="width: 50%; padding-left: 15px; background: rgba(149, 207, 50, 0.5); border: 1px solid white;"><?php echo $ret_cintura; ?></td>
</tr>
<tr>
<td style="width: 50%; padding-left: 15px; font-weight: bold; background: rgba(149, 207, 50, 0.5); border: 1px solid white;">Gl&uacute;o:</td>
<td style="width: 50%; padding-left: 15px; background: rgba(149, 207, 50, 0.5); border: 1px solid white;"><?php echo $ret_gluteo; ?></td>
</tr>
<tr>
<td style="width: 50%; padding-left: 15px; font-weight: bold; background: rgba(149, 207, 50, 0.5); border: 1px solid white;">Muslo:</td>
<td style="width: 50%; padding-left: 15px; background: rgba(149, 207, 50, 0.5); border: 1px solid white;"><?php echo $ret_muslo; ?></td>
</tr>
<tr>
<td style="width: 50%; padding-left: 15px; font-weight: bold; background: rgba(149, 207, 50, 0.5); border: 1px solid white;">Pantorrilla:</td>
<td style="width: 50%; padding-left: 15px; background: rgba(149, 207, 50, 0.5); border: 1px solid white;"><?php echo $ret_pantorrilla; ?></td>
</tr>
<tr>
<td style="width: 50%; padding-left: 15px; font-weight: bold; background: rgba(149, 207, 50, 0.5); border: 1px solid white;">Tema a cargo de:</td>
<td style="width: 50%; padding-left: 15px; background: rgba(149, 207, 50, 0.5); border: 1px solid white;"><?php echo $ret_nombre_nutricionista; ?></td>
</tr>
</table>
<br>
<h4 class="font-20 weight-500 mb-10 text-capitalize">
<div style="padding-left: 15px; color: #111; font-weight: bold; font-size: 20px;">Plan de Alimentaci&oacute;n</div>
</h4>
<?php
$row_plan_alimentacion = mysqli_fetch_array(mysqli_query($con, "SELECT * FROM plan_alimentacion WHERE id = '$id_registro' LIMIT 1"));
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
?>
<table style="width: 100%; margin: 0 auto; border: 1px solid #95cf32;">
<tr>
<td style="background: #95cf32; color: #111; text-align: center; padding: 20px; font-size: 17px;"><b>HORA</b></td>
<td style="background: #95cf32; color: #111; text-align: center; padding: 20px; font-size: 17px;"><b><?php echo $horario_1; ?></b></td>
<td style="background: #95cf32; color: #111; text-align: center; padding: 20px; font-size: 17px;"><b><?php echo $horario_2; ?></b></td>
</tr>
<tr>
<td style="vertical-align: middle; padding: 20px; text-align: center;">
<b style="font-size: 17px;">DESAYUNO<br><?php echo $hora_desayuno; ?></b>
</td>
<td style="vertical-align: middle; padding: 20px; text-align: left;">
<b>Opci&oacute;n 1:</b> <?php echo $uno_opcion_1_desayuno; ?><br><br>
<b>Opci&oacute;n 2:</b> <?php echo $uno_opcion_2_desayuno; ?>
</td>
<td style="vertical-align: middle; padding: 20px; text-align: left;">
<b>Opci&oacute;n 1:</b> <?php echo $dos_opcion_1_desayuno; ?><br><br>
<b>Opci&oacute;n 2:</b> <?php echo $dos_opcion_2_desayuno; ?>
</td>
</tr>
<tr>
<td style="vertical-align: middle; padding: 10px; text-align: center; background: #FF9C00;">
<b style="font-size: 12px;">MEDIA MA&Ntilde;ANA<br><?php echo $hora_media_manana; ?></b>
</td>
<td style="vertical-align: middle; padding: 20px; text-align: center; background: #FF9C00;">
<?php echo $uno_opcion_1_media_manana; ?>
</td>
<td style="vertical-align: middle; padding: 20px; text-align: center; background: #FF9C00;">
<?php echo $dos_opcion_1_media_manana; ?>
</td>
</tr>
<tr>
<td style="vertical-align: middle; padding: 20px; text-align: center;">
<b style="font-size: 17px;">ALMUERZO<br><?php echo $hora_almuerzo; ?></b>
</td>
<td style="vertical-align: middle; padding: 20px; text-align: left;">
<b>Opci&oacute;n 1:</b> <?php echo $uno_opcion_1_almuerzo; ?><br><br>
<b>Opci&oacute;n 2:</b> <?php echo $uno_opcion_2_almuerzo; ?>
</td>
<td style="vertical-align: middle; padding: 20px; text-align: left;">
<b>Opci&oacute;n 1:</b> <?php echo $dos_opcion_1_almuerzo; ?><br><br>
<b>Opci&oacute;n 2:</b> <?php echo $dos_opcion_2_almuerzo; ?>
</td>
</tr>
<tr>
<td style="vertical-align: middle; padding: 10px; text-align: center; background: #FF9C00;">
<b style="font-size: 12px;">MEDIA TARDE<br><?php echo $hora_media_tarde; ?></b>
</td>
<td style="vertical-align: middle; padding: 10px; text-align: center; background: #FF9C00;">
<?php echo $uno_opcion_1_media_tarde; ?>
</td>
<td style="vertical-align: middle; padding: 10px; text-align: center; background: #FF9C00;">
<?php echo $dos_opcion_1_media_tarde; ?>
</td>
</tr>
<tr>
<td style="vertical-align: middle; padding: 20px; text-align: center;">
<b style="font-size: 17px;">CENA<br><?php echo $hora_cena; ?></b>
</td>
<td style="vertical-align: middle; padding: 20px; text-align: left;">
<b>Opci&oacute;n 1:</b> <?php echo $uno_opcion_1_cena; ?><br><br>
<b>Opci&oacute;n 2:</b> <?php echo $uno_opcion_2_cena; ?>
</td>
<td style="vertical-align: middle; padding: 20px; text-align: left;">
<b>Opci&oacute;n 1:</b> <?php echo $dos_opcion_1_cena; ?><br><br>
<b>Opci&oacute;n 2:</b> <?php echo $dos_opcion_2_cena; ?>
</td>
</tr>
</table>
</div>
<?php
}
?>
<div class="col-md-12 text-right" style="padding-top: 40px;">
<div class="btn-group">
<button onclick="location.href = '<?php echo $location_atras; ?>'" class="btn buttons-pdf" tabindex="0" type="button" style="background: #95cf32; color: white; padding: 8px; font-size: 16px;"><span><- Atr&aacute;s</span></button>
</div>
</div>
<?php
exit();
exit();
}

//2. PLANES DETOX / ALIMENTACION
if($negocia_operacion == 2){

//DATOS A CONSULTAR
$id_paciente = (int)$_GET['id_paciente'];
$id_plan = (int)$_GET['plan'];
?>
<table style="width: 1000px !important; margin: 25px auto; margin-bottom: 15px;">
<tr>
<td style="width: 100% !important; text-align: left;">
<button onclick="agregar_plan_paciente(<?php echo $id_paciente; ?>, <?php echo $id_plan; ?>)" type="button" class="btn" style="background: #95cf32; color: white; padding: 4px; font-size: 13px;">+ Agregar</button>
</td>
</tr>
</table>
<script>
//PLANES DETOX / ALIMENTACION
function agregar_plan_paciente(id_paciente, id_plan){
$.ajax({
type: 'POST',
url: 'config/ajax.php?negocia_operacion=3&id_paciente='+id_paciente+'&id_plan='+id_plan,
success: function(datos){
$('#div_plan_paciente').html(datos).fadeIn('slow');
}
});
}
</script>
<?php

//CONSULTA
$query_planes_alimentacion = mysqli_query($con, "SELECT id, codigo, fecha_envio FROM plan_alimentacion WHERE tipo_plan = '$id_plan' ORDER BY id ASC");
if(mysqli_num_rows($query_planes_alimentacion) > 0){
?>
<table style="width: 1000px !important; margin: 0 auto;">
<tr>
<td class="td-title" style="width: 33.3% !important;">Planes DETOX</td>
<td class="td-title" style="width: 33.3% !important;">Fecha de Env&iacute;o</td>
<td class="td-title" style="width: 33.3% !important;">Acci&oacute;n</td>
</tr>
<?php
while($row_suscripcion = mysqli_fetch_array($query_planes_alimentacion)){
$id_plan = $row_suscripcion[0];
$codigo_plan = $row_suscripcion[1];
$fecha_envio = $row_suscripcion[2];
if(!empty($row_suscripcion[2])){
$fecha_envio = date('d/m/Y', strtotime($row_suscripcion[2]));
}
?>
<tr class="tr-hover" style="cursor: pointer;">
<td class="td-content" style="width: 33.3% !important;"><?php echo $codigo_plan; ?></td>
<td class="td-content" style="width: 33.3% !important;"><?php echo $fecha_envio; ?></td>
<td class="td-content" style="width: 33.3% !important; font-weight: bold;">
<a href="javascript:void(0)"><i class="fa fa-eye" style="font-size: 13px;"></i></a>
</td>
</tr>
<?php
}
?>
</table>
<?php
} else {
echo 'No hay resultados.';
}
exit();
exit();
}

//3. NUEVO PLAN
if($negocia_operacion == 3){

//NUEVO PLAN
require_once(__DIR__.'/fn_planes.php');

//DATOS A CONSULTAR
$id_paciente = (int)$_GET['id_paciente'];
$id_plan = (int)$_GET['id_plan'];
$id_tabla = (int)$_GET['id_tabla'];

//DATOS DEL PLAN DE ALIMENTACION
$row_plan_alimentacion = mysqli_fetch_array(mysqli_query($con, "SELECT * FROM plan_alimentacion WHERE id = '$id_tabla' ORDER BY id DESC LIMIT 1"));

//FECHA DE PLAN
if(empty($id_tabla)){
$nuevo_plan = 1;
$editar = 0;
$fecha_plan = date('Y-m-d', strtotime(date('Y-m-d').'+ 1 days'));
$fecha_envio = date('Y-m-d');
$pa_id_control = 0;
} else {
$nuevo_plan = 0;
$editar = 1;
$fecha_plan = date('Y-m-d', strtotime($row_plan_alimentacion['fecha_realizar']));
$fecha_envio = date('Y-m-d', strtotime($row_plan_alimentacion['fecha_envio']));
$pa_id_control = (int)$row_plan_alimentacion['id_control'];
}
?>
<div class="row">
<div class="col-md-12">
<div class="row">
<div class="col-md-2">
<b style="font-size: 13px;">Controles Disponibles:</b><br>
<select id="fn_id_control" class="form-control" style="font-size: 12px;">
<?php
$query_control_disponible = mysqli_query($con, "SELECT id, codigo FROM control WHERE id_paciente = '$id_paciente' AND id NOT IN (SELECT id_control FROM plan_alimentacion WHERE id_paciente = '$id_paciente') ORDER BY id DESC");
while($row_cd = mysqli_fetch_array($query_control_disponible)){
$cd_id = (int)$row_cd[0];
$cd_codigo = $row_cd[1];
?>
<option value="<?php echo $cd_id; ?>" <?php if($pa_id_control == $cd_id){ ?> selected="selected" <?php } ?>><?php echo $cd_codigo; ?></option>
<?php
}
?>
</select>
</div>
<div class="col-md-2">
<b style="font-size: 13px;">Fecha de Env&iacute;o:</b><br>
<input id="fn_fecha_envio" type="date" class="form-control" style="font-size: 12px;" value="<?php echo $fecha_envio; ?>">
</div>
<div class="col-md-2">
<b style="font-size: 13px;">Realizar el d&iacute;a:</b><br>
<input id="id_fecha_pa" type="date" class="form-control" style="font-size: 12px;" value="<?php echo $fecha_plan; ?>">
</div>
</div>
</div>
<?php
$al = mysqli_fetch_array(mysqli_query($con, "SELECT alimentos_no_gustar FROM historia WHERE id_paciente = '$id_paciente' LIMIT 1"));
$alimentos_no_gustar = $al[0];
if(!empty($alimentos_no_gustar)){
?>
<div class="col-md-12">
<div style="background: rgba(242, 108, 60, 0.2); width: 100%; border-radius: 5px; padding-left: 10px; margin-bottom: 10px;">
<br>
<b style="font-size: 13px;">Alimentos que no le gustan:</b><br>
<span style="font-size: 13px;">
<?php
echo $alimentos_no_gustar;
?>
</span>
<br><br>
</div>
</div>
<?php
}
?>
<div class="col-md-12">
<?php
$array = array($id_tabla, $nuevo_plan, $id_plan, $id_paciente, $editar);
$fn_html = html_plan($array);
echo $fn_html;
?>
<div style="text-align: center; margin-top: 25px;">
<button id="btn_guardar_datos" type="button" class="btn" style="background: #95cf32; color: white; padding: 4px; font-size: 13px;">Guardar</button>
<button onclick="complete_datos(<?php echo $id_paciente; ?>)" type="button" class="btn" style="background: #F26C3C; color: white; padding: 4px; font-size: 13px;">Cancelar</button>
</div>
<script>
$('#btn_guardar_datos').on('click', function(){
var fp_title_1 = $('#fp_title_1').val();
var fp_title_2 = $('#fp_title_2').val();
var fp_title_3 = $('#fp_title_3').val();
var id_fecha_pa = $('#id_fecha_pa').val();
var fp_hora_desayuno = $('#fp_hora_desayuno').val();
var fp_uno_opcion_1_desayuno = $('#fp_uno_opcion_1_desayuno').val();
var fp_uno_opcion_2_desayuno = $('#fp_uno_opcion_2_desayuno').val();
var fp_dos_opcion_1_desayuno = $('#fp_dos_opcion_1_desayuno').val();
var fp_dos_opcion_2_desayuno = $('#fp_dos_opcion_2_desayuno').val();
var fp_hora_media_manana = $('#fp_hora_media_manana').val();
var fp_uno_opcion_1_media_manana = $('#fp_uno_opcion_1_media_manana').val();
var fp_dos_opcion_1_media_manana = $('#fp_dos_opcion_1_media_manana').val();
var fp_hora_almuerzo = $('#fp_hora_almuerzo').val();
var fp_uno_opcion_1_almuerzo = $('#fp_uno_opcion_1_almuerzo').val();
var fp_uno_opcion_2_almuerzo = $('#fp_uno_opcion_2_almuerzo').val();
var fp_dos_opcion_1_almuerzo = $('#fp_dos_opcion_1_almuerzo').val();
var fp_dos_opcion_2_almuerzo = $('#fp_dos_opcion_2_almuerzo').val();
var fp_hora_media_tarde = $('#fp_hora_media_tarde').val();
var fp_uno_opcion_1_media_tarde = $('#fp_uno_opcion_1_media_tarde').val();
var fp_dos_opcion_1_media_tarde = $('#fp_dos_opcion_1_media_tarde').val();
var fp_hora_cena = $('#fp_hora_cena').val();
var fp_uno_opcion_1_cena = $('#fp_uno_opcion_1_cena').val();
var fp_uno_opcion_2_cena = $('#fp_uno_opcion_2_cena').val();
var fp_dos_opcion_1_cena = $('#fp_dos_opcion_1_cena').val();
var fp_dos_opcion_2_cena = $('#fp_dos_opcion_2_cena').val();
var id_paciente = <?php echo $id_paciente; ?>;
var id_plan = <?php echo $id_plan; ?>;
var id_tabla = <?php echo $id_tabla; ?>;
var fn_id_control = $('#fn_id_control').val();
var fn_fecha_envio = $('#fn_fecha_envio').val();
var fn_indicaciones = $('#fn_indicaciones').val();

$.ajax({
type: 'POST',
url: 'config/content.php?negocia_operacion=10',
data: {
fp_title_1 : fp_title_1,
fp_title_2 : fp_title_2,
fp_title_3 : fp_title_3,
id_fecha_pa : id_fecha_pa,
fp_hora_desayuno : fp_hora_desayuno,
fp_uno_opcion_1_desayuno : fp_uno_opcion_1_desayuno,
fp_uno_opcion_2_desayuno : fp_uno_opcion_2_desayuno,
fp_dos_opcion_1_desayuno : fp_dos_opcion_1_desayuno,
fp_dos_opcion_2_desayuno : fp_dos_opcion_2_desayuno,
fp_hora_media_manana : fp_hora_media_manana,
fp_uno_opcion_1_media_manana : fp_uno_opcion_1_media_manana,
fp_dos_opcion_1_media_manana : fp_dos_opcion_1_media_manana,
fp_hora_almuerzo : fp_hora_almuerzo,
fp_uno_opcion_1_almuerzo : fp_uno_opcion_1_almuerzo,
fp_uno_opcion_2_almuerzo : fp_uno_opcion_2_almuerzo,
fp_dos_opcion_1_almuerzo : fp_dos_opcion_1_almuerzo,
fp_dos_opcion_2_almuerzo : fp_dos_opcion_2_almuerzo,
fp_hora_media_tarde : fp_hora_media_tarde,
fp_uno_opcion_1_media_tarde : fp_uno_opcion_1_media_tarde,
fp_dos_opcion_1_media_tarde : fp_dos_opcion_1_media_tarde,
fp_hora_cena : fp_hora_cena,
fp_uno_opcion_1_cena : fp_uno_opcion_1_cena,
fp_uno_opcion_2_cena : fp_uno_opcion_2_cena,
fp_dos_opcion_1_cena : fp_dos_opcion_1_cena,
fp_dos_opcion_2_cena : fp_dos_opcion_2_cena,
id_paciente : id_paciente,
id_plan : id_plan,
id_tabla : id_tabla,
fn_id_control : fn_id_control,
fn_fecha_envio : fn_fecha_envio,
fn_indicaciones : fn_indicaciones
},
success: function(datos){
complete_datos(id_paciente);
}
});
});
</script>
</div>
</div>
<?php
exit();
exit();
}

//4. ACTUALIZAR PESO META GENERAL
if($negocia_operacion == 4){

//DATOS GET
$id_paciente = (int)$_GET['id_paciente'];
$peso_meta_general = (float)$_GET['peso_meta_general'];
mysqli_query($con, "UPDATE historia SET peso_meta = '$peso_meta_general' WHERE id_paciente = '$id_paciente'");

exit();
exit();
}

//5. TERMINAR SUSCRIPCION
if($negocia_operacion == 5){

//DATOS GET
$id_suscripcion = (int)$_GET['id_suscripcion'];
mysqli_query($con, "UPDATE suscripcion_programa SET estado = '2' WHERE id = '$id_suscripcion'");

exit();
exit();
}

//6. ACTUALIZAR PESO META DE LA SUSCRIPCION
if($negocia_operacion == 6){

//DATOS GET
$id_suscripcion = (int)$_GET['id_suscripcion'];
$peso_meta_general = (float)$_GET['peso_meta_general'];
mysqli_query($con, "UPDATE suscripcion_programa SET peso_meta = '$peso_meta_general' WHERE id = '$id_suscripcion'");

exit();
exit();
}

//ELIMINAR
if(isset($_GET['id'])){

//ID DEL MOVIMIENTO
$id = (int)$_GET['id'];

//UPDATE
if($view_controller == 2 || $view_controller == 10){
$query_datos_movimiento = mysqli_query($con, "UPDATE usuario SET activo = '0' WHERE id_tipo_usuario != 3 AND id = '$id'");
}
if($view_controller == 3){
$query_datos_movimiento = mysqli_query($con, "DELETE FROM plan_alimentacion WHERE id = '$id'");
}
if($view_controller == 4){
$query_datos_movimiento = mysqli_query($con, "DELETE FROM suscripcion_programa WHERE id = '$id'");
}
if($view_controller == 5){
$query_datos_movimiento = mysqli_query($con, "DELETE FROM control WHERE id = '$id'");
}
if($view_controller == 6){
$query_datos_movimiento = mysqli_query($con, "DELETE FROM cobro WHERE id = '$id'");
}
if($view_controller == 7){
$query_datos_movimiento = mysqli_query($con, "DELETE FROM receta WHERE id = '$id'");
}
if($view_controller == 8){
$query_datos_movimiento = mysqli_query($con, "DELETE FROM agenda WHERE id = '$id'");
}


//MOSTRAR MENSAJE (SUCCESS)
?>
<script>
alert('Eliminado correctamente');
load(1);
</script>
<?php
}

//PAGINACION
$page = (int)$_POST['page'];
$per_page = 20;
$adjacents  = 4;
$offset = ($page - 1) * $per_page;
$action = $_POST['action'];

if($action == 'ajax'){

//FILTROS
$activos = (int)$_POST['activos'];
$fn_id_paciente = (int)$_POST['paciente'];
$fn_id_suscripcion = (int)$_POST['fn_id_suscripcion'];
$id_tipo_usuario = 2;
$id_registro = 0;

$ver_pacientes = (int)$_POST['ver_pacientes'];
$ver_nutricionistas = (int)$_POST['ver_nutricionistas'];
$ver_vendedores = (int)$_POST['ver_vendedores'];

//FILTROS MODAL
$n_fecha_desde = $_POST['n_fecha_desde'];
$n_fecha_hasta = $_POST['n_fecha_hasta'];
$filtro_socio = $_POST['filtro_socio'];
$filtro_correo = $_POST['filtro_correo'];
$filtro_cumple_dia = $_POST['filtro_cumple_dia'];
$filtro_cumple_mes = $_POST['filtro_cumple_mes'];
$filtro_estado = $_POST['filtro_estado'];
$filtro_paquete = $_POST['filtro_paquete'];
$filtro_plan = $_POST['filtro_plan'];
$filtro_id_nutricionista = $_POST['filtro_id_nutricionista'];

$filtro_medio_pago = $_POST['filtro_medio_pago'];
$filtro_cuenta_bancaria = $_POST['filtro_cuenta_bancaria'];
$filtro_numero_operacion = $_POST['filtro_numero_operacion'];

//ARRAY FILTROS
$array_filtros = array($view_controller, $activos, $id_tipo_usuario, $offset, $per_page, $id_registro, $fn_id_paciente, $fn_id_suscripcion, $n_fecha_desde, $n_fecha_hasta, $ver_pacientes, $ver_nutricionistas, $ver_vendedores,


$filtro_socio,
$filtro_correo,
$filtro_cumple_dia,
$filtro_cumple_mes,
$filtro_estado,
$filtro_paquete,
$filtro_plan,
$filtro_id_nutricionista,

$filtro_medio_pago,
$filtro_cuenta_bancaria,
$filtro_numero_operacion
);

//FUNCION
$funcion_datos = consulta($array_filtros);

//CONSULTA
$consulta = $funcion_datos[0];
$numrows_query = mysqli_query($con, $consulta);
$numrows = mysqli_num_rows($numrows_query);
$total_pages = ceil($numrows/$per_page);

if($numrows > 0){

//PACIENTES Y NUTRICIONISTAS
if($view_controller == 2 || $view_controller == 10 || $view_controller == 15){
?>
<table style="width: 1000px !important; margin: 0 auto;">
<tr>
<td class="td-title" style="width: 11.11% !important;">N&#176; Socio</td>
<td class="td-title" style="width: 11.11% !important;">Nombres</td>
<td class="td-title" style="width: 11.11% !important;">Apellidos</td>
<td class="td-title" style="width: 11.11% !important;">G&eacute;nero</td>
<td class="td-title" style="width: 11.11% !important;">Edad</td>
<td class="td-title" style="width: 11.11% !important;">Correo</td>
<td class="td-title" style="width: 11.11% !important;">Tel&eacute;fono</td>
<td class="td-title" style="width: 11.11% !important;">Estado</td>
<td class="td-title" style="width: 11.11% !important;">Acci&oacute;n</td>
</tr>
<?php
$array_funcion = $funcion_datos[1];
foreach($array_funcion as $row){

//DATOS DE LA CONSULTA
$ret_codigo = $row[0];
$ret_nombres = $row[1];
$ret_apellidos = $row[2];
$ret_genero = $row[3];
$ret_fecha_nacimiento = date('d/m/Y', strtotime($row[4]));
$ret_correo = $row[5];
$ret_telefono = $row[6];
$ret_estado = $row[7];
$ret_id_tipo_usuario = $row[8];
$ret_id_usuario = $row[9];
$ret_id_tipo_documento = $row[10];
$ret_numero_documento = $row[11];
$ret_texto_tipo_documento = $row[12];
$texto_genero = $row[13];
$css_color = $row[14];
$texto_estado = $row[15];
$ret_texto_edad = $row[16].' a&ntilde;os';
?>
<tr class="tr-hover" style="cursor: pointer;">
<td class="td-content" style="width: 11.11% !important;" onclick="visualizar(<?php echo $ret_id_usuario; ?>)"><?php echo $ret_codigo; ?></td>
<td class="td-content" style="width: 11.11% !important;" onclick="visualizar(<?php echo $ret_id_usuario; ?>)"><?php echo $ret_nombres; ?></td>
<td class="td-content" style="width: 11.11% !important;" onclick="visualizar(<?php echo $ret_id_usuario; ?>)"><?php echo $ret_apellidos; ?></td>
<td class="td-content" style="width: 11.11% !important;" onclick="visualizar(<?php echo $ret_id_usuario; ?>)"><?php echo $texto_genero; ?></td>
<td class="td-content" style="width: 11.11% !important;" onclick="visualizar(<?php echo $ret_id_usuario; ?>)"><?php echo $ret_texto_edad; ?></td>
<td class="td-content" style="width: 11.11% !important;" onclick="visualizar(<?php echo $ret_id_usuario; ?>)"><?php echo $ret_correo; ?></td>
<td class="td-content" style="width: 11.11% !important;" onclick="visualizar(<?php echo $ret_id_usuario; ?>)"><?php echo $ret_telefono; ?></td>
<td class="td-content" style="width: 11.11% !important;" onclick="visualizar(<?php echo $ret_id_usuario; ?>)"><?php echo $texto_estado; ?></td>
<td class="td-content" style="width: 11.11% !important;">
<a href="javascript:void(0)" data-toggle="tooltip" data-placement="top" title="Editar"><i class="fa fa-edit" style="font-size: 13px; margin-right: 5px;"></i></a>
<?php
if($ret_id_tipo_usuario != 3){
?>
<a href="javascript:void(0)" data-toggle="tooltip" data-placement="top" title="Eliminar" onclick="eliminar(<?php echo $ret_id_usuario; ?>)"><i class="fa fa-trash-o" style="font-size: 13px;"></i></a>
<?php
}
?>
</td>
</tr>
<?php
}
?>
<tr>
<td class="td-content" style="text-align: right !important;" colspan="8"><?php echo paginate($page, $total_pages, $adjacents, 'load'); ?></td>
</tr>
</table>
<?php
}

//SUSCRIPCIONES
if($view_controller == 4){
?>
<table style="width: 1100px !important; margin: 0 auto;">
<?php
if($ver_pacientes == 1){
?>
<tr>
<td class="td-title" style="width: 4% !important;">N&#176;</td>
<td class="td-title" style="width: 12% !important;">Socio</td>
<td class="td-title" style="width: 8% !important;">Correo</td>
<td class="td-title" style="width: 7% !important;">Cumplea&ntilde;os</td>
<td class="td-title" style="width: 7% !important;">Fecha Venta</td>
<td class="td-title" style="width: 7% !important;">Paquete</td>
<td class="td-title" style="width: 7% !important;">Plan</td>
<td class="td-title" style="width: 7% !important;">Inicio<br>del plan</td>
<td class="td-title" style="width: 7% !important;">Fin<br>del Plan</td>
<td class="td-title" style="width: 7% !important;">Fecha<br>cuota</td>
<td class="td-title" style="width: 7% !important;">Vencimiento</td>
<td class="td-title" style="width: 8% !important;">Estado</td>
<td class="td-title" style="width: 12% !important;">Nutricionista</td>
</tr>
<?php
} else {
?>
<tr>
<td class="td-title" style="width: 10% !important;">Fecha Venta</td>
<td class="td-title" style="width: 15% !important;">Paciente</td>
<td class="td-title" style="width: 10% !important;">Paquete</td>
<td class="td-title" style="width: 10% !important;">Plan</td>
<td class="td-title" style="width: 10% !important;">Condici&oacute;n</td>
<td class="td-title" style="width: 10% !important;">Banco</td>
<td class="td-title" style="width: 10% !important;">Medio Pago</td>
<td class="td-title" style="width: 10% !important;">N&#176; de Op.</td>
<td class="td-title" style="width: 15% !important;">Nutricionista</td>
</tr>
<?php
}

$array_funcion = $funcion_datos[1];
foreach($array_funcion as $row){

//DATOS DE LA CONSULTA
$ret_id_suscripcion = $row[0];
$ret_id_programa = $row[1];
$ret_id_nutricionista = $row[2];
$ret_id_paciente = $row[3];
$ret_fecha_inicio = date('d/m/Y', strtotime($row[4]));
$ret_fecha_fin = date('d/m/Y', strtotime($row[5]));
$ret_estado = $row[6];
$ret_nombre_paciente = $row[7];
$ret_nombre_nutricionista = $row[8];
$ret_nombre_programa = $row[9];
$css_color = $row[10];
$texto_estado = $row[11];
$ret_fecha_venta = date('d/m/Y', strtotime($row[12]));
$ret_monto_venta = $row[13];
$ret_id_medio_pago = $row[14];
$ret_id_cuenta_bancaria = $row[15];
$ret_nombre_medio_pago = $row[16];
$ret_nombre_cuenta_bancaria = $row[17];
$ret_id_paquete = $row[18];
$ret_nombre_paquete = $row[19];

//NUEVOS CAMPOS
$ret_codigo = $row[20];
$ret_nombres = $row[21];
$ret_apellidos = $row[22];
$ret_genero = $row[23];
$ret_edad_paciente = $row[24];
$ret_correo = $row[25];
$ret_telefono = $row[26];
$ret_texto_estado = $row[27];

//TIPO DE SUSCRIPCION
$ret_id_tipo_suscripcion = $row[29];
$text_tipo_suscripcion = $row[30];

$ret_numero_operacion = $row[31];
$ret_dia_cumpleanos = $row[32];

if($ver_pacientes == 1){
$date1 = new DateTime(date('Y-m-d'));
$date2 = new DateTime(date('Y-m-d', strtotime($row[5])));
$diff = $date1->diff($date2);
$ret_dias_vencimiento = $diff->days.' d&iacute;as';
?>
<tr class="tr-hover" style="cursor: pointer;">
<td class="td-content" style="width: 4% !important;"><?php echo $ret_codigo; ?></td>
<td class="td-content" style="width: 12% !important;"><?php echo $ret_nombre_paciente; ?></td>
<td class="td-content" style="width: 8% !important;"><?php echo $ret_correo; ?></td>
<td class="td-content" style="width: 7% !important;"><?php echo $ret_dia_cumpleanos; ?></td>
<td class="td-content" style="width: 7% !important;"><?php echo $ret_fecha_venta; ?></td>
<td class="td-content" style="width: 7% !important;"><?php echo $ret_nombre_paquete; ?></td>
<td class="td-content" style="width: 7% !important;"><?php echo $ret_nombre_programa; ?></td>
<td class="td-content" style="width: 7% !important;" onclick="act_fecha_fin(1, '<?php echo date('Y-m-d', strtotime($row[4])); ?>', <?php echo $ret_id_suscripcion; ?>)"><?php echo $ret_fecha_inicio; ?></td>
<td class="td-content" style="width: 7% !important;" onclick="act_fecha_fin(2, '<?php echo date('Y-m-d', strtotime($row[5])); ?>', <?php echo $ret_id_suscripcion; ?>)"><?php echo $ret_fecha_fin; ?></td>
<td class="td-content" style="width: 7% !important;" onclick="act_fecha_fin(2, '<?php echo date('Y-m-d', strtotime($row[5])); ?>', <?php echo $ret_id_suscripcion; ?>)"><?php echo $ret_fecha_fin; ?></td>
<td class="td-content" style="width: 7% !important;"><?php echo $ret_dias_vencimiento; ?></td>
<td class="td-content" style="width: 8% !important;"><?php echo $ret_texto_estado; ?></td>
<td class="td-content" style="width: 12% !important;"><?php echo $ret_nombre_nutricionista; ?></td>
</tr>
<?php
} else {
?>
<tr class="tr-hover" style="cursor: pointer;">
<td class="td-content" style="width: 10% !important;"><?php echo $ret_fecha_venta; ?></td>
<td class="td-content" style="width: 15% !important;"><?php echo $ret_nombre_paciente; ?></td>
<td class="td-content" style="width: 10% !important;"><?php echo $ret_nombre_paquete; ?></td>
<td class="td-content" style="width: 10% !important;"><?php echo $ret_nombre_programa; ?></td>
<td class="td-content" style="width: 10% !important;"><?php echo $text_tipo_suscripcion; ?></td>
<td class="td-content" style="width: 10% !important;"><?php echo $ret_nombre_cuenta_bancaria; ?></td>
<td class="td-content" style="width: 10% !important;"><?php echo $ret_nombre_medio_pago; ?></td>
<td class="td-content" style="width: 10% !important;"><?php echo $ret_numero_operacion; ?></td>
<td class="td-content" style="width: 15% !important;"><?php echo $ret_nombre_nutricionista; ?></td>
</tr>
<?php
}
}
?>
<tr>
<td class="reportes_th_tabla_principal" style="text-align: right !important;" colspan="7"><?php echo paginate($page, $total_pages, $adjacents, 'load'); ?></td>
</tr>
</table>
<?php
}

//CONTROLES
if($view_controller == 5){
    
$fn_id_suscripcion = (int)$_POST['fn_id_suscripcion'];

//OBTENER DATOS DE LA SUSCRIPCION
$datos_suscripcion = mysqli_fetch_array(mysqli_query($con, "SELECT * FROM suscripcion_programa WHERE id = '$fn_id_suscripcion' LIMIT 1"));

//ID CONSULTAR
$id_registro = (int)$datos_suscripcion['id_paciente'];
$peso_meta_suscripcion = (float)$datos_suscripcion['peso_meta'];

//ARRAY FILTROS
$array_filtros = array(2, 0, 2, 0, 1, $id_registro, '', '', '', '', 1, '', '');

//FUNCION
$funcion_datos = consulta($array_filtros);

//CONSULTA
$array_funcion = $funcion_datos[1];
foreach($array_funcion as $row){
$ret_codigo = $row[0];
$ret_nombres = $row[1];
$ret_apellidos = $row[2];
$ret_genero = $row[3];
$ret_fecha_nacimiento = date('d/m/Y', strtotime($row[4]));
$ret_correo = $row[5];
$ret_telefono = $row[6];
$ret_estado = $row[7];
$ret_id_tipo_usuario = $row[8];
$ret_id_usuario = $row[9];
$ret_id_tipo_documento = $row[10];
$ret_numero_documento = $row[11];
$ret_texto_tipo_documento = $row[12];
$texto_genero = $row[13];
$css_color = $row[14];
$texto_estado = $row[15];
$ret_texto_edad = $row[16].' a&ntilde;os';
$ret_date_added = date('d/m/Y', strtotime($row[17]));
$ret_instagram = $row[18];
$ret_direccion = $row[19];
$ret_distrito = $row[20];
$ret_provincia = $row[21];
$ret_departamento = $row[22];
$ret_residencia = $row[23];
$ret_maximo_pacientes = $row[24];
$ret_peso_meta = $row[25];
$ret_peso_actual = $row[26];
$ret_talla_actual = $row[27];
$ret_imc_actual = $row[28];
$ret_edad_en_anos = $row[29];
$ret_edad_en_meses = $row[30];
$diagnostico = $row[31];
}

$title = '('.$ret_codigo.') '.$ret_nombres.' '.$ret_apellidos;

//PESO PRIMER CONTROL DE LA SUSCRIPCION
$query_primero_peso = mysqli_fetch_array(mysqli_query($con, "SELECT peso FROM control WHERE id_suscripcion = '$fn_id_suscripcion' ORDER BY id ASC LIMIT 1"));
$ret_peso_primer_control = (float)$query_primero_peso[0];

//PERDISTE
$perdiste = $ret_peso_primer_control - $ret_peso_actual;

//TOTAL KILOS A BAJAR
$total_kg_bajar = $ret_peso_primer_control - $peso_meta_suscripcion;

//PORCENTAJE
$porcentaje_logo = ROUND((($perdiste * 100) / $total_kg_bajar), 2);
?>
<div style="padding-left: 15px; color: #95cf32; font-weight: bold; font-size: 20px;">
<?php echo $title; ?><br>
<span style="color: #111; font-weight: bold; font-size: 13px;">Peso Meta General: <?php echo $ret_peso_meta; ?> KG</span>
<br><hr>
</div>
<h4 class="font-20 weight-500 mb-10 text-capitalize">
<div style="text-align: center;">
<span style="color: #333; font-weight: bold; font-size: 13px;">Peso Actual:&nbsp;&nbsp;</span><span style="color: #95cf32; font-weight: bold; font-size: 13px;"><?php echo $ret_peso_actual; ?> KG</span>
</div>
<div style="text-align: center;">
<span style="color: #333; font-weight: bold; font-size: 13px;">Perdiste:&nbsp;&nbsp;</span><span style="color: #333; font-weight: bold; font-size: 13px;"><?php echo $perdiste; ?> KG</span>
</div>
<div style="text-align: center; width: 200px; margin: 0 auto; margin-top: 10px;">
<div class="progress">
<div class="progress-bar progress-bar-animated" role="progressbar" style="width: <?php echo $porcentaje_logo; ?>%; background: #95cf32;" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"><?php echo $porcentaje_logo; ?>%</div>
</div>
<span style="float: left; font-size: 10px; font-weight: bold;"><?php echo $ret_peso_primer_control; ?>KG</span>
<span style="float: right; font-size: 10px; font-weight: bold;">
<?php
if($_SESSION['ID_TIPO_USUARIO'] == 1){
?>
Meta Plan: <input type="text" style="font-size: 10px; font-weight: bold; width: 35px; text-align: center; height: 15px;" id="input_peso_meta_general" value="<?php echo $peso_meta_suscripcion; ?>" onblur="save_peso_meta_general()"> KG
<script>
function save_peso_meta_general(){
if(confirm('Desea actualizar el Peso Meta de la suscripci\u00F3n?')){
var peso_meta_general = $('#input_peso_meta_general').val();
$.ajax({
url: 'config/ajax.php?negocia_operacion=6&id_suscripcion=<?php echo $fn_id_suscripcion; ?>&peso_meta_general='+peso_meta_general
});
}
}
</script>
<?php
} else {
?>
Meta Plan: <?php echo $peso_meta_suscripcion; ?>KG
<?php
}
?>
</span>
</div>
</h4><br><br>
<?php
if($_SESSION['ID_TIPO_USUARIO'] == 1){
?>
<button onclick="location.href='medidas.php?id_paciente=<?php echo $id_registro; ?>'" type="button" class="btn" style="background: #95cf32; color: white; padding: 3px; font-size: 12px; margin-bottom: 20px;">Agregar Control</button>
<?php
}
?>
<div class="table-responsive">
<table style="width: 1000px !important; margin: 0 auto;">
<tr>
<td class="td-title" style="width: 5.55% !important;">Foto</td>
<td class="td-title" style="width: 5.55% !important;">Control</td>
<td class="td-title" style="width: 5.55% !important;">Fecha</td>
<td class="td-title" style="width: 5.55% !important;">Peso(Kg)</td>
<td class="td-title" style="width: 5.55% !important;">IMC</td>
<td class="td-title" style="width: 5.55% !important;">Diagn&oacute;stico (IMC)</td>
<td class="td-title" style="width: 5.55% !important;">MM(Kg)</td>
<td class="td-title" style="width: 5.55% !important;">(%)Grasa</td>
<td class="td-title" style="width: 5.55% !important;">Diagn&oacute;stico (% Grasa)</td>
<td class="td-title" style="width: 5.55% !important;">Cuello(cm)</td>
<td class="td-title" style="width: 5.55% !important;">Brazo(cm)</td>
<td class="td-title" style="width: 5.55% !important;">Pecho(cm)</td>
<td class="td-title" style="width: 5.55% !important;">Cintura(cm)</td>
<td class="td-title" style="width: 5.55% !important;">Gl&uacute;teo(cm)</td>
<td class="td-title" style="width: 5.55% !important;">Muslo(cm)</td>
<td class="td-title" style="width: 5.55% !important;">Pantorrilla(cm)</td>
<td class="td-title" style="width: 5.55% !important;">P.D.</td>
<td class="td-title" style="width: 5.55% !important;">P.A.</td>
<td class="td-title" style="width: 5.55% !important;">Monitoreo</td>
</tr>
<?php
//GENERO DEL PACIENTE
$row_genero = mysqli_fetch_array(mysqli_query($con, "SELECT genero FROM usuario WHERE id_tipo_usuario = 2 AND id = '$id_registro' LIMIT 1"));
$genero_paciente = (int)$row_genero[0];

//OBTENER CONTROLES DE LA SUSCRIPCION
$sql_controles = mysqli_query($con, "SELECT DATE_FORMAT(fecha, '%Y-%m-%d'), codigo, id_suscripcion, peso, talla, cuello, brazo, pecho, cintura, gluteo, muslo, pantorrilla, id_paciente FROM control WHERE id_suscripcion = '$fn_id_suscripcion' ORDER BY DATE_FORMAT(fecha, '%Y-%m-%d') ASC");
$array_controles;
$i_controles = 0;
while($row_controles = mysqli_fetch_array($sql_controles)){
$control_fecha = date('d/m/y', strtotime($row_controles[0]));
$control_codigo = $row_controles[1];
$control_id_suscripcion = (int)$row_controles[2];
$control_peso = (float)$row_controles[3];
$control_talla = (float)$row_controles[4];
$control_cuello = (float)$row_controles[5];
$control_brazo = (float)$row_controles[6];
$control_pecho = (float)$row_controles[7];
$control_cintura = (float)$row_controles[8];
$control_gluteo = (float)$row_controles[9];
$control_muslo = (float)$row_controles[10];
$control_pantorrilla = (float)$row_controles[11];
$control_id_paciente = (float)$row_controles[12];

if(empty($control_talla)){
$ret_imc = 0;
} else {
$ret_imc = $control_peso / ($control_talla * $control_talla);
}

//VALIDAD PUNTOS DE CORTE CARTILLA AZUL
$ret_edad_total_anos = $ret_edad_en_anos + ($ret_edad_en_meses / 12);
$ret_edad_total_anos_primera_cartilla = 59 + (9 / 12);
if($ret_edad_total_anos <= $ret_edad_total_anos_primera_cartilla){

if($ret_imc >= 40){
$diagnostico = 'Obesidad III';
} elseif($ret_imc >= 35){
$diagnostico = 'Obesidad II';
} elseif($ret_imc >= 30){
$diagnostico = 'Obesidad I';
} elseif($ret_imc >= 25){
$diagnostico = 'Sobrepeso';
} elseif($ret_imc >= 18.5){
$diagnostico = 'Normal';
} elseif($ret_imc >= 17){
$diagnostico = 'Delgadez I';
} elseif($ret_imc >= 16){
$diagnostico = 'Delgadez II';
} elseif($ret_imc < 16){
$diagnostico = 'Delgadez III';
}
}

//VALIDAD PUNTOS DE CORTE CARTILLA AMARILLA
elseif($ret_edad_en_anos >= 60){

if($ret_imc >= 32){
$diagnostico = 'Obesidad';
} elseif($ret_imc >= 28 && $ret_imc <= 32){
$diagnostico = 'Sobrepeso';
} elseif($ret_imc >= 23 && $ret_imc <= 28){
$diagnostico = 'Normal';
} elseif($ret_imc >= 21 && $ret_imc <= 23){
$diagnostico = 'Delgadez';
} elseif($ret_imc >= 19 && $ret_imc <= 21){
$diagnostico = 'Delgadez';
} elseif($ret_imc < 9){
$diagnostico = 'Delgadez';
}
} else {
$diagnostico = 'Sin Diagn&oacute;stico';
}

$talla_en_cm = $control_talla * 100;

//% GRASA HOMBRES
if($genero_paciente == 1){
$porcentaje_grasa = 495 / (1.0324 - 0.19077 * (log10($control_cintura - $control_cuello)) + 0.15456*(log10($talla_en_cm)))-450;

//DIAGNOSTICO
if($porcentaje_grasa >= 26){
$diagnostico_grasa = 'Obesidad';
} elseif($porcentaje_grasa >= 18 && $porcentaje_grasa <= 25){
$diagnostico_grasa = 'Aceptable';
} elseif($porcentaje_grasa >= 14 && $porcentaje_grasa <= 17){
$diagnostico_grasa = 'Fitness';
} elseif($porcentaje_grasa >= 6 && $porcentaje_grasa <= 13){
$diagnostico_grasa = 'Atleta';
} elseif($porcentaje_grasa >= 2 && $porcentaje_grasa <= 4){
$diagnostico_grasa = 'Grasa Esencial';
} else {
$diagnostico_grasa = '';
}

} else {
$porcentaje_grasa = 495 / (1.29579 - 0.35004 * (log10($control_cintura + $control_gluteo - $control_cuello)) + 0.22100 * (log10($talla_en_cm))) - 450;

//DIAGNOSTICO
if($porcentaje_grasa >= 32){
$diagnostico_grasa = 'Obesidad';
} elseif($porcentaje_grasa >= 25 && $porcentaje_grasa <= 31){
$diagnostico_grasa = 'Aceptable';
} elseif($porcentaje_grasa >= 21 && $porcentaje_grasa <= 24){
$diagnostico_grasa = 'Fitness';
} elseif($porcentaje_grasa >= 14 && $porcentaje_grasa <= 20){
$diagnostico_grasa = 'Atleta';
} elseif($porcentaje_grasa >= 10 && $porcentaje_grasa <= 12){
$diagnostico_grasa = 'Grasa Esencial';
} else {
$diagnostico_grasa = '';
}
}

//MASA CORPORAL MAGRA
$masa_corporal_magra = ROUND((($control_peso * (100 - round($porcentaje_grasa, 1))) / 100), 1);

//OBTENER ID DEL PROGRAMA
$query_suscripcion = mysqli_fetch_array(mysqli_query($con, "SELECT id_programa FROM suscripcion_programa WHERE id = '$control_id_suscripcion' ORDER BY id ASC LIMIT 1"));
$id_programa = (int)$query_suscripcion[0];

//NOMBRE DEL PROGRAMA
$row_nombre_programa = mysqli_fetch_array(mysqli_query($con, "SELECT nombre FROM programa WHERE id = '$id_programa' LIMIT 1"));
$nombre_programa = $row_nombre_programa[0];

$array_controles[$i_controles] = array($control_fecha, $control_codigo, $nombre_programa, $control_peso, round($porcentaje_grasa, 1), $masa_corporal_magra);
$i_controles++;
?>
<tr class="tr-hover" style="cursor: pointer;">
<td class="td-content" onclick="visualizar(<?php echo $ret_id_control; ?>)" style="width: 5.55% !important;"></td>
<td class="td-content" onclick="visualizar(<?php echo $ret_id_control; ?>)" style="width: 5.55% !important;"><?php echo $control_codigo; ?></td>
<td class="td-content" onclick="visualizar(<?php echo $ret_id_control; ?>)" style="width: 5.55% !important;"><?php echo $control_fecha; ?></td>
<td class="td-content" onclick="visualizar(<?php echo $ret_id_control; ?>)" style="width: 5.55% !important;"><?php echo $control_peso; ?></td>
<td class="td-content" onclick="visualizar(<?php echo $ret_id_control; ?>)" style="width: 5.55% !important;"><?php echo round($ret_imc, 1); ?></td>
<td class="td-content" onclick="visualizar(<?php echo $ret_id_control; ?>)" style="width: 5.55% !important;"><?php echo $diagnostico; ?></td>
<td class="td-content" onclick="visualizar(<?php echo $ret_id_control; ?>)" style="width: 5.55% !important;"><?php echo $masa_corporal_magra; ?></td>
<td class="td-content" onclick="visualizar(<?php echo $ret_id_control; ?>)" style="width: 5.55% !important;"><?php echo round($porcentaje_grasa, 1); ?></td>
<td class="td-content" onclick="visualizar(<?php echo $ret_id_control; ?>)" style="width: 5.55% !important;"><?php echo $diagnostico_grasa; ?></td>
<td class="td-content" onclick="visualizar(<?php echo $ret_id_control; ?>)" style="width: 5.55% !important;"><?php echo $control_cuello; ?></td>
<td class="td-content" onclick="visualizar(<?php echo $ret_id_control; ?>)" style="width: 5.55% !important;"><?php echo $control_brazo; ?></td>
<td class="td-content" onclick="visualizar(<?php echo $ret_id_control; ?>)" style="width: 5.55% !important;"><?php echo $control_pecho; ?></td>
<td class="td-content" onclick="visualizar(<?php echo $ret_id_control; ?>)" style="width: 5.55% !important;"><?php echo $control_cintura; ?></td>
<td class="td-content" onclick="visualizar(<?php echo $ret_id_control; ?>)" style="width: 5.55% !important;"><?php echo $control_gluteo; ?></td>
<td class="td-content" onclick="visualizar(<?php echo $ret_id_control; ?>)" style="width: 5.55% !important;"><?php echo $control_muslo; ?></td>
<td class="td-content" onclick="visualizar(<?php echo $ret_id_control; ?>)" style="width: 5.55% !important;"><?php echo $control_pantorrilla; ?></td>
<td class="td-content" onclick="visualizar(<?php echo $ret_id_control; ?>)" style="width: 5.55% !important;"><span style="color: green;">Enviado</span></td>
<td class="td-content" onclick="visualizar(<?php echo $ret_id_control; ?>)" style="width: 5.55% !important;"><span style="color: green;">Enviado</span></td>
<td class="td-content" onclick="visualizar(<?php echo $ret_id_control; ?>)" style="width: 5.55% !important;"></td>
</tr>
<?php
}
?>
</table>
</div>
<?php

//PESO
$max = 0;
foreach($array_controles as $array_valor){
if($array_valor[3] > $max){
$max = $array_valor[3];
}
}
$max = $max + 1;
$min = ((float)$ret_peso_meta) - 5;

//% DE GRASA
$max_grasa = 0;
$min_grasa = $array_controles[0][4];
foreach($array_controles as $array_valor){

//MAXIMO
if($array_valor[4] > $max_grasa){
$max_grasa = $array_valor[4];
}

//MIIMO
if($array_valor[4] < $min_grasa){
$min_grasa = $array_valor[4];
}
}
$max_grasa = $max_grasa + 1;
$min_grasa = $min_grasa - 1;

//MM
$max_mm = 0;
$min_mm = $array_controles[0][5];
foreach($array_controles as $array_valor){

//MAXIMO
if($array_valor[5] > $max_mm){
$max_mm = $array_valor[5];
}

//MIIMO
if($array_valor[5] < $min_mm){
$min_mm = $array_valor[5];
}
}
$max_mm = $max_mm + 1;
$min_mm = $min_mm - 1;
?>
<div class="row">
<div class="col-md-6 text-center" style="padding-top: 40px;">
<div id="chart1"></div>
<script>
var options = {

//TITULO DEL CHART
title: {
text: '(KG) Peso',
align: 'center',
style: {
fontSize: "16px",
color: '#95cf32'
}
},

//CONFIGURACION DEL CHART
chart: {
height: 350,
type: 'line',
toolbar: {
show: false
}
},

//DATOS EJE X
xaxis: {
categories: [
<?php
foreach($array_controles as $array_valor){
?>
['<?php echo $array_valor[0]; ?>', '<?php echo $array_valor[1]; ?>', '<?php echo $array_valor[2]; ?>'],
<?php
}
?>
],
labels: {
rotate: 0
}
},

//CONFIGURACION EJE Y
yaxis: {
min: <?php echo $min; ?>,
max: <?php echo $max; ?>,
title: {
text: '(KG) PESO'
}
},

//DATOS EJE Y
series: [
{
name: '(KG) Peso',
data: [
<?php
foreach($array_controles as $array_valor){
?>
<?php echo $array_valor[3]; ?>,
<?php
}
?>
]
}
],

//GRID: Fondo de Malla
grid: {
show: true,
padding: {
left: 10,
right: 10
}
},

//GROSOR DE LINEAS O BARRAS
stroke: {
width: 1,
curve: 'straight'
},

//TIPO DE LINEAS O BARRAS
fill: {
type: 'solid'
},

//TAMA�O PUNTOS DE RELACION (BOLITAS)
markers: {
size: 3,
colors: ["#95cf32"],
strokeColors: "#95cf32",
strokeWidth: 1,
hover: {
size: 5
}
}
};
var chart = new ApexCharts(document.querySelector('#chart1'), options);
chart.render();
</script>
</div>
<div class="col-md-6 text-center" style="padding-top: 40px;">
<div id="chart2"></div>
<script>
var options = {

//TITULO DEL CHART
title: {
text: '(%) Grasa',
align: 'center',
style: {
fontSize: "16px",
color: '#95cf32'
}
},

//CONFIGURACION DEL CHART
chart: {
height: 350,
type: 'line',
toolbar: {
show: false
}
},

//DATOS EJE X
xaxis: {
categories: [
<?php
foreach($array_controles as $array_valor){
?>
['<?php echo $array_valor[0]; ?>', '<?php echo $array_valor[1]; ?>', '<?php echo $array_valor[2]; ?>'],
<?php
}
?>
],
labels: {
rotate: 0
}
},

//CONFIGURACION EJE Y
yaxis: {
min: <?php echo $min_grasa; ?>,
max: <?php echo $max_grasa; ?>,
title: {
text: '(%) GRASA'
}
},

//DATOS EJE Y
series: [
{
name: '(%) Grasa',
data: [
<?php
foreach($array_controles as $array_valor){
?>
<?php echo $array_valor[4]; ?>,
<?php
}
?>
]
}
],

//GRID: Fondo de Malla
grid: {
show: true,
padding: {
left: 10,
right: 10
}
},

//GROSOR DE LINEAS O BARRAS
stroke: {
width: 1,
curve: 'straight'
},

//TIPO DE LINEAS O BARRAS
fill: {
type: 'solid'
},

//TAMA�O PUNTOS DE RELACION (BOLITAS)
markers: {
size: 3,
colors: ["#95cf32"],
strokeColors: "#95cf32",
strokeWidth: 1,
hover: {
size: 5
}
}
};
var chart = new ApexCharts(document.querySelector('#chart2'), options);
chart.render();
</script>
</div>
<div class="col-md-6 text-center" style="padding-top: 40px;">
<div id="chart3"></div>
<script>
var options = {

//TITULO DEL CHART
title: {
text: '(KG) MM',
align: 'center',
style: {
fontSize: '16px',
color: '#95cf32'
}
},

//CONFIGURACION DEL CHART
chart: {
height: 350,
type: 'line',
toolbar: {
show: false
}
},

//DATOS EJE X
xaxis: {
categories: [
<?php
foreach($array_controles as $array_valor){
?>
['<?php echo $array_valor[0]; ?>', '<?php echo $array_valor[1]; ?>', '<?php echo $array_valor[2]; ?>'],
<?php
}
?>
],
labels: {
rotate: 0
}
},

//CONFIGURACION EJE Y
yaxis: {
min: <?php echo $min_mm; ?>,
max: <?php echo $max_mm; ?>,
title: {
text: '(KG) MM'
}
},

//DATOS EJE Y
series: [
{
name: '(KG) MM',
data: [
<?php
foreach($array_controles as $array_valor){
?>
<?php echo $array_valor[5]; ?>,
<?php
}
?>
]
}
],

//GRID: Fondo de Malla
grid: {
show: true,
padding: {
left: 10,
right: 10
}
},

//GROSOR DE LINEAS O BARRAS
stroke: {
width: 1,
curve: 'straight'
},

//TIPO DE LINEAS O BARRAS
fill: {
type: 'solid'
},

//TAMA�O PUNTOS DE RELACION (BOLITAS)
markers: {
size: 3,
colors: ["#95cf32"],
strokeColors: "#95cf32",
strokeWidth: 1,
hover: {
size: 5
}
}
};
var chart = new ApexCharts(document.querySelector('#chart3'), options);
chart.render();
</script>
</div>
</div>
<?php
}

//COBROS
if($view_controller == 6){
?>
<table style="width: 1080px !important; margin: 0 auto;">
<tr>
<td style="width: 163px !important; padding-left: 15px; color: #fff; background: #818181; border: 1px solid white; padding-top: 3px; padding-bottom: 3px;">Fecha Cobro</td>
<td style="width: 163px !important; padding-left: 15px; color: #fff; background: #818181; border: 1px solid white; padding-top: 3px; padding-bottom: 3px;">Plan Rekupera</td>
<td style="width: 163px !important; padding-left: 15px; color: #fff; background: #818181; border: 1px solid white; padding-top: 3px; padding-bottom: 3px;">Paciente</td>
<td style="width: 163px !important; padding-left: 15px; color: #fff; background: #818181; border: 1px solid white; padding-top: 3px; padding-bottom: 3px;">Monto</td>
<td style="width: 163px !important; padding-left: 15px; color: #fff; background: #818181; border: 1px solid white; padding-top: 3px; padding-bottom: 3px;">Medio Pago</td>
<td style="width: 163px !important; padding-left: 15px; color: #fff; background: #818181; border: 1px solid white; padding-top: 3px; padding-bottom: 3px;">Cuenta Bancaria</td>
<td style="width: 100px !important; padding-left: 15px; color: #fff; background: #818181; border: 1px solid white; padding-top: 3px; padding-bottom: 3px; text-align: center;">Acci&oacute;n</td>
</tr>
<?php
$array_funcion = $funcion_datos[1];
foreach($array_funcion as $row){

//DATOS DE LA CONSULTA
$ret_id_cobro = $row[0];
$ret_id_suscripcion = $row[1];
$ret_id_programa = $row[2];
$ret_id_nutricionista = $row[3];
$ret_id_paciente = $row[4];
$ret_fecha_cobro = $row[5];
$ret_monto = $row[6];
$ret_id_medio_pago = $row[7];
$ret_id_cuenta_bancaria = $row[8];
$ret_nombre_programa = $row[9];
$ret_nombre_paciente = $row[10];
$ret_nombre_medio_pago = $row[11];
$ret_nombre_cuenta_bancaria = $row[12];
?>
<tr class="tr-hover" style="cursor: pointer;">
<td onclick="visualizar(<?php echo $ret_id_cobro; ?>)" style="width: 140px !important; padding-left: 15px; border: 1px solid white; padding-top: 3px; padding-bottom: 3px;"><?php echo $ret_fecha_cobro; ?></td>
<td onclick="visualizar(<?php echo $ret_id_cobro; ?>)" style="width: 140px !important; padding-left: 15px; border: 1px solid white; padding-top: 3px; padding-bottom: 3px;"><?php echo $ret_nombre_programa; ?></td>
<td onclick="visualizar(<?php echo $ret_id_cobro; ?>)" style="width: 140px !important; padding-left: 15px; border: 1px solid white; padding-top: 3px; padding-bottom: 3px; text-align: center;"><?php echo $ret_nombre_paciente; ?></td>
<td onclick="visualizar(<?php echo $ret_id_cobro; ?>)" style="width: 140px !important; padding-left: 15px; border: 1px solid white; padding-top: 3px; padding-bottom: 3px; text-align: center;"><?php echo $ret_monto; ?></td>
<td onclick="visualizar(<?php echo $ret_id_cobro; ?>)" style="width: 140px !important; padding-left: 15px; border: 1px solid white; padding-top: 3px; padding-bottom: 3px; text-align: center;"><?php echo $ret_nombre_medio_pago; ?></td>
<td onclick="visualizar(<?php echo $ret_id_cobro; ?>)" style="width: 140px !important; padding-left: 15px; border: 1px solid white; padding-top: 3px; padding-bottom: 3px; text-align: center;"><?php echo $ret_nombre_cuenta_bancaria; ?></td>
<td style="width: 100px !important; padding-left: 15px; border: 1px solid white; padding-top: 3px; padding-bottom: 3px; text-align: center; cursor: default;">
<a href="javascript:void(0)" data-toggle="tooltip" data-placement="top" title="Editar"><i class="fa fa-edit" style="font-size: 13px; margin-right: 5px;"></i></a>
<a href="javascript:void(0)" data-toggle="tooltip" data-placement="top" title="Eliminar" onclick="eliminar(<?php echo $ret_id_cobro; ?>)"><i class="fa fa-trash-o" style="font-size: 13px;"></i></a>
</td>
</tr>
<?php
}
?>
<tr>
<td class="reportes_th_tabla_principal" style="text-align: right !important;" colspan="7"><?php echo paginate($page, $total_pages, $adjacents, 'load'); ?></td>
</tr>
</table>
<?php
}

//RECETAS
if($view_controller == 7){
?>
<table style="width: 1080px !important; margin: 0 auto;">
<tr>
<td style="width: 245px !important; padding-left: 15px; color: #fff; background: #818181; border: 1px solid white; padding-top: 3px; padding-bottom: 3px;">Receta</td>
<td style="width: 245px !important; padding-left: 15px; color: #fff; background: #818181; border: 1px solid white; padding-top: 3px; padding-bottom: 3px;">Descripci&oacute;n</td>
<td style="width: 245px !important; padding-left: 15px; color: #fff; background: #818181; border: 1px solid white; padding-top: 3px; padding-bottom: 3px;">Paciente</td>
<td style="width: 245px !important; padding-left: 15px; color: #fff; background: #818181; border: 1px solid white; padding-top: 3px; padding-bottom: 3px; text-align: center;">Control</td>
<td style="width: 100px !important; padding-left: 15px; color: #fff; background: #818181; border: 1px solid white; padding-top: 3px; padding-bottom: 3px; text-align: center;">Acci&oacute;n</td>
</tr>
<?php
$array_funcion = $funcion_datos[1];
foreach($array_funcion as $row){

//DATOS DE LA CONSULTA
$ret_id_receta = $row[0];
$ret_nombre = $row[1];
$ret_descripcion = $row[2];
$ret_id_nutricionista = $row[3];
$ret_id_paciente = $row[4];
$ret_id_control = $row[5];
$ret_nombre_paciente = $row[6];
$ret_codigo_control =  $row[7];
?>
<tr class="tr-hover" style="cursor: pointer;">
<td onclick="visualizar(<?php echo $ret_id_receta; ?>)" style="width: 140px !important; padding-left: 15px; border: 1px solid white; padding-top: 3px; padding-bottom: 3px;"><?php echo $ret_nombre; ?></td>
<td onclick="visualizar(<?php echo $ret_id_receta; ?>)" style="width: 140px !important; padding-left: 15px; border: 1px solid white; padding-top: 3px; padding-bottom: 3px;"><?php echo $ret_descripcion; ?></td>
<td onclick="visualizar(<?php echo $ret_id_receta; ?>)" style="width: 140px !important; padding-left: 15px; border: 1px solid white; padding-top: 3px; padding-bottom: 3px; text-align: center;"><?php echo $ret_nombre_paciente; ?></td>
<td onclick="visualizar(<?php echo $ret_id_receta; ?>)" style="width: 140px !important; padding-left: 15px; border: 1px solid white; padding-top: 3px; padding-bottom: 3px; text-align: center;"><?php echo $ret_codigo_control; ?></td>
<td style="width: 100px !important; padding-left: 15px; border: 1px solid white; padding-top: 3px; padding-bottom: 3px; text-align: center; cursor: default;">
<a href="javascript:void(0)" data-toggle="tooltip" data-placement="top" title="Editar"><i class="fa fa-edit" style="font-size: 13px; margin-right: 5px;"></i></a>
<a href="javascript:void(0)" data-toggle="tooltip" data-placement="top" title="Eliminar" onclick="eliminar(<?php echo $ret_id_receta; ?>)"><i class="fa fa-trash-o" style="font-size: 13px;"></i></a>
</td>
</tr>
<?php
}
?>
<tr>
<td class="reportes_th_tabla_principal" style="text-align: right !important;" colspan="5"><?php echo paginate($page, $total_pages, $adjacents, 'load'); ?></td>
</tr>
</table>
<?php
}

} else {
?>
<div style="text-align: center;">No se encontraron resultados.</div>
<?php
}
}