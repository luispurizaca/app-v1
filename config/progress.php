<?php
if(isset($con)){
//1. inicio.php
if(
$view_controller == 1
){
?>
<div class="pre-loader">
<div class="pre-loader-box">
<div class='loader-progress' id="progress_div">
<div class='bar' id='bar1' style="background: #95cf32;"></div>
</div>
<div class='percent' id='percent1'>0%</div>
<div class="loading-text" style="font-size: 14px; font-weight: bold;">
Cargando...
</div>
</div>
</div>
<script src="vendors/scripts/process.js"></script>
<?php
}
}