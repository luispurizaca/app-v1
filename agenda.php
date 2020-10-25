<?php
// Notificar todos los errores excepto E_NOTICE
error_reporting(E_ALL ^ E_NOTICE);

//VIEW CONTROLLER
$view_controller = 8;

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
<frameset rows="100%, *" frameborder="no" framespacing="0" border="0">
<frame src="http://www.nutrikatherinealfaro.com.pe/app-v1/config/fullcalendar/" name="mainwindow" frameborder="no" framespacing="0" marginheight="0" marginwidth="0"></frame>
</frameset>
<noframes>
Su navegador no soporta frames. Le recomendamos actualizar su navegador.
</noframes>
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