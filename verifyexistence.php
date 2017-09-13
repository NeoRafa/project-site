

<?php
	//conectando ao DB
include("connection.php");

	//recebendo post...
$login = $_POST['nome'];

$sql = "SELECT * FROM cadastros";
$output['status'] = 'ok';
if($qryLista = $con->query($sql)){
	while($row = $qryLista->fetch_assoc()) {
		if($row['name'] == $login)
			$output['status'] = 'not';
	}
}

echo json_encode($output);
$con->close();
?>