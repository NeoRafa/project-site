<?php 
	session_start();

	if((isset($_SESSION['login']) && isset($_SESSION['senha'])) || (isset($_SESSION['medico']) && isset($_SESSION['medicoSenha']))){
		unset($_SESSION['login']);
		unset($_SESSION['senha']);
		unset($_SESSION['medico']);
		unset($_SESSION['medicoSenha']);
	}

	header('location:index.php');

//******************************** TESTADO : OK ************************************************8
 ?>