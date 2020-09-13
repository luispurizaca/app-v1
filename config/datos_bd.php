<?php
//DATOS DEL USUARIO
$query_usuario = mysqli_query($con, "SELECT codigo, correo, nombres, apellidos, fecha_nacimiento FROM usuario WHERE id = '".$_SESSION['ID_USUARIO']."' ORDER BY id ASC LIMIT 1");
$row_usuario = mysqli_fetch_array($query_usuario);
$_SESSION['usuario_codigo'] = $row_usuario[0];
$_SESSION['usuario_correo'] = $row_usuario[1];
$_SESSION['usuario_nombres'] = $row_usuario[2];
$_SESSION['usuario_apellidos'] = $row_usuario[3];
$_SESSION['usuario_fecha_nacimiento'] = $row_usuario[4];