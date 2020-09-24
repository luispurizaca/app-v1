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
<link rel="apple-touch-icon" sizes="180x180" href="vendors/images/icono.png">
<link rel="icon" type="image/png" sizes="32x32" href="vendors/images/icono.png">
<link rel="icon" type="image/png" sizes="16x16" href="vendors/images/icono.png">

<!-- Mobile Specific Metas -->
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

<!-- Google Font -->
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

<!-- JQUERY -->
<script src="src/scripts/jquery.min.js"></script>

<!-- CSS -->
<link rel="stylesheet" type="text/css" href="vendors/styles/core.css">
<link rel="stylesheet" type="text/css" href="vendors/styles/icon-font.min.css">
<link rel="stylesheet" type="text/css" href="src/plugins/datatables/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" type="text/css" href="src/plugins/datatables/css/responsive.bootstrap4.min.css">
<link rel="stylesheet" type="text/css" href="src/plugins/fullcalendar/fullcalendar.css">
<link rel="stylesheet" type="text/css" href="vendors/styles/style.css">

<script src="vendors/scripts/core.js"></script>
<script src="vendors/scripts/script.min.js"></script>
<script src="vendors/scripts/layout-settings.js"></script>
<script src="src/plugins/apexcharts/apexcharts.min.js"></script>
<script src="src/plugins/datatables/js/jquery.dataTables.min.js"></script>
<script src="src/plugins/datatables/js/dataTables.bootstrap4.min.js"></script>
<script src="src/plugins/datatables/js/dataTables.responsive.min.js"></script>
<script src="src/plugins/datatables/js/responsive.bootstrap4.min.js"></script>
<script src="src/plugins/fullcalendar/fullcalendar.min.js"></script>
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
<title><?php echo $title; ?></title>
<?php
}