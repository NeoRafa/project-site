<?php 

session_start();

require ("PassHash.php");

include("connection.php");


$login = $_POST['nome'];
$email = $_POST['email'];
$senha = $_POST['senha'];
$nivel = $_POST['nivel'];
$primeiroNome = $_POST['primeiroNome'];
$segundoNome = $_POST['segundoNome'];
$endereco = $_POST['endereco'];

//encriptando senha

$pass_hash = PassHash::hash($senha);

echo $pass_hash;
 
 //salvandando dados na cadeia

$sql = "INSERT INTO cadastros (name,senha,email,primeiroNome,segundoNome,endereco,nivel) VALUES (?,?,?,?,?,?,?)";
$stmt = $con->prepare($sql);

$stmt->bind_param("ssssssi",$login,$pass_hash,$email,$primeiroNome,$segundoNome,$endereco,$nivel);

//verificicando se houve resultset
if($stmt->execute())
{
	$con->close();
	$stmt->close();
	header('location:adm.php'); exit;

}
else{
	
	echo("Erro ao adicionar usuario");
	$con->close();
	header('location:adm.php'); exit;
	
}

// ******************************** testado: OK! *********************************

?>