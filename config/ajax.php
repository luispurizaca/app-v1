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
$array_filtros = array($view_controller, 0, 2, 0, 1, $id_registro);

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
$ret_talla = $row[27];
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
$title = $ret_nombres.' '.$ret_apellidos;
?>
<div class="col-md-12" style="padding-top: 25px;">
<h4 class="font-20 weight-500 mb-10 text-capitalize">
<div style="padding-left: 15px; color: #95cf32; font-weight: bold; font-size: 20px;">
<?php echo $title; ?>
<br><hr>
</div>
</h4>
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
$query_suscripcion = mysqli_query($con, "SELECT id, id_programa, fecha_inicio, fecha_fin, estado FROM suscripcion_programa WHERE id_paciente = '$id_registro' ORDER BY id ASC");
if(mysqli_num_rows($query_suscripcion) > 0){
?>
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
$row_nombre_programa = mysqli_fetch_array(mysqli_query($con, "SELECT nombre FROM programa WHERE id = '$id_programa' LIMIT 1"));
$nombre_programa = $row_nombre_programa[0];
//SUSCRIPCION ACTIVA
if($estado == 1){
$texto_condicion = 'Activo';
$css_condicion_color = '#95cf32';
} else {
$texto_condicion = 'Inactivo';
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
<div class="row">
<div class="col-md-6 text-center" style="padding-top: 10px;">
<div id="chart1"></div>
<script>
var options = {

//TITULO DEL CHART
title: {
text: 'Evoluci\u00F3n General',
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
categories: [['06/09/2020', 'C001', 'RPF'], ['10/09/2020', 'C002', 'RPF'], ['12/09/2020', 'C003', 'RPF'], ['15/09/2020', 'C004', 'RPF'], ['18/09/2020', 'C005', 'RPM'], ['20/09/2020', 'C006', 'RPM'], ['22/09/2020', 'C007', 'RPM'], ['23/09/2020', 'C008', 'RPM']],
labels: {
rotate: 0
}
},

//CONFIGURACION EJE Y
yaxis: {
min: 55,
max: 80,
title: {
text: 'PESO (KG)'
}
},

//DATOS EJE Y
series: [
{
name: 'Peso',
data: [75, 72, 65, 60, 60, 62, 70, 60]
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

//TAMAÑO PUNTOS DE RELACION (BOLITAS)
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
<div class="btn-group" style="display: none;">
<button onclick="location.href = 'controles.php?paciente=<?php echo $id_registro ?>'" class="btn buttons-pdf" tabindex="0" type="button" style="background: #95cf32; color: white; padding: 8px; font-size: 16px;"><span>Ver controles del paciente</span></button>
</div>
</div>
<div class="col-md-6 text-center" style="padding-top: 10px;">
<hr>
<table style="width: 250px; margin: 0 auto; border: 1px solid #95cf32;">
<tr>
<td style="width: 100% !important; text-align: center; background: #95cf32;" colspan="2"><span style="color: #fff; font-size: 16px;">Meta Final</span></td>
</tr>
<tr>
<td style="width: 50% !important; text-align: left; padding-left: 10px;"><span style="color: #111; font-weight: bold; font-size: 13px;">Peso Meta Final</span></td>
<td style="width: 50% !important; text-align: left; padding-left: 5px;"><span style="color: #111; font-weight: bold; font-size: 13px;">: <?php echo $ret_peso_meta; ?> KG</span></td>
</tr>
<tr>
<td style="width: 50% !important; text-align: left; padding-left: 10px;"><span style="color: #111; font-weight: bold; font-size: 13px;">Peso Actual</span></td>
<td style="width: 50% !important; text-align: left; padding-left: 5px;"><span style="color: #111; font-weight: bold; font-size: 13px;">: <?php echo $ret_peso_actual; ?> KG</span></td>
</tr>
<tr>
<td style="width: 50% !important; text-align: left; padding-left: 10px;"><span style="color: #111; font-weight: bold; font-size: 13px;">Plan de acci&oacute;n</span></td>
<td style="width: 50% !important; text-align: left; padding-left: 5px;"><span style="color: #111; font-weight: bold; font-size: 13px;">: Perder <?php echo ($ret_peso_actual - $ret_peso_meta); ?> KG</span></td>
</tr>
<tr>
<td style="width: 50% !important; text-align: left; padding-left: 10px;"><span style="color: #111; font-weight: bold; font-size: 13px;">Diagn&oacute;stico</span></td>
<td style="width: 50% !important; text-align: left; padding-left: 5px;"><span style="color: #111; font-weight: bold; font-size: 13px;">: <?php echo $diagnostico; ?></span></td>
</tr>
</table>
</div>
</div>
<?php
}
?>
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
<td style="width: 50%; padding-left: 15px; font-weight: bold; background: rgba(149, 207, 50, 0.5); border: 1px solid white;">Diagn&oacute;stico:</td>
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
<br>
<h4 class="font-20 weight-500 mb-10 text-capitalize">
<div style="padding-left: 15px; color: #111; font-weight: bold; font-size: 20px;">Plan de DETOX</div>
</h4>
<table style="width: 70%; margin: 0 auto;">
<tr>
<td style="color: #111; padding: 20px; padding-left: 0; font-size: 17px;" colspan="2"><b>Fecha: 22/09/2020</b></td>
</tr>
<tr>
<td style="color: #111; background: #95cf32; text-align: center; padding: 20px; font-size: 17px; border: 1px solid #95cf32;"><b>HORARIOS</b></td>
<td style="color: #111; background: #95cf32; text-align: center; padding: 20px; font-size: 17px; border: 1px solid #95cf32;"><b>COMIDAS</b></td>
</tr>
<tr>
<td style="vertical-align: middle; padding: 20px; text-align: center; border: 1px solid #95cf32;">
<b style="font-size: 17px;">DESAYUNO<br><?php echo $hora_desayuno; ?></b>
</td>
<td style="vertical-align: middle; padding: 20px; text-align: left; border: 1px solid #95cf32;">
<b>Opci&oacute;n 1:</b> <?php echo $uno_opcion_1_desayuno; ?><br><br>
<b>Opci&oacute;n 2:</b> <?php echo $uno_opcion_2_desayuno; ?>
</td>
</tr>
<tr>
<td style="vertical-align: middle; padding: 10px; text-align: center; background: #E9E555; border: 1px solid #95cf32;">
<b style="font-size: 12px;">MEDIA MA&Ntilde;ANA<br><?php echo $hora_media_manana; ?></b>
</td>
<td style="vertical-align: middle; padding: 20px; text-align: center; background: #E9E555; border: 1px solid #95cf32;">
<?php echo $uno_opcion_1_media_manana; ?>
</td>
</tr>
<tr>
<td style="vertical-align: middle; padding: 20px; text-align: center; border: 1px solid #95cf32;">
<b style="font-size: 17px;">ALMUERZO<br><?php echo $hora_almuerzo; ?></b>
</td>
<td style="vertical-align: middle; padding: 20px; text-align: left; border: 1px solid #95cf32;">
<b>Opci&oacute;n 1:</b> <?php echo $uno_opcion_1_almuerzo; ?><br><br>
<b>Opci&oacute;n 2:</b> <?php echo $uno_opcion_2_almuerzo; ?>
</td>
</tr>
<tr>
<td style="vertical-align: middle; padding: 10px; text-align: center; background: #E9E555; border: 1px solid #95cf32;">
<b style="font-size: 12px;">MEDIA TARDE<br><?php echo $hora_media_tarde; ?></b>
</td>
<td style="vertical-align: middle; padding: 10px; text-align: center; background: #E9E555; border: 1px solid #95cf32;">
<?php echo $uno_opcion_1_media_tarde; ?>
</td>
</tr>
<tr>
<td style="vertical-align: middle; padding: 20px; text-align: center; border: 1px solid #95cf32;">
<b style="font-size: 17px;">CENA<br><?php echo $hora_cena; ?></b>
</td>
<td style="vertical-align: middle; padding: 20px; text-align: left; border: 1px solid #95cf32;">
<b>Opci&oacute;n 1:</b> <?php echo $uno_opcion_1_cena; ?><br><br>
<b>Opci&oacute;n 2:</b> <?php echo $uno_opcion_2_cena; ?>
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

//ELIMINAR
if(isset($_GET['id'])){

//ID DEL MOVIMIENTO
$id = (int)$_GET['id'];

//UPDATE
if($view_controller == 2){
$query_datos_movimiento = mysqli_query($con, "UPDATE usuario SET activo = '0' WHERE id_tipo_usuario = 2 AND id = '$id'");
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
$fn_id_suscripcion = (int)$_POST['suscripcion'];
$id_tipo_usuario = 2;
$id_registro = 0;

//ARRAY FILTROS
$array_filtros = array($view_controller, $activos, $id_tipo_usuario, $offset, $per_page, $id_registro, $fn_id_paciente, $fn_id_suscripcion);

//FUNCION
$funcion_datos = consulta($array_filtros);

//CONSULTA
$consulta = $funcion_datos[0];
$numrows_query = mysqli_query($con, $consulta);
$numrows = mysqli_num_rows($numrows_query);
$total_pages = ceil($numrows/$per_page);

if($numrows > 0){

//PACIENTES
if($view_controller == 2){
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
<a href="javascript:void(0)" data-toggle="tooltip" data-placement="top" title="Eliminar" onclick="eliminar(<?php echo $ret_id_usuario; ?>)"><i class="fa fa-trash-o" style="font-size: 13px;"></i></a>
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
<table style="width: 1080px !important; margin: 0 auto;">
<tr>
<td style="width: 140px !important; padding-left: 15px; color: #fff; background: #818181; border: 1px solid white; padding-top: 3px; padding-bottom: 3px;">Planes Rekupera</td>
<td style="width: 140px !important; padding-left: 15px; color: #fff; background: #818181; border: 1px solid white; padding-top: 3px; padding-bottom: 3px;">Paciente</td>
<td style="width: 140px !important; padding-left: 15px; color: #fff; background: #818181; border: 1px solid white; padding-top: 3px; padding-bottom: 3px;">Fecha Inicio</td>
<td style="width: 140px !important; padding-left: 15px; color: #fff; background: #818181; border: 1px solid white; padding-top: 3px; padding-bottom: 3px;">Fecha Fin</td>
<td style="width: 140px !important; padding-left: 15px; color: #fff; background: #818181; border: 1px solid white; padding-top: 3px; padding-bottom: 3px;">Indicaciones</td>
<td style="width: 140px !important; padding-left: 15px; color: #fff; background: #818181; border: 1px solid white; padding-top: 3px; padding-bottom: 3px; text-align: center;">Estado</td>
<td style="width: 100px !important; padding-left: 15px; color: #fff; background: #818181; border: 1px solid white; padding-top: 3px; padding-bottom: 3px; text-align: center;">Acci&oacute;n</td>
</tr>
<?php
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
$ret_indicaciones = $row[7];
$ret_nombre_paciente = $row[8];
$ret_nombre_programa = $row[9];
$css_color = $row[10];
$texto_estado = $row[11];
?>
<tr class="tr-hover" style="cursor: pointer;">
<td onclick="visualizar(<?php echo $ret_id_suscripcion; ?>)" style="width: 140px !important; padding-left: 15px; border: 1px solid white; padding-top: 3px; padding-bottom: 3px;"><?php echo $ret_nombre_programa; ?></td>
<td onclick="visualizar(<?php echo $ret_id_suscripcion; ?>)" style="width: 140px !important; padding-left: 15px; border: 1px solid white; padding-top: 3px; padding-bottom: 3px;"><?php echo $ret_nombre_paciente; ?></td>
<td onclick="visualizar(<?php echo $ret_id_suscripcion; ?>)" style="width: 140px !important; padding-left: 15px; border: 1px solid white; padding-top: 3px; padding-bottom: 3px; text-align: center;"><?php echo $ret_fecha_inicio; ?></td>
<td onclick="visualizar(<?php echo $ret_id_suscripcion; ?>)" style="width: 140px !important; padding-left: 15px; border: 1px solid white; padding-top: 3px; padding-bottom: 3px; text-align: center;"><?php echo $ret_fecha_fin; ?></td>
<td onclick="visualizar(<?php echo $ret_id_suscripcion; ?>)" style="width: 140px !important; padding-left: 15px; border: 1px solid white; padding-top: 3px; padding-bottom: 3px; text-align: center;"><?php echo $ret_indicaciones; ?></td>
<td onclick="visualizar(<?php echo $ret_id_suscripcion; ?>)" style="width: 140px !important; padding-left: 15px; border: 1px solid white; padding-top: 3px; padding-bottom: 3px; text-align: center; color: <?php echo $css_color; ?>; font-weight: bold;"><?php echo $texto_estado; ?></td>
<td style="width: 100px !important; padding-left: 15px; border: 1px solid white; padding-top: 3px; padding-bottom: 3px; text-align: center; cursor: default;">
<a href="javascript:void(0)" data-toggle="tooltip" data-placement="top" title="Editar"><i class="fa fa-edit" style="font-size: 13px; margin-right: 5px;"></i></a>
<a href="javascript:void(0)" data-toggle="tooltip" data-placement="top" title="Eliminar" onclick="eliminar(<?php echo $ret_id_suscripcion; ?>)"><i class="fa fa-trash-o" style="font-size: 13px;"></i></a>
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

//CONTROLES
if($view_controller == 5){
?>
<div style="padding-left: 15px;">
<span style="color: #95cf32; font-weight: bold; font-size: 20px;">Luis Mario Purizaca Mart&iacute;nez</span>
</div>
<hr>
<h4 class="font-20 weight-500 mb-10 text-capitalize">
<div style="text-align: center;">
<span style="color: #333; font-weight: bold; font-size: 13px;">Peso Actual:&nbsp;&nbsp;</span><span style="color: #95cf32; font-weight: bold; font-size: 13px;">60 KG</span>
</div>
<div style="text-align: center;">
<span style="color: #333; font-weight: bold; font-size: 13px;">Perdiste:&nbsp;&nbsp;</span><span style="color: #333; font-weight: bold; font-size: 13px;">15 KG</span>
</div>
<div style="text-align: center; width: 200px; margin: 0 auto; margin-top: 10px;">
<div class="progress">
<div class="progress-bar progress-bar-animated" role="progressbar" style="width: 90%; background: #95cf32;" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">90%</div>
</div>
<span style="float: left; font-size: 10px; font-weight: bold;">75KG</span>
<span style="float: right; font-size: 10px; font-weight: bold;">Meta: 60KG</span>
</div>
</h4>
<table style="width: 1000px !important; margin: 0 auto;">
<tr>
<td class="td-title" style="width: 5.55% !important;">Foto</td>
<td class="td-title" style="width: 5.55% !important;">Control</td>
<td class="td-title" style="width: 5.55% !important;">Fecha</td>
<td class="td-title" style="width: 5.55% !important;">Peso</td>
<td class="td-title" style="width: 5.55% !important;">IMC</td>
<td class="td-title" style="width: 5.55% !important;">Grasa</td>
<td class="td-title" style="width: 5.55% !important;">MM</td>
<td class="td-title" style="width: 5.55% !important;">Diagn&oacute;stico</td>
<td class="td-title" style="width: 5.55% !important;">Brazo</td>
<td class="td-title" style="width: 5.55% !important;">Pecho</td>
<td class="td-title" style="width: 5.55% !important;">Cintura</td>
<td class="td-title" style="width: 5.55% !important;">Gl&uacute;teo</td>
<td class="td-title" style="width: 5.55% !important;">Muslo</td>
<td class="td-title" style="width: 5.55% !important;">Pantorrilla</td>
<td class="td-title" style="width: 5.55% !important;">P.D.</td>
<td class="td-title" style="width: 5.55% !important;">P.A.</td>
<td class="td-title" style="width: 5.55% !important;">Monitoreo</td>
<td class="td-title" style="width: 5.55% !important;">Acci&oacute;n</td>
</tr>
<?php
$array_funcion = $funcion_datos[1];
foreach($array_funcion as $row){

//DATOS DE LA CONSULTA
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
?>
<tr class="tr-hover" style="cursor: pointer;">
<td class="td-content" onclick="visualizar(<?php echo $ret_id_control; ?>)" style="width: 5.55% !important;"></td>
<td class="td-content" onclick="visualizar(<?php echo $ret_id_control; ?>)" style="width: 5.55% !important;"><?php echo $ret_codigo_control; ?></td>
<td class="td-content" onclick="visualizar(<?php echo $ret_id_control; ?>)" style="width: 5.55% !important;"><?php echo $ret_fecha; ?></td>
<td class="td-content" onclick="visualizar(<?php echo $ret_id_control; ?>)" style="width: 5.55% !important;"><?php echo $ret_peso; ?></td>
<td class="td-content" onclick="visualizar(<?php echo $ret_id_control; ?>)" style="width: 5.55% !important;"><?php echo $ret_imc; ?></td>
<td class="td-content" onclick="visualizar(<?php echo $ret_id_control; ?>)" style="width: 5.55% !important;"><?php echo $ret_grasa; ?></td>
<td class="td-content" onclick="visualizar(<?php echo $ret_id_control; ?>)" style="width: 5.55% !important;"><?php echo $ret_mm; ?></td>
<td class="td-content" onclick="visualizar(<?php echo $ret_id_control; ?>)" style="width: 5.55% !important;"><?php echo $ret_diagnostico; ?></td>
<td class="td-content" onclick="visualizar(<?php echo $ret_id_control; ?>)" style="width: 5.55% !important;"><?php echo $ret_brazo; ?></td>
<td class="td-content" onclick="visualizar(<?php echo $ret_id_control; ?>)" style="width: 5.55% !important;"><?php echo $ret_pecho; ?></td>
<td class="td-content" onclick="visualizar(<?php echo $ret_id_control; ?>)" style="width: 5.55% !important;"><?php echo $ret_cintura; ?></td>
<td class="td-content" onclick="visualizar(<?php echo $ret_id_control; ?>)" style="width: 5.55% !important;"><?php echo $ret_gluteo; ?></td>
<td class="td-content" onclick="visualizar(<?php echo $ret_id_control; ?>)" style="width: 5.55% !important;"><?php echo $ret_muslo; ?></td>
<td class="td-content" onclick="visualizar(<?php echo $ret_id_control; ?>)" style="width: 5.55% !important;"><?php echo $ret_pantorrilla; ?></td>
<td class="td-content" onclick="visualizar(<?php echo $ret_id_control; ?>)" style="width: 5.55% !important;"><?php echo $ret_pd; ?></td>
<td class="td-content" onclick="visualizar(<?php echo $ret_id_control; ?>)" style="width: 5.55% !important;"><?php echo $ret_pa; ?></td>
<td class="td-content" onclick="visualizar(<?php echo $ret_id_control; ?>)" style="width: 5.55% !important;"><?php echo $ret_monitoreo; ?></td>
<td class="td-content" style="width: 5.55% !important; cursor: default;">
<a href="javascript:void(0)" data-toggle="tooltip" data-placement="top" title="Editar"><i class="fa fa-edit" style="font-size: 13px; margin-right: 5px;"></i></a>
<a href="javascript:void(0)" data-toggle="tooltip" data-placement="top" title="Eliminar" onclick="eliminar(<?php echo $ret_id_control; ?>)"><i class="fa fa-trash-o" style="font-size: 13px;"></i></a>
</td>
</tr>
<?php
}
?>
<tr>
<td class="reportes_th_tabla_principal" style="text-align: right !important;" colspan="14"><?php echo paginate($page, $total_pages, $adjacents, 'load'); ?></td>
</tr>
</table>
<script>
var options = {

//TITULO DEL CHART
title: {
text: 'Evoluci\u00F3n del Paquete',
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
categories: [['06/09/2020', 'C001', 'RPF'], ['10/09/2020', 'C002', 'RPF'], ['12/09/2020', 'C003', 'RPF'], ['15/09/2020', 'C004', 'RPF']],
labels: {
rotate: 0
}
},

//CONFIGURACION EJE Y
yaxis: {
min: 55,
max: 80,
title: {
text: 'PESO (KG)'
}
},

//DATOS EJE Y
series: [
{
name: 'Peso',
data: [75, 72, 65, 60]
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

//TAMAÑO PUNTOS DE RELACION (BOLITAS)
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