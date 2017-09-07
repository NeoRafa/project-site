	<link rel="stylesheet" type="text/css" href="css/cabecalho.css">
	<link rel="stylesheet" type="text/css" href="css/footer.css">
	<link rel="stylesheet" type="text/css" href="css/indexCadastro.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<meta name="viewport" content="width=device-width">
	<script src="js/jquery.js"></script>
	<script src="js/bootstrap.js"></script>

</head>
<body>
	<?php include("cabecalho.php"); ?>
	<!-- MIOLO DO CODIGO -->

	<div class="jumbotron">
		<div class="container">
			<h2>
				<?php 
				echo "Bem-vindo $logado :)";
				?>
			</h2>
		</div>
	</div>

	<div class="container">
		<div class="panel panel-default">
			<div class="panel-heading">
				<?php 
				echo "Painel do cliente $logado";
				?>
			</div>
			<div class="panel-body">
				<h2> Essas sao suas opcoes : </h2>
				<p> Agendar uma consulta clicando <a href="consulta.php"> aqui </a></p>
				<p> Verificar a sua consulta marcada clicando <a href="#"> aqui </a></p>
			</div>

		</div>

	</div>


	<!-- FIM DO CODIGO -->
	<?php include("rodape.php"); ?>

</body>
</html>