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
var date = new Date();
var yyyy = date.getFullYear().toString();
var mm = (date.getMonth()+1).toString().length == 1 ? "0"+(date.getMonth()+1).toString() : (date.getMonth()+1).toString();
var dd  = (date.getDate()).toString().length == 1 ? "0"+(date.getDate()).toString() : (date.getDate()).toString();

$('#calendar').fullCalendar({
header: {
language: 'es',
left: 'prev, next today',
center: 'title',
right: 'month, agendaWeek, agendaDay'
},
defaultDate: yyyy+"-"+mm+"-"+dd,
editable: true,
eventLimit: true, // allow "more" link when too many events
selectable: true,
selectHelper: true,
defaultView: 'agendaWeek',
select: function(start, end) {

$('#ModalAdd #start').val(moment(start).format('YYYY-MM-DD HH:mm:ss'));
$('#ModalAdd #end').val(moment(end).format('YYYY-MM-DD HH:mm:ss'));
$('#ModalAdd').modal('show');

alert('Fecha de Inicio:'+moment(start).format('YYYY-MM-DD'));
},
eventRender: function(event, element) {
element.bind('dblclick', function() {
$('#ModalEdit #id').val(event.id);
$('#ModalEdit #title').val(event.title);
$('#ModalEdit #color').val(event.color);
$('#ModalEdit').modal('show');
});
},
eventDrop: function(event, delta, revertFunc) { // si changement de position

edit(event);

},
eventResize: function(event,dayDelta,minuteDelta,revertFunc) { // si changement de longueur

edit(event);

},
events: [
<?php foreach($events as $event): 

$c_id_paciente = (int)$event['id_paciente'];                            
$row_nombre_paciente = mysqli_fetch_array(mysqli_query($con, "SELECT nombres, apellidos FROM usuario WHERE id = '$c_id_paciente' LIMIT 1"));
$nombre_paciente = $row_nombre_paciente[0].' '.$row_nombre_paciente[1];

$c_id_nutricionista = (int)$event['id_nutricionista'];
$row_nombre_nutricionista = mysqli_fetch_array(mysqli_query($con, "SELECT nombres, apellidos FROM usuario WHERE id = '$c_id_nutricionista' LIMIT 1"));
$nombre_nutricionista = $row_nombre_nutricionista[0].' '.$row_nombre_nutricionista[1];

//TITULO
$c_title  = $event['title'];
if(!empty($c_id_paciente)){
$c_title .= ' \nP:'.$nombre_paciente;
}
if(!empty($c_id_nutricionista)){
$c_title .= ' \nN:'.$nombre_nutricionista;
}

$start = explode(" ", $event['start']);
$end = explode(" ", $event['end']);
if($start[1] == '00:00:00'){
$start = $start[0];
}else{
$start = $event['start'];
}
if($end[1] == '00:00:00'){
$end = $end[0];
}else{
$end = $event['end'];
}
?>
{
id: '<?php echo $event['id']; ?>',
title: '<?php echo $c_title; ?>',
start: '<?php echo $start; ?>',
end: '<?php echo $end; ?>',
color: '<?php echo $event['color']; ?>',
},
<?php endforeach; ?>
]
});
scrollreset();
</script>
<?php
}