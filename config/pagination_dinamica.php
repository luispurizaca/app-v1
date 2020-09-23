<?php
function paginate($page, $tpages, $adjacents, $funcion_load){
$prevlabel = "&lsaquo; Ant";
$nextlabel = "Sig &rsaquo;";
$out = '<ul class="pagination pagination-large">';
if($page == 1) {
$out.= "<li class='disabled'><span><a style='color: #333; font-size: 10px;'>$prevlabel</a></span></li>";
} else if($page == 2) {
$out.= "<li><span><a href='javascript:void(0);' onclick='$funcion_load(1)' style='color: #333; font-size: 10px;'>$prevlabel</a></span></li>";
} else {
$out.= "<li><span><a href='javascript:void(0);' onclick='$funcion_load(".($page - 1).")' style='color: #333; font-size: 10px;'>$prevlabel</a></span></li>";
}
if($page > ($adjacents + 1)){
$out.= "<li><a href='javascript:void(0);' onclick='$funcion_load(1)' style='color: #333; font-size: 10px;'>1</a></li>";
}
if($page > ($adjacents + 2)){
$out.= "<li><a>...</a></li>";
}
$pmin = ($page > $adjacents) ? ($page - $adjacents) : 1;
$pmax = ($page < ($tpages - $adjacents)) ? ($page + $adjacents) : $tpages;
for($i = $pmin; $i <= $pmax; $i++) {
if($i == $page){
$out.= "<li class='active'><a style='font-size: 10px; color: white !important;'>$i</a></li>";
} else if($i==1){
$out.= "<li><a href='javascript:void(0);' onclick='$funcion_load(1)' style='color: #333; font-size: 10px;'>$i</a></li>";
} else {
$out.= "<li><a href='javascript:void(0);' onclick='$funcion_load(".$i.")' style='color: #333; font-size: 10px;'>$i</a></li>";
}
}
if($page < ($tpages - $adjacents - 1)){
$out.= "<li><a>...</a></li>";
}
if($page < ($tpages - $adjacents)){
$out.= "<li><a href='javascript:void(0);' onclick='$funcion_load($tpages)' style='color: #333; font-size: 10px;'>$tpages</a></li>";
}
if($page < $tpages){
$out.= "<li><span><a href='javascript:void(0);' onclick='$funcion_load(".($page + 1).")' style='color: #333; font-size: 10px;'>$nextlabel</a></span></li>";
} else {
$out.= "<li class='disabled'><span><a style='color: #333; font-size: 10px;'>$nextlabel</a></span></li>";
}
$out.= "</ul>";
return $out;
}
?>