<?php
// Conexion a la base de datos
require_once('bdd.php');
if (isset($_POST['delete_event']) && isset($_POST['id']) && $_POST['delete_event'] == 1){
$id = $_POST['id'];

$sql = "DELETE FROM events WHERE id = $id";
$query = $bdd->prepare( $sql );
if ($query == false) {
print_r($bdd->errorInfo());
die ('Erreur prepare');
}
$res = $query->execute();
if ($res == false) {
print_r($query->errorInfo());
die ('Erreur execute');
}

?>
<script>
alert('Eliminado Correctamente!');
$('#ModalEdit').modal('toggle');
scrollreset();
loadFullCalendar('<?php echo date('Y-m-d'); ?>');
</script>
<?php
}elseif (isset($_POST['title']) && isset($_POST['color']) && isset($_POST['id'])){

$id = $_POST['id'];
$title = $_POST['title'];
$color = $_POST['color'];

$sql = "UPDATE events SET  title = '$title', color = '$color' WHERE id = $id ";


$query = $bdd->prepare( $sql );
if ($query == false) {
print_r($bdd->errorInfo());
die ('Erreur prepare');
}
$sth = $query->execute();
if ($sth == false) {
print_r($query->errorInfo());
die ('Erreur execute');
}
?>
<script>
alert('Actualizado Correctamente!');
$('#ModalEdit').modal('toggle');
scrollreset();
loadFullCalendar('<?php echo date('Y-m-d'); ?>');
</script>
<?php
}