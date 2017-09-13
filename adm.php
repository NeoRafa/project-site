
<!DOCTYPE html>
<html>
<head>
	
	<title>ADM</title>
	<!--iniciando sessao no navegador e verificando se usuario ja esta logado -->
	<?php 

	session_start();

	if((isset ($_SESSION['login'])) and (isset ($_SESSION['senha'])) and ($_SESSION['nivel'] != 4))
	{
		session_destroy();
	}
	?>
	<meta name="viewport" content="width=device-width">
	<link rel="stylesheet" href="dist/css/bootstrap.min.css">
	<link rel="stylesheet" href="css/cabecalho.css">
	<script src="js/jquery.js"></script>
	<script src="dist/js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="css/footer.css">
	<link href="https://fonts.googleapis.com/css?family=Merriweather" rel="stylesheet"> 
	<link href="https://fonts.googleapis.com/css?family=Yanone+Kaffeesatz" rel="stylesheet"> 
	<link href="https://afeld.github.io/emoji-css/emoji.css" rel="stylesheet">
</head>
<body>
	<?php include("cabecalho.php");?>

	<section>
		<div class="jumbotron">
			<h2>Página do Administrador do Site</h2>
		</div>

	</section>

	<section>
		<form action="admprivilege.php" method='POST' id="form">

			<div class="form-group">
				<label for="nome">Insira o login do médico/atendente: </label>
				<input type="text" name="nome" id="nome" class="form-control" required>
			</div>

			<div class="form-group">
				<label for="senha">Insira a senha: </label>
				<input type="password" name="senha" id="senha" class="form-control" required>
			</div>

			<div class="form-group">
				<label for="primeiroNome">Insira o primeiro nome: </label>
				<input type="text" name="primeiroNome" id="primeiroNome" class="form-control" required>
			</div>

			<div class="form-group">
				<label for="segundoNome">Insira  o ultimo nome: </label>
				<input type="text" name="segundoNome" id="segundoNome" class="form-control" required>
			</div>

			<div class="form-group">
				<label for="email">Insira o email: </label>
				<input type="text" name="email" id="email" class="form-control" required>
			</div>

			<div class="form-group">
				<label for="endereco">Insira o endereco: </label>
				<input type="text" name="endereco" id="endereco" class="form-control" required>
			</div>

			<select name="nivel">
				<option value=2>Medico</option>
				<option value=3>Atendente</option>
			</select>

			<button type="submit" class="btn btn-default"> Pronto </button>

		</form>
	</section>

	<?php include("rodape.php") ?>
</body>
</html>

