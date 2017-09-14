
<?php  
header('Content-Type: application/json; charset=utf-8');
	//conectando ao db
include ("connection.php");
	//setando variaveis locais

$data = $_POST['dia'];
$horario = $_POST['hora'];
$med = $_POST['medselect'];
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
$output = array();
$query = "SELECT * FROM consultas";
if($qryLista = $con->query($query)){
	while ($row = $qryLista->fetch_assoc()) {
		if(($row['data'] == $data && $row['horario'] == $horario && $row['medico'] == $med || $row['nome'] == $primeironome) && $row['status'] == 'pendente') {
			$output[] = array_map('utf8_encode',$row);
			break;
		}
	}
}

echo json_encode($output);
$con->close();

?>