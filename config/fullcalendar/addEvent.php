<?php
// Conexion a la base de datos
require_once('bdd.php');
if (isset($_POST['title']) && isset($_POST['start']) && isset($_POST['end']) && isset($_POST['color'])){
	
	$title = $_POST['title'];
	$start = $_POST['start'];
	$end = $_POST['end'];
	$color = $_POST['color'];

	$sql = "INSERT INTO events(title, start, end, color) values ('$title', '$start', '$end', '$color')";
	
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
        
        
        
//ACTUALIZAR FULLCALENDAR
$sql = "SELECT id, title, start, end, color, id_nutricionista, id_paciente, id_suscripcion FROM events ";

$req = $bdd->prepare($sql);
$req->execute();

$events = $req->fetchAll();
?>
<script>
alert('Agendado Correctamente!');
$('#ModalAdd').modal('toggle');
scrollreset();
loadFullCalendar();
</script>
<?php
}