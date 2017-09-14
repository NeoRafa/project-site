	<link rel="stylesheet" type="text/css" href="dist/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/cabecalho.css">
	<link rel="stylesheet" type="text/css" href="css/footer.css">
	<link href="https://fonts.googleapis.com/css?family=Noto+Serif" rel="stylesheet"> 
	<link href="https://fonts.googleapis.com/css?family=Courgette" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="css/indexCadastro.css">
	<link rel="stylesheet" type="text/css" href="css/sessaoEspecial.css">
	<meta name="viewport" content="width=device-width">
	<script src="js/jquery.js"></script>
	<script src="dist/js/bootstrap.min.js"></script>
	<!-- SCRIPT DE ADICAO DE AGENDA -->
	<script type="text/javascript">
		//definindo aqui a funcao da agenda

		$(document).ready(function() {

			$('#target').click(function() {
				var medico = <?php echo json_encode($_SESSION['login']); ?>;
				$('#shoot').html('');
				$.post('pesquisaAgenda.php', { med : medico},
					function( data ) {
						if(data.length > 0){
							//pegando o dia de hoje
							var date = new Date();
							//pegando a hora atual
							datetext = date.toTimeString().split(' ')[0];
							
							//inicializando tabela
							$("#shoot").append('<table class="table table-bordered"> <thead><tr><td>Consulta</td><td>Nome do paciente:</td><td> Dia da consulta: </td><td>Horario da consulta:</td><td>Status da consulta</td></tr></thead> <tbody>');


							for(var i = 0; i<data.length; i++){
								//pegando a data marcada
								var consulta = new Date(data[i].data);
								//convertendo a data marcada para padrao UTC
								dx = new Date(consulta.getTime() + consulta.getTimezoneOffset()*60000);
								//comparando a hora da consulta com a hora atual
								if(dx.getMonth()==date.getMonth()){ 
									$("#shoot table").append('<tr> <td> <button class="btn btn-default but" value="'+data[i].medico+" "+data[i].data+" "+data[i].horario+'">Finalizar consulta</button> </td> <td>'+data[i].nome+'</td> <td>'+data[i].data+'</td> <td>'+data[i].horario+'</td> <td>'+data[i].status+'</td> </tr>');
								}
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
				<h1>
					<?php echo "Bem-vindo Doutor $logado :)"; ?>
				</h1>
			</div>
		</section>


		<section>
			<h2>
				<?php echo "Ola Dr.$logado, escolha o que deseja fazer: "; ?> </h2>
				<div class="row" style="margin-top:60px">
					<!-- Desenhando agora o primeiro painel -->

					<div class="col-sm-4">
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

								<select name="especialidade">
									<option value="clinico"> Clinico </option>
									<option value="psiquiatra"> Psiquiatra </option>
									<option value ="Oftalmologista"> Oftalmologista </option>
								</select>

								<button type="submit" class="btn btn-default"> OK! </button>

							</form>
						</div>
					</div>
						<!-- Desenhando agora o segundo painel-->

						<div class="col-sm-8">
							<div class="panel panel-default">
								<div class="panel-heading">
									<p> Ou voce pode ver as hora marcadas: </p>
								</div>

								<div class="panel-body">
									<p> Clique para ver sua agenda virtual de hoje: <button type="button" id="target" class="btn btn-default">aqui</button> </p>
									<div id="shoot">

									</div>
								</div>
							</div>
						</div>
					</div>
				</section>
			</div>
			<!-- FIM DO CODIGO -->
			<?php include("rodape.php"); ?>

		</body>
		</html>

<!-- ********************************* TESTADO: OK/FALTA DESIGN *********************************