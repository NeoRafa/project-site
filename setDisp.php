<?php
//conectando-se ao database
include("connection.php");
//verificando se o medico esta logado
if(!isset($_SESSION['login']) and !($_SESSION['nivel']==2)){
	session_destroy();
	header("location: index.php");
}
//definindo variaveis locais
$medico = $_SESSION['login'];
$buscaDias = array("segunda"=>0,"terca"=>0,"quarta"=>0,"quinta"=>0,"sexta"=>0);

//verificar que dias foram escolhidos:

if(!empty($_POST['dia'])) {
	foreach($_POST['dia'] as $check) {
		$buscaDias[$check] = 1;
	}
}

$especialidade = $_POST['especialidade'];


//buscar se medico ja definiu anteriormente suas disponibilidades

$query = "SELECT * FROM disponibilidades where medico =?";
$stmt = $con->prepare($query) or die("erro ao preparar banco");
$stmt->bind_param("s",$medico);
$stmt->execute();
$result = $stmt->get_result();


// se o numero de linhas for >= 1, o sitema apena atualiza seus dados de disponibildiade


if($result->num_rows>0){

	$query = "UPDATE disponibilidades SET segunda=?, terca=?, quarta=?, quinta=?, sexta=?, especialidade=? WHERE medico=?";
	$stm = $con->prepare($query) or die("erro ao preparar banco");
	$stm->bind_param("iiiiiss",$buscaDias['segunda'],$buscaDias['terca'],$buscaDias['quarta'],$buscaDias['quinta'],$buscaDias['sexta'],$especialidade,$medico);

	$stm->execute() or die("Erro ao adicionar variavel!");

}

else {


	$query = "INSERT INTO disponibilidades (medico,segunda,terca,quarta,quinta,sexta,especialidade) VALUES(?,?,?,?,?,?,?)";
	$stm = $con->prepare($query) or die("erro ao preparar banco");
	$stm->bind_param("siiiiis",$medico,$buscaDias['segunda'],$buscaDias['terca'],$buscaDias['quarta'],$buscaDias['quinta'],$buscaDias['sexta'],$especialidade);

	$stm->execute() or die("Erro ao adicionar variavel!");

}


$result->close();
$con->close();
$stmt->close();
$stm->close();

header("location: indexCadastro.php"); exit;

?>

<!-- ************************************* TESTADO : OK *******************************