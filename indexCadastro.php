<!DOCTYPE html>
<html>
<head>

	<title>Bem-vindo, cadastrado</title>
	<!--iniciando sessao no navegador e verificando se usuario ja esta logado -->
	<?php 

	session_start();

	if((isset ($_SESSION['login']) == true) and (isset ($_SESSION['senha']) == true))
	{
		$logado = $_SESSION['login'];
		include("sessaoNormal.php");
	}
	else if((isset ($_SESSION['medico']) == true) and (isset ($_SESSION['medicoSenha']) == true)){
		$logado = $_SESSION['medico'];
		include("sessaoEspecial.php");
	}

	else {
		unset($_SESSION['login']);
		unset($_SESSION['senha']);
		unset($_SESSION['medico']);
		nset($_SESSION['medicoSenha']);
		header('location:index.php');
	}

	?>

	