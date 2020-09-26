<?php
session_start();
$negocia_operacion = (int)$_GET['negocia_operacion'];
if($negocia_operacion >= 1 && $negocia_operacion <= 5){

//CONEXION
require_once (__DIR__.'/conexion_bd.php');
}

//FORMULARIO NUEVO REGISTRO
if($negocia_operacion == 1){

//TIPO DE USUARIO
$id_paciente = (int)$_GET['negocia_tipo'];

//DATOS DEL PACIENTE
$title = 'Paciente';
$letra_add = 'P-';
$registro_nombres = '';
$registro_apellidos = '';
$registro_tipo_documento = '';
$registro_numero_documento = '';

if(empty($id_paciente)){

//ULTIMO CODIGO REGISTRADO
$row_codigo_registro = mysqli_fetch_array(mysqli_query($con, "SELECT MAX(codigo) FROM usuario WHERE id_tipo_usuario = '2' ORDER BY MAX(codigo) DESC LIMIT 1"));
$codigo_registro = $letra_add.(((int)substr($row_codigo_registro[0], 2, 100)) + 1);
} else {

//CODIGO DEL PACIENTE
$row_codigo_registro = mysqli_fetch_array(mysqli_query($con, "SELECT codigo, nombres, apellidos, id_tipo_documento, numero_documento FROM usuario WHERE id = '$id_paciente' ORDER BY id DESC LIMIT 1"));
$codigo_registro = $letra_add.(((int)substr($row_codigo_registro[0], 2, 100)) + 1);
$registro_nombres = $row_codigo_registro[1];
$registro_apellidos = $row_codigo_registro[2];
$registro_tipo_documento = $row_codigo_registro[3];
$registro_numero_documento = $row_codigo_registro[4];
}
?>
<div id="div_guardar_paciente"></div>
<div class="pd-20 card-box mb-30">
<div class="clearfix">
<div class="pull-left">
<h4 class="weight-500 text-capitalize" style="font-size: 17px;">
Nuevo <div style="color: #95cf32; font-weight: bold; font-size: 22px;"><?php echo $title; ?></div>
</h4><hr>
</div>
</div>
<div class="row">
<div class="col-md-3 col-sm-6">
<div class="form-group">
<label class="n-label">N&#176; Socio</label>
<input id="form_codigo" name="form_codigo" class="form-control n-form-control" type="text" placeholder="C&oacute;digo" value="<?php echo $codigo_registro; ?>" readonly="readonly" style="cursor: no-drop;">
</div>
</div>
<div class="col-md-3 col-sm-6">
<div class="form-group">
<label class="n-label">Tipo Doc.</label>
<select id="form_tipo_documento" name="form_tipo_documento" class="form-control n-form-control">
<?php
$query_tipo_documento = mysqli_query($con, "SELECT id, nombre FROM tipo_documento ORDER BY id ASC");
while($row_tipo_documento = mysqli_fetch_array($query_tipo_documento)){
$id_tipo_documento = $row_tipo_documento[0];
$nombre_documento = $row_tipo_documento[1];
?>
<option value="<?php echo $id_tipo_documento; ?>"><?php echo $nombre_documento; ?></option>
<?php
}
?>
</select>
</div>
</div>
<div class="col-md-3 col-sm-6">
<div class="form-group">
<label class="n-label">N&uacute;mero Doc.</label>
<input id="form_numero_documento" name="form_numero_documento" class="form-control n-form-control" type="text" placeholder="N&uacute;mero" onkeyup="consultar_doc()" value="<?php echo $registro_numero_documento; ?>">
</div>
</div>
<div class="col-md-3 col-sm-6">
<div class="form-group">
<label class="n-label">Fecha Nac.</label>
<input id="form_fecha_nacimiento" name="form_fecha_nacimiento" class="form-control n-form-control" type="date" placeholder="Fecha de Nacimiento">
</div>
</div>
<script>
function consultar_doc(){
var form_tipo_documento = $('#form_tipo_documento').val();
var form_numero_documento = $('#form_numero_documento').val();
var doc;

//FUNCIONA SOLO SI
if((form_tipo_documento == 1 && form_numero_documento.length == 8) || (form_tipo_documento == 2 && form_numero_documento.length == 11)){

//DNI
if(form_tipo_documento == 1 && form_numero_documento.length == 8){
doc = 'DNI';
}

//RUC
if(form_tipo_documento == 2 && form_numero_documento.length == 11){
doc = 'RUC';
}

//ALERT
swal({
title: 'Extraer datos del '+doc+'?',
type: 'info',
showCancelButton: true,
confirmButtonClass: "btn btn-success",
confirmButtonText: "OK",
cancelButtonText: "NO",
confirmButtonColor: '#95cf32'
});
}
}
</script>
<div class="col-md-3 col-sm-6">
<div class="form-group">
<label class="n-label">Nombres</label>
<input id="form_nombres" name="form_nombres" class="form-control n-form-control" type="text" placeholder="Nombres" value="<?php echo $registro_nombres; ?>">
</div>
</div>
<div class="col-md-3 col-sm-6">
<div class="form-group">
<label class="n-label">Apellidos</label>
<input id="form_apellidos" name="form_apellidos" class="form-control n-form-control" type="text" placeholder="Apellidos" value="<?php echo $registro_apellidos; ?>">
</div>
</div>
<div class="col-md-3 col-sm-6">
<div class="form-group">
<label class="n-label">G&eacute;nero</label>
<select id="form_genero" name="form_genero" class="form-control n-form-control">
<option value="0" hidden="hidden">Seleccione</option>
<option value="1">Masculino</option>
<option value="2">Femenino</option>
</select>
</div>
</div>
<div class="col-md-3 col-sm-6">
<div class="form-group">
<label class="n-label">Instagram</label>
<input id="form_instagram" name="form_instagram" class="form-control n-form-control" type="text" placeholder="Instagram">
</div>
</div>
<div class="col-md-3 col-sm-6">
<div class="form-group">
<label class="n-label">Direcci&oacute;n</label>
<input id="form_direccion" name="form_direccion" class="form-control n-form-control" type="text" placeholder="Direcci&oacute;n">
</div>
</div>
<div class="col-md-3 col-sm-6">
<div class="form-group">
<label class="n-label">Departamento</label>
<input id="form_departamento" name="form_departamento" class="form-control n-form-control" type="text" placeholder="Departamento">
</div>
</div>
<div class="col-md-3 col-sm-6">
<div class="form-group">
<label class="n-label">Provincia</label>
<input id="form_provincia" name="form_provincia" class="form-control n-form-control" type="text" placeholder="Provincia">
</div>
</div>
<div class="col-md-3 col-sm-6">
<div class="form-group">
<label class="n-label">Distrito</label>
<input id="form_distrito" name="form_distrito" class="form-control n-form-control" type="text" placeholder="Distrito">
</div>
</div>
<div class="col-md-3 col-sm-6">
<div class="form-group">
<label class="n-label">Residencia</label>
<input id="form_residencia" name="form_residencia" class="form-control n-form-control" type="text" placeholder="ejm: PE">
</div>
</div>
<div class="col-md-3 col-sm-6">
<div class="form-group">
<label class="n-label">Tel&eacute;fono</label>
<input id="form_telefono" name="form_telefono" class="form-control n-form-control" type="text" placeholder="ejm: 999999999">
</div>
</div>
<div class="col-md-3 col-sm-6" style="display: none;">
<div class="form-group">
<label class="n-label">Talla</label>
<input id="form_talla" name="form_talla" class="form-control n-form-control" type="text" placeholder="Talla">
</div>
</div>
<div class="col-md-3 col-sm-6" style="display: none;">
<div class="form-group">
<label class="n-label">Peso Meta</label>
<input id="form_peso_meta" name="form_peso_meta" class="form-control n-form-control" type="text" placeholder="Peso Meta">
</div>
</div>
<div class="col-md-3 col-sm-6" style="display: none;">
<div class="form-group">
<label class="n-label">N&#176; M&aacute;x. Pac.</label>
<input id="form_maximo_pacientes" name="form_maximo_pacientes" class="form-control n-form-control" type="text" placeholder="N&#176; M&aacute;x. Pac.">
</div>
</div>
</div>
<div class="row" style="padding-top: 15px;">
<div class="col-md-12 col-sm-12">
<div class="form-group">
<div class="pull-left">
<h4 class="weight-500">
<div style="color: #95cf32; font-weight: bold; font-size: 18px;">Datos de la suscripci&oacute;n</div>
</h4><hr>
</div>
</div>
</div>
<div class="col-md-3 col-sm-6">
<div class="form-group">
<label class="n-label">Plan Rekupera</label>
<select id="form_id_programa" name="form_id_programa" class="form-control n-form-control">
<?php
$query_plan = mysqli_query($con, "SELECT id, nombre, nombre_completo FROM programa ORDER BY id ASC");
while($row_plan = mysqli_fetch_array($query_plan)){
$id_plan = $row_plan[0];
$nombre_plan = $row_plan[2].' ('.$row_plan[1].')';
?>
<option value="<?php echo $id_plan; ?>"><?php echo $nombre_plan; ?></option>
<?php
}
?>
</select>
</div>
</div>
<div class="col-md-3 col-sm-6">
<div class="form-group">
<label class="n-label">Paquete</label>
<select id="form_id_paquete" name="form_id_paquete" class="form-control n-form-control">
<option value="1">Paquete Socio</option>
<option value="2">Paquete Socio VIP</option>
</select>
</div>
</div>
<div class="col-md-3 col-sm-6">
<div class="form-group">
<label class="n-label">Fecha de Inicio</label>
<input id="form_fecha_suscripcion" name="form_fecha_suscripcion" class="form-control n-form-control" type="date" placeholder="Fecha de Inicio" value="<?php echo date('Y-m-d'); ?>">
</div>
</div>
<div class="col-md-3 col-sm-6">
<div class="form-group">
<label class="n-label">Nutricionista</label>
<select id="form_id_nutricionista" name="form_id_nutricionista" class="form-control n-form-control">
<?php
$query_id_n = mysqli_query($con, "SELECT id, CONCAT(apellidos, ' ', nombres) FROM usuario WHERE activo = 1 AND id_tipo_usuario = 1 ORDER BY id ASC");
while($row_id_n = mysqli_fetch_array($query_id_n)){
$id_cb = $row_id_n[0];
$nombre_cb = $row_id_n[1];
?>
<option value="<?php echo $id_cb; ?>"><?php echo $nombre_cb; ?></option>
<?php
}
?>
</select>
</div>
</div>
</div>
<div class="row" style="padding-top: 15px;">
<div class="col-md-12 col-sm-12">
<div class="form-group">
<div class="pull-left">
<h4 class="weight-500">
<div style="color: #95cf32; font-weight: bold; font-size: 18px;">Datos de la venta</div>
</h4><hr>
</div>
</div>
</div>
<div class="col-md-3 col-sm-6">
<div class="form-group">
<label class="n-label">Fecha de Pago</label>
<input id="form_fecha_pago" name="form_fecha_pago" class="form-control n-form-control" type="date" placeholder="Fecha de Pago" value="<?php echo date('Y-m-d'); ?>">
</div>
</div>
<div class="col-md-3 col-sm-6">
<div class="form-group">
<label class="n-label">Monto</label>
<input id="form_monto" name="form_monto" class="form-control n-form-control" type="number" step="any" placeholder="ejm: 350.00">
</div>
</div>
<div class="col-md-3 col-sm-6">
<div class="form-group">
<label class="n-label">Medio de Pago</label>
<select id="form_id_medio_pago" name="form_id_medio_pago" class="form-control n-form-control">
<?php
$query_mp = mysqli_query($con, "SELECT id, nombre FROM medios_pago ORDER BY id ASC");
while($row_mp = mysqli_fetch_array($query_mp)){
$id_mp = $row_mp[0];
$nombre_mp = $row_mp[1];
?>
<option value="<?php echo $id_mp; ?>"><?php echo $nombre_mp; ?></option>
<?php
}
?>
</select>
</div>
</div>
<div class="col-md-3 col-sm-6">
<div class="form-group">
<label class="n-label">Banco</label>
<select id="form_id_banco" name="form_id_banco" class="form-control n-form-control">
<?php
$query_cb = mysqli_query($con, "SELECT id, banco FROM cuenta_bancaria ORDER BY id ASC");
while($row_cb = mysqli_fetch_array($query_cb)){
$id_cb = $row_cb[0];
$nombre_cb = $row_cb[1];
?>
<option value="<?php echo $id_cb; ?>"><?php echo $nombre_cb; ?></option>
<?php
}
?>
</select>
</div>
</div>
</div>
<div class="row" style="padding-top: 15px;">
<div class="col-md-12 col-sm-12">
<div class="form-group">
<div class="pull-left">
<h4 class="weight-500">
<div style="color: #95cf32; font-weight: bold; font-size: 18px;">Crear Cuenta</div>
</h4><hr>
</div>
</div>
</div>
<div class="col-md-3 col-sm-6">
<div class="form-group">
<label class="n-label">Correo Electr&oacute;nico</label>
<input id="form_correo" name="form_correo" class="form-control n-form-control" type="text" placeholder="Correo electr&oacute;nico">
</div>
</div>
<div class="col-md-3 col-sm-6">
<div class="form-group">
<label class="n-label">Contrase&ntilde;a</label>
<input id="form_clave" name="form_clave" class="form-control n-form-control" type="text" placeholder="Contrase&ntilde;a" value="<?php echo $codigo_registro; ?>12345">
</div>
</div>
</div>
<div class="row">
<div class="col-md-12 col-sm-12 text-center" style="padding-top: 20px;">
<div class="form-group">
<button id="btn_guardar_datos" type="button" class="btn" style="background: #95cf32; color: white; padding: 4px; font-size: 13px;">Grabar Datos</button>
<button id="btn_enviar_datos" type="button" class="btn" style="background: #95cf32; color: white; padding: 4px; font-size: 13px;">Enviar</button>
<button onclick="window.location='index.php'" type="button" class="btn" style="background: #F26C3C; color: white; padding: 4px; font-size: 13px;">Cancelar</button>
</div>
</div>
</div>
</div>
<script>
$('#btn_guardar_datos').on('click', function(){
var form_codigo = $('#form_codigo').val();
var form_nombres = $('#form_nombres').val();
var form_apellidos = $('#form_apellidos').val();
var form_tipo_documento = $('#form_tipo_documento').val();
var form_numero_documento = $('#form_numero_documento').val();
var form_fecha_nacimiento = $('#form_fecha_nacimiento').val();
var form_genero = $('#form_genero').val();
var form_instagram = $('#form_instagram').val();
var form_direccion = $('#form_direccion').val();
var form_departamento = $('#form_departamento').val();
var form_provincia = $('#form_provincia').val();
var form_distrito = $('#form_distrito').val();
var form_talla = $('#form_talla').val();
var form_peso_meta = $('#form_peso_meta').val();
var form_maximo_pacientes = $('#form_maximo_pacientes').val();
var form_correo = $('#form_correo').val();
var form_clave = $('#form_clave').val();
var form_residencia = $('#form_residencia').val();
var form_id_programa = $('#form_id_programa').val();
var form_id_paquete = $('#form_id_paquete').val();
var form_fecha_suscripcion = $('#form_fecha_suscripcion').val();
var form_id_nutricionista = $('#form_id_nutricionista').val();
var form_fecha_pago = $('#form_fecha_pago').val();
var form_monto = $('#form_monto').val();
var form_id_medio_pago = $('#form_id_medio_pago').val();
var form_id_banco = $('#form_id_banco').val();

$.ajax({
type: 'POST',
url: 'config/content.php?negocia_operacion=2',
data: {
form_codigo: form_codigo,
form_nombres: form_nombres,
form_apellidos : form_apellidos,
form_tipo_documento : form_tipo_documento,
form_numero_documento : form_numero_documento,
form_fecha_nacimiento : form_fecha_nacimiento,
form_genero : form_genero,
form_instagram : form_instagram,
form_direccion : form_direccion,
form_departamento : form_departamento,
form_provincia : form_provincia,
form_distrito : form_distrito,
form_talla : form_talla,
form_peso_meta : form_peso_meta,
form_maximo_pacientes : form_maximo_pacientes,
form_correo : form_correo,
form_clave : form_clave,
form_residencia : form_residencia,
form_tipo_usuario : 2,
form_id_programa : form_id_programa,
form_id_paquete : form_id_paquete,
form_fecha_suscripcion : form_fecha_suscripcion,
form_id_nutricionista : form_id_nutricionista,
form_fecha_pago : form_fecha_pago,
form_monto : form_monto,
form_id_medio_pago : form_id_medio_pago,
form_id_banco : form_id_banco
},
success: function(datos){
$('#div_guardar_paciente').html(datos).fadeIn('slow');
}
});
});
</script>
<?php
exit();
exit();
}

