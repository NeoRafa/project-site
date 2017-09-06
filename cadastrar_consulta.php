<?php 
 //inicia sessao do usuario
session_start();
//variaveis locais
$localhost = 'localhost';
$passwd = '32060047_ac';
$user = 'root';
$database = 'agenda';

$nome = $_POST["nome"];
$data = $_POST["data"];


//estabelecendo conexao ao servidor
$con = new mysqli($localhost,$user,$passwd,$database
    ) or die();

if ($con->connect_error) {
    die("Database connection failed: " . $con->connect_error);
}
//preparando a conexao
$query = "INSERT INTO consultas (titulo, inicio) VALUES (?,?)";
$stmt = $con->prepare($query);
$stmt->bind_param("ss",$nome,$data);
                    

if($stmt->execute()){            
    $con->close();
    $stmt->close();
    echo "1";     
}

else {
    $con->close();
    $stmt->close();
    echo "0";
}


?>