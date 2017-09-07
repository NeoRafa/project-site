<?php 


include("connection.php");
//variaveis locais
$login = $_POST['login'];
$senha = $_POST['senha'];
//*********************

$sql = "SELECT tipo FROM cadastros WHERE name = ? AND senha = ?";

$stmt = $con->prepare($sql);
$stmt->bind_param("ss",$login,$senha);
$stmt->execute() or die("Erro 00");

//verificicando se houve resultset
	//iterando para descobrir se o usuario eh medico ou paciente
$stmt->bind_result($tipo) or die("Erro 01");

while ($stmt->fetch()) {
	echo $tipo;
	$type = $tipo;
	
}

if($type == "medico"){
	$_SESSION['medico'] = $login;
	$_SESSION['medicoSenha'] = $senha;
	header("location: indexCadastro.php");
}
else if($type == "normal") {
	$_SESSION['login'] = $login;
	$_SESSION['senha'] = $senha;
	header('location:indexCadastro.php');
}
else{

	unset ($_SESSION['login']);
	unset ($_SESSION['senha']);
	unset ($_SESSION['medico']);
	unset ($_SESSION['medicoSenha']);
	header('location:logincadastro.php');
}

?>