//GUARDAR NUEVO REGISTRO
if($negocia_operacion == 2){
$form_codigo = $_POST['form_codigo'];
$form_nombres = $_POST['form_nombres'];
if(empty($form_nombres)){
?>
<script>
alert('Ingrese: Nombres');
$('#form_nombres').focus();
</script>
<?php
exit();
exit();
}
$form_apellidos  = $_POST['form_apellidos'];
if(empty($form_apellidos)){
?>
<script>
alert('Ingrese: Apellidos');
$('#form_apellidos').focus();
</script>
<?php
exit();
exit();
}
$form_tipo_documento  = (int)$_POST['form_tipo_documento'];
$form_numero_documento  = $_POST['form_numero_documento'];
if(empty($form_numero_documento)){
?>
<script>
alert('Ingrese: Numero de documento');
$('#form_numero_documento').focus();
</script>
<?php
exit();
exit();
}
$form_fecha_nacimiento  = $_POST['form_fecha_nacimiento'];
if(empty($form_fecha_nacimiento)){
?>
<script>
alert('Ingrese: Fecha de Nacimiento');
$('#form_fecha_nacimiento').focus();
</script>
<?php
exit();
exit();
}
if(empty($_POST['form_fecha_nacimiento'])){
$form_fecha_nacimiento  = date('Y-m-d', strtotime($_POST['form_fecha_nacimiento']));
}
$form_genero  = (int)$_POST['form_genero'];
if(empty($form_genero)){
?>
<script>
alert('Seleccione: G\u00E9nero');
$('#form_genero').focus();
</script>
<?php
exit();
exit();
}
$form_instagram  = $_POST['form_instagram'];
$form_direccion  = $_POST['form_direccion'];
$form_departamento  = $_POST['form_departamento'];
$form_provincia  = $_POST['form_provincia'];
$form_distrito  = $_POST['form_distrito'];
$form_talla  = (float)str_replace(' ', '', str_replace(',', '.', $_POST['form_talla']));
$form_peso_meta  = (float)str_replace(' ', '', str_replace(',', '.', $_POST['form_peso_meta']));
$form_maximo_pacientes  = (int)$_POST['form_maximo_pacientes'];
$form_correo  = $_POST['form_correo'];
if(empty($form_correo)){
?>
<script>
alert('Ingrese: Correo');
$('#form_correo').focus();
</script>
<?php
exit();
exit();
}
$form_clave  = $_POST['form_clave'];
if(empty($form_clave)){
?>
<script>
alert('Ingrese: Clave');
$('#form_clave').focus();
</script>
<?php
exit();
exit();
}
$form_residencia  = $_POST['form_residencia'];
$form_tipo_usuario  = (int)$_POST['form_tipo_usuario'];

$form_id_programa = $_POST['form_id_programa'];
$form_id_paquete = $_POST['form_id_paquete'];
$form_fecha_suscripcion = date('Y-m-d', strtotime($_POST['form_fecha_suscripcion']));
$form_id_nutricionista = $_POST['form_id_nutricionista'];
$form_fecha_pago = date('Y-m-d', strtotime($_POST['form_fecha_pago']));
$form_monto = $_POST['form_monto'];
if(empty($form_monto)){
?>
<script>
alert('Ingrese: Monto');
$('#form_monto').focus();
</script>
<?php
exit();
exit();
}
$form_id_medio_pago = $_POST['form_id_medio_pago'];
$form_id_banco = $_POST['form_id_banco'];

//AGREGAR A LA BD USUARIO
mysqli_query($con, "
INSERT INTO usuario (id_tipo_usuario, codigo, correo, clave, nombres, apellidos, fecha_nacimiento, genero, estado, activo, id_tipo_documento, numero_documento, date_added, instagram, direccion, distrito, provincia, departamento, residencia, maximo_pacientes, peso_meta, talla)
VALUES 
('".$form_tipo_usuario."', '".$form_codigo."', '".$form_correo."', '".password_hash($form_clave, PASSWORD_DEFAULT)."', '".$form_nombres."', '".$form_apellidos."', '".$form_fecha_nacimiento."', '".$form_genero."', '0', '1', '".$form_tipo_documento."', '".$form_numero_documento."', '".date('Y-m-d H:i:s')."', '".$form_instagram."', '".$form_direccion."', '".$form_distrito."', '".$form_provincia."', '".$form_departamento."', '".$form_residencia."', '".$form_maximo_pacientes."', '".$form_peso_meta."', '".$form_talla."')
"
);

//ULTIMO ID PACIENTE
$row_id = mysqli_fetch_array(mysqli_query($con, "SELECT id FROM usuario WHERE id_tipo_usuario = 2 ORDER BY id DESC LIMIT 1"));
$ultimo_id = (int)$row_id[0];

//AGREGAR A LA BD SUSCRIPCION
mysqli_query($con, "
INSERT INTO suscripcion_programa (id_programa, id_nutricionista, id_paciente, fecha_inicio, fecha_fin, estado, indicaciones)
VALUES 
('".$form_id_programa."', '".$form_id_nutricionista."', '".$ultimo_id."', '".$form_fecha_suscripcion."', '',  '1', '')
"
);

//ULTIMO ID SUSCRIPCION
$row_id_s = mysqli_fetch_array(mysqli_query($con, "SELECT id FROM suscripcion_programa WHERE estado = 1 ORDER BY id DESC LIMIT 1"));
$ultimo_id_s = (int)$row_id_s[0];

//AGREGAR A LA BD COBROS
mysqli_query($con, "
INSERT INTO cobro (id_suscripcion, id_paciente, fecha_pago, monto, id_medio_pago, id_cuenta_bancaria)
VALUES 
('".$ultimo_id_s."', '".$ultimo_id."', '".$form_fecha_pago."', '".$form_monto."', '".$form_id_medio_pago."',  '".$form_id_banco."')
"
);
?>
<script>
location.href = 'index.php?success';
</script>
<?php
exit();
exit();
}

