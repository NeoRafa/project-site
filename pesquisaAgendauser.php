<?php  
header('Content-Type: application/json; charset=utf-8');
	//conectando ao db
include ("connection.php");
	//setando variaveis locais

$login = $_POST['login'];

//recuperando o nome do usuario
$sql = "SELECT primeiroNome FROM cadastros WHERE name = ?";

$stmt = $con->prepare($sql);
$stmt-> bind_param("s", $login);
$stmt->execute() or die("Erro!");

$stmt->bind_result($name) or die("Erro!");

while ($stmt->fetch()) {
	$primeironome = $name;
} 

	//ok agora vamos procurar no banco se ja existe uma consulta marcada nesse horario
$query = "SELECT * FROM consultas WHERE nome = '".$primeironome."' order by data, horario ASC";
$output = array();
if($qryLista = $con->query($query)){
	while ($row = $qryLista->fetch_assoc()) {
		$output[] = array_map('utf8_encode',$row);
	}
}

echo json_encode($output);
$con->close();

?>