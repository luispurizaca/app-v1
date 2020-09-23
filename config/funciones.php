<?php

//1. PACIENTES

//FUNCION CONSULTAS
function consulta($array_filtros){

//DATOS
global $con;
$view_controler = (int)$array_filtros[0];
$activos = (int)$array_filtros[1];
$id_tipo_usuario = (int)$array_filtros[2];
$offset = $array_filtros[3];
$per_page = $array_filtros[4];
$id_registro = (int)$array_filtros[5];
$fn_id_paciente = (int)$array_filtros[6];
$fn_id_suscripcion = (int)$array_filtros[7];


//CONSULTA PACIENTES
if($view_controler == 2){

//CONSULTA PRINCIPAL
$consulta_sql_general = "
SELECT
usuario.codigo AS CODIGO,
usuario.nombres AS NOMBRES,
usuario.apellidos AS APELLIDOS,
usuario.genero AS GENERO,
usuario.fecha_nacimiento AS FECHA_NACIMIENTO,
(SELECT usuario_correo.correo FROM usuario_correo WHERE usuario.id = usuario_correo.id_usuario ORDER BY usuario_correo.id ASC LIMIT 1) AS CORREO,
(SELECT usuario_telefono.telefono FROM usuario_telefono WHERE usuario.id = usuario_telefono.id_usuario ORDER BY usuario_telefono.id ASC LIMIT 1) AS TELEFONO,
usuario.estado AS ESTADO,
usuario.id_tipo_usuario AS ID_TIPO_USUARIO,
usuario.id AS ID_USUARIO,
usuario.id_tipo_documento AS ID_TIPO_DOCUMENTO,
usuario.numero_documento AS NUMERO_DOCUMENTO,
(SELECT tipo_documento.nombre FROM tipo_documento WHERE usuario.id_tipo_documento = tipo_documento.id ORDER BY tipo_documento.id ASC LIMIT 1) AS TEXTO_TIPO_DOCUMENTO,
usuario.date_added AS FECHA_REGISTRO,
usuario.instagram AS INSTAGRAM,
usuario.direccion AS DIRECCION,
usuario.distrito AS DISTRITO,
usuario.provincia AS PROVINCIA,
usuario.departamento AS DEPARTAMENTO,
usuario.residencia AS RESIDENCIA,
usuario.maximo_pacientes AS MAXIMO_PACIENTES,
usuario.peso_meta AS PESO_META,
usuario.talla AS TALLA
FROM usuario
WHERE activo = 1";

//FILTRO ID USUARIO
if(!empty($id_registro)){
$consulta_sql_general .= " AND usuario.id = '$id_registro'";
}

//FILTRO ACTIVOS / INACTIVOS
if(!empty($activos)){
if($activos == 1){
$consulta_sql_general .= " AND usuario.estado = 1 ";
}
if($activos == 2){
$consulta_sql_general .= " AND usuario.estado = 0 ";
}
}

//FILTRO ID TIPO DE USUARIO
if(!empty($id_tipo_usuario)){
$consulta_sql_general .= " AND usuario.id_tipo_usuario = '$id_tipo_usuario'";
}

//ORDER BY
$consulta_sql_general .= "
ORDER BY usuario.id DESC
";
}

//CONSULTA SUSCRIPCIONES
if($view_controler == 4){

//CONSULTA PRINCIPAL
$consulta_sql_general = "
SELECT
suscripcion_programa.id AS ID_SUSCRIPCION,
suscripcion_programa.id_programa AS ID_PROGRAMA,
suscripcion_programa.id_nutricionista AS ID_NUTRICIONISTA,
suscripcion_programa.id_paciente AS ID_PACIENTE,
suscripcion_programa.fecha_inicio AS FECHA_INICIO,
suscripcion_programa.fecha_fin AS FECHA_FIN,
suscripcion_programa.estado AS ESTADO,
suscripcion_programa.indicaciones AS INDICACIONES
FROM suscripcion_programa
WHERE suscripcion_programa.id_nutricionista = '".$_SESSION['ID_USUARIO']."'";

//FILTRO ID REGISTRO
if(!empty($id_registro)){
$consulta_sql_general .= " AND suscripcion_programa.id = '$id_registro'";
}

//FILTRO ACTIVOS / INACTIVOS
if(!empty($activos)){
$consulta_sql_general .= " AND suscripcion_programa.condicion = '$activos'";
}

//ORDER BY
$consulta_sql_general .= "
ORDER BY suscripcion_programa.id DESC
";
}

//CONSULTA CONTROLES
if($view_controler == 5){

//CONSULTA PRINCIPAL
$consulta_sql_general = "
SELECT
control.id AS ID_CONTROL,
control.codigo AS CODIGO,
suscripcion_programa.id AS ID_SUSCRIPCION,
suscripcion_programa.id_programa AS ID_PROGRAMA,
suscripcion_programa.id_nutricionista AS ID_NUTRICIONISTA,
suscripcion_programa.id_paciente AS ID_PACIENTE,
control.fecha AS FECHA,
control.peso AS PESO,
control.imc AS IMC,
control.brazo AS BRAZO,
control.pecho AS PECHO,
control.cintura AS CINTURA,
control.cadera AS CADERA,
control.gluteo AS GLUTEO,
control.muslo AS MUSLO,
control.pantorrilla AS PANTORRILLA,
control.diagnostico AS DIAGNOSTICO,
suscripcion_programa.fecha_inicio AS SUSCRIPCION_FECHA_INICIO,
suscripcion_programa.fecha_fin AS SUSCRIPCION_FECHA_FIN,
suscripcion_programa.estado AS SUSCRIPCION_ESTADO
FROM control, suscripcion_programa
WHERE suscripcion_programa.id_nutricionista = '".$_SESSION['ID_USUARIO']."' AND suscripcion_programa.id = control.id_suscripcion";

//FILTRO ID PACIENTE
if(!empty($fn_id_paciente)){
$consulta_sql_general .= " AND control.id_paciente = '$fn_id_paciente'";
}

//FILTRO ID SUSCRIPCION
if(!empty($fn_id_suscripcion)){
$consulta_sql_general .= " AND suscripcion_programa.id = '$fn_id_suscripcion'";
}

//FILTRO ID CONTROL
if(!empty($id_registro)){
$consulta_sql_general .= " AND control.id = '$id_registro'";
}

//ORDER BY
$consulta_sql_general .= "
ORDER BY control.fecha DESC
";
}

//CONSULTA COBROS
if($view_controler == 6){

//CONSULTA PRINCIPAL
$consulta_sql_general = "
SELECT
cobro.id AS ID_COBRO,
suscripcion_programa.id AS ID_SUSCRIPCION,
suscripcion_programa.id_programa AS ID_PROGRAMA,
suscripcion_programa.id_paciente AS ID_NUTRICIONISTA,
suscripcion_programa.id_paciente AS ID_PACIENTE,
cobro.fecha_pago AS FECHA_PAGO,
cobro.id_medio_pago AS ID_MEDIO_PAGO,
cobro.id_cuenta_bancaria AS ID_CUENTA_BANCARIA,
cobro.monto AS MONTO
FROM cobro, suscripcion_programa
WHERE suscripcion_programa.id_nutricionista = '".$_SESSION['ID_USUARIO']."' AND suscripcion_programa.id = cobro.id_suscripcion";

//FILTRO ID PACIENTE
if(!empty($id_registro)){
$consulta_sql_general .= " AND suscripcion_programa.id_paciente = '$id_registro'";
}

//ORDER BY
$consulta_sql_general .= "
ORDER BY cobro.fecha_pago DESC
";
}

//CONSULTA RECETAS
if($view_controler == 7){

//CONSULTA PRINCIPAL
$consulta_sql_general = "
SELECT
receta.id AS ID_RECETA,
suscripcion_programa.id AS ID_SUSCRIPCION,
suscripcion_programa.id_programa AS ID_PROGRAMA,
suscripcion_programa.id_nutricionista AS ID_NUTRICIONISTA,
suscripcion_programa.id_paciente AS ID_PACIENTE,
receta.nombre AS NOMBRE_RECETA,
receta.descripcion AS DESCRIPCION,
receta.preparacion AS PREPARACION,
receta.foto AS FOTO,
control.id AS ID_CONTROL,
control.codigo AS CODIGO_CONTROL
FROM receta, control, suscripcion_programa
WHERE suscripcion_programa.id_nutricionista = '".$_SESSION['ID_USUARIO']."' AND suscripcion_programa.id = control.id_suscripcion AND control.id = receta.id_control";

//FILTRO ID PACIENTE
if(!empty($id_registro)){
$consulta_sql_general .= " AND suscripcion_programa.id_paciente = '$id_registro'";
}

//ORDER BY
$consulta_sql_general .= "
ORDER BY suscripcion_programa.id DESC
";
}

//OFFSETS
if(empty($per_page)){
$consulta_sql_general_add = "";
} else {
$consulta_sql_general_add = " LIMIT $offset, $per_page";
}

//CONSTRUIR ARRAY CON LOS DATOS
$array_sql_general;
$array_i_general = 0;
$query_sql_general = mysqli_query($con, $consulta_sql_general.$consulta_sql_general_add);
while($sql_general_row = mysqli_fetch_array($query_sql_general)){

//DATOS - PACIENTES
if($view_controler == 2){
$ret_codigo = $sql_general_row[0];
$ret_nombres = $sql_general_row[1];
$ret_apellidos = $sql_general_row[2];
$ret_genero = (int)$sql_general_row[3];
$ret_fecha_nacimiento = $sql_general_row[4];
$ret_correo = $sql_general_row[5];
$ret_telefono = $sql_general_row[6];
$ret_estado = (int)$sql_general_row[7];
$ret_id_tipo_usuario = (int)$sql_general_row[8];
$ret_id_usuario = (int)$sql_general_row[9];
$ret_id_tipo_documento = (int)$sql_general_row[10];
$ret_numero_documento = $sql_general_row[11];
$ret_texto_tipo_documento = $sql_general_row[12];
$ret_date_added = $sql_general_row[13];
$ret_instagram = $sql_general_row[14];
$ret_direccion = $sql_general_row[15];
$ret_distrito = $sql_general_row[16];
$ret_provincia = $sql_general_row[17];
$ret_departamento = $sql_general_row[18];
$ret_residencia = $sql_general_row[19];
$ret_maximo_pacientes = (int)$sql_general_row[20];
$ret_peso_meta = (float)$sql_general_row[21];
$ret_talla = (float)$sql_general_row[22];

//GENERO
if($ret_genero == 1){
$texto_genero = 'Masculino';
} else {
$texto_genero = 'Femenino';
}

//ESTADO
if($ret_estado == 1){
$css_color = '#95cf32';
$texto_estado = 'Activo';
} else {
$css_color = '#F26C3C';
$texto_estado = 'Inactivo';
}

//DATOS ANTROPOMETRICOS ACTUALES DEL PACIENTE
$row_peso_actual = mysqli_fetch_array(mysqli_query($con, "SELECT peso, imc FROM control WHERE id_suscripcion IN (SELECT id FROM suscripcion_programa WHERE id_paciente = '$ret_id_usuario' ORDER BY id DESC) ORDER BY id DESC LIMIT 1"));
$ret_peso_actual = $row_peso_actual[0];

//IMC ACTUAL
$ret_imc_actual = $ret_peso_actual / ($ret_talla * $ret_talla);

//EDAD EN MESES
$fecha_nac = new DateTime(date('Y/m/d', strtotime($ret_fecha_nacimiento)));
$fecha_hoy =  new DateTime(date('Y/m/d', time()));
$edad = date_diff($fecha_hoy, $fecha_nac);
$ret_edad_en_anos = $edad->format('%Y');
$ret_edad_en_meses = $edad->format('%m');
$ret_edad_total_anos = $ret_edad_en_anos + ($ret_edad_en_meses / 12);

//VALIDAD PUNTOS DE CORTE CARTILLA AZUL
$ret_edad_total_anos_primera_cartilla = 59 + (9 / 12);

if($ret_edad_total_anos <= $ret_edad_total_anos_primera_cartilla){

if($ret_imc_actual >= 40){
$diagnostico = 'Obesidad III';
} elseif($ret_imc_actual >= 35){
$diagnostico = 'Obesidad II';
} elseif($ret_imc_actual >= 30){
$diagnostico = 'Obesidad I';
} elseif($ret_imc_actual >= 25){
$diagnostico = 'Sobrepeso';
} elseif($ret_imc_actual >= 18.5){
$diagnostico = 'Normal';
} elseif($ret_imc_actual >= 17){
$diagnostico = 'Delgadez I';
} elseif($ret_imc_actual >= 16){
$diagnostico = 'Delgadez II';
} elseif($ret_imc_actual < 16){
$diagnostico = 'Delgadez III';
}
}

//VALIDAD PUNTOS DE CORTE CARTILLA AMARILLA
elseif($ret_edad_en_anos >= 60){

if($ret_imc_actual >= 32){
$diagnostico = 'Obesidad';
} elseif($ret_imc_actual >= 28 && $ret_imc_actual <= 32){
$diagnostico = 'Sobrepeso';
} elseif($ret_imc_actual >= 23 && $ret_imc_actual <= 28){
$diagnostico = 'Normal';
} elseif($ret_imc_actual >= 21 && $ret_imc_actual <= 23){
$diagnostico = 'Delgadez';
} elseif($ret_imc_actual >= 19 && $ret_imc_actual <= 21){
$diagnostico = 'Delgadez';
} elseif($ret_imc_actual < 9){
$diagnostico = 'Delgadez';
}
} else {
$diagnostico = 'Sin Diagn&oacute;stico';
}

//EDAD
$fecha_nacimiento = new DateTime($ret_fecha_nacimiento);
$hoy = new DateTime();
$edad = $hoy->diff($fecha_nacimiento);
$ret_texto_edad = $edad->y;

//AÑADIR DATOS AL ARRAY
$array_sql_general[$array_i_general] =
array(
$ret_codigo,
$ret_nombres,
$ret_apellidos,
$ret_genero,
$ret_fecha_nacimiento,    
$ret_correo,  
$ret_telefono,
$ret_estado,
$ret_id_tipo_usuario,
$ret_id_usuario,
$ret_id_tipo_documento,
$ret_numero_documento,
$ret_texto_tipo_documento,
$texto_genero,
$css_color,
$texto_estado,
$ret_texto_edad,
$ret_date_added,
$ret_instagram,
$ret_direccion,
$ret_distrito,
$ret_provincia,
$ret_departamento,
$ret_residencia,
$ret_maximo_pacientes,
$ret_peso_meta,
$ret_peso_actual,
$ret_talla,
$ret_imc_actual,
$ret_edad_en_anos,
$ret_edad_en_meses,
$diagnostico
);
}

//DATOS - SUSCRIPCIONES
if($view_controler == 4){
$ret_id_suscripcion = (int)$sql_general_row[0];
$ret_id_programa = (int)$sql_general_row[1];
$ret_id_nutricionista = (int)$sql_general_row[2];
$ret_id_paciente = (int)$sql_general_row[3];
$ret_fecha_inicio = $sql_general_row[4];
$ret_fecha_fin = $sql_general_row[5];
$ret_estado = (int)$sql_general_row[6];
$ret_indicaciones = $sql_general_row[7];

//NOMBRE DEL PROGRAMA
$row_nombre_programa = mysqli_fetch_array(mysqli_query($con, "SELECT nombre FROM programa WHERE id = '$ret_id_programa' LIMIT 1"));
$ret_nombre_programa = $row_nombre_programa[0];

//NOMBRE DEL PACIENTE
$row_nombre_paciente = mysqli_fetch_array(mysqli_query($con, "SELECT CONCAT(nombres, ' ' ,apellidos) FROM usuario WHERE id_tipo_usuario = 2 AND id = '$ret_id_paciente' LIMIT 1"));
$ret_nombre_paciente = $row_nombre_paciente[0];

//ESTADO
if($ret_estado == 1){
$css_color = '#95cf32';
$texto_estado = 'Activo';
} else {
$css_color = '#F26C3C';
$texto_estado = 'Inactivo';
}

//AÑADIR DATOS AL ARRAY
$array_sql_general[$array_i_general] =
array(
$ret_id_suscripcion,
$ret_id_programa,
$ret_id_nutricionista,
$ret_id_paciente,
$ret_fecha_inicio,
$ret_fecha_fin,
$ret_estado,
$ret_indicaciones,
$ret_nombre_paciente,
$ret_nombre_programa,
$css_color,
$texto_estado
);
}

//DATOS - CONTROLES
if($view_controler == 5){
$ret_id_control = (int)$sql_general_row[0];
$ret_codigo_control = $sql_general_row[1];
$ret_id_suscripcion = (int)$sql_general_row[2];
$ret_id_programa = (int)$sql_general_row[3];
$ret_id_nutricionista = (int)$sql_general_row[4];
$ret_id_paciente = (int)$sql_general_row[5];
$ret_fecha = $sql_general_row[6];
$ret_peso = $sql_general_row[7];
$ret_imc = $sql_general_row[8];
$ret_brazo = $sql_general_row[9];
$ret_pecho = $sql_general_row[10];
$ret_cintura = $sql_general_row[11];
$ret_cadera = $sql_general_row[12];
$ret_gluteo = $sql_general_row[13];
$ret_muslo = $sql_general_row[14];
$ret_pantorrilla = $sql_general_row[15];
$ret_diagnostico = $sql_general_row[16];
$ret_suscripcion_fecha_inicio = $sql_general_row[17];
$ret_suscripcion_fecha_fin = $sql_general_row[18];
$ret_suscripcion_estado = $sql_general_row[19];

//NOMBRE DEL PROGRAMA
$row_nombre_programa = mysqli_fetch_array(mysqli_query($con, "SELECT nombre FROM programa WHERE id = '$ret_id_programa' LIMIT 1"));
$ret_nombre_programa = $row_nombre_programa[0];

//NOMBRE DEL PACIENTE
$row_nombre_paciente = mysqli_fetch_array(mysqli_query($con, "SELECT CONCAT(nombres, ' ' ,apellidos) FROM usuario WHERE id_tipo_usuario = 2 AND id = '$ret_id_paciente' LIMIT 1"));
$ret_nombre_paciente = $row_nombre_paciente[0];

//NOMBRE DEL NUTRICIONISTA
$row_nombre_nutricionista = mysqli_fetch_array(mysqli_query($con, "SELECT CONCAT(nombres, ' ' ,apellidos) FROM usuario WHERE id_tipo_usuario = 1 AND id = '$ret_id_nutricionista' LIMIT 1"));
$ret_nombre_nutricionista = $row_nombre_nutricionista[0];

//ESTADO
if($ret_suscripcion_estado == 1){
$css_color = '#95cf32';
$texto_estado = 'Activo';
} else {
$css_color = '#F26C3C';
$texto_estado = 'Inactivo';
}

//AÑADIR DATOS AL ARRAY
$array_sql_general[$array_i_general] =
array(
$ret_id_control,
$ret_codigo_control,
$ret_fecha,
$ret_id_suscripcion,
$ret_id_programa,
$ret_id_nutricionista,
$ret_id_paciente,
$ret_nombre_programa,
$ret_nombre_paciente,
$ret_peso,
$ret_imc,
$ret_brazo,
$ret_pecho,
$ret_cintura,
$ret_cadera,
$ret_gluteo,
$ret_muslo,
$ret_pantorrilla,
$ret_diagnostico,
$ret_suscripcion_fecha_inicio,
$ret_suscripcion_fecha_fin,
$ret_suscripcion_estado,
$css_color,
$texto_estado,
$ret_nombre_nutricionista
);
}

//DATOS - COBROS
if($view_controler == 6){
$ret_id_cobro = (int)$sql_general_row[0];
$ret_id_suscripcion = (int)$sql_general_row[1];
$ret_id_programa = (int)$sql_general_row[2];
$ret_id_nutricionista = (int)$sql_general_row[3];
$ret_id_paciente = (int)$sql_general_row[4];
$ret_fecha_cobro = $sql_general_row[5];
$ret_id_medio_pago = $sql_general_row[6];
$ret_id_cuenta_bancaria = $sql_general_row[7];
$ret_monto = $sql_general_row[8];

//NOMBRE DEL PROGRAMA
$row_nombre_programa = mysqli_fetch_array(mysqli_query($con, "SELECT nombre FROM programa WHERE id = '$ret_id_programa' LIMIT 1"));
$ret_nombre_programa = $row_nombre_programa[0];

//NOMBRE DEL PACIENTE
$row_nombre_paciente = mysqli_fetch_array(mysqli_query($con, "SELECT CONCAT(nombres, ' ' ,apellidos) FROM usuario WHERE id_tipo_usuario = 2 AND id = '$ret_id_paciente' LIMIT 1"));
$ret_nombre_paciente = $row_nombre_paciente[0];

//NOMBRE DEL MEDIO DE PAGO
$row_nombre_medio_pago = mysqli_fetch_array(mysqli_query($con, "SELECT nombre FROM medios_pago WHERE id = '$ret_id_medio_pago' LIMIT 1"));
$ret_nombre_medio_pago = $row_nombre_medio_pago[0];

//NOMBRE DE LA CUENTA BANCARIA
$row_nombre_cuenta_bancaria = mysqli_fetch_array(mysqli_query($con, "SELECT banco FROM cuenta_bancaria WHERE id = '$ret_id_cuenta_bancaria' LIMIT 1"));
$ret_nombre_cuenta_bancaria = $row_nombre_cuenta_bancaria[0];

//AÑADIR DATOS AL ARRAY
$array_sql_general[$array_i_general] =
array(
$ret_id_cobro,
$ret_id_suscripcion,
$ret_id_programa,
$ret_id_nutricionista,
$ret_id_paciente,
$ret_fecha_cobro,
$ret_monto,
$ret_id_medio_pago,
$ret_id_cuenta_bancaria,
$ret_nombre_programa,
$ret_nombre_paciente,
$ret_nombre_medio_pago,
$ret_nombre_cuenta_bancaria
);
}

//DATOS - RECETAS
if($view_controler == 7){
$ret_id_receta = (int)$sql_general_row[0];
$ret_id_suscripcion = (int)$sql_general_row[1];
$ret_id_programa = (int)$sql_general_row[2];
$ret_id_nutricionista = (int)$sql_general_row[3];
$ret_id_paciente = (int)$sql_general_row[4];
$ret_nombre = $sql_general_row[5];
$ret_descripcion = $sql_general_row[6];
$ret_preparacion = (int)$sql_general_row[7];
$ret_foto = $sql_general_row[8];
$ret_id_control = $sql_general_row[9];
$ret_codigo_control = $sql_general_row[10];

//NOMBRE DEL PROGRAMA
$row_nombre_programa = mysqli_fetch_array(mysqli_query($con, "SELECT nombre FROM programa WHERE id = '$ret_id_programa' LIMIT 1"));
$ret_nombre_programa = $row_nombre_programa[0];

//NOMBRE DEL PACIENTE
$row_nombre_paciente = mysqli_fetch_array(mysqli_query($con, "SELECT CONCAT(nombres, ' ' ,apellidos) FROM usuario WHERE id_tipo_usuario = 2 AND id = '$ret_id_paciente' LIMIT 1"));
$ret_nombre_paciente = $row_nombre_paciente[0];

//AÑADIR DATOS AL ARRAY
$array_sql_general[$array_i_general] =
array(
$ret_id_receta,
$ret_nombre,
$ret_descripcion,
$ret_id_nutricionista,
$ret_id_paciente,
$ret_id_control,
$ret_nombre_paciente,
$ret_codigo_control
);
}

//INCREMENTAR ARRAY
$array_i_general++;
}

//RETORNAR CONSULTA GENERAL
return array($consulta_sql_general, $array_sql_general);
}