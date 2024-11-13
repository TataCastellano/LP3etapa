<?php
$servername = "localhost";
$username = "root"; // seu usuário do banco
$password = ""; // sua senha do banco
$dbname = "seu_banco"; // o nome do banco de dados

// Cria conexão
$conn = new mysqli($servername, $username, $password, $dbname);

// Verifica conexão
if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}
?>
