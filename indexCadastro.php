<!DOCTYPE html>
<html>
<head>
	<title>Bem-vindo, cadastrado</title>

	<?php 

	session_start();

	if((!isset ($_SESSION['login']) == true) and (!isset ($_SESSION['senha']) == true))
	{
		unset($_SESSION['login']);
		unset($_SESSION['senha']);
		header('location:index.php');
	}

	$logado = $_SESSION['login'];

	?>

	<link rel="stylesheet" type="text/css" href="css/cabecalho.css">
	<link rel="stylesheet" type="text/css" href="css/footer.css">
	<link rel="stylesheet" type="text/css" href="css/indexCadastro.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">

</head>
<body>
<?php include("cabecalho.php"); ?>
<!-- MIOLO DO CODIGO -->

	<div class="jumbotron">
		<div class="container">
			<h2>
			<?php 
				echo "Bem-vindo $logado";
			?>
			</h2>
		</div>
	</div>

	<div class="container">
		<div class="row">


		</div>

	</div>


<!-- FIM DO CODIGO -->
<?php include("rodape.php"); ?>

</body>
</html>