<?php
$negocia_operacion = (int)$_GET['negocia_operacion'];
$negocia_tipo = (int)$_GET['negocia_tipo'];
if($negocia_operacion == 1){

require_once (__DIR__.'/conexion_bd.php');

//NUTRICIONISTA
if($negocia_tipo == 1){
$title = 'Nutricionista';
}

//PACIENTE
if($negocia_tipo == 2){
$title = 'Paciente';
}
?>
<div class="pd-20 card-box mb-30">
<div class="clearfix">
<div class="pull-left">
<h4 class="weight-500 text-capitalize" style="font-size: 17px;">
Nuevo <div style="color: #95cf32; font-weight: bold; font-size: 22px;"><?php echo $title; ?></div>
</h4><hr>
</div>
</div>
<style>
.n-form-control{
padding: 4px !important;
height: 25px !important;
font-size: 12px !important;
}
.n-label{
padding-left: 3px !important;
}
</style>
<form>
<div class="row">
<div class="col-md-4 col-sm-12">
<div class="form-group">
<label class="n-label">N&#176; Socio</label>
<input id="form_codigo" name="form_codigo" class="form-control n-form-control" type="text" placeholder="C&oacute;digo">
</div>
</div>
<div class="col-md-4 col-sm-12">
<div class="form-group">
<label class="n-label">Nombres</label>
<input id="form_nombres" name="form_nombres" class="form-control n-form-control" type="text" placeholder="Nombres">
</div>
</div>
<div class="col-md-4 col-sm-12">
<div class="form-group">
<label class="n-label">Apellidos</label>
<input id="form_apellidos" name="form_apellidos" class="form-control n-form-control" type="text" placeholder="Apellidos">
</div>
</div>
<div class="col-md-4 col-sm-12">
<div class="form-group">
<label class="n-label">Tipo Doc.</label>
<select id="form_tipo_documento" name="form_tipo_documento" class="form-control n-form-control">
<?php
$query_tipo_documento = mysqli_query($con, "SELECT id, nombre FROM tipo_documento ORDER BY id ASC");
while($row_tipo_documento = mysqli_fetch_array($query_tipo_documento)){
$id_tipo_documento = $row_tipo_documento[0];
$nombre_documento = $row_tipo_documento[1];
?>
<option value="<?php echo $id_tipo_documento; ?>"><?php echo $nombre_documento; ?></option>
<?php
}
?>
</select>
</div>
</div>
<div class="col-md-4 col-sm-12">
<div class="form-group">
<label class="n-label">N&uacute;mero Doc.</label>
<input id="form_apellidos" name="form_apellidos" class="form-control n-form-control" type="text" placeholder="Apellidos">
</div>
</div>
<div class="col-md-4 col-sm-12">
<div class="form-group">
<label class="n-label">Fecha Nac.</label>
<input id="form_apellidos" name="form_apellidos" class="form-control n-form-control" type="text" placeholder="Apellidos">
</div>
</div>
<div class="col-md-4 col-sm-12">
<div class="form-group">
<label class="n-label">G&eacute;nero</label>
<input id="form_apellidos" name="form_apellidos" class="form-control n-form-control" type="text" placeholder="Apellidos">
</div>
</div>
<div class="col-md-4 col-sm-12">
<div class="form-group">
<label class="n-label">Instagram</label>
<input id="form_apellidos" name="form_apellidos" class="form-control n-form-control" type="text" placeholder="Apellidos">
</div>
</div>
<div class="col-md-4 col-sm-12">
<div class="form-group">
<label class="n-label">Direcci&oacute;n</label>
<input id="form_apellidos" name="form_apellidos" class="form-control n-form-control" type="text" placeholder="Apellidos">
</div>
</div>
<div class="col-md-4 col-sm-12">
<div class="form-group">
<label class="n-label">Departamento</label>
<input id="form_apellidos" name="form_apellidos" class="form-control n-form-control" type="text" placeholder="Apellidos">
</div>
</div>
<div class="col-md-4 col-sm-12">
<div class="form-group">
<label class="n-label">Provincia</label>
<input id="form_apellidos" name="form_apellidos" class="form-control n-form-control" type="text" placeholder="Apellidos">
</div>
</div>
<div class="col-md-4 col-sm-12">
<div class="form-group">
<label class="n-label">Distrito</label>
<input id="form_apellidos" name="form_apellidos" class="form-control n-form-control" type="text" placeholder="Apellidos">
</div>
</div>
<div class="col-md-4 col-sm-12">
<div class="form-group">
<label class="n-label">Talla</label>
<input id="form_apellidos" name="form_apellidos" class="form-control n-form-control" type="text" placeholder="Apellidos">
</div>
</div>
<div class="col-md-4 col-sm-12">
<div class="form-group">
<label class="n-label">Peso Meta</label>
<input id="form_apellidos" name="form_apellidos" class="form-control n-form-control" type="text" placeholder="Apellidos">
</div>
</div>
<div class="col-md-4 col-sm-12">
<div class="form-group">
<label class="n-label">N&#176; M&aacute;x. Pac.</label>
<input id="form_apellidos" name="form_apellidos" class="form-control n-form-control" type="text" placeholder="Apellidos">
</div>
</div>
</div>
<div class="row" style="padding-top: 15px;">
<div class="col-md-12 col-sm-12">
<div class="form-group">
<div class="pull-left">
<h4 class="weight-500">
<div style="color: #95cf32; font-weight: bold; font-size: 18px;">Inicio de Sesi&oacute;n</div>
</h4><hr>
</div>
</div>
</div>
<div class="col-md-4 col-sm-12">
<div class="form-group">
<label class="n-label">Correo Electr&oacute;nico</label>
<input id="form_correo" name="form_correo" class="form-control n-form-control" type="text" placeholder="Correo electr&oacute;nico">
</div>
</div>
<div class="col-md-4 col-sm-12">
<div class="form-group">
<label class="n-label">Contrase&ntilde;a</label>
<input id="form_clave" name="form_clave" class="form-control n-form-control" type="text" placeholder="Contrase&ntilde;a">
</div>
</div>
<div class="col-md-4 col-sm-12">
<div class="form-group">
<label class="n-label">Residencia</label>
<input id="form_residencia" name="form_residencia" class="form-control n-form-control" type="text" placeholder="ejm: PE">
</div>
</div>
</div>
<div class="row">
<div class="col-md-12 col-sm-12 text-center" style="padding-top: 20px;">
<div class="form-group">
<button type="button" class="btn" style="background: #95cf32; color: white; padding: 4px; font-size: 13px;">Guardar Datos</button>
<button onclick="window.location='index.php'" type="button" class="btn" style="background: #F26C3C; color: white; padding: 4px; font-size: 13px;">Cancelar</button>
</div>
</div>
</div>
</form>
</div>
<?php
exit();
exit();
}
if(isset($con)){
//1. inicio.php

if($view_controller == 1){
?>
<div class="card-box pd-20 height-100-p mb-30">
<div class="row align-items-center">
<div class="col-md-4 text-center">
<img src="vendors/images/icono.png" alt="">
</div>
<div id="div_ajax" class="col-md-8">
<h4 class="font-20 weight-500 mb-10 text-capitalize">
Hola <div class="font-30" style="color: #95cf32; font-weight: bold;"><?php echo ucwords($_SESSION['usuario_nombres']); ?>!</div>
</h4>
<?php
if($_SESSION['ID_TIPO_USUARIO'] == 3){
?>
<div style="margin-top: 30px; margin-bottom: 20px;">
<button onclick="nuevo_registro(1)" class="btn buttons-csv" tabindex="0" type="button" style="background: #95cf32; color: white; font-size: 12px; padding: 8px; margin-right: 20px;">
<i class="icon-copy dw dw-user1" style="font-size: 20px;"></i><br>
<span style="font-size: 17px;">NUEVO NUTRICIONISTA</span>
</button>
<button onclick="nuevo_registro(2)" class="btn buttons-pdf" tabindex="0" type="button" style="background: #F26C3C; color: white; font-size: 12px; padding: 8px; margin-right: 20px;">
<i class="icon-copy dw dw-user1" style="font-size: 20px;"></i><br>
<span style="font-size: 17px;">NUEVO PACIENTE</span>
</button>
<button class="btn buttons-pdf" tabindex="0" type="button" style="background: #818181; color: white; font-size: 12px; padding: 8px;">
<i class="icon-copy dw dw-user1" style="font-size: 20px;"></i>
<i class="icon-copy dw dw-user1" style="font-size: 20px;"></i><br>
<span style="font-size: 17px;">ASOCIAR PACIENTES</span>
</button>
</div>
<?php
}
?>
</div>
<script>
//NUEVO REGISTRO
function nuevo_registro(id){
$.ajax({
type: 'POST',
url: 'config/content.php?negocia_operacion=1&negocia_tipo='+id,
success: function(datos){
$('#div_ajax').html(datos).fadeIn('slow');
}
});
}
</script>
</div>
</div>
<?php
if($_SESSION['ID_TIPO_USUARIO'] == 1 || $_SESSION['ID_TIPO_USUARIO'] == 3){
?>
<div class="row">
<div class="col-xl-3 mb-30" onclick="location.href='pacientes.php'" style="cursor: pointer;">
<div class="card-box height-100-p widget-style1">
<div class="d-flex flex-wrap align-items-center">
<div class="progress-data">
<div id="chart"></div>
</div>
<?php
//PORCENTAJE PACIENTES
$porcentaje_uno = round(($_SESSION['usuario_total_pacientes'] / $_SESSION['usuario_maximo_pacientes']), 2) * 100;

//PORCENTAJE PACIENTES ACTIVOS
$porcentaje_dos = round(($_SESSION['usuario_total_pacientes_activos'] / $_SESSION['usuario_total_pacientes']), 2) * 100;

//PORCENTAJE PACIENTES INACTIVOS
$porcentaje_tres = round(($_SESSION['usuario_total_pacientes_inactivos'] / $_SESSION['usuario_total_pacientes']), 2) * 100;

//PORCENTAJE CONTROLES REALIZADOS
$porcentaje_cuatro = round(($_SESSION['usuario_controles_realizados'] / $_SESSION['total_controles']), 2) * 100;
?>
<div class="widget-data">
<div class="h4 mb-0"><?php echo $_SESSION['usuario_total_pacientes']; ?>/<?php echo $_SESSION['usuario_maximo_pacientes']; ?></div>
<div class="weight-600 font-14">Pacientes</div>
</div>
</div>
</div>
<script>
var options = {
series: [<?php echo $porcentaje_uno; ?>],
grid: {
padding: {
top: 0,
right: 0,
bottom: 0,
left: 0
},
},
chart: {
height: 100,
width: 70,
type: 'radialBar',
},	
plotOptions: {
radialBar: {
hollow: {
size: '50%',
},
dataLabels: {
name: {
show: false,
color: '#fff'
},
value: {
show: true,
color: '#333',
offsetY: 5,
fontSize: '15px'
}
}
}
},
colors: ['#818181'],
fill: {
type: 'gradient',
gradient: {
shade: 'dark',
type: 'diagonal1',
shadeIntensity: 0.8,
gradientToColors: ['#95cf32'],
inverseColors: false,
opacityFrom: [1, 0.2],
opacityTo: 1,
stops: [0, 100],
}
},
states: {
normal: {
filter: {
type: 'none',
value: 0,
}
},
hover: {
filter: {
type: 'none',
value: 0,
}
},
active: {
filter: {
type: 'none',
value: 0,
}
},
}
};

var chart = new ApexCharts(document.querySelector("#chart"), options);
chart.render();
</script>
</div>
<div class="col-xl-3 mb-30" onclick="location.href='pacientes.php?activos=1'" style="cursor: pointer;">
<div class="card-box height-100-p widget-style1">
<div class="d-flex flex-wrap align-items-center">
<div class="progress-data">
<div id="chart2"></div>
</div>
<div class="widget-data">
<div class="h4 mb-0"><?php echo $_SESSION['usuario_total_pacientes_activos']; ?>/<?php echo $_SESSION['usuario_total_pacientes']; ?></div>
<div class="weight-600 font-14">Pacientes Activos</div>
</div>
</div>
</div>
<script>
var options = {
series: [<?php echo $porcentaje_dos; ?>],
grid: {
padding: {
top: 0,
right: 0,
bottom: 0,
left: 0
},
},
chart: {
height: 100,
width: 70,
type: 'radialBar',
},	
plotOptions: {
radialBar: {
hollow: {
size: '50%',
},
dataLabels: {
name: {
show: false,
color: '#fff'
},
value: {
show: true,
color: '#333',
offsetY: 5,
fontSize: '15px'
}
}
}
},
colors: ['#818181'],
fill: {
type: 'gradient',
gradient: {
shade: 'dark',
type: 'diagonal1',
shadeIntensity: 0.8,
gradientToColors: ['#95cf32'],
inverseColors: false,
opacityFrom: [1, 0.2],
opacityTo: 1,
stops: [0, 100],
}
},
states: {
normal: {
filter: {
type: 'none',
value: 0,
}
},
hover: {
filter: {
type: 'none',
value: 0,
}
},
active: {
filter: {
type: 'none',
value: 0,
}
},
}
};

var chart = new ApexCharts(document.querySelector("#chart2"), options);
chart.render();
</script>
</div>
<div class="col-xl-3 mb-30" onclick="location.href='pacientes.php?activos=2'" style="cursor: pointer;">
<div class="card-box height-100-p widget-style1">
<div class="d-flex flex-wrap align-items-center">
<div class="progress-data">
<div id="chart3"></div>
</div>
<div class="widget-data">
<div class="h4 mb-0"><?php echo $_SESSION['usuario_total_pacientes_inactivos']; ?>/<?php echo $_SESSION['usuario_total_pacientes']; ?></div>
<div class="weight-600 font-14">Pacientes Inactivos</div>
</div>
</div>
</div>
<script>
var options = {
series: [<?php echo $porcentaje_tres; ?>],
grid: {
padding: {
top: 0,
right: 0,
bottom: 0,
left: 0
},
},
chart: {
height: 100,
width: 70,
type: 'radialBar',
},	
plotOptions: {
radialBar: {
hollow: {
size: '50%',
},
dataLabels: {
name: {
show: false,
color: '#fff'
},
value: {
show: true,
color: '#333',
offsetY: 5,
fontSize: '15px'
}
}
}
},
colors: ['#818181'],
fill: {
type: 'gradient',
gradient: {
shade: 'dark',
type: 'diagonal1',
shadeIntensity: 0.8,
gradientToColors: ['#95cf32'],
inverseColors: false,
opacityFrom: [1, 0.2],
opacityTo: 1,
stops: [0, 100],
}
},
states: {
normal: {
filter: {
type: 'none',
value: 0,
}
},
hover: {
filter: {
type: 'none',
value: 0,
}
},
active: {
filter: {
type: 'none',
value: 0,
}
},
}
};

var chart = new ApexCharts(document.querySelector("#chart3"), options);
chart.render();
</script>
</div>
<div class="col-xl-3 mb-30" onclick="location.href='controles.php'" style="cursor: pointer;">
<div class="card-box height-100-p widget-style1">
<div class="d-flex flex-wrap align-items-center">
<div class="progress-data">
<div id="chart4"></div>
</div>
<div class="widget-data">
<div class="h4 mb-0"><?php echo $_SESSION['usuario_controles_realizados']; ?>/<?php echo $_SESSION['total_controles']; ?></div>
<div class="weight-600 font-14">Controles Realizados</div>
</div>
</div>
</div>
<script>
var options = {
series: [<?php echo $porcentaje_cuatro; ?>],
grid: {
padding: {
top: 0,
right: 0,
bottom: 0,
left: 0
},
},
chart: {
height: 100,
width: 70,
type: 'radialBar',
},	
plotOptions: {
radialBar: {
hollow: {
size: '50%',
},
dataLabels: {
name: {
show: false,
color: '#fff'
},
value: {
show: true,
color: '#333',
offsetY: 5,
fontSize: '15px'
}
}
}
},
colors: ['#818181'],
fill: {
type: 'gradient',
gradient: {
shade: 'dark',
type: 'diagonal1',
shadeIntensity: 0.8,
gradientToColors: ['#95cf32'],
inverseColors: false,
opacityFrom: [1, 0.2],
opacityTo: 1,
stops: [0, 100],
}
},
states: {
normal: {
filter: {
type: 'none',
value: 0,
}
},
hover: {
filter: {
type: 'none',
value: 0,
}
},
active: {
filter: {
type: 'none',
value: 0,
}
},
}
};

var chart = new ApexCharts(document.querySelector("#chart4"), options);
chart.render();
</script>
</div>
</div>
<?php
}
}
if($view_controller >= 2 && $view_controller <= 7 && $view_controller != 3){
?>
<style>
.tr-hover:hover{
background: rgba(149, 207, 50, 0.5) !important;
}
.td-title{
color: #fff;
background: #95cf32;
font-size: 12px;
padding: 3px;
text-align: center;
}
.td-content{
color: #111;
font-size: 11.5px;
padding: 3px;
text-align: center;
}
</style>
<div class="card-box mb-30">
<div class="card-box pd-20 height-100-p mb-30">
<div id="resultado" class="row align-items-center"></div>
</div>
<div class="pb-20" style="padding-left: 20px; padding-right: 20px; padding-top: 20px;">
<div class="table-responsive">
<table id="tabla_filtros" style="width: 1000px !important; margin: 0 auto; display: none;">
<tr>
<td style="width: 50% !important; border: 1px solid white; padding-top: 3px; padding-bottom: 3px; text-align: left; padding-bottom: 20px;" colspan="4">
<div class="btn-group">
<button class="btn buttons-csv" tabindex="0" type="button" style="background: #95cf32; color: white; font-size: 12px; padding: 8px;"><span>NUEVO</span></button>
</div>
</td>
<td style="width: 50% !important; border: 1px solid white; padding-top: 3px; padding-bottom: 3px; text-align: right; padding-bottom: 20px;" colspan="4">
<div class="btn-group">
<button class="btn buttons-csv" tabindex="0" type="button" style="background: #95cf32; color: white; font-size: 12px; padding: 8px;"><span>EXCEL</span></button>
<button class="btn buttons-pdf" tabindex="0" type="button" style="background: #F26C3C; color: white; font-size: 12px; padding: 8px;"><span>PDF</span></button>
</div>
</td>
</tr>
</table>
<div id="reporte_tabla"></div>
</div>
<div class="row">
<div class="col-md-1 hidden-xs"></div>
<div class="col-md-10 col-xs-12">
<div id="chart1"></div>
</div>
<div class="col-md-1 hidden-xs"></div>
</div>
<div class="row">
<div class="col-md-1 hidden-xs"></div>
<div class="col-md-5 col-xs-12">
<div id="chart2"></div>
</div>
<div class="col-md-5 col-xs-12">
<div id="chart3"></div>
</div>
<div class="col-md-1 hidden-xs"></div>
</div>
<script>
//LOAD
function load(page){
$.ajax({
type: 'POST',
url: 'config/ajax.php?view_controller=<?php echo $view_controller; ?>',
data: {action: 'ajax' , page: page, activos : '<?php echo $activos; ?>'},
success: function(datos){
$('#reporte_tabla').html(datos).fadeIn('slow');
}
});
}

//ELIMINAR
function eliminar(id){
if(confirm('Desea eliminar el registro?')){
$.ajax({
type: 'POST',
url: 'config/ajax.php?view_controller=<?php echo $view_controller; ?>&id='+id,
success: function(datos){
$('#reporte_tabla').html(datos).fadeIn('slow');
}
});
}
}

//VISUALIZAR
function visualizar(id){
$.ajax({
type: 'POST',
url: 'config/ajax.php?negocia_operacion=1&view_controller=<?php echo $view_controller; ?>',
data: {id: id},
success: function(datos){
$('#resultado').html(datos).fadeIn('slow');
$('#reporte_tabla').html('');
$('#tabla_filtros').css('display', 'none');
}
});
}

load(1);
</script>
</div>
</div>
<?php
}
if($view_controller == 3){
?>
<div class="card-box mb-30">
<div class="card-box pd-20 height-100-p mb-30">
<div style="text-align: center; margin-top: 30px; margin-bottom: 20px;">
<button class="btn buttons-csv" tabindex="0" type="button" style="background: #95cf32; color: white; font-size: 12px; padding: 8px; margin-right: 20px;">
<i class="icon-copy dw dw-user1" style="font-size: 20px;"></i><br>
<span style="font-size: 17px;">PACIENTE NUEVO</span>
</button>
<button class="btn buttons-pdf" tabindex="0" type="button" style="background: #F26C3C; color: white; font-size: 12px; padding: 8px;">
<i class="icon-copy dw dw-user1" style="font-size: 20px;"></i><br>
<span style="font-size: 17px;">PACIENTE SOCIO</span>
</button>
</div>
</div>
</div>
<?php
}
if($view_controller == 8){
?>
<div class="calendar-wrap">
<div id='calendar'></div>
</div>
<div id="modal-view-event" class="modal modal-top fade calendar-modal">
<div class="modal-dialog modal-dialog-centered">
<div class="modal-content">
<div class="modal-body">
<h4 class="h4"><span class="event-icon weight-400 mr-3"></span><span class="event-title"></span></h4>
<div class="event-body"></div>
</div>
<div class="modal-footer">
<button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
</div>
</div>
</div>
</div>
<div id="modal-view-event-add" class="modal modal-top fade calendar-modal">
<div class="modal-dialog modal-dialog-centered">
<div class="modal-content">
<form id="add-event">
<div class="modal-body">
<h4 class="text-blue h4 mb-10">Add Event Detail</h4>
<div class="form-group">
<label>Event name</label>
<input type="text" class="form-control" name="ename">
</div>
<div class="form-group">
<label>Event Date</label>
<input type='text' class="datetimepicker form-control" name="edate">
</div>
<div class="form-group">
<label>Event Description</label>
<textarea class="form-control" name="edesc"></textarea>
</div>
<div class="form-group">
<label>Event Color</label>
<select class="form-control" name="ecolor">
<option value="fc-bg-default">fc-bg-default</option>
<option value="fc-bg-blue">fc-bg-blue</option>
<option value="fc-bg-lightgreen">fc-bg-lightgreen</option>
<option value="fc-bg-pinkred">fc-bg-pinkred</option>
<option value="fc-bg-deepskyblue">fc-bg-deepskyblue</option>
</select>
</div>
<div class="form-group">
<label>Event Icon</label>
<select class="form-control" name="eicon">
<option value="circle">circle</option>
<option value="cog">cog</option>
<option value="group">group</option>
<option value="suitcase">suitcase</option>
<option value="calendar">calendar</option>
</select>
</div>
</div>
<div class="modal-footer">
<button type="submit" class="btn btn-primary" >Save</button>
<button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
</div>
</form>
</div>
</div>
</div>
<?php
}
if($view_controller == 9){
?>
<div class="row">
<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 mb-30">
<div class="pd-20 card-box height-100-p">
<div class="profile-photo">
<a href="modal" data-toggle="modal" data-target="#modal" class="edit-avatar"><i class="fa fa-pencil"></i></a>
<img src="vendors/images/photo1.jpg" alt="" class="avatar-photo">
<div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
<div class="modal-dialog modal-dialog-centered" role="document">
<div class="modal-content">
<div class="modal-body pd-5">
<div class="img-container">
<img id="image" src="vendors/images/photo2.jpg" alt="Picture">
</div>
</div>
<div class="modal-footer">
<input type="submit" value="Update" class="btn btn-primary">
<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
</div>
</div>
</div>
</div>
</div>
<h5 class="text-center h5 mb-0">Ross C. Lopez</h5>
<p class="text-center text-muted font-14">Lorem ipsum dolor sit amet</p>
<div class="profile-info">
<h5 class="mb-20 h5 text-blue">Contact Information</h5>
<ul>
<li>
<span>Email Address:</span>
FerdinandMChilds@test.com
</li>
<li>
<span>Phone Number:</span>
619-229-0054
</li>
<li>
<span>Country:</span>
America
</li>
<li>
<span>Address:</span>
1807 Holden Street<br>
San Diego, CA 92115
</li>
</ul>
</div>
<div class="profile-social">
<h5 class="mb-20 h5 text-blue">Social Links</h5>
<ul class="clearfix">
<li><a href="#" class="btn" data-bgcolor="#3b5998" data-color="#ffffff"><i class="fa fa-facebook"></i></a></li>
<li><a href="#" class="btn" data-bgcolor="#1da1f2" data-color="#ffffff"><i class="fa fa-twitter"></i></a></li>
<li><a href="#" class="btn" data-bgcolor="#007bb5" data-color="#ffffff"><i class="fa fa-linkedin"></i></a></li>
<li><a href="#" class="btn" data-bgcolor="#f46f30" data-color="#ffffff"><i class="fa fa-instagram"></i></a></li>
<li><a href="#" class="btn" data-bgcolor="#c32361" data-color="#ffffff"><i class="fa fa-dribbble"></i></a></li>
<li><a href="#" class="btn" data-bgcolor="#3d464d" data-color="#ffffff"><i class="fa fa-dropbox"></i></a></li>
<li><a href="#" class="btn" data-bgcolor="#db4437" data-color="#ffffff"><i class="fa fa-google-plus"></i></a></li>
<li><a href="#" class="btn" data-bgcolor="#bd081c" data-color="#ffffff"><i class="fa fa-pinterest-p"></i></a></li>
<li><a href="#" class="btn" data-bgcolor="#00aff0" data-color="#ffffff"><i class="fa fa-skype"></i></a></li>
<li><a href="#" class="btn" data-bgcolor="#00b489" data-color="#ffffff"><i class="fa fa-vine"></i></a></li>
</ul>
</div>
<div class="profile-skills">
<h5 class="mb-20 h5 text-blue">Key Skills</h5>
<h6 class="mb-5 font-14">HTML</h6>
<div class="progress mb-20" style="height: 6px;">
<div class="progress-bar" role="progressbar" style="width: 90%" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
</div>
<h6 class="mb-5 font-14">Css</h6>
<div class="progress mb-20" style="height: 6px;">
<div class="progress-bar" role="progressbar" style="width: 70%" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
</div>
<h6 class="mb-5 font-14">jQuery</h6>
<div class="progress mb-20" style="height: 6px;">
<div class="progress-bar" role="progressbar" style="width: 60%" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
</div>
<h6 class="mb-5 font-14">Bootstrap</h6>
<div class="progress mb-20" style="height: 6px;">
<div class="progress-bar" role="progressbar" style="width: 80%" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
</div>
</div>
</div>
</div>
<div class="col-xl-8 col-lg-8 col-md-8 col-sm-12 mb-30">
<div class="card-box height-100-p overflow-hidden">
<div class="profile-tab height-100-p">
<div class="tab height-100-p">
<div class="profile-setting">
<form>
<ul class="profile-edit-list row">
<li class="weight-500 col-md-6">
<h4 class="text-blue h5 mb-20">Edit Your Personal Setting</h4>
<div class="form-group">
<label>Full Name</label>
<input class="form-control form-control-lg" type="text">
</div>
<div class="form-group">
<label>Title</label>
<input class="form-control form-control-lg" type="text">
</div>
<div class="form-group">
<label>Email</label>
<input class="form-control form-control-lg" type="email">
</div>
<div class="form-group">
<label>Date of birth</label>
<input class="form-control form-control-lg date-picker" type="text">
</div>
<div class="form-group">
<label>Gender</label>
<div class="d-flex">
<div class="custom-control custom-radio mb-5 mr-20">
<input type="radio" id="customRadio4" name="customRadio" class="custom-control-input">
<label class="custom-control-label weight-400" for="customRadio4">Male</label>
</div>
<div class="custom-control custom-radio mb-5">
<input type="radio" id="customRadio5" name="customRadio" class="custom-control-input">
<label class="custom-control-label weight-400" for="customRadio5">Female</label>
</div>
</div>
</div>
<div class="form-group">
<label>Country</label>
<select class="selectpicker form-control form-control-lg" data-style="btn-outline-secondary btn-lg" title="Not Chosen">
<option>United States</option>
<option>India</option>
<option>United Kingdom</option>
</select>
</div>
<div class="form-group">
<label>State/Province/Region</label>
<input class="form-control form-control-lg" type="text">
</div>
<div class="form-group">
<label>Postal Code</label>
<input class="form-control form-control-lg" type="text">
</div>
<div class="form-group">
<label>Phone Number</label>
<input class="form-control form-control-lg" type="text">
</div>
<div class="form-group">
<label>Address</label>
<textarea class="form-control"></textarea>
</div>
<div class="form-group">
<label>Visa Card Number</label>
<input class="form-control form-control-lg" type="text">
</div>
<div class="form-group">
<label>Paypal ID</label>
<input class="form-control form-control-lg" type="text">
</div>
<div class="form-group">
<div class="custom-control custom-checkbox mb-5">
<input type="checkbox" class="custom-control-input" id="customCheck1-1">
<label class="custom-control-label weight-400" for="customCheck1-1">I agree to receive notification emails</label>
</div>
</div>
<div class="form-group mb-0">
<input type="submit" class="btn btn-primary" value="Update Information">
</div>
</li>
<li class="weight-500 col-md-6">
<h4 class="text-blue h5 mb-20">Edit Social Media links</h4>
<div class="form-group">
<label>Facebook URL:</label>
<input class="form-control form-control-lg" type="text" placeholder="Paste your link here">
</div>
<div class="form-group">
<label>Twitter URL:</label>
<input class="form-control form-control-lg" type="text" placeholder="Paste your link here">
</div>
<div class="form-group">
<label>Linkedin URL:</label>
<input class="form-control form-control-lg" type="text" placeholder="Paste your link here">
</div>
<div class="form-group">
<label>Instagram URL:</label>
<input class="form-control form-control-lg" type="text" placeholder="Paste your link here">
</div>
<div class="form-group">
<label>Dribbble URL:</label>
<input class="form-control form-control-lg" type="text" placeholder="Paste your link here">
</div>
<div class="form-group">
<label>Dropbox URL:</label>
<input class="form-control form-control-lg" type="text" placeholder="Paste your link here">
</div>
<div class="form-group">
<label>Google-plus URL:</label>
<input class="form-control form-control-lg" type="text" placeholder="Paste your link here">
</div>
<div class="form-group">
<label>Pinterest URL:</label>
<input class="form-control form-control-lg" type="text" placeholder="Paste your link here">
</div>
<div class="form-group">
<label>Skype URL:</label>
<input class="form-control form-control-lg" type="text" placeholder="Paste your link here">
</div>
<div class="form-group">
<label>Vine URL:</label>
<input class="form-control form-control-lg" type="text" placeholder="Paste your link here">
</div>
<div class="form-group mb-0">
<input type="submit" class="btn btn-primary" value="Save & Update">
</div>
</li>
</ul>
</form>
</div>
</div>
</div>
</div>
</div>
</div>
<?php
}
}