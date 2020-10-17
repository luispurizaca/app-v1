<?php
if(isset($con)){
?>
<div class="header">
<div class="header-left">
<div class="menu-icon dw dw-menu"></div>
</div>
<div class="header-right">
<div class="user-notification">
<div class="dropdown">
<a class="dropdown-toggle no-arrow" href="#" role="button" data-toggle="dropdown">
<i class="icon-copy dw dw-notification"></i>
<span class="badge notification-active"></span>
</a>
<div class="dropdown-menu dropdown-menu-right">
<div class="notification-list mx-h-350 customscroll">
<ul>
<li>
<a href="#">
<img src="vendors/images/img.jpg" alt="">
<h3><?php echo ucwords($_SESSION['usuario_nombres']); ?></h3>
</a>
</li>
</ul>
</div>
</div>
</div>
</div>
<div class="user-info-dropdown">
<div class="dropdown">
<a class="dropdown-toggle" href="#" role="button" data-toggle="dropdown">
<span class="user-icon">
<img src="vendors/images/photo1.jpg" alt="">
</span>
<span class="user-name"><?php echo ucwords($_SESSION['usuario_nombres']); ?></span>
</a>
<div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
<a class="dropdown-item" href="configuracion.php"><i class="dw dw-user1"></i> Perfil</a>
<a class="dropdown-item" href="config/class_login.php?logout"><i class="dw dw-logout"></i> Cerrar Sesi&oacute;n</a>
</div>
</div>
</div>
</div>
</div>
<div class="left-side-bar">
<div class="brand-logo" style="height: 110px; background: #95cf32;">
<a href="index.php">
<img src="vendors/images/logo-white.png" alt="" class="dark-logo">
<img src="vendors/images/logo-white.png" alt="" class="light-logo">
</a>
<div class="close-sidebar" data-toggle="left-sidebar-close">
<i class="ion-close-round"></i>
</div>
</div>
<div class="menu-block customscroll" style="height: calc(100vh - 110px); background: #818181;">
<div class="sidebar-menu">
<ul id="accordion-menu">
<li>
<a href="index.php" class="dropdown-toggle no-arrow" style="padding: 12px 10px 12px 55px;">
<span style="font-size: 15px;" class="micon dw dw-house-1"></span><span class="mtext" style="font-size: 13px;">Inicio</span>
</a>
</li>
<?php
if($_SESSION['ID_TIPO_USUARIO'] == 1){
?>
<li>
<a href="pacientes.php" class="dropdown-toggle no-arrow" style="padding: 12px 10px 12px 55px;">
<span style="font-size: 15px;" class="micon dw dw-house-1"></span><span class="mtext" style="font-size: 13px;">Lista de Socios</span>
</a>
</li>
<li>
<a href="planes.php" class="dropdown-toggle no-arrow" style="padding: 12px 10px 12px 55px;">
<span style="font-size: 15px;" class="micon dw dw-house-1"></span><span class="mtext" style="font-size: 13px;">Planes de Alimentaci&oacute;n</span>
</a>
</li>
<li>
<a href="planes.php" class="dropdown-toggle no-arrow" style="padding: 12px 10px 12px 55px;">
<span style="font-size: 15px;" class="micon dw dw-house-1"></span><span class="mtext" style="font-size: 13px;">Modelos de P.A.</span>
</a>
</li>
<li>
<a href="recetas.php" class="dropdown-toggle no-arrow" style="padding: 12px 10px 12px 55px;">
<span style="font-size: 15px;" class="micon dw dw-house-1"></span><span class="mtext" style="font-size: 13px;">Recetas</span>
</a>
</li>
<li>
<a href="agenda.php" class="dropdown-toggle no-arrow" style="padding: 12px 10px 12px 55px;">
<span style="font-size: 15px;" class="micon dw dw-house-1"></span><span class="mtext" style="font-size: 13px;">Mi Agenda</span>
</a>
</li>
<li>
<a href="reportes.php" class="dropdown-toggle no-arrow" style="padding: 12px 10px 12px 55px;">
<span style="font-size: 15px;" class="micon dw dw-house-1"></span><span class="mtext" style="font-size: 13px;">Reportes</span>
</a>
</li>
<li>
<a href="configuracion.php" class="dropdown-toggle no-arrow" style="padding: 12px 10px 12px 55px;">
<span style="font-size: 15px;" class="micon dw dw-house-1"></span><span class="mtext" style="font-size: 13px;">Configuraci&oacute;n</span>
</a>
</li>
<?php
}
elseif($_SESSION['ID_TIPO_USUARIO'] == 2){
?>
<li>
<a href="historia.php" class="dropdown-toggle no-arrow" style="padding: 12px 10px 12px 55px;">
<span style="font-size: 15px;" class="micon dw dw-house-1"></span><span class="mtext" style="font-size: 13px;">Historia Cl&iacute;nica</span>
</a>
</li>
<li>
<a href="medidas.php" class="dropdown-toggle no-arrow" style="padding: 12px 10px 12px 55px;">
<span style="font-size: 15px;" class="micon dw dw-house-1"></span><span class="mtext" style="font-size: 13px;">Registro de Peso y Medidas</span>
</a>
</li>
<li>
<a href="evolucion.php" class="dropdown-toggle no-arrow" style="padding: 12px 10px 12px 55px;">
<span style="font-size: 15px;" class="micon dw dw-house-1"></span><span class="mtext" style="font-size: 13px;">Evoluci&oacute;n</span>
</a>
</li>
<?php
}
elseif($_SESSION['ID_TIPO_USUARIO'] == 3){
?>
<li>
<a href="registro.php" class="dropdown-toggle no-arrow" style="padding: 12px 10px 12px 55px;">
<span style="font-size: 15px;" class="micon dw dw-house-1"></span><span class="mtext" style="font-size: 13px;">Registros</span>
</a>
</li>
<li>
<a href="reportes.php" class="dropdown-toggle no-arrow" style="padding: 12px 10px 12px 55px;">
<span style="font-size: 15px;" class="micon dw dw-house-1"></span><span class="mtext" style="font-size: 13px;">Reportes</span>
</a>
</li>
<?php
}
elseif($_SESSION['ID_TIPO_USUARIO'] == 4){
?>
<li>
<a href="registro.php" class="dropdown-toggle no-arrow" style="padding: 12px 10px 12px 55px;">
<span style="font-size: 15px;" class="micon dw dw-house-1"></span><span class="mtext" style="font-size: 13px;">Registro</span>
</a>
</li>
<li>
<a href="suscripciones.php?pacientes" class="dropdown-toggle no-arrow" style="padding: 12px 10px 12px 55px;">
<span style="font-size: 15px;" class="micon dw dw-house-1"></span><span class="mtext" style="font-size: 13px;">Lista de Socios</span>
</a>
</li>
<li>
<a href="suscripciones.php" class="dropdown-toggle no-arrow" style="padding: 12px 10px 12px 55px;">
<span style="font-size: 15px;" class="micon dw dw-house-1"></span><span class="mtext" style="font-size: 13px;">Reporte de Ventas</span>
</a>
</li>
<?php
}
?>
</ul>
</div>
</div>
</div>
<div class="mobile-menu-overlay"></div>
<?php
}