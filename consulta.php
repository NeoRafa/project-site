<!DOCTYPE html>
<html>
<head>
	<title>Marque sua consulta</title>
	<meta name="viewport" content="width=device-width">
	<link rel="stylesheet" href="css/bootstrap.css">
	<link rel="stylesheet" href="css/cabecalho.css">
	<link rel="stylesheet" href="css/consulta.css">
	<link rel="stylesheet" type="text/css" href="css/footer.css">
	<link href="https://fonts.googleapis.com/css?family=Yanone+Kaffeesatz" rel="stylesheet">
	<?php 
	
	session_start();
	if((!isset ($_SESSION['login']) == true) and (!isset ($_SESSION['senha']) == true))
	{
		unset($_SESSION['login']);
		unset($_SESSION['senha']);
		header('location:logincadastro.php');
	}

	?>
</head>
<body>
	<?php include("cabecalho.php");?>
	<!-- MIOLO DO CODIGO -->
	<section>
		<div class="container agendamento">
			
		</div>
	</section>
	<!-- fim do miolo -->
	<?php include("rodape.php") ?>
</body>
</html>
