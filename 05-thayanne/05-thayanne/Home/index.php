<?php
// Inicia a sessão
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

echo "Bem-vindo, " . $_SESSION['login'] . "!<br>";
echo "<a href='logout.php'>Sair</a>";
?>
