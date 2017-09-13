<!DOCTYPE html>
<html>
<head>
	
	<title>Bem-vindo, cadastrado</title>
	<!--iniciando sessao no navegador e verificando se usuario ja esta logado -->
	<?php 

	session_start();

	if((isset ($_SESSION['login'])) and (isset ($_SESSION['senha'])) and ($_SESSION['nivel']==1))
	{
		$logado = $_SESSION['login'];
		include("sessaoNormal.php");
	}
	
	else if((isset ($_SESSION['login'])) and (isset ($_SESSION['senha'])) and ($_SESSION['nivel']==2)){
		$logado = $_SESSION['login'];
		include("sessaoEspecial.php"); 
	}

	else {
		
		session_destroy();
		header('location:index.php'); exit;
	}

	?>

	