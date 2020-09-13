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
<h3>John Doe</h3>
<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed...</p>
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
<a class="dropdown-item" href="profile.html"><i class="dw dw-user1"></i> Perfil</a>
<a class="dropdown-item" href="profile.html"><i class="dw dw-settings2"></i> Configuraci&oacute;n</a>
<a class="dropdown-item" href="faq.html"><i class="dw dw-help"></i> Ayuda</a>
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
<a href="index.php" class="dropdown-toggle no-arrow">
<span class="micon dw dw-house-1"></span><span class="mtext" style="font-size: 15px;">Inicio</span>
</a>
</li>
<?php
//MENU
if($_SESSION['ID_TIPO_USUARIO'] == 1){
?>
<li>
<a href="pacientes.php" class="dropdown-toggle no-arrow">
<span class="micon dw dw-house-1"></span><span class="mtext" style="font-size: 15px;">Mis Pacientes</span>
</a>
</li>
<li>
<a href="planes.php" class="dropdown-toggle no-arrow">
<span class="micon dw dw-house-1"></span><span class="mtext" style="font-size: 15px;">Planes de Alimentaci&oacute;n</span>
</a>
</li>
<li>
<a href="controles.php" class="dropdown-toggle no-arrow">
<span class="micon dw dw-house-1"></span><span class="mtext" style="font-size: 15px;">Controles</span>
</a>
</li>
<li>
<a href="recetas.php" class="dropdown-toggle no-arrow">
<span class="micon dw dw-house-1"></span><span class="mtext" style="font-size: 15px;">Recetas</span>
</a>
</li>
<?php
} else {
?>
<li>
<a href="planes.php" class="dropdown-toggle no-arrow">
<span class="micon dw dw-house-1"></span><span class="mtext" style="font-size: 15px;">Plan de Alimentaci&oacute;n</span>
</a>
</li>
<li>
<a href="controles.php" class="dropdown-toggle no-arrow">
<span class="micon dw dw-house-1"></span><span class="mtext" style="font-size: 15px;">Mis Controles</span>
</a>
</li>
<?php
}
?>
<li>
<a href="agenda.php" class="dropdown-toggle no-arrow">
<span class="micon dw dw-calendar1"></span><span class="mtext" style="font-size: 15px;">Mi Agenda</span>
</a>
</li>
<li>
<a href="configuracion.php" class="dropdown-toggle no-arrow">
<span class="micon dw dw-calendar1"></span><span class="mtext" style="font-size: 15px;">Configuraci&oacute;n</span>
</a>
</li>
</ul>
</div>
</div>
</div>
<div class="mobile-menu-overlay"></div>
<?php
}