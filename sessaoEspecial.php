	<link rel="stylesheet" type="text/css" href="css/cabecalho.css">
	<link rel="stylesheet" type="text/css" href="css/footer.css">
	<link href="https://fonts.googleapis.com/css?family=Noto+Serif" rel="stylesheet"> 
	<link href="https://fonts.googleapis.com/css?family=Courgette" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="css/indexCadastro.css">
	<meta name="viewport" content="width=device-width">
	<script src="js/jquery.js"></script>
	<script src="js/bootstrap.js"></script>
	<!-- SCRIPT DE ADICAO DE AGENDA -->
	<script type="text/javascript">
		
		$(document).ready(function() {
			$('#target').click(function() {
				$.get('pesquisaAgenda.php',
					function( data ) {


					},'JSON');
				});
			}
		);

	</script>

</head>
<body>
	<?php include("cabecalho.php"); ?>
	<!-- MIOLO DO CODIGO -->

	<div class="jumbotron">
		<div class="container">
			<h2>
				<?php echo "Bem-vindo $logado :)"; ?>
			</h2>
		</div>
	</div>

	<div class="container">
		
		<div class="panel panel-default">
			
			<div class="panel-heading">

				<?php echo "Ola Dr.$logado, escolha o que quer fazer: "; ?>

			</div>

			<div class="panel-body">
				<div class="container">
					<div class="row">

						<!-- Desenhando agora o primeiro painel -->

						<div class="col-sm-8">
							<div class="container">
								<div class="panel panel-default">
									<div class="panel-heading">
										<p> Voce pode definir os dias que voce trabalha na clinica: </p>
									</div>

									<form action="setDisp.php" method="POST">
										
										<div class="checkbox">
											<label>
												<input type="checkbox" id="segunda" name="dia[]" value="segunda">
												Segunda
											</label>
										</div>
										<div class="checkbox">
											<label>
												<input type="checkbox" id="terca" name="dia[]" value="terca">
												Terca
											</label>
										</div>
										<div class="checkbox">
											<label>
												<input type="checkbox" id="quarta" name="dia[]" value="quarta">
												Quarta
											</label>
										</div>
										<div class="checkbox">
											<label>
												<input type="checkbox" id="quinta" name="dia[]" value="quinta">
												Quinta
											</label>
										</div>
										<div class="checkbox">
											<label>
												<input type="checkbox" id="sexta" name="dia[]" value="sexta">
												Sexta
											</label>
										</div>

										<button type="submit" class="btn btn-default"> OK! </button>

									</form>
								</div>
							</div>
						</div>
						<!-- Desenhando agora o segundo painel-->

						<div class="col-sm-4">
							<div class="container">
								<div class="panel panel-default">
									<div class="panel-heading">
										<p> Ou voce pode ver as hora marcadas: </p>
									</div>

									<div class="panel-body">
										<p> Clique para ver sua agenda virtual <a href="#" id="target">aqui</a> </p>
										<div id="shoot">
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- FIM DO CODIGO -->
	<?php include("rodape.php"); ?>

</body>
</html>

<!-- ********************************* TESTADO: OK/FALTA DESIGN *********************************