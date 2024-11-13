<?php
include('db.php');

// Recupera todos os usuários
$sql = "SELECT * FROM usuarios";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "ID: " . $row['id'] . " - Login: " . $row['login'] . "<br>";
    }
} else {
    echo "Nenhum usuário encontrado!";
}
?>
