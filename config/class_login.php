<?php
//CERRAR SESION
if(isset($_GET['logout'])){
session_start();
session_unset();
session_destroy();
?>
<script>
location.href = '../login.php';
</script>
<?php
exit();
exit();
}
class Login {
private $db_connection = null;
public $errors = array();
public $messages = array();

//CONSTRUCTOR
public function __construct(){

//CONFIGURACION DE LA SESION
session_set_cookie_params(260000);
session_start();

//EJECUTAR
if(isset($_POST['login'])){
$this->do_Login();
}
}

//FUNCION PARA INICIAR SESION
private function do_Login(){

//VALIDACIONES
if(empty($_POST['user_name'])){
$this->errors[] = 'Ingrese Correo.';
} elseif(empty($_POST['user_password'])){
$this->errors[] = 'Ingrese Password.';
} elseif(!empty($_POST['user_name']) && !empty($_POST['user_password'])){
$this->db_connection = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
if(!$this->db_connection->set_charset('utf8')){
$this->errors[] = $this->db_connection->error;
}
if(!$this->db_connection->connect_errno){

//ESCAPAR CARACTERES USUARIO
$user_name = $this->db_connection->real_escape_string($_POST['user_name']);

//CONSULTA VALIDAR
$sql = "SELECT usuario.id AS ID_USUARIO, usuario.clave AS CLAVE, usuario.id_tipo_usuario AS ID_TIPO_USUARIO, usuario.estado AS ESTADO_USUARIO, usuario.activo AS ACTIVO FROM usuario WHERE (usuario.codigo = '".$user_name."' OR usuario.correo = '".$user_name."') ORDER BY usuario.id ASC LIMIT 1";

$result_of_login_check = $this->db_connection->query($sql);
if($result_of_login_check->num_rows == 1){
$result_row = $result_of_login_check->fetch_object();

//DATOS DE LA CONSULTA
$ID_USUARIO = $result_row->ID_USUARIO;
$CLAVE = $result_row->CLAVE;
$ID_TIPO_USUARIO = $result_row->ID_TIPO_USUARIO;
$ESTADO_USUARIO = $result_row->ESTADO_USUARIO;
$ACTIVO = $result_row->ACTIVO;

//NOMBRE DEL TIPO DE USUARIO
if($ID_TIPO_USUARIO == 1){
$NOMBRE_TIPO_USUARIO = 'nutricionista';
}
if($ID_TIPO_USUARIO == 2){
$NOMBRE_TIPO_USUARIO = 'paciente';
}
if($ID_TIPO_USUARIO == 3){
$NOMBRE_TIPO_USUARIO = 'administrador';
}
if($ID_TIPO_USUARIO == 4){
$NOMBRE_TIPO_USUARIO = 'vendedor';
}

//VALIDAR NEGOCIA
if($ACTIVO != 1){
$this->errors[] = 'Usuario Restringido.';
} elseif($ACTIVO == 1){
if(password_verify($_POST['user_password'], $CLAVE)){

//CREAR LAS VARIABLES DE LA SESION
session_regenerate_id();
$_SESSION['AUTORIZADO'] = true;
$_SESSION['ID_USUARIO'] = $ID_USUARIO;
$_SESSION['ID_TIPO_USUARIO'] = $ID_TIPO_USUARIO;
$_SESSION['NOMBRE_TIPO_USUARIO'] = $NOMBRE_TIPO_USUARIO;
$_SESSION['SESSION_ID'] = session_id();

} else {
$this->errors[] = "Contrase&ntilde;a incorrecta.";
}
} else {
$this->errors[] = "Error Desconocido.";
}
} elseif($result_of_login_check->num_rows > 1){
$this->errors[] = "Existen dos usuarios con el mismo correo o c&oacute;digo de acceso, por favor comun&iacute;cate con nosotros para solucionar el problema.";
} else {
$this->errors[] = "Este usuario no existe.";
}
} else {
$this->errors[] = 'Problema de conexi&oacute;n.';
}
$this->lmpm_usu[] = $_POST['user_name'];
$this->lmpm_pass[] = $_POST['user_password'];
}
}

//FUNCION VALIDAR SI INICIO SESION
public function do_Logged(){
if(isset($_SESSION['AUTORIZADO']) && $_SESSION['AUTORIZADO'] == true){
return true;
}
return false;
}
}