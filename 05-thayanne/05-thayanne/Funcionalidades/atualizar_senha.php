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
    $nova_senha = $_POST['nova_senha'];
    $nova_senha_hash = password_hash($nova_senha, PASSWORD_DEFAULT);

    $sql = "UPDATE usuarios SET senha = '$nova_senha_hash' WHERE id = " . $_SESSION['user_id'];

    if ($conn->query($sql) === TRUE) {
        echo "Senha atualizada com sucesso!";
    } else {
        echo "Erro ao atualizar senha: " . $conn->error;
    }
}
?>

<form method="POST">
    Nova Senha: <input type="password" name="nova_senha" required><br>
    <input type="submit" value="Atualizar Senha">
</form>
