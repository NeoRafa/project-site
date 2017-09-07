
<?php  
header('Content-Type: application/json; charset=utf-8');
	//conectando ao db
include ("connection.php");
	//setando variaveis locais

$data = $_POST['dia'];
$horario = $_POST['hora'];
$med = $_POST['medselect'];

	//ok agora vamos procurar no banco se ja existe uma consulta marcada nesse horario
$query = "SELECT * FROM consultas";

$qryLista = $con->query($query);
while ($row = $qryLista->fetch_assoc()) {
	$output[] = array_map('utf8_encode',$row);
}

echo json_encode($output);
$con->close();

?>