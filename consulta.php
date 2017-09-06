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
	<link rel='stylesheet' href='fullcalendar-3.5.0/fullcalendar.css' />
	<script src="js/jquery.js"></script>
	<link rel="stylesheet" href="http://code.jquery.com/ui/1.9.0/themes/base/jquery-ui.css" />
	<script src="js/jquery.js"></script>
	<script src="js/bootstrap.js"></script>
	
	<?php 
	
	session_start();
	
	if((!isset ($_SESSION['login']) == true) and (!isset ($_SESSION['senha']) == true))
	{
		unset($_SESSION['login']);
		unset($_SESSION['senha']);
		header('location:logincadastro.php');
	}
	$logado = $_SESSION['login'];

	?>
	<style type="text/css">
		.posicionar {
			margin-top: 60px;
		}


	</style>

	<script>
		$(function() {
			$( "#calendario" ).datepicker({
				dateFormat: 'yy-mm-dd'
			});
		});
	</script>

</head>
<body>
	<?php include("cabecalho.php");?>
	<!-- MIOLO DO CODIGO -->
	<section>
		<div class="jumbotron">
			<br>
			<h2>Sua saude agradece. Voce esta quase la!</h2>

		</div>

	</section>
	<section>
		<div class="container posicionar">
			<div class="panel panel-default">
				<div class="panel-body">
					<form action="criarconsulta.php" method="POST">
						<div class="form-group">
							<label for="data">
								Escolha um dia para sua consulta <?php echo $logado ?> </label>        
								<input type="text" name="data" class="form-control" id="calendario" required>
								<select name='horario'> 
									<?php for($i = 1; $i <= 6; $i++): ?>
										<option value=<?php echo $i; ?> ><?= date("h:iA", strtotime("$i:00")); ?></option>
									<?php endfor; ?>
								</select>
							</div>           
							<button type="submit" class="btn btn-default"> Cadastrar uma consulta </button>
						</form>
					</div>
				</div>	
			</div>
		</section>
		<!-- fim do miolo -->
		<?php include("rodape.php") ?>
	</body>
	</html>
