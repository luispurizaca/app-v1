<?php
if(isset($con)){
//1. inicio.php
//2. pacientes.php
//3. planes.php
//4. suscripciones.php
//5. controles.php
//6. recetas.php
//7. agendas.php
//8. configuracion.php

//TITULO
if($view_controller == 1){
$title = 'Katherine Alfaro - Nutricionista y Coach';
}
if($view_controller == 2){
$title = 'Pacientes';
}
if($view_controller == 3){
$title = 'Planes de Alimentaci&oacute;n';
}
if($view_controller == 4){
$title = 'Suscripciones';
}
if($view_controller == 5){
$title = 'Controles';
}
if($view_controller == 6){
$title = 'Cobros';
}
if($view_controller == 7){
$title = 'Recetas';
}
if($view_controller == 8){
$title = 'Agendas';
}
if($view_controller == 9){
$title = 'Configuraci&oacute;n';
}
if($view_controller == 10){
$title = 'Nutricionistas';
}
?>
<meta charset="utf-8">

<!-- Site favicon -->
<link rel="apple-touch-icon" sizes="57x57" href="vendors/icon/apple-icon-57x57.png">
<link rel="apple-touch-icon" sizes="60x60" href="vendors/icon/apple-icon-60x60.png">
<link rel="apple-touch-icon" sizes="72x72" href="vendors/icon/apple-icon-72x72.png">
<link rel="apple-touch-icon" sizes="76x76" href="vendors/icon/apple-icon-76x76.png">
<link rel="apple-touch-icon" sizes="114x114" href="vendors/icon/apple-icon-114x114.png">
<link rel="apple-touch-icon" sizes="120x120" href="vendors/icon/apple-icon-120x120.png">
<link rel="apple-touch-icon" sizes="144x144" href="vendors/icon/apple-icon-144x144.png">
<link rel="apple-touch-icon" sizes="152x152" href="vendors/icon/apple-icon-152x152.png">
<link rel="apple-touch-icon" sizes="180x180" href="vendors/icon/apple-icon-180x180.png">
<link rel="icon" type="image/png" sizes="192x192"  href="vendors/icon/android-icon-192x192.png">
<link rel="icon" type="image/png" sizes="32x32" href="vendors/icon/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="96x96" href="vendors/icon/favicon-96x96.png">
<link rel="icon" type="image/png" sizes="16x16" href="vendors/icon/favicon-16x16.png">
<link rel="manifest" href="vendors/icon/manifest.json">
<meta name="msapplication-TileColor" content="#ffffff">
<meta name="msapplication-TileImage" content="vendors/icon/ms-icon-144x144.png">
<meta name="theme-color" content="#ffffff">

<!-- Mobile Specific Metas -->
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

<!-- Google Font -->
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

<!-- JQUERY <script src="src/scripts/jquery.min.js"></script> -->
<script src="//negocia.pe/js/jquery.min.js?v=00001" type="text/javascript"></script>

<!-- CSS -->
<link rel="stylesheet" type="text/css" href="vendors/styles/core.css">
<link rel="stylesheet" type="text/css" href="vendors/styles/icon-font.min.css">
<link rel="stylesheet" type="text/css" href="src/plugins/datatables/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" type="text/css" href="src/plugins/datatables/css/responsive.bootstrap4.min.css">
<link rel="stylesheet" type="text/css" href="vendors/styles/style.css">

<script src="vendors/scripts/core.js"></script>
<script src="vendors/scripts/script.min.js"></script>
<script src="vendors/scripts/layout-settings.js"></script>
<script src="src/plugins/apexcharts/apexcharts.min.js"></script>
<script src="src/plugins/datatables/js/jquery.dataTables.min.js"></script>
<script src="src/plugins/datatables/js/dataTables.bootstrap4.min.js"></script>
<script src="src/plugins/datatables/js/dataTables.responsive.min.js"></script>
<script src="src/plugins/datatables/js/responsive.bootstrap4.min.js"></script>
<script src="vendors/scripts/calendar-setting.js"></script>
<script src="src/plugins/apexcharts/apexcharts.min.js"></script>
<script src="src/plugins/sweetalert2/sweetalert2.all.js"></script>
<!-- Global site tag (gtag.js) - Google Analytics 
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-119386393-1"></script>
<script>
window.dataLayer = window.dataLayer || [];
function gtag(){dataLayer.push(arguments);}
gtag('js', new Date());

gtag('config', 'UA-119386393-1');
</script>
-->

<!-- FullCalendar -->
<link href='config/fullcalendar/css/fullcalendar.css' rel='stylesheet' />
<script src='config/fullcalendar/js/moment.min.js'></script>
<script src='config/fullcalendar/js/fullcalendar/fullcalendar.min.js'></script>
<script src='config/fullcalendar/js/fullcalendar/fullcalendar.js'></script>
<script src='config/fullcalendar/js/fullcalendar/locale/es.js'></script>

<title><?php echo $title; ?></title>
<style>
.n-form-control{
padding: 4px !important;
height: 25px !important;
font-size: 12px !important;
}
.n-label{
padding-left: 3px !important;
}

/*TABLAS*/
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

/*PLANES DE ALIMENTACION*/
.n-input-plan-alimentacion{
text-align: center;
width: 80px;
}
.n-form-control-text-area-plan{
padding: 4px !important;
height: 90px !important;
font-size: 12px !important;
width: 100% !important;
}
.n-form-control-text-area-plan-2{
padding: 4px !important;
height: 40px !important;
font-size: 12px !important;
width: 100% !important;
text-align: center;
}





#calendar {
max-width: 800px;
}
.col-centered{
float: none;
margin: 0 auto;
}
</style>
<?php
}