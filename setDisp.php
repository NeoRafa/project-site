<?php
//conectando-se ao database
include("connection.php");
//verificando se o medico esta logado
if(!isset($_SESSION['medico']) and !isset($_SESSION['medicoSenha'])){
	unset($_SESSION['medico']);
	unset($_SESSION['medicoSenha']);
	header("location: index.php");
}
//definindo variaveis locais
$medico = $_SESSION['medico'];
$buscaDias = array("segunda"=>0,"terca"=>0,"quarta"=>0,"quinta"=>0,"sexta"=>0);

//verificar que dias foram escolhidos:

if(!empty($_POST['dia'])) {
	foreach($_POST['dia'] as $check) {
		$buscaDias[$check] = 1;
	}
}


//buscar se medico ja definiu anteriormente suas disponibilidades

$query = "SELECT * FROM disponibilidades where medico =?";
$stmt = $con->prepare($query) or die("erro ao preparar banco");
$stmt->bind_param("s",$medico);
$stmt->execute();
$result = $stmt->get_result();


// se o numero de linhas for >= 1, o sitema apena atualiza seus dados de disponibildiade


if($result->num_rows>0){

	$query = "UPDATE disponibilidades SET segunda=?, terca=?, quarta=?, quinta=?, sexta=? WHERE medico=?";
	$stm = $con->prepare($query) or die("erro ao preparar banco");
	$stm->bind_param("iiiiis",$buscaDias['segunda'],$buscaDias['terca'],$buscaDias['quarta'],$buscaDias['quinta'],$buscaDias['sexta'],$medico);

	$stm->execute() or die("Erro ao adicionar variavel!");

}

else {


	$query = "INSERT INTO disponibilidades (medico,segunda,terca,quarta,quinta,sexta) VALUES(?,?,?,?,?,?)";
	$stm = $con->prepare($query) or die("erro ao preparar banco");
	$stm->bind_param("siiiii",$medico,$buscaDias['segunda'],$buscaDias['terca'],$buscaDias['quarta'],$buscaDias['quinta'],$buscaDias['sexta']);

	$stm->execute() or die("Erro ao adicionar variavel!");

}


$result->close();
$con->close();
$stmt->close();
$stm->close();

header("location: indexCadastro.php")

?>

<!-- ************************************* TESTADO : OK *******************************