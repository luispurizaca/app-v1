<?php
if(isset($con)){
//1. inicio.php
?>
<?php
if($view_controller == 1){
?>
<div class="card-box pd-20 height-100-p mb-30">
<div class="row align-items-center">
<div class="col-md-4 text-center">
<img src="vendors/images/icono.png" alt="">
</div>
<div class="col-md-8">
<h4 class="font-20 weight-500 mb-10 text-capitalize">
Hola <div class="font-30" style="color: #95cf32; font-weight: bold;"><?php echo ucwords($_SESSION['usuario_nombres']); ?>!</div>
</h4>
<p class="font-18 max-width-600">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Unde hic non repellendus debitis iure, doloremque assumenda. Autem modi, corrupti, nobis ea iure fugiat, veniam non quaerat mollitia animi error corporis.</p>
</div>
</div>
</div>
<div class="row">
<div class="col-xl-3 mb-30" onclick="location.href='pacientes.php'" style="cursor: pointer;">
<div class="card-box height-100-p widget-style1">
<div class="d-flex flex-wrap align-items-center">
<div class="progress-data">
<div id="chart"></div>
</div>
<div class="widget-data">
<div class="h4 mb-0">80/100</div>
<div class="weight-600 font-14">Pacientes</div>
</div>
</div>
</div>
</div>
<div class="col-xl-3 mb-30" onclick="location.href='pacientes.php?id=1'" style="cursor: pointer;">
<div class="card-box height-100-p widget-style1">
<div class="d-flex flex-wrap align-items-center">
<div class="progress-data">
<div id="chart2"></div>
</div>
<div class="widget-data">
<div class="h4 mb-0">56/80</div>
<div class="weight-600 font-14">Pacientes Activos</div>
</div>
</div>
</div>
</div>
<div class="col-xl-3 mb-30" onclick="location.href='pacientes.php?id=2'" style="cursor: pointer;">
<div class="card-box height-100-p widget-style1">
<div class="d-flex flex-wrap align-items-center">
<div class="progress-data">
<div id="chart3"></div>
</div>
<div class="widget-data">
<div class="h4 mb-0">60/80</div>
<div class="weight-600 font-14">Pacientes Inactivos</div>
</div>
</div>
</div>
</div>
<div class="col-xl-3 mb-30" onclick="location.href='controles.php'" style="cursor: pointer;">
<div class="card-box height-100-p widget-style1">
<div class="d-flex flex-wrap align-items-center">
<div class="progress-data">
<div id="chart4"></div>
</div>
<div class="widget-data">
<div class="h4 mb-0">227/267</div>
<div class="weight-600 font-14">Controles Realizados</div>
</div>
</div>
</div>
</div>
</div>
<?php
}
if($view_controller == 2){
?>
<style>
.tr-hover:hover{
background: rgba(149, 207, 50, 0.5) !important;
}
</style>
<!-- Export Datatable start -->
<div class="card-box mb-30">
<div class="card-box pd-20 height-100-p mb-30" style="">
<div class="row align-items-center">
<div class="col-md-12 text-right">
<div class="btn-group">
<button class="btn buttons-csv" tabindex="0" type="button" style="background: #95cf32; color: white;"><span>EXCEL</span></button>
<button class="btn buttons-pdf" tabindex="0" type="button" style="background: #F26C3C; color: white;"><span>PDF</span></button>
<button class="btn btn-secondary buttons-print" tabindex="0" type="button"><span>IMPRIMIR</span></button>
</div>
</div>
<div class="col-md-12">
<h4 class="font-20 weight-500 mb-10 text-capitalize">
<div class="font-30" style="padding-left: 15px; color: #95cf32; font-weight: bold;">
Danae Fernandez
<br><hr>
</div>
</h4>
<div class="row">
<div class="col-md-4">
<table style="width: 100%;">
<tr>
<td style="width: 50%; padding-left: 15px; font-weight: bold;">Tipo Documento:</td>
<td style="width: 50%; padding-left: 15px;">DNI</td>
</tr>
<tr>
<td style="width: 50%; padding-left: 15px; font-weight: bold;">N&#176; Documento:</td>
<td style="width: 50%; padding-left: 15px;">76256156</td>
</tr>
<tr>
<td style="width: 50%; padding-left: 15px; font-weight: bold;">G&eacute;nero:</td>
<td style="width: 50%; padding-left: 15px;">Femenino</td>
</tr>
<tr>
<td style="width: 50%; padding-left: 15px; font-weight: bold;">Edad:</td>
<td style="width: 50%; padding-left: 15px;">28 a&ntilde;os</td>
</tr>
<tr>
<td style="width: 50%; padding-left: 15px; font-weight: bold;">Fecha Nac:</td>
<td style="width: 50%; padding-left: 15px;">10/21/1991</td>
</tr>
</table>
</div>
<div class="col-md-4">
<table>
<tr>
<td style="width: 30%; padding-left: 15px; font-weight: bold;">N&#176; Socio:</td>
<td style="width: 70%; padding-left: 15px;">P-001</td>
</tr>
<tr>
<td style="width: 30%; padding-left: 15px; font-weight: bold;">F. Registro:</td>
<td style="width: 70%; padding-left: 15px;">20/08/2020</td>
</tr>
<tr>
<td style="width: 30%; padding-left: 15px; font-weight: bold;">Correo:</td>
<td style="width: 70%; padding-left: 15px;">danfer.21.10@gmail.com</td>
</tr>
<tr>
<td style="width: 30%; padding-left: 15px; font-weight: bold;">Tel&eacute;fono:</td>
<td style="width: 70%; padding-left: 15px;">986377744</td>
</tr>
<tr>
<td style="width: 30%; padding-left: 15px; font-weight: bold;">Instagram:</td>
<td style="width: 70%; padding-left: 15px;">danferval</td>
</tr>
</table>
</div>
<div class="col-md-4">
<table>
<tr>
<td style="width: 30%; padding-left: 15px; font-weight: bold;">Direcci&oacute;n:</td>
<td style="width: 70%; padding-left: 15px;">Av. Ayacucho 342</td>
</tr>
<tr>
<td style="width: 30%; padding-left: 15px; font-weight: bold;">Distrito:</td>
<td style="width: 70%; padding-left: 15px;">Piura</td>
</tr>
<tr>
<td style="width: 30%; padding-left: 15px; font-weight: bold;">Provincia:</td>
<td style="width: 70%; padding-left: 15px;">Piura</td>
</tr>
<tr>
<td style="width: 30%; padding-left: 15px; font-weight: bold;">Departamento:</td>
<td style="width: 70%; padding-left: 15px;">Piura</td>
</tr>
<tr>
<td style="width: 30%; padding-left: 15px; font-weight: bold;">Residencia:</td>
<td style="width: 70%; padding-left: 15px;">PE</td>
</tr>
</table>
</div>
</div>
<!--
<br>
<h4 class="font-20 weight-500 mb-10 text-capitalize">
<div style="padding-left: 15px; color: #111; font-weight: bold; font-size: 20px;">Datos Antropom&eacute;tricos (&Uacute;ltimo control)</div>
</h4>
<table style="width: 80%;">
<tr>
<td style="width: 30%; padding-left: 15px; font-weight: bold; background: rgba(149, 207, 50, 0.5); border: 1px solid white;">Fecha:</td>
<td style="width: 70%; padding-left: 15px; background: rgba(149, 207, 50, 0.5); border: 1px solid white;">24/08/2020</td>
</tr>
<tr>
<td style="width: 30%; padding-left: 15px; font-weight: bold; background: rgba(149, 207, 50, 0.5); border: 1px solid white;">Peso (Kg):</td>
<td style="width: 70%; padding-left: 15px; background: rgba(149, 207, 50, 0.5); border: 1px solid white;">65</td>
</tr>
<tr>
<td style="width: 50%; padding-left: 15px; font-weight: bold; background: rgba(149, 207, 50, 0.5); border: 1px solid white;">IMC (%g):</td>
<td style="width: 50%; padding-left: 15px; background: rgba(149, 207, 50, 0.5); border: 1px solid white;">10</td>
</tr>
<tr>
<td style="width: 50%; padding-left: 15px; font-weight: bold; background: rgba(149, 207, 50, 0.5); border: 1px solid white;">Brazo:</td>
<td style="width: 50%; padding-left: 15px; background: rgba(149, 207, 50, 0.5); border: 1px solid white;">30</td>
</tr>
<tr>
<td style="width: 50%; padding-left: 15px; font-weight: bold; background: rgba(149, 207, 50, 0.5); border: 1px solid white;">Pecho:</td>
<td style="width: 50%; padding-left: 15px; background: rgba(149, 207, 50, 0.5); border: 1px solid white;">73</td>
</tr>
<tr>
<td style="width: 50%; padding-left: 15px; font-weight: bold; background: rgba(149, 207, 50, 0.5); border: 1px solid white;">Cintura:</td>
<td style="width: 50%; padding-left: 15px; background: rgba(149, 207, 50, 0.5); border: 1px solid white;">70</td>
</tr>
<tr>
<td style="width: 50%; padding-left: 15px; font-weight: bold; background: rgba(149, 207, 50, 0.5); border: 1px solid white;">Gl&uacute;o:</td>
<td style="width: 50%; padding-left: 15px; background: rgba(149, 207, 50, 0.5); border: 1px solid white;">60 KG</td>
</tr>
<tr>
<td style="width: 50%; padding-left: 15px; font-weight: bold; background: rgba(149, 207, 50, 0.5); border: 1px solid white;">Muslo:</td>
<td style="width: 50%; padding-left: 15px; background: rgba(149, 207, 50, 0.5); border: 1px solid white;">40</td>
</tr>
<tr>
<td style="width: 50%; padding-left: 15px; font-weight: bold; background: rgba(149, 207, 50, 0.5); border: 1px solid white;">Pantorrilla:</td>
<td style="width: 50%; padding-left: 15px; background: rgba(149, 207, 50, 0.5); border: 1px solid white;">50</td>
</tr>
<tr>
<td style="width: 50%; padding-left: 15px; font-weight: bold; background: rgba(149, 207, 50, 0.5); border: 1px solid white;">Monitoreo:</td>
<td style="width: 50%; padding-left: 15px; background: rgba(149, 207, 50, 0.5); border: 1px solid white;">
Ayuno 16 hrs noche interdiario: 02 patitas
</td>
</tr>
<tr>
<td style="width: 50%; padding-left: 15px; font-weight: bold; background: rgba(149, 207, 50, 0.5); border: 1px solid white;">Tema a cargo de:</td>
<td style="width: 50%; padding-left: 15px; background: rgba(149, 207, 50, 0.5); border: 1px solid white;"></td>
</tr>
</table>
-->
<br>
<table style="width: 100%;">
<tr>
<td style="width: 25%; padding-left: 15px; font-weight: bold; background: rgba(149, 207, 50, 0.5); border: 1px solid white; text-align: center;">Planes Rekupera</td>
<td style="width: 25%; padding-left: 15px; font-weight: bold; background: rgba(149, 207, 50, 0.5); border: 1px solid white; text-align: center;">Fecha Inicio</td>
<td style="width: 25%; padding-left: 15px; font-weight: bold; background: rgba(149, 207, 50, 0.5); border: 1px solid white; text-align: center;">Fecha Fin</td>
<td style="width: 25%; padding-left: 15px; font-weight: bold; background: rgba(149, 207, 50, 0.5); border: 1px solid white; text-align: center;">Estado</td>
</tr>
<tr>
<td style="width: 25%; padding-left: 15px; border: 1px solid white;">Reducci&oacute;n de peso y medidas</td>
<td style="width: 25%; padding-left: 15px; border: 1px solid white; text-align: center;">24/08/2020</td>
<td style="width: 25%; padding-left: 15px; border: 1px solid white; text-align: center;">24/08/2020</td>
<td style="width: 25%; padding-left: 15px; border: 1px solid white; text-align: center; color: #95cf32; font-weight: bold;">Activo</td>
</tr>
<tr>
<td style="width: 25%; padding-left: 15px; border: 1px solid white;">Reducci&oacute;n de peso y medidas</td>
<td style="width: 25%; padding-left: 15px; border: 1px solid white; text-align: center;">24/08/2020</td>
<td style="width: 25%; padding-left: 15px; border: 1px solid white; text-align: center;">24/08/2020</td>
<td style="width: 25%; padding-left: 15px; border: 1px solid white; text-align: center; color: #F26C3C; font-weight: bold;">Inactivo</td>
</tr>
<tr>
<td style="width: 25%; padding-left: 15px; border: 1px solid white;">Reducci&oacute;n de peso y medidas</td>
<td style="width: 25%; padding-left: 15px; border: 1px solid white; text-align: center;">24/08/2020</td>
<td style="width: 25%; padding-left: 15px; border: 1px solid white; text-align: center;">24/08/2020</td>
<td style="width: 25%; padding-left: 15px; border: 1px solid white; text-align: center; color: #F26C3C; font-weight: bold;">Inactivo</td>
</tr>
<tr>
<td style="width: 25%; padding-left: 15px; border: 1px solid white;">Reducci&oacute;n de peso y medidas</td>
<td style="width: 25%; padding-left: 15px; border: 1px solid white; text-align: center;">24/08/2020</td>
<td style="width: 25%; padding-left: 15px; border: 1px solid white; text-align: center;">24/08/2020</td>
<td style="width: 25%; padding-left: 15px; border: 1px solid white; text-align: center; color: #F26C3C; font-weight: bold;">Inactivo</td>
</tr>
</table>
</div>
</div>
</div>
<div class="pb-20" style="padding-left: 20px; padding-right: 20px; padding-top: 20px; display: none;">
<div class="table-responsive">
<table style="width: 1100px; margin: 0 auto;">
<tr>
<td style="width: 12.5%; padding-left: 15px; color: #fff; background: #818181; border: 1px solid white; padding-top: 3px; padding-bottom: 3px;">N&#176; Socio</td>
<td style="width: 12.5%; padding-left: 15px; color: #fff; background: #818181; border: 1px solid white; padding-top: 3px; padding-bottom: 3px;">Nombres</td>
<td style="width: 12.5%; padding-left: 15px; color: #fff; background: #818181; border: 1px solid white; padding-top: 3px; padding-bottom: 3px;">Apellidos</td>
<td style="width: 12.5%; padding-left: 15px; color: #fff; background: #818181; border: 1px solid white; padding-top: 3px; padding-bottom: 3px; text-align: center;">G&eacute;nero</td>
<td style="width: 12.5%; padding-left: 15px; color: #fff; background: #818181; border: 1px solid white; padding-top: 3px; padding-bottom: 3px; text-align: center;">Edad</td>
<td style="width: 12.5%; padding-left: 15px; color: #fff; background: #818181; border: 1px solid white; padding-top: 3px; padding-bottom: 3px; text-align: center;">Correo</td>
<td style="width: 12.5%; padding-left: 15px; color: #fff; background: #818181; border: 1px solid white; padding-top: 3px; padding-bottom: 3px; text-align: center;">Tel&eacute;fono</td>
<td style="width: 12.5%; padding-left: 15px; color: #fff; background: #818181; border: 1px solid white; padding-top: 3px; padding-bottom: 3px; text-align: center;">Estado</td>
</tr>
<tr class="tr-hover" style="cursor: pointer;">
<td style="width: 12.5%; padding-left: 15px; border: 1px solid white; padding-top: 3px; padding-bottom: 3px;">N&#176; Socio</td>
<td style="width: 12.5%; padding-left: 15px; border: 1px solid white; padding-top: 3px; padding-bottom: 3px;">Nombres</td>
<td style="width: 12.5%; padding-left: 15px; border: 1px solid white; padding-top: 3px; padding-bottom: 3px;">Apellidos</td>
<td style="width: 12.5%; padding-left: 15px; border: 1px solid white; padding-top: 3px; padding-bottom: 3px; text-align: center;">G&eacute;nero</td>
<td style="width: 12.5%; padding-left: 15px; border: 1px solid white; padding-top: 3px; padding-bottom: 3px; text-align: center;">Edad</td>
<td style="width: 12.5%; padding-left: 15px; border: 1px solid white; padding-top: 3px; padding-bottom: 3px; text-align: center;">Correo</td>
<td style="width: 12.5%; padding-left: 15px; border: 1px solid white; padding-top: 3px; padding-bottom: 3px; text-align: center;">Tel&eacute;fono</td>
<td style="width: 12.5%; padding-left: 15px; border: 1px solid white; padding-top: 3px; padding-bottom: 3px; text-align: center; color: #95cf32; font-weight: bold;">Estado</td>
</tr>
<tr class="tr-hover" style="cursor: pointer;">
<td style="width: 12.5%; padding-left: 15px; border: 1px solid white; padding-top: 3px; padding-bottom: 3px;">N&#176; Socio</td>
<td style="width: 12.5%; padding-left: 15px; border: 1px solid white; padding-top: 3px; padding-bottom: 3px;">Nombres</td>
<td style="width: 12.5%; padding-left: 15px; border: 1px solid white; padding-top: 3px; padding-bottom: 3px;">Apellidos</td>
<td style="width: 12.5%; padding-left: 15px; border: 1px solid white; padding-top: 3px; padding-bottom: 3px; text-align: center;">G&eacute;nero</td>
<td style="width: 12.5%; padding-left: 15px; border: 1px solid white; padding-top: 3px; padding-bottom: 3px; text-align: center;">Edad</td>
<td style="width: 12.5%; padding-left: 15px; border: 1px solid white; padding-top: 3px; padding-bottom: 3px; text-align: center;">Correo</td>
<td style="width: 12.5%; padding-left: 15px; border: 1px solid white; padding-top: 3px; padding-bottom: 3px; text-align: center;">Tel&eacute;fono</td>
<td style="width: 12.5%; padding-left: 15px; border: 1px solid white; padding-top: 3px; padding-bottom: 3px; text-align: center; color: #95cf32; font-weight: bold;">Estado</td>
</tr>
<tr class="tr-hover" style="cursor: pointer;">
<td style="width: 12.5%; padding-left: 15px; border: 1px solid white; padding-top: 3px; padding-bottom: 3px;">N&#176; Socio</td>
<td style="width: 12.5%; padding-left: 15px; border: 1px solid white; padding-top: 3px; padding-bottom: 3px;">Nombres</td>
<td style="width: 12.5%; padding-left: 15px; border: 1px solid white; padding-top: 3px; padding-bottom: 3px;">Apellidos</td>
<td style="width: 12.5%; padding-left: 15px; border: 1px solid white; padding-top: 3px; padding-bottom: 3px; text-align: center;">G&eacute;nero</td>
<td style="width: 12.5%; padding-left: 15px; border: 1px solid white; padding-top: 3px; padding-bottom: 3px; text-align: center;">Edad</td>
<td style="width: 12.5%; padding-left: 15px; border: 1px solid white; padding-top: 3px; padding-bottom: 3px; text-align: center;">Correo</td>
<td style="width: 12.5%; padding-left: 15px; border: 1px solid white; padding-top: 3px; padding-bottom: 3px; text-align: center;">Tel&eacute;fono</td>
<td style="width: 12.5%; padding-left: 15px; border: 1px solid white; padding-top: 3px; padding-bottom: 3px; text-align: center; color: #95cf32; font-weight: bold;">Estado</td>
</tr>
<tr class="tr-hover" style="cursor: pointer;">
<td style="width: 12.5%; padding-left: 15px; border: 1px solid white; padding-top: 3px; padding-bottom: 3px;">N&#176; Socio</td>
<td style="width: 12.5%; padding-left: 15px; border: 1px solid white; padding-top: 3px; padding-bottom: 3px;">Nombres</td>
<td style="width: 12.5%; padding-left: 15px; border: 1px solid white; padding-top: 3px; padding-bottom: 3px;">Apellidos</td>
<td style="width: 12.5%; padding-left: 15px; border: 1px solid white; padding-top: 3px; padding-bottom: 3px; text-align: center;">G&eacute;nero</td>
<td style="width: 12.5%; padding-left: 15px; border: 1px solid white; padding-top: 3px; padding-bottom: 3px; text-align: center;">Edad</td>
<td style="width: 12.5%; padding-left: 15px; border: 1px solid white; padding-top: 3px; padding-bottom: 3px; text-align: center;">Correo</td>
<td style="width: 12.5%; padding-left: 15px; border: 1px solid white; padding-top: 3px; padding-bottom: 3px; text-align: center;">Tel&eacute;fono</td>
<td style="width: 12.5%; padding-left: 15px; border: 1px solid white; padding-top: 3px; padding-bottom: 3px; text-align: center; color: #F26C3C; font-weight: bold;">Estado</td>
</tr>
<tr class="tr-hover" style="cursor: pointer;">
<td style="width: 12.5%; padding-left: 15px; border: 1px solid white; padding-top: 3px; padding-bottom: 3px;">N&#176; Socio</td>
<td style="width: 12.5%; padding-left: 15px; border: 1px solid white; padding-top: 3px; padding-bottom: 3px;">Nombres</td>
<td style="width: 12.5%; padding-left: 15px; border: 1px solid white; padding-top: 3px; padding-bottom: 3px;">Apellidos</td>
<td style="width: 12.5%; padding-left: 15px; border: 1px solid white; padding-top: 3px; padding-bottom: 3px; text-align: center;">G&eacute;nero</td>
<td style="width: 12.5%; padding-left: 15px; border: 1px solid white; padding-top: 3px; padding-bottom: 3px; text-align: center;">Edad</td>
<td style="width: 12.5%; padding-left: 15px; border: 1px solid white; padding-top: 3px; padding-bottom: 3px; text-align: center;">Correo</td>
<td style="width: 12.5%; padding-left: 15px; border: 1px solid white; padding-top: 3px; padding-bottom: 3px; text-align: center;">Tel&eacute;fono</td>
<td style="width: 12.5%; padding-left: 15px; border: 1px solid white; padding-top: 3px; padding-bottom: 3px; text-align: center; color: #F26C3C; font-weight: bold;">Estado</td>
</tr>
<tr class="tr-hover" style="cursor: pointer;">
<td style="width: 12.5%; padding-left: 15px; border: 1px solid white; padding-top: 3px; padding-bottom: 3px;">N&#176; Socio</td>
<td style="width: 12.5%; padding-left: 15px; border: 1px solid white; padding-top: 3px; padding-bottom: 3px;">Nombres</td>
<td style="width: 12.5%; padding-left: 15px; border: 1px solid white; padding-top: 3px; padding-bottom: 3px;">Apellidos</td>
<td style="width: 12.5%; padding-left: 15px; border: 1px solid white; padding-top: 3px; padding-bottom: 3px; text-align: center;">G&eacute;nero</td>
<td style="width: 12.5%; padding-left: 15px; border: 1px solid white; padding-top: 3px; padding-bottom: 3px; text-align: center;">Edad</td>
<td style="width: 12.5%; padding-left: 15px; border: 1px solid white; padding-top: 3px; padding-bottom: 3px; text-align: center;">Correo</td>
<td style="width: 12.5%; padding-left: 15px; border: 1px solid white; padding-top: 3px; padding-bottom: 3px; text-align: center;">Tel&eacute;fono</td>
<td style="width: 12.5%; padding-left: 15px; border: 1px solid white; padding-top: 3px; padding-bottom: 3px; text-align: center; color: #95cf32; font-weight: bold;">Estado</td>
</tr>
</table>
</div>
</div>
</div>
<?php
}
if($view_controller == 4){
?>
<style>
.tr-hover:hover{
background: rgba(149, 207, 50, 0.5) !important;
}
</style>
<!-- Export Datatable start -->
<div class="card-box mb-30">
<div class="card-box pd-20 height-100-p mb-30" style="">
<table style="width: 70%; margin: 0 auto; border: 2px solid #FF9C00;">
<tr>
<td style="background: #95cf32; color: #111; text-align: center; padding: 20px; font-size: 17px;"><b style="font-style: italic;">HORA</b></td>
<td style="background: #95cf32; color: #111; text-align: center; padding: 20px; font-size: 17px;"><b style="font-style: italic;">VIERNES, DOMINGO Y MARTES</b></td>
<td style="background: #95cf32; color: #111; text-align: center; padding: 20px; font-size: 17px;"><b style="font-style: italic;">JUEVES, LUNES</b></td>
</tr>
<tr>
<td style="vertical-align: middle; padding: 20px; text-align: center;">
<b style="font-size: 17px;">DESAYUNO<br>7:00 AM</b>
</td>
<td style="vertical-align: middle; padding: 20px; text-align: left;">
<b>Opci&oacute;n 1:</b> 1 und tostada integral  ½ palta c/ 01 und huevo frito + 10 unds almendras + 1 tz infusión ( 200ml)<br><br>
<b>Opci&oacute;n 2:</b> Ensalada de frutas (1 und manzana + 1 und naranja en rodajas) c/ 1 cdrta canela + 2 claras de huevo + 01 tza de café ( 200ml) 
</td>
<td style="vertical-align: middle; padding: 20px; text-align: left;">
<b>Opci&oacute;n 1:</b> 1 und tostada integral  ½ palta c/ 01 und huevo frito + 10 unds almendras + 1 tz infusión ( 200ml)<br><br>
<b>Opci&oacute;n 2:</b> Ensalada de frutas (1 und manzana + 1 und naranja en rodajas) c/ 1 cdrta canela + 2 claras de huevo + 01 tza de café ( 200ml) 
</td>
</tr>
<tr>
<td style="vertical-align: middle; padding: 10px; text-align: center; background: #FF9C00;">
<b style="font-size: 10px;">MEDIA MAÑANA<br>7:00 AM</b>
</td>
<td style="vertical-align: middle; padding: 20px; text-align: center; background: #FF9C00;">
500 ml de hierba luisa
</td>
<td style="vertical-align: middle; padding: 20px; text-align: center; background: #FF9C00;">
500 ml de agua pura
</td>
</tr>
<tr>
<td style="vertical-align: middle; padding: 20px; text-align: center;">
<b style="font-size: 17px;">ALMUERZO<br>7:00 AM</b>
</td>
<td style="vertical-align: middle; padding: 20px; text-align: left;">
<b>Opci&oacute;n 1:</b> 1 und tostada integral  ½ palta c/ 01 und huevo frito + 10 unds almendras + 1 tz infusión ( 200ml)<br><br>
<b>Opci&oacute;n 2:</b> Ensalada de frutas (1 und manzana + 1 und naranja en rodajas) c/ 1 cdrta canela + 2 claras de huevo + 01 tza de café ( 200ml) 
</td>
<td style="vertical-align: middle; padding: 20px; text-align: left;">
<b>Opci&oacute;n 1:</b> 1 und tostada integral  ½ palta c/ 01 und huevo frito + 10 unds almendras + 1 tz infusión ( 200ml)<br><br>
<b>Opci&oacute;n 2:</b> Ensalada de frutas (1 und manzana + 1 und naranja en rodajas) c/ 1 cdrta canela + 2 claras de huevo + 01 tza de café ( 200ml) 
</td>
</tr>
<tr>
<td style="vertical-align: middle; padding: 10px; text-align: center; background: #FF9C00;">
<b style="font-size: 12px;">MEDIA TARDE<br>7:00 AM</b>
</td>
<td style="vertical-align: middle; padding: 10px; text-align: center; background: #FF9C00;">
500 ml de hierba luisa
</td>
<td style="vertical-align: middle; padding: 10px; text-align: center; background: #FF9C00;">
500 ml de agua pura
</td>
</tr>
<tr>
<td style="vertical-align: middle; padding: 20px; text-align: center;">
<b style="font-size: 17px;">CENA<br>7:00 AM</b>
</td>
<td style="vertical-align: middle; padding: 20px; text-align: left;">
<b>Opci&oacute;n 1:</b> 1 und tostada integral  ½ palta c/ 01 und huevo frito + 10 unds almendras + 1 tz infusión ( 200ml)<br><br>
<b>Opci&oacute;n 2:</b> Ensalada de frutas (1 und manzana + 1 und naranja en rodajas) c/ 1 cdrta canela + 2 claras de huevo + 01 tza de café ( 200ml) 
</td>
<td style="vertical-align: middle; padding: 20px; text-align: left;">
<b>Opci&oacute;n 1:</b> 1 und tostada integral  ½ palta c/ 01 und huevo frito + 10 unds almendras + 1 tz infusión ( 200ml)<br><br>
<b>Opci&oacute;n 2:</b> Ensalada de frutas (1 und manzana + 1 und naranja en rodajas) c/ 1 cdrta canela + 2 claras de huevo + 01 tza de café ( 200ml) 
</td>
</tr>
</table>
</div>
</div>
<?php
}
}