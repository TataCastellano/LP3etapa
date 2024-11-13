<?php
// Inicia a sessão
session_start();

// Verifica se o usuário está logado
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

// Inclui a conexão com o banco de dados
include('db.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $sql = "DELETE FROM usuarios WHERE id = " . $_SESSION['user_id'];

    if ($conn->query($sql) === TRUE) {
        echo "Usuário deletado com sucesso!";
        // Destrói a sessão e redireciona para login
        session_unset();
        session_destroy();
        header("Location: login.php");
        exit();
    } else {
        echo "Erro ao deletar usuário: " . $conn->error;
    }
}
?>

<form method="POST">
    <input type="submit" value="Deletar Conta">
</form>
