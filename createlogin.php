<?php 


include("connection.php");


$login = $_POST['login'];
$senha = $_POST['senha'];
$login = $_POST['nome'];
$senha = $_POST['senha'];
$email = $_POST['email'];
$primeiroNome = $_POST['primeiroNome'];
$segundoNome = $_POST['segundoNome'];
$endereco = $_POST['endereco'];

//inserindo dados

$sql = "INSERT INTO cadastros (name,senha,email,primeiroNome,segundoNome,endereco) VALUES (?,?,?,?,?,?)";
$stmt = $con->prepare($sql);
$stmt->bind_param("ssssss",$login,$senha,$email,$primeiroNome,$segundoNome,$endereco);

//verificicando se houve resultset
if($stmt->execute())
{
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