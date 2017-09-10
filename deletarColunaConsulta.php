
<?php  
header('Content-Type: application/json; charset=utf-8');
	//conectando ao db
include ("connection.php");
	//setando variaveis locais

$medico = $_POST['med'];
$data = $_POST['date'];
$hora = $_POST['horario'];

	//ok agora vamos procurar no banco se ja existe uma consulta marcada nesse horario
$query = "UPDATE consultas SET status='ok' WHERE medico = '".$medico."' AND data = '".$data."' AND horario='".$hora."'";

$qryLista = $con->query($query);
$sucesso = "Consulta concluida com sucesso!";
echo json_encode($sucesso);
$con->close();

?>