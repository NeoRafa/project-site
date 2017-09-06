<?php 

include("connection.php");
$data = $_POST['data'];
$hora = $_POST['horario'];
$logado = $_SESSION['login'];

//recuperando o nome do usuario
$sql = "SELECT primeiroNome FROM cadastros WHERE name = ?";

$stmt = $con->prepare($sql);
$stmt-> bind_param("s", $logado);
$stmt->execute() or die("Erro!");

$stmt->bind_result($name) or die("Erro!");
while ($stmt->fetch()) {
	$primeironome = $name;
}
//verificando se ja existe consulta marcada
$sql = "SELECT nome,data,horario FROM consultas";

$stmt = $con->prepare($sql);
$stmt->execute() or die("Erro ao executar selecao!");

$stmt->bind_result($name,$date,$horas) or die("Erro ao bindar!");
while ($stmt->fetch()) {
	if($date == $data && $hora==$horas)
		die("Horario ja cadastrado. Por favor tente outro horario. Obrigado!");
	else if($primeironome == $name)
		die("Voce ja possui uma consulta marcada");
}
//inserindo nova consulta
$stat = "pendente";
$query = "INSERT INTO consultas(nome,data,horario,status) VALUES (?,?,?,?)";
$stmt = $con->prepare($query) or die("Erro!");
$stmt->bind_param("ssss",$primeironome,$data,$hora,$stat) or die("Erro!");
$stmt->execute() or die("Erro ao executar!");
$stmt->close();
$con->close();
header("location:indexCadastro.php");

?>