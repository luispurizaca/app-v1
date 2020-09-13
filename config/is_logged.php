<?php

//INICIAR VARIABLES DE SESION
session_start();

//VALIDAR SI HA INICIADO SESION
if(!isset($_SESSION['AUTORIZADO']) || $_SESSION['AUTORIZADO'] != true){
?>
<script>
location.href = 'login.php';
</script>
<?php
exit();
exit();
}

//VALIDAR SI PERTENECE A LA SESION
if($_GET['session_id']){
if($_SESSION['SESSION_ID'] != $_GET['session_id']){
?>
<script>
alert("Su sesi\u00F3n ha expirado.");
location.reload();
</script>
<?php
exit();
exit();
}
}

//CONFIGURAR ZONA HORARIA
date_default_timezone_set('America/Lima');