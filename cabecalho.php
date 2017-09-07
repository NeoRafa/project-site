
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
				
				if(!isset($_SESSION['medico']) && !isset($_SESSION['medicoSenha']))
					echo
				'<li><a href="#"><span class="glyphicon glyphicon-ok"></span> Agende sua consulta</a>
					<ul>
						<li><a href="consulta.php">Clinico</a>
						</li>
					</ul>
				</li>';

				?>
				

				<?php 
				if((!isset ($_SESSION['login']) == true) and (!isset ($_SESSION['senha']) == true) and (!isset ($_SESSION['medico']) == true) and (!isset ($_SESSION['medicoSenha']) == true))
				{
					echo
					'<li> 
					<a href="logincadastro.php"><span class="glyphicon glyphicon-user"></span>Criar cadastro</a>
				</li>';
			}
			else {
				echo
				'<li> 
				<a href="indexCadastro.php"><span class="glyphicon glyphicon-user"></span>Minha conta</a>
			</li>
				<li>
				<a href="logout.php"> Sair </a>
				</li>'
				;
		}
		?>
		<li><a href="#"><span class="glyphicon glyphicon-heart"></span> Sobre nos</a></li>
	</ul>
	
	<?php 
	if((!isset ($_SESSION['login']) == true) and (!isset ($_SESSION['senha']) == true) and (!isset ($_SESSION['medico']) == true) and (!isset ($_SESSION['medicoSenha']) == true)){
		echo
		'<form class="navbar-form navbar-left" action="ope.php" method="POST">
		<div class="form-group">
			<input type="text" class="form-control" placeholder="login" name="login" id="login">
		</div>
		<div class="form-group">
			<input type="password" class="form-control" placeholder="senha" name="senha" id="senha">
		</div>

		<button type="submit" class="btn btn-default navbar-btn">Entrar</button>
	</form>';
}
?>
</div>
</nav>
</header>
<!--**************************** testado: OK! ************************************* -->
