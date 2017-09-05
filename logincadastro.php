<!DOCTYPE html>
<html>
<head>
	<title>Faca seu Login!</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="css/cabecalho.css">
	<link rel="stylesheet" type="text/css" href="css/createlogin.css">
	<link rel="stylesheet" type="text/css" href="css/footer.css">
	<script src="js/jquery.js"></script>

</head>

<body>

	<?php
	include ("cabecalho.php");
	
	?>
	<!--MIOLO DO CODIGO -->

	<section>
		<div class="jumbotron">	
			<div class="container">
				<h1>Voce deve se cadastrar para agendar uma consulta. E rapidinho ;) </h1>
			</div>
		</div>
		<!-- MONTANDO OS FORMS DE LOGIN E CADASTRO -->
		<div class="container">
			<div class="row">	
				<div class="col-sm-6">
					<h2>Ja tenho conta</h2>
					<form action="ope.php" method='POST'>

						<div class="form-group">
							<label for="login">Insira seu login: </label>
							<input type="text" name="login" id="login" class="form-control" required>
						</div>

						<div class="form-group">
							<label for="senha">Insira sua senha: </label>
							<input type="password" name="senha" id="senha" class="form-control" required>
						</div>

						<button type="submit" class="btn btn-default"> Pronto </button>

					</form>
				</div>
				<div class="col-sm-6 afastarfundo">
					<h2>Quero criar minha conta</h2>
					<form action="createlogin.php" method='POST'>

						<div class="form-group">
							<label for="nome">Insira seu login: </label>
							<input type="text" name="nome" id="nome" class="form-control" required>
						</div>

						<div class="form-group">
							<label for="senha">Insira sua senha: </label>
							<input type="password" name="senha" id="senha" class="form-control" required>
						</div>
						
						<div class="form-group">
							<label for="primeiroNome">Insira seu primeiro nome: </label>
							<input type="text" name="primeiroNome" id="primeiroNome" class="form-control" required>
						</div>

						<div class="form-group">
							<label for="segundoNome">Insira seu ultimo nome: </label>
							<input type="text" name="segundoNome" id="segundoNome" class="form-control" required>
						</div>

						<div class="form-group">
							<label for="email">Insira seu email: </label>
							<input type="text" name="email" id="email" class="form-control" required>
						</div>
						
						<div class="form-group">
							<label for="endereco">Insira seu endereco: </label>
							<input type="text" name="endereco" id="endereco" class="form-control" required>
						</div>

						<button type="submit" class="btn btn-default"> Pronto </button>

					</form>
				</div>
			</div>																		
		</div>

	</section>




	<!-- FIM DO CODIGO -->

	<?php

	include ("rodape.php")

	?>


</body>
</html>>