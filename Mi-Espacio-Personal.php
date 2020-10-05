<?php
// Notificar todos los errores excepto E_NOTICE
error_reporting(E_ALL ^ E_NOTICE);

require_once(__DIR__.'/config/conexion_bd.php');
require_once(__DIR__.'/config/class_login.php');
$login = new Login();
if($login->do_Logged() == true){
header('location: index.php');
} else {
?>
<!DOCTYPE html>
<html>
<head>
<!-- Basic Page Info -->
<meta charset="utf-8">
<title>Katherine Alfaro - Nutricionista y Coach</title>

<!-- Site favicon -->
<link rel="apple-touch-icon" sizes="57x57" href="vendors/icon/apple-icon-57x57.png">
<link rel="apple-touch-icon" sizes="60x60" href="vendors/icon/apple-icon-60x60.png">
<link rel="apple-touch-icon" sizes="72x72" href="vendors/icon/apple-icon-72x72.png">
<link rel="apple-touch-icon" sizes="76x76" href="vendors/icon/apple-icon-76x76.png">
<link rel="apple-touch-icon" sizes="114x114" href="vendors/icon/apple-icon-114x114.png">
<link rel="apple-touch-icon" sizes="120x120" href="vendors/icon/apple-icon-120x120.png">
<link rel="apple-touch-icon" sizes="144x144" href="vendors/icon/apple-icon-144x144.png">
<link rel="apple-touch-icon" sizes="152x152" href="vendors/icon/apple-icon-152x152.png">
<link rel="apple-touch-icon" sizes="180x180" href="vendors/icon/apple-icon-180x180.png">
<link rel="icon" type="image/png" sizes="192x192"  href="vendors/icon/android-icon-192x192.png">
<link rel="icon" type="image/png" sizes="32x32" href="vendors/icon/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="96x96" href="vendors/icon/favicon-96x96.png">
<link rel="icon" type="image/png" sizes="16x16" href="vendors/icon/favicon-16x16.png">
<link rel="manifest" href="vendors/icon/manifest.json">
<meta name="msapplication-TileColor" content="#ffffff">
<meta name="msapplication-TileImage" content="vendors/icon/ms-icon-144x144.png">
<meta name="theme-color" content="#ffffff">

<!-- Mobile Specific Metas -->
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

<!-- Google Font -->
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
<!-- CSS -->
<link rel="stylesheet" type="text/css" href="vendors/styles/core.css">
<link rel="stylesheet" type="text/css" href="vendors/styles/icon-font.min.css">
<link rel="stylesheet" type="text/css" href="vendors/styles/style.css">

<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-119386393-1"></script>
<script>
window.dataLayer = window.dataLayer || [];
function gtag(){dataLayer.push(arguments);}
gtag('js', new Date());

gtag('config', 'UA-119386393-1');
</script>
<style>
/* width */
::-webkit-scrollbar {
  width: 10px;
}

/* Track */
::-webkit-scrollbar-track {
  box-shadow: inset 0 0 5px grey;
  border-radius: 10px;
}

/* Handle */
::-webkit-scrollbar-thumb {
  background: white;
  border-radius: 10px;
}
</style>
</head>
<body class="login-page" style="background: #95cf32;">
<div class="login-wrap d-flex align-items-center flex-wrap justify-content-center" style="height: 100%;">
<div class="container">
<div class="row align-items-center">
<div class="col-md-6 col-lg-7" style="text-align: right; padding-right: 100px;">
<img src="vendors/images/logo-white.png" style="width: 100%;">
</div>
<div class="col-md-6 col-lg-5">
<div class="login-box bg-white box-shadow border-radius-10" style="margin-left: 0;">
<?php
if(isset($login)){
if($login->errors){
?>
<div class="alert alert-dismissible" style="background: white; color: darkred;" role="alert">
<button type="button" class="close" data-dismiss="alert" style="color: red;">&times;</button>
<strong>Error!</strong> 
<?php 
foreach ($login->errors as $error) {
echo $error;
}
?>
</div>
<?php
}
if($login->lmpm_usu){
foreach($login->lmpm_usu as $lmpm_usu){
$usuario_return = $lmpm_usu;
}
} else {
$usuario_return = '';
}
if($login->lmpm_pass){
foreach($login->lmpm_pass as $lmpm_pass){
$clave_return = $lmpm_pass;
}
} else {
$clave_return = '';
}
} else {
$usuario_return = '';
$clave_return = '';
}
?>
<div class="login-title" style="margin-bottom: 0;">
<h2 style="color: #95cf32; text-align: center; font-weight: 400;">MI ESPACIO PERSONAL<hr></h2>
</div>
<form method="POST" accept-charset="utf-8" action="Mi-Espacio-Personal.php" name="loginform" autocomplete="off" role="form">
<div class="input-group custom">
<input style="border-left: 0; border-right: 0; border-top: 0;" type="text" class="form-control form-control-lg" placeholder="N&#176; de Socio" name="user_name" value="<?php echo $usuario_return; ?>">
<div class="input-group-append custom">
<span class="input-group-text"><i class="icon-copy dw dw-user1"></i></span>
</div>
</div>
<div class="input-group custom">
<input style="border-left: 0; border-right: 0; border-top: 0;" type="password" class="form-control form-control-lg" placeholder="**********" name="user_password" value="<?php echo $clave_return; ?>">
<div class="input-group-append custom">
<span class="input-group-text"><i class="dw dw-padlock1"></i></span>
</div>
</div>
<div class="row">
<div class="col-sm-12">
<div class="input-group mb-0">
<button type="submit" name="login" class="btn btn-lg btn-block" style="background: #95cf32; color: white;">Iniciar Sesi&oacute;n</button>
</div>
</div>
</div>
</form>
</div>
</div>
</div>
</div>
</div>
<!-- js -->
<script src="vendors/scripts/core.js"></script>
<script src="vendors/scripts/script.min.js"></script>
<script src="vendors/scripts/process.js"></script>
<script src="vendors/scripts/layout-settings.js"></script>
</body>
</html>
<?php
}