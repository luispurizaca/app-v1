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

//CONFIGURAR ZONA HORARIA
date_default_timezone_set('America/Lima');