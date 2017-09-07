
<?php
//conectando ao database 
include("connection.php");
//

//recuperando os medicos disponiveis no dia

$sql = "SELECT * FROM disponibilidades";
$qryLista = $con->query($sql);
//qryList agora carrega um Mysqli Result e devo obter as suas linhas
while($row = ($qryLista)->fetch_assoc()) {
	$output[] = array_map('utf8_encode', $row); 
}

echo json_encode($output);

//codificando os dados com JSON

$con -> close();

?>
