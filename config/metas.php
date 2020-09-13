<?php
if(isset($con)){
//1. inicio.php
//2. pacientes.php
//3. controles.php
//4. planes.php
//5. recetas.php
//6. agendas.php
//7. configuracion.php

//TITULO
if($view_controller == 1){
$title = 'Katherine Alfaro - Nutricionista y Coach';
}
if($view_controller == 2){
$title = 'Pacientes';
}
if($view_controller == 3){
$title = 'Controles';
}
if($view_controller == 4){
$title = 'Planes de Alimentaci&oacute;n';
}
if($view_controller == 5){
$title = 'Recetas';
}
if($view_controller == 6){
$title = 'Agendas';
}
if($view_controller == 7){
$title = 'Configuraci&oacute;n';
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
<?php
if(
$view_controller == 1 ||
$view_controller == 2 ||
$view_controller == 3 ||
$view_controller == 4 ||
$view_controller == 5 ||
$view_controller == 6 ||
$view_controller == 7
){
?>
<!-- CSS -->
<link rel="stylesheet" type="text/css" href="vendors/styles/core.css">
<link rel="stylesheet" type="text/css" href="vendors/styles/icon-font.min.css">
<link rel="stylesheet" type="text/css" href="src/plugins/datatables/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" type="text/css" href="src/plugins/datatables/css/responsive.bootstrap4.min.css">
<link rel="stylesheet" type="text/css" href="vendors/styles/style.css">
<!-- Global site tag (gtag.js) - Google Analytics 
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-119386393-1"></script>
<script>
window.dataLayer = window.dataLayer || [];
function gtag(){dataLayer.push(arguments);}
gtag('js', new Date());

gtag('config', 'UA-119386393-1');
</script>
-->
<?php
}
?>
<title><?php echo $title; ?></title>
<?php
}