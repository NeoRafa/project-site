<!DOCTYPE html>
<html>
<head>
	<title>Bem-vindo a MedConsulta</title>
	<meta name="viewport" content="width=device-width">
	<link rel="stylesheet" href="dist/css/bootstrap.min.css">
	<link rel="stylesheet" href="css/cabecalho.css">
	<link rel="stylesheet" type="text/css" href="css/footer.css">
	<link rel="stylesheet" href="css/styles.css">
	<script src="js/jquery.js"></script>
	<script src="js/scroll.js"></script>
	<script src="dist/js/bootstrap.min.js"></script>
	<script src="js/banner.js"></script>
	<link href="https://fonts.googleapis.com/css?family=Encode+Sans+Condensed" rel="stylesheet"> 
	<link href="https://afeld.github.io/emoji-css/emoji.css" rel="stylesheet">
	<script type="text/javascript">
		
		$(document).ready( function() {
			plusText(0);
			plusText1(0);
		});
		
		var slide = 1;
		var slide1 = 1
		showText(slide);
		showText1(slide1);

		function plusText(n) {
			showText(slide+=n);
		}
		function plusText1(n) {
			showText1(slide1+=n);
		}

		function currenteText(n){
			showText(slide = n);
		}

		function currenteText1(n){
			showText1(slide1 = n);
		}

		function showText(n){
			var i;
			var txt = $('.txt');
			if(n > txt.length) {slide = 1}
				if(n < 1) {slide = txt.length}
					for(i=0;i<txt.length;i++)  {
						txt[i].style.display = 'none';
					}

					txt[slide-1].style.display = "block";
				}
				
				function showText1(n){
					var i;
					var txt = $('.txt1');
					if(n > txt.length) {slide1 = 1}
						if(n < 1) {slide1 = txt.length}
							for(i=0;i<txt.length;i++)  {
								txt[i].style.display = 'none';
							}

							txt[slide1-1].style.display = "block";
						}

					</script>
					<?php session_start(); ?>
				</head>
				<body>
					<?php include("cabecalho.php") ?>
					<!-- MIOLO DO CODIGO -->
					<div class="container">
						<section class="car">
							<div id="myCarousel" class="carousel slide" data-ride="carousel">
								<!-- Indicators -->
								<ol class="carousel-indicators">
									<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
								</ol>

								<!-- Wrapper for slides -->
								<div class="carousel-inner">
									<div class="item active">
										<img src="img/la.jpg" alt="Los Angeles">
									</div>
								</div>

								<!-- Left and right controls -->
								<a class="left carousel-control" href="#myCarousel" data-slide="prev">
									<span class="glyphicon glyphicon-chevron-left"></span>
									<span class="sr-only">Atual</span>
								</a>
								<a class="right carousel-control" href="#myCarousel" data-slide="next">
									<span class="glyphicon glyphicon-chevron-right"></span>
									<span class="sr-only">Proximo</span>
								</a>
							</div>
						</section>
						<section class="miolo">
							<div class="intros">

								<h2 id="profissionais"> Profissionais </h2>
								<h2 id="consultas"> Exames </h2>
							</div>
							<div class="row-fluid no-gutter">
								<div class="col-sm-4 col-md-2">
								</div>
								<div class="col-sm-4 col-md-5">
									<div id="myCarousel_" class="carousel slide" data-ride="carousel">
										<!-- Indicators -->
										<ol class="carousel-indicators">
											<li data-target="#myCarousel_" data-slide-to="0" class="active"></li>
										</ol>

										<!-- Wrapper for slides -->
										<div class="carousel-inner">
											<div class="item active">
												<div class="carousel-content">
													<div>
														<p>Médicos especializados e precinho que cabe no bolso: aqui você encontra saúde e bem-estar, em um ambiente confortável e agradável, estamos localizados no supermercado carrefour dom pedro, perfeito para quem não tem muito tempo e quer fazer compras e cuidar da saudê</p>
													</div>
												</div>
											</div>
											<div class="item">
												<div class="carousel-content">
													<div>
														<p>texto2 aqui</p>
													</div>
												</div>
											</div>
										</div>
										<!-- Left and right controls -->
										<a class="left carousel-control" href="#myCarousel_" data-slide="prev">
											<span class="glyphicon glyphicon-chevron-left"></span>
											<span class="sr-only">Atual</span>
										</a>
										<a class="right carousel-control" href="#myCarousel_" data-slide="next">
											<span class="glyphicon glyphicon-chevron-right"></span>
											<span class="sr-only">Proximo</span>
										</a>
									</div>
								</div>
								<div class="col-sm-4 col-md-5">

									<div id="_myCarousel" class=="carousel slide" data-ride="carousel">
										<!-- Indicators -->
										<ol class="carousel-indicators">
											<li data-target="#_myCarousel" data-slide-to="0" class="active"></li>
										</ol>

										<!-- Wrapper for slides -->
										<div class="carousel-inner">
											<div class="item active">
												<img src="img/la.jpg" alt="Los Angeles">
											</div>
										</div>

										<!-- Left and right controls -->
										<a class="left carousel-control" href="#_myCarousel" data-slide="prev">
											<span class="glyphicon glyphicon-chevron-left"></span>
											<span class="sr-only">Atual</span>
										</a>
										<a class="right carousel-control" href="#_myCarousel" data-slide="next">
											<span class="glyphicon glyphicon-chevron-right"></span>
											<span class="sr-only">Proximo</span>
										</a>
									</div>


								</div>
							</div>
						</section>

						<section>
							<div class="row">
								<div class="col-sm-4 col-md-4">
								</div>
								<div class="col-sm-4 col-md-4">
								</div>
								<div class="col-sm-4 col-md-4">
								</div>
							</div>
						</section>
					</div>
					<!-- FIM DO MIOLO -->
					<?php include("rodape.php") ?>

				</body>
				</html>