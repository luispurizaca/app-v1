<?php
session_start();
$negocia_operacion = (int)$_GET['negocia_operacion'];

//CONEXION
require_once (__DIR__.'/conexion_bd.php');

//FORMULARIO NUEVO REGISTRO
if($negocia_operacion == 1){

//TIPO DE USUARIO
$id_paciente = (int)$_GET['negocia_tipo'];
$get_nuevo_vendedor = (int)$_GET['get_nuevo_vendedor'];

//DATOS
if($_SESSION['ID_TIPO_USUARIO'] == 3){
if($get_nuevo_vendedor == 1){
$tipo_usuario = 4;
$letra_add = 'V-';
} else {
$tipo_usuario = 1;
$letra_add = 'N-';
}
} else {
$tipo_usuario = 2;
$letra_add = 'P-';
}
$registro_nombres = '';
$registro_apellidos = '';
$registro_tipo_documento = '';
$registro_numero_documento = '';

$registro_fecha_nacimiento = '';
$registro_genero = '';
$registro_instagram = '';
$registro_direccion = '';
$registro_departamento = '';
$registro_provincia = '';
$registro_distrito = '';
$registro_residencia = '';
$registro_telefono = '';
$registro_talla = '';
$registro_peso_meta = '';
$registro_maximo_pacientes = '';
$registro_correo = '';
$registro_clave = '';

if(empty($id_paciente)){

//ULTIMO CODIGO REGISTRADO
$row_codigo_registro = mysqli_fetch_array(mysqli_query($con, "SELECT codigo FROM usuario WHERE id_tipo_usuario = '$tipo_usuario' ORDER BY id DESC LIMIT 1"));
$codigo_registro = $letra_add.(((int)substr($row_codigo_registro[0], 2, 100)) + 1);

$registro_clave = $codigo_registro.'12345';
} else {

//CODIGO DEL PACIENTE
$row_codigo_registro = mysqli_fetch_array(mysqli_query($con, "SELECT codigo, nombres, apellidos, id_tipo_documento, numero_documento, fecha_nacimiento,
genero, instagram, direccion, departamento, provincia, distrito, residencia, telefono, talla, peso_meta, maximo_pacientes, correo, clave
FROM usuario WHERE id = '$id_paciente' ORDER BY id DESC LIMIT 1"));

$codigo_registro = $row_codigo_registro[0];
$registro_nombres = $row_codigo_registro[1];
$registro_apellidos = $row_codigo_registro[2];
$registro_tipo_documento = $row_codigo_registro[3];
$registro_numero_documento = $row_codigo_registro[4];

$registro_fecha_nacimiento = $row_codigo_registro[5];
$registro_genero = $row_codigo_registro[6];
$registro_instagram = $row_codigo_registro[7];
$registro_direccion = $row_codigo_registro[8];
$registro_departamento = $row_codigo_registro[9];
$registro_provincia = $row_codigo_registro[10];
$registro_distrito = $row_codigo_registro[11];
$registro_residencia = $row_codigo_registro[12];
$registro_telefono = $row_codigo_registro[13];
$registro_talla = $row_codigo_registro[14];
$registro_peso_meta = $row_codigo_registro[15];
$registro_maximo_pacientes = $row_codigo_registro[16];
$registro_correo = $row_codigo_registro[17];
$registro_clave = $row_codigo_registro[18];
}
?>
<div id="div_guardar_paciente"></div>
<div class="pd-20 card-box mb-30">
<div class="clearfix">
<div class="pull-left">
<h4 class="weight-500 text-capitalize" style="font-size: 17px;">
<div style="color: #95cf32; font-weight: bold; font-size: 18px;">Datos Personales</div>
</h4><hr>
</div>
</div>
<div class="row">
<div class="col-md-3 col-sm-6">
<div class="form-group">
<label class="n-label">N&#176;:</label>
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
<input id="form_fecha_nacimiento" name="form_fecha_nacimiento" class="form-control n-form-control" type="date" placeholder="Fecha de Nacimiento" value="<?php echo $registro_fecha_nacimiento; ?>">
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

/*
//CONSULTA NEGOCIA
if(form_numero_documento.length == 11){
var tipo_documento = 222;
} else {
var tipo_documento = 111;
}
$.ajax({
url: '//negocia.pe/functions/fn_consultas.php?tipo_documento='+tipo_documento+'&numero_documento='+doc,
dataType: "JSON",
beforeSend: function(){
swal('Extrayendo datos');
},
success: function(data){
if(tipo_documento == 111){
$('#form_nombres').val(data.nombres);
$('#form_apellidos').val(data.nombres);
}
if(tipo_documento == 222){
$('#form_nombres').val(data.razon_social);
$('#form_apellidos').val(data.nombre_comercial);
$('#form_direccion').val(data.domicilio_fiscal);
}
}
});
*/
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
<option value="1" <?php if($registro_genero == 1){ ?> selected="selected" <?php } ?>>Masculino</option>
<option value="2" <?php if($registro_genero == 2){ ?> selected="selected" <?php } ?>>Femenino</option>
</select>
</div>
</div>
<div class="col-md-3 col-sm-6">
<div class="form-group">
<label class="n-label">Instagram</label>
<input id="form_instagram" name="form_instagram" class="form-control n-form-control" type="text" placeholder="Instagram" value="<?php echo $registro_instagram; ?>">
</div>
</div>
<div class="col-md-3 col-sm-6">
<div class="form-group">
<label class="n-label">Direcci&oacute;n</label>
<input id="form_direccion" name="form_direccion" class="form-control n-form-control" type="text" placeholder="Direcci&oacute;n" value="<?php echo $registro_direccion; ?>">
</div>
</div>
<div class="col-md-3 col-sm-6">
<div class="form-group">
<label class="n-label">Departamento</label>
<input id="form_departamento" name="form_departamento" class="form-control n-form-control" type="text" placeholder="Departamento" value="<?php echo $registro_departamento; ?>">
</div>
</div>
<div class="col-md-3 col-sm-6">
<div class="form-group">
<label class="n-label">Provincia</label>
<input id="form_provincia" name="form_provincia" class="form-control n-form-control" type="text" placeholder="Provincia" value="<?php echo $registro_provincia; ?>">
</div>
</div>
<div class="col-md-3 col-sm-6">
<div class="form-group">
<label class="n-label">Distrito</label>
<input id="form_distrito" name="form_distrito" class="form-control n-form-control" type="text" placeholder="Distrito" value="<?php echo $registro_distrito; ?>">
</div>
</div>
<div class="col-md-3 col-sm-6">
<div class="form-group">
<label class="n-label">Residencia</label>
<input id="form_residencia" name="form_residencia" class="form-control n-form-control" type="text" placeholder="ejm: PE" value="<?php echo $registro_residencia; ?>">
</div>
</div>
<div class="col-md-3 col-sm-6">
<div class="form-group">
<label class="n-label">Tel&eacute;fono</label>
<input id="form_telefono" name="form_telefono" class="form-control n-form-control" type="text" placeholder="ejm: 999999999" value="<?php echo $registro_telefono; ?>">
</div>
</div>
<div class="col-md-3 col-sm-6" style="display: none;">
<div class="form-group">
<label class="n-label">Talla</label>
<input id="form_talla" name="form_talla" class="form-control n-form-control" type="text" placeholder="Talla" value="<?php echo $registro_talla; ?>">
</div>
</div>
<div class="col-md-3 col-sm-6" style="display: none;">
<div class="form-group">
<label class="n-label">Peso Meta</label>
<input id="form_peso_meta" name="form_peso_meta" class="form-control n-form-control" type="text" placeholder="Peso Meta" value="<?php echo $registro_peso_meta; ?>">
</div>
</div>
<div class="col-md-3 col-sm-6" style="display: none;">
<div class="form-group">
<label class="n-label">N&#176; M&aacute;x. Pac.</label>
<input id="form_maximo_pacientes" name="form_maximo_pacientes" class="form-control n-form-control" type="text" placeholder="N&#176; M&aacute;x. Pac." value="<?php echo $registro_maximo_pacientes; ?>">
</div>
</div>
</div>
<div class="row" style="padding-top: 15px; <?php if($_SESSION['ID_TIPO_USUARIO'] == 3){ ?> display: none; <?php } ?>">
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
<label class="n-label">Planes</label>
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
<div class="col-md-3 col-sm-6"></div>
<div class="col-md-3 col-sm-6">
<div class="form-group">
<label class="n-label">Fecha de Inicio</label>
<input id="form_fecha_suscripcion" name="form_fecha_suscripcion" class="form-control n-form-control" type="date" placeholder="Fecha de Inicio" value="<?php echo date('Y-m-d'); ?>">
</div>
</div>
<div class="col-md-3 col-sm-6">
<div class="form-group">
<label class="n-label">Fecha de Fin</label>
<input id="form_fecha_suscripcion_fin" name="form_fecha_suscripcion_fin" class="form-control n-form-control" type="date" placeholder="Fecha de Fin" value="<?php echo date('Y-m-d', strtotime(date('Y-m-d'). '+ 1 month')); ?>">
</div>
</div>
</div>
<div class="row" style="padding-top: 15px; <?php if($_SESSION['ID_TIPO_USUARIO'] == 3){ ?> display: none; <?php } ?>">
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
<input id="form_correo" name="form_correo" class="form-control n-form-control" type="text" placeholder="Correo electr&oacute;nico" value="<?php echo $registro_correo; ?>">
</div>
</div>
<div class="col-md-3 col-sm-6">
<div class="form-group">
<label class="n-label">Contrase&ntilde;a</label>
<input id="form_clave" name="form_clave" class="form-control n-form-control" type="text" placeholder="Contrase&ntilde;a" value="<?php echo $registro_clave; ?>">
</div>
</div>
</div>
<div class="row">
<div class="col-md-12 col-sm-12 text-center" style="padding-top: 20px;">
<div class="form-group">
<button id="btn_guardar_datos" type="button" class="btn" style="background: #95cf32; color: white; padding: 4px; font-size: 13px;">Grabar Datos</button>
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
var form_id_paciente = <?php echo $id_paciente; ?>;
var form_telefono = $('#form_telefono').val();
var form_fecha_suscripcion_fin = $('#form_fecha_suscripcion_fin').val();

$.ajax({
type: 'POST',
url: 'config/content.php?negocia_operacion=2&get_nuevo_vendedor=<?php echo $get_nuevo_vendedor; ?>',
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
form_id_banco : form_id_banco,
form_id_paciente : form_id_paciente,
form_telefono : form_telefono,
form_fecha_suscripcion_fin : form_fecha_suscripcion_fin
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
$get_nuevo_vendedor = (int)$_GET['get_nuevo_vendedor'];

//DATOS
if($_SESSION['ID_TIPO_USUARIO'] == 3){
if($get_nuevo_vendedor == 1){
$tipo_usuario = 4;
$maximo_pacientes = '150';
} else {
$tipo_usuario = 1;
$maximo_pacientes = '150';
}
} else {
$tipo_usuario = 2;
$maximo_pacientes = '0';
}

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
$form_instagram = $_POST['form_instagram'];
$form_direccion = $_POST['form_direccion'];
$form_departamento = $_POST['form_departamento'];
$form_provincia = $_POST['form_provincia'];
$form_distrito = $_POST['form_distrito'];
$form_talla = (float)str_replace(' ', '', str_replace(',', '.', $_POST['form_talla']));
$form_peso_meta = (float)str_replace(' ', '', str_replace(',', '.', $_POST['form_peso_meta']));
$form_maximo_pacientes = (int)$_POST['form_maximo_pacientes'];
$form_correo = $_POST['form_correo'];
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
if(empty($form_clave) && !empty($form_id_paciente)){
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

//SI ES PACIENTE
if($tipo_usuario == 2){
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
}
$form_id_medio_pago = $_POST['form_id_medio_pago'];
$form_id_banco = $_POST['form_id_banco'];
$form_id_paciente = (int)$_POST['form_id_paciente'];
$form_telefono = $_POST['form_telefono'];
$form_fecha_suscripcion_fin = date('Y-m-d', strtotime($_POST['form_fecha_suscripcion_fin']));


//AGREGAR A LA BD USUARIO
if(empty($form_id_paciente)){
$suscripcion_nueva = 1;

mysqli_query($con, "
INSERT INTO usuario (id_tipo_usuario, codigo, correo, clave, nombres, apellidos, fecha_nacimiento, genero, estado, activo, id_tipo_documento, numero_documento, date_added, instagram, direccion, distrito, provincia, departamento, residencia, maximo_pacientes, telefono, id_vendedor)
VALUES 
('".$tipo_usuario."', '".$form_codigo."', '".$form_correo."', '".$form_clave."', '".$form_nombres."', '".$form_apellidos."', '".$form_fecha_nacimiento."', '".$form_genero."', '1', '1', '".$form_tipo_documento."', '".$form_numero_documento."', '".date('Y-m-d H:i:s')."', '".$form_instagram."', '".$form_direccion."', '".$form_distrito."', '".$form_provincia."', '".$form_departamento."', '".$form_residencia."', '".$maximo_pacientes."', '".$form_telefono."', '".$_SESSION['ID_USUARIO']."')
"
);

//ULTIMO ID PACIENTE
$row_id = mysqli_fetch_array(mysqli_query($con, "SELECT id FROM usuario WHERE id_tipo_usuario = $tipo_usuario ORDER BY id DESC LIMIT 1"));
$ultimo_id = (int)$row_id[0];

//DATOS DEL CORREO
$query_nombre_programa = mysqli_fetch_array(mysqli_query($con, "SELECT nombre_completo FROM programa WHERE id = '$form_id_programa' LIMIT 1"));
$nombre_programa = $query_nombre_programa[0];

//SI ES PACIENTE CREAR HISTORIA
if($tipo_usuario == 2){
mysqli_query($con, "INSERT INTO historia (id_paciente, alimentos_no_gustar, agua, alcohol, alcohol_frecuencia, evacuacion, dormir, ejercicios, ejercicios_frecuencia, ejercicios_horario, enfermedad, enfermedad_especificar, analisis_sangre, analisis_sangre_especificar, medicamentos, medicamentos_especificar, horario, tiempo, date_added, peso_meta) VALUES ('$ultimo_id', '', '0', '0', '', '0', '0', '0', '', '', '0', '', '0', '', '0', '', '0', '0', '', '')");
}
?>
<script>
$.ajax({
url: 'config/send_private.php?tipo_email=1&email_destino=<?php echo $form_correo; ?>&nombre_paciente=<?php echo $form_nombres; ?>&nombre_programa=<?php echo $nombre_programa; ?>&usuario=<?php echo $form_codigo; ?>&clave=<?php echo $form_clave; ?>&genero=<?php echo $form_genero; ?>&id_tipo_usuario=<?php echo $tipo_usuario; ?>'
});
</script>
<?php
} else {
$suscripcion_nueva = 2;

mysqli_query($con, "UPDATE usuario SET
correo = '".$form_correo."',
nombres = '".$form_nombres."', apellidos = '".$form_apellidos."',
fecha_nacimiento = '".$form_fecha_nacimiento."', genero = '".$form_genero."',
id_tipo_documento = '".$form_tipo_documento."', numero_documento = '".$form_numero_documento."',
instagram = '".$form_instagram."', direccion = '".$form_direccion."', distrito = '".$form_distrito."',
provincia = '".$form_provincia."', departamento = '".$form_departamento."', residencia = '".$form_residencia."',
maximo_pacientes = '".$form_maximo_pacientes."', telefono = '".$form_telefono."'
WHERE id = '$form_id_paciente' AND id_tipo_usuario = $tipo_usuario");

//ACTUALIZAR CLAVE
if(!empty($form_clave) && !empty($form_id_paciente)){
mysqli_query($con, "UPDATE usuario SET
clave = '".$form_clave."'
WHERE id = '$form_id_paciente' AND id_tipo_usuario = $tipo_usuario");
}

$ultimo_id = $form_id_paciente;
}

//SOLO SI ES PACIENTE
if($tipo_usuario == 2){

//RELACIONAR PACIENTE CON NUTRICIONISTA
$query_np = mysqli_query($con, "SELECT * FROM nutricionista_paciente WHERE id_nutricionista = '$form_id_nutricionista' AND id_paciente = '$ultimo_id'");
if(empty(mysqli_num_rows($query_np))){
mysqli_query($con, "INSERT INTO nutricionista_paciente (id_nutricionista, id_paciente) VALUES ('$form_id_nutricionista', '$ultimo_id')");
}


//AGREGAR A LA BD SUSCRIPCION
mysqli_query($con, "
INSERT INTO suscripcion_programa (id_programa, id_nutricionista, id_paciente, fecha_inicio, fecha_fin, estado, indicaciones, id_vendedor, id_paquete, id_tipo_suscripcion, peso_meta)
VALUES 
('".$form_id_programa."', '".$form_id_nutricionista."', '".$ultimo_id."', '".$form_fecha_suscripcion."', '".$form_fecha_suscripcion_fin."',  '1', '', '".$_SESSION['ID_USUARIO']."', '$form_id_paquete', '$suscripcion_nueva', '0')
"
);

//ULTIMO ID SUSCRIPCION
$row_id_s = mysqli_fetch_array(mysqli_query($con, "SELECT id FROM suscripcion_programa WHERE estado = 1 ORDER BY id DESC LIMIT 1"));
$ultimo_id_s = (int)$row_id_s[0];

//AGREGAR A LA BD COBROS
mysqli_query($con, "
INSERT INTO cobro (id_suscripcion, id_paciente, fecha_pago, monto, id_medio_pago, id_cuenta_bancaria, id_vendedor)
VALUES 
('".$ultimo_id_s."', '".$ultimo_id."', '".$form_fecha_pago."', '".$form_monto."', '".$form_id_medio_pago."',  '".$form_id_banco."', '".$_SESSION['ID_USUARIO']."')
"
);

}
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

$get_nuevo_vendedor = (int)$_GET['get_nuevo_vendedor'];
if($_SESSION['ID_TIPO_USUARIO'] == 3){
if($get_nuevo_vendedor == 1){
$txt = 4;
} else {
$txt = 1;
}

} else {
$txt = 2;
}

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
$sql .= " WHERE usuario.activo = 1";
$sql .= " AND usuario.id_tipo_usuario = $txt";
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

//BUSQUEDA PACIENTE
if($negocia_operacion == 5){

$get_nuevo_vendedor = (int)$_GET['get_nuevo_vendedor'];
if($_SESSION['ID_TIPO_USUARIO'] == 3){
if($get_nuevo_vendedor == 1){
$txt = 4;
} else {
$txt = 1;
}

} else {
$txt = 2;
}

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
$sql .= " WHERE usuario.activo = 1";
$sql .= " AND usuario.id_tipo_usuario = $txt";
$sql .= " HAVING 1=1";
if(!empty($filtro_texto_busqueda)){
$sql .= " AND (".$filtro_texto_busqueda.")";
}
$sql .= " ORDER BY usuario.apellidos ASC LIMIT 20";

$result = mysqli_query($con, $sql);

//NUUM ROWS
$num_rows = mysqli_num_rows($result);
if(empty($num_rows)){
if($txt == 1){
echo '<b>El nutricionista no se encuentra registrado.</b>';
} elseif($txt == 2){
echo '<b>El paciente no se encuentra registrado.</b>';
} elseif($txt == 4){
echo '<b>El vendedor no se encuentra registrado.</b>';
}
}
exit();
exit();
}

//GUARDAR NUEVO REGISTRO
if($negocia_operacion == 6){
$form_alimentos_gustar_no = $_POST['form_alimentos_gustar_no'];
$form_agua = $_POST['form_agua'];
$form_alcohol = $_POST['form_alcohol'];
$form_alcohol_frecuencia = $_POST['form_alcohol_frecuencia'];
$form_evacuacion = $_POST['form_evacuacion'];
$form_dormir = $_POST['form_dormir'];
$form_ejercicios = $_POST['form_ejercicios'];
$form_ejercicios_frecuencia = $_POST['form_ejercicios_frecuencia'];
$form_ejercicios_horario = $_POST['form_ejercicios_horario'];
$form_enfermedad = $_POST['form_enfermedad'];
$form_enfermedad_especificar = $_POST['form_enfermedad_especificar'];
$form_analisis_alterado = $_POST['form_analisis_alterado'];
$form_analisis_alterado_especificar = $_POST['form_analisis_alterado_especificar'];
$form_medicamentos = $_POST['form_medicamentos'];
$form_medicamentos_especificar = $_POST['form_medicamentos_especificar'];
$form_horario_comidas = $_POST['form_horario_comidas'];
$form_tiempo = $_POST['form_tiempo'];

//VERIFICAR SI EXISTE HISTORIA CLINICA DEL PACIENTE
$query_id_historia = mysqli_query($con, "SELECT id FROM historia WHERE id_paciente = '".$_SESSION['ID_USUARIO']."' ORDER BY id ASC LIMIT 1");
if(mysqli_num_rows($query_id_historia) > 0){
$row_id_historia = mysqli_fetch_array($query_id_historia);
$id_historia = $row_id_historia[0];
mysqli_query($con, "UPDATE historia SET
alimentos_no_gustar = '".$form_alimentos_gustar_no."',
agua = '".$form_agua."', alcohol = '".$form_alcohol."',
alcohol_frecuencia = '".$form_alcohol_frecuencia."', evacuacion = '".$form_evacuacion."',
dormir = '".$form_dormir."', ejercicios = '".$form_ejercicios."',
ejercicios_frecuencia = '".$form_ejercicios_frecuencia."', ejercicios_horario = '".$form_ejercicios_horario."', enfermedad = '".$form_enfermedad."',
enfermedad_especificar = '".$form_enfermedad_especificar."', analisis_sangre = '".$form_analisis_alterado."', analisis_sangre_especificar = '".$form_analisis_alterado_especificar."',
medicamentos = '".$form_medicamentos."', medicamentos_especificar = '".$form_medicamentos_especificar."', horario = '".$form_horario_comidas."', tiempo = '".$form_tiempo."'
WHERE id = '$id_historia' AND id_paciente = '".$_SESSION['ID_USUARIO']."'");
} else {
mysqli_query($con, "
INSERT INTO historia (id_paciente, alimentos_no_gustar, agua, alcohol, alcohol_frecuencia, evacuacion, dormir, ejercicios, ejercicios_frecuencia, ejercicios_horario, enfermedad, enfermedad_especificar, analisis_sangre, analisis_sangre_especificar, medicamentos, medicamentos_especificar, horario, tiempo, date_added, peso_meta)
VALUES 
('".$_SESSION['ID_USUARIO']."', '".$form_alimentos_gustar_no."', '".$form_agua."', '".$form_alcohol."', '".$form_alcohol_frecuencia."', '".$form_evacuacion."', '".$form_dormir."', '".$form_ejercicios."', '".$form_ejercicios_frecuencia."', '".$form_ejercicios_horario."', '".$form_enfermedad."', '".$form_enfermedad_especificar."', '".$form_analisis_alterado."', '".$form_analisis_alterado_especificar."', '".$form_medicamentos."', '".$form_medicamentos_especificar."', '".$form_horario_comidas."', '".$form_tiempo."', '".date('Y-m-d H:i:s')."', '0')
"
);
}
?>
<script>
location.href = 'historia.php?success';
</script>
<?php
exit();
exit();
}

//EVOLUCION DEL PACIENTE
if($negocia_operacion == 7){

//REQUIRES
require_once(__DIR__.'/datos_bd.php');
require_once(__DIR__.'/funciones.php');

//ID CONSULTAR
$id_registro = (int)$_POST['id'];

//ARRAY FILTROS
$array_filtros = array(2, 0, 2, 0, 1, $id_registro, '', '', '', '', 1, '', '');

//FUNCION
$funcion_datos = consulta($array_filtros);

//CONSULTA
$array_funcion = $funcion_datos[1];
foreach($array_funcion as $row){
$ret_codigo = $row[0];
$ret_nombres = $row[1];
$ret_apellidos = $row[2];
$ret_genero = $row[3];
$ret_fecha_nacimiento = date('d/m/Y', strtotime($row[4]));
$ret_correo = $row[5];
$ret_telefono = $row[6];
$ret_estado = $row[7];
$ret_id_tipo_usuario = $row[8];
$ret_id_usuario = $row[9];
$ret_id_tipo_documento = $row[10];
$ret_numero_documento = $row[11];
$ret_texto_tipo_documento = $row[12];
$texto_genero = $row[13];
$css_color = $row[14];
$texto_estado = $row[15];
$ret_texto_edad = $row[16].' a&ntilde;os';
$ret_date_added = date('d/m/Y', strtotime($row[17]));
$ret_instagram = $row[18];
$ret_direccion = $row[19];
$ret_distrito = $row[20];
$ret_provincia = $row[21];
$ret_departamento = $row[22];
$ret_residencia = $row[23];
$ret_maximo_pacientes = $row[24];
$ret_peso_meta = $row[25];
$ret_peso_actual = $row[26];
$ret_talla_actual = $row[27];
$ret_imc_actual = $row[28];
$ret_edad_en_anos = $row[29];
$ret_edad_en_meses = $row[30];
$diagnostico = $row[31];
}
?>
<div class="row align-items-center">
<div class="col-md-12">
<h4 class="weight-500 mb-10 text-capitalize" style="font-size: 14px; font-weight: bolder;">
MI EVOLUCI&Oacute;N<br><br><div style="color: #111; font-size: 23px; font-weight: normal;"><?php echo ucwords($ret_nombres).' '.ucwords($ret_apellidos); ?></div>
</h4>
<div class="row" style="padding-top: 15px;">
<div class="col-md-12" style="padding-top: 25px;">
<div id="div_plan_paciente">
<?php
$query_suscripcion = mysqli_query($con, "SELECT id, id_programa, fecha_inicio, fecha_fin, estado FROM suscripcion_programa WHERE id_paciente = '$ret_id_usuario' ORDER BY id ASC");
if(mysqli_num_rows($query_suscripcion) > 0){
?>
<div class="table-responsive">
<table style="width: 1000px !important; margin: 0 auto;">
<tr>
<td class="td-title" style="width: 20% !important;">Planes Rekupera</td>
<td class="td-title" style="width: 20% !important;">Fecha Inicio</td>
<td class="td-title" style="width: 20% !important;">Fecha Fin</td>
<td class="td-title" style="width: 20% !important;">Estado</td>
<td class="td-title" style="width: 20% !important;">Acci&oacute;n</td>
</tr>
<?php
while($row_suscripcion = mysqli_fetch_array($query_suscripcion)){
$id_suscripcion = $row_suscripcion[0];
$id_programa = $row_suscripcion[1];
$fecha_inicio = date('d/m/Y', strtotime($row_suscripcion[2]));
$fecha_fin = date('d/m/Y', strtotime($row_suscripcion[3]));
$estado = $row_suscripcion[4];

//NOMBRE DEL PROGRAMA
$row_nombre_programa = mysqli_fetch_array(mysqli_query($con, "SELECT nombre_completo FROM programa WHERE id = '$id_programa' LIMIT 1"));
$nombre_programa = $row_nombre_programa[0];
//SUSCRIPCION ACTIVA
if($estado == 1){
$texto_condicion = 'Activo';
$css_condicion_color = '#95cf32';
} else {
$texto_condicion = 'Culminado';
$css_condicion_color = '#F26C3C';
}
?>
<tr class="tr-hover" style="cursor: pointer;">
<td class="td-content" style="width: 20% !important;"><?php echo $nombre_programa; ?></td>
<td class="td-content" style="width: 20% !important;"><?php echo $fecha_inicio; ?></td>
<td class="td-content" style="width: 20% !important;"><?php echo $fecha_fin; ?></td>
<td class="td-content" style="width: 20% !important; color: <?php echo $css_condicion_color; ?>; font-weight: bold;"><?php echo $texto_condicion; ?></td>
<td class="td-content" style="width: 20% !important; font-weight: bold;"><a href="javascript:void(0)" onclick="location.href = 'controles.php?suscripcion=<?php echo $id_suscripcion ?>'" data-toggle="tooltip" data-placement="top" title="" data-original-title="Ver todos los controles"><i class="fa fa-eye" style="font-size: 13px;"></i></a></td>
</tr>
<?php
}
?>
</table>
</div>
<?php
//OBTENER CONTROLES
$sql_controles = mysqli_query($con, "SELECT DATE_FORMAT(fecha, '%Y-%m-%d'), codigo, id_suscripcion, peso FROM control WHERE id_paciente = '$ret_id_usuario' ORDER BY DATE_FORMAT(fecha, '%Y-%m-%d') ASC");
$array_controles;
$i_controles = 0;
while($row_controles = mysqli_fetch_array($sql_controles)){
$control_fecha = date('d/m/y', strtotime($row_controles[0]));
$control_codigo = $row_controles[1];
$control_id_suscripcion = (int)$row_controles[2];
$control_peso = (float)$row_controles[3];

//OBTENER ID DEL PROGRAMA
$query_suscripcion = mysqli_fetch_array(mysqli_query($con, "SELECT id_programa FROM suscripcion_programa WHERE id = '$control_id_suscripcion' ORDER BY id ASC LIMIT 1"));
$id_programa = (int)$query_suscripcion[0];

//NOMBRE DEL PROGRAMA
$row_nombre_programa = mysqli_fetch_array(mysqli_query($con, "SELECT nombre FROM programa WHERE id = '$id_programa' LIMIT 1"));
$nombre_programa = $row_nombre_programa[0];

$array_controles[$i_controles] = array($control_fecha, $control_codigo, $nombre_programa, $control_peso);
$i_controles++;
}

$max = 0;
foreach($array_controles as $array_valor)
{
if($array_valor[3] > $max){
$max = $array_valor[3];
}
}

$max = $max + 1;
$min = ((float)$ret_peso_meta) - 5;
?>
<div class="row">
<div class="col-md-6 text-center" style="padding-top: 40px;">
<div id="chart1"></div>
<script>
var options = {

//TITULO DEL CHART
title: {
text: 'Evoluci\u00F3n General',
align: 'center',
style: {
fontSize: "16px",
color: '#95cf32'
}
},

//CONFIGURACION DEL CHART
chart: {
height: 350,
type: 'line',
toolbar: {
show: false
}
},

//DATOS EJE X
xaxis: {
categories: [
<?php
foreach($array_controles as $array_valor){
?>
['<?php echo $array_valor[0]; ?>', '<?php echo $array_valor[1]; ?>', '<?php echo $array_valor[2]; ?>'],
<?php
}
?>
],
labels: {
rotate: 0
}
},

//CONFIGURACION EJE Y
yaxis: {
min: <?php echo $min; ?>,
max: <?php echo $max; ?>,
title: {
text: 'PESO (KG)'
}
},

//DATOS EJE Y
series: [
{
name: 'Peso',
data: [
<?php
foreach($array_controles as $array_valor){
?>
<?php echo $array_valor[3]; ?>,
<?php
}
?>
]
}
],

//GRID: Fondo de Malla
grid: {
show: true,
padding: {
left: 10,
right: 10
}
},

//GROSOR DE LINEAS O BARRAS
stroke: {
width: 1,
curve: 'straight'
},

//TIPO DE LINEAS O BARRAS
fill: {
type: 'solid'
},

//TAMAÑO PUNTOS DE RELACION (BOLITAS)
markers: {
size: 3,
colors: ["#95cf32"],
strokeColors: "#95cf32",
strokeWidth: 1,
hover: {
size: 5
}
}
};
var chart = new ApexCharts(document.querySelector('#chart1'), options);
chart.render();
</script>
</div>
<div class="col-md-6 text-center" style="padding-top: 70px;">
<table style="width: 250px; margin: 0 auto; border: 1px solid #95cf32;">
<tr>
<td style="width: 100% !important; text-align: center; background: #95cf32;" colspan="2"><span style="color: #fff; font-size: 16px;">Meta Final</span></td>
</tr>
<tr>
<td style="width: 50% !important; text-align: left; padding-left: 10px;"><span style="color: #111; font-weight: bold; font-size: 13px;">Talla Actual</span></td>
<td style="width: 50% !important; text-align: left; padding-left: 5px;"><span style="color: #111; font-weight: bold; font-size: 13px;">: <?php echo $ret_talla_actual; ?> m</span></td>
</tr>
<tr>
<td style="width: 50% !important; text-align: left; padding-left: 10px;"><span style="color: #111; font-weight: bold; font-size: 13px;">Peso Actual</span></td>
<td style="width: 50% !important; text-align: left; padding-left: 5px;"><span style="color: #111; font-weight: bold; font-size: 13px;">: <?php echo $ret_peso_actual; ?> KG</span></td>
</tr>
<tr>
<td style="width: 50% !important; text-align: left; padding-left: 10px;"><span style="color: #111; font-weight: bold; font-size: 13px;">Peso Meta Final</span></td>
<td style="width: 50% !important; text-align: left; padding-left: 5px;"><span style="color: #111; font-weight: bold; font-size: 13px;">: <?php echo $ret_peso_meta; ?> KG</span></td>
</tr>
<tr>
<td style="width: 50% !important; text-align: left; padding-left: 10px;"><span style="color: #111; font-weight: bold; font-size: 13px;">Plan de acci&oacute;n</span></td>
<td style="width: 50% !important; text-align: left; padding-left: 5px;"><span style="color: #111; font-weight: bold; font-size: 13px;">: Perder <?php echo ($ret_peso_actual - $ret_peso_meta); ?> KG</span></td>
</tr>
<tr>
<td style="width: 50% !important; text-align: left; padding-left: 10px;"><span style="color: #111; font-weight: bold; font-size: 13px;">Diagn&oacute;stico</span></td>
<td style="width: 50% !important; text-align: left; padding-left: 5px;"><span style="color: #111; font-weight: bold; font-size: 13px;">: <?php echo $diagnostico; ?></span></td>
</tr>
</table>
<?php
if($_SESSION['ID_TIPO_USUARIO'] != 2){
?>
<br>
<div class="btn-group">
<button onclick="location.href = 'controles.php?paciente=<?php echo $id_registro ?>'" class="btn buttons-pdf" tabindex="0" type="button" style="background: #95cf32; color: white; padding: 5px; font-size: 14px;"><span>Ver todos los controles</span></button>
</div>
<?php
}
?>
</div>
</div>
<?php
}
?>
</div>
</div>
</div>
</div>
</div>
<?php
exit();
exit();
}

//GUARDAR MEDIDAS
if($negocia_operacion == 8){
$frm_talla_actual = (float)$_POST['frm_talla_actual'];
$frm_peso_actual = (float)$_POST['frm_peso_actual'];
$frm_cuello = (float)$_POST['frm_cuello'];
$frm_brazo = (float)$_POST['frm_brazo'];
$frm_pecho = (float)$_POST['frm_pecho'];
$frm_cintura = (float)$_POST['frm_cintura'];
$frm_gluteo = (float)$_POST['frm_gluteo'];
$frm_muslo = (float)$_POST['frm_muslo'];
$frm_pantorrilla = (float)$_POST['frm_pantorrilla'];
$id_paciente = (int)$_POST['id_paciente'];

//ULTIMA SUSCRIPCION DEL PACIENTE
$row_id_suscripcion = mysqli_fetch_array(mysqli_query($con, "SELECT id, id_nutricionista FROM suscripcion_programa WHERE id_paciente = '$id_paciente' ORDER BY id DESC LIMIT 1"));
$id_suscripcion = (int)$row_id_suscripcion[0];
$id_nutricionista = (int)$row_id_suscripcion[1];

//CODIGO DEL CONTROL
$letra_add = 'C-';
$row_codigo_control = mysqli_fetch_array(mysqli_query($con, "SELECT COUNT(*) FROM control WHERE id_suscripcion = '$id_suscripcion' AND id_paciente = '$id_paciente'"));
$codigo_control = $letra_add.(((int)$row_codigo_control[0]) + 1);

//INSERT INTO
mysqli_query($con, "
INSERT INTO control (codigo, id_suscripcion, id_nutricionista, id_paciente, fecha, talla, peso, cuello, brazo, pecho, cintura, gluteo, muslo, pantorrilla)
VALUES 
('".$codigo_control."', '".$id_suscripcion."', '".$id_nutricionista."', '".$id_paciente."', '".date('Y-m-d H:i:s')."', '".$frm_talla_actual."', '".$frm_peso_actual."', '".$frm_cuello."', '".$frm_brazo."', '".$frm_pecho."', '".$frm_cintura."', '".$frm_gluteo."', '".$frm_muslo."', '".$frm_pantorrilla."')
"
);
?>
<script>
location.href = 'medidas.php?success';
</script>
<?php
exit();
exit();
}

//HISTORIAL DE PLANES POR PACIENTE
if($negocia_operacion == 9){
$id_paciente = (int)$_GET['id_paciente'];
?>
<div class="row">
<div class="col-md-12 text-center">
<button id="btn_pd" onclick="mostrar_pa(1)" type="button" style="border: 1.5px solid #95cf32; color: #95cf32; background: white; font-size: 13px; padding: 4px; font-weight: bold; margin-right: 5px;">
Planes DETOX
</button>
<button id="btn_pa" onclick="mostrar_pa(2)" type="button" style="border: 1.5px solid #95cf32; color: #95cf32; background: white; font-size: 13px; padding: 4px; font-weight: bold; margin-left: 5px;">
Planes de ALIMENTACI&Oacute;N
</button>
</div>
<div class="col-md-12">
<div id="div_pd" style="display: none;">
<div style="text-align: left; margin-bottom: 15px;">
<button onclick="agregar_plan_paciente(<?php echo $id_paciente; ?>, 1, 0)" type="button" class="btn" style="background: #95cf32; color: white; padding: 4px; font-size: 13px;">Crear Nuevo</button>
</div>
<div class="table-responsive">
<table style="width: 100% !important; margin: 0 auto;">
<tr>
<td class="td-title" style="width: 11.11% !important;">N&#176;</td>
<td class="td-title" style="width: 11.11% !important;">Fecha de env&iacute;o</td>
<td class="td-title" style="width: 11.11% !important;">Estado</td>
<td class="td-title" style="width: 11.11% !important;">Acciones</td>
</tr>
<?php
$query_planes_de = mysqli_query($con, "SELECT * FROM plan_alimentacion WHERE tipo_plan = 1 AND id_paciente = '$id_paciente' ORDER BY id ASC");
while($row_pa = mysqli_fetch_array($query_planes_de)){
$codigo_plan_de = $row_pa['codigo'];
$codigo_id_tabla = $row_pa['id'];
$fecha_envio_pd = date('d/m/Y', strtotime($row_pa['fecha_envio']));
$estado_envio = (int)$row_pa['estado'];
if($estado_envio == 1){
$texto_envio = '<span style="color: darkgreen;">Enviado</span>';
} else {
$texto_envio = '<span style="color: red;">Pendiente</span>';
}
?>
<tr class="tr-hover">
<td class="td-content" style="width: 11.11% !important;"><?php echo $codigo_plan_de; ?></td>
<td class="td-content" style="width: 11.11% !important;"><?php echo $fecha_envio_pd; ?></td>
<td class="td-content" style="width: 11.11% !important;"><?php echo $texto_envio; ?></td>
<td class="td-content" style="width: 11.11% !important;">
<button type="button" style="font-size: 15px; background: none; color: orange; padding: 0px; border: none;" onclick="agregar_plan_paciente(<?php echo $id_paciente; ?>, 1, <?php echo $codigo_id_tabla; ?>)">
<svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-box-arrow-down-left" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
<path fill-rule="evenodd" d="M7.364 12.5a.5.5 0 0 0 .5.5H14.5a1.5 1.5 0 0 0 1.5-1.5v-10A1.5 1.5 0 0 0 14.5 0h-10A1.5 1.5 0 0 0 3 1.5v6.636a.5.5 0 1 0 1 0V1.5a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 .5.5v10a.5.5 0 0 1-.5.5H7.864a.5.5 0 0 0-.5.5z"/>
<path fill-rule="evenodd" d="M0 15.5a.5.5 0 0 0 .5.5h5a.5.5 0 0 0 0-1H1.707l8.147-8.146a.5.5 0 0 0-.708-.708L1 14.293V10.5a.5.5 0 0 0-1 0v5z"/>
</svg>
</button>
<button type="button" style="font-size: 15px; background: none; color: red; padding: 0px; border: none;">
<svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-trash" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
<path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
<path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4L4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
</svg>
</button>
<button type="button" style="font-size: 15px; background: none; color: darkblue; padding: 0px; border: none;" onclick="enviar_pa(<?php echo $codigo_id_tabla; ?>)">
<svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-cursor-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
<path fill-rule="evenodd" d="M14.082 2.182a.5.5 0 0 1 .103.557L8.528 15.467a.5.5 0 0 1-.917-.007L5.57 10.694.803 8.652a.5.5 0 0 1-.006-.916l12.728-5.657a.5.5 0 0 1 .556.103z"/>
</svg>
</button>
</td>
</tr>
<?php
}
?>
</table>
</div>
</div>
<div id="div_pa" style="display: none;">
<div style="text-align: left; margin-bottom: 15px;">
<button onclick="agregar_plan_paciente(<?php echo $id_paciente; ?>, 2, 0)" type="button" class="btn" style="background: #95cf32; color: white; padding: 4px; font-size: 13px;">Crear Nuevo</button>
</div>
<div class="table-responsive">
<table style="width: 100% !important; margin: 0 auto;">
<tr>
<td class="td-title" style="width: 11.11% !important;">N&#176;</td>
<td class="td-title" style="width: 11.11% !important;">Fecha de env&iacute;o</td>
<td class="td-title" style="width: 11.11% !important;">Estado</td>
<td class="td-title" style="width: 11.11% !important;">Acciones</td>
</tr>
<?php
$query_planes_da = mysqli_query($con, "SELECT * FROM plan_alimentacion WHERE tipo_plan = 2 AND id_paciente = '$id_paciente' ORDER BY id ASC");
while($row_pa = mysqli_fetch_array($query_planes_da)){
$codigo_plan_de = $row_pa['codigo'];
$codigo_id_tabla = $row_pa['id'];
$fecha_envio_pd = date('d/m/Y', strtotime($row_pa['fecha_envio']));
$estado_envio = (int)$row_pa['estado'];
if($estado_envio == 1){
$texto_envio = '<span style="color: darkgreen;">Enviado</span>';
} else {
$texto_envio = '<span style="color: red;">Pendiente</span>';
}
?>
<tr class="tr-hover">
<td class="td-content" style="width: 11.11% !important;"><?php echo $codigo_plan_de; ?></td>
<td class="td-content" style="width: 11.11% !important;"><?php echo $fecha_envio_pd; ?></td>
<td class="td-content" style="width: 11.11% !important;"><?php echo $texto_envio; ?></td>
<td class="td-content" style="width: 11.11% !important;">
<button type="button" style="font-size: 15px; background: none; color: orange; padding: 0px; border: none;" onclick="agregar_plan_paciente(<?php echo $id_paciente; ?>, 2, <?php echo $codigo_id_tabla; ?>)">
<svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-box-arrow-down-left" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
<path fill-rule="evenodd" d="M7.364 12.5a.5.5 0 0 0 .5.5H14.5a1.5 1.5 0 0 0 1.5-1.5v-10A1.5 1.5 0 0 0 14.5 0h-10A1.5 1.5 0 0 0 3 1.5v6.636a.5.5 0 1 0 1 0V1.5a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 .5.5v10a.5.5 0 0 1-.5.5H7.864a.5.5 0 0 0-.5.5z"/>
<path fill-rule="evenodd" d="M0 15.5a.5.5 0 0 0 .5.5h5a.5.5 0 0 0 0-1H1.707l8.147-8.146a.5.5 0 0 0-.708-.708L1 14.293V10.5a.5.5 0 0 0-1 0v5z"/>
</svg>
</button>
<button type="button" style="font-size: 15px; background: none; color: red; padding: 0px; border: none;">
<svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-trash" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
<path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
<path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4L4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
</svg>
</button>
<button type="button" style="font-size: 15px; background: none; color: darkblue; padding: 0px; border: none;" onclick="enviar_pa(<?php echo $codigo_id_tabla; ?>)">
<svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-cursor-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
<path fill-rule="evenodd" d="M14.082 2.182a.5.5 0 0 1 .103.557L8.528 15.467a.5.5 0 0 1-.917-.007L5.57 10.694.803 8.652a.5.5 0 0 1-.006-.916l12.728-5.657a.5.5 0 0 1 .556.103z"/>
</svg>
</button>
</td>
</tr>
<?php
}
?>
</table>
</div>
</div>
</div>
<script>
//MOSTRAR PLAN DE ALIMENTACION
function mostrar_pa(id){
if(id == 1){
$('#div_pd').css('display', 'block');
$('#div_pa').css('display', 'none');

$('#btn_pd').css('background', '#95cf32');
$('#btn_pd').css('color', 'white');

$('#btn_pa').css('background', 'white');
$('#btn_pa').css('color', '#95cf32');
} else {
$('#div_pd').css('display', 'none');
$('#div_pa').css('display', 'block');

$('#btn_pd').css('background', 'white');
$('#btn_pd').css('color', '#95cf32');

$('#btn_pa').css('background', '#95cf32');
$('#btn_pa').css('color', 'white');
}
}

//PLANES DETOX / ALIMENTACION
function agregar_plan_paciente(id_paciente, id_plan, id_tabla){
$.ajax({
type: 'POST',
url: 'config/ajax.php?negocia_operacion=3&id_paciente='+id_paciente+'&id_plan='+id_plan+'&id_tabla='+id_tabla,
success: function(datos){
$('#div_plan_paciente').html(datos).fadeIn('slow');
}
});
}

//ENVIAR PLAN DA CORREO
function enviar_pa(id){
$.ajax({
url: 'config/send_pa.php?id='+id
});
}
</script>
</div>
<?php
exit();
exit();
}

//GUARDAR PLAN DE ALIMENTACION
if($negocia_operacion == 10){

//DATOS GET
$id_paciente = (int)$_POST['id_paciente'];
$id_plan = (int)$_POST['id_plan'];
$id_tabla = (int)$_POST['id_tabla'];

if($id_plan == 1){
$letra_add = 'PD-';
} else {
$letra_add = 'PA-';
}

//SI ES NUEVO O SI ESTÁ EDITANDO
if(empty($id_tabla)){

//CODIGO DEL PA
$row_codigo_registro = mysqli_fetch_array(mysqli_query($con, "SELECT codigo FROM plan_alimentacion WHERE tipo_plan = '$id_plan' AND id_paciente = '$id_paciente' ORDER BY id DESC LIMIT 1"));
$codigo_registro = $letra_add.(((int)substr($row_codigo_registro[0], 2, 100)) + 1);
} else {

//CODIGO DEL PA
$row_codigo_registro = mysqli_fetch_array(mysqli_query($con, "SELECT codigo FROM plan_alimentacion WHERE id = '$id_tabla' ORDER BY id DESC LIMIT 1"));
$codigo_registro = $letra_add.(((int)substr($row_codigo_registro[0], 2, 100)) + 1);
}

$fp_title_1 = $_POST['fp_title_1'];
$fp_title_2 = $_POST['fp_title_2'];
$fp_title_3 = $_POST['fp_title_3'];
$id_fecha_pa = $_POST['id_fecha_pa'];
$fp_hora_desayuno = $_POST['fp_hora_desayuno'];
$fp_uno_opcion_1_desayuno = $_POST['fp_uno_opcion_1_desayuno'];
$fp_uno_opcion_2_desayuno = $_POST['fp_uno_opcion_2_desayuno'];
$fp_dos_opcion_1_desayuno = $_POST['fp_dos_opcion_1_desayuno'];
$fp_dos_opcion_2_desayuno = $_POST['fp_dos_opcion_2_desayuno'];
$fp_hora_media_manana = $_POST['fp_hora_media_manana'];
$fp_uno_opcion_1_media_manana = $_POST['fp_uno_opcion_1_media_manana'];
$fp_dos_opcion_1_media_manana = $_POST['fp_dos_opcion_1_media_manana'];
$fp_hora_almuerzo = $_POST['fp_hora_almuerzo'];
$fp_uno_opcion_1_almuerzo = $_POST['fp_uno_opcion_1_almuerzo'];
$fp_uno_opcion_2_almuerzo = $_POST['fp_uno_opcion_2_almuerzo'];
$fp_dos_opcion_1_almuerzo = $_POST['fp_dos_opcion_1_almuerzo'];
$fp_dos_opcion_2_almuerzo = $_POST['fp_dos_opcion_2_almuerzo'];
$fp_hora_media_tarde = $_POST['fp_hora_media_tarde'];
$fp_uno_opcion_1_media_tarde = $_POST['fp_uno_opcion_1_media_tarde'];
$fp_dos_opcion_1_media_tarde = $_POST['fp_dos_opcion_1_media_tarde'];
$fp_hora_cena = $_POST['fp_hora_cena'];
$fp_uno_opcion_1_cena = $_POST['fp_uno_opcion_1_cena'];
$fp_uno_opcion_2_cena = $_POST['fp_uno_opcion_2_cena'];
$fp_dos_opcion_1_cena = $_POST['fp_dos_opcion_1_cena'];
$fp_dos_opcion_2_cena = $_POST['fp_dos_opcion_2_cena'];

//INSERT INTO - UPDATE
if(empty($id_tabla)){
mysqli_query($con, "
INSERT INTO plan_alimentacion (tipo_plan, codigo, id_suscripcion, id_control, id_paciente, fecha_envio, date_added, hora_desayuno, hora_media_manana, hora_almuerzo, hora_media_tarde, hora_cena, horario_1, horario_2, 1_opcion_1_desayuno, 1_opcion_2_desayuno, 1_opcion_1_media_manana, 1_opcion_2_media_manana, 1_opcion_1_almuerzo, 1_opcion_2_almuerzo, 1_opcion_1_media_tarde, 1_opcion_2_media_tarde, 1_opcion_1_cena, 1_opcion_2_cena, 2_opcion_1_desayuno, 2_opcion_2_desayuno, 2_opcion_1_media_manana, 2_opcion_2_media_manana, 2_opcion_1_almuerzo, 2_opcion_2_almuerzo, 2_opcion_1_media_tarde, 2_opcion_2_media_tarde, 2_opcion_1_cena, 2_opcion_2_cena)
VALUES 
('".$id_plan."', '".$codigo_registro."', '', '', '".$id_paciente."', '".$id_fecha_pa."', '".date('Y-m-d')."', '".$fp_hora_desayuno."', '".$fp_hora_media_manana."', '".$fp_hora_almuerzo."', '".$fp_hora_media_tarde."', '".$fp_hora_cena."', '".$fp_title_2."', '".$fp_title_3."', '".$fp_uno_opcion_1_desayuno."', '".$fp_uno_opcion_2_desayuno."', '".$fp_uno_opcion_1_media_manana."', '".$fp_uno_opcion_2_media_manana."', '".$fp_uno_opcion_1_almuerzo."', '".$fp_uno_opcion_2_almuerzo."', '".$fp_uno_opcion_1_media_tarde."', '".$fp_uno_opcion_2_media_tarde."', '".$fp_uno_opcion_1_cena."', '".$fp_uno_opcion_2_cena."', '".$fp_dos_opcion_1_desayuno."', '".$fp_dos_opcion_2_desayuno."', '".$fp_dos_opcion_1_media_manana."', '".$fp_dos_opcion_2_media_manana."', '".$fp_dos_opcion_1_almuerzo."', '".$fp_dos_opcion_2_almuerzo."', '".$fp_dos_opcion_1_media_tarde."', '".$fp_dos_opcion_2_media_tarde."', '".$fp_dos_opcion_1_cena."', '".$fp_dos_opcion_2_cena."')
"
);
} else {
mysqli_query($con, "
UPDATE plan_alimentacion SET fecha_envio = '".$id_fecha_pa."', hora_desayuno = '".$fp_hora_desayuno."', 
hora_media_manana = '".$fp_hora_media_manana."', hora_almuerzo = '".$fp_hora_almuerzo."', hora_media_tarde = '".$fp_hora_media_tarde."',
hora_cena = '".$fp_hora_cena."', horario_1 = '".$fp_title_2."', horario_2 = '".$fp_title_3."', 1_opcion_1_desayuno = '".$fp_uno_opcion_1_desayuno."', 1_opcion_2_desayuno = '".$fp_uno_opcion_2_desayuno."',
1_opcion_1_media_manana = '".$fp_uno_opcion_1_media_manana."', 1_opcion_2_media_manana = '".$fp_uno_opcion_2_media_manana."', 1_opcion_1_almuerzo = '".$fp_uno_opcion_1_almuerzo."',
1_opcion_2_almuerzo = '".$fp_uno_opcion_2_almuerzo."', 1_opcion_1_media_tarde = '".$fp_uno_opcion_1_media_tarde."', 1_opcion_2_media_tarde = '".$fp_uno_opcion_2_media_tarde."',
1_opcion_1_cena = '".$fp_uno_opcion_1_cena."', 1_opcion_2_cena = '".$fp_uno_opcion_2_cena."', 2_opcion_1_desayuno = '".$fp_dos_opcion_1_desayuno."',
2_opcion_2_desayuno = '".$fp_dos_opcion_2_desayuno."', 2_opcion_1_media_manana = '".$fp_dos_opcion_1_media_manana."', 2_opcion_2_media_manana = '".$fp_dos_opcion_2_media_manana."',
2_opcion_1_almuerzo = '".$fp_dos_opcion_1_almuerzo."', 2_opcion_2_almuerzo = '".$fp_dos_opcion_2_almuerzo."', 2_opcion_1_media_tarde = '".$fp_dos_opcion_1_media_tarde."',
2_opcion_2_media_tarde = '".$fp_dos_opcion_2_media_tarde."', 2_opcion_1_cena = '".$fp_dos_opcion_1_cena."', 2_opcion_2_cena = '".$fp_dos_opcion_2_cena."'
WHERE id = '$id_tabla' AND id_paciente = '$id_paciente'
"
);
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
<div class="col-md-8">
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
if(isset($_GET['mail'])){
?>
<script>
swal(
{
title: 'Recordatorio enviado correctamente!',
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
</div>
</div>
</div>
<?php

//VISTA NUTRICIONISTA
if($_SESSION['ID_TIPO_USUARIO'] == 1){

//PORCENTAJE UNO
if(empty($_SESSION['usuario_maximo_pacientes'])){
$porcentaje_uno = 0;
$mostrar_uno = '0/0';
} else {
$porcentaje_uno = round(($_SESSION['usuario_total_pacientes'] / $_SESSION['usuario_maximo_pacientes']), 2) * 100;
$mostrar_uno = $_SESSION['usuario_total_pacientes'].'/'.$_SESSION['usuario_maximo_pacientes'];
}

//PORCENTAJE DOS
if(empty($_SESSION['usuario_total_pacientes'])){
$porcentaje_dos = 0;
$mostrar_dos = '0/0';
} else {
$porcentaje_dos = round(($_SESSION['usuario_total_pacientes_activos'] / $_SESSION['usuario_total_pacientes']), 2) * 100;
$mostrar_dos = $_SESSION['usuario_total_pacientes_activos'].'/'.$_SESSION['usuario_total_pacientes'];
}

//PORCENTAJE TRES
if(empty($_SESSION['usuario_total_pacientes'])){
$porcentaje_tres = 0;
$mostrar_tres = '0/0';
} else {
$porcentaje_tres = round(($_SESSION['usuario_total_pacientes_inactivos'] / $_SESSION['usuario_total_pacientes']), 2) * 100;
$mostrar_tres = $_SESSION['usuario_total_pacientes_inactivos'].'/'.$_SESSION['usuario_total_pacientes'];
}

//PORCENTAJE CUATRO
if(empty($_SESSION['total_controles'])){
$porcentaje_cuatro = 0;
$mostrar_cuatro = '0/0';
} else {
$porcentaje_cuatro = round(($_SESSION['usuario_controles_realizados'] / $_SESSION['total_controles']), 2) * 100;
$mostrar_cuatro = $_SESSION['usuario_controles_realizados'].'/'.$_SESSION['total_controles'];
}
?>
<div class="row">
<div class="col-xl-3 mb-30">
<div class="card-box height-100-p widget-style1">
<div class="d-flex flex-wrap align-items-center">
<div class="progress-data">
<div id="chart"></div>
</div>
<div class="widget-data">
<div class="h4 mb-0"><?php echo $mostrar_uno; ?></div>
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
<div class="col-xl-3 mb-30">
<div class="card-box height-100-p widget-style1">
<div class="d-flex flex-wrap align-items-center">
<div class="progress-data">
<div id="chart2"></div>
</div>
<div class="widget-data">
<div class="h4 mb-0"><?php echo $mostrar_dos; ?></div>
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
<div class="col-xl-3 mb-30">
<div class="card-box height-100-p widget-style1">
<div class="d-flex flex-wrap align-items-center">
<div class="progress-data">
<div id="chart3"></div>
</div>
<div class="widget-data">
<div class="h4 mb-0"><?php echo $mostrar_tres; ?></div>
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
<div class="col-xl-3 mb-30">
<div class="card-box height-100-p widget-style1">
<div class="d-flex flex-wrap align-items-center">
<div class="progress-data">
<div id="chart4"></div>
</div>
<div class="widget-data">
<div class="h4 mb-0"><?php echo $mostrar_cuatro; ?></div>
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

//VISTA PACIENTE
if($_SESSION['ID_TIPO_USUARIO'] == 2){

//PORCENTAJE UNO
if(empty($_SESSION['usuario_maximo_suscripciones'])){
$porcentaje_uno = 0;
$mostrar_uno = '0/0';
} else {
$porcentaje_uno = round(($_SESSION['usuario_total_suscripciones'] / $_SESSION['usuario_maximo_suscripciones']), 2) * 100;
$mostrar_uno = $_SESSION['usuario_total_suscripciones'].'/'.$_SESSION['usuario_maximo_suscripciones'];
}

//PORCENTAJE DOS
if(empty($_SESSION['total_controles'])){
$porcentaje_dos = 0;
$mostrar_dos = '0/0';
} else {
$porcentaje_dos = round(($_SESSION['usuario_controles_realizados'] / $_SESSION['total_controles']), 2) * 100;
$mostrar_dos = $_SESSION['usuario_controles_realizados'].'/'.$_SESSION['total_controles'];
}
?>
<div class="row">
<div class="col-xl-6 mb-30">
<div class="card-box height-100-p widget-style1">
<div class="d-flex flex-wrap align-items-center">
<div class="progress-data">
<div id="chart"></div>
</div>
<div class="widget-data">
<div class="h4 mb-0"><?php echo $mostrar_uno; ?></div>
<div class="weight-600 font-14">Suscripciones</div>
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
<div class="col-xl-6 mb-30">
<div class="card-box height-100-p widget-style1">
<div class="d-flex flex-wrap align-items-center">
<div class="progress-data">
<div id="chart2"></div>
</div>
<div class="widget-data">
<div class="h4 mb-0"><?php echo $mostrar_dos; ?></div>
<div class="weight-600 font-14">Controles Realizados</div>
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
</div>
<?php
}

//VISTA ADMINISTRADOR
if($_SESSION['ID_TIPO_USUARIO'] == 3){

//PORCENTAJE UNO
if(empty($_SESSION['admin_maximo_pacientes'])){
$porcentaje_uno = 0;
$mostrar_uno = '0/0';
} else {
$porcentaje_uno = round(($_SESSION['admin_total_pacientes'] / $_SESSION['admin_maximo_pacientes']), 2) * 100;
$mostrar_uno = $_SESSION['admin_total_pacientes'].'/'.$_SESSION['admin_maximo_pacientes'];
}

//PORCENTAJE DOS
if(empty($_SESSION['admin_total_pacientes'])){
$porcentaje_dos = 0;
$mostrar_dos = '0/0';
} else {
$porcentaje_dos = round(($_SESSION['admin_total_pacientes_activos'] / $_SESSION['admin_total_pacientes']), 2) * 100;
$mostrar_dos = $_SESSION['admin_total_pacientes_activos'].'/'.$_SESSION['admin_total_pacientes'];
}

//PORCENTAJE TRES
if(empty($_SESSION['admin_total_pacientes'])){
$porcentaje_tres = 0;
$mostrar_tres = '0/0';
} else {
$porcentaje_tres = round(($_SESSION['admin_total_pacientes_inactivos'] / $_SESSION['admin_total_pacientes']), 2) * 100;
$mostrar_tres = $_SESSION['admin_total_pacientes_inactivos'].'/'.$_SESSION['admin_total_pacientes'];
}

//PORCENTAJE CUATRO
if(empty($_SESSION['admin_maximo_nutricionistas'])){
$porcentaje_cuatro = 0;
$mostrar_cuatro = '0/0';
} else {
$porcentaje_cuatro = round(($_SESSION['admin_total_nutricionistas'] / $_SESSION['admin_maximo_nutricionistas']), 2) * 100;
$mostrar_cuatro = $_SESSION['admin_total_nutricionistas'].'/'.$_SESSION['admin_maximo_nutricionistas'];
}

//PORCENTAJE CINCO
if(empty($_SESSION['admin_maximo_vendedores'])){
$porcentaje_cinco = 0;
$mostrar_cinco = '0/0';
} else {
$porcentaje_cinco = round(($_SESSION['admin_total_vendedores'] / $_SESSION['admin_maximo_vendedores']), 2) * 100;
$mostrar_cinco = $_SESSION['admin_total_vendedores'].'/'.$_SESSION['admin_maximo_vendedores'];
}
?>
<div class="row">
<div class="col-xl-3 mb-30">
<div class="card-box height-100-p widget-style1">
<div class="d-flex flex-wrap align-items-center">
<div class="progress-data">
<div id="chart"></div>
</div>
<div class="widget-data">
<div class="h4 mb-0"><?php echo $mostrar_uno; ?></div>
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
<div class="col-xl-3 mb-30">
<div class="card-box height-100-p widget-style1">
<div class="d-flex flex-wrap align-items-center">
<div class="progress-data">
<div id="chart2"></div>
</div>
<div class="widget-data">
<div class="h4 mb-0"><?php echo $mostrar_dos; ?></div>
<div class="weight-600 font-14">Pac. Activos</div>
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
<div class="col-xl-3 mb-30">
<div class="card-box height-100-p widget-style1">
<div class="d-flex flex-wrap align-items-center">
<div class="progress-data">
<div id="chart3"></div>
</div>
<div class="widget-data">
<div class="h4 mb-0"><?php echo $mostrar_tres; ?></div>
<div class="weight-600 font-14">Pac. Inactivos</div>
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
<div class="col-xl-3 mb-30">
<div class="card-box height-100-p widget-style1">
<div class="d-flex flex-wrap align-items-center">
<div class="progress-data">
<div id="chart4"></div>
</div>
<div class="widget-data">
<div class="h4 mb-0"><?php echo $mostrar_cuatro; ?></div>
<div class="weight-600 font-14">Nutricionistas</div>
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
<div class="col-xl-3 mb-30">
<div class="card-box height-100-p widget-style1">
<div class="d-flex flex-wrap align-items-center">
<div class="progress-data">
<div id="chart5"></div>
</div>
<div class="widget-data">
<div class="h4 mb-0"><?php echo $mostrar_cinco; ?></div>
<div class="weight-600 font-14">Vendedores</div>
</div>
</div>
</div>
<script>
var options = {
series: [<?php echo $porcentaje_cinco; ?>],
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

var chart = new ApexCharts(document.querySelector("#chart5"), options);
chart.render();
</script>
</div>
</div>
<?php
}

//VISTA VENDEDOR
if($_SESSION['ID_TIPO_USUARIO'] == 4){

//PORCENTAJE UNO
if(empty($_SESSION['usuario_maximo_pacientes'])){
$porcentaje_uno = 0;
$mostrar_uno = '0/0';
} else {
$porcentaje_uno = round(($_SESSION['usuario_total_suscripciones'] / $_SESSION['usuario_maximo_pacientes']), 2) * 100;
$mostrar_uno = $_SESSION['usuario_total_suscripciones'].'/'.$_SESSION['usuario_maximo_pacientes'];
}

//PORCENTAJE DOS
if(empty($_SESSION['usuario_total_suscripciones'])){
$porcentaje_dos = 0;
$mostrar_dos = '0/0';
} else {
$porcentaje_dos = round(($_SESSION['usuario_total_suscripciones_nuevas'] / $_SESSION['usuario_total_suscripciones']), 2) * 100;
$mostrar_dos = $_SESSION['usuario_total_suscripciones_nuevas'].'/'.$_SESSION['usuario_total_suscripciones'];
}

//PORCENTAJE TRES
if(empty($_SESSION['usuario_total_suscripciones'])){
$porcentaje_tres = 0;
$mostrar_tres = '0/0';
} else {
$porcentaje_tres = round(($_SESSION['usuario_total_suscripciones_renovadas'] / $_SESSION['usuario_total_suscripciones']), 2) * 100;
$mostrar_tres = $_SESSION['usuario_total_suscripciones_renovadas'].'/'.$_SESSION['usuario_total_suscripciones'];
}
?>
<div class="row">
<div class="col-xl-4 mb-30">
<div class="card-box height-100-p widget-style1">
<div class="d-flex flex-wrap align-items-center">
<div class="progress-data">
<div id="chart"></div>
</div>
<div class="widget-data">
<div class="h4 mb-0"><?php echo $mostrar_uno; ?></div>
<div class="weight-600 font-14">Total Membres&iacute;as</div>
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
<div class="col-xl-4 mb-30">
<div class="card-box height-100-p widget-style1">
<div class="d-flex flex-wrap align-items-center">
<div class="progress-data">
<div id="chart2"></div>
</div>
<div class="widget-data">
<div class="h4 mb-0"><?php echo $mostrar_dos; ?></div>
<div class="weight-600 font-14">Membres&iacute;as Nuevas</div>
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
<div class="col-xl-4 mb-30">
<div class="card-box height-100-p widget-style1">
<div class="d-flex flex-wrap align-items-center">
<div class="progress-data">
<div id="chart3"></div>
</div>
<div class="widget-data">
<div class="h4 mb-0"><?php echo $mostrar_tres; ?></div>
<div class="weight-600 font-14">Membres&iacute;as Renovaci&oacute;n</div>
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
<?php
$query_por_vencer = mysqli_query($con, 
"
(
SELECT '1' AS TIPO_SQL,
id AS ID_SUSCRIPCION,
id_programa AS ID_PROGRAMA,
id_nutricionista AS ID_NUTRICIONISTA,
id_paciente AS ID_PACIENTE,
fecha_inicio AS FECHA_INICIO,
fecha_fin AS FECHA_FIN,
estado AS ESTADO,
id_vendedor AS ID_VENDEDOR,
id_paquete AS ID_PAQUETE,
id_tipo_suscripcion AS ID_TIPO_SUSCRIPCION
FROM suscripcion_programa 
WHERE id_vendedor = '".$_SESSION['ID_USUARIO']."'
AND DATE_FORMAT(fecha_fin, '%Y-%m-%d') BETWEEN DATE_FORMAT(CURDATE(), '%Y-%m-%d') AND DATE_ADD(CURDATE(), INTERVAL 3 DAY)
ORDER BY DATE_FORMAT(fecha_fin, '%Y-%m-%d') ASC
)
UNION ALL
(
SELECT '2' AS TIPO_SQL,
id AS ID_SUSCRIPCION,
id_programa AS ID_PROGRAMA,
id_nutricionista AS ID_NUTRICIONISTA,
id_paciente AS ID_PACIENTE,
fecha_inicio AS FECHA_INICIO,
fecha_fin AS FECHA_FIN,
estado AS ESTADO,
id_vendedor AS ID_VENDEDOR,
id_paquete AS ID_PAQUETE,
id_tipo_suscripcion AS ID_TIPO_SUSCRIPCION
FROM suscripcion_programa 
WHERE id_vendedor = '".$_SESSION['ID_USUARIO']."'
AND DATE_FORMAT(fecha_fin, '%Y-%m-%d') BETWEEN DATE_SUB(CURDATE(), INTERVAL 3 DAY) AND DATE_FORMAT(CURDATE(), '%Y-%m-%d')
ORDER BY DATE_FORMAT(fecha_fin, '%Y-%m-%d') ASC
)
"
);
if(mysqli_num_rows($query_por_vencer) > 0){
?>
<div class="col-xl-12 mb-30">
<div style="font-size: 20px; width: 100%; font-weight: bold; color: white; padding-left: 25px; background: rgba(242, 108, 60, 1); padding-top: 20px; padding-bottom: 20px; border-top-left-radius: 8px; border-top-right-radius: 8px;">
<i class="icon-copy dw dw-notification" style="font-size: 18px; font-weight: bolder;"></i>
Alertas!
</div>
<div class="card-box height-100-p widget-style1">
<div class="d-flex flex-wrap align-items-center" style="padding-top: 20px;">
<ul>
<?php
while($row_por_vencer = mysqli_fetch_array($query_por_vencer)){
$tipo_sql = $row_por_vencer[0];
if($tipo_sql == 1){
$mostrar_verbo = 'vence';
$css_estado = 'color: #111;';
} else {
$mostrar_verbo = 'venci&oacute;';
$css_estado = 'color: #F26C3C; font-weight: bolder;';
}
$id = $row_por_vencer[1];
$id_programa = $row_por_vencer[2];
$id_nutricionista = $row_por_vencer[3];
$id_paciente = $row_por_vencer[4];
$row_datos_paciente = mysqli_fetch_array(mysqli_query($con, "SELECT codigo, nombres, apellidos FROM usuario WHERE id = '$id_paciente' LIMIT 1"));
$mostrar_paciente = $row_datos_paciente[1].' '.$row_datos_paciente[2].' ('.$row_datos_paciente[0].')';
$fecha_inicio = $row_por_vencer[5];
$fecha_fin = date('d/m/Y', strtotime($row_por_vencer[6]));
$estado = $row_por_vencer[7];
$id_vendedor = $row_por_vencer[8];
$id_paquete = $row_por_vencer[9];
$id_tipo_suscripcion = $row_por_vencer[10];
?>
<li style="font-size: 13px; width: 100%; margin-bottom: 15px; font-weight: bold; padding-left: 25px; <?php echo $css_estado; ?>">
<span style="font-size: 12px; font-weight: bolder;" class="dw dw-logout"></span>&nbsp;&nbsp;
La membres&iacute;a de <?php echo $mostrar_paciente; ?> <?php echo $mostrar_verbo; ?> el <?php echo $fecha_fin; ?>.
<?php
if($tipo_sql == 1){
?>
&nbsp;&nbsp;&nbsp;<button id="btn_enviar_email_<?php echo $id; ?>" type="button" class="btn" style="background: #F26C3C; color: white; padding: 4px; font-size: 11px;">Enviar recordatorio</button>
<script>
$('#btn_enviar_email_<?php echo $id; ?>').on('click', function(){
$.ajax({
url: 'config/send_private.php?tipo_email=2&email_destino=luispurizaca.1908@gmail.com&nombre_paciente=Luis&nombre_programa=<?php echo $nombre_programa; ?>&usuario=<?php echo $form_codigo; ?>&clave=<?php echo $form_clave; ?>&genero=<?php echo $form_genero; ?>'
});
location.href='index.php?mail';
});
</script>
<?php
}
?>
</li>
<?php
}
?>
</ul>
</div>
</div>
</div>
<?php
}
?>
</div>
<?php
}
}
if($view_controller == 2 || $view_controller == 4 || $view_controller == 5 || $view_controller == 6 || $view_controller == 7 || $view_controller == 10 || $view_controller == 15){
?>
<div class="card-box mb-30">
<div class="card-box pd-20 height-100-p mb-30">
<div id="resultado" class="row align-items-center"></div>
</div>
<div class="pb-20" style="padding-left: 20px; padding-right: 20px; padding-top: 20px;">
<?php
if($view_controller == 4){
if($ver_pacientes == 1){
$texto_diario = 'Vencen hoy';
$texto_semanal = 'Vencen &eacute;sta semana';
$texto_mensual = 'Vencen &eacute;ste mes';
$texto_anual = 'Vencen &eacute;ste a&ntilde;o';
} else {
$texto_diario = 'Ventas del d&iacute;a';
$texto_semanal = 'Ventas de la semana';
$texto_mensual = 'Ventas del mes';
$texto_anual = 'Ventas del a&ntilde;o';
}
?>
<div class="modal fade" id="modalFechas">
<div class="modal-dialog modal-dialog-centered" role="document" style="margin-top: 0; margin-bottom: 2px;">
<div class="modal-content">
<div class="modal-body">
<button type="button" class="close" data-dismiss="modal" aria-label="Close">
<span aria-hidden="true">&times;</span>
</button>
<div class="row">
<div class="col-lg-3 col-md-3 col-sm-3 col-xs-2"></div>
<div class="col-lg-6 col-md-6 col-sm-6 col-xs-8">
<table style="width: 100%; border: 0; padding: 0;" cellpadding="5" cellspacing="0" border="0">
<tr>
<td style="width: 50%; padding: 10px; vertical-align: middle;">
<label class="control-label" style="font-weight: normal; font-size: 9.5pt; margin-bottom: 5pt;">Desde:</label>
<input type="date" style="height: 25px; font-size: 8pt; padding: 0; padding-left: 10px; font-weight: normal;" class="form-control input-sm" id="n_fecha_desde" placeholder="Desde">
</td>
<td style="width: 50%; padding: 10px; vertical-align: middle;">
<label class="control-label" style="font-weight: normal; font-size: 9.5pt; margin-bottom: 5pt;">Hasta:</label>
<input type="date" style="height: 25px; font-size: 8pt; padding: 0; padding-left: 10px; font-weight: normal;" class="form-control input-sm" id="n_fecha_hasta" placeholder="Hasta">
</td>
</tr>
<tr>
<td colspan="2" style="width: 100%; padding: 10px; vertical-align: middle; text-align: center;">
<button id="btn_consultar_fechas" type="button" class="btn" style="background: #95cf32; color: white; padding: 4px; font-size: 12px;"><i class="fa fa-search"></i>&nbsp;&nbsp;CONSULTAR</button>
</td>
</tr>
</table>
</div>
<div class="col-lg-3 col-md-3 col-sm-3 col-xs-2"></div>
</div>
</div>
</div>
</div>
</div>
<nav class="text-center">
<ul>
<li style="display: inline-block;">
<button type="button" id="filtro_diario" onclick="filtro_fechas(1)" title="Hoy" style="border: none; padding: 5px; font-size: 12px; background: #95cf32; color: white; outline: none;"><?php echo $texto_diario; ?></button>
</li>
<li style="display: inline-block;">
<button type="button" id="filtro_semanal" onclick="filtro_fechas(2)" title="Esta Semana" style="border: none; padding: 5px; font-size: 12px; background: #95cf32; color: white; outline: none;"><?php echo $texto_semanal; ?></button>
</li>
<li style="display: inline-block;">
<button type="button" id="filtro_mensual" onclick="filtro_fechas(3)" title="Este Mes" style="border: none; padding: 5px; font-size: 12px; background: #818181; color: white; outline: none;"><?php echo $texto_mensual; ?></button>
</li>
<li style="display: inline-block;">
<button type="button" id="filtro_anual" onclick="filtro_fechas(4)" title="Este Año" style="border: none; padding: 5px; font-size: 12px; background: #95cf32; color: white; outline: none;"><?php echo $texto_anual; ?></button>
</li>
<li style="display: inline-block; margin-left: 10px;">
<button type="button" class="btn btn_modal_fechas_dashboard" title="Rango de Fechas" style="border: none; font-size: 23px; background: transparent; padding: 0; color: #818181; outline: none;"><i class="fa fa-calendar"></i></button>
<script>
//FILTROS DE FECHAS
function filtro_fechas(id){
$('#filtro_diario').css('background', '#95cf32');
$('#filtro_semanal').css('background', '#95cf32');
$('#filtro_mensual').css('background', '#95cf32');
$('#filtro_anual').css('background', '#95cf32');
if(id == 1){
$('#n_fecha_desde').val('<?php echo date('Y-m-d'); ?>');
$('#n_fecha_hasta').val('<?php echo date('Y-m-d'); ?>');
$('#filtro_diario').css('background', '#818181');
} else if(id == 2){
$('#n_fecha_desde').val('<?php echo date('Y-m-d', strtotime('last Monday', strtotime(date('Y-m-d')))); ?>');
$('#n_fecha_hasta').val('<?php echo date('Y-m-d', strtotime('next Sunday', strtotime(date('Y-m-d')))); ?>');
$('#filtro_semanal').css('background', '#818181');
} else if(id == 3){
$('#n_fecha_desde').val('<?php echo date('Y-m-d', strtotime('first day of this month', strtotime(date('Y-m-d')))); ?>');
$('#n_fecha_hasta').val('<?php echo date('Y-m-d', strtotime('last day of this month', strtotime(date('Y-m-d')))); ?>');
$('#filtro_mensual').css('background', '#818181');
} else if(id == 4){
$('#n_fecha_desde').val('<?php echo date('Y-m-d', strtotime('first day of this month', strtotime(date('Y').'-01-01'))); ?>');
$('#n_fecha_hasta').val('<?php echo date('Y-m-d', strtotime('last day of this month', strtotime(date('Y').'-12-01'))); ?>');
$('#filtro_anual').css('background', '#818181');
}

//EJECUTAR LOAD
load(1);
}

$('.btn_modal_fechas_dashboard').on('click', function(){
$('#modalFechas').modal();
});
$('#btn_consultar_fechas').on('click', function(){

//EJECUTAR LOAD
load(1);
$('#filtro_diario').css('background', '#95cf32');
$('#filtro_semanal').css('background', '#95cf32');
$('#filtro_mensual').css('background', '#95cf32');
$('#filtro_anual').css('background', '#95cf32');
$('#modalFechas').modal('hide');
});
</script>
</li>
</ul>
</nav>
<?php
}
?>
<div style="margin-top: 20px;">
<div class="table-responsive">
<div id="reporte_tabla"></div>
</div>
<!--
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
-->
<script>
//LOAD
function load(page){
if($('#n_fecha_desde').length > 0){
var n_fecha_desde = $('#n_fecha_desde').val();
} else {
var n_fecha_desde = '';
}
if($('#n_fecha_hasta').length > 0){
var n_fecha_hasta = $('#n_fecha_hasta').val();
} else {
var n_fecha_hasta = '';
}
$.ajax({
type: 'POST',
url: 'config/ajax.php?view_controller=<?php echo $view_controller; ?>',
data: {
action: 'ajax',
page: page,
n_fecha_desde : n_fecha_desde,
n_fecha_hasta : n_fecha_hasta,
ver_pacientes : <?php echo (int)$ver_pacientes; ?>,
ver_nutricionistas: <?php echo (int)$ver_nutricionistas; ?>,
ver_vendedores : <?php echo (int)$ver_vendedores; ?>,
fn_id_suscripcion : <?php echo (int)$fn_id_suscripcion; ?>
},
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
url: 'config/ajax.php?view_controller=<?php echo $view_controller; ?>&id='+id+'&ver_pacientes=<?php echo (int)$ver_pacientes; ?>&ver_nutricionistas=<?php echo (int)$ver_nutricionistas; ?>&ver_vendedores=<?php echo (int)$ver_vendedores; ?>',
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
url: 'config/ajax.php?negocia_operacion=1&view_controller=<?php echo $view_controller; ?>&ver_pacientes=<?php echo (int)$ver_pacientes; ?>&ver_nutricionistas=<?php echo (int)$ver_nutricionistas; ?>&ver_vendedores=<?php echo (int)$ver_vendedores; ?>',
data: {id: id},
success: function(datos){
$('#resultado').html(datos).fadeIn('slow');
$('#reporte_tabla').html('');
$('#tabla_filtros').css('display', 'none');
}
});
}

//POR DEFECTO REPORTE MENSUAL
load(1);
</script>
</div>
</div>
</div>
<?php
}

//PLANES DETOX / PLANES DE ALIMENTACION
if($view_controller == 3){
?>
<div class="card-box mb-30">
<div class="card-box pd-20 height-100-p mb-30">
<div style="text-align: center; margin-top: 30px; margin-bottom: 20px;">
<table style="width: 400px; margin: 0 auto; margin-top: 40px;">
<tr>
<td style="width: 50% !important; text-align: left; padding-left: 10px;">
<span style="color: #111; font-weight: bold; font-size: 13px;">Nombres o N&#176; de Socio:</span>
</td>
<td style="width: 50% !important; text-align: left; padding-left: 5px;">
<input id="form_busqueda_paciente" name="form_busqueda_paciente" class="form-control n-form-control" type="text" placeholder="Buscar:">
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
url: 'config/content.php?negocia_operacion=9&id_paciente='+id_paciente,
success: function(datos){
$('#div_plan_paciente').html(datos).fadeIn('slow');
}
});
}
</script>
</td>
</tr>
</table>
<br>
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

//REGISTROS
if($view_controller == 11){

if($_SESSION['ID_TIPO_USUARIO'] == 3 && empty($get_nuevo_nutricionista) && empty($get_nuevo_vendedor)){
?>
<div class="card-box mb-30">
<div class="card-box pd-20 height-100-p mb-30">
<div style="text-align: center; margin-top: 30px; margin-bottom: 20px;">
<div class="row">
<div class="col-md-4 text-center"></div>
<div class="col-md-2 text-right" style="text-align: left;">
<button onclick="window.location.href='registro.php?nuevo_nutricionista=1'" type="button" class="btn" style="background: #95cf32; color: white; padding: 4px; font-size: 13px;">Nutricionista</button>
</div>
<div class="col-md-2 text-left" style="text-align: left;">
<button onclick="window.location.href='registro.php?nuevo_vendedor=1'" type="button" class="btn" style="background: #95cf32; color: white; padding: 4px; font-size: 13px;">Vendedor</button>
</div>
<div class="col-md-4 text-center"></div>
</div>
</div>
</div>
</div>
<?php
exit();
exit();
}
?>

<div class="card-box mb-30" id="displaynone_1">
<div class="card-box pd-20 height-100-p mb-30">
<div style="text-align: center; margin-top: 30px; margin-bottom: 20px;">
<div class="row">
<div class="col-md-6">
<table style="width: 400px; margin-left: 25px; margin-top: 40px;">
<tr>
<td style="width: 50% !important; text-align: left; padding-left: 10px;">
<?php
//VISTA DEL ADMINISTRADOR
if($_SESSION['ID_TIPO_USUARIO'] == 3){
if($get_nuevo_vendedor == 1){
?>
<span style="color: #111; font-weight: bold; font-size: 13px;">C&oacute;digo del Vendedor:</span>
<?php
} else {
?>
<span style="color: #111; font-weight: bold; font-size: 13px;">C&oacute;digo del Nutricionista:</span>
<?php
}

}

//VISTA DEL VENDEDOR
if($_SESSION['ID_TIPO_USUARIO'] == 4){
?>
<span style="color: #111; font-weight: bold; font-size: 13px;">N&#176; de Socio:</span>
<?php
}
?>
</td>
<td style="width: 50% !important; text-align: left; padding-left: 5px; padding-bottom: 10px;">
<input id="form_busqueda_paciente_1" name="form_busqueda_paciente_1" class="form-control n-form-control" type="text" placeholder="N&#176;:" onkeyup="mensaje_404(this.value)">
<div id="resultado_busqueda_1"></div>
<script>
//AUTOCOMPLETE
$(function(){
$('#form_busqueda_paciente_1').autocomplete({
source: function(request, response){
$.ajax({
url: 'config/content.php?negocia_operacion=3&get_nuevo_vendedor=<?php echo $get_nuevo_vendedor; ?>',
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
url: 'config/content.php?negocia_operacion=3&get_nuevo_vendedor=<?php echo $get_nuevo_vendedor; ?>',
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
url: 'config/content.php?negocia_operacion=3&get_nuevo_vendedor=<?php echo $get_nuevo_vendedor; ?>',
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
<button onclick="nuevo_registro(0)" type="button" class="btn" style="background: #95cf32; color: white; padding: 4px; font-size: 13px;">
<?php
if($_SESSION['ID_TIPO_USUARIO'] == 3){
if($get_nuevo_vendedor == 1){
?>
(+) Registrar Nuevo Vendedor
<?php
} else {
?>
(+) Registrar Nuevo Nutricionista
<?php
}

} else {
?>
(+) Registrar Nuevo Paciente
<?php
}
?>
</button>
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
url: 'config/content.php?negocia_operacion=1&negocia_tipo='+id+'&get_nuevo_vendedor=<?php echo $get_nuevo_vendedor; ?>',
success: function(datos){
$('#div_ajax').html(datos).fadeIn('slow');
$('#displaynone_1').css('display', 'none');
}
});
}

function mensaje_404(value){
$.ajax({
type: 'POST',
url: 'config/content.php?negocia_operacion=5&value='+value+'&get_nuevo_vendedor=<?php echo $get_nuevo_vendedor; ?>',
success: function(datos){
$('#mensaje_404').html(datos).fadeIn('slow');
}
});
}
</script>
<?php
}

//HISTORIA CLINICA
if($view_controller == 12){
?>
<div class="card-box pd-20 height-100-p mb-30">
<div class="row align-items-center">
<div class="col-md-12">
<?php
if(isset($_GET['success'])){
?>
<script>
swal(
{
title: 'Datos Guardados!',
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
<div id="div_guardar_historia"></div>
<div style="color: #111; font-size: 23px; font-weight: 500; text-align: center;">Historia Cl&iacute;nica</div><br>
<div style="color: #111; font-size: 14px; font-weight: normal; text-align: center; color: #111; font-weight: 300;">
Hola <b style="font-weight: 500;"><?php echo ucwords($_SESSION['usuario_nombres']); ?></b>, bienvenido al programa <b style="font-weight: 500;">ReKupera tu peso ideal</b>!
Te agradecer&eacute; completar esta ficha para conocerte m&aacute;s!
</div>
<?php
$form_alimentos_gustar_no;
$form_agua;
$form_alcohol;
$form_alcohol_frecuencia;
$form_evacuacion;
$form_dormir;
$form_ejercicios;
$form_ejercicios_frecuencia;
$form_ejercicios_horario;
$form_enfermedad;
$form_enfermedad_especificar;
$form_analisis_alterado;
$form_analisis_alterado_especificar;
$form_medicamentos;
$form_medicamentos_especificar;
$form_horario_comidas;
$form_tiempo;
$form_peso_meta;

//VERIFICAR SI EXISTE HISTORIA CLINICA DEL PACIENTE
$query_id_historia = mysqli_query($con, "SELECT alimentos_no_gustar, agua, alcohol, alcohol_frecuencia, evacuacion, dormir, ejercicios, ejercicios_frecuencia, ejercicios_horario, enfermedad, enfermedad_especificar, analisis_sangre, analisis_sangre_especificar, medicamentos, medicamentos_especificar, horario, tiempo, peso_meta FROM historia WHERE id_paciente = '".$_SESSION['ID_USUARIO']."' ORDER BY id ASC LIMIT 1");
if(mysqli_num_rows($query_id_historia) > 0){
$row_id_historia = mysqli_fetch_array($query_id_historia);
$form_alimentos_gustar_no = $row_id_historia[0];
$form_agua = $row_id_historia[1];
$form_alcohol = $row_id_historia[2];
$form_alcohol_frecuencia = $row_id_historia[3];
$form_evacuacion = $row_id_historia[4];
$form_dormir = $row_id_historia[5];
$form_ejercicios = $row_id_historia[6];
$form_ejercicios_frecuencia = $row_id_historia[7];
$form_ejercicios_horario = $row_id_historia[8];
$form_enfermedad = $row_id_historia[9];
$form_enfermedad_especificar = $row_id_historia[10];
$form_analisis_alterado = $row_id_historia[11];
$form_analisis_alterado_especificar = $row_id_historia[12];
$form_medicamentos = $row_id_historia[13];
$form_medicamentos_especificar = $row_id_historia[14];
$form_horario_comidas = $row_id_historia[15];
$form_tiempo = $row_id_historia[16];
$form_peso_meta = (int)$row_id_historia[17];
}
?>
<div class="row">
<div class="col-md-2" style="padding-top: 25px;"></div>
<div class="col-md-8" style="padding-top: 25px;">
<div class="table-responsive">
<table style="width: 100% !important; margin: 0 auto; border: 1px solid #95cf32; margin-top: 5px;">
<tr>
<td class="td-title" style="width: 50% !important;">Preguntas</td>
<td class="td-title" style="width: 50% !important; padding-right: 35px;">Respuestas</td>
</tr>
<tr class="tr-hover">
<td class="td-content" style="width: 50% !important; text-align: left;">
1. Alimentos que no te gusten:
</td>
<td style="width: 50%;">
<textarea id="form_alimentos_gustar_no" name="form_alimentos_gustar_no" class="form-control n-form-control-text-area-plan" placeholder="Escribe aqu&iacute;:" style="height: 50px !important; background: none;"><?php echo $form_alimentos_gustar_no; ?></textarea>
</td>
</tr>
<tr class="tr-hover">
<td class="td-content" style="width: 50% !important; text-align: left;">
2. Consumo de agua diario:
</td>
<td style="width: 50%; text-align: left;">
<label style="width: 100%; font-size: 12px;">
<input type="radio" id="agua_no" name="form_agua" value="1" <?php if($form_agua == 1){ ?> checked="checked" <?php } ?>> No tomo agua
</label>
<label style="width: 100%; font-size: 12px;">
<input type="radio" id="agua_poco" name="form_agua" value="2" <?php if($form_agua == 2){ ?> checked="checked" <?php } ?>> Tomo poca agua
</label>
<label style="width: 100%; font-size: 12px;">
<input type="radio" id="agua_mucha" name="form_agua" value="3" <?php if($form_agua == 3){ ?> checked="checked" <?php } ?>> Tomo mucha agua
</label>
</td>
</tr>
<tr class="tr-hover">
<td class="td-content" style="width: 50% !important; text-align: left;">
3. &#191;Tomas alcohol?:
</td>
<td style="width: 50%; text-align: left;">
<label style="width: 100%; font-size: 12px;">
<input type="radio" id="alcohol_no" name="form_alcohol" value="1" <?php if($form_alcohol == 1){ ?> checked="checked" <?php } ?>> No tomo
</label>
<label style="width: 100%; font-size: 12px;">
<input type="radio" id="alcohol_si" name="form_alcohol" value="2" <?php if($form_alcohol == 2){ ?> checked="checked" <?php } ?>> Si tomo, Frecuencia:
<textarea id="form_alcohol_frecuencia" name="form_alcohol_frecuencia" class="form-control n-form-control-text-area-plan" placeholder="Escribe aqu&iacute;:" style="height: 50px !important; background: none;"><?php echo $form_alcohol_frecuencia; ?></textarea>
</label>
</td>
</tr>
<tr class="tr-hover">
<td class="td-content" style="width: 50% !important; text-align: left;">
4. Evacuaci&oacute;n:
</td>
<td style="width: 50%; text-align: left;">
<label style="width: 100%; font-size: 12px;">
<input type="radio" id="evacuacion_diario" name="form_evacuacion" value="1" <?php if($form_evacuacion == 1){ ?> checked="checked" <?php } ?>> Diario
</label>
<label style="width: 100%; font-size: 12px;">
<input type="radio" id="evacuacion_interdiario" name="form_evacuacion" value="2" <?php if($form_evacuacion == 2){ ?> checked="checked" <?php } ?>> Interdiario
</label>
<label style="width: 100%; font-size: 12px;">
<input type="radio" id="evacuacion_estrenimiento" name="form_evacuacion" value="3" <?php if($form_evacuacion == 3){ ?> checked="checked" <?php } ?>> Estre&ntilde;imiento
</label>
</td>
</tr>
<tr class="tr-hover">
<td class="td-content" style="width: 50% !important; text-align: left;">
5. &#191;Cu&aacute;ntas horas duermes al d&iacute;a?:
</td>
<td style="width: 50%; text-align: left;">
<label style="width: 100%; font-size: 12px;">
<input type="radio" id="dormir_si" name="form_dormir" value="1" <?php if($form_dormir == 1){ ?> checked="checked" <?php } ?>> M&aacute;s de 8 horas
</label>
<label style="width: 100%; font-size: 12px;">
<input type="radio" id="dormir_no" name="form_dormir" value="2" <?php if($form_dormir == 2){ ?> checked="checked" <?php } ?>> Menos de 8 horas
</label>
</td>
</tr>
<tr class="tr-hover">
<td class="td-content" style="width: 50% !important; text-align: left;">
6. &#191;Realizas Ejercicios?:
</td>
<td style="width: 50%; text-align: left;">
<label style="width: 100%; font-size: 12px;">
<input type="radio" id="ejercicios_no" name="form_ejercicios" value="1" <?php if($form_ejercicios == 1){ ?> checked="checked" <?php } ?>> No
</label>
<label style="width: 100%; font-size: 12px;">
<input type="radio" id="ejercicios_si" name="form_ejercicios" value="2" <?php if($form_ejercicios == 2){ ?> checked="checked" <?php } ?>> Si, Frecuencia:
<textarea id="form_ejercicios_frecuencia" name="form_ejercicios_frecuencia" class="form-control n-form-control-text-area-plan" placeholder="Escribe aqu&iacute;:" style="height: 50px !important; background: none;"><?php echo $form_ejercicios_frecuencia; ?></textarea>
Horario:
<textarea id="form_ejercicios_horario" name="form_ejercicios_horario" class="form-control n-form-control-text-area-plan" placeholder="Escribe aqu&iacute;:" style="height: 50px !important; background: none;"><?php echo $form_ejercicios_horario; ?></textarea>
</label>
</td>
</tr>
<tr class="tr-hover">
<td class="td-content" style="width: 50% !important; text-align: left;">
7. &#191;Presentas alguna enfermedad?:
</td>
<td style="width: 50%; text-align: left;">
<label style="width: 100%; font-size: 12px;">
<input type="radio" id="enfermedad_no" name="form_enfermedad" value="1" <?php if($form_enfermedad == 1){ ?> checked="checked" <?php } ?>> No
</label>
<label style="width: 100%; font-size: 12px;">
<input type="radio" id="enfermedad_si" name="form_enfermedad" value="2" <?php if($form_enfermedad == 2){ ?> checked="checked" <?php } ?>> Si, 
Especificar:
<textarea id="form_enfermedad_especificar" name="form_enfermedad_especificar" class="form-control n-form-control-text-area-plan" placeholder="Escribe aqu&iacute;:" style="height: 50px !important; background: none;"><?php echo $form_enfermedad_especificar; ?></textarea>
</label>
</td>
</tr>
<tr class="tr-hover">
<td class="td-content" style="width: 50% !important; text-align: left;">
8. &#191;Alg&uacute;n valor alterado en tus &uacute;ltimos<br>an&aacute;lisis de sangre?:
</td>
<td style="width: 50%; text-align: left;">
<label style="width: 100%; font-size: 12px;">
<input type="radio" id="analisis_alterado_no" name="form_analisis_alterado" value="1" <?php if($form_analisis_alterado == 1){ ?> checked="checked" <?php } ?>> No
</label>
<label style="width: 100%; font-size: 12px;">
<input type="radio" id="analisis_alterado_si" name="form_analisis_alterado" value="2" <?php if($form_analisis_alterado == 2){ ?> checked="checked" <?php } ?>> Si, 
Especificar:
<textarea id="form_analisis_alterado_especificar" name="form_analisis_alterado_especificar" class="form-control n-form-control-text-area-plan" placeholder="Escribe aqu&iacute;:" style="height: 50px !important; background: none;"><?php echo $form_analisis_alterado_especificar; ?></textarea>
</label>
</td>
</tr>
<tr class="tr-hover">
<td class="td-content" style="width: 50% !important; text-align: left;">
9. &#191;Tomas medicamentos / suplementos / <br>vitaminas / anticonc&eacute;pticos?:
</td>
<td style="width: 50%; text-align: left;">
<label style="width: 100%; font-size: 12px;">
<input type="radio" id="medicamentos_no" name="form_medicamentos" value="1" <?php if($form_medicamentos == 1){ ?> checked="checked" <?php } ?>> No
</label>
<label style="width: 100%; font-size: 12px;">
<input type="radio" id="medicamentos_si" name="form_medicamentos" value="2" <?php if($form_medicamentos == 2){ ?> checked="checked" <?php } ?>> Si, 
Especificar:
<textarea id="form_medicamentos_especificar" name="form_medicamentos_especificar" class="form-control n-form-control-text-area-plan" placeholder="Escribe aqu&iacute;:" style="height: 50px !important; background: none;"><?php echo $form_medicamentos_especificar; ?></textarea>
</label>
</td>
</tr>
<tr class="tr-hover">
<td class="td-content" style="width: 50% !important; text-align: left;">
10. &#191;En qu&eacute; horarios te gustar&iacute;a<br>que programe tus comidas?:
</td>
<td style="width: 50%; text-align: left;">
<label style="width: 100%; font-size: 12px;">
<input type="radio" id="horario_comidas_desayuno" name="form_horario_comidas" value="1" <?php if($form_horario_comidas == 1){ ?> checked="checked" <?php } ?>> Desayuno
</label>
<label style="width: 100%; font-size: 12px;">
<input type="radio" id="horario_comidas_almuerzo" name="form_horario_comidas" value="2" <?php if($form_horario_comidas == 2){ ?> checked="checked" <?php } ?>> Almuerzo 
</label>
<label style="width: 100%; font-size: 12px;">
<input type="radio" id="horario_comidas_cena" name="form_horario_comidas" value="3" <?php if($form_horario_comidas == 3){ ?> checked="checked" <?php } ?>> Cena 
</label>
</td>
</tr>
<tr class="tr-hover">
<td class="td-content" style="width: 50% !important; text-align: left;">
11. &#191;C&oacute;mo prefieres un plan de alimentaci&oacute;n?:
</td>
<td style="width: 50%; text-align: left;">
<label style="width: 100%; font-size: 12px;">
<input type="radio" id="tiempo_no" name="form_tiempo" value="1" <?php if($form_tiempo == 1){ ?> checked="checked" <?php } ?>> Pr&aacute;ctico porque no tengo mucho tiempo para preparar las comidas.
</label>
<label style="width: 100%; font-size: 12px;">
<input type="radio" id="tiempo_si" name="form_tiempo" value="2" <?php if($form_tiempo == 2){ ?> checked="checked" <?php } ?>> Tengo tiempo para realizar las preparaciones con recetas.
</label>
</td>
</tr>
</table>
</div>
<div style="text-align: center; padding-top: 15px;">
<button id="btn_guardar_datos" type="button" class="btn" style="background: #95cf32; color: white; padding: 4px; font-size: 11px;">Guardar Datos</button>
<script>
$('#btn_guardar_datos').on('click', function(){
var form_alimentos_gustar_no = $('#form_alimentos_gustar_no').val();
var form_agua = $('input[name=form_agua]:checked').val();
var form_alcohol = $('input[name=form_alcohol]:checked').val();
var form_alcohol_frecuencia = $('#form_alcohol_frecuencia').val();
var form_evacuacion = $('input[name=form_evacuacion]:checked').val();
var form_dormir = $('input[name=form_dormir]:checked').val();
var form_ejercicios = $('input[name=form_ejercicios]:checked').val();
var form_ejercicios_frecuencia = $('#form_ejercicios_frecuencia').val();
var form_ejercicios_horario = $('#form_ejercicios_horario').val();
var form_enfermedad = $('input[name=form_enfermedad]:checked').val();
var form_enfermedad_especificar = $('#form_enfermedad_especificar').val();
var form_analisis_alterado = $('input[name=form_analisis_alterado]:checked').val();
var form_analisis_alterado_especificar = $('#form_analisis_alterado_especificar').val();
var form_medicamentos = $('input[name=form_medicamentos]:checked').val();
var form_medicamentos_especificar = $('#form_medicamentos_especificar').val();
var form_horario_comidas = $('input[name=form_horario_comidas]:checked').val();
var form_tiempo = $('input[name=form_tiempo]:checked').val();
$.ajax({
type: 'POST',
url: 'config/content.php?negocia_operacion=6',
data: {
form_alimentos_gustar_no : form_alimentos_gustar_no,
form_agua : form_agua,
form_alcohol : form_alcohol,
form_alcohol_frecuencia : form_alcohol_frecuencia,
form_evacuacion : form_evacuacion,
form_dormir : form_dormir,
form_ejercicios : form_ejercicios,
form_ejercicios_frecuencia : form_ejercicios_frecuencia,
form_ejercicios_horario : form_ejercicios_horario,
form_enfermedad : form_enfermedad,
form_enfermedad_especificar : form_enfermedad_especificar,
form_analisis_alterado : form_analisis_alterado,
form_analisis_alterado_especificar : form_analisis_alterado_especificar,
form_medicamentos : form_medicamentos,
form_medicamentos_especificar : form_medicamentos_especificar,
form_horario_comidas : form_horario_comidas,
form_tiempo : form_tiempo
},
success: function(datos){
$('#div_guardar_historia').html(datos).fadeIn('slow');
}
});
});
</script>
</div>
</div>
<div class="col-md-2" style="padding-top: 25px;"></div>
</div>
</div>
</div>
</div>
<?php
}

//REGISTRO DE PESO Y MEDIDAS
if($view_controller == 13){
?>
<div class="card-box pd-20 height-100-p mb-30">
<div class="row align-items-center">
<div class="col-md-12">
<?php
if(isset($_GET['success'])){
?>
<script>
swal(
{
title: 'Datos Guardados!',
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
<div id="div_guardar_control"></div>
<div style="color: #111; font-size: 23px; font-weight: 500; text-align: center;">Registro de Peso y Medidas</div>
<div class="row" style="padding-top: 15px;">
<div class="col-md-3" style="padding-top: 25px;"></div>
<div class="col-md-6" style="padding-top: 25px;">
<b style="font-size: 13.5px;">Fecha: <?php echo date('d/m/Y'); ?></b>
<div class="table-responsive">
<table style="width: 100% !important; margin: 0 auto; margin-top: 5px;">
<tr>
<td class="td-content" style="width: 50% !important; font-weight: bold;">Foto Frontal</td>
<td class="td-content" style="width: 50% !important;">
<input id="frm_foto_frontal" type="file" style="height: 25px; text-align: center; font-size: 11px;">
</td>
</tr>
<tr>
<td class="td-content" style="width: 50% !important; font-weight: bold;">Foto Perfil</td>
<td class="td-content" style="width: 50% !important;">
<input id="frm_foto_perfil" type="file" style="height: 25px; text-align: center; font-size: 11px;">
</td>
</tr>
</table>
<table style="width: 100% !important; margin: 0 auto; border: 1px solid #95cf32; margin-top: 5px;">
<tr>
<td class="td-title" style="width: 50% !important;">Medidas</td>
<td class="td-title" style="width: 50% !important; padding-right: 35px;">Valor</td>
</tr>
<tr class="tr-hover">
<td class="td-content" style="width: 50% !important;">Talla Actual</td>
<td class="td-content" style="width: 50% !important;">
<div class="input-group input-group-sm" style="width: 100px; margin: 0 auto;">
<input id="frm_talla_actual" type="text" class="form-control" style="height: 25px; text-align: center; font-size: 11px;" placeholder="0.00">
<div class="input-group-prepend">
<span class="input-group-text">m&nbsp;</span>
</div>
</div>
</td>
</tr>
<tr class="tr-hover">
<td class="td-content" style="width: 50% !important;">Peso Actual</td>
<td class="td-content" style="width: 50% !important;">
<div class="input-group input-group-sm" style="width: 100px; margin: 0 auto;">
<input id="frm_peso_actual" type="text" class="form-control" style="height: 25px; text-align: center; font-size: 11px;" placeholder="0.00">
<div class="input-group-prepend">
<span class="input-group-text">Kg</span>
</div>
</div>
</td>
</tr>
<tr class="tr-hover">
<td class="td-content" style="width: 50% !important;">Cuello</td>
<td class="td-content" style="width: 50% !important;">
<div class="input-group input-group-sm" style="width: 100px; margin: 0 auto;">
<input id="frm_cuello" type="text" class="form-control" style="height: 25px; text-align: center; font-size: 11px;" placeholder="0.00">
<div class="input-group-prepend">
<span class="input-group-text">cm</span>
</div>
</div>
</td>
</tr>
<tr class="tr-hover">
<td class="td-content" style="width: 50% !important;">Brazo</td>
<td class="td-content" style="width: 50% !important;">
<div class="input-group input-group-sm" style="width: 100px; margin: 0 auto;">
<input id="frm_brazo" type="text" class="form-control" style="height: 25px; text-align: center; font-size: 11px;" placeholder="0.00">
<div class="input-group-prepend">
<span class="input-group-text">cm</span>
</div>
</div>
</td>
</tr>
<tr class="tr-hover">
<td class="td-content" style="width: 50% !important;">Pecho</td>
<td class="td-content" style="width: 50% !important;">
<div class="input-group input-group-sm" style="width: 100px; margin: 0 auto;">
<input id="frm_pecho" type="text" class="form-control" style="height: 25px; text-align: center; font-size: 11px;" placeholder="0.00">
<div class="input-group-prepend">
<span class="input-group-text">cm</span>
</div>
</div>
</td>
</tr>
<tr class="tr-hover">
<td class="td-content" style="width: 50% !important;">Cintura</td>
<td class="td-content" style="width: 50% !important;">
<div class="input-group input-group-sm" style="width: 100px; margin: 0 auto;">
<input id="frm_cintura" type="text" class="form-control" style="height: 25px; text-align: center; font-size: 11px;" placeholder="0.00">
<div class="input-group-prepend">
<span class="input-group-text">cm</span>
</div>
</div>
</td>
</tr>
<tr class="tr-hover">
<td class="td-content" style="width: 50% !important;">Gl&uacute;teo</td>
<td class="td-content" style="width: 50% !important;">
<div class="input-group input-group-sm" style="width: 100px; margin: 0 auto;">
<input id="frm_gluteo" type="text" class="form-control" style="height: 25px; text-align: center; font-size: 11px;" placeholder="0.00">
<div class="input-group-prepend">
<span class="input-group-text">cm</span>
</div>
</div>
</td>
</tr>
<tr class="tr-hover">
<td class="td-content" style="width: 50% !important;">Muslo</td>
<td class="td-content" style="width: 50% !important;">
<div class="input-group input-group-sm" style="width: 100px; margin: 0 auto;">
<input id="frm_muslo" type="text" class="form-control" style="height: 25px; text-align: center; font-size: 11px;" placeholder="0.00">
<div class="input-group-prepend">
<span class="input-group-text">cm</span>
</div>
</div>
</td>
</tr>
<tr class="tr-hover">
<td class="td-content" style="width: 50% !important;">Pantorrilla</td>
<td class="td-content" style="width: 50% !important;">
<div class="input-group input-group-sm" style="width: 100px; margin: 0 auto;">
<input id="frm_pantorrilla" type="text" class="form-control" style="height: 25px; text-align: center; font-size: 11px;" placeholder="0.00">
<div class="input-group-prepend">
<span class="input-group-text">cm</span>
</div>
</div>
</td>
</tr>
</table>
</div>
<div style="text-align: center; padding-top: 15px;">
<button id="btn_guardar_datos" type="button" class="btn" style="background: #95cf32; color: white; padding: 4px; font-size: 11px;">
GUARDAR DATOS
</button>
<script>
$('#btn_guardar_datos').on('click', function(){
var frm_talla_actual = $('#frm_talla_actual').val();
var frm_peso_actual = $('#frm_peso_actual').val();
var frm_cuello = $('#frm_cuello').val();
var frm_brazo = $('#frm_brazo').val();
var frm_pecho = $('#frm_pecho').val();
var frm_cintura = $('#frm_cintura').val();
var frm_gluteo = $('#frm_gluteo').val();
var frm_muslo = $('#frm_muslo').val();
var frm_pantorrilla = $('#frm_pantorrilla').val();

$.ajax({
type: 'POST',
url: 'config/content.php?negocia_operacion=8',
data: {
frm_talla_actual : frm_talla_actual,
frm_peso_actual : frm_peso_actual,
frm_cuello: frm_cuello,
frm_brazo : frm_brazo,
frm_pecho : frm_pecho,
frm_cintura : frm_cintura,
frm_gluteo : frm_gluteo,
frm_muslo : frm_muslo,
frm_pantorrilla : frm_pantorrilla,
id_paciente : <?php echo $_SESSION['ID_USUARIO']; ?>
},
success: function(datos){
$('#div_guardar_control').html(datos).fadeIn('slow');
}
});
});
</script>
</div>
</div>
<div class="col-md-3" style="padding-top: 25px;"></div>
</div>
</div>
</div>
</div>
<?php
}

//MI EVOLUCION
if($view_controller == 14){
?>
<div class="card-box pd-20 height-100-p mb-30">
<div id="div_ajax_evolucion"></div>
<script>
//VISUALIZAR
$.ajax({
type: 'POST',
url: 'config/content.php?negocia_operacion=7',
data: {id: <?php echo $_SESSION['ID_USUARIO']; ?>},
success: function(datos){
$('#div_ajax_evolucion').html(datos).fadeIn('slow');
}
});
</script>
</div>
<?php
}

//REPORTES
if($view_controller == 16){

if($_SESSION['ID_TIPO_USUARIO'] == 3){
?>
<div class="card-box pd-20 height-100-p mb-30 text-center">
<h4>Reportes:</h4><br>
<div class="row">
<div class="col-md-2"></div>
<div class="col-md-8 text-left">
<button onclick="window.location='pacientes.php'" type="button" style="font-size: 14px; background: #95cf32; color: white; padding: 5px; border: none; margin-bottom: 15px;">
1. Lista de Socios
</button><br>
<button onclick="window.location='nutricionistas.php'" type="button" style="font-size: 14px; background: #95cf32; color: white; padding: 5px; border: none; margin-bottom: 15px;">
2. Lista de Nutricionistas
</button><br>
<button onclick="window.location='vendedores.php'" type="button" style="font-size: 14px; background: #95cf32; color: white; padding: 5px; border: none;">
3. Lista de Vendedores
</button>
</div>
<div class="col-md-2"></div>
</div>
</div>
<?php
} else {
?>
<div class="card-box pd-20 height-100-p mb-30 text-center">
<div id="ajax_reportes">
<h4>Indicadores:</h4><br>
<div class="row">
<div class="col-md-2"></div>
<div class="col-md-8 text-left">
<button id="indicador_1" type="button" style="font-size: 14px; background: #95cf32; color: white; padding: 5px; border: none; margin-bottom: 15px;">
1. Socios que bajaron m&iacute;nimo 1KG
</button><br>
<button id="indicador_2" type="button" style="font-size: 14px; background: #95cf32; color: white; padding: 5px; border: none;">
2. Socios que no renovaron
</button>
</div>
<div class="col-md-2"></div>
</div>
</div>
<div id="div_indicador_1" style="display: none;">
<h4>Socios que bajaron m&iacute;nimo 1KG:</h4><br>
<div class="table-responsive">
<table style="width: 1000px !important; margin: 0 auto;">
<tr>
<td class="td-title" style="width: 11.11% !important;">N&#176; Socio</td>
<td class="td-title" style="width: 11.11% !important;">Nombres</td>
<td class="td-title" style="width: 11.11% !important;">Apellidos</td>
<td class="td-title" style="width: 11.11% !important;">G&eacute;nero</td>
<td class="td-title" style="width: 11.11% !important;">Edad</td>
<td class="td-title" style="width: 11.11% !important;">Correo</td>
<td class="td-title" style="width: 11.11% !important;">Tel&eacute;fono</td>
<td class="td-title" style="width: 11.11% !important;">Estado</td>
<td class="td-title" style="width: 11.11% !important;">Acci&oacute;n</td>
</tr>
</table>
</div>
</div>
<div id="div_indicador_2" style="display: none;">
<h4>Socios que no renovaron:</h4><br>
<div class="table-responsive">
<table style="width: 1000px !important; margin: 0 auto;">
<tr>
<td class="td-title" style="width: 11.11% !important;">N&#176; Socio</td>
<td class="td-title" style="width: 11.11% !important;">Nombres</td>
<td class="td-title" style="width: 11.11% !important;">Apellidos</td>
<td class="td-title" style="width: 11.11% !important;">G&eacute;nero</td>
<td class="td-title" style="width: 11.11% !important;">Edad</td>
<td class="td-title" style="width: 11.11% !important;">Correo</td>
<td class="td-title" style="width: 11.11% !important;">Tel&eacute;fono</td>
<td class="td-title" style="width: 11.11% !important;">Estado</td>
<td class="td-title" style="width: 11.11% !important;">Acci&oacute;n</td>
</tr>
</table>
</div>
</div>
<script>
$('#indicador_1').on('click', function(){
$('#ajax_reportes').css('display', 'none');
$('#div_indicador_1').css('display', 'block');
$('#div_indicador_2').css('display', 'none');
});

$('#indicador_2').on('click', function(){
$('#ajax_reportes').css('display', 'none');
$('#div_indicador_1').css('display', 'none');
$('#div_indicador_2').css('display', 'block');
});
</script>
</div>
<?php
}
}
}