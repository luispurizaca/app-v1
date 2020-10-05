<?php

//DATOS DEL USUARIO
$query_usuario = mysqli_query($con, "SELECT codigo, correo, nombres, apellidos, fecha_nacimiento FROM usuario WHERE id = '".$_SESSION['ID_USUARIO']."' ORDER BY id ASC LIMIT 1");
$row_usuario = mysqli_fetch_array($query_usuario);
$_SESSION['usuario_codigo'] = $row_usuario[0];
$_SESSION['usuario_correo'] = $row_usuario[1];
$_SESSION['usuario_nombres'] = $row_usuario[2];
$_SESSION['usuario_apellidos'] = $row_usuario[3];
$_SESSION['usuario_fecha_nacimiento'] = $row_usuario[4];

//NUTRICIONISTA
if($_SESSION['ID_TIPO_USUARIO'] == 1){

//META MAXIMA DE PACIENTES
$row_maximo_pacientes = mysqli_fetch_array(mysqli_query($con, "SELECT maximo_pacientes FROM usuario WHERE id = '".$_SESSION['ID_USUARIO']."' LIMIT 1"));
$maximo_pacientes = (int)$row_maximo_pacientes[0];
$_SESSION['usuario_maximo_pacientes'] = $maximo_pacientes;

//NUMERO TOTAL DE SUSCRIPCIONES
$num_rows_suscripciones = mysqli_num_rows(mysqli_query($con, "SELECT id FROM suscripcion_programa WHERE id_nutricionista = '".$_SESSION['ID_USUARIO']."' AND id_paciente IN (SELECT id FROM usuario WHERE activo = 1 AND id_tipo_usuario = 2)"));
$_SESSION['usuario_total_suscripciones'] = $num_rows_suscripciones;

//TOTAL DE CONTROLES
$total_controles = $num_rows_suscripciones * 4;
$_SESSION['total_controles'] = $total_controles;

//TOTAL DE CONTROLES REALIZADOS
$num_rows_controles_realizados = mysqli_num_rows(mysqli_query($con, "SELECT id FROM control WHERE id_suscripcion IN (SELECT id FROM suscripcion_programa WHERE id_nutricionista = '".$_SESSION['ID_USUARIO']."' AND id_paciente IN (SELECT id FROM usuario WHERE activo = 1 AND id_tipo_usuario = 2))"));
$_SESSION['usuario_controles_realizados'] = $num_rows_controles_realizados;

//NUMERO TOTAL DE PACIENTES
$num_rows_pacientes = mysqli_num_rows(mysqli_query($con, "SELECT id FROM nutricionista_paciente WHERE id_nutricionista = '".$_SESSION['ID_USUARIO']."' AND id_paciente IN (SELECT id FROM usuario WHERE activo = 1 AND id_tipo_usuario = 2)"));
$_SESSION['usuario_total_pacientes'] = $num_rows_pacientes;

//NUMERO TOTAL DE PACIENTES ACTIVOS
$num_rows_pacientes_activos = mysqli_num_rows(mysqli_query($con, "SELECT id FROM nutricionista_paciente WHERE id_nutricionista = '".$_SESSION['ID_USUARIO']."' AND id_paciente IN (SELECT id FROM usuario WHERE activo = 1 AND id_tipo_usuario = 2 AND estado = 1)"));
$_SESSION['usuario_total_pacientes_activos'] = $num_rows_pacientes_activos;

//NUMERO TOTAL DE PACIENTES ACTIVOS
$num_rows_pacientes_inactivos = mysqli_num_rows(mysqli_query($con, "SELECT id FROM nutricionista_paciente WHERE id_nutricionista = '".$_SESSION['ID_USUARIO']."' AND id_paciente IN (SELECT id FROM usuario WHERE activo = 1 AND id_tipo_usuario = 2 AND estado != 1)"));
$_SESSION['usuario_total_pacientes_inactivos'] = $num_rows_pacientes_inactivos;
}

//PACIENTE
if($_SESSION['ID_TIPO_USUARIO'] == 2){

//NUMERO MAXIMO DE SUSCRIPCIONES
$_SESSION['usuario_maximo_suscripciones'] = 10;

//NUMERO TOTAL DE SUSCRIPCIONES
$num_rows_suscripciones = mysqli_num_rows(mysqli_query($con, "SELECT id FROM suscripcion_programa WHERE id_paciente = '".$_SESSION['ID_USUARIO']."' AND id_paciente IN (SELECT id FROM usuario WHERE activo = 1 AND id_tipo_usuario = 2)"));
$_SESSION['usuario_total_suscripciones'] = $num_rows_suscripciones;

//TOTAL DE CONTROLES
$total_controles = $num_rows_suscripciones * 4;
$_SESSION['total_controles'] = $total_controles;

//TOTAL DE CONTROLES REALIZADOS
$num_rows_controles_realizados = mysqli_num_rows(mysqli_query($con, "SELECT id FROM control WHERE id_suscripcion IN (SELECT id FROM suscripcion_programa WHERE id_paciente = '".$_SESSION['ID_USUARIO']."' AND id_paciente IN (SELECT id FROM usuario WHERE activo = 1 AND id_tipo_usuario = 2))"));
$_SESSION['usuario_controles_realizados'] = $num_rows_controles_realizados;

}

