	<link rel="stylesheet" type="text/css" href="dist/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/cabecalho.css">
	<link rel="stylesheet" type="text/css" href="css/footer.css">
	<link href="https://fonts.googleapis.com/css?family=Noto+Serif" rel="stylesheet"> 
	<link href="https://fonts.googleapis.com/css?family=Courgette" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="css/indexCadastro.css">
	<meta name="viewport" content="width=device-width">
	<script src="js/jquery.js";
	<script src="dist/js/bootstrap.min.js"></script>

	<script type="text/javascript">
	$(document).ready(function() {
		$('#target').click(function() {
			var user = <?php echo json_encode($_SESSION['login']); ?>;
			$.post('pesquisaAgendauser.php', { login : user },
				function( data ) {
						//limpando a agenda
						$('#shoot').html('');
						if(data.length > 0){
							//inicializando tabela
							$("#shoot").append('<table class="table table-bordered"> <thead><tr><td>Consulta</td><td>Nome do médico:</td><td> Dia da consulta: </td><td>Horario da consulta:</td><td>Status da consulta</td></tr></thead> <tbody>');

							for(var i = 0; i< data.length; i++){			


								$("#shoot table").append('<tr> <td> <button class="btn btn-default but" value="'+data[i].medico+" "+data[i].data+" "+data[i].horario+'">Desmarcar consulta</button> </td> <td>'+data[i].medico+'</td> <td>'+data[i].data+'</td> <td>'+data[i].horario+'</td> <td>'+data[i].status+'</td> </tr>');


							}
							//finalizando tabela
							$("#shoot table").append('</tbody> </table>');

						}
					},'JSON');
		});

		$('#shoot').on('click', '.but', function() {
			var value = $(this).val();
			var vectorVal = value.split(" ");
			var medico = vectorVal[0];
			var data = vectorVal[1];
			var hora = vectorVal[2];
			$.post('deletarColunaConsulta.php', {med: medico, date: data, horario:hora}, function(msg){
				alert(msg);
				$('#target').click();
			},'JSON');
		});

	});
	</script>

</head>
<body>
	<?php include("cabecalho.php"); ?>
	<!-- MIOLO DO CODIGO -->
	<div class="container">
		<section>
			<div class="jumbotron">
				<div class="container" style="margin-top:20px">
					<h1>
						<?php 
						echo "Bem-vindo $logado :)";
						?>
					</h1>
				</div>
			</div>
		</section>
		<section>
			<div class="row">
				<div class="col-sm-6 col-sm-offset-3" style="margin-top:20px">
					<div class="panel pp">
						<p> Para sua comodidade, você pode marcar uma consulta ou desmarcar uma, apenas com um clique! Basta acessar nossa página de agendar consulta. </p>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-6 col-sm-offset-3" style="margin-top:20px">
					<div class="panel xx">
						<p> Agendar uma consulta online clicando <a href="consulta.php"> aqui </a>. Não se esqueça de comparecer! </p>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-8 col-sm-offset-2" style="margin-top:20px">
					<div class="panel xx">
						<p>Verificar todas as suas consultas marcadas clicando <button type="button" id="target">aqui </button></p>
						<div id="shoot">
						</div>
					</div>
				</div>
			</div>
		</section>
		<section>	

			<div class="row">
				<div class="col-sm-6 col-sm-offset-3">
					<div class="panel pp">
						<p> Deseja entrar em contato conosco? Entre na nossa página de contato e nos envie um email! <a href="contato.php" style="color: grey"> contato </a> </p>
					</div>
				</div>
			</div>

		</section>
	</div>
	<!-- FIM DO CODIGO -->
	<?php include("rodape.php"); ?>

</body>
</html>