//BUSQUEDA AUTOCOMPLETE
if($negocia_operacion == 3){


$search = $_POST['search'];

//FILTRO DE BUSQUEDA AVANZADO
$filtro_texto_busqueda = '';
if(!empty($search)){
$array_texto_busqueda = explode(' ', $search);
$i = 1;
$and = '';
foreach($array_texto_busqueda as $id_valor){
$valor_texto_busqueda = $id_valor;
if($i != 1){
$and = ' AND ';
}
$filtro_texto_busqueda .= $and." (CODIGO LIKE '%$valor_texto_busqueda%' OR NOMBRES LIKE '%$valor_texto_busqueda%' OR APELLIDOS LIKE '%$valor_texto_busqueda%')";
$i++;
}
}

//CONSULTA SQL
$sql  = " SELECT usuario.id AS ID_PACIENTE, usuario.codigo AS CODIGO, usuario.nombres AS NOMBRES, usuario.apellidos AS APELLIDOS";
$sql .= " FROM usuario";
$sql .= " WHERE usuario.activo = 1 AND usuario.id_tipo_usuario = 2";
$sql .= " HAVING 1=1";
if(!empty($filtro_texto_busqueda)){
$sql .= " AND (".$filtro_texto_busqueda.")";
}
$sql .= " ORDER BY usuario.apellidos ASC LIMIT 20";

$result = mysqli_query($con, $sql);

$response = array();
while($row = mysqli_fetch_array($result)){

$id_paciente = (int)$row[0];
$codigo_paciente = $row[1];
$nombres_paciente = $row[2];
$apellidos_paciente = $row[3];

$mostrar_producto = '('.$codigo_paciente.') '.$apellidos_paciente.' '.$nombres_paciente;



$response[] = array("value" => $id_paciente, "label" => $mostrar_producto);
}
echo json_encode($response);
exit();
exit();
}

