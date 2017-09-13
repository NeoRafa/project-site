<?php


//inicia sessao do usuario
session_start();

//variaveis locais 
$localhost = 'localhost';
$passwd = '';
$user = 'root';
$database = 'agenda';


//conexao ao db...

$con = new mysqli($localhost,$user,$passwd,$database
	) or die("Erro na conexao ao database");

if ($con->connect_error) {
	die("Database connection failed: " . $con->connect_error);
}
?>