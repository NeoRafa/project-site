<?php 
//conectando ao db
include("connection.php");

//verificando se o usuario esta logado
if((!isset ($_SESSION['login'])) && !($_SESSION['nivel']==1))
{
	session_destroy();
	header('location:logincadastro.php'); exit;
}

//definindo variaveis locais
$data = $_POST['data'];
$hora = $_POST['horario'];
$medico = $_POST['medselect'];
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

//inserindo nova consulta
$stat = "pendente";
$query = "INSERT INTO consultas(medico,nome,data,horario,status) VALUES (?,?,?,?,?)";
$stmt = $con->prepare($query) or die("Erro!");
$stmt->bind_param("sssss",$medico,$primeironome,$data,$hora,$stat) or die("Erro!");
$stmt->execute() or die("Erro ao executar!");
$stmt->close();
$con->close();
header("location:indexCadastro.php");
//****************************************** TESTADO OK *****************************
?>