//OBTENER DATOS DEL PACIENTE
if($negocia_operacion == 4){

//PARAMETRO
$id_paciente  = (int)$_GET['id_paciente'];

//CONSULTA SQL
$sql  = " SELECT usuario.id AS ID_PACIENTE, usuario.codigo AS CODIGO, usuario.nombres AS NOMBRES, usuario.apellidos AS APELLIDOS";
$sql .= " FROM usuario";
$sql .= " WHERE usuario.id_tipo_usuario = 2";
$sql .= " AND usuario.id = '$id_paciente'";
$sql .= " ORDER BY usuario.apellidos ASC LIMIT 1";

//OBTENER DATOS
$row_datos_paciente = mysqli_fetch_array(mysqli_query($con, $sql));

//DATOS DEL PACIENTE
$paciente_id = $row_datos_paciente[0];
$paciente_codigo = $row_datos_paciente[1];
$paciente_nombres = $row_datos_paciente[2];
$paciente_apellidos = $row_datos_paciente[3];
?>
<script>
$('#result_nombres_paciente').html('<?php echo $paciente_nombres.' '.$paciente_apellidos; ?>');

//PLANES DETOX / ALIMENTACION
$.ajax({
type: 'POST',
url: 'config/ajax.php?negocia_operacion=2&id_paciente=<?php echo $paciente_id; ?>&plan=1',
success: function(datos){
$('#div_plan_paciente').html(datos).fadeIn('slow');
}
});
</script>
<?php
exit();
exit();
}

if($negocia_operacion == 5){

$search = $_GET['value'];

//FILTRO DE BUSQUEDA AVANZADO
$filtro_texto_busqueda = '';
if(!empty($search)){
$array_texto_busqueda = explode(' ', $search);
$i = 1;
$and = '';
foreach($array_texto_busqueda as $id_valor){
$valor_texto_busqueda = $id_valor;
if($i != 1){
$and = ' AND ';
}
$filtro_texto_busqueda .= $and." (CODIGO LIKE '%$valor_texto_busqueda%' OR NOMBRES LIKE '%$valor_texto_busqueda%' OR APELLIDOS LIKE '%$valor_texto_busqueda%')";
$i++;
}
}

//CONSULTA SQL
$sql  = " SELECT usuario.id AS ID_PACIENTE, usuario.codigo AS CODIGO, usuario.nombres AS NOMBRES, usuario.apellidos AS APELLIDOS";
$sql .= " FROM usuario";
$sql .= " WHERE usuario.activo = 1 AND usuario.id_tipo_usuario = 2";
$sql .= " HAVING 1=1";
if(!empty($filtro_texto_busqueda)){
$sql .= " AND (".$filtro_texto_busqueda.")";
}
$sql .= " ORDER BY usuario.apellidos ASC LIMIT 20";

$result = mysqli_query($con, $sql);

//NUUM ROWS
$num_rows = mysqli_num_rows($result);
if(empty($num_rows)){
echo '<b>El paciente no se encuentra registrado.</b>';
}
exit();
exit();
}

