<!DOCTYPE html>
<html>
<head>
	<title>Clinica MedConsulta Home</title>
	<meta name="viewport" content="width=device-width">
	<link rel="stylesheet" href="dist/css/bootstrap.min.css">
	<link rel="stylesheet" href="css/cabecalho.css">
	<link rel="stylesheet" href="css/styles.css">
	<script src="js/jquery.js"></script>
	<script src="js/scroll.js"></script>
	<script src="dist/js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="css/footer.css">
	<link href="https://fonts.googleapis.com/css?family=Merriweather" rel="stylesheet"> 
	<link href="https://fonts.googleapis.com/css?family=Yanone+Kaffeesatz" rel="stylesheet"> 
	<link href="https://afeld.github.io/emoji-css/emoji.css" rel="stylesheet">
	<?php session_start(); ?>
</head>
<body>

	<?php include("cabecalho.php") ?>
	<div class="container">
		<section class="additions">
			<div class = "row">
				<div class="col-sm-6 col-md-4 col-md-push-8" style="margin-top: 40px">
					<h2 class="destaques"> Aqui nossos <strong>médicos</strong> são: </h2> 
					<div class="row">
						<div class="col-sm-4">
							<figure>
								<img src="img/eye.png" alt="atenciosos">
								<figcaption>
									<h4>Atenciosos</h4>
								</figcaption>
							</figure>
						</div>

						<div class="col-sm-4">
							<figure>
								<img src="img/stethoscope.png">
								<figcaption>
									<h4>Especialistas</h4>
								</figcaption>
							</figure>
						</div>

						<div class="col-sm-4">
							<figure>
								<img src="img/user-md-symbol.png">
								<figcaption>
									<h4>Eficientes</h4>
								</figcaption>
							</figure>
						</div>
					</div>

					<h3 class="destaques"> Localizada no Carrefour Dom Pedro, Campinas </h3>

				</div>

				<div class="col-sm-6 col-md-8 col-md-pull-4">
					<div class="box">

						<img src="img/logo.png" id="logo" alt = "Clinica popular barata">

					</div>
				</div>
			</div>
		</section>
		<section>
			<div class="row">
				<div class="row">
					<div class="col-sm-6 col-sm-offset-3" style="margin-top:20px">
						<div class="panel" style="border-radius:2%; background-color:#3366cc">
							<h2 class="destaques2"> Pronto para ser tratado? </h2>
						</div>
					</div>
				</div>
				<div class="col-sm-4">
					<div class="panel" style="border-radius:2%; background-color:#e6e6e6">
						<h2 class="destaques"> Tratamento eficiente </h2>
						<h3 class="destaques"> Venha ao supermercado Carrefour Dom Pedro nos conhecer. Funcionamos das 10h00 às 22h00! </h3>
					</div>
				</div>
				<div class="col-sm-4">
					<div class="panel" style="border-radius:2%; background-color:#e6e6e6">
						<h2 class="destaques"> Preço competitivo </h2>
						<h3 class="destaques"> Nosso objetivo é tornar a saúde de qualidade acessível a todos com um preço baixinho para caber no bolso! </h3>
					</div>
				</div>
				<div class="col-sm-4">
					<div class="panel" style="border-radius:2%; background-color:#e6e6e6">
						<h2 class="destaques">  Rápido atendimento </h2>
						<h3 class="destaques"> Trabalhamos para atendermos pacientes rapidamente, sem filas ou esperar. Encontre aqui a praticidade.</h3>
					</div>
				</div>
			</div>
		</section>
		<section class="miolo">
			<h1 class="destaques2"> A missão da <strong>MedConsulta</strong> é sua <strong>saúde!</strong> </h1>
			<h2 class="destaques2">    Conheca nossos <strong>diferenciais: </strong></h2>
			<div class ="diferenciais">
				<div class="row">
					<div class="col-sm-6 col-sm-offset-3">
						<figure>
							<img src="img/checked.png" alt="confianca">
							<figcaption>
								Nenhum dos nossos médicos possui menos que quinze anos de experiência: escolhemos a dedo nossos médicos para que você receba sempre a consulta mais completa. 
							</figcaption>
						</figure>
					</div>
				</div>

				<div class="hideme">
					<div class="row">
						<div class="col-sm-6 col-sm-offset-3">
							<figure>
								<img src="img/file.png" alt="ficha">
								<figcaption>
									Somos uma policlinica, ou seja, contamos com diversas especializacoes: psiquiatra, clinico, oftalmologista e cardio. Fique tranquilo: teremos o que voce procura.
									<i class= "em em-clap"></i>
								</figcaption>
							</figure>
						</div>
					</div>
				</div>


				<div class="hideme">
					<div class="row">
						<div class="col-sm-6 col-sm-offset-3">
							<figure>
								<img src="img/thumb-up.png" alt="carinho">
								<figcaption id="joinha">
									Prezamos pela nossa relacao com voce. Somos atenciosos e escutaremos todas suas queixas: espere sempre ser bem atendido.
								</figcaption>
							</figure>
						</div>
					</div>
				</div>
			</div>
		</section>
		<section class="final">
			<div class="hideme">
				<h2 class="destaque1">Venha ver nossos <strong>serviços</strong>: </h2>
				<div class="row">
					<div class="col-sm-6">
						<figure class="consultaservico">
							<img src="img/doctor(1).png" alt="Realizamos consultas!">
							<figcaption>
								<a class="destaque" href="consulta.php">Clique aqui para marcar uma consulta</a>
							</figcaption>
						</figure>
					</div>
					<div class="col-sm-6">
						<figure class="consultaservico">
							<img src="img/syringe(1).png" alt="Exames de tipos variados!">
							<figcaption>
								<a class="destaque" href="#">Clique aqui para conhecer sobre nossos exames rapidos</a>
							</figcaption>

						</figure>
					</div>
				</div>
			</div>
		</section>
	</div>
	<?php include("rodape.php"); ?>