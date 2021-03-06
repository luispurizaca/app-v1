<?php
// Notificar todos los errores excepto E_NOTICE
error_reporting(E_ALL ^ E_NOTICE);

//VIEW CONTROLLER
$view_controller = 11;

//GET NUTRICIONISTA - VENDEDOR
$get_nuevo_nutricionista = (int)$_GET['nuevo_nutricionista'];
$get_nuevo_vendedor = (int)$_GET['nuevo_vendedor'];

//REQUIRES
require_once(__DIR__.'/config/is_logged.php');
require_once(__DIR__.'/config/conexion_bd.php');
require_once(__DIR__.'/config/datos_bd.php');
?>
<!DOCTYPE html>
<html>
<head>
<?php
//METAS
require_once(__DIR__.'/config/metas.php');
?>
</head>
<body>
<?php
//HEADER
require_once(__DIR__.'/config/header.php');
?>
<div class="main-container">
<div class="pd-ltr-15">
<?php
//CONTENIDO
require_once(__DIR__.'/config/content.php');
?>
</div>
</div>
<?php
//FOOTER
require_once(__DIR__.'/config/footer.php');

//PROGRESS
require_once(__DIR__.'/config/progress.php');
?>
</body>
</html>