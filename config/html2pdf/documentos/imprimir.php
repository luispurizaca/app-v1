<?php

//TIEMPO MAXIMO DE CARGA
ini_set('max_execution_time', 500);

//SESION Y CONEXION
require_once(__DIR__.'/../../conexion_bd.php');

//LIBRERIA HTML2PDF
require_once(__DIR__.'/../html2pdf.class.php');

//FUNCION HTML PLANES
require_once(__DIR__.'/../../fn_planes.php');

//ID PLAN
$id_plan = (int)$_GET['id'];


//CONTENIDO DEL PDF
ob_start();
?>
<page backtop="5mm" backbottom="5mm" backleft="5mm" backright="5mm">
<?php
$fn_html = html_plan($id_plan);
echo $fn_html;
?>
</page>
<?php
$content = ob_get_clean();

//CONFIGURACION DEL PDF
try{
$html2pdf = new HTML2PDF('P', 'A4', 'es', true, 'UTF-8', array(0, 0, 0, 0));
$html2pdf->pdf->SetDisplayMode('fullpage');
$html2pdf->writeHTML($content, isset($_GET['vuehtml']));
$html2pdf->Output('Plan.pdf');
} catch(HTML2PDF_exception $e){
echo $e;
exit();
exit();
}