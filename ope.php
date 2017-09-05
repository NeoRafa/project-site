<?php 



//inicia sessao do usuario
session_start();

//variaveis locais 
$localhost = 'localhost';
$passwd = '32060047_ac';
$user = 'root';
$database = 'agenda';
$login = $_POST['login'];
$senha = $_POST['senha'];

//conexao ao db...

$con = new mysqli($localhost,$user,$passwd,$database
	) or die();

if ($con->connect_error) {
	die("Database connection failed: " . $con->connect_error);
}

echo "Conectado!";
$sql = "SELECT * FROM cadastros WHERE name = ? AND senha = ?";

$stmt = $con->prepare($sql);
$stmt->bind_param("ss",$login,$senha);

$stmt->execute();
$resultset = $stmt->get_result();
//verificicando se houve resultset
if(mysqli_num_rows ($resultset) > 0)

{
	echo "Login sucessful!";
	$_SESSION['login'] = $login;
	$_SESSION['senha'] = $senha;
	header('location:indexCadastro.php');
}

else{

	unset ($_SESSION['login']);
	unset ($_SESSION['senha']);
	header('location:logincadastro.php');
	
}
?>
?>