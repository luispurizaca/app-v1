<?php
session_start();

//1. PACIENTES

//FUNCION CONSULTAS
function consulta($array_filtros){

//DATOS
global $con;
$view_controler = (int)$array_filtros[0];
$activos = (int)$array_filtros[1];
$id_tipo_usuario = (int)$array_filtros[2];
if($view_controler == 10){
$id_tipo_usuario = 1;
}
$offset = $array_filtros[3];
$per_page = $array_filtros[4];
$id_registro = (int)$array_filtros[5];
$fn_id_paciente = (int)$array_filtros[6];
$fn_id_suscripcion = (int)$array_filtros[7];
$ver_pacientes = (int)$array_filtros[10];
$ver_nutricionistas = (int)$array_filtros[11];
$ver_vendedores = (int)$array_filtros[12];
if($ver_pacientes == 1){
$new_tipo_usuario = 2;
}
if($ver_nutricionistas == 1){
$new_tipo_usuario = 1;
}
if($ver_vendedores == 1){
$new_tipo_usuario = 4;
}



//FILTROS MODAL
$n_fecha_desde = $array_filtros[8];
$n_fecha_hasta = $array_filtros[9];
$filtro_socio = $array_filtros[13];
$filtro_correo = $array_filtros[14];
$filtro_cumple_dia = $array_filtros[15];
$filtro_cumple_mes = $array_filtros[16];
$filtro_estado = $array_filtros[17];
$filtro_paquete = $array_filtros[18];
$filtro_plan = $array_filtros[19];
$filtro_id_nutricionista = $array_filtros[20];

$filtro_medio_pago = $array_filtros[21];
$filtro_cuenta_bancaria = $array_filtros[22];
$filtro_numero_operacion = $array_filtros[23];

//CONSULTA PACIENTES, NUTRICIONISTAS Y VENDEDORES
if($view_controler == 2 || $view_controler == 10 || $view_controler == 15){

//CONSULTA PRINCIPAL
$consulta_sql_general = "
SELECT
usuario.codigo AS CODIGO,
usuario.nombres AS NOMBRES,
usuario.apellidos AS APELLIDOS,
usuario.genero AS GENERO,
usuario.fecha_nacimiento AS FECHA_NACIMIENTO,
usuario.correo AS CORREO,
usuario.telefono AS TELEFONO,
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
usuario.maximo_pacientes AS MAXIMO_PACIENTES
FROM usuario
WHERE activo = 1";

//FILTRO ID USUARIO
if(!empty($id_registro)){
$consulta_sql_general .= " AND usuario.id = '$id_registro'";
}

//FILTRO ID TIPO DE USUARIO
$consulta_sql_general .= " AND usuario.id_tipo_usuario = '$new_tipo_usuario'";


//FILTRO POR NUTRICIONISTA
if($_SESSION['ID_TIPO_USUARIO'] == 1){
$consulta_sql_general .= " AND usuario.id IN (SELECT id_paciente FROM nutricionista_paciente WHERE id_nutricionista = '".$_SESSION['ID_USUARIO']."' AND id_paciente IN (SELECT id FROM usuario WHERE activo = 1 AND id_tipo_usuario = 2))";
}

//FILTRO POR VENDEDOR
if($_SESSION['ID_TIPO_USUARIO'] == 4){
$consulta_sql_general .= " AND usuario.id_vendedor = '".$_SESSION['ID_USUARIO']."'";
}

//ORDER BY
$consulta_sql_general .= "
ORDER BY usuario.id DESC
";
}

//CONSULTA SUSCRIPCIONES
if($view_controler == 4){

//CONSULTA LISTA DE SOCIOS
if($ver_pacientes == 1){
$consulta_sql_general = "
SELECT
tb_usuario.id AS SOCIO_ID,
tb_usuario.codigo AS SOCIO_CODIGO,
tb_usuario.correo AS SOCIO_CORREO,
tb_usuario.nombres AS SOCIO_NOMBRES,
tb_usuario.apellidos AS SOCIO_APELLIDOS,
tb_usuario.fecha_nacimiento AS SOCIO_FECHA_NACIMIENTO,
tb_usuario.genero AS SOCIO_GENERO,
tb_usuario.estado AS SOCIO_ESTADO,
tb_usuario.activo AS SOCIO_ACTIVO,
tb_usuario.id_tipo_documento AS SOCIO_ID_TIPO_DOCUMENTO,
tb_usuario.numero_documento AS SOCIO_NUMERO_DOCUMENTO,
tb_usuario.date_added AS SOCIO_DATE_ADDED,
tb_usuario.instagram AS SOCIO_INSTAGRAM,
tb_usuario.direccion AS SOCIO_DIRECCION,
tb_usuario.distrito AS SOCIO_DISTRITO,
tb_usuario.provincia AS SOCIO_PROVINCIA,
tb_usuario.departamento AS SOCIO_DEPARTAMENTO,
tb_usuario.residencia AS SOCIO_RESIDENCIA,
tb_usuario.telefono AS SOCIO_TELEFONO,

(
SELECT suscripcion_programa.id FROM suscripcion_programa WHERE suscripcion_programa.id_paciente = tb_usuario.id ORDER BY DATE_FORMAT(suscripcion_programa.fecha_fin, '%Y-%m-%d') DESC LIMIT 1
) AS SUSCRIPCION_ID,

(
SELECT suscripcion_programa.id_tipo_suscripcion FROM suscripcion_programa WHERE suscripcion_programa.id_paciente = tb_usuario.id ORDER BY DATE_FORMAT(suscripcion_programa.fecha_fin, '%Y-%m-%d') DESC LIMIT 1
) AS SUSCRIPCION_ID_TIPO_SUSCRIPCION,

(
SELECT fecha_pago FROM cobro WHERE id_suscripcion IN
(
SELECT suscripcion_programa.id FROM suscripcion_programa WHERE suscripcion_programa.id_paciente = tb_usuario.id ORDER BY DATE_FORMAT(suscripcion_programa.fecha_fin, '%Y-%m-%d') DESC
)
LIMIT 1
) AS SUSCRIPCION_FECHA_VENTA,

(
SELECT suscripcion_programa.fecha_inicio FROM suscripcion_programa WHERE suscripcion_programa.id_paciente = tb_usuario.id ORDER BY DATE_FORMAT(suscripcion_programa.fecha_fin, '%Y-%m-%d') DESC LIMIT 1
) AS SUSCRIPCION_INICIO,

(
SELECT suscripcion_programa.fecha_fin FROM suscripcion_programa WHERE suscripcion_programa.id_paciente = tb_usuario.id ORDER BY DATE_FORMAT(suscripcion_programa.fecha_fin, '%Y-%m-%d') DESC LIMIT 1
) AS SUSCRIPCION_FIN,

(
SELECT suscripcion_programa.id_programa FROM suscripcion_programa WHERE suscripcion_programa.id_paciente = tb_usuario.id ORDER BY DATE_FORMAT(suscripcion_programa.fecha_fin, '%Y-%m-%d') DESC LIMIT 1
) AS SUSCRIPCION_ID_PROGRAMA,

(
SELECT suscripcion_programa.id_paquete FROM suscripcion_programa WHERE suscripcion_programa.id_paciente = tb_usuario.id ORDER BY DATE_FORMAT(suscripcion_programa.fecha_fin, '%Y-%m-%d') DESC LIMIT 1
) AS SUSCRIPCION_ID_PAQUETE,

(
SELECT suscripcion_programa.id_nutricionista FROM suscripcion_programa WHERE suscripcion_programa.id_paciente = tb_usuario.id ORDER BY DATE_FORMAT(suscripcion_programa.fecha_fin, '%Y-%m-%d') DESC LIMIT 1
) AS SUSCRIPCION_ID_NUTRICIONISTA,

(
SELECT monto FROM cobro WHERE id_suscripcion IN
(
SELECT suscripcion_programa.id FROM suscripcion_programa WHERE suscripcion_programa.id_paciente = tb_usuario.id ORDER BY DATE_FORMAT(suscripcion_programa.fecha_fin, '%Y-%m-%d') DESC
)
LIMIT 1
) AS SUSCRIPCION_MONTO,

(
SELECT id_medio_pago FROM cobro WHERE id_suscripcion IN
(
SELECT suscripcion_programa.id FROM suscripcion_programa WHERE suscripcion_programa.id_paciente = tb_usuario.id ORDER BY DATE_FORMAT(suscripcion_programa.fecha_fin, '%Y-%m-%d') DESC
)
LIMIT 1
) AS SUSCRIPCION_ID_MEDIO_PAGO,

(
SELECT id_cuenta_bancaria FROM cobro WHERE id_suscripcion IN
(
SELECT suscripcion_programa.id FROM suscripcion_programa WHERE suscripcion_programa.id_paciente = tb_usuario.id ORDER BY DATE_FORMAT(suscripcion_programa.fecha_fin, '%Y-%m-%d') DESC
)
LIMIT 1
) AS SUSCRIPCION_ID_CUENTA_BANCARIA,

(
SELECT numero_operacion FROM cobro WHERE id_suscripcion IN
(
SELECT suscripcion_programa.id FROM suscripcion_programa WHERE suscripcion_programa.id_paciente = tb_usuario.id ORDER BY DATE_FORMAT(suscripcion_programa.fecha_fin, '%Y-%m-%d') DESC
)
LIMIT 1
) AS SUSCRIPCION_NUMERO_OPERACION

FROM usuario tb_usuario

WHERE tb_usuario.id_tipo_usuario = 2
";

//SI ES VENDEDOR
if($_SESSION['ID_TIPO_USUARIO'] == 4){
$consulta_sql_general .= " AND (tb_usuario.id_vendedor = '".$_SESSION['ID_USUARIO']."')";
}

//FILTROS
if(!empty($filtro_socio)){
$consulta_sql_general .= " AND (tb_usuario.codigo LIKE '%".$filtro_socio."%' OR tb_usuario.nombres LIKE '%".$filtro_socio."%' OR tb_usuario.apellidos LIKE '%".$filtro_socio."%')";
}
if(!empty($filtro_correo)){
$consulta_sql_general .= " AND (tb_usuario.correo LIKE '%".$filtro_correo."%')";
}
if(!empty($filtro_cumple_dia)){
$consulta_sql_general .= " AND (DATE_FORMAT(tb_usuario.fecha_nacimiento, '%d') = '".$filtro_cumple_dia."')";
}
if(!empty($filtro_cumple_mes)){
$consulta_sql_general .= " AND (DATE_FORMAT(tb_usuario.fecha_nacimiento, '%m') = '".$filtro_cumple_mes."')";
}
if(!empty($filtro_estado)){
$consulta_sql_general .= " AND (tb_usuario.estado = '".$filtro_estado."')";
}

//HAVING
$consulta_sql_general .= " HAVING 1 = 1";

if(!empty($n_fecha_desde) && !empty($n_fecha_hasta)){
$consulta_sql_general .= " AND (DATE_FORMAT(SUSCRIPCION_FIN, '%Y-%m-%d') BETWEEN DATE_FORMAT('$n_fecha_desde', '%Y-%m-%d') AND DATE_FORMAT('$n_fecha_hasta', '%Y-%m-%d'))";
}
if(!empty($filtro_paquete)){
$consulta_sql_general .= " AND (SUSCRIPCION_ID_PAQUETE = '".$filtro_paquete."')";
}
if(!empty($filtro_plan)){
$consulta_sql_general .= " AND (SUSCRIPCION_ID_PROGRAMA = '".$filtro_plan."')";
}
if(!empty($filtro_id_nutricionista)){
$consulta_sql_general .= " AND (SUSCRIPCION_ID_NUTRICIONISTA = '".$filtro_id_nutricionista."')";
}

if(!empty($filtro_medio_pago)){
$consulta_sql_general .= " AND (SUSCRIPCION_ID_MEDIO_PAGO = '".$filtro_medio_pago."')";
}
if(!empty($filtro_cuenta_bancaria)){
$consulta_sql_general .= " AND (SUSCRIPCION_ID_CUENTA_BANCARIA = '".$filtro_cuenta_bancaria."')";
}
if(!empty($filtro_numero_operacion)){
$consulta_sql_general .= " AND (SUSCRIPCION_NUMERO_OPERACION  '".$filtro_numero_operacion."')";
}

//ORDER BY
$consulta_sql_general .= " ORDER BY SUSCRIPCION_FIN ASC";
}

//CONSULTA LISTA DE VENTAS
else {
$consulta_sql_general = "
SELECT
(SELECT usuario.id FROM usuario WHERE usuario.id = tb_suscripcion_programa.id_paciente LIMIT 1) AS SOCIO_ID,
(SELECT usuario.codigo FROM usuario WHERE usuario.id = tb_suscripcion_programa.id_paciente LIMIT 1) AS SOCIO_CODIGO,
(SELECT usuario.correo FROM usuario WHERE usuario.id = tb_suscripcion_programa.id_paciente LIMIT 1) AS SOCIO_CORREO,
(SELECT usuario.nombres FROM usuario WHERE usuario.id = tb_suscripcion_programa.id_paciente LIMIT 1) AS SOCIO_NOMBRES,
(SELECT usuario.apellidos FROM usuario WHERE usuario.id = tb_suscripcion_programa.id_paciente LIMIT 1) AS SOCIO_APELLIDOS,
(SELECT usuario.fecha_nacimiento FROM usuario WHERE usuario.id = tb_suscripcion_programa.id_paciente LIMIT 1) AS SOCIO_FECHA_NACIMIENTO,
(SELECT usuario.genero FROM usuario WHERE usuario.id = tb_suscripcion_programa.id_paciente LIMIT 1) AS SOCIO_GENERO,
tb_suscripcion_programa.estado AS SUSCRIPCION_ESTADO,
(SELECT usuario.activo FROM usuario WHERE usuario.id = tb_suscripcion_programa.id_paciente LIMIT 1) AS SOCIO_ACTIVO,
(SELECT usuario.id_tipo_documento FROM usuario WHERE usuario.id = tb_suscripcion_programa.id_paciente LIMIT 1) AS SOCIO_ID_TIPO_DOCUMENTO,
(SELECT usuario.numero_documento FROM usuario WHERE usuario.id = tb_suscripcion_programa.id_paciente LIMIT 1) AS SOCIO_NUMERO_DOCUMENTO,
(SELECT usuario.date_added FROM usuario WHERE usuario.id = tb_suscripcion_programa.id_paciente LIMIT 1) AS SOCIO_DATE_ADDED,
(SELECT usuario.instagram FROM usuario WHERE usuario.id = tb_suscripcion_programa.id_paciente LIMIT 1) AS SOCIO_INSTAGRAM,
(SELECT usuario.direccion FROM usuario WHERE usuario.id = tb_suscripcion_programa.id_paciente LIMIT 1)AS SOCIO_DIRECCION,
(SELECT usuario.distrito FROM usuario WHERE usuario.id = tb_suscripcion_programa.id_paciente LIMIT 1) AS SOCIO_DISTRITO,
(SELECT usuario.provincia FROM usuario WHERE usuario.id = tb_suscripcion_programa.id_paciente LIMIT 1) AS SOCIO_PROVINCIA,
(SELECT usuario.departamento FROM usuario WHERE usuario.id = tb_suscripcion_programa.id_paciente LIMIT 1) AS SOCIO_DEPARTAMENTO,
(SELECT usuario.residencia FROM usuario WHERE usuario.id = tb_suscripcion_programa.id_paciente LIMIT 1) AS SOCIO_RESIDENCIA,
(SELECT usuario.telefono FROM usuario WHERE usuario.id = tb_suscripcion_programa.id_paciente LIMIT 1) AS SOCIO_TELEFONO,

tb_suscripcion_programa.id AS SUSCRIPCION_ID,

tb_suscripcion_programa.id_tipo_suscripcion AS SUSCRIPCION_ID_TIPO_SUSCRIPCION,

(
SELECT cobro.fecha_pago FROM cobro WHERE cobro.id_suscripcion = tb_suscripcion_programa.id LIMIT 1
) AS SUSCRIPCION_FECHA_VENTA,

tb_suscripcion_programa.fecha_inicio AS SUSCRIPCION_INICIO,

tb_suscripcion_programa.fecha_fin AS SUSCRIPCION_FIN,

tb_suscripcion_programa.id_programa AS SUSCRIPCION_ID_PROGRAMA,

tb_suscripcion_programa.id_paquete AS SUSCRIPCION_ID_PAQUETE,

tb_suscripcion_programa.id_nutricionista AS SUSCRIPCION_ID_NUTRICIONISTA,

(
SELECT cobro.monto FROM cobro WHERE cobro.id_suscripcion = tb_suscripcion_programa.id LIMIT 1
) AS SUSCRIPCION_MONTO,

(
SELECT cobro.id_medio_pago FROM cobro WHERE cobro.id_suscripcion = tb_suscripcion_programa.id LIMIT 1
) AS SUSCRIPCION_ID_MEDIO_PAGO,

(
SELECT cobro.id_cuenta_bancaria FROM cobro WHERE cobro.id_suscripcion = tb_suscripcion_programa.id LIMIT 1
) AS SUSCRIPCION_ID_CUENTA_BANCARIA,

(
SELECT cobro.numero_operacion FROM cobro WHERE cobro.id_suscripcion = tb_suscripcion_programa.id LIMIT 1
) AS SUSCRIPCION_NUMERO_OPERACION

FROM suscripcion_programa tb_suscripcion_programa

WHERE 1 = 1
";

//SI ES VENDEDOR
if($_SESSION['ID_TIPO_USUARIO'] == 4){
$consulta_sql_general .= " AND (tb_suscripcion_programa.id_vendedor = '".$_SESSION['ID_USUARIO']."')";
}

//FILTROS
if(!empty($filtro_paquete)){
$consulta_sql_general .= " AND (tb_suscripcion_programa.id_paquete = '".$filtro_paquete."')";
}
if(!empty($filtro_plan)){
$consulta_sql_general .= " AND (tb_suscripcion_programa.id_programa = '".$filtro_plan."')";
}
if(!empty($filtro_id_nutricionista)){
$consulta_sql_general .= " AND (tb_suscripcion_programa.id_nutricionista = '".$filtro_id_nutricionista."')";
}

//HAVING
$consulta_sql_general .= " HAVING 1 = 1";

if(!empty($n_fecha_desde) && !empty($n_fecha_hasta)){
$consulta_sql_general .= " AND (DATE_FORMAT(SUSCRIPCION_FECHA_VENTA, '%Y-%m-%d') BETWEEN DATE_FORMAT('$n_fecha_desde', '%Y-%m-%d') AND DATE_FORMAT('$n_fecha_hasta', '%Y-%m-%d'))";
}
if(!empty($filtro_socio)){
$consulta_sql_general .= " AND (SOCIO_CODIGO LIKE '%".$filtro_socio."%' OR SOCIO_NOMBRES LIKE '%".$filtro_socio."%' OR SOCIO_APELLIDOS LIKE '%".$filtro_socio."%')";
}
if(!empty($filtro_correo)){
$consulta_sql_general .= " AND (SOCIO_CORREO LIKE '%".$filtro_correo."%')";
}
if(!empty($filtro_cumple_dia)){
$consulta_sql_general .= " AND (DATE_FORMAT(SOCIO_FECHA_NACIMIENTO, '%d') = '".$filtro_cumple_dia."')";
}
if(!empty($filtro_cumple_mes)){
$consulta_sql_general .= " AND (DATE_FORMAT(SOCIO_FECHA_NACIMIENTO, '%m') = '".$filtro_cumple_mes."')";
}
if(!empty($filtro_estado)){
$consulta_sql_general .= " AND (SOCIO_ESTADO = '".$filtro_estado."')";
}

if(!empty($filtro_medio_pago)){
$consulta_sql_general .= " AND (SUSCRIPCION_ID_MEDIO_PAGO = '".$filtro_medio_pago."')";
}
if(!empty($filtro_cuenta_bancaria)){
$consulta_sql_general .= " AND (SUSCRIPCION_ID_CUENTA_BANCARIA = '".$filtro_cuenta_bancaria."')";
}
if(!empty($filtro_numero_operacion)){
$consulta_sql_general .= " AND (SUSCRIPCION_NUMERO_OPERACION  '".$filtro_numero_operacion."')";
}

//ORDER BY
$consulta_sql_general .= " ORDER BY SUSCRIPCION_FECHA_VENTA DESC";
}
}

//CONSULTA CONTROLES
if($view_controler == 5){

//CONSULTA PRINCIPAL
$consulta_sql_general = "
SELECT
control.id AS ID_CONTROL,
control.codigo AS CODIGO,
control.id_suscripcion AS ID_SUSCRIPCION,
suscripcion_programa.id_programa AS ID_PROGRAMA,
control.id_nutricionista AS ID_NUTRICIONISTA,
control.id_paciente AS ID_PACIENTE,
control.fecha AS FECHA,
control.peso AS PESO,
control.brazo AS BRAZO,
control.pecho AS PECHO,
control.cintura AS CINTURA,
control.gluteo AS GLUTEO,
control.muslo AS MUSLO,
control.pantorrilla AS PANTORRILLA,
suscripcion_programa.fecha_inicio AS SUSCRIPCION_FECHA_INICIO,
suscripcion_programa.fecha_fin AS SUSCRIPCION_FECHA_FIN,
suscripcion_programa.estado AS SUSCRIPCION_ESTADO
FROM control, suscripcion_programa
WHERE suscripcion_programa.id = control.id_suscripcion";

//FILTRO NUTRICIONISTA
if($_SESSION['ID_TIPO_USUARIO'] == 1){
$consulta_sql_general .= " AND suscripcion_programa.id_nutricionista = '".$_SESSION['ID_USUARIO']."'";
}

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
if($view_controler == 2 || $view_controler == 10 || $view_controler == 15){
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

if($view_controler == 2){
//DATOS ANTROPOMETRICOS ACTUALES DEL PACIENTE
$row_peso_actual = mysqli_fetch_array(mysqli_query($con, "SELECT peso, talla FROM control WHERE id_suscripcion IN (SELECT id FROM suscripcion_programa WHERE id_paciente = '$ret_id_usuario' ORDER BY id DESC) ORDER BY id DESC LIMIT 1"));
$ret_peso_actual = (float)$row_peso_actual[0];
$ret_talla = (float)$row_peso_actual[1];

//PESO META
$row_peso_meta = mysqli_fetch_array(mysqli_query($con, "SELECT peso_meta FROM historia WHERE id_paciente = '$ret_id_usuario' ORDER BY id DESC LIMIT 1"));
$ret_peso_meta = $row_peso_meta[0];

//IMC ACTUAL
if(empty($ret_talla)){
$ret_imc_actual = 0;
} else {
$ret_imc_actual = $ret_peso_actual / ($ret_talla * $ret_talla);
}
} else {
$ret_talla = 0;
$ret_peso_meta = 0;
$ret_imc_actual = 0;
}


//EDAD EN MESES
$fecha_nac = new DateTime(date('Y/m/d', strtotime($ret_fecha_nacimiento)));
$fecha_hoy =  new DateTime(date('Y/m/d', time()));
$edad = date_diff($fecha_hoy, $fecha_nac);
$ret_edad_en_anos = $edad->format('%Y');
$ret_edad_en_meses = $edad->format('%m');
$ret_edad_total_anos = $ret_edad_en_anos + ($ret_edad_en_meses / 12);

if($view_controler == 2){
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
} else {
$ret_edad_total_anos_primera_cartilla = 0;
$diagnostico = '';
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

//LISTA DE SOCIOS - LISTA DE VENTAS
$ret_id_paciente = $sql_general_row[0];
$SOCIO_CODIGO = $sql_general_row[1];
$SOCIO_CORREO = $sql_general_row[2];
$SOCIO_NOMBRES = $sql_general_row[3];
$SOCIO_APELLIDOS = $sql_general_row[4];
$SOCIO_FECHA_NACIMIENTO = $sql_general_row[5];
$SOCIO_GENERO = $sql_general_row[6];
$ret_estado = $sql_general_row[7];
$SOCIO_ACTIVO = $sql_general_row[8];
$SOCIO_ID_TIPO_DOCUMENTO = $sql_general_row[9];
$SOCIO_NUMERO_DOCUMENTO = $sql_general_row[10];
$SOCIO_DATE_ADDED = $sql_general_row[11];
$SOCIO_INSTAGRAM = $sql_general_row[12];
$SOCIO_DIRECCION = $sql_general_row[13];
$SOCIO_DISTRITO = $sql_general_row[14];
$SOCIO_PROVINCIA = $sql_general_row[15];
$SOCIO_DEPARTAMENTO = $sql_general_row[16];
$SOCIO_RESIDENCIA = $sql_general_row[17];
$SOCIO_TELEFONO = $sql_general_row[18];
$ret_id_suscripcion = $sql_general_row[19];
$ret_id_tipo_suscripcion = $sql_general_row[20];
$ret_fecha_venta = $sql_general_row[21];
$ret_fecha_inicio = $sql_general_row[22];
$ret_fecha_fin = $sql_general_row[23];
$ret_id_programa = $sql_general_row[24];
$ret_id_paquete = $sql_general_row[25];
$ret_id_nutricionista = $sql_general_row[26];
$ret_monto_venta = $sql_general_row[27];
$ret_id_medio_pago = $sql_general_row[28];
$ret_id_cuenta_bancaria = $sql_general_row[29];
$ret_numero_operacion = $sql_general_row[30];

//TIPO DE SUSCRIPCION
if($ret_id_tipo_suscripcion == 1){
$text_tipo_suscripcion = '<span style="color: green;">Nueva</span>';
} else {
$text_tipo_suscripcion = '<span style="color: darkblue;">Renovaci&oacute;n</span>';
}

//NOMBRE DEL PROGRAMA
$row_nombre_programa = mysqli_fetch_array(mysqli_query($con, "SELECT nombre FROM programa WHERE id = '$ret_id_programa' LIMIT 1"));
$ret_nombre_programa = $row_nombre_programa[0];

//NOMBRE DEL PACIENTE
$row_nombre_paciente = mysqli_fetch_array(mysqli_query($con, "SELECT codigo, nombres, apellidos, genero, fecha_nacimiento, correo, telefono, estado FROM usuario WHERE id_tipo_usuario = 2 AND id = '$ret_id_paciente' LIMIT 1"));
$ret_codigo = $row_nombre_paciente[0];
$ret_nombres = $row_nombre_paciente[1];
$ret_apellidos = $row_nombre_paciente[2];
$ret_id_genero = $row_nombre_paciente[3];
if($ret_id_genero == 1){
$ret_genero = 'Masculino';
} else {
$ret_genero = 'Femenino';
}
$ret_fecha_nacimiento = $row_nombre_paciente[4];
$fecha_nacimiento = new DateTime($ret_fecha_nacimiento);
$hoy = new DateTime();
$edad = $hoy->diff($fecha_nacimiento);
$ret_texto_edad = $edad->y;

$ret_correo = $row_nombre_paciente[5];
$ret_telefono = $row_nombre_paciente[6];
$ret_id_estado = $row_nombre_paciente[7];
if($ret_id_estado == 1){
$css_paciente_color = '#95cf32';
$ret_texto_estado = 'Activo';
} else {
$css_paciente_color = '#F26C3C';
$ret_texto_estado = 'Inactivo';
}

//DIA DE NACIMIENTO
$array_meses = array('', 'Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre');
$ret_dia_cumpleanos = date('d', strtotime($ret_fecha_nacimiento)).' de '.$array_meses[(int)date('m', strtotime($ret_fecha_nacimiento))];

$ret_nombre_paciente = $ret_nombres.' '.$ret_apellidos;


//NOMBRE DEL NUTRICIONISTA
$row_nombre_nutricionista = mysqli_fetch_array(mysqli_query($con, "SELECT CONCAT(nombres, ' ' ,apellidos) FROM usuario WHERE id_tipo_usuario = 1 AND id = '$ret_id_nutricionista' LIMIT 1"));
$ret_nombre_nutricionista = $row_nombre_nutricionista[0];

//NOMBRE DEL MEDIO DE PAGO
$row_nombre_medio_pago = mysqli_fetch_array(mysqli_query($con, "SELECT nombre FROM medios_pago WHERE id = '$ret_id_medio_pago' LIMIT 1"));
$ret_nombre_medio_pago = $row_nombre_medio_pago[0];

//NOMBRE DE LA CUENTA BANCARIA
$row_nombre_cuenta_bancaria = mysqli_fetch_array(mysqli_query($con, "SELECT banco FROM cuenta_bancaria WHERE id = '$ret_id_cuenta_bancaria' LIMIT 1"));
$ret_nombre_cuenta_bancaria = $row_nombre_cuenta_bancaria[0];

//NOMBRE DEL PAQUETE
if($ret_id_paquete == 1){
$ret_nombre_paquete = 'SOCIO';
}
if($ret_id_paquete == 2){
$ret_nombre_paquete = 'SOCIO VIP';
}

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
$ret_nombre_paciente,
$ret_nombre_nutricionista,
$ret_nombre_programa,
$css_color,
$texto_estado,
$ret_fecha_venta,
$ret_monto_venta,
$ret_id_medio_pago,
$ret_id_cuenta_bancaria,
$ret_nombre_medio_pago,
$ret_nombre_cuenta_bancaria,
$ret_id_paquete,
$ret_nombre_paquete,
$ret_codigo,
$ret_nombres,
$ret_apellidos,
$ret_genero,
$ret_texto_edad,
$ret_correo,
$ret_telefono,
$ret_texto_estado,
$css_paciente_color,
$ret_id_tipo_suscripcion,
$text_tipo_suscripcion,
$ret_numero_operacion,
$ret_dia_cumpleanos
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