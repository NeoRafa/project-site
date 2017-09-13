<?php 

session_start();


require("PassHash.php");

include("connection.php");

//variaveis locais
$login = $_POST['login'];
$senha = $_POST['senha'];
//*********************

$sql = "SELECT senha,nivel FROM cadastros WHERE name = ?";

$stmt = $con->prepare($sql);
$stmt->bind_param("s",$login);
$stmt->execute() or die("Erro 00");

//verificicando se houve resultset
	//iterando para descobrir se o usuario eh medico ou paciente
$stmt->bind_result($passwd,$nivel1) or die("Erro 01");

while ($stmt->fetch()) {
	$nivel = $nivel1;
	$password = $passwd;
	
}

// verifique se a senha usada bate com o hash guardado

if (PassHash::check_password($password,$senha)) {

	if (!isset($_SESSION)) session_start();
	$_SESSION['login'] = $login;
	$_SESSION['senha'] = $senha;
	$_SESSION['nivel'] = $nivel;
	if($nivel <= 3) {
	header("location: indexCadastro.php"); exit;
	}
	else {
	header("location: adm.php"); exit;
	}	
}

else {

	session_destroy();
	header('location:logincadastro.php'); exit;

}



?>