if(isset($con)){
//1. inicio.php

if($view_controller == 1){
?>
<div class="card-box pd-20 height-100-p mb-30">
<div class="row align-items-center">
<div class="col-md-4 text-center">
<img src="vendors/images/icono.png" alt="">
</div>
<div id="div_ajax" class="col-md-8">
<?php
if(isset($_GET['success'])){
?>
<script>
swal(
{
title: 'Registro Exitoso!',
type: 'success',
confirmButtonClass: 'btn btn-success',
confirmButtonColor: '#95cf32',
confirmButtonText: 'OK'
}
);
</script>
<?php
}
?>
<h4 class="font-20 weight-500 mb-10 text-capitalize" style="padding-left: 65px;">
Hola <div class="font-30" style="color: #95cf32; font-weight: bold;"><?php echo ucwords($_SESSION['usuario_nombres']); ?>!</div>
</h4>
<?php
if($_SESSION['ID_TIPO_USUARIO'] == 3){
?>
<div style="margin-top: 30px; margin-bottom: 20px;">
<table style="width: 250px; border: 1px solid #95cf32; margin-left: 25px;">
<tr>
<td style="width: 100% !important; text-align: center; background: #95cf32;" colspan="2"><span style="color: #fff; font-size: 16px;">Datos Generales</span></td>
</tr>
<tr onclick="location.href='nutricionistas.php?all'" style="cursor: pointer;">
<td style="width: 50% !important; text-align: left; padding-left: 10px;"><span style="color: #111; font-weight: bold; font-size: 13px;">N&#176; Nutricionistas</span></td>
<td style="width: 50% !important; text-align: left; padding-left: 5px;"><span style="color: #111; font-weight: bold; font-size: 13px;">:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $_SESSION['admin_total_nutricionistas']; ?></span></td>
</tr>
<tr onclick="location.href='pacientes.php?all'" style="cursor: pointer;">
<td style="width: 50% !important; text-align: left; padding-left: 10px;"><span style="color: #111; font-weight: bold; font-size: 13px;">N&#176; Pacientes</span></td>
<td style="width: 50% !important; text-align: left; padding-left: 5px;"><span style="color: #111; font-weight: bold; font-size: 13px;">:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $_SESSION['admin_total_pacientes']; ?></span></td>
</tr>
</table>
<br>
<button onclick="nuevo_registro()" class="btn buttons-csv" tabindex="0" type="button" style="background: #95cf32; color: white; font-size: 12px; padding: 8px; margin-right: 20px;">
<i class="icon-copy dw dw-user1" style="font-size: 20px;"></i><br>
<span style="font-size: 15px;">(+) NUTRICIONISTA</span>
</button>
<button onclick="nuevo_registro(0)" class="btn buttons-pdf" tabindex="0" type="button" style="background: #F26C3C; color: white; font-size: 12px; padding: 8px;">
<i class="icon-copy dw dw-user1" style="font-size: 20px;"></i><br>
<span style="font-size: 15px;">(+) PACIENTE</span>
</button>
</div>
<?php
}
?>
</div>
<script>
//NUEVO REGISTRO
function nuevo_registro(id){
$.ajax({
type: 'POST',
url: 'config/content.php?negocia_operacion=1&negocia_tipo='+id,
success: function(datos){
$('#div_ajax').html(datos).fadeIn('slow');
}
});
}
</script>
</div>
</div>
<?php
if($_SESSION['ID_TIPO_USUARIO'] == 1 || $_SESSION['ID_TIPO_USUARIO'] == 3){
?>
<div class="row">
<div class="col-xl-3 mb-30" onclick="location.href='pacientes.php'" style="cursor: pointer;">
<div class="card-box height-100-p widget-style1">
<div class="d-flex flex-wrap align-items-center">
<div class="progress-data">
<div id="chart"></div>
</div>
<?php
//VALIDACIONES
if(empty($_SESSION['usuario_total_pacientes'])){

//PORCENTAJE PACIENTES
$porcentaje_uno = 0;

//PORCENTAJE PACIENTES ACTIVOS
$porcentaje_dos = 0;

//PORCENTAJE PACIENTES INACTIVOS
$porcentaje_tres = 0;
} else {

//PORCENTAJE PACIENTES
$porcentaje_uno = round(($_SESSION['usuario_total_pacientes'] / $_SESSION['usuario_maximo_pacientes']), 2) * 100;

//PORCENTAJE PACIENTES ACTIVOS
$porcentaje_dos = round(($_SESSION['usuario_total_pacientes_activos'] / $_SESSION['usuario_total_pacientes']), 2) * 100;

//PORCENTAJE PACIENTES INACTIVOS
$porcentaje_tres = round(($_SESSION['usuario_total_pacientes_inactivos'] / $_SESSION['usuario_total_pacientes']), 2) * 100;
}

//PORCENTAJE CONTROLES REALIZADOS
if(empty($_SESSION['total_controles'])){
$porcentaje_cuatro = 0;
} else {
$porcentaje_cuatro = round(($_SESSION['usuario_controles_realizados'] / $_SESSION['total_controles']), 2) * 100;
}
?>
<div class="widget-data">
<div class="h4 mb-0"><?php echo $_SESSION['usuario_total_pacientes']; ?>/<?php echo $_SESSION['usuario_maximo_pacientes']; ?></div>
<div class="weight-600 font-14">Pacientes</div>
</div>
</div>
</div>
<script>
var options = {
series: [<?php echo $porcentaje_uno; ?>],
grid: {
padding: {
top: 0,
right: 0,
bottom: 0,
left: 0
},
},
chart: {
height: 100,
width: 70,
type: 'radialBar',
},	
plotOptions: {
radialBar: {
hollow: {
size: '50%',
},
dataLabels: {
name: {
show: false,
color: '#fff'
},
value: {
show: true,
color: '#333',
offsetY: 5,
fontSize: '15px'
}
}
}
},
colors: ['#818181'],
fill: {
type: 'gradient',
gradient: {
shade: 'dark',
type: 'diagonal1',
shadeIntensity: 0.8,
gradientToColors: ['#95cf32'],
inverseColors: false,
opacityFrom: [1, 0.2],
opacityTo: 1,
stops: [0, 100],
}
},
states: {
normal: {
filter: {
type: 'none',
value: 0,
}
},
hover: {
filter: {
type: 'none',
value: 0,
}
},
active: {
filter: {
type: 'none',
value: 0,
}
},
}
};

var chart = new ApexCharts(document.querySelector("#chart"), options);
chart.render();
</script>
</div>
<div class="col-xl-3 mb-30" onclick="location.href='pacientes.php?activos=1'" style="cursor: pointer;">
<div class="card-box height-100-p widget-style1">
<div class="d-flex flex-wrap align-items-center">
<div class="progress-data">
<div id="chart2"></div>
</div>
<div class="widget-data">
<div class="h4 mb-0"><?php echo $_SESSION['usuario_total_pacientes_activos']; ?>/<?php echo $_SESSION['usuario_total_pacientes']; ?></div>
<div class="weight-600 font-14">Pacientes Activos</div>
</div>
</div>
</div>
<script>
var options = {
series: [<?php echo $porcentaje_dos; ?>],
grid: {
padding: {
top: 0,
right: 0,
bottom: 0,
left: 0
},
},
chart: {
height: 100,
width: 70,
type: 'radialBar',
},	
plotOptions: {
radialBar: {
hollow: {
size: '50%',
},
dataLabels: {
name: {
show: false,
color: '#fff'
},
value: {
show: true,
color: '#333',
offsetY: 5,
fontSize: '15px'
}
}
}
},
colors: ['#818181'],
fill: {
type: 'gradient',
gradient: {
shade: 'dark',
type: 'diagonal1',
shadeIntensity: 0.8,
gradientToColors: ['#95cf32'],
inverseColors: false,
opacityFrom: [1, 0.2],
opacityTo: 1,
stops: [0, 100],
}
},
states: {
normal: {
filter: {
type: 'none',
value: 0,
}
},
hover: {
filter: {
type: 'none',
value: 0,
}
},
active: {
filter: {
type: 'none',
value: 0,
}
},
}
};

var chart = new ApexCharts(document.querySelector("#chart2"), options);
chart.render();
</script>
</div>
<div class="col-xl-3 mb-30" onclick="location.href='pacientes.php?activos=2'" style="cursor: pointer;">
<div class="card-box height-100-p widget-style1">
<div class="d-flex flex-wrap align-items-center">
<div class="progress-data">
<div id="chart3"></div>
</div>
<div class="widget-data">
<div class="h4 mb-0"><?php echo $_SESSION['usuario_total_pacientes_inactivos']; ?>/<?php echo $_SESSION['usuario_total_pacientes']; ?></div>
<div class="weight-600 font-14">Pacientes Inactivos</div>
</div>
</div>
</div>
<script>
var options = {
series: [<?php echo $porcentaje_tres; ?>],
grid: {
padding: {
top: 0,
right: 0,
bottom: 0,
left: 0
},
},
chart: {
height: 100,
width: 70,
type: 'radialBar',
},	
plotOptions: {
radialBar: {
hollow: {
size: '50%',
},
dataLabels: {
name: {
show: false,
color: '#fff'
},
value: {
show: true,
color: '#333',
offsetY: 5,
fontSize: '15px'
}
}
}
},
colors: ['#818181'],
fill: {
type: 'gradient',
gradient: {
shade: 'dark',
type: 'diagonal1',
shadeIntensity: 0.8,
gradientToColors: ['#95cf32'],
inverseColors: false,
opacityFrom: [1, 0.2],
opacityTo: 1,
stops: [0, 100],
}
},
states: {
normal: {
filter: {
type: 'none',
value: 0,
}
},
hover: {
filter: {
type: 'none',
value: 0,
}
},
active: {
filter: {
type: 'none',
value: 0,
}
},
}
};

var chart = new ApexCharts(document.querySelector("#chart3"), options);
chart.render();
</script>
</div>
<div class="col-xl-3 mb-30" onclick="location.href='controles.php'" style="cursor: pointer;">
<div class="card-box height-100-p widget-style1">
<div class="d-flex flex-wrap align-items-center">
<div class="progress-data">
<div id="chart4"></div>
</div>
<div class="widget-data">
<div class="h4 mb-0"><?php echo $_SESSION['usuario_controles_realizados']; ?>/<?php echo $_SESSION['total_controles']; ?></div>
<div class="weight-600 font-14">Controles Realizados</div>
</div>
</div>
</div>
<script>
var options = {
series: [<?php echo $porcentaje_cuatro; ?>],
grid: {
padding: {
top: 0,
right: 0,
bottom: 0,
left: 0
},
},
chart: {
height: 100,
width: 70,
type: 'radialBar',
},	
plotOptions: {
radialBar: {
hollow: {
size: '50%',
},
dataLabels: {
name: {
show: false,
color: '#fff'
},
value: {
show: true,
color: '#333',
offsetY: 5,
fontSize: '15px'
}
}
}
},
colors: ['#818181'],
fill: {
type: 'gradient',
gradient: {
shade: 'dark',
type: 'diagonal1',
shadeIntensity: 0.8,
gradientToColors: ['#95cf32'],
inverseColors: false,
opacityFrom: [1, 0.2],
opacityTo: 1,
stops: [0, 100],
}
},
states: {
normal: {
filter: {
type: 'none',
value: 0,
}
},
hover: {
filter: {
type: 'none',
value: 0,
}
},
active: {
filter: {
type: 'none',
value: 0,
}
},
}
};

var chart = new ApexCharts(document.querySelector("#chart4"), options);
chart.render();
</script>
</div>
</div>
<?php
}
}
if(($view_controller >= 2 && $view_controller <= 7 && $view_controller != 3) || ($view_controller == 10)){
?>
<div class="card-box mb-30">
<div class="card-box pd-20 height-100-p mb-30">
<div id="resultado" class="row align-items-center"></div>
</div>
<div class="pb-20" style="padding-left: 20px; padding-right: 20px; padding-top: 20px;">
<div class="table-responsive">
<table id="tabla_filtros" style="width: 1000px !important; margin: 0 auto; display: none;">
<tr>
<td style="width: 50% !important; border: 1px solid white; padding-top: 3px; padding-bottom: 3px; text-align: left; padding-bottom: 20px;" colspan="4">
<div class="btn-group">
<button class="btn buttons-csv" tabindex="0" type="button" style="background: #95cf32; color: white; font-size: 12px; padding: 8px;"><span>NUEVO</span></button>
</div>
</td>
<td style="width: 50% !important; border: 1px solid white; padding-top: 3px; padding-bottom: 3px; text-align: right; padding-bottom: 20px;" colspan="4">
<div class="btn-group">
<button class="btn buttons-csv" tabindex="0" type="button" style="background: #95cf32; color: white; font-size: 12px; padding: 8px;"><span>EXCEL</span></button>
<button class="btn buttons-pdf" tabindex="0" type="button" style="background: #F26C3C; color: white; font-size: 12px; padding: 8px;"><span>PDF</span></button>
</div>
</td>
</tr>
</table>
<div id="reporte_tabla"></div>
</div>
<div class="row">
<div class="col-md-1 hidden-xs"></div>
<div class="col-md-10 col-xs-12">
<div id="chart1"></div>
</div>
<div class="col-md-1 hidden-xs"></div>
</div>
<div class="row">
<div class="col-md-1 hidden-xs"></div>
<div class="col-md-5 col-xs-12">
<div id="chart2"></div>
</div>
<div class="col-md-5 col-xs-12">
<div id="chart3"></div>
</div>
<div class="col-md-1 hidden-xs"></div>
</div>
<script>
//LOAD
function load(page){
$.ajax({
type: 'POST',
url: 'config/ajax.php?view_controller=<?php echo $view_controller; ?>',
data: {action: 'ajax' , page: page, activos : '<?php echo $activos; ?>'},
success: function(datos){
$('#reporte_tabla').html(datos).fadeIn('slow');
}
});
}

//ELIMINAR
function eliminar(id){
if(confirm('Desea eliminar el registro?')){
$.ajax({
type: 'POST',
url: 'config/ajax.php?view_controller=<?php echo $view_controller; ?>&id='+id,
success: function(datos){
$('#reporte_tabla').html(datos).fadeIn('slow');
}
});
}
}

//VISUALIZAR
function visualizar(id){
$.ajax({
type: 'POST',
url: 'config/ajax.php?negocia_operacion=1&view_controller=<?php echo $view_controller; ?>',
data: {id: id},
success: function(datos){
$('#resultado').html(datos).fadeIn('slow');
$('#reporte_tabla').html('');
$('#tabla_filtros').css('display', 'none');
}
});
}

load(1);
</script>
</div>
</div>
<?php
}
if($view_controller == 3){
?>
<div class="card-box mb-30">
<div class="card-box pd-20 height-100-p mb-30">
<div style="text-align: center; margin-top: 30px; margin-bottom: 20px;">
<button type="button" class="btn" style="background: #95cf32; color: white; padding: 4px; font-size: 13px;">Planes DETOX</button>
<button type="button" class="btn" style="background: #F26C3C; color: white; padding: 4px; font-size: 13px;">Planes de Alimentaci&oacute;n</button>
<table style="width: 400px; margin-left: 25px; margin-top: 40px;">
<tr>
<td style="width: 50% !important; text-align: left; padding-left: 10px;">
<span style="color: #111; font-weight: bold; font-size: 13px;">N&#176; de Socio:</span>
</td>
<td style="width: 50% !important; text-align: left; padding-left: 5px;">
<input id="form_busqueda_paciente" name="form_busqueda_paciente" class="form-control n-form-control" type="text" placeholder="ejm: P-1">
<div id="resultado_busqueda"></div>
<script>
//AUTOCOMPLETE
$(function(){
$('#form_busqueda_paciente').autocomplete({
source: function(request, response){
$.ajax({
url: 'config/content.php?negocia_operacion=3',
type: 'POST',
dataType: 'JSON',
data: {
search: request.term
},
success: function(data){
response(data);
}
});
},
select: function(event, ui){
complete_datos(ui.item.value);
$('#form_busqueda_paciente').val(ui.item.label);
return false;
}
});
});

//FUNCION COMPLETE
function complete_datos(id_paciente){
$.ajax({
type: 'POST',
url: 'config/content.php?negocia_operacion=4&id_paciente='+id_paciente,
success: function(datos){
$('#resultado_busqueda').html(datos).fadeIn('slow');
}
});
}
</script>
</td>
</tr>
<tr>
<td style="width: 50% !important; text-align: left; padding-left: 10px;">
<span style="color: #111; font-weight: bold; font-size: 13px;">Nombres y Apellidos:</span>
</td>
<td style="width: 50% !important; text-align: left; padding-left: 5px;">
<span id="result_nombres_paciente" style="color: #111; font-weight: bold; font-size: 13px;"></span>
</td>
</tr>
</table>
<div id="div_plan_paciente"></div>
</div>
</div>
</div>
<?php
}
if($view_controller == 8){
?>
<div class="calendar-wrap">
<div id='calendar'></div>
</div>
<div id="modal-view-event" class="modal modal-top fade calendar-modal">
<div class="modal-dialog modal-dialog-centered">
<div class="modal-content">
<div class="modal-body">
<h4 class="h4"><span class="event-icon weight-400 mr-3"></span><span class="event-title"></span></h4>
<div class="event-body"></div>
</div>
<div class="modal-footer">
<button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
</div>
</div>
</div>
</div>
<div id="modal-view-event-add" class="modal modal-top fade calendar-modal">
<div class="modal-dialog modal-dialog-centered">
<div class="modal-content">
<form id="add-event">
<div class="modal-body">
<h4 class="text-blue h4 mb-10">Add Event Detail</h4>
<div class="form-group">
<label>Event name</label>
<input type="text" class="form-control" name="ename">
</div>
<div class="form-group">
<label>Event Date</label>
<input type='text' class="datetimepicker form-control" name="edate">
</div>
<div class="form-group">
<label>Event Description</label>
<textarea class="form-control" name="edesc"></textarea>
</div>
<div class="form-group">
<label>Event Color</label>
<select class="form-control" name="ecolor">
<option value="fc-bg-default">fc-bg-default</option>
<option value="fc-bg-blue">fc-bg-blue</option>
<option value="fc-bg-lightgreen">fc-bg-lightgreen</option>
<option value="fc-bg-pinkred">fc-bg-pinkred</option>
<option value="fc-bg-deepskyblue">fc-bg-deepskyblue</option>
</select>
</div>
<div class="form-group">
<label>Event Icon</label>
<select class="form-control" name="eicon">
<option value="circle">circle</option>
<option value="cog">cog</option>
<option value="group">group</option>
<option value="suitcase">suitcase</option>
<option value="calendar">calendar</option>
</select>
</div>
</div>
<div class="modal-footer">
<button type="submit" class="btn btn-primary" >Save</button>
<button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
</div>
</form>
</div>
</div>
</div>
<?php
}
if($view_controller == 9){
?>
<div class="row">
<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 mb-30">
<div class="pd-20 card-box height-100-p">
<div class="profile-photo">
<a href="modal" data-toggle="modal" data-target="#modal" class="edit-avatar"><i class="fa fa-pencil"></i></a>
<img src="vendors/images/photo1.jpg" alt="" class="avatar-photo">
<div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
<div class="modal-dialog modal-dialog-centered" role="document">
<div class="modal-content">
<div class="modal-body pd-5">
<div class="img-container">
<img id="image" src="vendors/images/photo2.jpg" alt="Picture">
</div>
</div>
<div class="modal-footer">
<input type="submit" value="Update" class="btn btn-primary">
<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
</div>
</div>
</div>
</div>
</div>
<h5 class="text-center h5 mb-0">Ross C. Lopez</h5>
<p class="text-center text-muted font-14">Lorem ipsum dolor sit amet</p>
<div class="profile-info">
<h5 class="mb-20 h5 text-blue">Contact Information</h5>
<ul>
<li>
<span>Email Address:</span>
FerdinandMChilds@test.com
</li>
<li>
<span>Phone Number:</span>
619-229-0054
</li>
<li>
<span>Country:</span>
America
</li>
<li>
<span>Address:</span>
1807 Holden Street<br>
San Diego, CA 92115
</li>
</ul>
</div>
<div class="profile-social">
<h5 class="mb-20 h5 text-blue">Social Links</h5>
<ul class="clearfix">
<li><a href="#" class="btn" data-bgcolor="#3b5998" data-color="#ffffff"><i class="fa fa-facebook"></i></a></li>
<li><a href="#" class="btn" data-bgcolor="#1da1f2" data-color="#ffffff"><i class="fa fa-twitter"></i></a></li>
<li><a href="#" class="btn" data-bgcolor="#007bb5" data-color="#ffffff"><i class="fa fa-linkedin"></i></a></li>
<li><a href="#" class="btn" data-bgcolor="#f46f30" data-color="#ffffff"><i class="fa fa-instagram"></i></a></li>
<li><a href="#" class="btn" data-bgcolor="#c32361" data-color="#ffffff"><i class="fa fa-dribbble"></i></a></li>
<li><a href="#" class="btn" data-bgcolor="#3d464d" data-color="#ffffff"><i class="fa fa-dropbox"></i></a></li>
<li><a href="#" class="btn" data-bgcolor="#db4437" data-color="#ffffff"><i class="fa fa-google-plus"></i></a></li>
<li><a href="#" class="btn" data-bgcolor="#bd081c" data-color="#ffffff"><i class="fa fa-pinterest-p"></i></a></li>
<li><a href="#" class="btn" data-bgcolor="#00aff0" data-color="#ffffff"><i class="fa fa-skype"></i></a></li>
<li><a href="#" class="btn" data-bgcolor="#00b489" data-color="#ffffff"><i class="fa fa-vine"></i></a></li>
</ul>
</div>
<div class="profile-skills">
<h5 class="mb-20 h5 text-blue">Key Skills</h5>
<h6 class="mb-5 font-14">HTML</h6>
<div class="progress mb-20" style="height: 6px;">
<div class="progress-bar" role="progressbar" style="width: 90%" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
</div>
<h6 class="mb-5 font-14">Css</h6>
<div class="progress mb-20" style="height: 6px;">
<div class="progress-bar" role="progressbar" style="width: 70%" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
</div>
<h6 class="mb-5 font-14">jQuery</h6>
<div class="progress mb-20" style="height: 6px;">
<div class="progress-bar" role="progressbar" style="width: 60%" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
</div>
<h6 class="mb-5 font-14">Bootstrap</h6>
<div class="progress mb-20" style="height: 6px;">
<div class="progress-bar" role="progressbar" style="width: 80%" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
</div>
</div>
</div>
</div>
<div class="col-xl-8 col-lg-8 col-md-8 col-sm-12 mb-30">
<div class="card-box height-100-p overflow-hidden">
<div class="profile-tab height-100-p">
<div class="tab height-100-p">
<div class="profile-setting">
<form>
<ul class="profile-edit-list row">
<li class="weight-500 col-md-6">
<h4 class="text-blue h5 mb-20">Edit Your Personal Setting</h4>
<div class="form-group">
<label>Full Name</label>
<input class="form-control form-control-lg" type="text">
</div>
<div class="form-group">
<label>Title</label>
<input class="form-control form-control-lg" type="text">
</div>
<div class="form-group">
<label>Email</label>
<input class="form-control form-control-lg" type="email">
</div>
<div class="form-group">
<label>Date of birth</label>
<input class="form-control form-control-lg date-picker" type="text">
</div>
<div class="form-group">
<label>Gender</label>
<div class="d-flex">
<div class="custom-control custom-radio mb-5 mr-20">
<input type="radio" id="customRadio4" name="customRadio" class="custom-control-input">
<label class="custom-control-label weight-400" for="customRadio4">Male</label>
</div>
<div class="custom-control custom-radio mb-5">
<input type="radio" id="customRadio5" name="customRadio" class="custom-control-input">
<label class="custom-control-label weight-400" for="customRadio5">Female</label>
</div>
</div>
</div>
<div class="form-group">
<label>Country</label>
<select class="selectpicker form-control form-control-lg" data-style="btn-outline-secondary btn-lg" title="Not Chosen">
<option>United States</option>
<option>India</option>
<option>United Kingdom</option>
</select>
</div>
<div class="form-group">
<label>State/Province/Region</label>
<input class="form-control form-control-lg" type="text">
</div>
<div class="form-group">
<label>Postal Code</label>
<input class="form-control form-control-lg" type="text">
</div>
<div class="form-group">
<label>Phone Number</label>
<input class="form-control form-control-lg" type="text">
</div>
<div class="form-group">
<label>Address</label>
<textarea class="form-control"></textarea>
</div>
<div class="form-group">
<label>Visa Card Number</label>
<input class="form-control form-control-lg" type="text">
</div>
<div class="form-group">
<label>Paypal ID</label>
<input class="form-control form-control-lg" type="text">
</div>
<div class="form-group">
<div class="custom-control custom-checkbox mb-5">
<input type="checkbox" class="custom-control-input" id="customCheck1-1">
<label class="custom-control-label weight-400" for="customCheck1-1">I agree to receive notification emails</label>
</div>
</div>
<div class="form-group mb-0">
<input type="submit" class="btn btn-primary" value="Update Information">
</div>
</li>
<li class="weight-500 col-md-6">
<h4 class="text-blue h5 mb-20">Edit Social Media links</h4>
<div class="form-group">
<label>Facebook URL:</label>
<input class="form-control form-control-lg" type="text" placeholder="Paste your link here">
</div>
<div class="form-group">
<label>Twitter URL:</label>
<input class="form-control form-control-lg" type="text" placeholder="Paste your link here">
</div>
<div class="form-group">
<label>Linkedin URL:</label>
<input class="form-control form-control-lg" type="text" placeholder="Paste your link here">
</div>
<div class="form-group">
<label>Instagram URL:</label>
<input class="form-control form-control-lg" type="text" placeholder="Paste your link here">
</div>
<div class="form-group">
<label>Dribbble URL:</label>
<input class="form-control form-control-lg" type="text" placeholder="Paste your link here">
</div>
<div class="form-group">
<label>Dropbox URL:</label>
<input class="form-control form-control-lg" type="text" placeholder="Paste your link here">
</div>
<div class="form-group">
<label>Google-plus URL:</label>
<input class="form-control form-control-lg" type="text" placeholder="Paste your link here">
</div>
<div class="form-group">
<label>Pinterest URL:</label>
<input class="form-control form-control-lg" type="text" placeholder="Paste your link here">
</div>
<div class="form-group">
<label>Skype URL:</label>
<input class="form-control form-control-lg" type="text" placeholder="Paste your link here">
</div>
<div class="form-group">
<label>Vine URL:</label>
<input class="form-control form-control-lg" type="text" placeholder="Paste your link here">
</div>
<div class="form-group mb-0">
<input type="submit" class="btn btn-primary" value="Save & Update">
</div>
</li>
</ul>
</form>
</div>
</div>
</div>
</div>
</div>
</div>
<?php
}

//PACIENTES - VENDEDOR
if($view_controller == 11){
?>
<div class="card-box mb-30" id="displaynone_1">
<div class="card-box pd-20 height-100-p mb-30">
<div style="text-align: center; margin-top: 30px; margin-bottom: 20px;">
<div class="row">
<div class="col-md-6">
<table style="width: 400px; margin-left: 25px; margin-top: 40px;">
<tr>
<td style="width: 50% !important; text-align: left; padding-left: 10px;">
<span style="color: #111; font-weight: bold; font-size: 13px;">N&#176; de Socio:</span>
</td>
<td style="width: 50% !important; text-align: left; padding-left: 5px; padding-bottom: 10px;">
<input id="form_busqueda_paciente_1" name="form_busqueda_paciente_1" class="form-control n-form-control" type="text" placeholder="N&#176; de Socio:" onkeyup="mensaje_404(this.value)">
<div id="resultado_busqueda_1"></div>
<script>
//AUTOCOMPLETE
$(function(){
$('#form_busqueda_paciente_1').autocomplete({
source: function(request, response){
$.ajax({
url: 'config/content.php?negocia_operacion=3',
type: 'POST',
dataType: 'JSON',
data: {
search: request.term
},
success: function(data){
response(data);
}
});
},
select: function(event, ui){
if(ui.item.value == 0){
nuevo_registro(0);
} else {
nuevo_registro(ui.item.value);
$('#form_busqueda_paciente_1').val(ui.item.label);
}
//complete_datos(ui.item.value);
return false;
}
});
});
</script>
</td>
</tr>
<tr>
<td style="width: 50% !important; text-align: left; padding-left: 10px; padding-bottom: 10px;">
<span style="color: #111; font-weight: bold; font-size: 13px;">Nombres:</span>
</td>
<td style="width: 50% !important; text-align: left; padding-left: 5px; padding-bottom: 10px;">
<input id="form_busqueda_paciente_2" name="form_busqueda_paciente_2" class="form-control n-form-control" type="text" placeholder="Nombres:" onkeyup="mensaje_404(this.value)">
<div id="resultado_busqueda_2"></div>
<script>
//AUTOCOMPLETE
$(function(){
$('#form_busqueda_paciente_2').autocomplete({
source: function(request, response){
$.ajax({
url: 'config/content.php?negocia_operacion=3',
type: 'POST',
dataType: 'JSON',
data: {
search: request.term
},
success: function(data){
response(data);
}
});
},
select: function(event, ui){
if(ui.item.value == 0){
nuevo_registro(0);
} else {
nuevo_registro(ui.item.value);
$('#form_busqueda_paciente_2').val(ui.item.label);
}
//complete_datos(ui.item.value);
return false;
}
});
});
</script>
</td>
</tr>
<tr>
<td style="width: 50% !important; text-align: left; padding-left: 10px; padding-bottom: 10px;">
<span style="color: #111; font-weight: bold; font-size: 13px;">Apellidos:</span>
</td>
<td style="width: 50% !important; text-align: left; padding-left: 5px; padding-bottom: 10px;">
<input id="form_busqueda_paciente_3" name="form_busqueda_paciente_3" class="form-control n-form-control" type="text" placeholder="Apellidos:" onkeyup="mensaje_404(this.value)">
<div id="resultado_busqueda_3"></div>
<script>
//AUTOCOMPLETE
$(function(){
$('#form_busqueda_paciente_3').autocomplete({
source: function(request, response){
$.ajax({
url: 'config/content.php?negocia_operacion=3',
type: 'POST',
dataType: 'JSON',
data: {
search: request.term
},
success: function(data){
response(data);
}
});
},
select: function(event, ui){
if(ui.item.value == 0){
nuevo_registro(0);
} else {
nuevo_registro(ui.item.value);
$('#form_busqueda_paciente_3').val(ui.item.label);
}
//complete_datos(ui.item.value);
return false;
}
});
});
</script>
</td>
</tr>
</table>
<div id="div_plan_paciente"></div>
</div>
<div class="col-md-6" style="text-align: left; padding-top: 70px !important;">
<p id="mensaje_404"></p>
<button onclick="nuevo_registro(0)" type="button" class="btn" style="background: #95cf32; color: white; padding: 4px; font-size: 13px;">(+) Registrar Nuevo Paciente </button>
</div>
</div>
</div>
</div>
</div>
<div id="div_ajax"></div>
<script>
//NUEVO REGISTRO
function nuevo_registro(id){
$.ajax({
type: 'POST',
url: 'config/content.php?negocia_operacion=1&negocia_tipo='+id,
success: function(datos){
$('#div_ajax').html(datos).fadeIn('slow');
$('#displaynone_1').css('display', 'none');
}
});
}

function mensaje_404(value){
$.ajax({
type: 'POST',
url: 'config/content.php?negocia_operacion=5&value='+value,
success: function(datos){
$('#mensaje_404').html(datos).fadeIn('slow');
}
});
}
</script>
<?php
}
}