//ADMINISTRADOR
if($_SESSION['ID_TIPO_USUARIO'] == 3){

//META MAXIMA DE PACIENTES
$row_maximo_pacientes = mysqli_fetch_array(mysqli_query($con, "SELECT maximo_pacientes FROM usuario WHERE id = '".$_SESSION['ID_USUARIO']."' LIMIT 1"));
$maximo_pacientes = (int)$row_maximo_pacientes[0];
$_SESSION['admin_maximo_pacientes'] = $maximo_pacientes;

//NUMERO TOTAL DE SUSCRIPCIONES
$num_rows_suscripciones = mysqli_num_rows(mysqli_query($con, "SELECT id FROM suscripcion_programa WHERE id_paciente IN (SELECT id FROM usuario WHERE activo = 1 AND id_tipo_usuario = 2)"));
$_SESSION['usuario_total_suscripciones'] = (int)$num_rows_suscripciones;

//TOTAL DE CONTROLES
$total_controles = $num_rows_suscripciones * 4;
$_SESSION['total_controles'] = $total_controles;

//TOTAL DE CONTROLES REALIZADOS
$num_rows_controles_realizados = mysqli_num_rows(mysqli_query($con, "SELECT id FROM control WHERE id_suscripcion IN (SELECT id FROM suscripcion_programa WHERE id_paciente IN (SELECT id FROM usuario WHERE activo = 1 AND id_tipo_usuario = 2))"));
$_SESSION['usuario_controles_realizados'] = (int)$num_rows_controles_realizados;

//NUMERO TOTAL DE NUTRICIONISTAS
$num_rows_nutricionistas = mysqli_num_rows(mysqli_query($con, "SELECT id FROM usuario WHERE activo = 1 AND id_tipo_usuario = 1"));
$_SESSION['admin_total_nutricionistas'] = (int)$num_rows_nutricionistas;

//MAXIMO DE NUTRICIONISTAS
$_SESSION['admin_maximo_nutricionistas'] = 500;

//NUMERO TOTAL DE VENDEDORES
$num_rows_vendedores = mysqli_num_rows(mysqli_query($con, "SELECT id FROM usuario WHERE activo = 1 AND id_tipo_usuario = 4"));
$_SESSION['admin_total_vendedores'] = (int)$num_rows_vendedores;

//MAXIMO DE VENDEDORES
$_SESSION['admin_maximo_vendedores'] = 500;

//NUMERO TOTAL DE PACIENTES
$num_rows_total_pacientes = mysqli_num_rows(mysqli_query($con, "SELECT id FROM usuario WHERE activo = 1 AND id_tipo_usuario = 2"));
$_SESSION['admin_total_pacientes'] = (int)$num_rows_total_pacientes;

//NUMERO TOTAL DE PACIENTES ACTIVOS
$num_rows_pacientes_activos = mysqli_num_rows(mysqli_query($con, "SELECT id FROM usuario WHERE activo = 1 AND id_tipo_usuario = 2 AND estado = 1"));
$_SESSION['admin_total_pacientes_activos'] = (int)$num_rows_pacientes_activos;

//NUMERO TOTAL DE PACIENTES INACTIVOS
$num_rows_pacientes_inactivos = mysqli_num_rows(mysqli_query($con, "SELECT id FROM usuario WHERE activo = 1 AND id_tipo_usuario = 2 AND estado != 1"));
$_SESSION['admin_total_pacientes_inactivos'] = (int)$num_rows_pacientes_inactivos;
}

//VENDEDOR
if($_SESSION['ID_TIPO_USUARIO'] == 4){

//META MAXIMA DE PACIENTES
$row_maximo_pacientes = mysqli_fetch_array(mysqli_query($con, "SELECT maximo_pacientes FROM usuario WHERE id = '".$_SESSION['ID_USUARIO']."' LIMIT 1"));
$maximo_pacientes = (int)$row_maximo_pacientes[0];
$_SESSION['usuario_maximo_pacientes'] = $maximo_pacientes;

//NUMERO TOTAL DE PACIENTES
$num_rows_pacientes = mysqli_num_rows(mysqli_query($con, "SELECT id FROM usuario WHERE activo = 1 AND id_tipo_usuario = 2 AND id_vendedor = '".$_SESSION['ID_USUARIO']."'"));
$_SESSION['usuario_total_pacientes'] = (int)$num_rows_pacientes;

//NUMERO TOTAL DE SUSCRIPCIONES
$num_rows_suscripciones = mysqli_num_rows(mysqli_query($con, "SELECT id FROM suscripcion_programa WHERE id_vendedor = '".$_SESSION['ID_USUARIO']."' AND id_paciente IN (SELECT id FROM usuario WHERE activo = 1 AND id_tipo_usuario = 2)"));
$_SESSION['usuario_total_suscripciones'] = (int)$num_rows_suscripciones;

//NUMERO TOTAL DE SUSCRIPCIONES NUEVAS
$num_rows_suscripciones_nuevas = mysqli_num_rows(mysqli_query($con, "SELECT id FROM suscripcion_programa WHERE id_tipo_suscripcion = 1 AND id_vendedor = '".$_SESSION['ID_USUARIO']."' AND id_paciente IN (SELECT id FROM usuario WHERE activo = 1 AND id_tipo_usuario = 2)"));
$_SESSION['usuario_total_suscripciones_nuevas'] = (int)$num_rows_suscripciones_nuevas;

//NUMERO TOTAL DE SUSCRIPCIONES RENOVADAS
$num_rows_suscripciones_renovadas = mysqli_num_rows(mysqli_query($con, "SELECT id FROM suscripcion_programa WHERE id_tipo_suscripcion = 2 AND id_vendedor = '".$_SESSION['ID_USUARIO']."' AND id_paciente IN (SELECT id FROM usuario WHERE activo = 1 AND id_tipo_usuario = 2)"));
$_SESSION['usuario_total_suscripciones_renovadas'] = (int)$num_rows_suscripciones_renovadas;
}