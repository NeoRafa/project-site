
<?php  
header('Content-Type: application/json; charset=utf-8');
	//conectando ao db
include ("connection.php");
	//setando variaveis locais

$medico = $_POST["med"];

	//ok agora vamos procurar no banco se ja existe uma consulta marcada nesse horario
$query = "SELECT * FROM consultas WHERE medico = '".$medico."' order by data, horario ASC";
$output = array();
$qryLista = $con->query($query);
while ($row = $qryLista->fetch_assoc()) {
	if($row['status'] == 'pendente')
	$output[] = array_map('utf8_encode',$row);
}

echo json_encode($output);
$con->close();

?>