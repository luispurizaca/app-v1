<?php
// Conexion a la base de datos
require_once('bdd.php');
if (isset($_POST['title']) && isset($_POST['start']) && isset($_POST['end']) && isset($_POST['color'])){
	
	$title = $_POST['title'];
	$start = $_POST['start'];
	$end = $_POST['end'];
	$color = $_POST['color'];
        
        $id_tipo_usuario = (int)$_GET['id_tipo_usuario'];
        $id_usuario = (int)$_GET['id_usuario'];
        
        $id_vendedor = 0;
        $id_nutricionista = 0;
        $id_paciente = 0;
        $id_suscripcion = 0;
        
        if($id_tipo_usuario == 4){
        $id_vendedor = $id_usuario;
        }
        if($id_tipo_usuario == 1){
        $id_nutricionista = $id_usuario;
        }
        

	$sql = "INSERT INTO events(title, color, start, end, id_vendedor, id_nutricionista, id_paciente, id_suscripcion) VALUES ('$title', '$color', '$start', '$end', '$id_vendedor', '$id_nutricionista', '$id_paciente', '$id_suscripcion')";
	
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
$('#ModalAdd').modal('toggle');
scrollreset();
loadFullCalendar('<?php echo date('Y-m-d', strtotime($start)); ?>');
</script>
<?php
}