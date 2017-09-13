<?php 

session_start();

require ("PassHash.php");

include("connection.php");


$login = $_POST['nome'];
$email = $_POST['email'];
$senha = $_POST['senha'];
$nivel = 1;
$primeiroNome = $_POST['primeiroNome'];
$segundoNome = $_POST['segundoNome'];
$endereco = $_POST['endereco'];
//validando dados

if($login == 'adm') {
	$nivel = 4;
}
else {
	$nivel = 1;
}

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
	$_SESSION['login'] = $login;
	$_SESSION['senha'] = $pass_hash;
	$_SESSION['nivel'] = $nivel;
	$con->close();
	$stmt->close();
	header('location:indexCadastro.php'); exit;

}
else{
	
	session_destroy();
	$con->close();
	header('location:logincadastro.php'); exit;
	
}

// ******************************** testado: OK! *********************************

?>