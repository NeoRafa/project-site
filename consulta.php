<!DOCTYPE html>
<html>
<head>
	<title>Marque sua consulta</title>
	<meta name="viewport" content="width=device-width">
	<link rel="stylesheet" href="dist/css/bootstrap.min.css">
	<link rel="stylesheet" href="css/cabecalho.css">
	<link rel="stylesheet" href="css/consulta.css">
	<link href="https://fonts.googleapis.com/css?family=Courgette" rel="stylesheet"> 
	<link href="https://fonts.googleapis.com/css?family=Noto+Serif" rel="stylesheet"> 
	<link rel="stylesheet" type="text/css" href="css/footer.css">
	<link href="https://fonts.googleapis.com/css?family=Yanone+Kaffeesatz" rel="stylesheet">
	<script src="js/jquery.js"></script>
	<script src="dist/js/bootstrap.min.js"></script>
	<!-- scripts e links da web -->
	<link rel="stylesheet" href="http://code.jquery.com/ui/1.9.0/themes/base/jquery-ui.css" />
	<script src="http://code.jquery.com/jquery-1.8.2.js"></script>
	<script src="http://code.jquery.com/ui/1.9.0/jquery-ui.js"></script>

	
	<?php 
	
	session_start();
	
	if(!(isset ($_SESSION['login'])) and !(isset ($_SESSION['senha'])) and !($_SESSION['nivel'] == 1))
	{
		session_destroy();
		header('location:logincadastro.php');
	}
	
	$logado = $_SESSION['login'];

	?>


	<style type="text/css">
	.posicionar {
		margin-top: 60px;
	}
	</style>


	<script type="text/javascript">

	$(document).ready(function () {

		$('#calendario').change(function() {
			var option = $(this).val();
			criarMedicosDisponiveis(option);
			return false;
		});

		$('#butt').click(function() {
				//variaveis necessarias
				var data = $('#calendario').val();
				var horario = $('#timeselect').val();
				var med = $('#medselect').val();
				if(med == null)
				{
					alert("Nenhum medico disponivel no dia desejado");
					return false;
				}

				//impedindo a submissao nativamente
				
				$.post('validation.php',{dia: data, hora: horario, medselect: med}, function(response){

					var verify = true;

					if(response != null){

						for(var i = 0; i<response.length;i++){
							if(data == response[i].data && horario == response[i].horario && med == response[i].medico){
								alert("Data ja marcada!");
								verify = false;
							}
						}
					}

					if(verify){
						alert("Consulta marcada com sucesso");
						$('#target').submit();
					}

				}, 'JSON');

			});



		function criarMedicosDisponiveis(option) {
			//variavies necessarios
			var d = new Date(option);
			dia = d.getDay();
			if(dia>=5)
				return false;
			var meds = [];
			//Recebendo lista com todos os medicos codificados com ajax

			$.ajax({
				type: 'GET',
				url: "getDias.php",
				dataType: 'json',
				success: function(data){
						//buscando os medicos com horario compativel
						k = 0;
						for(var i = 0; i<data.length; i++){
							j = 0;
							j+= data[i].segunda;
							if(j==1 && dia==0)
								meds[k++] = data[i].medico;
							j=0;	 
							j+= data[i].terca;
							if(j==1 && dia==1)
								meds[k++] = data[i].medico;	   
							j=0;	 
							j+= data[i].quarta;
							if(j==1 && dia==2)
								meds[k++] = data[i].medico;	   
							j=0;	 
							j+= data[i].quinta;
							if(j==1 && dia==3)
								meds[k++] = data[i].medico;	
							j=0;
							j+= data[i].sexta;
							if(j==1 && dia==4)
								meds[k++] = data[i].medico;   
						}

						//verificando se foi encontrado no minimo um medico disponivel e limpando options
						$('.inner').html("");
						if(k==0)
							return false;

						for(i=0;i<meds.length;i++){
							$('.inner').append("<option value="+meds[i]+"> Dr."+meds[i]+"</option>");

						}
					}
				});
}




$(function() {
	$( "#calendario" ).datepicker({
		showButton: 'button',
		dateFormat: 'yy-mm-dd',
		dayNames: ['Domingo','Segunda','Terça','Quarta','Quinta','Sexta','Sábado','Domingo'],
		dayNamesMin: ['D','S','T','Q','Q','S','S','D'],
		dayNamesShort: ['Dom','Seg','Ter','Qua','Qui','Sex','Sáb','Dom'],
		monthNames: ['Janeiro','Fevereiro','Março','Abril','Maio','Junho','Julho','Agosto','Setembro','Outubro','Novembro','Dezembro'],
		monthNamesShort: ['Jan','Fev','Mar','Abr','Mai','Jun','Jul','Ago','Set','Out','Nov','Dez'],
		minDate : "0d",
		maxDate : "+30d"
	}).val();
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
			<h1>Voce esta quase la. Sua saude agradece!</h1>

		</div>

	</section>
	<section>
		<div class="container posicionar">
			<div class="row">
				<div class = "col-sm-6">
					<div class="panel panel-default">
						<div class="panel-body">
							<p>
								Com o nosso sistema de agendamento, voce escolhe um dia e um horario e retornamos se ha vagas! Caso nao haja, voce so precisa tentar de novo em outra hora. Beleza pura.
							</p>
						</div>
					</div>
				</div>
				<div class ="col-sm-6">
					<div class="panel panel-default">
						<div class="panel-body">
							<form action="criarconsulta.php" method="POST" id="target">
								<div class="form-group">
									<label for="data">
										Escolha um dia para sua consulta <?php echo $logado ?> </label>        
										<input type="text" name="data" class="form-control" id="calendario" placeholder="Clique aqui para exibir o calendario" required>
										<p class="timesel"> Selecione um horario </p>
										<select name='horario' id="timeselect"> 
											<!-- Definindo horarios de funcionamento da clinica -->

											<?php 
											$start = strtotime('10:00:00');
											$end   = strtotime('18:00:00');
											for($i = $start; $i <= $end; $i+=30*60)
												printf 
											('<option value= %s >%s</option>',date('H:i:s',$i),date('g:i a',$i));
											?>
										</select>
										<p class="timesel"> Selecione um medico : </p>
										<select class="inner" name="medselect" id="medselect">


										</select>
									</div>           
									<button type="button" class="btn btn-default" id="butt"> Cadastrar uma consulta </button>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
		<!-- fim do miolo -->
		<?php include("rodape.php") ?>

	</body>

	</html>
