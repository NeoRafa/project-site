
<header>
	<nav class="navbar navbar-default navbar-fixed-top">

		<div class="navbar-header">
			<a href="index.php" class="navbar-brand">MedConsulta  <span class="glyphicon glyphicon-plus"></span></a>
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#myNavbar">
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
		</div>

		<div class="collapse navbar-collapse" id="myNavbar">
			<ul class="nav navbar-nav">
				<li><a href="index.php"><span class="glyphicon glyphicon-home"></span> Home</a></li>
				
				<?php
				
				if(!isset($_SESSION['login']) || ($_SESSION['nivel'] == 1))
					echo
				'<li><a href="consulta.php"><span class="glyphicon glyphicon-ok"></span> Agende sua consulta</a>
				</li>';

				?>
				

				<?php 
				if(!isset($_SESSION['login']))
				{
					echo
					'<li>

					<a href="logincadastro.php"><span class="glyphicon glyphicon-user"></span> Criar cadastro </a>

					</li>

					<form class="navbar-form navbar-left" action="ope.php" method="POST">
					<div class="form-group">
					<input type="text" class="form-control" placeholder="login" name="login" id="login">
					</div>
					<div class="form-group">
					<input type="password" class="form-control" placeholder="senha" name="senha" id="senha">
					</div>

					<button type="submit" class="btn btn-default navbar-btn">Entrar</button>
					</form>';
				}
				else if($_SESSION['nivel'] == 4) {
					echo
					'<li> 
					<a href="adm.php"><span class="glyphicon glyphicon-user"></span> Minha conta</a>
					</li>
					<li>
					<a href="logout.php"><span class="glyphicon glyphicon-off"></span> Sair </a>
					</li>';
				}
				else  {
					echo
					'<li> 
					<a href="indexCadastro.php"><span class="glyphicon glyphicon-user"></span> Minha conta</a>
					</li>
					<li>
					<a href="logout.php"><span class="glyphicon glyphicon-off"></span> Sair </a>
					</li>';
				}
				?>
				<li><a href="#"><span class="glyphicon glyphicon-heart"></span> Sobre nos</a></li>
			</ul>
		</div>
	</nav>
</header>
<!--**************************** testado: OK! ************************************* -->
